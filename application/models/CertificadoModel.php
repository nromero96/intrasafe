<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CertificadoModel extends CI_Model
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//obtener el último certificado
    public function getUltimoCertificado(){
        $ct_serie = $this->input->get('fechaserie');
        //$ct_serie = '241920';
        $this->db->select('vw_datacertificado.ct_serie, vw_datacertificado.ct_correlativo');
        $this->db->where('ct_serie',$ct_serie);
        $this->db->order_by('ct_correlativo','desc');
        $this->db->limit(1);
        $query = $this->db->get('vw_datacertificado');
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }
    }

}