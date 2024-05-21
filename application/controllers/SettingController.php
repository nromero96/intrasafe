<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SettingController extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model("SettingModel");
	}

	public function index(){

		$this->load->library('session');
		if($this->session->userdata('user')){
			$this->load->view('layout/header');
			$this->load->view('layout/topbar');
			$this->load->view('layout/sidebar');
			$this->load->view('settings/index');
			$this->load->view('layout/footer');
		}else{
			redirect(base_url(), 'refresh');
		}
	}
	
	
	public function showAllFirmasGerente(){
		$result = $this->SettingModel->showAllFirmasGerente();
		echo json_encode($result);
	}
	
	public function saveFirmaGerente(){
	    $config['upload_path']          = './uploads/firmas';
        $config['allowed_types']        = 'png|PNG|jpg|JPG';
        $config['max_size']             = 0;
      	$this->load->library('upload', $config);
      	
      	$this->upload->do_upload("file_firma_gerente");
      	
      	$datfirm = array('upload_data' => $this->upload->data());
      	$field = array(
			'nombres_gerente' =>$this->input->post('txtnombregerente'),
			'apellidos_gerente' =>$this->input->post('txtapellidogerete'),
			'cargo' =>$this->input->post('txtcargo'),
			'gerenteprofesion' =>$this->input->post('txtprofesion'),
			'gerentecip' =>$this->input->post('txtcodcip'),
			'img_firma_gerente' => $datfirm['upload_data']['file_name'] 
		);
			
      	$result = $this->SettingModel->saveFirmaGerente($field);
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
		    $msg['success']=true;
		}
		echo json_encode($msg);
	}


	public function updateFirmaGerente(){
		$config['upload_path']          = './uploads/firmas';
        $config['allowed_types']        = 'png|PNG|jpg|JPG';
        $config['max_size']             = 0;
      	$this->load->library('upload', $config);

      	if(!$this->upload->do_upload("file_firma_gerente")){
      		$datfirm = array('upload_data' => $this->upload->data());

      		$field = array(
				'nombres_gerente' =>$this->input->post('txtnombregerente'),
				'apellidos_gerente' =>$this->input->post('txtapellidogerete'),
				'cargo' =>$this->input->post('txtcargo'),
				'gerenteprofesion' =>$this->input->post('txtprofesion'),
			    'gerentecip' =>$this->input->post('txtcodcip')
			);

			if($this->input->post('remove_cert1')) {
            	if(file_exists('./uploads/firmas'.$this->input->post('remove_cert1')) && $this->input->post('remove_cert1'))
                	unlink('./uploads/firmas'.$this->input->post('remove_cert1'));
               		$data['img_firma_gerente'] = '';
        	}

      		if(!empty($_FILES['img_firma_gerente']['name'])){
            $upload = $this->_do_upload();
            $datfirm['img_firma_gerente'] = $upload;
        	}

      		$result = $this->SettingModel->updateFirmaGerente($field);
			$msg['success'] = false;
			$msg['type'] = 'update';
			if($result){
			$msg['success']=true;
			}
			echo json_encode($msg);

      	}else{
      		$datfirm = array('upload_data' => $this->upload->data());
      		$field = array(
				'nombres_gerente' =>$this->input->post('txtnombregerente'),
				'apellidos_gerente' =>$this->input->post('txtapellidogerete'),
				'cargo' =>$this->input->post('txtcargo'),
				'gerenteprofesion' =>$this->input->post('txtprofesion'),
			    'gerentecip' =>$this->input->post('txtcodcip'),
				'img_firma_gerente' => $datfirm['upload_data']['file_name'] 
			);
			
      		$result = $this->SettingModel->updateFirmaGerente($field);
			$msg['success'] = false;
			$msg['type'] = 'update';
			if($result){
			$msg['success']=true;
			}
			echo json_encode($msg);
      	}
	}
	
	public function editFirmaGerente(){
	    $result = $this->SettingModel->editFirmaGerente();
	    echo json_encode($result);
	}


	public function saveBgCertificado(){
		$config['upload_path']          = './uploads/bgcertificado';
        $config['allowed_types']        = 'png|PNG|jpg|JPG';
        $config['max_size']             = 0;
      	$this->load->library('upload', $config);

      	if(!$this->upload->do_upload("file_bg_cerficado")){
      		$datfirm = array('upload_data' => $this->upload->data());

      		$field = array(

			);

			if($this->input->post('remove_cert1')) {
            	if(file_exists('./uploads/bgcertificado'.$this->input->post('remove_cert1')) && $this->input->post('remove_cert1'))
                	unlink('./uploads/bgcertificado'.$this->input->post('remove_cert1'));
               		$data['bg_cerficado_imagen'] = '';
        	}

      		if(!empty($_FILES['bg_cerficado_imagen']['name'])){
            $upload = $this->_do_upload();
            $datfirm['bg_cerficado_imagen'] = $upload;
        	}

      		$result = $this->SettingModel->saveBgCertificado($field);
			$msg['success'] = false;
			$msg['type'] = 'update';
			if($result){
			$msg['success']=true;
			}
			echo json_encode($msg);

      	}else{
      		$datfirm = array('upload_data' => $this->upload->data());
      		$field = array(
				'bg_cerficado_imagen' => $datfirm['upload_data']['file_name'] 
			);
			
      		$result = $this->SettingModel->saveBgCertificado($field);
			$msg['success'] = false;
			$msg['type'] = 'update';
			if($result){
			$msg['success']=true;
			}
			echo json_encode($msg);
      	}
	}

	public function viewBgCertificado(){
		$result = $this->SettingModel->viewBgCertificado();
		echo json_encode($result);
	}



}