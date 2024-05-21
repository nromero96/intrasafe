<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class GrupoController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("emp/GrupoModel");
		$this->load->model("emp/ReservaModel");
	}

	public function index(){
		$this->load->library('session');
		if($this->session->userdata('userempresa')){
			$datacurso['nomcurso'] = $this->GrupoModel->getCurso();


			$this->load->view('emp/e_layout/header');
			$this->load->view('emp/e_layout/topbar');
			$this->load->view('emp/e_layout/sidebar');
			$this->load->view('emp/e_grupos/index',$datacurso);
			$this->load->view('emp/e_layout/footer');

		}else{
			redirect(base_url('emp'), 'refresh');
		}
	}



	public function showAllGrupoForEmpresa(){
        $userempresa = $this->session->userdata('userempresa');
        extract($userempresa);

        $idempresa = $id_empresa;

		$result = $this->GrupoModel->showAllGrupoForEmpresa($idempresa);
		echo json_encode($result);
	}


	public function saveGrupoForEmpresa(){

		$idreserva = $this->input->post('txtidReserva');
		$this->ReservaModel->grupCreaParaReserva($idreserva);

		$result = $this->GrupoModel->saveGrupoForEmpresa();
		$msg['succes'] = false;
		$msg['type'] = 'add';
		if ($result) {
			$msg['succes'] = true;
		}
		echo json_encode($msg);
	}

	public function verGrupoDetalle(){
     		$result = $this->GrupoModel->verGrupoDetalle();
			echo json_encode($result);
	}



	public function showDataAlumno(){
		$resultado = $this->db->get('alumnos');
		echo json_encode($resultado->result());
	}

	public function saveAlumnoAGrupo(){
	    
	    $config['upload_path']          = './uploads/fotos';
        $config['allowed_types']        = 'png|PNG|jpg|JPG';
        $config['max_size']             = 0;
      	$this->load->library('upload', $config);

      	if(!$this->upload->do_upload("fotoperfil")){
      		$datafoto = array('upload_data' => $this->upload->data());
            
            /* Data */
      		$vtipodocumento = $this->input->post('txttipodocumento');
		    $vnumerodocumento = $this->input->post('txtnumerodocumento');
		    $vapellidos = $this->input->post('txtapellidos');
	 	    $vnombres = $this->input->post('txtnombres');
	 	    $vfnacimiento = $this->input->post('txtfnacimiento');
	 	    $vtelefono = $this->input->post('txttelefono');
	 	    $vemail = $this->input->post('txtemail');
	 	    $vid_curso = $this->input->post('texidcurso');
	 	    $vcargo = $this->input->post('txtcargo');
	 	    $vfotoperfil = '';
	 	    $vid_grupo = $this->input->post('texidgrupo');
	 	    

      		if(!empty($_FILES['fotoperfil']['name'])){
                $upload = $this->_do_upload();
                $datafoto['fotoperfil'] = $upload;
        	}

      		$result = $this->GrupoModel->saveAlumnoAGrupo($vtipodocumento,$vnumerodocumento,$vapellidos,$vnombres,$vfnacimiento,$vtelefono,$vemail,$vid_curso,$vcargo,$vfotoperfil,$vid_grupo);
			$msg['succes'] = false;
			$msg['type'] = 'add';
			if ($result) {
			$msg['succes'] = true;
			}
			echo json_encode($msg);

      	}else{
      		$datafoto = array('upload_data' => $this->upload->data());
      		
			/* Data */
      		$vtipodocumento = $this->input->post('txttipodocumento');
		    $vnumerodocumento = $this->input->post('txtnumerodocumento');
		    $vapellidos = $this->input->post('txtapellidos');
	 	    $vnombres = $this->input->post('txtnombres');
	 	    $vfnacimiento = $this->input->post('txtfnacimiento');
	 	    $vtelefono = $this->input->post('txttelefono');
	 	    $vemail = $this->input->post('txtemail');
	 	    $vid_curso = $this->input->post('texidcurso');
	 	    $vcargo = $this->input->post('txtcargo');
	 	    $vfotoperfil = $datafoto['upload_data']['file_name'];
	 	    $vid_grupo = $this->input->post('texidgrupo');
			
      		$result = $this->GrupoModel->saveAlumnoAGrupo($vtipodocumento,$vnumerodocumento,$vapellidos,$vnombres,$vfnacimiento,$vtelefono,$vemail,$vid_curso,$vcargo,$vfotoperfil,$vid_grupo);
			$msg['succes'] = false;
			$msg['type'] = 'add';
			if ($result) {
			$msg['succes'] = true;
			}
			echo json_encode($msg);
      	}
	    
		
    }

	public function  showAlumnoIEnGrupo(){
		$result1 = $this->GrupoModel->showAlumnoIEnGrupo();
		echo json_encode($result1);
	}

	public function countAlumnoPorGrupo(){
		$result1 = $this->GrupoModel->countAlumnoPorGrupo();
		echo json_encode($result1);
	}

	public function confirmarAlumnos(){

		//Actualizar estado Grupo
		$result1 = $this->GrupoModel->cerrarGrupo();
		//Actualizar estado alumnos
		$result = $this->GrupoModel->confirmarAlumnos();
		$msg['succes'] = false;
		$msg['type'] = 'fonfirmado';
		if ($result) {
			$msg['succes'] = true;
		}
			echo json_encode($msg);
		}
	

	public function deleteAlumnoDelCurso(){
		$result = $this->GrupoModel->deleteAlumnoDelCurso();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function editAlumno(){
		$result1 = $this->GrupoModel->editAlumno();
		echo json_encode($result1);
	}

}