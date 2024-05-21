<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AlumnoModel extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function showAllAlumno(){
		$this->db->order_by('id_alumno','desc');
		$query = $this->db->get('alumnos');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function showAllForEmpresa(){
		$id = $this->input->get('id');
		$this->db->where('id_empresa', $id);
		$this->db->order_by('id_alumno','desc');
		$query = $this->db->get('vw_alumnos_por_empresa');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function editAlumno(){
		$id = $this->input->get('id');
		$this->db->where('id_alumno', $id);
		$query = $this->db->get('alumnos');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function getEmpresa() {
	 	$this->db->select('id_empresa, razonsocial');
	 	$this->db->where('tipo','EM');
	 	$query = $this->db->get('empresas');
		$empresas = array();
		if ($query -> result()){
 			foreach ($query->result() as $empresa){
 				$empresas[$empresa->id_empresa] = $empresa->razonsocial;
 			}
 			return $empresas;
 		}else{
 		return FALSE;
 		}
 	}

	public function updateAlumno($field){
		$id = $this->input->post('txtIdAlumno');
		$this->db->where('id_alumno',$id);
		$this->db->update('alumnos',$field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}


}