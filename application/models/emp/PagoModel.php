<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PagoModel extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	// public function savePago(){

	// 	$field = array(
	// 		'nombre_banco' =>$this->input->post('txtnombrebanco'),
	// 		'cod_operacion' =>$this->input->post('txtcodoperacion'),
	// 		'fecha_transaccion' =>$this->input->post('txtfechatrans'),
	// 		'pagototal' =>$this->input->post('txtpagoTotal'),
	// 		'id_empresa' =>$this->input->post('iddelaemrpesa')
	// 	);
	// 	$this->db->insert('pagos',$field);
	// 	if ($this->db->affected_rows() > 0) {
	// 		return true;     
	// 	}else{
	// 		return false;
	// 	}
	// }

		public function savePago(){
			$vid_banco=$this->input->post('slistabancos');
			$vcod_operacion=$this->input->post('txtcodoperacion');
			$vfecha_transaccion=$this->input->post('txtfechatrans');
	 		$vpagototal=$this->input->post('txtpagoTotal');
	 		$vIdEmpresa=$this->input->post('iddelaemrpesa');
	 		
	 		$query= $this->db->query("CALL sp_guardar_pago(".$vid_banco.",'".$vcod_operacion."','".$vfecha_transaccion."','".$vpagototal."',".$vIdEmpresa.")");

	 	}

	 	public function getBanco(){
	 		$this->db->select('id_banco, nombre_banco');
	 		$this->db->where('estado_banco','1');
	 		$query = $this->db->get('bancos');
			$bancos = array();
			if ($query -> result()){
 				foreach ($query->result() as $banco){
 					$bancos[$banco->id_banco] = $banco->nombre_banco;
 				}
 				return $bancos;
 			}else{
 			return FALSE;
 			}
	 	}
}