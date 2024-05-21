<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VerificacionModel extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function vReservas(){
		$this->db->query('UPDATE reserva_curso set estado_reserva = 0 where estado_reserva = 1 and ADDTIME(fecha_reserva, "01:00:00") <  NOW()');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function vCursos(){
		$this->db->query('UPDATE cursos inner join vw_cursos_fechatope on cursos.id_curso = vw_cursos_fechatope.id_curso set estado = 3 where diasfaltantes<= 0 and horasfaltantes<="00:01:00"');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
}