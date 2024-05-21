<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class InicioController extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model("InicioModel");
	}

	public function index(){

		//$datacurso['rankingcurso'] = $this->InicioModel->rankingCurso(); 
		$this->load->library('session');
		if($this->session->userdata('user')){

		$data['allcurso'] = $this->InicioModel->allCurso();
		$data['allalumno'] = $this->InicioModel->allAlumno();
		$data['allgrupo'] = $this->InicioModel->allGrupo();
		$data['allempresa'] = $this->InicioModel->allEmpresa();


		$this->load->view('layout/header');
		$this->load->view('layout/topbar');
		$this->load->view('layout/sidebar');
		$this->load->view('inicio/index', $data);
		$this->load->view('layout/footer');

		
		}else{
			redirect(base_url(), 'refresh');
		}

	}

}