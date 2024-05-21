<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RptController extends CI_Controller
{


	public function __construct()
	{

		parent::__construct();
		$this->load->model("emp/RptModel");
		$this->load->helper(array('form', 'url'));
	}

	public function index(){
		$this->load->library('session');

		if($this->session->userdata('userempresa')){
			$this->load->view('emp/e_layout/header');
			$this->load->view('emp/e_layout/topbar');
			$this->load->view('emp/e_layout/sidebar');
			$this->load->view('emp/e_rpt/index');
			$this->load->view('emp/e_layout/footer');
		}else{
			redirect(base_url(), 'refresh');
		}
	}

	//Vista Lista de cursos para ver alumnos======================
	public function viwListaCursos(){
		$this->load->library('session');
		if($this->session->userdata('userempresa')){
			$this->load->view('emp/e_layout/header');
			$this->load->view('emp/e_layout/topbar');
			$this->load->view('emp/e_layout/sidebar');
			$this->load->view('emp/e_rpt/listacursos/index');
			$this->load->view('emp/e_layout/footer');
		}else{
			redirect(base_url(), 'refresh');
		}
	}

	public function viewCursosAlumnos(){
		$this->load->library('session');
		if($this->session->userdata('userempresa')){
			$this->load->view('emp/e_layout/header');
			$this->load->view('emp/e_layout/topbar');
			$this->load->view('emp/e_layout/sidebar');
			$this->load->view('emp/e_rpt/listacursos/curso/index'); 
			$this->load->view('emp/e_layout/footer');
		}else{
			redirect(base_url(), 'refresh');
		}
	}

	public function showListaCurso(){
		$idempresa = $this->input->get('idempresa');
		$result = $this->RptModel->showListaCurso($idempresa);
		echo json_encode($result);
	}

	public function showDataCurso(){
		$id_grupo = $this->input->get('idcg');
		$result = $this->RptModel->showDataCurso($id_grupo);
		echo json_encode($result);
	}


	public function showListAlumnosPorGrupo(){
		$id_grupo = $this->input->get('idcg');
		$result = $this->RptModel->showListAlumnosPorGrupo($id_grupo);
		echo json_encode($result);
	}

}