<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BancoModel extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function showAllBanco(){
		$this->db->where('estado_banco','1');
		$this->db->order_by('id_banco','desc');
		$query = $this->db->get('bancos');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function saveBanco(){
		$field = array(
			'nombre_banco' =>$this->input->post('txtnombrebanco'),
			'nombre_del_titular' =>$this->input->post('txtnombredeltitular'),
			'numero_cuenta' =>$this->input->post('txtnumerodelacuenta')
		);
		$this->db->insert('bancos',$field);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	public function editBanco(){
		$id = $this->input->get('id');
		$this->db->where('id_banco', $id);
		$query = $this->db->get('bancos');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}


	public function updateBanco(){
		$id = $this->input->post('txtidbanco');
		$field = array(
			'nombre_banco' =>$this->input->post('txtnombrebanco'),
			'nombre_del_titular' =>$this->input->post('txtnombredeltitular'),
			'numero_cuenta' =>$this->input->post('txtnumerodelacuenta')
		);
		$this->db->where('id_banco',$id);
		$this->db->update('bancos',$field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function deleteBanco(){
		$id = $this->input->get('id');
		$field = array(
			'estado_banco' => "0",
		);
		$this->db->where('id_banco', $id);
		$this->db->update('bancos',$field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

}