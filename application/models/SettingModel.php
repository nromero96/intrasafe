<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SettingModel extends CI_Model
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function showAllFirmasGerente(){
		$this->db->order_by('id_firma_gerente','desc');
		$query = $this->db->get('firma_gerentes');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	public function saveFirmaGerente($field){
		$this->db->insert('firma_gerentes',$field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function updateFirmaGerente($field){
	    $idfm = $this->input->post('txtidfmgerente');
	    $this->db->where('id_firma_gerente',$idfm);
		$this->db->update('firma_gerentes',$field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function editFirmaGerente(){
		$id = $this->input->get('id');
		$this->db->where('id_firma_gerente', $id);
		$query = $this->db->get('firma_gerentes');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}


	public function saveBgCertificado($field){
		$this->db->insert('bg_certificado',$field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function viewBgCertificado(){
		$query = $this->db->query('SELECT * FROM bg_certificado ORDER by id_bg_certificado DESC LIMIT 1');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function showAllModelCertificado(){
		$this->db->order_by('id','asc');
		$query = $this->db->get('modelo_certificados');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function editModelCertificado(){
		$id = $this->input->get('id');
		$this->db->where('id', $id);
		$query = $this->db->get('modelo_certificados');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function saveModelCertificado($field){
		$this->db->insert('modelo_certificados',$field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function updateModelCertificado($field){
	    $id = $this->input->post('txtidmdcertificado');
	    $this->db->where('id',$id);
		$this->db->update('modelo_certificados',$field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function getModelCertificados(){
		$this->db->where('estado', 'activo');
		$this->db->order_by('id','asc');
		$query = $this->db->get('modelo_certificados');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

}