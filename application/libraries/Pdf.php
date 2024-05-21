<?php defined('BASEPATH') OR exit('No direct script access alloewd!');
 
require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';
 
class Pdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }
}
/* application/libraries/Pdf.php */