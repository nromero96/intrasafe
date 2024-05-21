<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ReservaModel extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function showAllReserva($idempresa){
		$idsres = array('1', '2');
		$this->db->where('id_empresa', $idempresa);
		$this->db->where_in('estado_reserva',$idsres);
		$this->db->order_by('id_reserva','desc');
		$this->db->join('cursos', 'reserva_curso.id_curso=cursos.id_curso', 'inner');
		$this->db->join('capacitadores', 'cursos.id_capacitador=capacitadores.id_capacitador', 'inner');
		$query = $this->db->get('reserva_curso');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}


	// public function showAllReserva($idempresa){
	// 	$query= $this->db->query("CALL usp_ListarReserva(?)",$idempresa);
	// 	if($query->num_rows() > 0){
	// 	 	return $query->result();
	// 	 }else{
	// 		return false;
	// 			}
	// }


	public function showAllPagado($idempresa){
		$this->db->where('id_empresa', $idempresa);
		$this->db->where('estado_reserva', '3');
		$this->db->order_by('id_reserva','desc');
		$this->db->join('cursos', 'reserva_curso.id_curso=cursos.id_curso', 'inner');
		$this->db->join('capacitadores', 'cursos.id_capacitador=capacitadores.id_capacitador', 'inner');
		$query = $this->db->get('reserva_curso');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}

	}

	public function saveReserva(){
		$field = array(
			'id_curso' =>$this->input->post('txtIdCursoR'),
			'id_empresa' =>$this->input->post('txtIdEmpresa'),
			'ncupos' =>$this->input->post('slsncupos'),
			'costo_total' =>$this->input->post('txtcostotal')
		);

		$this->db->insert('reserva_curso',$field);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}

	}

	public function getDataCurso($idcurso){
		$this->db->select('nombrecurso, FechaInicio');
		$this->db->from('vistaCursos_Safesi_todos');
		$this->db->where('id_curso', $idcurso); 
		$query = $this->db->get();
		if ($query->num_rows() > 0){
   			return $query->row();
		}
		return null; 
	}

	public function getDataEmpresa($idempresa){
		$this->db->select('razonsocial, ruc, nombrecontacto, apellidoscontacto, emailcontacto, telefono, tipo');
		$this->db->from('empresas');
		$this->db->where('id_empresa', $idempresa); 
		$query = $this->db->get();
		if ($query->num_rows() > 0){
   			return $query->row();
		}
		return null; 
	}


	public function getDataBanco($idbanco){
		$this->db->select('id_banco, nombre_banco');
		$this->db->from('bancos');
		$this->db->where('id_banco', $idbanco); 
		$query = $this->db->get();
		if ($query->num_rows() > 0){
   			return $query->row();
		}
		return false;
	}


	public function GetDataReserva(){
	 	$id = $this->input->get('id');
	 	$this->db->where('id_reserva', $id);
		$this->db->join('cursos', 'reserva_curso.id_curso=cursos.id_curso', 'inner');
		$this->db->join('capacitadores', 'cursos.id_capacitador=capacitadores.id_capacitador', 'inner');
	 	$query = $this->db->get('reserva_curso');
	 	if($query->num_rows() > 0){
	 		return $query->row();
	 	}else{
	 		return false;
	 	}
	}





	public function DeleteReserva(){
		$id = $this->input->get('id');
		$field = array(
			'estado_reserva' => "0",
		);

		$this->db->where('id_reserva', $id);
		$this->db->update('reserva_curso',$field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}



	// public function updateReservaPagado($idempresa){
	// 	$id = $idempresa;
	// 	$field = array(
	// 		'estado_reserva' => "2",
	// 	);
	// 	$this->db->where('id_empresa', $id);
	// 	$this->db->where('estado_reserva','1');
	// 	$this->db->update('reserva_curso',$field);
	// 	if($this->db->affected_rows() > 0){
	// 		return true;
	// 	}else{
	// 		return false;
	// 	}
	// }


	 public function updateReservaPagado($idempresa,$estadoactual,$estadonuevo){
	 	$query= $this->db->query("CALL usp_ActEstReserva(".$estadonuevo.",".$estadoactual.",".$idempresa.")");
	 	if($query->num_rows() > 0){
	 	 	return $query->result();
	 	 }else{
	 		return false;
	 	}
	 	}

	public function grupCreaParaReserva($idreserva){
		$idr = $idreserva;
		$field = array(
			'estado_reserva' => "4",
		);
		$this->db->where('id_reserva', $idr);
		$this->db->update('reserva_curso',$field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function countAllReserva($idempresa){
		$this->db->where('id_empresa', $idempresa);
		$this->db->where('estado_reserva', '1');
		$query = $this->db->from('reserva_curso');
		return $this->db->count_all_results();
	}
}