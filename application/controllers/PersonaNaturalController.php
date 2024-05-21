<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PersonaNaturalController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("PersonaNaturalModel");
		$this->load->library('session');
	}

	public function index(){
		$this->load->library('session');

		if($this->session->userdata('user')){
			$this->load->view('layout/header');
			$this->load->view('layout/topbar');
			$this->load->view('layout/sidebar');
			$this->load->view('personasnaturales/index');
			$this->load->view('layout/footer');
		}else{
			redirect(base_url(), 'refresh');
		}

	}

	public function showAllPersonaNatural(){
		$result = $this->PersonaNaturalModel->showAllPersonaNatural();
		echo json_encode($result);
	}

	public function updatePersonaNatural(){
		$result = $this->PersonaNaturalModel->updatePersonaNatural();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success']=true;
		}
		echo json_encode($msg);
	}

}



