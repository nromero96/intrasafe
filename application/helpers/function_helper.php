<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');


if(!function_exists('_build_json')){

	function _build_json($_staus=FALSE,$_message=FALSE){
		if($_staus)
			exit(json_encode(array('status'=>$_staus,'message'=>$_message)));
		else
			exit(json_encode(array('status'=>FALSE,'No direct script access allowed')));
	}
}


if(!function_exists('_is_ajax_request')){

	function _is_ajax_request(){

		$CI = & get_instance();

		if(!$CI->input->is_ajax_request())
			_build_json();
	}
}

if(!function_exists('_is_post')){

	function _is_post(){
		if($_SERVER['REQUEST_METHOD'] !== 'POST')
			_build_json();
	}
}

if (!function_exists('truncate_text')) {
    function truncate_text($text, $max_length = 30) {
        if (strlen($text) > $max_length) {
            return substr($text, 0, $max_length) . '...';
        }
        return $text;
    }
}
