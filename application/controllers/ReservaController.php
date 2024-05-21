<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ReservaController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("ReservaModel");
	}

	public function index(){
		$this->load->library('session');

		if($this->session->userdata('user')){
			$this->load->view('layout/header');
			$this->load->view('layout/topbar');
			$this->load->view('layout/sidebar');
			$this->load->view('reservas/index');
			$this->load->view('layout/footer');
		}else{
			redirect(base_url(), 'refresh');
		}
	}

	public function showAllReserva(){
		$result = $this->ReservaModel->showAllReserva();
		echo json_encode($result);
	}

	public function showAllReservaPagoNoVerificado(){
		$result = $this->ReservaModel->showAllReservaPagoNoVerificado();
		echo json_encode($result);
	}

	public function viewReserva(){
		$result = $this->ReservaModel->viewReserva();
		echo json_encode($result);		
	}

	public function updateReservaPrecioEM(){
		$result = $this->ReservaModel->updateReservaPrecioEM();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success']=true;
		}
		echo json_encode($msg);
	}

	public function updateReservaPrecioPN(){
		$result = $this->ReservaModel->updateReservaPrecioPN();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success']=true;
		}
		echo json_encode($msg);
	}

	public function viewReservaPago(){
		$result = $this->ReservaModel->viewReservaPago();
		echo json_encode($result);
	}

	public function saveReserPagovaVerificado(){
		$result = $this->ReservaModel->saveReserPagovaVerificado();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success']=true;
		}
			echo json_encode($msg);
	}

	public function showAllReservaPagoVerificado(){
		$result = $this->ReservaModel->showAllReservaPagoVerificado();
		echo json_encode($result);
	}

	public function viewReservaPagoConfirmado(){
		$result = $this->ReservaModel->viewReservaPagoConfirmado();
		echo json_encode($result);		
	}


	//Pago
	public function viewPagoReservaPorVerifcar(){
		$result = $this->ReservaModel->viewPagoReservaPorVerifcar();
		echo json_encode($result);		
	}

	public function showListReservasPorPago(){
		$result = $this->ReservaModel->showListReservasPorPago();
		echo json_encode($result);		
	}

}