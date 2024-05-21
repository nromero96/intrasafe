<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model("emp/LoginModel");
	}

	public function index()
	{

		$this->load->library('session');

		//restrict users to go back to login if session has been set
		if($this->session->userdata('userempresa')){
			redirect(base_url('emp/e_cursos'), 'refresh');
		}
		else{
			$this->load->view('emp/e_layout/header');
			$this->load->view('emp/e_login/index');
			$this->load->view('emp/e_layout/footer');
		}
	}


	public function loginEmpresa(){

		//load session library
		$this->load->library('session');
		$output = array('error' => false);

 		$usuario= $this->input->post('txtusuario');
 		$password= $this->input->post('txtpassword');

		$data = $this->LoginModel->loginEmpresa($usuario, $password);

		if($data){
			$this->session->set_userdata('userempresa', $data);
			$output['message'] = 'Iniciando sesión. Espere ...';
		}
		else{
			$output['error'] = true;
			$output['message'] = 'Login Inválido. Usuario no encontrado';
		}
		echo json_encode($output); 
	}

		public function logoutEmpresa(){

		//load session library
		$this->load->library('session');
		$this->session->unset_userdata('userempresa');
		redirect(base_url('emp'), 'refresh');
	}
}