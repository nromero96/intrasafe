<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class PdfsController extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->library('Pdf');
                $this->load->model("PdfsModel");
                
        }
        public function index()
        {

        }
        


        public function getAllEmpresa(){
                $this->load->library('Pdf');

                $empresas = $this->PdfsModel->getAllEmpresa();
                //echo json_encode($result);

                $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
                $pdf->SetCreator(PDF_CREATOR);
                $pdf->SetAuthor('SAFE SCAFFOLDING INDUSTRY S.A.C');
                $pdf->SetTitle('Lista de empresas');
                $pdf->SetSubject('Información');

                $image_file = 'safesi.png';
 
                // datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config_alt.php de libraries/config
                $pdf->SetHeaderData($image_file, PDF_HEADER_LOGO_WIDTH);
                $pdf->setFooterData($tc = array(0, 64, 0), $lc = array(0, 64, 128));
 
                // datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config.php de libraries/config
                $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
                $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
 
                // se pueden modificar en el archivo tcpdf_config.php de libraries/config
                $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
 
                // se pueden modificar en el archivo tcpdf_config.php de libraries/config
                $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
                $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
                $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
 
                // se pueden modificar en el archivo tcpdf_config.php de libraries/config
                $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
 
                //relación utilizada para ajustar la conversión de los píxeles
                $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
 
 
                // ---------------------------------------------------------
                // establecer el modo de fuente por defecto
                $pdf->setFontSubsetting(true);
 
                // Establecer el tipo de letra
 
                //Si tienes que imprimir carácteres ASCII estándar, puede utilizar las fuentes básicas como
                // Helvetica para reducir el tamaño del archivo.
                $pdf->SetFont('helvetica', '', 9, '', true);
 
                // Añadir una página
                // Este método tiene varias opciones, consulta la documentación para más información.
                $pdf->AddPage();
 
     
                //preparamos y maquetamos el contenido a crear
                $html = '';
                $html .= '<style type=text/css>';
                $html .= 'th{color: #fff; background-color: #1A597F;font-weight: bold;}';
                $html .= 'table{border-collapse: collapse;}'; 
                $html .= 'td{border-top: 1px solid #dee2e6; padding-top: 8px; padding-bottom: 8px;}';
                $html .= '</style>';
                //$html .= "<h2>Localidades de ".$prov."</h2><h4>Actualmente: ".count($provincias)." localidades</h4>";
                $html .= '<table width="950">';
                $html .= '<tr><th width="90">RUC</th><th>Dirección</th><th width="70">Teléfono</th><th>Correo</th></tr>';
        
                //provincias es la respuesta de la función getProvinciasSeleccionadas($provincia) del modelo
                foreach ($empresas as $fila) {
                        $html .= '<tr><td width="90">' . $fila->ruc . '</td><td>' . $fila->direccion . '</td><td width="70">' . $fila->telefono . '</td><td>' . $fila->emailcontacto . '</td></tr>';
                }

                $html .= '</table>';
 
                // Imprimimos el texto con writeHTMLCell()
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
 
                // ---------------------------------------------------------
                // Cerrar el documento PDF y preparamos la salida
                // Este método tiene varias opciones, consulte la documentación para más información.
                $nombre_archivo = utf8_decode("Lista de empresas.pdf");
                $pdf->Output($nombre_archivo, 'I');
    
        }



        public function getAllPersonasNaturales(){
                $this->load->library('Pdf');

                $empresas = $this->PdfsModel->getAllPersonasNaturales();
                //echo json_encode($result);

                $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
                $pdf->SetCreator(PDF_CREATOR);
                $pdf->SetAuthor('SAFE SCAFFOLDING INDUSTRY S.A.C');
                $pdf->SetTitle('Lista de empresas');
                $pdf->SetSubject('Información');

                $image_file = 'safesi.png';
 
                // datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config_alt.php de libraries/config
                $pdf->SetHeaderData($image_file, PDF_HEADER_LOGO_WIDTH);
                $pdf->setFooterData($tc = array(0, 64, 0), $lc = array(0, 64, 128));
 
                // datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config.php de libraries/config
                $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
                $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
 
                // se pueden modificar en el archivo tcpdf_config.php de libraries/config
                $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
 
                // se pueden modificar en el archivo tcpdf_config.php de libraries/config
                $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
                $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
                $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
 
                // se pueden modificar en el archivo tcpdf_config.php de libraries/config
                $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
 
                //relación utilizada para ajustar la conversión de los píxeles
                $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
 
 
                // ---------------------------------------------------------
                // establecer el modo de fuente por defecto
                $pdf->setFontSubsetting(true);
 
                // Establecer el tipo de letra
 
                //Si tienes que imprimir carácteres ASCII estándar, puede utilizar las fuentes básicas como
                // Helvetica para reducir el tamaño del archivo.
                $pdf->SetFont('helvetica', '', 9, '', true);
 
                // Añadir una página
                // Este método tiene varias opciones, consulta la documentación para más información.
                $pdf->AddPage();
 
     
                //preparamos y maquetamos el contenido a crear
                $html = '';
                $html .= '<style type=text/css>';
                $html .= 'th{color: #fff; background-color: #1A597F;font-weight: bold;}';
                $html .= 'table{border-collapse: collapse;}'; 
                $html .= 'td{border-top: 1px solid #dee2e6; padding-top: 8px; padding-bottom: 8px;}';
                $html .= '</style>';
                //$html .= "<h2>Localidades de ".$prov."</h2><h4>Actualmente: ".count($provincias)." localidades</h4>";
                $html .= '<table width="950">';
                $html .= '<tr><th width="60">DNI</th><th width="100">Apellidos</th><th width="90">Nombres</th><th>Dirección</th><th width="70">Teléfono</th><th>Correo</th></tr>';
        
                //provincias es la respuesta de la función getProvinciasSeleccionadas($provincia) del modelo
                foreach ($empresas as $fila) {
                        $html .= '<tr><td width="60">' . $fila->ruc . '</td><td width="100">' . $fila->apellidoscontacto . '</td><td width="90">' . $fila->nombrecontacto . '</td><td>' . $fila->direccion . '</td><td width="70">' . $fila->telefono . '</td><td>' . $fila->emailcontacto . '</td></tr>';
                }

                $html .= '</table>';
 
                // Imprimimos el texto con writeHTMLCell()
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
 
                // ---------------------------------------------------------
                // Cerrar el documento PDF y preparamos la salida
                // Este método tiene varias opciones, consulte la documentación para más información.
                $nombre_archivo = utf8_decode("Lista de personas naturales.pdf");
                $pdf->Output($nombre_archivo, 'I');
    
        }



        public function getListOfAsistForEmp(){
                $this->load->library('Pdf');

                $alumnos = $this->PdfsModel->getAllAlumnosAsistenciaForEmpresa();
                $datacurempcap = $this->PdfsModel->getDataCurEmpCap();

                $idfhc=$this->input->get('idfhc');
                //$idh='70';
                $datahorarioc = $this->PdfsModel->getHorarioCurso($idfhc);

                $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
                $pdf->SetCreator(PDF_CREATOR);
                $pdf->SetAuthor('SAFE SCAFFOLDING INDUSTRY S.A.C');
                $pdf->SetTitle('Lista de alumnos');
                $pdf->SetSubject('Información');

                $image_file = 'safesi.png';
 
                $pdf->SetPrintHeader(false);
                $pdf->SetPrintFooter(false);
 
                // se pueden modificar en el archivo tcpdf_config.php de libraries/config
                $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_RIGHT);
 
                // se pueden modificar en el archivo tcpdf_config.php de libraries/config
                $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
 
                //relación utilizada para ajustar la conversión de los píxeles
                $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
 
 
                // ---------------------------------------------------------
                // establecer el modo de fuente por defecto
                $pdf->setFontSubsetting(true);
 
                // Establecer el tipo de letra
 
                //Si tienes que imprimir carácteres ASCII estándar, puede utilizar las fuentes básicas como
                // Helvetica para reducir el tamaño del archivo.
                $pdf->SetFont('helvetica', '', 10, '', true);
 
                // Añadir una página
                // Este método tiene varias opciones, consulta la documentación para más información.
                $pdf->AddPage();
 
     
                //preparamos y maquetamos el contenido a crear
                $html = '';
                $firmacap = '';
                $html .= '<style type=text/css>';
                $html .= 'th{color: #fff; background-color: #1A597F;font-weight: bold;}';
                $html .= 'table{border-collapse: collapse;}'; 
                //$html .= 'td{border-top: 1px solid #dee2e6; padding-top: 8px; padding-bottom: 8px;}'; cetar-pdf
                $html .= '</style>';
                //$html .= "<h2>Localidades de ".$prov."</h2><h4>Actualmente: ".count($provincias)." localidades</h4>";
                $html .= '<table width="100%" border="1" cellpadding="10">';
                $html .= '<tr><td rowspan="2" width="170"><img src="http://intranet.safesi.com/assets/img/lg-pdf-asis.png"></td><td align="center" width="322">ÁREA DE CAPACITACIÓN</td><td rowspan="2" width="140"><img src="http://intranet.safesi.com/assets/img/cetar-pdf.png"></td></tr>';
                $html .= '<tr><td align="center" width="322"><h3><b>LISTA DE ASISTENCIA</b></h3></td></tr>';
                $html .= '</table>';

                $html .= '<br>';
                $html .= '<br>';


                $html .= '<table width="100%" border="0" cellpadding="6">';
                $html .= '<tr><td width="316"><b>FECHA: </b>'.$datahorarioc->fecha.'</td><td width="316"><b>TEMA: </b>'.$datacurempcap->nombrecurso.'</td></tr>';
                $html .= '<tr><td width="316"><b>CLIENTE: </b>'.$datacurempcap->razonsocial.'</td><td width="316"><b>DURACIÓN: </b>'.$datacurempcap->horas.' Horas</td></tr>';
                $html .= '<tr><td width="316"><b>RUC: </b>'.$datacurempcap->ruc.'</td><td width="316"><b>CAPACITADOR: </b>'.$datacurempcap->nombres_capacitador.' '.$datacurempcap->apellidos_capacitador.'</td></tr>';

                //$firmacap .= '';

                $html .= '<tr><td width="316"><b>LUGAR: </b>'.$datahorarioc->lugar_de_clase.'</td><td width="316"><b>FIRMA: </b> <img width="120" src="http://intranet.safesi.com/uploads/firmas/'.$datacurempcap->firma_capacitador.'"></td></tr>';
                $html .= '</table>';


                $html .= '<table width="100%" style="margin-top: -149px;" border="1" cellpadding="11">';
                $html .= '<tr><td width="40" align="center"><b>N°</b></td><td width="170" align="center"><b>APELLIDOS</b></td><td width="150" align="center"><b>NOMBRES</b></td><td width="92" align="center"><b>DNI</b></td><td width="170" align="center"><b>FIRMA</b></td></tr>';

                // $html .= '<tr><td align="center">1</td><td>NILTON NABARRO</td><td>ROMERO AGURTO</td><td align="center">71213062</td><td>-</td></tr>';
                $num = 1;
                foreach ($alumnos as $fila) {
                    $html .= '<tr><td align="center">'.$num++.'</td><td>' . $fila->apellidos . '</td><td>' . $fila->nombres . '</td><td align="center">' . $fila->numerodocumento . '</td><td></td></tr>';
                }


                $html .= '</table>';
 
                // Imprimimos el texto con writeHTMLCell()
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
                //$pdf->writeHTMLCell($w = 0, $h = 0, $x = 117, $y = 61, $firmacap, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
 
                // ---------------------------------------------------------
                // Cerrar el documento PDF y preparamos la salida
                // Este método tiene varias opciones, consulte la documentación para más información.
                $nombre_archivo = utf8_decode("Lista de personas naturales.pdf");
                $pdf->Output($nombre_archivo, 'I');
    
        }



        public function getListOfNotasForEmp(){
                $this->load->library('Pdf');

                $alumnos = $this->PdfsModel->getAllAlumnosNotasForEmpresa();
                $datacurempcap = $this->PdfsModel->getDataCurEmpCap();

                $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
                $pdf->SetCreator(PDF_CREATOR);
                $pdf->SetAuthor('SAFE SCAFFOLDING INDUSTRY S.A.C');
                $pdf->SetTitle('Lista de alumnos');
                $pdf->SetSubject('Información');

                $image_file = 'safesi.png';
 
                $pdf->SetPrintHeader(false);
                $pdf->SetPrintFooter(false);
 
                // se pueden modificar en el archivo tcpdf_config.php de libraries/config
                $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_RIGHT);
 
                // se pueden modificar en el archivo tcpdf_config.php de libraries/config
                $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
 
                //relación utilizada para ajustar la conversión de los píxeles
                $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
 
 
                // ---------------------------------------------------------
                // establecer el modo de fuente por defecto
                $pdf->setFontSubsetting(true);
 
                // Establecer el tipo de letra
 
                //Si tienes que imprimir carácteres ASCII estándar, puede utilizar las fuentes básicas como
                // Helvetica para reducir el tamaño del archivo.
                $pdf->SetFont('helvetica', '', 9, '', true);
 
                // Añadir una página
                // Este método tiene varias opciones, consulta la documentación para más información.
                $pdf->AddPage();
 
                $numnotas=$datacurempcap->numeronotas;
                

                //fila titulo notas
                if ($numnotas=='0'){
                    $filanotatitulo='';
                }

                if ($numnotas=='1'){
                    $filanotatitulo='<td width="120" align="center"><b>N1</b></td>';
                }

                if ($numnotas=='2'){
                    $filanotatitulo='<td width="60" align="center"><b>N1</b></td><td width="60" align="center"><b>N2</b></td>';
                }

                if ($numnotas=='3'){
                    $filanotatitulo='<td width="40" align="center"><b>N1</b></td><td width="40" align="center"><b>N2</b></td><td width="40" align="center"><b>N3</b></td>';
                }

                if ($numnotas=='4'){
                    $filanotatitulo='<td width="30" align="center"><b>N1</b></td><td width="30" align="center"><b>N2</b></td><td width="30" align="center"><b>N3</b></td><td width="30" align="center"><b>N4</b></td>';
                }



                //fila notas
                if ($numnotas==0){
                    $filanotas='';
                }

                if ($numnotas==1){
                    $filanotas='<td align="center">10</td>';
                }

                if ($numnotas==2){
                    $filanotas='<td align="center">10</td><td align="center">20</td>';
                }

                if ($numnotas==3){
                    $filanotas='<td align="center">10</td><td align="center">20</td><td align="center">30</td>';
                }

                if ($numnotas==4){
                    $filanotas='<td align="center">10</td><td align="center">20</td><td align="center">30</td><td align="center">40</td>';
                }

     
                //preparamos y maquetamos el contenido a crear
                $html = '';
                $logosafesi = '';
                $firmacap = '';
                $html .= '<style type=text/css>';
                $html .= 'th{color: #fff; background-color: #1A597F;font-weight: bold;}';
                $html .= 'table{border-collapse: collapse;}'; 
                $html .= '</style>';

                $logosafesi .= '<img width="170" src="http://intranet.safesi.com/assets/img/lg-pdf-asis.png">';

                $html .= '<p align="center"><font size="12"><b>REGISTRO DE NOTAS</b></font></p>';


                $html .= '<table width="100%" border="0" cellpadding="2">';

                $html .= '<br>';

                $html .= '<tr><td width="316"><b>FECHA: </b>'.$datacurempcap->FechaFin.'</td><td width="316"><b>DURACIÓN: </b>'.$datacurempcap->horas.' Horas Efectivas</td></tr>';
                $html .= '<tr><td width="316"><b>TEMA: </b>'.$datacurempcap->nombrecurso.'</td><td width="316"><b>CAPACITADOR: </b>'.$datacurempcap->nombres_capacitador.' '.$datacurempcap->apellidos_capacitador.'</td></tr>';
                $html .= '<tr><td width="316"><b>LUGAR: </b>CETAR SAFESI</td><td width="316"></td></tr>';
                $html .= '<tr><td width="316"><b>EMPRESA: </b>'.$datacurempcap->razonsocial.'</td><td width="316"><b>FIRMA:</b><img width="120" src="http://intranet.safesi.com/uploads/firmas/'.$datacurempcap->firma_capacitador.'"></td></tr>';

                
                
                $html .= '</table>';

                $html .= '<br>';
                $html .= '<br>';

                $html .= '<table width="100%" border="1" cellpadding="6">';
                $html .= '<tr style="background-color:#d9d9d9;"><td width="35" align="center"><b>N°</b></td><td width="235" align="center"><b>APELLIDOS Y NOMBRES</b></td><td width="80" align="center"><b>DNI</b></td>'.$filanotatitulo.'<td width="80" align="center"><b>PROMEDIO</b></td><td width="100" align="center"><b>ESTADO</b></td></tr>';

                // $html .= '<tr><td align="center">1</td><td>NILTON NABARRO</td><td>ROMERO AGURTO</td><td align="center">71213062</td><td>-</td></tr>';
                $num = 1;
                foreach ($alumnos as $fila) {

                //Condicion Aproabado/Desaprobado
                if($fila->condicion==0){
                    $txtestado = 'NA';
                }

                if($fila->condicion==2){
                    $txtestado = 'Desaprobado';
                }

                if($fila->condicion==1){
                    $txtestado = 'Aprobado';
                }

                //fila notas
                if ($numnotas==0){
                    $filanotas='';
                }

                if ($numnotas==1){
                    $filanotas='<td align="center">'. $fila->nota1 .'</td>';
                }

                if ($numnotas==2){
                    $filanotas='<td align="center">'. $fila->nota1 .'</td><td align="center">'. $fila->nota2 .'</td>';
                }

                if ($numnotas==3){
                    $filanotas='<td align="center">'. $fila->nota1 .'</td><td align="center">'. $fila->nota2 .'</td><td align="center">'. $fila->nota3 .'</td>';
                }

                if ($numnotas==4){
                    $filanotas='<td align="center">'. $fila->nota1 .'</td><td align="center">'. $fila->nota2 .'</td><td align="center">'. $fila->nota3 .'</td><td align="center">'. $fila->nota4 .'</td>';
                }


                    $html .= '<tr><td align="center">'.$num++.'</td><td><font style="text-transform: uppercase;">' . $fila->apellidos . ' ' . $fila->nombres . '</font></td><td align="center">' . $fila->numerodocumento . '</td>'.$filanotas.'<td align="center">'. $fila->promedio .'</td><td align="center"><font style="text-transform: uppercase;">'. $txtestado .'</font></td></tr>';
                }


                $html .= '</table>';

                $html .= '<p>*La Nota aprobatoria es de 14 (70% respuesta correctas) en teoría Y práctica.</p>';
 
                // Imprimimos el texto con writeHTMLCell()
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = 10, $y = 12, $logosafesi, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = 12, $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);

                $pdf->writeHTMLCell($w = 0, $h = 0, $x = 108, $y = 48, $firmacap, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
 
                // ---------------------------------------------------------
                // Cerrar el documento PDF y preparamos la salida
                // Este método tiene varias opciones, consulte la documentación para más información.
                $nombre_archivo = utf8_decode("Lista de personas naturales.pdf");
                $pdf->Output($nombre_archivo, 'I');
    
        }


        //Certificado sín descripción
        public function getCertAlumno(){

                $this->load->library('Pdf');

                $fechcaduc = $this->input->get('fchcad');
                $adata = $this->PdfsModel->getDataCertificado();
                $datagerente = $this->PdfsModel->getDataGerente();

                $idcs = $this->input->get('idcs');
                $fechascurso = $this->PdfsModel->getFechasCurso($idcs);

                if($adata->cod_cip_capacitador == ''){
                    $cod_cip ='';
                }
                if ($adata->cod_cip_capacitador != '') {
                    $cod_cip ='Reg. CIP N° '.$adata->cod_cip_capacitador.'';
                }

               // create new PDF document
                $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

                // set document information
                $pdf->SetCreator(PDF_CREATOR);
                $pdf->SetAuthor('SAFE SCAFFOLDING INDUSTRY S.A.C');
                $pdf->SetTitle('Certificado para '.$adata->nombres.' '.$adata->apellidos.'');
                $pdf->SetSubject('Información');

                // remove default header/footer
                $pdf->setPrintHeader(false);
                $pdf->setPrintFooter(false);

                // set default monospaced font
                $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

                // set margins
                $pdf->SetMargins(10, PDF_MARGIN_TOP, 10);

                // set auto page breaks
                $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

                // set image scale factor
                $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

                // set some language-dependent strings (optional)
                if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                    require_once(dirname(__FILE__).'/lang/eng.php');
                    $pdf->setLanguageArray($l);
                }

                // ---------------------------------------------------------

                $pdf->SetDisplayMode('fullpage', 'SinglePage', 'UseNone');


                $pdf->AddPage('L', 'A4');

                // get the current page break margin
                $bMargin = $pdf->getBreakMargin();
                // get current auto-page-break mode
                $auto_page_break = $pdf->getAutoPageBreak();
                // disable auto-page-break
                $pdf->SetAutoPageBreak(false, 0);
                // set bacground image
                //$bg_cerficado_imagen = 'certificado-m32.jpg';

                $img_file = base_url().'uploads/bgcertificado/'.$adata->img_bg_certificado.'';
                $pdf->Image($img_file, 0, 0, 298, '', '', '', '', false, 300, '', false, false, 0);
                // restore auto-page-break status
                $pdf->SetAutoPageBreak($auto_page_break, $bMargin);
                // set the starting point for the page content
                $pdf->setPageMark();

                //Función generador de Numero

                if($adata->ct_serie == 'SAFESI-C18-'){
                    $codigocertificado = ''.$adata->ct_serie.''.$adata->ct_correlativo.'';
                }else{
                    $codigocertificado = 'COD: '.$adata->ct_serie.''.$adata->ct_correlativo.'';
                }

                $html = '';
                $html2 = '';
                $html3 = '';
                $html4 = '';
                $html5 = '';
                $html6 = '';
                $html7 = '';
                $firmacapa = '';
                $firmagerente = '';
                $codcert = '';
                $html .='<br>';
                $html .='<br>';
                $html .='<br>';
                $html .='<br>';
                $html .='<br>';
                $html .='<br>';
                $html .='<br>';
                $html .='<br>';
                $html .='<br>';

                // set font
                $html .= '<h1 align="center"><font size="30" style="text-transform: uppercase;"><b>'.$adata->nombres.' '.$adata->apellidos.'</b></font></h1>';

                $html2 .= '<p align="center"><small>----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</small></p>';
                $html3 .= '<p align="center"><font size="13">Por haber aprobado satisfactoriamente el curso realizado el '.$fechascurso->vAcumulado.'.</font></p>';
                $html4 .= '<h1 align="center"><font size="21" style="text-transform: uppercase;"><b>'.$adata->nombrecurso.'</b></font></h1>';
                $html5 .= '<p align="center"><font size="16"><b>('.$adata->horas.' Horas)</b></font></p>';
                $html5 .= '<br>';
                $html5 .= '<br>';
                $html5 .= '<br>';
                $html5 .= '<br>';
                $html6 .= '<p>Emisión: '.$adata->fechainiciocertificado.'<br>Válido hasta: <b>'.$adata->fecha_vigenica.'</b></p>';

                $codcert .= '<p><font size="13" style="text-transform: uppercase;"><b>'.$adata->tipodocumento.': '.$adata->numerodocumento.'</b><br><b>NOTA: '.$adata->promedio.'</b><br><b>'.$codigocertificado.'</b></font></p>';

                $firmacapa .='<img width="170"  src="http://intranet.safesi.com/uploads/firmas/'.$adata->firma_capacitador.'">';

                $firmagerente .= '<img width="230" src="http://intranet.safesi.com/uploads/firmas/'.$datagerente->img_firma_gerente.'">';
                
                $html7 .='<br>';
                $html7 .='<br>';
                $html7 .='<table width="600">
                            <tr>
                                <td>
                                    <p align="center"><br><br>_____________________________<br>
                                        <font style="text-transform: uppercase;" size="9">'.$adata->nombres_capacitador.' '.$adata->apellidos_capacitador.'<br>'.$adata->profesion_capacitador.'<br>'.$cod_cip.'</font>
                                    </p>
                                </td>
                                <td>
                                    <p align="center"><br><br>_____________________________<br>
                                        <font style="text-transform: uppercase;" size="9">'.$datagerente->nombres_gerente.' '.$datagerente->apellidos_gerente.'<br>GERENTE GENERAL</font>
                                    </p>
                                </td>
                            </tr>
                          </table>';


                // Imprimimos el texto con writeHTMLCell()
                $pdf->SetFont('futuramdbt', 20);
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
                $pdf->SetFont('helvetica', 8);
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html2, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
                $pdf->SetFont('kalinga', 16);
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html3, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
                $pdf->SetFont('futuramdbt', 21);
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html4, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
                $pdf->SetFont('futuramdbt', 16);
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html5, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
                $pdf->SetFont('kalinga', 12);
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = 26, $y = '', $html6, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
                $pdf->SetFont('futuramdbt', 6);
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = 72, $y = '', $html7, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);


                //Ubicación Firma del gerente
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = 170, $y = 145, $firmagerente, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);

                $pdf->SetFont('futuramdbt', 13);
                //Ubicación dni,nota y codigo certificado
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = 26, $y = 165, $codcert, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);



                //Ubicación Firma del capacitador
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = 87, $y = 143, $firmacapa, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);


                $pdf->lastPage();

                // ---------------------------------------------------------

                //Close and output PDF document
                $nombre_archivo = utf8_decode('certificado-de-'.$adata->nombres.'.pdf');
                $pdf->Output($nombre_archivo, 'I');

                //============================================================+
                // END OF FILE
                //============================================================+
                    
            

        }


        //Certificado con descripción============================================================+
        public function getCertDescripAlumno(){

                $this->load->library('Pdf');

                $fechcaduc = $this->input->get('fchcad');
                $adata = $this->PdfsModel->getDataCertificado();
                $datagerente = $this->PdfsModel->getDataGerente();

                $idcs = $this->input->get('idcs');
                $fechascurso = $this->PdfsModel->getFechasCurso($idcs);

                if($adata->cod_cip_capacitador == ''){
                    $cod_cip ='';
                }
                if ($adata->cod_cip_capacitador != '') {
                    $cod_cip ='Reg. CIP N° '.$adata->cod_cip_capacitador.'';
                }

               // create new PDF document
                $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

                // set document information
                $pdf->SetCreator(PDF_CREATOR);
                $pdf->SetAuthor('SAFE SCAFFOLDING INDUSTRY S.A.C');
                $pdf->SetTitle('Certificado para '.$adata->nombres.' '.$adata->apellidos.'');
                $pdf->SetSubject('Información');

                // remove default header/footer
                $pdf->setPrintHeader(false);
                $pdf->setPrintFooter(false);

                // set default monospaced font
                $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

                // set margins
                $pdf->SetMargins(10, PDF_MARGIN_TOP, 10);

                // set auto page breaks
                $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

                // set image scale factor
                $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

                // set some language-dependent strings (optional)
                if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                    require_once(dirname(__FILE__).'/lang/eng.php');
                    $pdf->setLanguageArray($l);
                }

                // ---------------------------------------------------------

                $pdf->SetDisplayMode('fullpage', 'SinglePage', 'UseNone');


                $pdf->AddPage('L', 'A4');

                // get the current page break margin
                $bMargin = $pdf->getBreakMargin();
                // get current auto-page-break mode
                $auto_page_break = $pdf->getAutoPageBreak();
                // disable auto-page-break
                $pdf->SetAutoPageBreak(false, 0);
                // set bacground image
                //$bg_cerficado_imagen = 'certificado-m32.jpg';

                $img_file = base_url().'uploads/bgcertificado/'.$adata->img_bg_certificado.'';
                $pdf->Image($img_file, 0, 0, 298, '', '', '', '', false, 300, '', false, false, 0);
                // restore auto-page-break status
                $pdf->SetAutoPageBreak($auto_page_break, $bMargin);
                // set the starting point for the page content
                $pdf->setPageMark();

                //Función generador de Numero

                if($adata->ct_serie == 'SAFESI-C18-'){
                    $codigocertificado = ''.$adata->ct_serie.''.$adata->ct_correlativo.'';
                }else{
                    $codigocertificado = 'COD: '.$adata->ct_serie.''.$adata->ct_correlativo.'';
                }

                $html = '';
                $html2 = '';
                $html3 = '';
                $html4 = '';
                $html5 = '';
                $html6 = '';
                $html7 = '';
                $descripcion = '';
                $firmacapa = '';
                $firmagerente = '';
                $codcert = '';
                $html .='<br>';
                $html .='<br>';
                $html .='<br>';
                $html .='<br>';
                $html .='<br>';
                $html .='<br>';
                $html .='<br>';
                $html .='<br>';
                $html .='<br>';

                // set font
                $html .= '<h1 align="center"><font size="30" style="text-transform: uppercase;"><b>'.$adata->nombres.' '.$adata->apellidos.'</b></font></h1>';

                $html2 .= '<p align="center"><small>----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</small></p>';
                $html3 .= '<p align="center"><font size="13">Por haber aprobado satisfactoriamente el curso realizado el '.$fechascurso->vAcumulado.'.</font></p>';
                $html4 .= '<h1 align="center"><font size="21" style="text-transform: uppercase;"><b>'.$adata->nombrecurso.'</b></font></h1>';
                $html5 .= '<p align="center"><font size="16"><b>('.$adata->horas.' Horas)</b></font></p>';
                

                $descripcion .= '<table width="855" >
                					<tr>
                						
                						<td align="center" height="51">'.$adata->descripcion.'</td>
                					</tr>
                				</table>';
                $descripcion .= '<br>';
         
                $html6 .= '<p>Emisión: '.$adata->fechainiciocertificado.'<br>Válido hasta: <b>'.$adata->fecha_vigenica.'</b></p>';

                $codcert .= '<p><font size="13" style="text-transform: uppercase;"><b>'.$adata->tipodocumento.': '.$adata->numerodocumento.'</b><br><b>NOTA: '.$adata->promedio.'</b><br><b>'.$codigocertificado.'</b></font></p>';

                $firmacapa .='<img width="170"  src="http://intranet.safesi.com/uploads/firmas/'.$adata->firma_capacitador.'">';

                $firmagerente .= '<img width="230" src="http://intranet.safesi.com/uploads/firmas/firma-gerente.png">';
                
                $html7 .='<table width="600">
                            <tr>
                                <td>
                                    <p align="center"><br><br>_____________________________<br>
                                        <font style="text-transform: uppercase;" size="9">'.$adata->nombres_capacitador.' '.$adata->apellidos_capacitador.'<br>'.$adata->profesion_capacitador.'<br>'.$cod_cip.'</font>
                                    </p>
                                </td>
                                <td>
                                    <p align="center"><br><br>_____________________________<br>
                                        <font style="text-transform: uppercase;" size="9">'.$datagerente->nombres_gerente.' '.$datagerente->apellidos_gerente.'<br>GERENTE GENERAL</font>
                                    </p>
                                </td>
                            </tr>
                          </table>';


                // Imprimimos el texto con writeHTMLCell()
                $pdf->SetFont('futuramdbt', 20);
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
                $pdf->SetFont('helvetica', 8);
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html2, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
                $pdf->SetFont('kalinga', 16);
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html3, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
                $pdf->SetFont('futuramdbt', 21);
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html4, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
                $pdf->SetFont('futuramdbt', 16);
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html5, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
                $pdf->SetFont('kalinga', 12);
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = 26, $y = '', $descripcion, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
                $pdf->SetFont('kalinga', 12);
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = 26, $y = '', $html6, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
                $pdf->SetFont('futuramdbt', 6);
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = 72, $y = '', $html7, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);


                //Ubicación Firma del gerente
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = 170, $y = 150, $firmagerente, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);

                $pdf->SetFont('futuramdbt', 13);
                //Ubicación dni,nota y codigo certificado
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = 26, $y = 165, $codcert, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);



                //Ubicación Firma del capacitador
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = 87, $y = 148, $firmacapa, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);


                $pdf->lastPage();

                // ---------------------------------------------------------

                //Close and output PDF document
                $nombre_archivo = utf8_decode('certificado-de-'.$adata->nombres.'.pdf');
                $pdf->Output($nombre_archivo, 'I');

                //============================================================+
                // END OF FILE
                //============================================================+          

        }
        
        
        
        
        
        
        
        //Certificado Nueva Version============================================================+
        public function viewcertificado(){

                $this->load->library('Pdf');

                
                $adata = $this->PdfsModel->getDataCertificado();
                
                $idcs = $this->input->get('idcs');
                $fechascurso = $this->PdfsModel->getFechasCurso($idcs);

                if($adata->cod_cip_capacitador == ''){
                    $cod_cip ='';
                } else {
                    $cod_cip ='Reg. CIP N° '.$adata->cod_cip_capacitador.'';
                }
                
                if($adata->gerenteprofesion == ''){
                    $gerenteprofesion = '<b></b>';
                }else{
                    $gerenteprofesion = $adata->gerenteprofesion;
                }
                
                if($adata->gerentecip == ''){
                    $gerentecip = '<b></b>';
                }else{
                    $gerentecip = 'Reg. CIP N° '.$adata->gerentecip.'';
                }

               // create new PDF document
                $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

                // set document information
                $pdf->SetCreator(PDF_CREATOR);
                $pdf->SetAuthor('SAFE SCAFFOLDING INDUSTRY S.A.C');
                $pdf->SetTitle('Certificado para '.$adata->nombres.' '.$adata->apellidos.'');
                $pdf->SetSubject('Información');

                // remove default header/footer
                $pdf->setPrintHeader(false);
                $pdf->setPrintFooter(false);

                // set default monospaced font
                $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

                // set margins
    			$pdf->SetAutoPageBreak(TRUE, 0);
    			$pdf->setFooterMargin(0);
    			$pdf->setPrintHeader(false);
    			$pdf->setPrintFooter(false);

                // set margins
                $pdf->SetMargins(10, PDF_MARGIN_TOP, 10);

                // set image scale factor
                $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

                // set some language-dependent strings (optional)
                if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                    require_once(dirname(__FILE__).'/lang/eng.php');
                    $pdf->setLanguageArray($l);
                }

                // ---------------------------------------------------------

                $pdf->SetDisplayMode('fullpage', 'SinglePage', 'UseNone');


                $pdf->AddPage('L', 'A4');

                // get the current page break margin
                $bMargin = $pdf->getBreakMargin();
                // get current auto-page-break mode
                $auto_page_break = $pdf->getAutoPageBreak();
                // disable auto-page-break
                $pdf->SetAutoPageBreak(false, 0);
                // set bacground image
                //$bg_cerficado_imagen = 'certificado-m32.jpg';

                $img_file = base_url().'uploads/bgcertificado/'.$adata->img_bg_certificado.'';
                $pdf->Image($img_file, 0, 0, 298, '', '', '', '', false, 300, '', false, false, 0);
                // restore auto-page-break status
                $pdf->SetAutoPageBreak($auto_page_break, $bMargin);
                // set the starting point for the page content
                $pdf->setPageMark();

                //Función generador de Numero

                if($adata->ct_serie == 'SAFESI-C18-'){
                    $codigocertificado = ''.$adata->ct_serie.''.$adata->ct_correlativo.'';
                }else{
                    $codigocertificado = 'COD: '.$adata->ct_serie.''.$adata->ct_correlativo.'';
                }

                $html = '';
                $html2 = '';
                $html3 = '';
                $html4 = '';
                $html5 = '';
                $html6 = '';
                $html7 = '';
                $descripcion = '';
                $firmacapa = '';
                $firmagerente = '';
                $codcert = '';
                $codqr = '';
                $html .='<br>';
                $html .='<br>';
                $html .='<br>';
                $html .='<br>';
                $html .='<br>';
                $html .='<br>';
                $html .='<br>';
                $html .='<br>';
                $html .='<br>';

                // set font
                $html .= '<h1 align="center"><font size="30" style="text-transform: uppercase;"><b>'.$adata->nombres.' '.$adata->apellidos.'</b></font></h1>';

                $html2 .= '<p align="center"><small>----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</small></p>';
                $html3 .= '<p align="center"><font size="13">'.$adata->desc_tipocertificado.' '.$fechascurso->vAcumulado.'.</font></p>';
                $html4 .= '<h1 align="center"><font size="21" style="text-transform: uppercase;"><b>'.$adata->nombrecurso.'</b></font></h1>';
                $html5 .= '<p align="center"><font size="16"><b>('.$adata->horas.' Horas)</b></font></p>';
                
                if($adata->mostrardescripcion == '0' || $adata->descripcion =='' ){
                    $descripcion .= '<table width="855" >
                					<tr>
                						<td align="center" height="51"></td>
                					</tr>
                				</table>';
                    $descripcion .= '<br>';
                }else{
                    
                    $descripcion .= '<table width="855" >
                					<tr>
                						
                						<td align="center" height="51">'.$adata->descripcion.'</td>
                					</tr>
                				</table>';
                    $descripcion .= '<br>';
                
                }
                
                if($adata->vigencia_curso == '0'){
                    $certivigenvia = '<b></b>';
                }else{
                    $certivigenvia = 'Válido hasta: <b>'.$adata->fecha_vigenica.'</b>';
                }
         
                $html6 .= '<p>Emisión: '.$adata->fechainiciocertificado.'<br>'.$certivigenvia.'</p>';
                
                if($adata->mostrar_nota == '1'){
                    $promedio = '<b>NOTA: '.$adata->promedio.'</b><br>';
                }else{
                    $promedio = '';
                }

                $codcert .= '<p><font size="13" style="text-transform: uppercase;">'.$promedio.'<b>'.$adata->tipodocumento.': '.$adata->numerodocumento.'</b><br><b>'.$codigocertificado.'</b></font></p>';

                $firmacapa .='<img width="170"  src="https://intranet.safesi.com/uploads/firmas/'.$adata->firma_capacitador.'">';

                $firmagerente .= '<img width="230" src="https://intranet.safesi.com/uploads/firmas/'.$adata->img_firma_gerente.'">';
                
                $html7 .='<table width="600">
                            <tr>
                                <td>
                                    <p align="center"><br><br>_____________________________<br>
                                        <font style="text-transform: uppercase;" size="9">'.$adata->nombres_capacitador.' '.$adata->apellidos_capacitador.'<br>'.$adata->profesion_capacitador.'<br>'.$cod_cip.'</font>
                                    </p>
                                </td>
                                <td>
                                    <p align="center"><br><br>_____________________________<br>
                                        <font style="text-transform: uppercase;" size="9">'.$adata->nombres_gerente.' '.$adata->apellidos_gerente.'<br>'.$adata->cargo.'<br>'.$gerenteprofesion.'<br>'.$gerentecip.'</font>
                                    </p>
                                </td>
                            </tr>
                          </table>';
                
                $codqr .= '<img width="95" src="https://intranet.safesi.com/uploads/qr-img-vc.png">';


                // Imprimimos el texto con writeHTMLCell()
                $pdf->SetFont('futuramdbt', 20);
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
                $pdf->SetFont('helvetica', 8);
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html2, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
                $pdf->SetFont('kalinga', 16);
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html3, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
                $pdf->SetFont('futuramdbt', 21);
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html4, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
                $pdf->SetFont('futuramdbt', 16);
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html5, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
                $pdf->SetFont('kalinga', 12);
                
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = 26, $y = '', $descripcion, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
                
                $pdf->SetFont('kalinga', 12);
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = 26, $y = '', $html6, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
                $pdf->SetFont('futuramdbt', 6);
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = 72, $y = 156, $html7, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);


                //Ubicación Firma del gerente
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = 170, $y = 155, $firmagerente, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);

                $pdf->SetFont('futuramdbt', 13);
                //Ubicación dni,nota y codigo certificado
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = 26, $y = 165, $codcert, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);



                //Ubicación Firma del capacitador
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = 87, $y = 153, $firmacapa, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);

                //Ubicación Codigo QR
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = 241, $y = 144, $codqr, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);


                // Check the condition to add the second page
                if ($adata->mostrar_modulo == 'si') {

                    // Remove default header/footer
                    $pdf->setPrintHeader(false);
                    $pdf->setPrintFooter(false);

                    // Set margins
                    $pdf->SetAutoPageBreak(TRUE, 0);
                    $pdf->setFooterMargin(0);
                    $pdf->SetMargins(0, 0, 0); // Set margins to 0 to ensure full page background

                    // Set image scale factor
                    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
                    
                    // Set display mode
                    $pdf->SetDisplayMode('fullpage', 'SinglePage', 'UseNone');

                    // Add second page
                    $pdf->AddPage('L', 'A4');

                    // Set background image for the second page
                    $img_file_second = base_url() . 'uploads/bgcertificado/' . $adata->img_bg_certificado_dos; // Change this to the correct image path
                    $pdf->Image($img_file_second, 0, 0, 298, '', '', '', '', false, 300, '', false, false, 0);

                    // Disable auto-page-break
                    $pdf->SetAutoPageBreak(false, 0);
                    $pdf->setPageMark();




                    // Add content to the second page as needed
                    $html_texto_nota = '<font style="text-transform: uppercase; color: #00aeda;" size="24"><b>'.$adata->promedio.'</b></font>';
                    $html_texto_titulo = '<font style="text-transform: uppercase;" size="14"><b>CONTENIDO DEL CURSO:</b></font>';
                    $html_texto_contenido = $adata->textomodulo;


                    $pdf->SetFont('futuramdbt');
                    $pdf->writeHTMLCell($w = 0, $h = 0, $x = 268, $y = 6.5, $html_texto_nota, $border = 0, $ln = 0, $fill = 0, $reseth = true, $align = '', $autopadding = true);
                    
                    $pdf->SetFont('helvetica', 'I');
                    $pdf->writeHTMLCell($w = 0, $h = 0, $x = 15, $y = 18, $html_texto_titulo, $border = 0, $ln = 0, $fill = 0, $reseth = true, $align = '', $autopadding = true);

                    $pdf->SetFont('helvetica');
                    $pdf->writeHTMLCell($w = 0, $h = 0, $x = 15, $y = 27, $html_texto_contenido, $border = 0, $ln = 0, $fill = 0, $reseth = true, $align = '', $autopadding = true);

                    //$codigocertificado
                    $pdf->SetFont('helvetica');
                    $pdf->writeHTMLCell($w = 0, $h = 0, $x = 247, $y = 190, '<b><i>'.$codigocertificado.'</i></b>', $border = 0, $ln = 0, $fill = 0, $reseth = true, $align = '', $autopadding = true);


                }

                // Ensure we are on the last page
                $pdf->lastPage();
                // ---------------------------------------------------------

                //Close and output PDF document
                $nombre_archivo = utf8_decode('certificado-de-'.$adata->nombres.'.pdf');
                $pdf->Output($nombre_archivo, 'I');

                //============================================================+
                // END OF FILE
                //============================================================+          

        }
        
        
        
        
        
        
        
        
        
        
        



        public function getListOfAsistForCurso(){
                $this->load->library('Pdf');

                $alumnos = $this->PdfsModel->getAllAlumnosAsistenciaForCurso();
                $datacurcap = $this->PdfsModel->getDataCurCap();

                $idfhc=$this->input->get('idfhc');
                //$idh='70';
                $datahorarioc = $this->PdfsModel->getHorarioCurso($idfhc);

                //$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
                $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
                $pdf->SetCreator(PDF_CREATOR);
                $pdf->SetAuthor('SAFE SCAFFOLDING INDUSTRY S.A.C');
                $pdf->SetTitle('Lista de alumnos');
                $pdf->SetSubject('Información');

                $image_file = 'safesi.png';
 
                $pdf->SetPrintHeader(false);
                $pdf->SetPrintFooter(false);
 
                // se pueden modificar en el archivo tcpdf_config.php de libraries/config
                $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_RIGHT);
 
                // se pueden modificar en el archivo tcpdf_config.php de libraries/config
                $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
 
                //relación utilizada para ajustar la conversión de los píxeles
                $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
 
 
                // ---------------------------------------------------------
                // establecer el modo de fuente por defecto
                $pdf->setFontSubsetting(true);
 
                // Establecer el tipo de letra
 
                //Si tienes que imprimir carácteres ASCII estándar, puede utilizar las fuentes básicas como
                // Helvetica para reducir el tamaño del archivo.
                $pdf->SetFont('helvetica', '', 10, '', true);
 
                // Añadir una página
                // Este método tiene varias opciones, consulta la documentación para más información.
                //$pdf->AddPage();
                $pdf->AddPage('L', 'A4');
 
     
                //preparamos y maquetamos el contenido a crear
                $html = '';
                $firmacap = '';
                $html .= '<style type=text/css>';
                $html .= 'th{color: #fff; background-color: #1A597F;font-weight: bold;}';
                $html .= 'table{border-collapse: collapse;}'; 
                //$html .= 'td{border-top: 1px solid #dee2e6; padding-top: 8px; padding-bottom: 8px;}'; cetar-pdf
                $html .= '</style>';
                //$html .= "<h2>Localidades de ".$prov."</h2><h4>Actualmente: ".count($provincias)." localidades</h4>";
                $html .= '<table width="100%" border="1" cellpadding="10" nobr="true">';
                $html .= '<tr><td rowspan="2" width="170"><img src="http://intranet.safesi.com/assets/img/lg-pdf-asis.png"></td><td align="center" width="630">ÁREA DE CAPACITACIÓN</td><td rowspan="2" width="140"><img src="http://intranet.safesi.com/assets/img/cetar-pdf.png"></td></tr>';
                $html .= '<tr><td align="center" width="630"><h3><b>LISTA DE ASISTENCIA</b></h3></td></tr>';
                $html .= '</table>';

                $html .= '<br>';
                $html .= '<br>';


                $html .= '<table width="100%" border="0" cellpadding="6">';
                $html .= '<tr><td width="600"><b>FECHA: </b>'.$datahorarioc->fecha.'</td><td width="400"><b>LUGAR: </b>'.$datahorarioc->lugar_de_clase.'</td></tr>';
                $html .= '<tr><td width="600"><b>TEMA: </b>'.$datacurcap->nombrecurso.'</td><td width="400"><b>CAPACITADOR: </b>'.$datacurcap->nombres_capacitador.' '.$datacurcap->apellidos_capacitador.'</td></tr>';
                $html .= '<tr><td width="600"><b>DURACIÓN: </b>'.$datacurcap->horas.' Horas</td><td width="400"><b>FIRMA: </b> <img width="120" src="http://intranet.safesi.com/uploads/firmas/'.$datacurcap->firma_capacitador.'"></td></tr>';

                $html .= '</table>';


                $html .= '<table width="100%" style="margin-top: -149px;" border="1" cellpadding="11">';

                $html .= '<tr style="background-color:#e6e6e6">
                            <td width="40" align="center"><b>N°</b></td>
                            <td width="320" align="center"><b>EMPRESA</b></td>
                            <td width="320" align="center"><b>APELLIDOS Y NOMBRES</b></td>
                            
                            <td width="92" align="center"><b>DNI</b></td>
                            <td width="170" align="center"><b>FIRMA</b></td>
                        </tr>';

                $num = 1;
                foreach ($alumnos as $fila) {
                    $html .= '<tr nobr="true">
                                <td align="center">'.$num++.'</td>
                                <td>' .$fila->razonsocial. '</td>
                                <td>' .$fila->apellidos.', '.$fila->nombres.'</td>
                                <td align="center">'.$fila->numerodocumento.'</td>
                                <td></td>
                             </tr>';


                             if ($num==10 || $num==25 || $num==40) {
                                $html .= '<tr nobr="true" style="background-color:#e6e6e6">
                                        <td width="40" align="center"><b>N°</b></td>
                                        <td width="320" align="center"><b>EMPRESA</b></td>
                                        <td width="320" align="center"><b>APELLIDOS Y NOMBRES</b></td>
                                        
                                        <td width="92" align="center"><b>DNI</b></td>
                                        <td width="170" align="center"><b>FIRMA</b></td>
                                    </tr>';
                             }


                }

                $html .= '</table>';
 
                // Imprimimos el texto con writeHTMLCell()
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
                //$pdf->writeHTMLCell($w = 0, $h = 0, $x = 117, $y = 61, $firmacap, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);


 
                // ---------------------------------------------------------
                // Cerrar el documento PDF y preparamos la salida
                // Este método tiene varias opciones, consulte la documentación para más información.
                $nombre_archivo = utf8_decode("Lista alumnos - Curso.pdf");
                $pdf->Output($nombre_archivo, 'I');
        }




        public function getListOfAsistForCursoRegistroPractica(){
                $this->load->library('Pdf');

                $alumnos = $this->PdfsModel->getAllAlumnosAsistenciaForCurso();
                $datacurcap = $this->PdfsModel->getDataCurCap();

                $idfhc=$this->input->get('idfhc');
                //$idh='70';
                $datahorarioc = $this->PdfsModel->getHorarioCurso($idfhc);

                //$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
                $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
                $pdf->SetCreator(PDF_CREATOR);
                $pdf->SetAuthor('SAFE SCAFFOLDING INDUSTRY S.A.C');
                $pdf->SetTitle('Lista de alumnos');
                $pdf->SetSubject('Información');

                $image_file = 'safesi.png';
 
                $pdf->SetPrintHeader(false);
                $pdf->SetPrintFooter(false);
 
                // se pueden modificar en el archivo tcpdf_config.php de libraries/config
                $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_RIGHT);
 
                // se pueden modificar en el archivo tcpdf_config.php de libraries/config
                $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
 
                //relación utilizada para ajustar la conversión de los píxeles
                $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
 
 
                // ---------------------------------------------------------
                // establecer el modo de fuente por defecto
                $pdf->setFontSubsetting(true);
 
                // Establecer el tipo de letra
 
                //Si tienes que imprimir carácteres ASCII estándar, puede utilizar las fuentes básicas como
                // Helvetica para reducir el tamaño del archivo.
                $pdf->SetFont('helvetica', '', 10, '', true);
 
                // Añadir una página
                // Este método tiene varias opciones, consulta la documentación para más información.
                //$pdf->AddPage();
                $pdf->AddPage('L', 'A4');
 
     
                //preparamos y maquetamos el contenido a crear
                $html = '';
                $cabeclista = '';

                $cabeclista .= '<table width="100%" border="0" cellpadding="0" nobr="true">
                                    <tr>
                                        <td width="273"><img src="http://intranet.safesi.com/assets/img/lg-pdf-asis.png"></td>
                                        <td align="center" width="383"><h3><b><br>REGISTRO DE PRACTICA<br>&nbsp;</h3></b></td>
                                        <td width="273">
                                            <b>Lugar: </b>CETAR SAFESI<br>
                                            <b>Tema: </b>'.$datacurcap->nombrecurso.'<br>
                                            <b>Fecha: </b>'.$datahorarioc->fecha.'<br>
                                            <b>Capacitador: </b>'.$datacurcap->nombres_capacitador.' '.$datacurcap->apellidos_capacitador.'
                                        </td>
                                    </tr>
                                </table>';

                $html .= '<br>';
                $html .= '<br>';

                $html .= '<table width="100%" style="margin-top: -149px;" border="1" cellpadding="11">';


                            $html .= '
                                    <tr style="background-color:#e6e6e6">
                                        <td width="40" align="center"><b>N°</b></td>
                                        <td width="320" align="center"><b>EMPRESA</b></td>
                                        <td width="320" align="center"><b>APELLIDOS Y NOMBRES</b></td>
                                        <td width="49" align="center"><b>&nbsp;</b></td>
                                        <td width="49" align="center"><b>&nbsp;</b></td>
                                        <td width="49" align="center"><b>&nbsp;</b></td>
                                        <td width="49" align="center"><b>&nbsp;</b></td>
                                        <td width="89" align="center"><b>NOTA<br>PRACTICA</b></td>
                                    </tr>
                                    
                                    ';


                            $num = 1;
                            foreach ($alumnos as $fila) {
                                $html .= '<tr nobr="true">
                                                <td align="center">'.$num++.'</td>
                                                <td>' . $fila->razonsocial . '</td>
                                                <td>' . $fila->apellidos . ', ' . $fila->nombres . '</td>
                                                <td align="center"></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                          </tr>';


                            if ($num==13 || $num==27 || $num==43) {
                                        $html .= '
                                            <tr nobr="true" style="background-color:#e6e6e6">
                                                <td width="40" align="center"><b>N°</b></td>
                                                <td width="320" align="center"><b>EMPRESA</b></td>
                                                <td width="320" align="center"><b>APELLIDOS Y NOMBRES</b></td>
                                                <td width="49" align="center"><b>&nbsp;</b></td>
                                                <td width="49" align="center"><b>&nbsp;</b></td>
                                                <td width="49" align="center"><b>&nbsp;</b></td>
                                                <td width="49" align="center"><b>&nbsp;</b></td>
                                                <td width="89" align="center"><b>NOTA<br>PRACTICA</b></td>
                                            </tr>
                                        ';
                                }

                                }
                $html .= '</table>';

 
                // Imprimimos el texto con writeHTMLCell()
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = '10', $y = '', $cabeclista, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = '10', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);


 
                // ---------------------------------------------------------
                // Cerrar el documento PDF y preparamos la salida
                // Este método tiene varias opciones, consulte la documentación para más información.
                $nombre_archivo = utf8_decode("Lista Alumnos - Registro Practica.pdf");
                $pdf->Output($nombre_archivo, 'I');
        }



        public function getListOfNotasForCurso(){
                $this->load->library('Pdf');

                $alumnos = $this->PdfsModel->getAllAlumnosNotasForCurso();
                $datacurcap = $this->PdfsModel->getDataCurCap();

                $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
                $pdf->SetCreator(PDF_CREATOR);
                $pdf->SetAuthor('SAFE SCAFFOLDING INDUSTRY S.A.C');
                $pdf->SetTitle('Lista de alumnos');
                $pdf->SetSubject('Información');

                $image_file = 'safesi.png';
 
                $pdf->SetPrintHeader(false);
                $pdf->SetPrintFooter(false);
 
                // se pueden modificar en el archivo tcpdf_config.php de libraries/config
                $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_RIGHT);
 
                // se pueden modificar en el archivo tcpdf_config.php de libraries/config
                $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
 
                //relación utilizada para ajustar la conversión de los píxeles
                $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
 
 
                // ---------------------------------------------------------
                // establecer el modo de fuente por defecto
                $pdf->setFontSubsetting(true);
 
                // Establecer el tipo de letra
 
                //Si tienes que imprimir carácteres ASCII estándar, puede utilizar las fuentes básicas como
                // Helvetica para reducir el tamaño del archivo.
                $pdf->SetFont('helvetica', '', 9, '', true);
 
                // Añadir una página
                // Este método tiene varias opciones, consulta la documentación para más información.
                $pdf->AddPage();
 
                $numnotas=$datacurcap->numeronotas;
                

                //fila titulo notas
                if ($numnotas=='0'){
                    $filanotatitulo='';
                }

                if ($numnotas=='1'){
                    $filanotatitulo='<td width="120" align="center"><b>N1</b></td>';
                }

                if ($numnotas=='2'){
                    $filanotatitulo='<td width="60" align="center"><b>N1</b></td><td width="60" align="center"><b>N2</b></td>';
                }

                if ($numnotas=='3'){
                    $filanotatitulo='<td width="40" align="center"><b>N1</b></td><td width="40" align="center"><b>N2</b></td><td width="40" align="center"><b>N3</b></td>';
                }

                if ($numnotas=='4'){
                    $filanotatitulo='<td width="30" align="center"><b>N1</b></td><td width="30" align="center"><b>N2</b></td><td width="30" align="center"><b>N3</b></td><td width="30" align="center"><b>N4</b></td>';
                }



                //fila notas
                if ($numnotas==0){
                    $filanotas='';
                }

                if ($numnotas==1){
                    $filanotas='<td align="center">10</td>';
                }

                if ($numnotas==2){
                    $filanotas='<td align="center">10</td><td align="center">20</td>';
                }

                if ($numnotas==3){
                    $filanotas='<td align="center">10</td><td align="center">20</td><td align="center">30</td>';
                }

                if ($numnotas==4){
                    $filanotas='<td align="center">10</td><td align="center">20</td><td align="center">30</td><td align="center">40</td>';
                }

     
                //preparamos y maquetamos el contenido a crear
                $html = '';
                $logosafesi = '';
                $firmacap = '';
                $html .= '<style type=text/css>';
                $html .= 'th{color: #fff; background-color: #1A597F;font-weight: bold;}';
                $html .= 'table{border-collapse: collapse;}'; 
               
                $html .= '</style>';

                $logosafesi .= '<img width="170" src="http://intranet.safesi.com/assets/img/lg-pdf-asis.png">';

                $html .= '<p align="center"><font size="12"><b>REGISTRO DE NOTAS</b></font></p>';


                $html .= '<table width="100%" border="0" cellpadding="2">';

                $html .= '<br>';

                $html .= '<tr><td width="316"><b>FECHA: </b>'.$datacurcap->FechaFin.'</td><td width="316"><b>CAPACITADOR: </b>'.$datacurcap->nombres_capacitador.' '.$datacurcap->apellidos_capacitador.'</td></tr>';
                $html .= '<tr><td width="316"><b>TEMA: </b>'.$datacurcap->nombrecurso.'</td><td width="316"></td></tr>';
                $html .= '<tr><td width="316"><b>DURACIÓN: </b>'.$datacurcap->horas.' Horas Efectivas</td><td width="316"></td></tr>';
                $html .= '<tr><td width="316"><b>LUGAR: </b>CETAR SAFESI</td><td width="316"><b>FIRMA: </b> <img width="120" src="http://intranet.safesi.com/uploads/firmas/'.$datacurcap->firma_capacitador.'"></td></tr>';

                $html .= '</table>';

                $html .= '<br>';
                $html .= '<br>';

                $html .= '<table width="100%" border="1" cellpadding="6">';
                $html .= '<tr style="background-color:#d9d9d9;"><td width="35" align="center"><b>N°</b></td><td width="235" align="center"><b>APELLIDOS Y NOMBRES</b></td><td width="80" align="center"><b>DNI</b></td>'.$filanotatitulo.'<td width="80" align="center"><b>PROMEDIO</b></td><td width="100" align="center"><b>ESTADO</b></td></tr>';

                // $html .= '<tr><td align="center">1</td><td>NILTON</td><td>ROMERO AGURTO</td><td align="center">71213062</td><td>-</td></tr>';
                $num = 1;
                foreach ($alumnos as $fila) {

                //Condicion Aproabado/Desaprobado
                if($fila->condicion==0){
                    $txtestado = 'NA';
                }

                if($fila->condicion==2){
                    $txtestado = 'Desaprobado';
                }

                if($fila->condicion==1){
                    $txtestado = 'Aprobado';
                }

                //fila notas
                if ($numnotas==0){
                    $filanotas='';
                }

                if ($numnotas==1){
                    $filanotas='<td align="center">'. $fila->nota1 .'</td>';
                }

                if ($numnotas==2){
                    $filanotas='<td align="center">'. $fila->nota1 .'</td><td align="center">'. $fila->nota2 .'</td>';
                }

                if ($numnotas==3){
                    $filanotas='<td align="center">'. $fila->nota1 .'</td><td align="center">'. $fila->nota2 .'</td><td align="center">'. $fila->nota3 .'</td>';
                }

                if ($numnotas==4){
                    $filanotas='<td align="center">'. $fila->nota1 .'</td><td align="center">'. $fila->nota2 .'</td><td align="center">'. $fila->nota3 .'</td><td align="center">'. $fila->nota4 .'</td>';
                }


                    $html .= '<tr><td align="center">'.$num++.'</td><td><font style="text-transform: uppercase;">' . $fila->apellidos . ' ' . $fila->nombres . '</font></td><td align="center">' . $fila->numerodocumento . '</td>'.$filanotas.'<td align="center">'. $fila->promedio .'</td><td align="center"><font style="text-transform: uppercase;">'. $txtestado .'</font></td></tr>';
                }


                $html .= '</table>';

                $html .= '<p>*La Nota aprobatoria es de 14 (70% respuesta correctas) en teoría Y práctica.</p>';
 
                // Imprimimos el texto con writeHTMLCell()
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = 10, $y = 12, $logosafesi, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = 12, $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);

                
 
                // ---------------------------------------------------------
                // Cerrar el documento PDF y preparamos la salida
                // Este método tiene varias opciones, consulte la documentación para más información.
                $nombre_archivo = utf8_decode("Lista de personas naturales.pdf");
                $pdf->Output($nombre_archivo, 'I');
    
        }


        //===================================================================================================================>


 






        //===================================================================================================================>


}