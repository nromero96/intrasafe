<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CapacitadorModel extends CI_Model
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function showAllCapacitador(){

		$this->db->where('estado_capacitador','1');
		$this->db->order_by('apellidos_capacitador','asc');

		$query = $this->db->get('capacitadores');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function saveCapacitador($datfirm){
		$field = array(
			'dni_capacitador' =>$this->input->post('txtnumdni'),
			'apellidos_capacitador' =>$this->input->post('txtapellidos'),
			'nombres_capacitador' =>$this->input->post('txtnombres'),
			'profesion_capacitador' =>$this->input->post('txtprofesion'),
			'cod_cip_capacitador' =>$this->input->post('txtcod_cip'),
			'telefono_capacitador' =>$this->input->post('txttelefono'),
			'email_capacitador' =>$this->input->post('txtemail'),
			'firma_capacitador' => $datfirm['upload_data']['file_name']

		);
		$this->db->insert('capacitadores',$field);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	public function editCapacitador(){
		$id = $this->input->get('id');
		$this->db->where('id_capacitador', $id);
		$query = $this->db->get('capacitadores');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function updateCapacitador($field){
		$id = $this->input->post('txtIdCapacitador');
		$this->db->where('id_capacitador',$id);
		$this->db->update('capacitadores',$field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function getCapacitador() {
	 	$this->db->select('id_capacitador, apellidos_capacitador, nombres_capacitador');
	 	$this->db->where('estado_capacitador','1');
	 	$this->db->order_by('apellidos_capacitador','asc');
	 	$query = $this->db->get('capacitadores');
		$capacitadores = array();
		if ($query -> result()){
 			foreach ($query->result() as $capacitador){
 				$capacitadores[$capacitador->id_capacitador] = $capacitador->apellidos_capacitador .' '. $capacitador->nombres_capacitador;
 			}
 			return $capacitadores;
 		}else{
 		return FALSE;
 		}
 	}
 	
 	
}