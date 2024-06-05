<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CursoModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function showAllCurso(){
		$txtcur = $this->input->get('nomcur');
	    $query1= $this->db->query("CALL vw_listarcursos_Safesi('".$txtcur."')");
		if($query1->num_rows() > 0){
		 	return $query1->result();
		 }else{
			return false;
	 	}
	}

	public function saveCurso(){
		$field = array(
			'nombrecurso' =>$this->input->post('txtnombre'),
			'vigencia_curso' =>$this->input->post('txtvigencia'),
			'descripcion' =>$this->input->post('txtdescripcion'),
			'textomodulo' =>$this->input->post('textomodulo'),
			'id_capacitador' =>$this->input->post('slcapacitador'),
			'precio' =>$this->input->post('txtprecio'),
			'precio2' =>$this->input->post('txtprecio2'),
			'precio3' =>$this->input->post('txtprecio3'),
			'horas' =>$this->input->post('txthoras'),
			'numeronotas' =>$this->input->post('txtnumeronotas'),
			'cupos' =>$this->input->post('txtcupos'),
			'firmagerente' =>$this->input->post('slcfirmagt'),
			'mostrar_descripcion' =>$this->input->post('showdescripcion'),
			'mostrar_nota' =>$this->input->post('shownotact'),
			'desc_tipocertificado' =>$this->input->post('tipocert')
		);
		$this->db->insert('cursos',$field);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	public function editCurso(){
		$id = $this->input->get('id');
		$this->db->where('id_curso', $id);
		$query = $this->db->get('cursos');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function viewNameCurso(){
		$id = $this->input->get('id');
		$this->db->select('nombrecurso, horas');
		$this->db->where('id_curso', $id);
		$query = $this->db->get('cursos');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function updateCurso(){
		
		$id = $this->input->post('txtCurso');
		$field = array(
			'nombrecurso' =>$this->input->post('txtnombre'),
			'vigencia_curso' =>$this->input->post('txtvigencia'),
			'descripcion' =>$this->input->post('txtdescripcion'),
			'textomodulo' =>$this->input->post('textomodulo'),
			'id_capacitador' =>$this->input->post('slcapacitador'),
			'precio' =>$this->input->post('txtprecio'),
			'precio2' =>$this->input->post('txtprecio2'),
			'precio3' =>$this->input->post('txtprecio3'),
			'horas' =>$this->input->post('txthoras'),
			'numeronotas' =>$this->input->post('txtnumeronotas'),
			'cupos' =>$this->input->post('txtcupos'),
			'firmagerente' =>$this->input->post('slcfirmagt'),
			'mostrar_descripcion' =>$this->input->post('showdescripcion'),
			'mostrar_nota' =>$this->input->post('shownotact'),
			'desc_tipocertificado' =>$this->input->post('tipocert')
		);
		$this->db->where('id_curso',$id);
		$this->db->update('cursos',$field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}


	public function deleteCurso(){
		$id = $this->input->get('id');

		$field = array(
			'estado' => "99",
		);
		$this->db->where('id_curso', $id);
		$this->db->update('cursos',$field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}


	public function getCursosUnidad(){
			$query=$this->db->query('SELECT "Todo" nombrecurso union all SELECT * from( select distinct nombrecurso from cursos where estado != 99 order by nombrecurso ) tab');

			//where estado != '99'
			
			$cursos = array();
			if ($query -> result()){
 				foreach ($query->result() as $curso){

 					if($curso->nombrecurso !='Todo'){
 						$value = $curso->nombrecurso;
 						
 					}else{
 						$value= '%';
 					}

 					$cursos[$value] = $curso->nombrecurso;
 				}
 				return $cursos;
 			}else{
 			return FALSE;
 			}
	}


	public function getCursos() {
		$query=$this->db->query('SELECT id_curso, nombrecurso from cursos where estado != 99 order by nombrecurso');

		$cursos = array();

		if ($query -> result()){
 			foreach ($query->result() as $curso){
 				$cursos[$curso->id_curso] = $curso->nombrecurso;
 			}
 			return $cursos;
 		}else{
 		return FALSE;
 		}
 	}



	public function showAllCursoForDate(){
		$estado = 'Todo';

		 $fdesde = $this->input->get('id');
		 $fhasta = $this->input->get('id2');
		//$fdesde = '10/02/2018';
		//$fhasta = '10/06/2018';

		$fdesde2=substr($fdesde,-4,4) . substr($fdesde, -7,2) . substr($fdesde, -10,2);
	    $fhasta2=substr($fhasta,-4,4) . substr($fhasta, -7,2) . substr($fhasta, -10,2);

	     $query1= $this->db->query("CALL usp_listarcursos_safesi(".$fdesde2.",".$fhasta2.",'".$estado."')");
		 if($query1->num_rows() > 0){
		  	return $query1->result();
		  }else{
		 	return false;
	    }
	}


	public function showAllCursoForDateAndName(){

		$nombrecurso = $this->input->get('nc');
		$fdesde = $this->input->get('f1');
		$fhasta = $this->input->get('f2');

		//$nombrecurso = 'Trabajos en Altura';
		//$fdesde = '10/02/2018';
		//$fhasta = '10/06/2018';

		$fdesde2=substr($fdesde,-4,4) . substr($fdesde, -7,2) . substr($fdesde, -10,2);
	    $fhasta2=substr($fhasta,-4,4) . substr($fhasta, -7,2) . substr($fhasta, -10,2);

	    //echo $fdesde2.' '.$fhasta2.' '.$nombrecurso.' ';
	     $query1= $this->db->query("CALL sp_filtro_cursos_fecha_nombre('".$nombrecurso."',".$fdesde2.",".$fhasta2.")");
		 if($query1->num_rows() > 0){
		  	return $query1->result();
		  }else{
		 	return false;
	    }
	}



	public function showCursosForNotasAsistencia(){
	    $query= $this->db->query('SELECT * from vw_cursosconfechainicio');
		if($query->num_rows() > 0){
		 	return $query->result();
		 }else{
			return false;
	 	}
	}
	
	public function getFirmaGerentes() {
	 	$this->db->select('id_firma_gerente, apellidos_gerente, nombres_gerente');
	 	$this->db->order_by('apellidos_gerente','asc');
	 	$query = $this->db->get('firma_gerentes');
		$firma_gerentes = array();
		if ($query -> result()){
 			foreach ($query->result() as $firma_gerente){
 				$firma_gerentes[$firma_gerente->id_firma_gerente] = $firma_gerente->apellidos_gerente .' '. $firma_gerente->nombres_gerente;
 			}
 			return $firma_gerentes;
 		}else{
 		return FALSE;
 		}
 	}
	
	
	
}