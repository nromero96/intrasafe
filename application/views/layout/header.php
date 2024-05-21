<!doctype html>

<html lang="es">



<head>

    <meta charset="utf-8" />

    <!-- Chrome, Firefox OS y Opera -->
    <meta name="theme-color" content="#1a597f">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#1a597f">
    <!-- Apple mobile -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#1a597f">

    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets/img/apple-icon.png" />

    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    
    <?php if($this->uri->segment(1) == 'inicio'){ ?> <title>SAFESI | PANEL</title> <?php } ?>

    <?php if($this->uri->segment(1) == 'cursos'){ ?> <title>SAFESI | CURSOS</title> <?php } ?>

    <?php if($this->uri->segment(1) == 'capacitadores'){ ?> <title>SAFESI | CAPACITADORES</title> <?php } ?>

    <?php if($this->uri->segment(1) == 'empresas'){ ?> <title>SAFESI | EMPRESAS</title> <?php } ?>

    <?php if($this->uri->segment(1) == 'personasnaturales'){ ?> <title>SAFESI | PERSONAS NATURALES</title> <?php } ?>

    <?php if($this->uri->segment(1) == 'grupos_empresas'){ ?> <title>SAFESI | NOTAS</title> <?php } ?>

    <?php if($this->uri->segment(1) == 'grupos_personas_naturales'){ ?> <title>SAFESI | NOTAS</title> <?php } ?>

    <?php if($this->uri->segment(1) == 'bancos'){ ?> <title>SAFESI | BANCOS</title> <?php } ?>

    <?php if($this->uri->segment(1) == 'reservas'){ ?> <title>SAFESI | GESTIÓN DE RESERVAS</title> <?php } ?>

    <?php if($this->uri->segment(1) == 'crear_reserva'){ ?> <title>SAFESI | CREAR RESERVA</title> <?php } ?>

    <?php if($this->uri->segment(1) == 'alumnos'){ ?> <title>SAFESI | ALUMNOS</title> <?php } ?>

   <?php if($this->uri->segment(1) == 'grp_em'){ ?> <title>SAFESI | NOTAS POR EMPRESA</title> <?php } ?>

   <?php if($this->uri->segment(1) == 'grp_em'){ ?> <title>SAFESI | NOTAS POR PERSONA NATURAL</title> <?php } ?>

    <?php if($this->uri->segment(1) == 'grp_cs'){ ?> <title>SAFESI | NOTAS POR CURSO</title> <?php } ?>

    <?php if($this->uri->segment(1) == 'rpt'){ ?> <title>SAFESI | REPORTES</title> <?php } ?>


    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="<?php echo base_url(); ?>assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url(); ?>assets/css/demo.css" rel="stylesheet" />

     <!--  css Datapicker     -->
    <link href="<?php echo base_url(); ?>assets/css/datepicker.css" rel="stylesheet" />

     <!--  css Timepicker     -->
    <link href="<?php echo base_url(); ?>assets/css/timepicker.css" rel="stylesheet" />

    <link href="<?php echo base_url(); ?>assets/js/easyautocomplete/easy-autocomplete.min.css" rel="stylesheet" />

    <!--  css DataTable     -->
    <link href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.min.css" rel="stylesheet" />

    <!--  css Select     -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-select.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>


</head>

<body>

    <div class="wrapper">