<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Grp_csController extends CI_Controller
{


	public function __construct()
	{

		parent::__construct();
		$this->load->model("CursoModel");
		$this->load->model("CertificadoModel");
		$this->load->helper(array('form', 'url'));
		$this->load->model("SettingModel");
	}

	public function index(){
		$this->load->library('session');

		if($this->session->userdata('user')){
			$datacurs['nomcursos'] = $this->CursoModel->getCursos();
			$this->load->view('layout/header');
			$this->load->view('layout/topbar');
			$this->load->view('layout/sidebar');
			$this->load->view('grp_cs/index',$datacurs);
			$this->load->view('layout/footer');
		}else{
			redirect(base_url(), 'refresh');
		}
	}

	public function viewCurso(){
		$this->load->library('session');
		if($this->session->userdata('user')){
			$data['modelcertificados'] = $this->SettingModel->getModelCertificados();
			$this->load->view('layout/header');
			$this->load->view('layout/topbar');
			$this->load->view('layout/sidebar');
			$this->load->view('grp_cs/curso/index',$data);
			$this->load->view('layout/footer');
		}else{
			redirect(base_url(), 'refresh');
		}
	}

	//obtener el último certificado
	public function getUltimoCertificado(){
		$certificado = $this->CertificadoModel->getUltimoCertificado();
		echo json_encode($certificado);
	}

}