<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AlumnoModel extends CI_Model
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function showAllAlumno($idempresa){
		$this->db->where('id_empresa', $idempresa);
		$this->db->order_by('id_alumno','desc');
		$query = $this->db->get('vw_alumnos_por_empresa');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function saveAlumno(){
		$field = array(
			'tipodocumento' =>$this->input->post('txttipodocumento'),
			'numerodocumento' =>$this->input->post('txtnumerodocumento'),
			'apellidos' =>$this->input->post('txtapellidos'),
			'nombres' =>$this->input->post('txtnombres'),
			'fnacimiento' =>$this->input->post('txtfnacimiento'),
			'telefono' =>$this->input->post('txttelefono'),
			'email' =>$this->input->post('txtemail'),

			'id_empresa' =>$this->input->post('txtIdEmpresaSession')
		);
		$this->db->insert('alumnos',$field);
		if ($this->db->affected_rows() > 0) {
			return true;
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

	public function updateAlumno(){
		$id = $this->input->post('txtIdAlumno');
		$field = array(
			'tipodocumento' =>$this->input->post('txttipodocumento'),
			'numerodocumento' =>$this->input->post('txtnumerodocumento'),
			'apellidos' =>$this->input->post('txtapellidos'),
			'nombres' =>$this->input->post('txtnombres'),
			'fnacimiento' =>$this->input->post('txtfnacimiento'),
			'telefono' =>$this->input->post('txttelefono'),
			'email' =>$this->input->post('txtemail')
		);
		$this->db->where('id_alumno',$id);
		$this->db->update('alumnos',$field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
}