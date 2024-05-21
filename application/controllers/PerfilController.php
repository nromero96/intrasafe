<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PerfilController extends CI_Controller

{

	public function __construct()

	{

		parent::__construct();
		$this->load->Model('PerfilModel');
	}

	public function index(){
		$this->load->library('session');

		if($this->session->userdata('user')){

			$this->load->view('layout/header');
			$this->load->view('layout/topbar');
			$this->load->view('layout/sidebar');
			$this->load->view('perfil/index');
			$this->load->view('layout/footer');

		}else{
			redirect(base_url(), 'refresh');
		}
	}

	public function getDataUser(){
		$result = $this->PerfilModel->getDataUser();
		echo json_encode($result);
	}

	public function updateDataUser(){
		$result = $this->PerfilModel->updateDataUser();
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