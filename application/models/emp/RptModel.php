<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RptModel extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function showListaCurso($idempresa){
	 	$query= $this->db->query("CALL sp_listcursoporempresa(".$idempresa.")");
	 	if($query->num_rows() > 0){
	 	 	return $query->result();
	 	 }else{
	 		return false;
	 	}
	}

	//Show Data Curso
	public function showDataCurso($id_grupo){
		$query= $this->db->query("CALL sp_showdatacursoporgrupo(".$id_grupo.")");
	 	if($query->num_rows() > 0){
	 	 	return $query->row();
	 	 }else{
	 		return false;
	 	}
	}

	//Show List Alumno
	public function showListAlumnosPorGrupo($id_grupo){
		$this->db->where('id_grupo', $id_grupo);
		$this->db->join('alumnos','alumno_grupo.id_alumno=alumnos.id_alumno','inner');
		$this->db->order_by('apellidos', 'asc');
		$query = $this->db->get('alumno_grupo');

		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

}