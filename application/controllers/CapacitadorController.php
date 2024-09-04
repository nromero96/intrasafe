<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CapacitadorController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("CapacitadorModel");
	}

	public function index(){
		$this->load->library('session');
		if($this->session->userdata('user')){
			$this->load->view('layout/header');
			$this->load->view('layout/topbar');
			$this->load->view('layout/sidebar');
			$this->load->view('capacitadores/index');
			$this->load->view('layout/footer');
		}else{
			redirect(base_url('/'), 'refresh');
		}
	}

	public function showAllCapacitador(){
		$result = $this->CapacitadorModel->showAllCapacitador();
		echo json_encode($result);
	}

	public function saveCapacitador(){

		$config['upload_path']          = './uploads/firmas';
        $config['allowed_types']        = 'png|PNG|jpg|JPG';
        $config['max_size']             = 0;
      	$this->load->library('upload', $config);
      	
      	$this->upload->do_upload("firmacapacitador");
      	$datfirm = array('upload_data' => $this->upload->data());

		$result = $this->CapacitadorModel->saveCapacitador($datfirm);
		$msg['succes'] = false;
		$msg['type'] = 'add';
		if ($result) {
			$msg['succes'] = true;
		}
		echo json_encode($msg);
	}


	public function editCapacitador(){
		$result = $this->CapacitadorModel->editCapacitador();
		echo json_encode($result);
	}

	public function updateCapacitador(){
		$config['upload_path']          = './uploads/firmas';
        $config['allowed_types']        = 'png|PNG|jpg|JPG';
        $config['max_size']             = 0;
      	$this->load->library('upload', $config);

      	if(!$this->upload->do_upload("firmacapacitador")){
      		$datfirm = array('upload_data' => $this->upload->data());

      		$field = array(
				'dni_capacitador' =>$this->input->post('txtnumdni'),
				'apellidos_capacitador' =>$this->input->post('txtapellidos'),
				'nombres_capacitador' =>$this->input->post('txtnombres'),
				'profesion_capacitador' =>$this->input->post('txtprofesion'),
				'cod_cip_capacitador' =>$this->input->post('txtcod_cip'),
				'telefono_capacitador' =>$this->input->post('txttelefono'),
				'email_capacitador' =>$this->input->post('txtemail'),
				//'firma_capacitador' => $datfirm['upload_data']['file_name'] 
			);

			if($this->input->post('remove_cert1')) {
            	if(file_exists('./uploads/firmas'.$this->input->post('remove_cert1')) && $this->input->post('remove_cert1'))
                	unlink('./uploads/firmas'.$this->input->post('remove_cert1'));
               		$data['firma_capacitador'] = '';
        	}

      		if(!empty($_FILES['firma_capacitador']['name'])){
            $upload = $this->_do_upload();
            $datfirm['firma_capacitador'] = $upload;
        	}

      		$result = $this->CapacitadorModel->updateCapacitador($field);
			$msg['success'] = false;
			$msg['type'] = 'update';
			if($result){
			$msg['success']=true;
			}
			echo json_encode($msg);

      	}else{
      		$datfirm = array('upload_data' => $this->upload->data());
      		$field = array(
				'dni_capacitador' =>$this->input->post('txtnumdni'),
				'apellidos_capacitador' =>$this->input->post('txtapellidos'),
				'nombres_capacitador' =>$this->input->post('txtnombres'),
				'profesion_capacitador' =>$this->input->post('txtprofesion'),
				'telefono_capacitador' =>$this->input->post('txttelefono'),
				'email_capacitador' =>$this->input->post('txtemail'),
				'firma_capacitador' => $datfirm['upload_data']['file_name'] 
			);
			
      		$result = $this->CapacitadorModel->updateCapacitador($field);
			$msg['success'] = false;
			$msg['type'] = 'update';
			if($result){
			$msg['success']=true;
			}
			echo json_encode($msg);
      	}
	}


	//delete capacitador
	public function deleteCapacitador(){
		// Obtener usuario logeado 
		$user = $this->session->userdata('user');
		$id_rol = $user['id_rol'];
	
		// Verificar si $id_rol es 1
		if($id_rol == 1){
			$result = $this->CapacitadorModel->deleteCapacitador();
			
			if($result == 'has_courses'){
				$msg['message'] = 'El capacitador tiene cursos asociados, no se puede eliminar';
			} else if($result == 'true'){
				$msg['message'] = 'eliminado';
			} else {
				$msg['message'] = 'Error al eliminar alumno';
			}

		} else {
			$msg['message'] = 'No tienes permisos para eliminar alumnos, contacta al administrador';
		}
		
		echo json_encode($msg);
	}

}
