<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PerfilModel extends CI_Model
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getDataUser(){
		$id = $this->input->get('id');
		$this->db->where('id_usuario', $id);
		$query = $this->db->get('usuario');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function updateDataUser(){
		$id = $this->input->post('txtidusersession');
		$field = array(
			'nombre' =>$this->input->post('txtnombres'),
			'apellido' =>$this->input->post('txtapellidos'),
			'email' =>$this->input->post('txtcorreo'),
			'telefono' =>$this->input->post('txttelefono'),
			'direccion' =>$this->input->post('txtdireccion')
		);
		$this->db->where('id_usuario',$id);
		$this->db->update('usuario',$field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}


	public function updateAcceso(){
		$id = $this->input->post('txtidusersession1');
		$field = array(
			'password' =>$this->input->post('txtpassword')
		);
		$this->db->where('id_usuario',$id);
		$this->db->update('usuario',$field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}


}