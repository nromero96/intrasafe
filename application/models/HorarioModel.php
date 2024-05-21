<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class HorarioModel extends CI_Model

{

	

	public function __construct()

	{

		parent::__construct();

		$this->load->database();

	}





	public function saveHorarioForCurso(){
		$field = array(
			'fecha' =>$this->input->post('txtfecha'),
			'hora_inicio' =>$this->input->post('txthorainicio'),
			'hora_fin' =>$this->input->post('txthorafin'),
			'lugar_de_clase' =>$this->input->post('txtlugardeclase'),
			'id_curso' =>$this->input->post('txtvalidcurso')
		);

		$this->db->insert('horario',$field);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}

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



	public function deleHorarioForCurso(){
		$id = $this->input->get('id');
		$this->db->where('id_horario', $id);
		$this->db->delete('horario');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}



}