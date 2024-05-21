<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReservaModel extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function showAllReserva(){
		$tipo = $this->input->get('id');
		$this->db->where('estado_reserva', '1');
		$this->db->where('tipo', $tipo);
		$this->db->order_by('id_reserva','desc');
		$this->db->join('cursos','reserva_curso.id_curso=cursos.id_curso','inner');
		$this->db->join('empresas','reserva_curso.id_empresa=empresas.id_empresa','inner');
		$query = $this->db->get('reserva_curso');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	// public function showAllReservaPagoNoVerificado(){
	// 	$tipo = $this->input->get('id');
	// 	$this->db->where('estado_reserva', '2');
	// 	$this->db->where('tipo', $tipo);
	// 	$this->db->order_by('id_reserva','desc');
	// 	$this->db->join('cursos','reserva_curso.id_curso=cursos.id_curso','inner');
	// 	$this->db->join('empresas','reserva_curso.id_empresa=empresas.id_empresa','inner');
	// 	$query = $this->db->get('reserva_curso');
	// 	if($query->num_rows() > 0){
	// 		return $query->result();
	// 	}else{
	// 		return false;
	// 	}
	// }


	public function showAllReservaPagoVerificado(){

		$idsres = array('3', '4');

		$tipo = $this->input->get('id');

		$this->db->where('tipo', $tipo);
		$this->db->where_in('estado_reserva',$idsres);
		$this->db->order_by('id_reserva','desc');
		$this->db->join('cursos','reserva_curso.id_curso=cursos.id_curso','inner');
		$this->db->join('empresas','reserva_curso.id_empresa=empresas.id_empresa','inner');
		$query = $this->db->get('reserva_curso');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}


	public function viewReserva(){
		$id = $this->input->get('id');
		$this->db->where('id_reserva', $id);
		$this->db->where('estado_reserva', '1'); 
		$this->db->join('cursos','reserva_curso.id_curso=cursos.id_curso','inner');
		$this->db->join('empresas','reserva_curso.id_empresa=empresas.id_empresa','inner');
		$query = $this->db->get('reserva_curso');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function updateReservaPrecioEM(){
		$id = $this->input->post('txtidreservaparadescEM');
		$field = array(
			'costo_total' =>$this->input->post('txtprecionuevoem'),
		);
		$this->db->where('id_reserva',$id);
		$this->db->where('estado_reserva','1');
		$this->db->update('reserva_curso',$field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function updateReservaPrecioPN(){
		$id = $this->input->post('txtidreservaparadescPN');
		$field = array(
			'costo_total' =>$this->input->post('txtprecionuevopn'),
		);
		$this->db->where('id_reserva',$id);
		$this->db->where('estado_reserva','1');
		$this->db->update('reserva_curso',$field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}


 	//Ver detalle del pago por verificar
	public function viewReservaPago(){
		$idpago = $this->input->get('id');
		$this->db->where('id_pago', $idpago);
		//$this->db->join('pagos','reserva_curso.id_pago=pagos.id_pago','inner');
		$this->db->join('bancos','pagos.id_banco=bancos.id_banco','inner');
		$query = $this->db->get('pagos');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function showListReservasPorPago(){
		$idpago = $this->input->get('id');
		$this->db->select('id_pago,nombrecurso,ncupos,costo_total');
		$this->db->where('estado_reserva', '2');
		$this->db->where('id_pago',$idpago);
		$this->db->order_by('id_reserva','desc');
		$this->db->join('cursos','reserva_curso.id_curso=cursos.id_curso','inner');
		$query = $this->db->get('reserva_curso');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}


    //Guardar pago verificado y actualizar reservas
	public function saveReserPagovaVerificado(){
		$idr = $this->input->post('txtidpago');
		$reslres='';
		if($this->input->post('reservapagoverif') == '0'){
			$reslres = '5';
		}
		if($this->input->post('reservapagoverif') == '2'){
			$reslres = '3';
		}

		$field = array(
			'estado_pago'=>$this->input->post('reservapagoverif'),
		);
		$this->db->where('id_pago',$idr);
		$this->db->update('pagos',$field);

		if($this->db->affected_rows() > 0){ 
			$field = array(
				'estado_reserva'=> $reslres,
			);
			$this->db->where('id_pago',$idr);
			$this->db->update('reserva_curso',$field);
			return true;
		}else{
			return false;
		}
	}

   //.....



	public function viewReservaPagoConfirmado(){
		$idsres = array('3', '4');
		$id = $this->input->get('id');
		$this->db->where('id_reserva', $id);
		$this->db->where_in('estado_reserva', $idsres); 
		$this->db->join('cursos','reserva_curso.id_curso=cursos.id_curso','inner');
		$this->db->join('empresas','reserva_curso.id_empresa=empresas.id_empresa','inner');
		$this->db->join('pagos','reserva_curso.id_pago=pagos.id_pago','inner');
		$this->db->join('bancos','pagos.id_banco=bancos.id_banco','inner');
		$query = $this->db->get('reserva_curso');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	//Pago
	public function viewPagoReservaPorVerifcar(){
		$tipo = $this->input->get('id');
		$this->db->select('id_pago,estado_pago,ruc, razonsocial, nombrecontacto, apellidoscontacto, tipo, fecha_transaccion, pagototal');
		$this->db->where('estado_pago', '1');
		$this->db->where('tipo', $tipo);
		$this->db->order_by('id_pago','asc');
		$this->db->join('empresas','pagos.id_empresa=empresas.id_empresa','inner');
		$query = $this->db->get('pagos');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

}