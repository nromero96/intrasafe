<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CertificadoInternacionalModel extends CI_Model
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	
    // Método para contar el número total de registros en la tabla de alumnos
    public function get_count() {
        return $this->db->count_all('certificado_intern');
    }

    // Método para obtener los registros de acuerdo a la página actual
    public function get_records($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('certificado_intern');

        if ($query->num_rows() > 0) {
            return $query->result();
        }

        return [];
    }

    // Método para buscar registros
	public function search($search_term, $limit, $offset) {
		// Inicia el cacheo de la consulta
		$this->db->start_cache();
	
		// Si hay un término de búsqueda, aplicar `LIKE`
		if (!empty($search_term)) {
			$this->db->group_start(); // Abre un grupo para agrupar los likes con OR
			$this->db->like('numerodocumento', $search_term);
			$this->db->or_like('alumnos.nombres', $search_term);
			$this->db->or_like('alumnos.apellidos', $search_term);
            $this->db->or_like('certificado_intern.curso', $search_term);
            $this->db->or_like('certificado_intern.expira', $search_term);
			$this->db->group_end(); // Cierra el grupo
		}
	
		$this->db->select('certificado_intern.*, alumnos.numerodocumento as alumno_numerodocumento, alumnos.nombres AS alumno_nombre, alumnos.apellidos AS alumno_apellido, alumnos.email AS alumno_email'); 
        $this->db->from('certificado_intern');
        $this->db->join('alumnos', 'alumnos.id_alumno = certificado_intern.id_alumno'); // INNER JOIN con la tabla alumnos

		$this->db->stop_cache(); // Detiene el cacheo de la consulta
	
		// Obtener el total de resultados (sin paginación)
		$total_query = $this->db->get();
		//order
		$this->db->order_by('certificado_intern.id','desc');
		$total_rows = $total_query->num_rows();
	
		// Aplicar limit y offset para la paginación
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
	
		$this->db->flush_cache(); // Limpia el cacheo de la consulta
	
		// Devolver los resultados y el total de filas
		return ['results' => $query->result(), 'total_rows' => $total_rows];
	}
	

    // Método para contar el número total de resultados de búsqueda
    public function count_search_results($search_term, $foremp) {
		// Inicia el cacheo de la consulta
		$this->db->start_cache();

		// Si hay un término de búsqueda, aplicar `LIKE`
		if (!empty($search_term)) {
			$this->db->group_start(); // Abre un grupo para agrupar los likes con OR
			$this->db->like('numerodocumento', $search_term);
			$this->db->or_like('alumnos.nombres', $search_term);
			$this->db->or_like('alumnos.apellidos', $search_term);
            $this->db->or_like('certificado_intern.curso', $search_term);
            $this->db->or_like('certificado_intern.expira', $search_term);
			$this->db->group_end(); // Cierra el grupo
		}

		$this->db->select('certificado_intern.*, alumnos.numerodocumento as alumno_numerodocumento, alumnos.nombres AS alumno_nombre, alumnos.apellidos AS alumno_apellido, alumnos.email AS alumno_email'); 
        $this->db->from('certificado_intern');
        $this->db->join('alumnos', 'alumnos.id_alumno = certificado_intern.id_alumno'); // INNER JOIN con la tabla alumnos


		$this->db->stop_cache(); // Detiene el cacheo de la consulta

		// Obtener el total de resultados (sin paginación)
		$total_query = $this->db->get();
		$total_rows = $total_query->num_rows();

		$this->db->flush_cache(); // Limpia el cacheo de la consulta

		return $total_rows;
	}

    //get Alumnos
    public function buscarAlumnos($query) {
        // Dividir la consulta en palabras individuales
        $palabras = explode(' ', $query);
    
        // Construir la consulta utilizando bucles para cada palabra
        $this->db->select('id_alumno, numerodocumento, nombres, apellidos');
        $this->db->from('alumnos');
        $this->db->group_start();
        foreach ($palabras as $palabra) {
            $this->db->group_start();
            $this->db->like('nombres', $palabra);
            $this->db->or_like('apellidos', $palabra);
            $this->db->or_like('numerodocumento', $palabra);
            $this->db->group_end();
        }
        $this->db->group_end();
        $this->db->order_by('nombres', 'asc');
        $query = $this->db->get();
    
        return $query->result();
    }
    

    public function addCertificado(){

        $data = array(
            'id_alumno' => $this->input->post('id_alumno'),
            'codigo' => $this->input->post('codigo'),
            'curso' => $this->input->post('curso'),
			'empresa' => $this->input->post('empresa'),
            'expira' => $this->input->post('expira')
        );

        $this->db->insert('certificado_intern', $data);

        if ($this->db->affected_rows() > 0) {
            return ['status' => 'success', 'message' => 'Certificado agregado correctamente.'];
        } else {
            return ['status' => 'error', 'message' => 'Error al agregar el certificado.'];
        }

    }

    public function editCertificado(){
        //get id
        $id = $this->input->get('id');

        //select data certificado_intern inner join alumnos
        $this->db->select('certificado_intern.*, alumnos.numerodocumento as alumno_numerodocumento, alumnos.nombres AS alumno_nombre, alumnos.apellidos AS alumno_apellido');
        $this->db->from('certificado_intern');
        $this->db->join('alumnos', 'alumnos.id_alumno = certificado_intern.id_alumno');
        $this->db->where('certificado_intern.id', $id);
        $query = $this->db->get();
        //return data
        return $query->row();
    }

    public function updateCertificado(){
        $id = $this->input->post('txtIdCertificado');

        $data = array(
            'id_alumno' => $this->input->post('id_alumno'),
            'codigo' => $this->input->post('codigo'),
            'curso' => $this->input->post('curso'),
			'empresa' => $this->input->post('empresa'),
            'expira' => $this->input->post('expira')
        );

        $this->db->where('id', $id);
        $this->db->update('certificado_intern', $data);

        if ($this->db->affected_rows() > 0) {
            return ['status' => 'success', 'message' => 'Certificado actualizado correctamente.'];
        } else {
            return ['status' => 'error', 'message' => 'Error al actualizar el certificado.'];
        }
    }

    public function deleteCertificado(){
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->delete('certificado_intern');

        if ($this->db->affected_rows() > 0) {
            return 'true';
        } else {
            return 'false';
        }
    }


}
