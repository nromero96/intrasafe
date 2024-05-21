<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PerfilController extends CI_Controller

{

	public function __construct()

	{

		parent::__construct();
		$this->load->Model('emp/PerfilModel');
	}

	public function index(){
		$this->load->library('session');

		if($this->session->userdata('userempresa')){

			$this->load->view('emp/e_layout/header');
			$this->load->view('emp/e_layout/topbar');
			$this->load->view('emp/e_layout/sidebar');
			$this->load->view('emp/e_perfil/index');
			$this->load->view('emp/e_layout/footer');

		}else{
			redirect(base_url('emp'), 'refresh');
		}
	}

	public function getDataEmp(){
		$result = $this->PerfilModel->getDataEmp();
		echo json_encode($result);
	}

	public function updateEmpresa(){
		$result = $this->PerfilModel->updateEmpresa();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success']=true;
		}
		echo json_encode($msg);
	}

	public function updatePersonaNatural(){
		$result = $this->PerfilModel->updatePersonaNatural();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success']=true;
		}
		echo json_encode($msg);
	}

	public function updateAcceso(){
		$result = $this->PerfilModel->updateAcceso();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success']=true;
		}
		echo json_encode($msg);
	}




}