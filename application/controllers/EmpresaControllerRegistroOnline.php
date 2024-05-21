<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmpresaControllerRegistroOnline extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$this->load->view('empresas_registro_online/index');
	}

	public function saveEmpresaRegistroOnline(){
		$result = $this->EmpresaModelRegistroOnline->saveEmpresaRegistroOnline();
		$msg['succes'] = false;
		$msg['type'] = 'add';
		if ($result) {
			$msg['succes'] = true;
		}
		echo json_encode($msg);
		 }

}