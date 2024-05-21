<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuarioModel extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function saveUsuario($usuario)
	{
		$this->db->insert("usuarioempresas", $usuario);
		return $this->db->insert_id();
	}

}
