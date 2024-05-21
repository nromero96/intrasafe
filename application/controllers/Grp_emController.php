<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Grp_emController extends CI_Controller
{


	public function __construct()
	{

		parent::__construct();
		$this->load->model("GrupoEmpresaModel");
		$this->load->helper(array('form', 'url'));
	}

	public function index(){
		$this->load->library('session');

		if($this->session->userdata('user')){
			$dataemp['nomempresa'] = $this->GrupoEmpresaModel->getEmpresa();
			$this->load->view('layout/header');
			$this->load->view('layout/topbar');
			$this->load->view('layout/sidebar');
			$this->load->view('grp_em/index',$dataemp);
			$this->load->view('layout/footer');
		}else{
			redirect(base_url(), 'refresh');
		}
	}

	public function viewGrupos(){
		$this->load->library('session');
		if($this->session->userdata('user')){
			$this->load->view('layout/header');
			$this->load->view('layout/topbar');
			$this->load->view('layout/sidebar');
			$this->load->view('grp_em/grupos/index');
			$this->load->view('layout/footer');
		}else{
			redirect(base_url(), 'refresh');
		}
	}

}