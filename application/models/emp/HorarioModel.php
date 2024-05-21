<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HorarioModel extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function showAllHorarioForCurso(){
		$id = $this->input->get('id');
		$this->db->where('id_curso', $id);
		$this->db->order_by('fecha','asc');
		$query = $this->db->get('horario');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}



}