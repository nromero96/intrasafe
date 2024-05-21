<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PerfilModel extends CI_Model
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getDataEmp(){
		$id = $this->input->get('id');
		$this->db->where('id_empresa', $id);
		$query = $this->db->get('empresas');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function updateEmpresa(){
		$id = $this->input->post('txtidusersessionem');
		$field = array(
			'razonsocial' => $this->input->post('txtrazonsocial'),
			'ruc' => $this->input->post('txtruc'),
			'direccion' => $this->input->post('txtdireccion'),
			'emailcontacto' => $this->input->post('txtemailcontacto'),
			'nombrecontacto' => $this->input->post('txtnombrecontacto'),
			'apellidoscontacto' => $this->input->post('txtapellidoscontacto'),
			'telefono' => $this->input->post('txttelefono'),
			'emailfactura' => $this->input->post('txtemailfactura')
		);
		$this->db->where('id_empresa',$id);
		$this->db->update('empresas',$field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}


	public function updatePersonaNatural(){
		$id = $this->input->post('txtidusersessionpn');
		$field = array(
				'ruc' => $this->input->post('txtdnipn'), //Para empresa RUC y para PN DNI
				'emailcontacto' => $this->input->post('txtemailpn'), 
				'nombrecontacto' => $this->input->post('txtnombrespn'),
				'apellidoscontacto' => $this->input->post('txtapellidospn'),
				'telefono' => $this->input->post('txttelefonopn'),
				'empresa_pn' => $this->input->post('txtempresapn'),
				'cargo_pn' => $this->input->post('txtcargopn')
		);
		$this->db->where('id_empresa',$id);
		$this->db->update('empresas',$field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}


	public function updateAcceso(){
		$id = $this->input->post('txtidusersessionone');
		$field = array(
			'password' =>$this->input->post('txtpassword')
		);
		$this->db->where('id_empresa',$id);
		$this->db->update('empresas',$field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}


}