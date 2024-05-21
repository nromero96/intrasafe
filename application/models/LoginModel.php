<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


    public function login($usuario, $password){

        $query = $this->db->get_where('usuario', array('nombreusuario'=>$usuario, 'password'=>$password));
        return $query->row_array();
    }
}