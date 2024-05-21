<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RptController extends CI_Controller
{


	public function __construct()
	{

		parent::__construct();
		$this->load->model("RptModel");
		$this->load->helper(array('form', 'url'));
		$this->load->model('AlumnoModel');
	}

	public function index(){
		$this->load->library('session');

		if($this->session->userdata('user')){
			$this->load->view('layout/header');
			$this->load->view('layout/topbar');
			$this->load->view('layout/sidebar');
			$this->load->view('rpt/index');
			$this->load->view('layout/footer');
		}else{
			redirect(base_url(), 'refresh');
		}
	}

	//Vista Lista de cursos para ver alumnos======================
	public function alumCurs(){
		$this->load->library('session');
		if($this->session->userdata('user')){
			$this->load->view('layout/header');
			$this->load->view('layout/topbar');
			$this->load->view('layout/sidebar');
			$this->load->view('rpt/alumcurs/index');
			$this->load->view('layout/footer');
		}else{
			redirect(base_url(), 'refresh');
		}
	}

	public function viewVistaCurso(){
		$this->load->library('session');
		if($this->session->userdata('user')){
			$this->load->view('layout/header');
			$this->load->view('layout/topbar');
			$this->load->view('layout/sidebar');
			$this->load->view('rpt/alumcurs/curso/index');
			$this->load->view('layout/footer');
		}else{
			redirect(base_url(), 'refresh');
		}
	}

	public function viewCorreos(){
		$this->load->library('session');

		if($this->session->userdata('user')){
			$this->load->view('layout/header');
			$this->load->view('layout/topbar');
			$this->load->view('layout/sidebar');
			$this->load->view('rpt/correos/index');
			$this->load->view('layout/footer');
		}else{
			redirect(base_url(), 'refresh');
		}
	}



	public function showDataCurso(){
		$result = $this->RptModel->showDataCurso();
		echo json_encode($result);
	}


	public function showListCursosPorPago(){
		$result = $this->RptModel->showListCursosPorPago();
		echo json_encode($result);
	}


	//Vista listar alumnos con certificado=========================
	public function alumCert(){
		$this->load->library('session');
		if($this->session->userdata('user')){
			$this->load->view('layout/header');
			
			$this->load->view('rpt/alumcert/index');
			$this->load->view('layout/footer');
		}else{
			redirect(base_url(), 'refresh');
		}
	}

	public function showListCert(){
		$result = $this->RptModel->showListCert();
		echo json_encode($result);
	}

	//Vista Lista de pagos por empresa===================================
	public function viewVistaPagosEmpresas(){
		$this->load->library('session');
		if($this->session->userdata('user')){
			$this->load->view('layout/header');
			$this->load->view('layout/topbar');
			$this->load->view('layout/sidebar');
			$this->load->view('rpt/pagos_empresas/index');
			$this->load->view('layout/footer');
		}else{
			redirect(base_url(), 'refresh');
		}
	}

	public function showListPagosEmpresas(){
		$result = $this->RptModel->showListPagosEmpresas();
		echo json_encode($result);
	}

	public function sumaTotalPagosEmpresas(){
		$result = $this->RptModel->sumaTotalPagosEmpresas();
		echo json_encode($result);
	}



	//Vista Lista de pagos personas naturales============================
	public function viewVistaPagosPersonasNatural(){
		$this->load->library('session');
		if($this->session->userdata('user')){
			$this->load->view('layout/header');
			$this->load->view('layout/topbar');
			$this->load->view('layout/sidebar');
			$this->load->view('rpt/pagos_personas_natural/index');
			$this->load->view('layout/footer');
		}else{
			redirect(base_url(), 'refresh');
		}
	}

	public function showListPagosPersonasNatural(){
		$result = $this->RptModel->showListPagosPersonasNatural();
		echo json_encode($result);
	}

	public function sumaTotalPagosPersonasNaturales(){
		$result = $this->RptModel->sumaTotalPagosPersonasNaturales();
		echo json_encode($result);
	}


	//Exportar en Excel Certificados
	public function expListCert(){
		$this->load->library('PHPExcel');
		$certificado = $this->phpexcel;
		$dataListCert = $this->RptModel->showListCert();

		//Estilos
		$titulo_estilo = array(
						    'alignment' => array(
            					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
       						 ),

                            'font'  => array(
                                'bold'  => true,
                                'color' => array('rgb' => '6AA84F'),
                                'size'  => 24,
                                'name'  => 'Calibri'
                            )
        );

        $titulo_cabeceras = array(
                            'font'  => array(
                            	'bold'  => true,
                                'color' => array('rgb' => '000000'),
                                'size'  => 12,
                                'name'  => 'Calibri'
                            )
        );

        $txt_alg_left = array(
                            'alignment' => array(
            					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
       						 )
        );

        $certificado->getActiveSheet()->getStyle('A')->applyFromArray($txt_alg_left);
        $certificado->getActiveSheet()->getStyle('G')->applyFromArray($txt_alg_left);

		$certificado->getActiveSheet()->getStyle('A1')->applyFromArray($titulo_estilo);
		$certificado->getActiveSheet()->getStyle('A2:H2')->applyFromArray($titulo_cabeceras);
		$certificado->getActiveSheet()->getStyle('A2:H2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('d4d4d4');


		//Definir Ancho de las Celdas
		$certificado->getActiveSheet()->getColumnDimension('A')->setAutoSize(false);
		$certificado->getActiveSheet()->getColumnDimension('A')->setWidth(17);
		$certificado->getActiveSheet()->getColumnDimension('B')->setAutoSize(false);
		$certificado->getActiveSheet()->getColumnDimension('B')->setWidth(66);
		$certificado->getActiveSheet()->getColumnDimension('C')->setAutoSize(false);
		$certificado->getActiveSheet()->getColumnDimension('C')->setWidth(47);
		$certificado->getActiveSheet()->getColumnDimension('D')->setAutoSize(false);
		$certificado->getActiveSheet()->getColumnDimension('D')->setWidth(20);
		$certificado->getActiveSheet()->getColumnDimension('E')->setAutoSize(false);
		$certificado->getActiveSheet()->getColumnDimension('E')->setWidth(20);
		$certificado->getActiveSheet()->getColumnDimension('F')->setAutoSize(false);
		$certificado->getActiveSheet()->getColumnDimension('F')->setWidth(39);
		$certificado->getActiveSheet()->getColumnDimension('G')->setAutoSize(false);
		$certificado->getActiveSheet()->getColumnDimension('G')->setWidth(10);
		$certificado->getActiveSheet()->getColumnDimension('H')->setAutoSize(false);
		$certificado->getActiveSheet()->getColumnDimension('H')->setWidth(7);


		//Combinar Celdas
		$certificado->getActiveSheet()->mergeCells('A1:H1');

		//Imprimir datos
		$certificado->setActiveSheetIndex(0)->setCellValue('A1','LISTA');
		$certificado->setActiveSheetIndex(0)->setCellValue('A2','N° CERTIFICADO');
		$certificado->setActiveSheetIndex(0)->setCellValue('B2','EMPRESA');
		$certificado->setActiveSheetIndex(0)->setCellValue('C2','CURSO');
		$certificado->setActiveSheetIndex(0)->setCellValue('D2','EMISIÓN');
		$certificado->setActiveSheetIndex(0)->setCellValue('E2','VIGENCIA');
		$certificado->setActiveSheetIndex(0)->setCellValue('F2','PARTICIPANTE');
		$certificado->setActiveSheetIndex(0)->setCellValue('G2','DNI');
		$certificado->setActiveSheetIndex(0)->setCellValue('H2','NOTA');

		$contador=2;
		foreach ($dataListCert as $fila){
			$contador++;

			$certificado->setActiveSheetIndex(0)->setCellValue('A'.$contador,$fila->serie.''.$fila->correlativo);
			$certificado->setActiveSheetIndex(0)->setCellValue('B'.$contador,$fila->razonsocial);
			$certificado->setActiveSheetIndex(0)->setCellValue('C'.$contador,$fila->nombrecurso);
			$certificado->setActiveSheetIndex(0)->setCellValue('D'.$contador,$fila->fechainiciocertificado);
			$certificado->setActiveSheetIndex(0)->setCellValue('E'.$contador,$fila->fecha_vigenica);
			$certificado->setActiveSheetIndex(0)->setCellValue('F'.$contador,$fila->apellidos.' '.$fila->nombres);
			$certificado->setActiveSheetIndex(0)->setCellValue('G'.$contador,$fila->numerodocumento);
			$certificado->setActiveSheetIndex(0)->setCellValue('H'.$contador,$fila->promedio);
		}

		$certificado->getActiveSheet()->setTitle('Lista Certificado');

		$this->load->helper('download');
		$objgrabar = PHPExcel_IOFactory::createWriter($certificado,'Excel2007');
		ob_start();
		$objgrabar->save('php://output');
		$excelFileContents = ob_get_clean();

		// Download file contents
		force_download('Lista de Certificados.xlsx', $excelFileContents);
	}



	//Exportar Lista de Alumnos y Curso
	public function expAlumnoCurso(){
		$this->load->library('PHPExcel');
		$alumcurs = $this->phpexcel;
		$dataListAlumCurs = $this->RptModel->showListAlumCurso();

		//Estilos
		$titulo_estilo = array(
						    'alignment' => array(
            					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
       						 ),

                            'font'  => array(
                                'bold'  => true,
                                'color' => array('rgb' => '6AA84F'),
                                'size'  => 24,
                                'name'  => 'Calibri'
                            )
        );

        $titulo_cabeceras = array(
                            'font'  => array(
                            	'bold'  => true,
                                'color' => array('rgb' => 'ffffff'),
                                'size'  => 12,
                                'name'  => 'Calibri'
                            )
        );

        $txt_alg_left = array(
                            'alignment' => array(
            					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
       						 )
        );

        $alumcurs->getActiveSheet()->getStyle('A')->applyFromArray($txt_alg_left);
        $alumcurs->getActiveSheet()->getStyle('G')->applyFromArray($txt_alg_left);

		$alumcurs->getActiveSheet()->getStyle('A1')->applyFromArray($titulo_estilo);
		$alumcurs->getActiveSheet()->getStyle('A2:J2')->applyFromArray($titulo_cabeceras);
		$alumcurs->getActiveSheet()->getStyle('A2:J2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('6aa84f');


		//Definir Ancho de las Celdas
		$alumcurs->getActiveSheet()->getColumnDimension('A')->setAutoSize(false);
		$alumcurs->getActiveSheet()->getColumnDimension('A')->setWidth(45);
		$alumcurs->getActiveSheet()->getColumnDimension('B')->setAutoSize(false);
		$alumcurs->getActiveSheet()->getColumnDimension('B')->setWidth(12);
		$alumcurs->getActiveSheet()->getColumnDimension('C')->setAutoSize(false);
		$alumcurs->getActiveSheet()->getColumnDimension('C')->setWidth(44);
		$alumcurs->getActiveSheet()->getColumnDimension('D')->setAutoSize(false);
		$alumcurs->getActiveSheet()->getColumnDimension('D')->setWidth(10);
		$alumcurs->getActiveSheet()->getColumnDimension('E')->setAutoSize(false);
		$alumcurs->getActiveSheet()->getColumnDimension('E')->setWidth(11);
		$alumcurs->getActiveSheet()->getColumnDimension('F')->setAutoSize(false);
		$alumcurs->getActiveSheet()->getColumnDimension('F')->setWidth(32);
		$alumcurs->getActiveSheet()->getColumnDimension('G')->setAutoSize(false);
		$alumcurs->getActiveSheet()->getColumnDimension('G')->setWidth(65);
		$alumcurs->getActiveSheet()->getColumnDimension('H')->setAutoSize(false);
		$alumcurs->getActiveSheet()->getColumnDimension('H')->setWidth(10);
		$alumcurs->getActiveSheet()->getColumnDimension('I')->setAutoSize(false);
		$alumcurs->getActiveSheet()->getColumnDimension('I')->setWidth(11);
		$alumcurs->getActiveSheet()->getColumnDimension('J')->setAutoSize(false);
		$alumcurs->getActiveSheet()->getColumnDimension('J')->setWidth(27);


		//Combinar Celdas
		$alumcurs->getActiveSheet()->mergeCells('A1:J1');

		//Imprimir datos
		$alumcurs->setActiveSheetIndex(0)->setCellValue('A1','LISTA DE ALUMNOS POR CURSO');
		$alumcurs->setActiveSheetIndex(0)->setCellValue('A2','CURSO');
		$alumcurs->setActiveSheetIndex(0)->setCellValue('B2','INICIO');
		$alumcurs->setActiveSheetIndex(0)->setCellValue('C2','NOMBRES');
		$alumcurs->setActiveSheetIndex(0)->setCellValue('D2','DNI');
		$alumcurs->setActiveSheetIndex(0)->setCellValue('E2','TELEFONO');
		$alumcurs->setActiveSheetIndex(0)->setCellValue('F2','CORREO');
		$alumcurs->setActiveSheetIndex(0)->setCellValue('G2','EMPRESA');
		$alumcurs->setActiveSheetIndex(0)->setCellValue('H2','IMPORTE');
		$alumcurs->setActiveSheetIndex(0)->setCellValue('I2','FECHA');
		$alumcurs->setActiveSheetIndex(0)->setCellValue('J2','BANCO');

		$idpago = 0;

		$contador=2;
		foreach ($dataListAlumCurs as $fila){
			$contador++;
			$idpago2 = $fila->id_pago;



			$alumcurs->setActiveSheetIndex(0)->setCellValue('A'.$contador,$fila->nombrecurso);
			$alumcurs->setActiveSheetIndex(0)->setCellValue('B'.$contador,$fila->FechaInicio);
			$alumcurs->setActiveSheetIndex(0)->setCellValue('C'.$contador,$fila->apellidos.' '.$fila->nombres);
			$alumcurs->setActiveSheetIndex(0)->setCellValue('D'.$contador,$fila->numerodocumento);
			$alumcurs->setActiveSheetIndex(0)->setCellValue('E'.$contador,$fila->telefono);
			$alumcurs->setActiveSheetIndex(0)->setCellValue('F'.$contador,$fila->email);
			$alumcurs->setActiveSheetIndex(0)->setCellValue('G'.$contador,$fila->razonsocial);
			if ($idpago != $idpago2) {
				$alumcurs->setActiveSheetIndex(0)->setCellValue('H'.$contador,$fila->pagototal);

				$idpago=$idpago2;
			}
			

			$alumcurs->setActiveSheetIndex(0)->setCellValue('I'.$contador,$fila->fecha_transaccion);
			$alumcurs->setActiveSheetIndex(0)->setCellValue('J'.$contador,$fila->nombre_banco);
		}

		$alumcurs->getActiveSheet()->setTitle('REGISTRO CURSOS');

		$this->load->helper('download');
		$objgrabar = PHPExcel_IOFactory::createWriter($alumcurs,'Excel2007');
		ob_start();
		$objgrabar->save('php://output');
		$excelFileContents = ob_get_clean();

		// Download file contents
		force_download('Registro_Cursos_y_Alumnos.xlsx', $excelFileContents);
	}


	//Exportar Alumnos por curso
	public function expAlumnoPorCurso(){
		$this->load->library('PHPExcel');
		$alumporcurs = $this->phpexcel;

		$id_curso = $this->input->get('idcs');

		$dataListAlumPorCurs = $this->RptModel->showListAlumPorCurso($id_curso);
		$datacurso = $this->RptModel->viewNameCurso($id_curso);

		//Estilos
		$titulo_estilo = array(
						    'alignment' => array(
            					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
       						 ),

                            'font'  => array(
                                'bold'  => true,
                                'color' => array('rgb' => '6AA84F'),
                                'size'  => 24,
                                'name'  => 'Calibri'
                            )
        );

        $titulo_cabeceras = array(
                            'font'  => array(
                            	'bold'  => true,
                                'color' => array('rgb' => 'ffffff'),
                                'size'  => 12,
                                'name'  => 'Calibri'
                            )
        );

        $txt_alg_left = array(
                            'alignment' => array(
            					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
       						 )
        );

        $alumporcurs->getActiveSheet()->getStyle('A')->applyFromArray($txt_alg_left);
        $alumporcurs->getActiveSheet()->getStyle('G')->applyFromArray($txt_alg_left);

		$alumporcurs->getActiveSheet()->getStyle('A1')->applyFromArray($titulo_estilo);
		$alumporcurs->getActiveSheet()->getStyle('A2:J2')->applyFromArray($titulo_cabeceras);
		$alumporcurs->getActiveSheet()->getStyle('A2:J2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('6aa84f');


		//Definir Ancho de las Celdas
		$alumporcurs->getActiveSheet()->getColumnDimension('A')->setAutoSize(false);
		$alumporcurs->getActiveSheet()->getColumnDimension('A')->setWidth(45);
		$alumporcurs->getActiveSheet()->getColumnDimension('B')->setAutoSize(false);
		$alumporcurs->getActiveSheet()->getColumnDimension('B')->setWidth(12);
		$alumporcurs->getActiveSheet()->getColumnDimension('C')->setAutoSize(false);
		$alumporcurs->getActiveSheet()->getColumnDimension('C')->setWidth(44);
		$alumporcurs->getActiveSheet()->getColumnDimension('D')->setAutoSize(false);
		$alumporcurs->getActiveSheet()->getColumnDimension('D')->setWidth(10);
		$alumporcurs->getActiveSheet()->getColumnDimension('E')->setAutoSize(false);
		$alumporcurs->getActiveSheet()->getColumnDimension('E')->setWidth(11);
		$alumporcurs->getActiveSheet()->getColumnDimension('F')->setAutoSize(false);
		$alumporcurs->getActiveSheet()->getColumnDimension('F')->setWidth(32);
		$alumporcurs->getActiveSheet()->getColumnDimension('G')->setAutoSize(false);
		$alumporcurs->getActiveSheet()->getColumnDimension('G')->setWidth(65);
		$alumporcurs->getActiveSheet()->getColumnDimension('H')->setAutoSize(false);
		$alumporcurs->getActiveSheet()->getColumnDimension('H')->setWidth(10);
		$alumporcurs->getActiveSheet()->getColumnDimension('I')->setAutoSize(false);
		$alumporcurs->getActiveSheet()->getColumnDimension('I')->setWidth(11);
		$alumporcurs->getActiveSheet()->getColumnDimension('J')->setAutoSize(false);
		$alumporcurs->getActiveSheet()->getColumnDimension('J')->setWidth(27);


		//Combinar Celdas
		$alumporcurs->getActiveSheet()->mergeCells('A1:J1');

		//Imprimir datos
		$alumporcurs->setActiveSheetIndex(0)->setCellValue('A1',''.$datacurso->nombrecurso.'');
		$alumporcurs->setActiveSheetIndex(0)->setCellValue('A2','CURSO');
		$alumporcurs->setActiveSheetIndex(0)->setCellValue('B2','INICIO');
		$alumporcurs->setActiveSheetIndex(0)->setCellValue('C2','NOMBRES');
		$alumporcurs->setActiveSheetIndex(0)->setCellValue('D2','DNI');
		$alumporcurs->setActiveSheetIndex(0)->setCellValue('E2','TELEFONO');
		$alumporcurs->setActiveSheetIndex(0)->setCellValue('F2','CORREO');
		$alumporcurs->setActiveSheetIndex(0)->setCellValue('G2','EMPRESA');
		$alumporcurs->setActiveSheetIndex(0)->setCellValue('H2','IMPORTE');
		$alumporcurs->setActiveSheetIndex(0)->setCellValue('I2','FECHA');
		$alumporcurs->setActiveSheetIndex(0)->setCellValue('J2','BANCO');

		$idpago = 0;

		$contador=2;
		foreach ($dataListAlumPorCurs as $fila){
			$contador++;
			$idpago2 = $fila->id_pago;



			$alumporcurs->setActiveSheetIndex(0)->setCellValue('A'.$contador,$fila->nombrecurso);
			$alumporcurs->setActiveSheetIndex(0)->setCellValue('B'.$contador,$fila->FechaInicio);
			$alumporcurs->setActiveSheetIndex(0)->setCellValue('C'.$contador,$fila->apellidos.' '.$fila->nombres);
			$alumporcurs->setActiveSheetIndex(0)->setCellValue('D'.$contador,$fila->numerodocumento);
			$alumporcurs->setActiveSheetIndex(0)->setCellValue('E'.$contador,$fila->telefono);
			$alumporcurs->setActiveSheetIndex(0)->setCellValue('F'.$contador,$fila->email);
			$alumporcurs->setActiveSheetIndex(0)->setCellValue('G'.$contador,$fila->razonsocial);
			if ($idpago != $idpago2) {
				$alumporcurs->setActiveSheetIndex(0)->setCellValue('H'.$contador,$fila->pagototal);

				$idpago=$idpago2;
			}
			

			$alumporcurs->setActiveSheetIndex(0)->setCellValue('I'.$contador,$fila->fecha_transaccion);
			$alumporcurs->setActiveSheetIndex(0)->setCellValue('J'.$contador,$fila->nombre_banco);
		}


		$alumporcurs->getActiveSheet()->setTitle('Lista');

		$this->load->helper('download');
		$objgrabar = PHPExcel_IOFactory::createWriter($alumporcurs,'Excel2007');
		ob_start();
		$objgrabar->save('php://output');
		$excelFileContents = ob_get_clean();

		// Download file contents
		force_download('Curso-'.$datacurso->nombrecurso.'.xlsx', $excelFileContents);
	}



	//Exportar pagos empresas
	public function expPagosEmpresas(){
		$this->load->library('PHPExcel');
		$pagoempresa = $this->phpexcel;

		$dataListpagosempresas = $this->RptModel->showListPagosEmpresas();

		//Estilos
		$titulo_estilo = array(
						    'alignment' => array(
            					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
       						 ),

                            'font'  => array(
                                'bold'  => true,
                                'color' => array('rgb' => '6AA84F'),
                                'size'  => 24,
                                'name'  => 'Calibri'
                            )
        );

        $titulo_cabeceras = array(
                            'font'  => array(
                            	'bold'  => true,
                                'color' => array('rgb' => 'ffffff'),
                                'size'  => 12,
                                'name'  => 'Calibri'
                            )
        );

        $txt_alg_left = array(
                            'alignment' => array(
            					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
       						 )
        );

        $pagoempresa->getActiveSheet()->getStyle('A')->applyFromArray($txt_alg_left);
        $pagoempresa->getActiveSheet()->getStyle('G')->applyFromArray($txt_alg_left);

		$pagoempresa->getActiveSheet()->getStyle('A1')->applyFromArray($titulo_estilo);
		$pagoempresa->getActiveSheet()->getStyle('A2:G2')->applyFromArray($titulo_cabeceras);
		$pagoempresa->getActiveSheet()->getStyle('A2:G2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('6aa84f');


		//Definir Ancho de las Celdas
		$pagoempresa->getActiveSheet()->getColumnDimension('A')->setAutoSize(false);
		$pagoempresa->getActiveSheet()->getColumnDimension('A')->setWidth(14);
		$pagoempresa->getActiveSheet()->getColumnDimension('B')->setAutoSize(false);
		$pagoempresa->getActiveSheet()->getColumnDimension('B')->setWidth(46);
		$pagoempresa->getActiveSheet()->getColumnDimension('C')->setAutoSize(false);
		$pagoempresa->getActiveSheet()->getColumnDimension('C')->setWidth(26);
		$pagoempresa->getActiveSheet()->getColumnDimension('D')->setAutoSize(false);
		$pagoempresa->getActiveSheet()->getColumnDimension('D')->setWidth(22);
		$pagoempresa->getActiveSheet()->getColumnDimension('E')->setAutoSize(false);
		$pagoempresa->getActiveSheet()->getColumnDimension('E')->setWidth(22);
		$pagoempresa->getActiveSheet()->getColumnDimension('F')->setAutoSize(false);
		$pagoempresa->getActiveSheet()->getColumnDimension('F')->setWidth(10);
		$pagoempresa->getActiveSheet()->getColumnDimension('G')->setAutoSize(false);
		$pagoempresa->getActiveSheet()->getColumnDimension('G')->setWidth(10);

		//Combinar Celdas
		$pagoempresa->getActiveSheet()->mergeCells('A1:G1');

		//Imprimir datos
		$pagoempresa->setActiveSheetIndex(0)->setCellValue('A1','REPORTE DE PAGOS EMPRESAS');
		$pagoempresa->setActiveSheetIndex(0)->setCellValue('A2','RUC');
		$pagoempresa->setActiveSheetIndex(0)->setCellValue('B2','RAZÓN SOCIAL');
		$pagoempresa->setActiveSheetIndex(0)->setCellValue('C2','BANCO');
		$pagoempresa->setActiveSheetIndex(0)->setCellValue('D2','N° DE OPERACIÓN');
		$pagoempresa->setActiveSheetIndex(0)->setCellValue('E2','FECHA DE OPERACIÓN');
		$pagoempresa->setActiveSheetIndex(0)->setCellValue('F2','MONTO');
		$pagoempresa->setActiveSheetIndex(0)->setCellValue('G2','SUMA');

		$idpago = 0;

		$contador=2;
		foreach ($dataListpagosempresas as $fila){
			$contador++;
			$idpago2 = $fila->id_empresa;

			$pagoempresa->setActiveSheetIndex(0)->setCellValue('A'.$contador,$fila->ruc);
			$pagoempresa->setActiveSheetIndex(0)->setCellValue('B'.$contador,$fila->razonsocial);
			$pagoempresa->setActiveSheetIndex(0)->setCellValue('C'.$contador,$fila->nombre_banco);
			$pagoempresa->setActiveSheetIndex(0)->setCellValue('D'.$contador,$fila->cod_operacion);
			$pagoempresa->setActiveSheetIndex(0)->setCellValue('E'.$contador,$fila->fecha_transaccion);
			$pagoempresa->setActiveSheetIndex(0)->setCellValue('F'.$contador,$fila->pagototal);


			if ($idpago != $idpago2) {
				$pagoempresa->setActiveSheetIndex(0)->setCellValue('G'.$contador,$fila->sumatotalpago);

				$idpago =$idpago2;
			}
			
		}


		$pagoempresa->getActiveSheet()->setTitle('Lista');

		$this->load->helper('download');
		$objgrabar = PHPExcel_IOFactory::createWriter($pagoempresa,'Excel2007');
		ob_start();
		$objgrabar->save('php://output');
		$excelFileContents = ob_get_clean();

		// Download file contents
		force_download('Pagos empresas.xlsx', $excelFileContents);
	}


	//Exportar pagos Personas Naturales
	public function expPagosPersonasNaturales(){
		$this->load->library('PHPExcel');
		$pagopn = $this->phpexcel;

		$dataListpagospersonasnaturales = $this->RptModel->showListPagosPersonasNatural();

		//Estilos
		$titulo_estilo = array(
						    'alignment' => array(
            					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
       						 ),

                            'font'  => array(
                                'bold'  => true,
                                'color' => array('rgb' => '6AA84F'),
                                'size'  => 24,
                                'name'  => 'Calibri'
                            )
        );

        $titulo_cabeceras = array(
                            'font'  => array(
                            	'bold'  => true,
                                'color' => array('rgb' => 'ffffff'),
                                'size'  => 12,
                                'name'  => 'Calibri'
                            )
        );

        $txt_alg_left = array(
                            'alignment' => array(
            					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
       						 )
        );

        $pagopn->getActiveSheet()->getStyle('A')->applyFromArray($txt_alg_left);
        $pagopn->getActiveSheet()->getStyle('G')->applyFromArray($txt_alg_left);

		$pagopn->getActiveSheet()->getStyle('A1')->applyFromArray($titulo_estilo);
		$pagopn->getActiveSheet()->getStyle('A2:G2')->applyFromArray($titulo_cabeceras);
		$pagopn->getActiveSheet()->getStyle('A2:G2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('6aa84f');


		//Definir Ancho de las Celdas
		$pagopn->getActiveSheet()->getColumnDimension('A')->setAutoSize(false);
		$pagopn->getActiveSheet()->getColumnDimension('A')->setWidth(14);
		$pagopn->getActiveSheet()->getColumnDimension('B')->setAutoSize(false);
		$pagopn->getActiveSheet()->getColumnDimension('B')->setWidth(46);
		$pagopn->getActiveSheet()->getColumnDimension('C')->setAutoSize(false);
		$pagopn->getActiveSheet()->getColumnDimension('C')->setWidth(26);
		$pagopn->getActiveSheet()->getColumnDimension('D')->setAutoSize(false);
		$pagopn->getActiveSheet()->getColumnDimension('D')->setWidth(22);
		$pagopn->getActiveSheet()->getColumnDimension('E')->setAutoSize(false);
		$pagopn->getActiveSheet()->getColumnDimension('E')->setWidth(22);
		$pagopn->getActiveSheet()->getColumnDimension('F')->setAutoSize(false);
		$pagopn->getActiveSheet()->getColumnDimension('F')->setWidth(10);
		$pagopn->getActiveSheet()->getColumnDimension('G')->setAutoSize(false);
		$pagopn->getActiveSheet()->getColumnDimension('G')->setWidth(10);

		//Combinar Celdas
		$pagopn->getActiveSheet()->mergeCells('A1:G1');

		//Imprimir datos
		$pagopn->setActiveSheetIndex(0)->setCellValue('A1','REPORTE DE PAGOS - PERSONAS NATURALES');
		$pagopn->setActiveSheetIndex(0)->setCellValue('A2','DNI');
		$pagopn->setActiveSheetIndex(0)->setCellValue('B2','APELLIDOS Y NOMBRES');
		$pagopn->setActiveSheetIndex(0)->setCellValue('C2','BANCO');
		$pagopn->setActiveSheetIndex(0)->setCellValue('D2','N° DE OPERACIÓN');
		$pagopn->setActiveSheetIndex(0)->setCellValue('E2','FECHA DE OPERACIÓN');
		$pagopn->setActiveSheetIndex(0)->setCellValue('F2','MONTO');
		$pagopn->setActiveSheetIndex(0)->setCellValue('G2','SUMA');

		$idpago = 0;

		$contador=2;
		foreach ($dataListpagospersonasnaturales as $fila){
			$contador++;
			$idpago2 = $fila->id_empresa;

			$pagopn->setActiveSheetIndex(0)->setCellValue('A'.$contador,$fila->dni);
			$pagopn->setActiveSheetIndex(0)->setCellValue('B'.$contador,$fila->apellidoscontacto.' '.$fila->nombrecontacto);
			$pagopn->setActiveSheetIndex(0)->setCellValue('C'.$contador,$fila->nombre_banco);
			$pagopn->setActiveSheetIndex(0)->setCellValue('D'.$contador,$fila->cod_operacion);
			$pagopn->setActiveSheetIndex(0)->setCellValue('E'.$contador,$fila->fecha_transaccion);
			$pagopn->setActiveSheetIndex(0)->setCellValue('F'.$contador,$fila->pagototal);


			if ($idpago != $idpago2) {
				$pagopn->setActiveSheetIndex(0)->setCellValue('G'.$contador,$fila->sumatotalpago);

				$idpago =$idpago2;
			}
			
		}


		$pagopn->getActiveSheet()->setTitle('Lista');

		$this->load->helper('download');
		$objgrabar = PHPExcel_IOFactory::createWriter($pagopn,'Excel2007');
		ob_start();
		$objgrabar->save('php://output');
		$excelFileContents = ob_get_clean();

		// Download file contents
		force_download('Pagos Personas Naturales.xlsx', $excelFileContents);
	}


	//Exportar Lista de alumnos general
	public function expListaAlumnos(){
		$this->load->library('PHPExcel');
		$listalumno = $this->phpexcel;

		$datalumnos = $this->AlumnoModel->showAllAlumno();

		//Estilos
		$titulo_estilo = array(
						    'alignment' => array(
            					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
       						 ),

                            'font'  => array(
                                'bold'  => true,
                                'color' => array('rgb' => '6AA84F'),
                                'size'  => 24,
                                'name'  => 'Calibri'
                            )
        );

        $titulo_cabeceras = array(
                            'font'  => array(
                            	'bold'  => true,
                                'color' => array('rgb' => 'ffffff'),
                                'size'  => 12,
                                'name'  => 'Calibri'
                            )
        );

        $txt_alg_left = array(
                            'alignment' => array(
            					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
       						 )
        );


		$listalumno->getActiveSheet()->getStyle('A1')->applyFromArray($titulo_estilo);
		$listalumno->getActiveSheet()->getStyle('A2:G2')->applyFromArray($titulo_cabeceras);
		$listalumno->getActiveSheet()->getStyle('A2:E2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('6aa84f');


		//Definir Ancho de las Celdas
		$listalumno->getActiveSheet()->getColumnDimension('A')->setAutoSize(false);
		$listalumno->getActiveSheet()->getColumnDimension('A')->setWidth(14);
		$listalumno->getActiveSheet()->getColumnDimension('B')->setAutoSize(false);
		$listalumno->getActiveSheet()->getColumnDimension('B')->setWidth(30);
		$listalumno->getActiveSheet()->getColumnDimension('C')->setAutoSize(false);
		$listalumno->getActiveSheet()->getColumnDimension('C')->setWidth(30);
		$listalumno->getActiveSheet()->getColumnDimension('D')->setAutoSize(false);
		$listalumno->getActiveSheet()->getColumnDimension('D')->setWidth(13);
		$listalumno->getActiveSheet()->getColumnDimension('E')->setAutoSize(false);
		$listalumno->getActiveSheet()->getColumnDimension('E')->setWidth(33);


		//Combinar Celdas
		$listalumno->getActiveSheet()->mergeCells('A1:E1');

		//Imprimir datos
		$listalumno->setActiveSheetIndex(0)->setCellValue('A1','LISTA DE ALUMNOS - GENERAL');
		$listalumno->setActiveSheetIndex(0)->setCellValue('A2','DNI');
		$listalumno->setActiveSheetIndex(0)->setCellValue('B2','APELLIDOS');
		$listalumno->setActiveSheetIndex(0)->setCellValue('C2','NOMBRES');
		$listalumno->setActiveSheetIndex(0)->setCellValue('D2','TELEFONO');
		$listalumno->setActiveSheetIndex(0)->setCellValue('E2','CORREO');


		$contador=2;
		foreach ($datalumnos as $fila){
			$contador++;

			$listalumno->setActiveSheetIndex(0)->setCellValue('A'.$contador,$fila->numerodocumento);
			$listalumno->setActiveSheetIndex(0)->setCellValue('B'.$contador,$fila->apellidos);
			$listalumno->setActiveSheetIndex(0)->setCellValue('C'.$contador,$fila->nombres);
			$listalumno->setActiveSheetIndex(0)->setCellValue('D'.$contador,$fila->telefono);
			$listalumno->setActiveSheetIndex(0)->setCellValue('E'.$contador,$fila->email);
			
			
		}


		$listalumno->getActiveSheet()->setTitle('Lista');

		$this->load->helper('download');
		$objgrabar = PHPExcel_IOFactory::createWriter($listalumno,'Excel2007');
		ob_start();
		$objgrabar->save('php://output');
		$excelFileContents = ob_get_clean();

		// Download file contents
		force_download('Lista de alumnos general.xlsx', $excelFileContents);
	}


	// Exporar Correos======================================>


	//Exportar Lista de Correos Alumnos
	public function expListaCorreosAlumnos(){
		$this->load->library('PHPExcel');
		$listacorreoalumno = $this->phpexcel;

		$datalumnoscorreo = $this->RptModel->showListaCorreoAlumnos();

		//Estilos
		$titulo_estilo = array(
						    'alignment' => array(
            					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
       						 ),

                            'font'  => array(
                                'bold'  => true,
                                'color' => array('rgb' => '6AA84F'),
                                'size'  => 24,
                                'name'  => 'Calibri'
                            )
        );

        $titulo_cabeceras = array(
                            'font'  => array(
                            	'bold'  => true,
                                'color' => array('rgb' => 'ffffff'),
                                'size'  => 12,
                                'name'  => 'Calibri'
                            )
        );

        $txt_alg_left = array(
                            'alignment' => array(
            					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
       						 )
        );


		$listacorreoalumno->getActiveSheet()->getStyle('A1')->applyFromArray($titulo_estilo);
		$listacorreoalumno->getActiveSheet()->getStyle('A2:B2')->applyFromArray($titulo_cabeceras);
		$listacorreoalumno->getActiveSheet()->getStyle('A2:B2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('6aa84f');


		//Definir Ancho de las Celdas
		$listacorreoalumno->getActiveSheet()->getColumnDimension('A')->setAutoSize(false);
		$listacorreoalumno->getActiveSheet()->getColumnDimension('A')->setWidth(43);
		$listacorreoalumno->getActiveSheet()->getColumnDimension('B')->setAutoSize(false);
		$listacorreoalumno->getActiveSheet()->getColumnDimension('B')->setWidth(35);


		//Combinar Celdas
		$listacorreoalumno->getActiveSheet()->mergeCells('A1:B1');

		//Imprimir datos
		$listacorreoalumno->setActiveSheetIndex(0)->setCellValue('A1','LISTA DE CORREOS - ALUMNOS');
		$listacorreoalumno->setActiveSheetIndex(0)->setCellValue('A2','APELLIDOS Y NOMBRES');
		$listacorreoalumno->setActiveSheetIndex(0)->setCellValue('B2','CORREO');


		$contador=2;
		foreach ($datalumnoscorreo as $fila){
			$contador++;

			$listacorreoalumno->setActiveSheetIndex(0)->setCellValue('A'.$contador,$fila->apellidos.', '.$fila->nombres);
			$listacorreoalumno->setActiveSheetIndex(0)->setCellValue('B'.$contador,$fila->email);
			
			
		}


		$listacorreoalumno->getActiveSheet()->setTitle('Lista');

		$this->load->helper('download');
		$objgrabar = PHPExcel_IOFactory::createWriter($listacorreoalumno,'Excel2007');
		ob_start();
		$objgrabar->save('php://output');
		$excelFileContents = ob_get_clean();

		// Download file contents
		force_download('Lista de correos - alumnos.xlsx', $excelFileContents);
	}


	//Exportar Lista de Correos Personas Naturales
	public function expListaCorreosPN(){
		$this->load->library('PHPExcel');
		$listacorreopn = $this->phpexcel;

		$datapncorreo = $this->RptModel->showListaCorreoPN();

		//Estilos
		$titulo_estilo = array(
						    'alignment' => array(
            					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
       						 ),

                            'font'  => array(
                                'bold'  => true,
                                'color' => array('rgb' => '6AA84F'),
                                'size'  => 24,
                                'name'  => 'Calibri'
                            )
        );

        $titulo_cabeceras = array(
                            'font'  => array(
                            	'bold'  => true,
                                'color' => array('rgb' => 'ffffff'),
                                'size'  => 12,
                                'name'  => 'Calibri'
                            )
        );

        $txt_alg_left = array(
                            'alignment' => array(
            					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
       						 )
        );


		$listacorreopn->getActiveSheet()->getStyle('A1')->applyFromArray($titulo_estilo);
		$listacorreopn->getActiveSheet()->getStyle('A2:B2')->applyFromArray($titulo_cabeceras);
		$listacorreopn->getActiveSheet()->getStyle('A2:B2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('6aa84f');


		//Definir Ancho de las Celdas
		$listacorreopn->getActiveSheet()->getColumnDimension('A')->setAutoSize(false);
		$listacorreopn->getActiveSheet()->getColumnDimension('A')->setWidth(43);
		$listacorreopn->getActiveSheet()->getColumnDimension('B')->setAutoSize(false);
		$listacorreopn->getActiveSheet()->getColumnDimension('B')->setWidth(45);


		//Combinar Celdas
		$listacorreopn->getActiveSheet()->mergeCells('A1:B1');

		//Imprimir datos
		$listacorreopn->setActiveSheetIndex(0)->setCellValue('A1','LISTA DE CORREOS - PERSONAS NATURALES');
		$listacorreopn->setActiveSheetIndex(0)->setCellValue('A2','APELLIDOS Y NOMBRES');
		$listacorreopn->setActiveSheetIndex(0)->setCellValue('B2','CORREO');


		$contador=2;
		foreach ($datapncorreo as $fila){
			$contador++;

			$listacorreopn->setActiveSheetIndex(0)->setCellValue('A'.$contador,$fila->apellidoscontacto.', '.$fila->nombrecontacto);
			$listacorreopn->setActiveSheetIndex(0)->setCellValue('B'.$contador,$fila->emailcontacto);
			
			
		}


		$listacorreopn->getActiveSheet()->setTitle('Lista');

		$this->load->helper('download');
		$objgrabar = PHPExcel_IOFactory::createWriter($listacorreopn,'Excel2007');
		ob_start();
		$objgrabar->save('php://output');
		$excelFileContents = ob_get_clean();

		// Download file contents
		force_download('Lista de correos - personas naturales.xlsx', $excelFileContents);
	}



	//Exportar Lista de Correos Empresas
	public function expListaCorreosEmpresas(){
		$this->load->library('PHPExcel');
		$listacorreoempresas = $this->phpexcel;

		$dataempresascorreo = $this->RptModel->showListaCorreoEmpresas();

		//Estilos
		$titulo_estilo = array(
						    'alignment' => array(
            					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
       						 ),

                            'font'  => array(
                                'bold'  => true,
                                'color' => array('rgb' => '6AA84F'),
                                'size'  => 24,
                                'name'  => 'Calibri'
                            )
        );

        $titulo_cabeceras = array(
                            'font'  => array(
                            	'bold'  => true,
                                'color' => array('rgb' => 'ffffff'),
                                'size'  => 12,
                                'name'  => 'Calibri'
                            )
        );

        $txt_alg_left = array(
                            'alignment' => array(
            					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
       						 )
        );


		$listacorreoempresas->getActiveSheet()->getStyle('A1')->applyFromArray($titulo_estilo);
		$listacorreoempresas->getActiveSheet()->getStyle('A2:B2')->applyFromArray($titulo_cabeceras);
		$listacorreoempresas->getActiveSheet()->getStyle('A2:B2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('6aa84f');


		//Definir Ancho de las Celdas
		$listacorreoempresas->getActiveSheet()->getColumnDimension('A')->setAutoSize(false);
		$listacorreoempresas->getActiveSheet()->getColumnDimension('A')->setWidth(50);
		$listacorreoempresas->getActiveSheet()->getColumnDimension('B')->setAutoSize(false);
		$listacorreoempresas->getActiveSheet()->getColumnDimension('B')->setWidth(38);


		//Combinar Celdas
		$listacorreoempresas->getActiveSheet()->mergeCells('A1:B1');

		//Imprimir datos
		$listacorreoempresas->setActiveSheetIndex(0)->setCellValue('A1','LISTA DE CORREOS - EMPRESAS');
		$listacorreoempresas->setActiveSheetIndex(0)->setCellValue('A2','EMPRESA');
		$listacorreoempresas->setActiveSheetIndex(0)->setCellValue('B2','CORREO');


		$contador=2;
		foreach ($dataempresascorreo as $fila){
			$contador++;

			$listacorreoempresas->setActiveSheetIndex(0)->setCellValue('A'.$contador,$fila->razonsocial);
			$listacorreoempresas->setActiveSheetIndex(0)->setCellValue('B'.$contador,$fila->emailcontacto);
			
			
		}


		$listacorreoempresas->getActiveSheet()->setTitle('Lista');

		$this->load->helper('download');
		$objgrabar = PHPExcel_IOFactory::createWriter($listacorreoempresas,'Excel2007');
		ob_start();
		$objgrabar->save('php://output');
		$excelFileContents = ob_get_clean();

		// Download file contents
		force_download('Lista de correos - empresas.xlsx', $excelFileContents);
	}


}