<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EmpresaController extends CI_Controller{

	public function __construct(){

		parent::__construct();
		$this->load->model("EmpresaModel");
		$this->load->library('form_validation');
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

	}



	public function index(){

		$this->load->library('session');
		if($this->session->userdata('user')){
			$this->load->view('layout/header');
			$this->load->view('layout/topbar');
			$this->load->view('layout/sidebar');
			$this->load->view('empresas/index');
			$this->load->view('layout/footer');
		}else{
			redirect(base_url(), 'refresh');
		}
	}


	public function showAllEmpresa(){
		$result = $this->EmpresaModel->showAllEmpresa();
		echo json_encode($result);
	}


	public function saveEmpresa(){
		$numruc = $this->input->post('txtruc');
		$nomusuario = $this->input->post('txtnombreusuario');
		if($this->input->post()){
			$msg1 = array('is_unique' => ' %s ');
			$this->form_validation->set_rules('txtruc', 'La empresa con el RUC: '.$numruc.' ya existe.', 'required|is_unique[empresas.ruc]', $msg1);
			$this->form_validation->set_rules('txtnombreusuario', 'El nombre de usuario ('.$nomusuario.') ya esta ocupado. Registre con otro nombre.', 'required|is_unique[empresas.nombreusuario]', $msg1);

			if($this->form_validation->run() == FALSE){
				echo json_encode(array('error' => true, 'mensaje' => validation_errors()));
				exit();
			}else{
				$result = $this->EmpresaModel->saveEmpresa();
				$msg['succes'] = false;
				$msg['type'] = 'add';
				if ($result) {
					$msg['succes'] = true;
				}
				echo json_encode($msg);
			}
		}

		}

	public function editEmpresa(){
		$result = $this->EmpresaModel->editEmpresa();
		echo json_encode($result);
	}

	public function updateEmpresa(){

		$config['upload_path']          = './uploads/logo-empresas';
        $config['allowed_types']        = 'png|PNG|jpg|JPG';
        $config['max_size']             = 0;
      	$this->load->library('upload', $config);

		if(!$this->upload->do_upload("logo_emp")){
			
			$field = array(
				'razonsocial' => $this->input->post('txtrazonsocial'),
				'ruc' => $this->input->post('txtruc'),
				'direccion' => $this->input->post('txtdireccion'),
				'emailcontacto' => $this->input->post('txtemailcontacto'),
				'nombrecontacto' => $this->input->post('txtnombrecontacto'),
				'apellidoscontacto' => $this->input->post('txtapellidoscontacto'),
				'telefono' => $this->input->post('txttelefono'),
				'emailfactura' => $this->input->post('txtemailfactura'),
				'nombreusuario' => $this->input->post('txtnombreusuario'),
				'password' => $this->input->post('txtpassword'),
				'tyc' => $this->input->post('txtterms')
			);

			$result = $this->EmpresaModel->updateEmpresa($field);
			
			$msg['success'] = false;
			$msg['type'] = 'update';
			if($result){
				$msg['success']=true;
			}
			echo json_encode($msg);
		} else {
			$dataimglogo = array('upload_data' => $this->upload->data());
			$field = array(
				'razonsocial' => $this->input->post('txtrazonsocial'),
				'ruc' => $this->input->post('txtruc'),
				'direccion' => $this->input->post('txtdireccion'),
				'emailcontacto' => $this->input->post('txtemailcontacto'),
				'nombrecontacto' => $this->input->post('txtnombrecontacto'),
				'apellidoscontacto' => $this->input->post('txtapellidoscontacto'),
				'telefono' => $this->input->post('txttelefono'),
				'emailfactura' => $this->input->post('txtemailfactura'),
				'nombreusuario' => $this->input->post('txtnombreusuario'),
				'password' => $this->input->post('txtpassword'),
				'tyc' => $this->input->post('txtterms'),
				'logo_emp' => $dataimglogo['upload_data']['file_name']
			);

			$result = $this->EmpresaModel->updateEmpresa($field);
			$msg['success'] = false;
			$msg['type'] = 'update';
			if($result){
				$msg['success']=true;
			}
			echo json_encode($msg);
		}
	}


	//Registro de Personas Naturales
	public function savePersonaNatural(){

		$numdni = $this->input->post('txtdnipn');
		$nomusuario = $this->input->post('txtusuariopn');

		if($this->input->post()){
			$msg1 = array('is_unique' => ' %s ');
			$this->form_validation->set_rules('txtdnipn', 'El usuario con el DNI: '.$numdni.' ya existe.', 'required|is_unique[empresas.ruc]', $msg1);
			$this->form_validation->set_rules('txtusuariopn', 'El nombre de usuario ('.$nomusuario.') ya esta ocupado.', 'required|is_unique[empresas.nombreusuario]', $msg1);

			if($this->form_validation->run() == FALSE){
				echo json_encode(array('error' => true, 'mensaje' => validation_errors()));
				exit();
			}else{
				$result = $this->EmpresaModel->savePersonaNatural();
				$msg['succes'] = false;
				$msg['type'] = 'add';
				if ($result) {
					$msg['succes'] = true;
				}
				echo json_encode($msg);
			}
		}

	}

	public function updatePersonaNatural(){
		$result = $this->EmpresaModel->updatePersonaNatural();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success']=true;
		}
		echo json_encode($msg);
	}


	//Funcion para enviar correo a Empresas
	public function sendMailEm(){
		$this->load->library('email');
		$config['mailtype'] ='html';
		$config['protocol'] ='senmail';

		$this->email->initialize($config);
		$this->email->from('capacitacion@safesi.com', 'SAFESI');
		$this->email->to($this->input->post('txtemaildestino'));
		//$this->email->to('niltondeveloper96@gmail.com');
		$this->email->subject('Safesi - Enlace de Registro');
		$this->email->message('Estimado Cliente,
								Usted puede registrarse en el siguiente enlace: <a href="http://intranet.safesi.com/empresas_registro_online">intranet.safesi.com/empresas_registro_online</a><br>
								Se adjunta un manual para que pueda registrarse, reservar cupos y asignar a sus participantes.<br>
								<p style="text-align: left;">Saludos Cordiales,</p>
								<p style="text-align: left;"><strong>_____________________________<br>
								<span style="color: #005a82;">SAFESI</span> <span style="color: #00abd9;">TRAINING</span></strong></p>
								<p style="text-align: left;"><strong><span style="color: #00abd9;">T:</span> <span style="color: #005a82;">(01) 739-0719</span><br>
								</strong><strong><strong><span style="color: #00abd9;">C:</span> <span style="color: #005a82;">RPE: 965 753 171</span><br>
								</strong></strong><strong><span style="color: #00abd9;">E:</span> <span style="color: #005a82;"><a style="color: #005a82;" href="mailto:capacitacion@safesi.com">capacitacion@safesi.com</a></span></strong><br>
								<strong><span style="color: #00abd9;">W:</span> <span style="color: #005a82;"><a style="color: #005a82;" href="http://www.safesi.com/">www.safesi.com</a></span></strong><br>
								<span style="color: #00abd9;"><strong>F: </strong></span><span style="color: #005a82;"><strong><a style="color: #005a82;" href="www.facebook.com/safesi.sac">www.facebook.com/safesi.sac</a></strong></span><br>
								<img class="alignleft" src="http://intranet.safesi.com/assets/img/frm-lg-sf.jpg" alt="SAFESI" /></p>');
		$this->email->attach('http://intranet.safesi.com/uploads/archivos/Manual-RegistroEmpresa.pdf');

		if($this->email->send()){
			echo json_encode('Correo enviado');
		}else{
			echo json_encode('correo no enviado');
		}
	}



	//Funcion para enviar correo a Personas Naturales
	public function sendMailPn(){
		$this->load->library('email');
		$config['mailtype'] ='html';
		$config['protocol'] ='senmail';

		$this->email->initialize($config);
		$this->email->from('capacitacion@safesi.com', 'SAFESI');
		$this->email->to($this->input->post('txtemaildestino'));
		//$this->email->to('niltondeveloper96@gmail.com');
		$this->email->subject('Safesi - Enlace de Registro');
		$this->email->message('Estimado Cliente,
								Usted puede registrarse en el siguiente enlace: <a href="http://intranet.safesi.com/empresas_registro_online">intranet.safesi.com/empresas_registro_online</a><br>
								Se adjunta un manual para que pueda registrarse, reservar cupos y asignar a sus participantes.<br>
								<p style="text-align: left;">Saludos Cordiales,</p>
								<p style="text-align: left;"><strong>_____________________________<br>
								<span style="color: #005a82;">SAFESI</span> <span style="color: #00abd9;">TRAINING</span></strong></p>
								<p style="text-align: left;"><strong><span style="color: #00abd9;">T:</span> <span style="color: #005a82;">(01) 739-0719</span><br>
								</strong><strong><strong><span style="color: #00abd9;">C:</span> <span style="color: #005a82;">RPE: 965 753 171</span><br>
								</strong></strong><strong><span style="color: #00abd9;">E:</span> <span style="color: #005a82;"><a style="color: #005a82;" href="mailto:capacitacion@safesi.com">capacitacion@safesi.com</a></span></strong><br>
								<strong><span style="color: #00abd9;">W:</span> <span style="color: #005a82;"><a style="color: #005a82;" href="http://www.safesi.com/">www.safesi.com</a></span></strong><br>
								<span style="color: #00abd9;"><strong>F: </strong></span><span style="color: #005a82;"><strong><a style="color: #005a82;" href="www.facebook.com/safesi.sac">www.facebook.com/safesi.sac</a></strong></span><br>
								<img class="alignleft" src="http://intranet.safesi.com/assets/img/frm-lg-sf.jpg" alt="SAFESI" /></p>');
		
		// $this->email->attach('http://intranet.safesi.com/uploads/archivos/Manual-RegistroEmpresa.pdf');

		if($this->email->send()){
			echo json_encode('Correo enviado');
		}else{
			echo json_encode('correo no enviado');
		}
	}



}




