<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GrupoModel extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function showAllGrupoForEmpresa($idempresa){
		//$this->db->where('id_empresa', $idempresa);
		//$query = $this->db->get('vw_data_grupo');
		$query = $this->db->query("SELECT grupos.id_grupo AS id_grupo, grupos.nombregrupo AS nombregrupo, grupos.fecha_creacion AS fecha_creacion, grupos.id_reserva AS id_reserva, grupos.id_empresa AS id_empresa, reserva_curso.id_curso AS id_curso, date_format(vw_cursosfechatope_safesi.FechaInicio,'%d/%m/%Y') AS FechaInicio, count(alumno_grupo.id_grupo) AS cantidadAlumnos FROM (((grupos join reserva_curso on((grupos.id_reserva = reserva_curso.id_reserva))) join vw_cursosfechatope_safesi on((reserva_curso.id_curso = vw_cursosfechatope_safesi.id_curso))) left join alumno_grupo on((alumno_grupo.id_grupo = grupos.id_grupo))) WHERE grupos.id_empresa='{$idempresa}' GROUP BY grupos.id_grupo ORDER BY vw_cursosfechatope_safesi.FechaInicio DESC");

		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function saveGrupoForEmpresa(){
		$id_reserva = $this->input->post('txtidReserva');

		$query = $this->db->query("CALL sp_CrearGrupoPN(".$id_reserva.")");

	
	}

	public function getCurso(){
		$this->db->where('estado', '1');
	 	$this->db->select('id_curso, nombrecurso');
	 	$query = $this->db->get('cursos');
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

 	public function verGrupoDetalle(){
		$id = $this->input->get('id');
		$this->db->where('id_grupo', $id);
		$this->db->join('reserva_curso','grupos.id_reserva=reserva_curso.id_reserva','inner');
		$this->db->join('cursos','reserva_curso.id_curso=cursos.id_curso','inner');
		$query = $this->db->get('grupos');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function countAlumnoPorGrupo(){
		$idalg = $this->input->get('id');
		$this->db->where('id_grupo', $idalg);
		$query = $this->db->from('alumno_grupo');
		return $this->db->count_all_results();
	}

	public function deleteAlumnoDelCurso(){
		$id = $this->input->get('id');
		$this->db->where('id_alumno_grupo', $id);
		$this->db->delete('alumno_grupo');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function saveAlumnoAGrupo($vtipodocumento,$vnumerodocumento,$vapellidos,$vnombres,$vfnacimiento,$vtelefono,$vemail,$vid_curso,$vcargo,$vfotoperfil,$vid_grupo){

	 	$query= $this->db->query("CALL usp_Obtener_Alumno('".$vtipodocumento."','".$vnumerodocumento."','".$vapellidos."','".$vnombres."','".$vfnacimiento."','".$vtelefono."','".$vemail."',".$vid_curso.",'".$vcargo."','".$vfotoperfil."',".$vid_grupo.")");

		
	}

	public function showAlumnoIEnGrupo(){
		//$id = '18';
		$id = $this->input->get('id');
		$this->db->where('id_grupo', $id);
		$this->db->order_by('apellidos','asc');
		$this->db->join('alumnos', 'alumno_grupo.id_alumno=alumnos.id_alumno', 'inner');
		$this->db->join('cursos', 'alumno_grupo.id_curso=cursos.id_curso', 'inner');
		$query = $this->db->get('alumno_grupo');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	//Actualizar estado grupo y alumnos
	public function confirmarAlumnos(){
		$estadonuevo = '2';
		$idgrupo = $this->input->post('txtidgrup');
		$idcurso = $this->input->post('txtidcurs');

		$nestado = array(
			'estado_alumno_grupo' => '2',
		);
		$this->db->where('estado_alumno_grupo','1');
		$this->db->where('id_grupo',$idgrupo);
		$this->db->where('id_curso',$idcurso);
		$this->db->update('alumno_grupo',$nestado);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function cerrarGrupo(){
		$idgrupo = $this->input->post('txtidgrup');

		$nestado = array(
			'estado_grupo' => '1',
		);

		$this->db->where('estado_grupo','0');
		$this->db->where('id_grupo',$idgrupo);
		$this->db->update('grupos',$nestado);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}

	}


	public function editAlumno(){
		$id = $this->input->get('id');
		$this->db->where('id_alumno_grupo',$id);
		$this->db->join('alumnos', 'alumno_grupo.id_alumno=alumnos.id_alumno', 'inner');
		$query = $this->db->get('alumno_grupo');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}


}
