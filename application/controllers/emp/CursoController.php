<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CursoController extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->Model('emp/CursoModel');
		$this->load->Model('emp/HorarioModel');
		$this->load->Model('emp/ReservaModel');
		$this->load->Model('emp/PagoModel');
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	}

	public function index(){

		$this->load->library('session');

		if($this->session->userdata('userempresa')){

		$userempresa = $this->session->userdata('userempresa');
       	extract($userempresa);
       	$idempresa = $id_empresa;

		$data['countallreserva'] = $this->ReservaModel->countAllReserva($idempresa);
		
		$data['nomcursos'] = $this->CursoModel->getCursosUnidad();

		$data['listabancos'] = $this->PagoModel->getBanco();

		$this->load->view('emp/e_layout/header');
		$this->load->view('emp/e_layout/topbar');
		$this->load->view('emp/e_layout/sidebar');
		$this->load->view('emp/e_cursos/index',$data);
		$this->load->view('emp/e_layout/footer');
			
		}else{
			redirect(base_url('emp'), 'refresh');
		}

	}

	public function showAllCurso(){
		$estado = '1';
		$result = $this->CursoModel->showAllCurso($estado);
		echo json_encode($result);
	}

	public function showAllCursoForDate(){
		$result = $this->CursoModel->showAllCursoForDate();
		echo json_encode($result);
	}


	public function viewCurso(){
		$result = $this->CursoModel->viewCurso();
		echo json_encode($result);
	}

	public function viewCursoSafesi(){
		$result = $this->CursoModel->viewCursoSafesi();
		echo json_encode($result);
	}

	public function showAllHorarioForCurso(){
		$result = $this->HorarioModel->showAllHorarioForCurso();
		echo json_encode($result);
	}

	public function viewRtdcc(){
		$result = $this->CursoModel->viewRtdcc();
		echo json_encode($result);
	}

	public function showAllReserva(){
        $userempresa = $this->session->userdata('userempresa');
        extract($userempresa);

        $idempresa = $id_empresa;
		$result = $this->ReservaModel->showAllReserva($idempresa);
		echo json_encode($result);
	}



	public function showAllPagado(){
        $userempresa = $this->session->userdata('userempresa');
        extract($userempresa);

        $idempresa = $id_empresa;
		$result = $this->ReservaModel->showAllPagado($idempresa);
		echo json_encode($result);
	}


	public function createReservaCompleta(){
		$result = $this->ReservaModel->createReservaCompleta();
		
		/*Obtener Datos:::::::::::::::::::::::::::::*/
		$cupones = $this->input->post('slsncupos');
		$costototal = $this->input->post('txtcostotal');

		$idcurso = $this->input->post('txtIdCursoR');
		$curso = $this->ReservaModel->getDataCurso($idcurso);

		$idempresa = $this->input->post('txtIdEmpresa');
		$empresa = $this->ReservaModel->getDataEmpresa($idempresa);


		$msg['succes'] = false;
		$msg['type'] = 'add';
		if ($result) {
			$msg['succes'] = true;
			$msg['id_empresa'] = $idempresa;
			$msg['tipo_empresa'] = $empresa->tipo;
		}
		echo json_encode($msg);


		/*Enviar Correo::::::::::::::::::::::::::::::*/
		$this->load->library('email');
		$config['mailtype'] ='html';
		$config['protocol'] ='senmail';

		$this->email->initialize($config);
		$this->email->from('safesi@safesi.com', 'INTRANET - SAFESI');
		$this->email->to('capacitacion@safesi.com');
		$this->email->subject('Reserva: "'.$curso->nombrecurso.'".');
		if($empresa->tipo =='EM'){
			$this->email->message('
				<h4>INTRANET - SAFESI</h4>
				<p>Nuevo registro para el curso <b>"'.$curso->nombrecurso.'"</b></p>

				<p>
				<b>Empresa</b>: '.$empresa->razonsocial.'<br>
				<b>RUC</b>: '.$empresa->ruc.'<br>
				<b>Teléfono</b>: '.$empresa->telefono.'<br>
				<b>Correo:</b>: '.$empresa->emailcontacto.'<br>
				</p>
		
				<p>
				<b>Curso</b>: '.$curso->nombrecurso.'<br>
				<b>Cupones reservados</b>: '.$cupones.'<br>
				<b>Costo total</b>: '.$costototal.'<br>
				<b>Fecha de inicio</b>: '.$curso->FechaInicio.'
				</p>

				<p><a href="http://www.safesi.com/">www.safesi.com</a></p>
			');
			$this->email->send();
		}else{
			$this->email->message('
			<h4>INTRANET - SAFESI</h4>
			<p>Nuevo registro para el curso <b>"'.$curso->nombrecurso.'"</b></p>

			<p>
			<b>Nombre</b>: '.$empresa->nombrecontacto.' '.$empresa->apellidoscontacto.'<br>
			<b>DNI</b>: '.$empresa->ruc.'<br>
			<b>Teléfono</b>: '.$empresa->telefono.'<br>
			<b>Correo:</b>: '.$empresa->emailcontacto.'<br>
			</p>
	
			<p>
			<b>Curso</b>: '.$curso->nombrecurso.'<br>
			<b>Cupones reservados</b>: '.$cupones.'<br>
			<b>Costo total</b>: '.$costototal.'<br>
			<b>Fecha de inicio</b>: '.$curso->FechaInicio.'
			</p>

			<p><a href="http://www.safesi.com/">www.safesi.com</a></p>
		');
		$this->email->send();
		}

		// Redireccionar según el tipo de empresa
		// if ($empresa->tipo == 'EM') {
		// 	redirect(base_url('grp_em/grupos?client&idcl=' . $empresa->id . '&safesi&tipcl=EM'));
		// } else {
		// 	redirect(base_url('grp_pn/grupos?client&idcl=' . $empresa->id . '&safesi&tipcl=PN'));
		// }
	}


	public function saveReserva(){
		$result = $this->ReservaModel->saveReserva();
		$msg['succes'] = false;
		$msg['type'] = 'add';
		if ($result) {
			$msg['succes'] = true;
		}
		echo json_encode($msg);

		/*Obtener Datos:::::::::::::::::::::::::::::*/
		$cupones = $this->input->post('slsncupos');
		$costototal = $this->input->post('txtcostotal');

		$idcurso = $this->input->post('txtIdCursoR');
		$curso = $this->ReservaModel->getDataCurso($idcurso);

		$idempresa = $this->input->post('txtIdEmpresa');
		$empresa = $this->ReservaModel->getDataEmpresa($idempresa);

		/*Enviar Correo::::::::::::::::::::::::::::::*/
		$this->load->library('email');
		$config['mailtype'] ='html';
		$config['protocol'] ='senmail';

		$this->email->initialize($config);
		$this->email->from('safesi@safesi.com', 'INTRANET - SAFESI');
		$this->email->to('capacitacion@safesi.com');
		$this->email->subject('Reserva: "'.$curso->nombrecurso.'".');
		if($empresa->tipo =='EM'){
			$this->email->message('
				<h4>INTRANET - SAFESI</h4>
				<p>Nueva reserva para el curso <b>"'.$curso->nombrecurso.'"</b></p>

				<p>
				<b>Empresa</b>: '.$empresa->razonsocial.'<br>
				<b>RUC</b>: '.$empresa->ruc.'<br>
				<b>Teléfono</b>: '.$empresa->telefono.'<br>
				<b>Correo:</b>: '.$empresa->emailcontacto.'<br>
				</p>
		
				<p>
				<b>Curso</b>: '.$curso->nombrecurso.'<br>
				<b>Cupones reservados</b>: '.$cupones.'<br>
				<b>Costo total</b>: '.$costototal.'<br>
				<b>Fecha de inicio</b>: '.$curso->FechaInicio.'
				</p>

				<p><a href="http://www.safesi.com/">www.safesi.com</a></p>
			');
			$this->email->send();
		}else{
			$this->email->message('
			<h4>INTRANET - SAFESI</h4>
			<p>Nueva reserva para el curso <b>"'.$curso->nombrecurso.'"</b></p>

			<p>
			<b>Nombre</b>: '.$empresa->nombrecontacto.' '.$empresa->apellidoscontacto.'<br>
			<b>DNI</b>: '.$empresa->ruc.'<br>
			<b>Teléfono</b>: '.$empresa->telefono.'<br>
			<b>Correo:</b>: '.$empresa->emailcontacto.'<br>
			</p>
	
			<p>
			<b>Curso</b>: '.$curso->nombrecurso.'<br>
			<b>Cupones reservados</b>: '.$cupones.'<br>
			<b>Costo total</b>: '.$costototal.'<br>
			<b>Fecha de inicio</b>: '.$curso->FechaInicio.'
			</p>

			<p><a href="http://www.safesi.com/">www.safesi.com</a></p>
		');
		$this->email->send();
		}
	}

	public function savePago(){
		$result = $this->PagoModel->savePago();
		$msg['succes'] = false;
		$msg['type'] = 'add';
		if ($result) {
			$msg['succes'] = true;
		}
		echo json_encode($msg);

		/*Obtener Datos:::::::::::::::::::::::*/
		$numoperacion = $this->input->post('txtcodoperacion');
		$fecoperacion = $this->input->post('txtfechatrans');

		$idbanco = $this->input->post('slistabancos');
		$databanco = $this->ReservaModel->getDataBanco($idbanco);

		/*Actualizar Reserva a estado Pago por verificar*/
		$userempresa = $this->session->userdata('userempresa');
       		extract($userempresa);
       			$estadoactual ='1';
       			$estadonuevo ='2';
       		$idempresa = $id_empresa;
		$udtestad = $this->ReservaModel->updateReservaPagado($idempresa,$estadoactual,$estadonuevo);
		
		/*Enviar correo::::::::::::::::::::::::*/
		$this->load->library('email');
		$config['mailtype'] ='html';
		$config['protocol'] ='senmail';

		$this->email->initialize($config);
		$this->email->from('safesi@safesi.com', 'INTRANET - SAFESI');
		$this->email->to('facturas@safesi.com');
		$this->email->bcc('capacitacion@safesi.com'); 
		$this->email->subject('Pago pendiente de verificación.');
		if($tipo =='EM'){
			$this->email->message('
				<h4>INTRANET - SAFESI</h4>

				<p>Nuevo págo realizado, pendiente de verificación.</p>
		
				<p>
				<b>Empresa</b>: '.$razonsocial.'<br>
				<b>RUC</b>: '.$ruc.'<br>
				<b>Teléfono</b>: '.$telefono.'<br>
				<b>Correo para factura electrónica</b>: '.$emailfactura.'<br>
				</p>

				<p>
				<b>Banco</b>: '.$databanco->nombre_banco.'<br>
				<b>Número de operacón</b>: '.$numoperacion.'<br>
				<b>Fecha de operación</b>: '.$fecoperacion.'
				</p>

				<p><a href="http://www.safesi.com/">www.safesi.com</a></p>
		
			');
			$this->email->send();
		}else{
			$this->email->message('
				<h4>INTRANET - SAFESI</h4>

				<p>Nuevo págo realizado, pendiente de verificación.</p>
		
				<p>
				<b>Nombre</b>: '.$nombrecontacto.' '.$apellidoscontacto.'<br>
				<b>DNI</b>: '.$ruc.'<br>
				<b>Teléfono</b>: '.$telefono.'<br>
				<b>Correo para factura electrónica</b>: '.$emailcontacto.'<br>
				</p>

				<p>
				<b>Banco</b>: '.$databanco->nombre_banco.'<br>
				<b>Número de operacón</b>: '.$numoperacion.'<br>
				<b>Fecha de operación</b>: '.$fecoperacion.'
				</p>

				<p><a href="http://www.safesi.com/">www.safesi.com</a></p>
		
			');
			$this->email->send();
		}
	}

	public function DeleteReserva(){
		$result = $this->ReservaModel->DeleteReserva();
		$msg['succes'] = false;
		$msg['type'] = 'add';
		if ($result) {
			$msg['succes'] = true;
		}
		echo json_encode($msg);
	}

	public function GetDataReserva(){
		$result = $this->ReservaModel->GetDataReserva();
		echo json_encode($result);
	}
}

