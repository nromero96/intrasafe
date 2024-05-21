<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CursoController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->Model('CursoModel');
		$this->load->Model('HorarioModel');
		$this->load->Model('CapacitadorModel');
	}

	public function index(){
		$this->load->library('session');

		if($this->session->userdata('user')){

		$data['nomcapacitador'] = $this->CapacitadorModel->getCapacitador();
		$data['firmagerentes'] = $this->CursoModel->getFirmaGerentes();
		$data['nomcursos'] = $this->CursoModel->getCursosUnidad();

		$this->load->view('layout/header');
		$this->load->view('layout/topbar');
		$this->load->view('layout/sidebar');
		$this->load->view('cursos/index',$data);
		$this->load->view('layout/footer');
		}else{
			redirect(base_url(), 'refresh');
		}
	}

	public function showAllCurso(){
		$result = $this->CursoModel->showAllCurso();
		echo json_encode($result);
	}

	public function showAllCursoForDate(){
		$result = $this->CursoModel->showAllCursoForDate();
		echo json_encode($result);
	}


	public function showAllCursoForDateAndName(){
		$result = $this->CursoModel->showAllCursoForDateAndName();
		echo json_encode($result);
	}


	public function showDataCurso(){
		$resultado = $this->db->get('cursos');
		echo json_encode($resultado->result());
	}

	public function saveCurso(){
		$result = $this->CursoModel->saveCurso();
		$msg['succes'] = false;
		$msg['type'] = 'add';
		if ($result) {
			$msg['succes'] = true;
		}
		echo json_encode($msg);
	}

	public function editCurso(){
		$result = $this->CursoModel->editCurso();
		echo json_encode($result);
	}

	public function viewNameCurso(){
		$result = $this->CursoModel->viewNameCurso();
		echo json_encode($result);
	}

	public function updateCurso(){
		$result = $this->CursoModel->updateCurso();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success']=true;
		}
		echo json_encode($msg);
	}


	public function deleteCurso(){
		$result = $this->CursoModel->deleteCurso();
		$msg['success'] = false;
		$msg['type'] = 'deleted';
		if($result){
			$msg['success']=true;
		}
		echo json_encode($msg);
	}

	//Horario..............
	public function saveHorarioForCurso(){
		$result = $this->HorarioModel->saveHorarioForCurso();
		$msg['succes'] = false;
		$msg['type'] = 'add';
		if ($result) {
			$msg['succes'] = true;
		}
		echo json_encode($msg);
	}

	public function deleHorarioForCurso(){
		$result = $this->HorarioModel->deleHorarioForCurso();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function showAllHorarioForCurso(){
		$result = $this->HorarioModel->showAllHorarioForCurso();
		echo json_encode($result);
	}

	public function showCursosForNotasAsistencia(){
		$result = $this->CursoModel->showCursosForNotasAsistencia();
		echo json_encode($result);
	}
}