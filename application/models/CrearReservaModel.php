<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CrearReservaModel extends CI_Model
{


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getEmpresa() {
	 	$this->db->select('id_empresa, ruc, razonsocial');
	 	$this->db->where('tipo','EM');
	 	$this->db->order_by('razonsocial');
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



	public function showAllReserva(){
		//$idempresa = '30';
		$idempresa = $this->input->get('id');

		$idsres = array('1', '2');
		$this->db->where('id_empresa', $idempresa);
		$this->db->where_in('estado_reserva',$idsres);
		$this->db->order_by('id_reserva','desc');
		$this->db->join('cursos','reserva_curso.id_curso=cursos.id_curso','inner');
		$this->db->join('capacitadores', 'cursos.id_capacitador=capacitadores.id_capacitador', 'inner');
		$query = $this->db->get('reserva_curso');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}


	public function getPersonaNatural() {
	 	$this->db->select('id_empresa, ruc, nombrecontacto');
	 	$this->db->where('tipo','PN');
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

	public function savePago(){
		$vid_banco=$this->input->post('slistabancos');

		if($this->input->post('txtcodoperacion')==''){
			$vcod_operacion='No registrado';
		}
		if($this->input->post('txtcodoperacion')!=''){
			$vcod_operacion=$this->input->post('txtcodoperacion');
		}

		$vfecha_transaccion=$this->input->post('txtfechatrans');
	 	$vpagototal=$this->input->post('txtpagoTotal');
	 	$vIdEmpresa=$this->input->post('txtIdEmpresapg');
	 	$vEsPago = '2';
	 	$query= $this->db->query("CALL sp_guardar_pago_por_safesi(".$vid_banco.",'".$vcod_operacion."','".$vfecha_transaccion."',".$vpagototal.",".$vIdEmpresa.",'".$vEsPago."')");
	 	}

	public function showAllPagado(){
		$idempresa = $this->input->get('id');

		$this->db->where('id_empresa', $idempresa);
		$this->db->where('estado_reserva','3');
		$this->db->order_by('id_reserva','desc');
		$this->db->join('cursos','reserva_curso.id_curso=cursos.id_curso','inner');
		$this->db->join('capacitadores', 'cursos.id_capacitador=capacitadores.id_capacitador', 'inner');
		$query = $this->db->get('reserva_curso');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}



	public function validarGrupo(){
		$idreserva = $this->input->get('getidreserva');
		$this->db->where('id_reserva',$idreserva);
		$query = $this->db->get('grupos');
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}



	public function saveGrupoForEmpresa(){
		$id_reserva = $this->input->post('txtidReservaParaGrup');
		
		$query = $this->db->query("CALL sp_CrearGrupoPN(".$id_reserva.")");


	}

	public function showAllCursoParaSafesi($estado){
        $txtcur = $this->input->get('nomcur'); 

	    $query1= $this->db->query("CALL usp_showAllCurso_safesi(".$estado.",'".$txtcur."')");
		if($query1->num_rows() > 0){
		 	return $query1->result();
		 }else{
			return false;
	 	}
	}

	public function showAllCursoForDateSafesi(){
		$estado = '99';;
		// $fdesde = $this->input->post('txtdesde');
		// $fhasta = $this->input->post('txthasta');
		 $fdesde = $this->input->get('id');
		 $fhasta = $this->input->get('id2');
		// $fdesde = '10/02/2018';
		// $fhasta = '10/03/2018';

		$fdesde2=substr($fdesde,-4,4) . substr($fdesde, -7,2) . substr($fdesde, -10,2);
	    $fhasta2=substr($fhasta,-4,4) . substr($fhasta, -7,2) . substr($fhasta, -10,2);

	     $query1= $this->db->query("CALL usp_listarcursos_fechas_safesi(".$fdesde2.",".$fhasta2.",".$estado.")");
		 if($query1->num_rows() > 0){
		  	return $query1->result();
		  }else{
		 	return false;
	    }
	}

}