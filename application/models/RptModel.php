<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class RptModel extends CI_Model

{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function showDataCurso(){
		$id_curso = $this->input->get('idcs');
		$this->db->where('id_curso', $id_curso);
		$query = $this->db->get('vw_datacurso');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function showListCert(){
		$this->db->query("SET lc_time_names = 'es_PE'");
		$this->db->where('promedio !=', 'null');
		$query = $this->db->get('wv_reportecertificado');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function showListAlumCurso(){
		$query = $this->db->get('vw_reportealumnocurso');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}


	public function showListPagosEmpresas(){
		$query = $this->db->get('vw_reportepagosempresas');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function showListCursosPorPago(){
		$id_pago = $this->input->get('idp');
		$query = $this->db->query("CALL sp_showlistacursosporpago(".$id_pago.")");
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function showListPagosPersonasNatural(){
		$query = $this->db->get('vw_reportepagospersonanatural');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}


	public function showListAlumPorCurso($id_curso){
		$this->db->where('id_curso', $id_curso);
		$query = $this->db->get('vw_reportealumnocurso');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function viewNameCurso($id_curso){
		$this->db->where('id_curso', $id_curso);
		$query = $this->db->get('cursos');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}


	public function sumaTotalPagosEmpresas(){
		$query=$this->db->query('SELECT FORMAT(SUM(pagototal), 2 ) as total FROM vw_reportepagosempresas');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}


	public function sumaTotalPagosPersonasNaturales(){
		$query=$this->db->query('SELECT FORMAT(SUM(pagototal), 2 ) as total FROM vw_reportepagospersonanatural');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	//Lista de correos - Alumnos
	public function showListaCorreoAlumnos(){
		$query=$this->db->query("SELECT nombres, apellidos, email FROM alumnos WHERE email != '' ");
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	//Lista de correos - Personas Naturales
	public function showListaCorreoPN(){
		$query=$this->db->query("SELECT nombrecontacto, apellidoscontacto, emailcontacto FROM empresas WHERE tipo='PN' AND emailcontacto != '' ");
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	//Lista de correos - Empresas
	public function showListaCorreoEmpresas(){
		$query=$this->db->query("SELECT razonsocial, emailcontacto FROM empresas WHERE tipo='EM' AND emailcontacto != '' ");
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}


}