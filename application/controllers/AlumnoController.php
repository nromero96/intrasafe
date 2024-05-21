<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class AlumnoController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("AlumnoModel");
	}

	public function index(){
		$this->load->library('session');

		if($this->session->userdata('user')){
			$dataemp['nomempresa'] = $this->AlumnoModel->getEmpresa();

			$this->load->view('layout/header');
			$this->load->view('layout/topbar');
			$this->load->view('layout/sidebar');
			$this->load->view('alumnos/index', $dataemp);
			$this->load->view('layout/footer');
		}else{
			redirect(base_url(), 'refresh');
		}
	}

	public function showAllAlumno(){
		$result = $this->AlumnoModel->showAllAlumno();
		echo json_encode($result);
	}

	public function showAllForEmpresa(){
    	$resultlist = $this->AlumnoModel->showAllForEmpresa();
		echo json_encode($resultlist);
	}

	public function editAlumno(){
		$result = $this->AlumnoModel->editAlumno();
		echo json_encode($result);
	}

	public function updateAlumno(){

		$config['upload_path']          = './uploads/fotos';
        $config['allowed_types']        = 'png|PNG|jpg|JPG';
        $config['max_size']             = 0;
      	$this->load->library('upload', $config);

      	if(!$this->upload->do_upload("fotoperfil")){
      		$datfirm = array('upload_data' => $this->upload->data());

      		$field = array(
				'tipodocumento' =>$this->input->post('txttipodocumento'),
				'numerodocumento' =>$this->input->post('txtnumerodocumento'),
				'apellidos' =>$this->input->post('txtapellidos'),
				'nombres' =>$this->input->post('txtnombres'),
				'fnacimiento' =>$this->input->post('txtfnacimiento'),
				'telefono' =>$this->input->post('txttelefono'),
				'email' =>$this->input->post('txtemail')
			);

      		if(!empty($_FILES['fotoperfil']['name'])){
            	$upload = $this->_do_upload();
            	$datfirm['fotoperfil'] = $upload;
        	}

			$result = $this->AlumnoModel->updateAlumno($field);
			$msg['success'] = false;
			$msg['type'] = 'update';
			if($result){
				$msg['success']=true;
			}
			echo json_encode($msg);

      	}else{
      		$datfirm = array('upload_data' => $this->upload->data());
      	
			$field = array(
				'tipodocumento' =>$this->input->post('txttipodocumento'),
				'numerodocumento' =>$this->input->post('txtnumerodocumento'),
				'apellidos' =>$this->input->post('txtapellidos'),
				'nombres' =>$this->input->post('txtnombres'),
				'fnacimiento' =>$this->input->post('txtfnacimiento'),
				'telefono' =>$this->input->post('txttelefono'),
				'email' =>$this->input->post('txtemail'),
				'fotoperfil' => $datfirm['upload_data']['file_name'] 
			);
			
			$result = $this->AlumnoModel->updateAlumno($field);
			$msg['success'] = false;
			$msg['type'] = 'update';
			if($result){
				$msg['success']=true;
			}
			echo json_encode($msg);
      	}


	}
}