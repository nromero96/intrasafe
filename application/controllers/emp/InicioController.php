<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InicioController extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model("emp/InicioModel");
		
	}

	public function index(){

		$this->load->library('session');

		if($this->session->userdata('userempresa')){

        	$userempresa = $this->session->userdata('userempresa');
        	extract($userempresa);

        	$idempresa = $id_empresa;
        	$estadocurso = '1';

			$data['allAlumnoForEmpresa'] = $this->InicioModel->showallAlumnoForEmpresa($idempresa);
			$data['allGrupoForEmpresa'] = $this->InicioModel->showallGrupoForEmpresa($idempresa);
			$data['allCursoDisponible'] = $this->InicioModel->showallCursoDisponible($estadocurso);


			$this->load->view('emp/e_layout/header');
			$this->load->view('emp/e_layout/topbar');
			$this->load->view('emp/e_layout/sidebar');
			$this->load->view('emp/e_inicio/index', $data);
			$this->load->view('emp/e_layout/footer');

		}else{
			redirect(base_url('emp'), 'refresh');
		}
		
		
	}

}