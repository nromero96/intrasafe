<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class LoginController extends CI_Controller {



	public function __construct()

	{

		parent::__construct();

		$this->load->helper('url');

		$this->load->model("LoginModel");

	}





	public function index()

	{



		$this->load->library('session');



		//restrict users to go back to login if session has been set

		if($this->session->userdata('user')){

			redirect(base_url('inicio'), 'refresh');



		}

		else{

			$this->load->view('layout/header');

			$this->load->view('login/index');

			$this->load->view('layout/footer');

		}

	}





	public function login(){


		$this->load->library('session');
		$output = array('error' => false);

 		$usuario= $this->input->post('txtusuario');

 		$password= $this->input->post('txtpassword');

		$data = $this->LoginModel->login($usuario, $password);

		if($data){

			$this->session->set_userdata('user', $data);
			$output['message'] = 'Iniciando sesión. Espere ...';
		}

		else{
			$output['error'] = true;

			$output['message'] = 'Login Inválido. Usuario no encontrado';
		}

 		echo json_encode($output); 
	}



		public function logout(){

		//load session library

		$this->load->library('session');

		$this->session->unset_userdata('user');

		redirect(base_url(), 'refresh');

	}

 







}