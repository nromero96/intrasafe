<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// application/config/pagination.php

$config['page_query_string'] = TRUE;
$config['query_string_segment'] = 'page';

//mostrar cantidad de links
$config['num_links'] = 2;


// Configuración adicional para enlaces de Bootstrap 3
$config['full_tag_open'] = '<ul class="pagination mt-3">';
$config['full_tag_close'] = '</ul>';
$config['first_link'] = 'Primero';
$config['first_tag_open'] = '<li>';
$config['first_tag_close'] = '</li>';
$config['last_link'] = 'Último';
$config['last_tag_open'] = '<li>';
$config['last_tag_close'] = '</li>';
$config['next_link'] = '&raquo;';
$config['next_tag_open'] = '<li>';
$config['next_tag_close'] = '</li>';
$config['prev_link'] = '&laquo;';
$config['prev_tag_open'] = '<li>';
$config['prev_tag_close'] = '</li>';
$config['cur_tag_open'] = '<li class="active"><a href="#">';
$config['cur_tag_close'] = '</a></li>';
$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';

?>
