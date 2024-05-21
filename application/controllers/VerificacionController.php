<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class VerificacionController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("VerificacionModel");
	}

	public function index(){
	}

	public function vReservas(){


		$result = $this->VerificacionModel->vReservas();
		echo json_encode($result);
	}

	public function vCursos(){
		$result = $this->VerificacionModel->vCursos();
		echo json_encode($result);
	}
}