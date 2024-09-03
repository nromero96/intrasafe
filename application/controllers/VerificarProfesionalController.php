<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class VerificarProfesionalController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->Model('VerificarProfesionalModel');
	}

	public function index(){
		$this->load->view('verificar_al_profesional/index');
	}



	public function getDataAlumno(){
		$result = $this->VerificarProfesionalModel->getDataAlumno();
		echo json_encode($result);
	}

	public function showListCertForAlumno(){
		$result = $this->VerificarProfesionalModel->showListCertForAlumno();
		echo json_encode($result);
	}

	public function showListCertForAlumnoInternacional(){
		$result = $this->VerificarProfesionalModel->showListCertForAlumnoInternacional();
		echo json_encode($result);
	}

}
