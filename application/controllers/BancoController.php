<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BancoController extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->Model('BancoModel');
	}

	public function index(){

		$this->load->library('session');

		if($this->session->userdata('user')){

		$this->load->view('layout/header');
		$this->load->view('layout/topbar');
		$this->load->view('layout/sidebar');
		$this->load->view('bancos/index');
		$this->load->view('layout/footer');
			
		}else{
			redirect(base_url(), 'refresh');
		}

	}

	public function showAllBanco(){
		$result = $this->BancoModel->showAllBanco();
		echo json_encode($result);
	}

	public function editBanco(){
		$result = $this->BancoModel->editBanco();
		echo json_encode($result);
	}

	public function saveBanco(){
		$result = $this->BancoModel->saveBanco();
		$msg['succes'] = false;
		$msg['type'] = 'add';
		if ($result) {
			$msg['succes'] = true;
		}
		echo json_encode($msg);
	}

	public function updateBanco(){
		$result = $this->BancoModel->updateBanco();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success']=true;
		}
		echo json_encode($msg);
	}

	public function deleteBanco(){
		$result = $this->BancoModel->deleteBanco();
		$msg['succes'] = false;
		$msg['type'] = 'add';
		if ($result) {
			$msg['succes'] = true;
		}
		echo json_encode($msg);
	}

}