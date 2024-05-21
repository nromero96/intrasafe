<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CalendarController extends CI_Controller{

  public function __construct(){
		parent::__construct();
		$this->load->model('CalendarModel');
	}

  public function index(){
    $this->load->view("calendario/index");
  }

  public function getCalendar(){
  	$calendar = $this->CalendarModel->getCalendar();

  	$data = array();

  	foreach ($calendar as $key => $value) {


  		$hora_inicio = date("H:i:s",strtotime($value->hora_inicio));
  		$hora_fin = date("H:i:s",strtotime($value->hora_fin));

  		$date = str_replace('/', '-', $value->fecha);
  		
  		$data[] = array(
  				'start' => date('Y-m-d', strtotime($date)) .'T'. $hora_inicio,
  				'end'   => date('Y-m-d', strtotime($date)) .'T'.$hora_fin,
  				'title' =>  $value->nombrecurso 

                //. ' ' . 
  							// $value->descripcion .
  							// ( empty($value->lugar_de_clase) ? '' :  ' en '. $value->lugar_de_clase)
  		);
  	}
  	echo json_encode($data);
  }

}
