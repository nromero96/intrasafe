<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EmpresaModel extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function showAllEmpresa(){
		$this->db->where('tipo','EM');
		$this->db->order_by('id_empresa','desc');
		$query = $this->db->get('empresas');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function saveEmpresa(){

		$field = array(
				'tipo' => $this->input->post('txttipo'),
				'razonsocial' => $this->input->post('txtrazonsocial'),
				'ruc' => $this->input->post('txtruc'),
				'direccion' => $this->input->post('txtdireccion'),
				'emailcontacto' => $this->input->post('txtemailcontacto'),
				'nombrecontacto' => $this->input->post('txtnombrecontacto'),
				'apellidoscontacto' => $this->input->post('txtapellidoscontacto'),
				'telefono' => $this->input->post('txttelefono'),
				'emailfactura' => $this->input->post('txtemailfactura'),
				'empresa_pn' => '-',
				'cargo_pn' => '-',
				'nombreusuario' => $this->input->post('txtnombreusuario'),
				'password' => $this->input->post('txtpassword'),
				'tyc' => $this->input->post('txtterms')
		);

		$this->db->insert('empresas',$field);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	public function editEmpresa(){
		$id = $this->input->get('id');
		$this->db->where('id_empresa', $id);
		$query = $this->db->get('empresas');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function updateEmpresa($field){
		$id = $this->input->post('txtIdEmpresa');

		$this->db->where('id_empresa',$id);
		$this->db->update('empresas',$field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function getAll(){
		$this->db->order_by('id_empresa','desc');
		$query = $this->db->get('empresas');
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return FALSE;
		}
	}


	//Registro Persona Natural
	public function savePersonaNatural(){
		$field = array(
				'tipo' => $this->input->post('txttipopn'),
				'razonsocial' => '-', 
				'ruc' => $this->input->post('txtdnipn'), //Para empresa RUC y para PN DNI
				'direccion' => '-', 
				'emailcontacto' => $this->input->post('txtemailpn'), 
				'nombrecontacto' => $this->input->post('txtnombrespn'),
				'apellidoscontacto' => $this->input->post('txtapellidospn'),
				'telefono' => $this->input->post('txttelefonopn'),
				'emailfactura' => '-',
				'empresa_pn' => $this->input->post('txtempresapn'),
				'cargo_pn' => $this->input->post('txtcargopn'),
				'nombreusuario' => $this->input->post('txtusuariopn'),
				'password' => $this->input->post('txtpasswordpn'),
				'tyc' => $this->input->post('txttermspn')
		);

		$this->db->insert('empresas',$field);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

}



