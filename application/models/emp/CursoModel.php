<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class CursoModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// public function showAllCurso($estado){
	// 	$this->db->where('estado',$estado);
	// 	$this->db->order_by('id_curso','desc');
	// 	$query1 = $this->db->get('cursos');
	// 	 if($query1->num_rows() > 0){
	// 	 	return $query1->result();
	// 	 }else{
	// 	 	return false;
	// 	 }	
	// }

	public function showAllCurso($estado){

        $txtcur = $this->input->get('nomcur'); 

	    $query1= $this->db->query("CALL usp_showAllCurso_empresa(".$estado.",'".$txtcur."')");
		if($query1->num_rows() > 0){
		 	return $query1->result();
		 }else{
			return false;
	 	}
	}


	public function showAllCursoForDate(){
		$estado = '1';
		// $fdesde = $this->input->post('txtdesde');
		// $fhasta = $this->input->post('txthasta');
		 $fdesde = $this->input->get('id');
		 $fhasta = $this->input->get('id2');
		// $fdesde = '10/02/2018';
		// $fhasta = '10/03/2018';

		$fdesde2=substr($fdesde,-4,4) . substr($fdesde, -7,2) . substr($fdesde, -10,2);
	    $fhasta2=substr($fhasta,-4,4) . substr($fhasta, -7,2) . substr($fhasta, -10,2);

	     $query1= $this->db->query("CALL usp_listarcursos_fechas(".$fdesde2.",".$fhasta2.",".$estado.")");
		 if($query1->num_rows() > 0){
		  	return $query1->result();
		  }else{
		 	return false;
	    }
	}


	public function viewCurso(){
		$id = $this->input->get('id');
	    $query= $this->db->query("CALL usp_viewCurso(?)",$id);
		if($query->num_rows() > 0){
		 	return $query->row();
		 }else{
			return false;
	 }
	}

	public function viewCursoSafesi(){
		$id = $this->input->get('id');
	    $query= $this->db->query("CALL usp_VerModificarReservaCurso(?)",$id);
		if($query->num_rows() > 0){
		 	return $query->row();
		 }else{
			return false;
	 }
	}

	public function viewRtdcc(){
		$this->db->select('id_curso curso, count(*) as TotalCurso');
		$this->db->from('alumno_grupo');
		$this->db->group_by('id_curso');
		$query2 = $this->db->get();
		if($query2->num_rows() > 0){
			return $query2->result();
		}else{
			return false;
		}
	}

	public function getCursosUnidad(){
		$query=$this->db->query('SELECT "Todo" nombrecurso union all SELECT * from( select distinct nombrecurso from vw_cursos where estado=1 and cupos>0 order by nombrecurso ) tab');
		
		$cursos = array();
		if ($query -> result()){
 			foreach ($query->result() as $curso){
 				$cursos[$curso->nombrecurso] = $curso->nombrecurso;
 			}
 			return $cursos;
 		}else{
 		return FALSE;
 		}
	}


}