<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class InicioModel extends CI_Model

{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


    public function allCurso(){
        $this->db->from('cursos');
        $this->db->where('estado !=', '99');
        return $this->db->count_all_results();
    }



    public function allAlumno(){
        $this->db->from('alumnos');
        return $this->db->count_all_results();

    }


    public function allGrupo(){
        $this->db->from('grupos');
        return $this->db->count_all_results();
    }



    public function allEmpresa(){
        $this->db->from('empresas');
        $this->db->where('tipo', 'EM');
        return $this->db->count_all_results();
    }

}