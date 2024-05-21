<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InicioModel extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function showallAlumnoForEmpresa($idempresa){
		$this->db->where('id_empresa', $idempresa);
		$query = $this->db->from('vw_alumnos_por_empresa');
		return $this->db->count_all_results();
	}

	public function showallGrupoForEmpresa($idempresa){
		$this->db->where('id_empresa', $idempresa);
		$query = $this->db->from('grupos');
		return $this->db->count_all_results();
	}

	public function showallCursoDisponible($estadocurso){
		$this->db->where('estado', $estadocurso);
		$query = $this->db->from('cursos');
		return $this->db->count_all_results();
	}

}