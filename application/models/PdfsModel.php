<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PdfsModel extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAllEmpresa(){
		$data=$this->input->get('tpReg');
		$this->db->where('tipo',$data);
		$this->db->order_by('id_empresa','desc');
		$query = $this->db->get('empresas');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function getAllPersonasNaturales(){
		$data=$this->input->get('tpReg');
		$this->db->where('tipo',$data);
		$this->db->order_by('id_empresa','desc');
		$query = $this->db->get('empresas');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function getAllAlumnosAsistenciaForEmpresa(){
		$idg=$this->input->get('idg');
		$this->db->select('numerodocumento,apellidos,nombres');
		$this->db->where('id_grupo', $idg);
		$this->db->join('alumnos', 'alumno_grupo.id_alumno=alumnos.id_alumno', 'inner');
		$this->db->order_by('apellidos', 'asc');
		$query = $this->db->get('alumno_grupo');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}


	public function getAllAlumnosAsistenciaForCurso(){
		$idc=$this->input->get('idc');
		$this->db->select('razonsocial,numerodocumento,apellidos,nombres');
		$this->db->where('id_curso', $idc);
		$this->db->join('alumnos', 'alumno_grupo.id_alumno=alumnos.id_alumno', 'inner');
		$this->db->join('grupos','alumno_grupo.id_grupo=grupos.id_grupo');
		$this->db->join('empresas','grupos.id_empresa=empresas.id_empresa');
		$this->db->order_by('apellidos', 'asc');
		$query = $this->db->get('alumno_grupo');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}


	public function getAllAlumnosNotasForEmpresa(){
		$idg=$this->input->get('idg');
		$this->db->select('numerodocumento,apellidos,nombres,nota1,nota2,nota3,nota4,promedio,condicion');
		$this->db->where('id_grupo', $idg);
		$this->db->join('alumnos', 'alumno_grupo.id_alumno=alumnos.id_alumno', 'inner');
		$this->db->order_by('apellidos', 'asc');
		$query = $this->db->get('alumno_grupo');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function getAllAlumnosNotasForCurso(){
		$idc=$this->input->get('idc');
		$this->db->select('numerodocumento,apellidos,nombres,nota1,nota2,nota3,nota4,promedio,condicion');
		$this->db->where('id_curso', $idc);
		$this->db->join('alumnos', 'alumno_grupo.id_alumno=alumnos.id_alumno', 'inner');
		$this->db->order_by('apellidos', 'asc');
		$query = $this->db->get('alumno_grupo');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}


	public function getDataCurEmpCap(){
		$idg=$this->input->get('idg');
		$this->db->where('id_grupo', $idg);
		$query = $this->db->get('vw_empresacursocapacitador');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function getDataCurCap(){
		$idc=$this->input->get('idc');
		$this->db->where('id_curso', $idc);
		$query = $this->db->get('vw_cursocapacitador');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function getHorarioCurso($idfhc){
		$this->db->select('fecha, lugar_de_clase');
		$this->db->where('id_horario', $idfhc);
		$query = $this->db->get('horario');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
	

	public function getDataCertificado(){
		$ida = $this->input->get('idalg');

		$promedios = array('0','14','15','16','17','18','19','20','21');
		
		$this->db->query("SET lc_time_names = 'es_PE'");
		$this->db->where('id_alumno_grupo', $ida);
		$this->db->where_in('promedio', $promedios);
		$query = $this->db->get('vw_datacertificado');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
	
	


	public function getFechasCurso($idcurso){

		$query1= $this->db->query("CALL sp_fecha_curso(".$idcurso.")");
		if($query1->num_rows() > 0){
		 	return $query1->row();
		 }else{
			return false;
	 	}
	}


	public function getDataGerente(){
		$query = $this->db->query('SELECT * FROM firma_gerentes ORDER by id_firma_gerente DESC LIMIT 1');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

}



