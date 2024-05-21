<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class GrupoEmpresaController extends CI_Controller
{


	public function __construct()
	{

		parent::__construct();
		$this->load->model("GrupoEmpresaModel");
		$this->load->helper(array('form', 'url'));
	}

	public function index(){
	
	}

	public function showAllForEmpresa(){
    	$resultlist = $this->GrupoEmpresaModel->showAllForEmpresa();
		echo json_encode($resultlist);
	}

	public function deleteGrupo(){
		$result = $this->GrupoEmpresaModel->deleteGrupo();
			$msg['success'] = false;
		$msg['type'] = 'deleted';
		if($result){
			$msg['success']=true;
		}
		echo json_encode($msg);
	}

	public function getListaHorario(){
		$resultlist = $this->GrupoEmpresaModel->getListaHorario();
		echo json_encode($resultlist);
	}

	public function verGrupoDetalle(){
     	$result = $this->GrupoEmpresaModel->verGrupoDetalle();
		echo json_encode($result);
	}

	public function editAlumnoNota(){
     	$result = $this->GrupoEmpresaModel->editAlumnoNota();
		echo json_encode($result);
	}

	public function updateAlumnoNota(){
        $config['upload_path']          = './uploads';
        $config['allowed_types']        = 'jpg|png|jpeg|gif|JPG|JPEG|GIF|PNG|JPEG';
        $config['max_size']             = 0;
      	$this->load->library('upload', $config);

		if(!$this->upload->do_upload("certificadouno")){
			$data = array('upload_data' => $this->upload->data());
			$field = array(
				'nota1' =>$this->input->post('txtnt1'),
				'nota2' =>$this->input->post('txtnt2'),
				'nota3' =>$this->input->post('txtnt3'),
				'nota4' =>$this->input->post('txtnt4'),
				'promedio' =>$this->input->post('txtpromnot'),
				'condicion' =>$this->input->post('slcondicion'),
				//'certificado1' => $data['upload_data']['file_name']
			);

        if($this->input->post('remove_cert1')) {
            if(file_exists('./uploads'.$this->input->post('remove_cert1')) && $this->input->post('remove_cert1'))
                unlink('./uploads'.$this->input->post('remove_cert1'));
               $data['certificado1'] = '';
        }



        if(!empty($_FILES['certificado1']['name'])){
            $upload = $this->_do_upload();
            $data['certificado1'] = $upload;

        }


			$id = $this->input->post('txtidalumno_grupo');
				$result = $this->GrupoEmpresaModel->updateAlumnoNota($id,$field);
	 			$msg['success'] = false;
	 			$msg['type'] = 'update';
	 			if($result){
	 				$msg['success']=true;
	 			}
	 			echo json_encode($msg);
		}else{
			$data = array('upload_data' => $this->upload->data());
			$field = array(
				'nota1' =>$this->input->post('txtnt1'),
				'nota2' =>$this->input->post('txtnt2'),
				'nota3' =>$this->input->post('txtnt3'),
				'nota4' =>$this->input->post('txtnt4'),
				'promedio' =>$this->input->post('txtpromnot'),
				'condicion' =>$this->input->post('slcondicion'),
				'certificado1' => $data['upload_data']['file_name']
			);

			$id = $this->input->post('txtidalumno_grupo');
				$result = $this->GrupoEmpresaModel->updateAlumnoNota($id,$field);
	 			$msg['success'] = false;
	 			$msg['type'] = 'update';
	 			if($result){
	 				$msg['success']=true;
	 			}
	 			echo json_encode($msg);
		}
	}


	public function updatePrecioTotal(){
		$result = $this->GrupoEmpresaModel->updatePrecioTotal();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success']=true;
		}
		echo json_encode($msg);
	}

	public function showAlumnoIEnGrupo(){
		$result1 = $this->GrupoEmpresaModel->showAlumnoIEnGrupo();
		echo json_encode($result1);
	}

	public function getDataAlumForCert(){
     	$result = $this->GrupoEmpresaModel->getDataAlumForCert();
		echo json_encode($result);
	}

	public function getBgCert(){
     	$result = $this->GrupoEmpresaModel->getBgCert();
		echo json_encode($result);
	}


	public function getNomEm(){
     	$result = $this->GrupoEmpresaModel->getNomEm();
		echo json_encode($result);
	}

	public function getNomPn(){
     	$result = $this->GrupoEmpresaModel->getNomPn();
		echo json_encode($result);
	}


	public function saveCertif(){
		$result = $this->GrupoEmpresaModel->saveCertif();
			$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success']=true;
		}
		echo json_encode($msg);
	}

	public function verifAlumEnGrupo(){
     	$result = $this->GrupoEmpresaModel->verifAlumEnGrupo();
		echo json_encode($result);
	}

	public function verificarCodigoCertificado(){
     	$result = $this->GrupoEmpresaModel->verificarCodigoCertificado();
		echo json_encode($result);
	}

	public function showAlumnosPorCurso(){
		$result = $this->GrupoEmpresaModel->showAlumnosPorCurso();
		echo json_encode($result);
	}

	public function showDataCurso(){
		$result = $this->GrupoEmpresaModel->showDataCurso();
		echo json_encode($result);
	}


	public function reabrirAlumnos(){

		//Actualizar estado Grupo
		$result1 = $this->GrupoEmpresaModel->reabrirGrupo();
		//Actualizar estado alumnos
		$result = $this->GrupoEmpresaModel->reabrirAlumnos();
		echo json_encode($result);
	}


	public function deleteCertificado(){
		$result = $this->GrupoEmpresaModel->deleteCertificado();
		echo json_encode($result);
	}

}