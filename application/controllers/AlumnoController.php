<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class AlumnoController extends CI_Controller
{

	public function __construct() {
		parent::__construct();
		$this->load->model("AlumnoModel");
		$this->load->library('pagination');
		$this->config->load('pagination');
	}
	
	public function index() {
		$this->load->library('session');
	
		if ($this->session->userdata('user')) {
			$data['nomempresa'] = $this->AlumnoModel->getEmpresa();
			$data['selectempresas'] = $this->AlumnoModel->getEmpresaSelect();
	
			// Obtener los valores de búsqueda desde la URL
			$search_term = trim($this->input->get('search'));
			$foremp = $this->input->get('foremp'); // Nuevo campo
	
			// Configuración específica de la paginación para esta acción
			$config = $this->config->item('pagination');
			$base_url = base_url('alumnos') . '?search=' . urlencode($search_term) . '&foremp=' . urlencode($foremp);
			if ($this->input->get('listforpage')) {
				$base_url .= '&listforpage=' . $this->input->get('listforpage');
			}
			$config['base_url'] = $base_url;
	
			// Obtener el valor de 'listforpage' desde la URL, por defecto 10
			$config['per_page'] = $this->input->get('listforpage') ? $this->input->get('listforpage') : 10;
	
			// Ajuste para la paginación de enlaces de un solo incremento
			$config['use_page_numbers'] = TRUE;
	
			// Para mantener los parámetros de búsqueda en los enlaces de paginación
			$config['page_query_string'] = TRUE;
			$config['query_string_segment'] = 'page';
	
			// Obtener la página actual de la consulta GET y calcular el offset
			$page = ($this->input->get('page')) ? $this->input->get('page') : 1;
			$offset = ($page - 1) * $config['per_page'];
	
			// Obtener los registros de acuerdo a la página actual
			$result = $this->AlumnoModel->search($search_term, $foremp, $config['per_page'], $offset);
	
			// Aquí ajustamos el total_rows con el total de resultados
			$config['total_rows'] = $result['total_rows'];
			$this->pagination->initialize($config);
	
			$data['alumnos'] = $result['results'];
	
			// Obtener el número de registros mostrados actualmente
			$start_record = ($page - 1) * $config['per_page'] + 1;
			$end_record = $start_record + count($data['alumnos']) - 1;
	
			// Obtener los enlaces de paginación
			$data['pagination_links'] = $this->pagination->create_links();
	
			// Total de registros
			$total_records = $config['total_rows'];
	
			// Mensaje de información
			$data['info_message'] = "Mostrando registros del $start_record al $end_record de un total de $total_records registros.";
	
			$this->load->view('layout/header');
			$this->load->view('layout/topbar');
			$this->load->view('layout/sidebar');
			$this->load->view('alumnos/index', $data);
			$this->load->view('layout/footer');
		} else {
			redirect(base_url(), 'refresh');
		}
	}
	
	
	
	
	

	public function showAllAlumno(){
		$result = $this->AlumnoModel->showAllAlumno();
		echo json_encode($result);
	}

	// public function showAllForEmpresa(){
    // 	$resultlist = $this->AlumnoModel->showAllForEmpresa();
	// 	echo json_encode($resultlist);
	// }

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


	//delete alumno
	public function deleteAlumno(){
		// Obtener usuario logeado 
		$user = $this->session->userdata('user');
		$id_rol = $user['id_rol'];
	
		// Verificar si $id_rol es 1
		if($id_rol == 1){
			$result = $this->AlumnoModel->deleteAlumno();
			
			if($result == 'has_courses'){
				$msg['message'] = 'El alumno tiene cursos asignados, no se puede eliminar';
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