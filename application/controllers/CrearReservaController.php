<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class CrearReservaController extends CI_Controller

{

	

	public function __construct()

	{

		parent::__construct();
		$this->load->model("CrearReservaModel");
		$this->load->Model('emp/ReservaModel');
		$this->load->Model('emp/PagoModel');

	}



	public function index(){
		$this->load->library('session');

		if($this->session->userdata('user')){

			$data['nomempresa'] = $this->CrearReservaModel->getEmpresa();
			$data['nompersonanatural'] = $this->CrearReservaModel->getPersonaNatural();
			$data['listabancos'] = $this->PagoModel->getBanco();

			$this->load->view('layout/header');
			$this->load->view('layout/topbar');
			$this->load->view('layout/sidebar');
			$this->load->view('crear_reserva/index',$data);

			$this->load->view('layout/footer');

		}else{

			redirect(base_url(), 'refresh');

		}

	}



	public function showAllReserva(){
		$result = $this->CrearReservaModel->showAllReserva();
		echo json_encode($result);
	}


	public function savePago(){

		$result = $this->CrearReservaModel->savePago();
		$msg['succes'] = false;
		$msg['type'] = 'add';
		if ($result) {
			$msg['succes'] = true;
		}

		echo json_encode($msg);

       	$estadoactual ='1';
       	$estadonuevo ='3';
       	$idempresa = $this->input->post('txtIdEmpresapg');
		$udtestad = $this->ReservaModel->updateReservaPagado($idempresa,$estadoactual,$estadonuevo);

	}

	public function showAllPagado(){
		$result = $this->CrearReservaModel->showAllPagado();
		echo json_encode($result);
	}

	public function validarGrupo(){
		$result = $this->CrearReservaModel->validarGrupo();
		echo json_encode($result);
	}

	public function saveGrupoForEmpresa(){

		$idreserva = $this->input->post('txtidReservaParaGrup');
		$this->ReservaModel->grupCreaParaReserva($idreserva);

		$result = $this->CrearReservaModel->saveGrupoForEmpresa();
		$msg['succes'] = false;
		$msg['type'] = 'add';
		if ($result) {
			$msg['succes'] = true;
		}
		echo json_encode($msg);
	}

	public function showAllCursoParaSafesi(){
		$estado = '1';
		$result = $this->CrearReservaModel->showAllCursoParaSafesi($estado);
		echo json_encode($result);
	}

	public function showAllCursoForDateSafesi(){
		$result = $this->CrearReservaModel->showAllCursoForDateSafesi();
		echo json_encode($result);
	}


}