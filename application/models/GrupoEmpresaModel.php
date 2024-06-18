<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class GrupoEmpresaModel extends CI_Model

{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function showAllForEmpresa(){
		$id = $this->input->get('id');
		
		//$this->db->where('id_empresa', $id);
		//$this->db->order_by('FechaInicio', 'DESC');
		//$query = $this->db->get('vw_data_grupo');

		$query = $this->db->query("SELECT grupos.id_grupo AS id_grupo, grupos.nombregrupo AS nombregrupo, grupos.fecha_creacion AS fecha_creacion, grupos.id_reserva AS id_reserva, grupos.id_empresa AS id_empresa, reserva_curso.id_curso AS id_curso, date_format(vw_cursosfechatope_safesi.FechaInicio,'%d/%m/%Y') AS FechaInicio, count(alumno_grupo.id_grupo) AS cantidadAlumnos FROM (((grupos join reserva_curso on((grupos.id_reserva = reserva_curso.id_reserva))) join vw_cursosfechatope_safesi on((reserva_curso.id_curso = vw_cursosfechatope_safesi.id_curso))) left join alumno_grupo on((alumno_grupo.id_grupo = grupos.id_grupo))) WHERE grupos.id_empresa='{$id}' GROUP BY grupos.id_grupo ORDER BY vw_cursosfechatope_safesi.FechaInicio DESC");

		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function deleteGrupo(){
		$idgrupo = $this->input->get('idg');
		$query= $this->db->query("CALL sp_eliminar_grupos(".$idgrupo.")");
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
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

	public function updatePrecioTotal(){
		$id = $this->input->post('txt1idgrupo');
		$field = array(
			'totalpago' =>$this->input->post('txtpagototal'),
		);
		$this->db->where('id_grupo',$id);
		$this->db->update('grupos',$field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{

			return false;
		}
	}

	public function editAlumnoNota(){
		$id = $this->input->get('id');
		$this->db->where('id_alumno_grupo', $id);
		$this->db->join('alumnos','alumno_grupo.id_alumno=alumnos.id_alumno','inner');
		$query = $this->db->get('alumno_grupo');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function updateAlumnoNota($id,$field){
			$this->db->where('id_alumno_grupo',$id);
			$this->db->update('alumno_grupo',$field);
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
	}


	public function showAlumnoIEnGrupo(){
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

	
	public function getEmpresa() {
		$this->db->where('tipo','EM');
	 	$this->db->select('id_empresa, ruc, razonsocial');
	 	$query = $this->db->get('empresas');

		$empresas = array();

		if ($query -> result()){
 			foreach ($query->result() as $empresa){
 				$empresas[$empresa->id_empresa] = $empresa->ruc.' ('.$empresa->razonsocial.')';
 			}
 			return $empresas;
 		}else{
 		return FALSE;
 		}
 	}

 	public function getPersonaNatural() {
 		$this->db->where('tipo','PN');
	 	$this->db->select('id_empresa, ruc, nombrecontacto');
	 	$query = $this->db->get('empresas');

		$empresas = array();
		if ($query -> result()){
 			foreach ($query->result() as $empresa){
 				$empresas[$empresa->id_empresa] = $empresa->ruc.' ('.$empresa->nombrecontacto.')';
 			}
 			return $empresas;
 		}else{
 		return FALSE;
 		}
 	}


 	public function getListaHorario(){
 		//$idcurs = '64';
 		$idcurs=$this->input->get('idcurs');
 		$this->db->select('id_horario, fecha');
 		$this->db->where('id_curso',$idcurs);
 		$this->db->order_by('fecha','asc');
	 	$query = $this->db->get('horario');

		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
 	}


 	public function getDataAlumForCert(){
 		$idag=$this->input->get('idag');
 		$this->db->select('id_alumno_grupo,fechaserie');
 		$this->db->where('id_alumno_grupo', $idag);
		$query = $this->db->get('vw_fechaparaserie');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
 	} 

 	public function getBgCert(){
		$query = $this->db->query('SELECT bg_cerficado_imagen FROM bg_certificado ORDER by id_bg_certificado DESC LIMIT 1');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}


	public function getNomEm(){
		$idem=$this->input->get('id');
		$this->db->select('razonsocial, ruc');
		$this->db->where('id_empresa', $idem);
		$query = $this->db->get('empresas');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}


	public function getNomPn(){
		$idem=$this->input->get('id');
		$this->db->select('nombrecontacto, apellidoscontacto, ruc');
		$this->db->where('id_empresa', $idem);
		$query = $this->db->get('empresas');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}


	// public function saveCertif(){
	// 	$idalumnogrupo = $this->input->post('txtidalumnogrupo');
	// 	$sericert = $this->input->post('txtsericert');
	// 	$nombgcert = $this->input->post('txtnombgcert');

	// 	$query= $this->db->query("CALL sp_guardar_certificado(".$idalumnogrupo.",'".$sericert."','".$nombgcert."')");

	// 	if($this->db->affected_rows() > 0){
	// 		return true;
	// 	}else{
	// 		return false;
	// 	}
	// }


	//Actualizar estado grupo y alumnos
	public function reabrirAlumnos(){
		$idgrupo = $this->input->post('txtidgrupr');
		$idcurso = $this->input->post('txtidcursr');

		$nestado = array(
			'estado_alumno_grupo' => '1',
		);
		$this->db->where('estado_alumno_grupo','2');
		$this->db->where('id_grupo',$idgrupo);
		$this->db->where('id_curso',$idcurso);
		$this->db->update('alumno_grupo',$nestado);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}


	public function reabrirGrupo(){
		$idgrupo = $this->input->post('txtidgrupr');

		$nestado = array(
			'estado_grupo' => '0',
		);

		$this->db->where('estado_grupo','1');
		$this->db->where('id_grupo',$idgrupo);
		$this->db->update('grupos',$nestado);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}


	// public function saveCertif(){
	// 	$idalumnogrupo = $this->input->post('txtidalumnogrupo');
	// 	$sericert = $this->input->post('txtsericert');
	// 	$nombgcert = $this->input->post('txtnombgcert');
	// 	$codcerti = $this->input->post('txtcodigoc');

	// 	//nuevos campos
	// 	$id_modelcert = $this->input->post('slcertificado');

	// 	$query= $this->db->query("CALL sp_guardar_certificado_uno(".$idalumnogrupo.",'".$sericert."','".$codcerti."','".$nombgcert."')");

	// 	if($this->db->affected_rows() > 0){
	// 		return true;
	// 	}else{
	// 		return false;
	// 	}
	// }

	public function saveCertif() {
		// Obtener datos del POST
		$idalumnogrupo = $this->input->post('txtidalumnogrupo');
		$sericert = $this->input->post('txtsericert');
		$nombgcert = $this->input->post('txtnombgcert');
		$codcerti = $this->input->post('txtcodigoc');

		$id_modelcert = $this->input->post('slcertificado'); 
		$img_bg_certificado_dos = $this->input->post('img_bg_certificado_dos');
		$logo_emp = $this->input->post('logo_emp');
		$mostrar_modulo = $this->input->post('mostrar_modulo');
	
		// Iniciar la transacción
		$this->db->trans_start();
	
		// Insertar en la tabla certificado
		$dataCertificado = array(
			'id_alumno_grupo' => $idalumnogrupo,
			'serie' => $sericert,
			'correlativo' => $codcerti,
			'id_modelcert' => $id_modelcert,
			'img_bg_certificado' => $nombgcert,
			'img_bg_certificado_dos' => $img_bg_certificado_dos,
			'logo_emp' => $logo_emp,
			'mostrar_modulo' => $mostrar_modulo,
		);
		$this->db->insert('certificado', $dataCertificado);
	
		// Actualizar la tabla alumno_grupo
		$dataAlumnoGrupo = array(
			'cert_btn' => 1
		);
		$this->db->where('id_alumno_grupo', $idalumnogrupo);
		$this->db->update('alumno_grupo', $dataAlumnoGrupo);
	
		// Completar la transacción
		$this->db->trans_complete();
	
		// Verificar el estado de la transacción
		if ($this->db->trans_status() === FALSE) {
			// Algo salió mal, cancelar la transacción
			$this->db->trans_rollback();
			return false;
		} else {
			// Todo salió bien, confirmar la transacción
			$this->db->trans_commit();
			return true;
		}
	}
	

	public function verifAlumEnGrupo(){
		$idgrupo = $this->input->get('idgrupo');
		$idalumno = $this->input->get('idalumno');

		$this->db->select('id_grupo, id_alumno');
		$this->db->where('id_grupo',$idgrupo);
		$this->db->where('id_alumno',$idalumno);
		$query = $this->db->get('alumno_grupo');
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}


	public function verificarCodigoCertificado(){
		$codcert = $this->input->get('codcert');
		
		$this->db->select('codigocertificado');
		$this->db->where('codigocertificado',$codcert);
		$query = $this->db->get('vw_codigocertificado');
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function showAlumnosPorCurso(){
		$id_curso = $this->input->get('idcs');
		$this->db->where('id_curso', $id_curso);
		$this->db->order_by('apellidos','asc');
		$this->db->join('alumnos', 'alumno_grupo.id_alumno=alumnos.id_alumno', 'inner');
		$query = $this->db->get('alumno_grupo');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function showDataCurso(){
		$id_curso = $this->input->get('idcs');
		$this->db->where('id_curso', $id_curso);
		$query = $this->db->get('vw_datacurso');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}


	public function deleteCertificado(){
		$idag = $this->input->get('idag');
		$query= $this->db->query("CALL sp_eliminar_certificado(".$idag.")");
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}


}