<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AlumnoController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("emp/AlumnoModel");
	}

	public function index(){
		$this->load->library('session');
		if($this->session->userdata('userempresa')){
			$this->load->view('emp/e_layout/header');
			$this->load->view('emp/e_layout/topbar');
			$this->load->view('emp/e_layout/sidebar');
			$this->load->view('emp/e_alumnos/index');
			$this->load->view('emp/e_layout/footer');
		}else{
			redirect(base_url('emp'), 'refresh');
		}
	}

	public function showAllAlumno(){
        $userempresa = $this->session->userdata('userempresa');
        extract($userempresa);
        $idempresa = $id_empresa;
		$result = $this->AlumnoModel->showAllAlumno($idempresa);
		echo json_encode($result);
	}

	public function saveAlumno(){
		$result = $this->AlumnoModel->saveAlumno();
		$msg['succes'] = false;
		$msg['type'] = 'add';
		if ($result) {
			$msg['succes'] = true;
		}
		echo json_encode($msg);
	}

	public function editAlumno(){
		$result = $this->AlumnoModel->editAlumno();
		echo json_encode($result);
	}

	public function updateAlumno(){
		$result = $this->AlumnoModel->updateAlumno();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success']=true;
		}
		echo json_encode($msg);
	}
}