<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Grp_pnController extends CI_Controller
{


	public function __construct()
	{

		parent::__construct();
		$this->load->model("GrupoEmpresaModel");
		$this->load->model("SettingModel");
		$this->load->helper(array('form', 'url'));
	}

	public function index(){
		$this->load->library('session');

		if($this->session->userdata('user')){
			$datapn['nombrepn'] = $this->GrupoEmpresaModel->getPersonaNatural();
			$this->load->view('layout/header');
			$this->load->view('layout/topbar');
			$this->load->view('layout/sidebar');
			$this->load->view('grp_pn/index',$datapn);
			$this->load->view('layout/footer');
		}else{
			redirect(base_url(), 'refresh');
		}
	}

	public function viewGrupos(){
		$this->load->library('session');
		if($this->session->userdata('user')){
			$data['modelcertificados'] = $this->SettingModel->getModelCertificados();
			$this->load->view('layout/header');
			$this->load->view('layout/topbar');
			$this->load->view('layout/sidebar');
			$this->load->view('grp_pn/grupos/index',$data);
			$this->load->view('layout/footer');
		}else{
			redirect(base_url(), 'refresh');
		}
	}


}