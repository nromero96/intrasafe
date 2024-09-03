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

	// public function showListCertForAlumno(){
	// 	$docalumno = $this->input->get('docalumno');
	// 	$this->db->query("SET lc_time_names = 'es_PE'");
	// 	$this->db->where('numerodocumento', $docalumno);
	// 	$this->db->order_by('id_certificado','desc');
	// 	$query = $this->db->get('vw_verificarprofesional');
	// 	if($query->num_rows() > 0){
	// 		return $query->result();
	// 	}else{
	// 		return false;
	// 	}
	// }


	public function showListCertForAlumno(){
		$docalumno = $this->input->get('docalumno');
		$this->db->query("SET lc_time_names = 'es_PE'");
		
		$this->db->select('
			certificado.id_certificado,
			certificado.serie,
			certificado.correlativo,
			modelo_certificados.nombre as certifica,
			vw_cursosforcertificado.fechainiciocertificado,
			vw_cursosforcertificado.fecha_vigenica,
			vw_cursosforcertificado.vigencia_curso,
			vw_cursosforcertificado.id_curso,
			vw_cursosforcertificado.descripcion,
			vw_cursosforcertificado.nombrecurso,
			vw_cursosforcertificado.horas,
			alumnos.numerodocumento,
			certificado.id_alumno_grupo,
			alumnos.nombres,
			alumnos.apellidos
		');

		$this->db->from('certificado');
    	$this->db->join('alumno_grupo', 'certificado.id_alumno_grupo = alumno_grupo.id_alumno_grupo', 'left');
    	$this->db->join('alumnos', 'alumno_grupo.id_alumno = alumnos.id_alumno', 'left');
    	$this->db->join('vw_cursosforcertificado', 'alumno_grupo.id_curso = vw_cursosforcertificado.id_curso', 'left');
		$this->db->join('modelo_certificados', 'certificado.id_modelcert = modelo_certificados.id', 'left');

		$this->db->where('alumnos.numerodocumento', $docalumno);
		$this->db->order_by('certificado.id_certificado','desc');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}

	}


	public function showListCertForAlumnoInternacional(){
		$docalumno = $this->input->get('docalumno');
		$this->db->query("SET lc_time_names = 'es_PE'");

		$this->db->select('certificado_intern.*');
		$this->db->from('certificado_intern');

		//inner join alumnos
		$this->db->join('alumnos', 'certificado_intern.id_alumno = alumnos.id_alumno', 'left');

		$this->db->where('alumnos.numerodocumento', $docalumno);
		$this->db->order_by('certificado_intern.id','desc');
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}


}
