<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VerificarProfesionalModel extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function getDataAlumno(){
		$docalumno = $this->input->get('docalumno');
		$this->db->where('numerodocumento', $docalumno);
		$query = $this->db->get('alumnos');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function showListCertForAlumno(){
		$docalumno = $this->input->get('docalumno');
		$this->db->query("SET lc_time_names = 'es_PE'");
		$this->db->where('numerodocumento', $docalumno);
		$this->db->order_by('id_certificado','desc');
		$query = $this->db->get('vw_verificarprofesional');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}


}