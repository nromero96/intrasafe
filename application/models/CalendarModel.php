<?php
class CalendarModel extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function getCalendar(){
		$sql = "SELECT  h.id_horario, 
						h.fecha, 
						h.hora_inicio, 
						h.hora_fin, 
						h.lugar_de_clase, 
						c.id_curso, 
						c.nombrecurso, 
						c.descripcion 
				FROM cursos c 
				INNER JOIN horario h
					ON c.id_curso = h.id_curso
					WHERE c.estado != '99'
				 ";
				 //WHERE h.fecha = DATE_FORMAT(now(),'%d/%m/%Y')

				//DATE_FORMAT(now(),'%d/%m/%Y')

		$query = $this->db->query($sql);
		return $query->result();
	}
  
}
