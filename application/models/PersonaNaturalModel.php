<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PersonaNaturalModel extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function showAllPersonaNatural(){
		$this->db->where('tipo','PN');
		$this->db->order_by('id_empresa','desc');
		$query = $this->db->get('empresas');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function updatePersonaNatural(){
		$id = $this->input->post('txtidempresapn');
		$empresa = array(
				'ruc' => $this->input->post('txtdnipn'), //Para empresa RUC y para PN DNI
				'emailcontacto' => $this->input->post('txtemailpn'), 
				'nombrecontacto' => $this->input->post('txtnombrespn'),
				'apellidoscontacto' => $this->input->post('txtapellidospn'),
				'telefono' => $this->input->post('txttelefonopn'),
				'empresa_pn' => $this->input->post('txtempresapn'),
				'cargo_pn' => $this->input->post('txtcargopn'),
				'nombreusuario' => $this->input->post('txtusuariopn'),
				'password' => $this->input->post('txtpasswordpn'),
				'tyc' => $this->input->post('txttermspn')
		);

		$this->db->where('id_empresa',$id);
		$this->db->update('empresas',$empresa);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

}



