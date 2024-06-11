<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CertificadoInternacionalController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("CertificadoInternacionalModel");
		$this->load->library('pagination');
		$this->config->load('pagination');
	}

	public function index() {
		$this->load->library('session');
	
		if ($this->session->userdata('user')) {
	
			// Obtener los valores de búsqueda desde la URL
			$search_term = trim($this->input->get('search'));
	
			// Configuración específica de la paginación para esta acción
			$config = $this->config->item('pagination');
			$base_url = base_url('certificados-internacionales') . '?search=' . urlencode($search_term);
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
			$result = $this->CertificadoInternacionalModel->search($search_term, $config['per_page'], $offset);
	
			// Aquí ajustamos el total_rows con el total de resultados
			$config['total_rows'] = $result['total_rows'];
			$this->pagination->initialize($config);
	
			$data['certificados'] = $result['results'];
	
			// Obtener el número de registros mostrados actualmente
			$start_record = ($page - 1) * $config['per_page'] + 1;
			$end_record = $start_record + count($data['certificados']) - 1;
	
			// Obtener los enlaces de paginación
			$data['pagination_links'] = $this->pagination->create_links();
	
			// Total de registros
			$total_records = $config['total_rows'];
	
			// Mensaje de información
			$data['info_message'] = "Mostrando registros del $start_record al $end_record de un total de $total_records registros.";
	
			$this->load->view('layout/header');
			$this->load->view('layout/topbar');
			$this->load->view('layout/sidebar');
			$this->load->view('certificado_internacional/index', $data);
			$this->load->view('layout/footer');
		} else {
			redirect(base_url(), 'refresh');
		}
	}

	public function buscarAlumnos() {
        $query = $this->input->post('queryalumno');
        $result = $this->CertificadoInternacionalModel->buscarAlumnos($query);
        echo json_encode($result);
    }


	public function addCertificado(){
		$result = $this->CertificadoInternacionalModel->addCertificado();
		echo json_encode($result);
	}

	public function editCertificado(){
		$result = $this->CertificadoInternacionalModel->editCertificado();
		echo json_encode($result);
	}

	public function updateCertificado(){
		$result = $this->CertificadoInternacionalModel->updateCertificado();
		echo json_encode($result);
	}

	public function deleteCertificado(){
		$result = $this->CertificadoInternacionalModel->deleteCertificado();
		
		if($result == 'true'){
			$msg['message'] = 'eliminado';
		} else {
			$msg['message'] = 'Error al eliminar alumno';
		}

		echo json_encode($msg);

	}

}