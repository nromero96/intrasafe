<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets/img/apple-icon.png" />
        <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>SAFESI | Registro Online</title>     
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

        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">

        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    </head>

<body class="bodyreg" style="background: url(<?php echo base_url(); ?>assets/img/trabajo-en-altura.jpg);">
    <div class="wrapper">
        <div class="content">
                <div class="container-fluid">
                    <div class="alert alert-success" hidden="hidden">
                        <div class="container-fluid">
                            <div class="alert-icon"><i class="material-icons">check</i></div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="material-icons">clear</i></span>
                            </button>
                            <b>Mensaje Alerta</b>
                        </div>
                    </div>


                    <!--PopUp Registro Nuevo para Empresa-->
                    <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form id = "formEmpresa" method="POST">
                            <input type="hidden" name="txttipo" value="EM" id="txttipo">
                        <div class="modal-dialog" role="document" style="margin-top: 10px !important;">
                            <div class="modal-content card">
                                <div class="card-header" data-background-color="blue">
                                    <h4 class="title text-bold tit-modal">Nueva Empresa</h4>
                                    <p id="txtdesc">Datos de la empresa</p>
                                </div>
                                <div class="modal-body" style="padding-top: 5px !important;">
                                        <div class="row">
                                            <div class="col-md-6" id="drznsocial">
                                                <div class="form-group label-floating" id="drazonsocial">
                                                    <label class="control-label" id="lblraznsoc">Razón Social: <span class="req-ast">*</span></label>
                                                    <input type="text" class="form-control ng-pristine ng-invalid ng-touched" name="txtrazonsocial" id="idtxtrazonsocial">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating" id="dnruc">
                                                    <label class="control-label" id="lblnrucodni">N° RUC: <span class="req-ast">*</span></label>
                                                    <input type="text" class="form-control" name="txtruc" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating" id="ddireccion">
                                                    <label class="control-label">Dirección: </label>
                                                    <input type="text" class="form-control" name="txtdireccion">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating" id="demailcontacto">
                                                    <label class="control-label" id="lblemailc">Email De Contacto:</label>
                                                    <input type="email" class="form-control" name="txtemailcontacto">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating" id="dnombrecontacto">
                                                    <label class="control-label" id="lblncont">Nombre Del Contacto:</label>
                                                    <input type="text" class="form-control" name="txtnombrecontacto" id="idtxtnombrecontacto">
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating" id="dapellidocontacto">
                                                    <label class="control-label" id="lblacont">Apellidos Del Contacto:</label>
                                                    <input type="text" class="form-control" name="txtapellidoscontacto">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating" id="dtelefono">
                                                    <label class="control-label">Teléfono: </label>
                                                    <input type="text" class="form-control" name="txttelefono">
                                                </div>
                                            </div>
                                            <div class="col-md-6" id="dfactele">
                                                <div class="form-group label-floating" id="demailfactura">
                                                    <label class="control-label">Email Para Factura Electrónica:</label>
                                                    <input type="email" class="form-control" name="txtemailfactura">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row card" style="margin-top: 10px !important;">
                                            <div class="col-md-12">
                                                <h4 class="info-text">Datos importantes para el ingreso</h4>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating" id="dnombreusuario">
                                                    <label class="control-label">Usuario: <span class="req-ast">*</span></label>
                                                    <input type="text" class="form-control" id="txtnombreusuario" name="txtnombreusuario">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating" id="dpassword">
                                                    <label class="control-label">Escribe la contraseña:</label>
                                                    <input type="password" class="form-control" minlength="8" maxlength="20" name="txtpassword" id="txtpassword">
                                                </div>
                                            </div>
                                            <div class="col-md-6"></div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating" id="dpassword1">
                                                    <label class="control-label">Vuelve a escribir la contraseña:</label>
                                                    <input type="password" class="form-control" minlength="8" maxlength="20" name="txtpassword1" id="txtpassword1">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="checkbox">

                                                    <label>
                                                         <input type="hidden" value="0" name="txtterms" />
                                                         <input type="checkbox" value="1" name="txtterms" id="txtterms" />
                                                         Acepto, <a href="#">Terminos y Condiciones</a>
                                                    </label>
                                              </div>
                                            </div>
                                        </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" id="btnSave" class="btn btn-primary">Registrarme</button>
                                    <button type="button" id="btnReset" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <!---->




                    <!--PopUp Registro Nuevo para Persona Natural-->
                    <div class="modal fade" id="modalregistropn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form id = "formregistropn" method="POST">
                            <input type="hidden" name="txttipopn" id="txttipopn" value="PN">
                        <div class="modal-dialog" role="document" style="margin-top: 10px !important;">
                            <div class="modal-content card">
                                <div class="card-header" data-background-color="blue">
                                    <h4 class="title text-bold">Registro Persona Natural</h4>
                                    <p id="txtdesc">Datos de la persona</p>
                                </div>
                                <div class="modal-body" style="padding-top: 5px !important;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating" id="dvnumdni">
                                                    <label class="control-label">DNI: <span class="req-ast">*</span></label>
                                                    <input type="text" class="form-control" name="txtdnipn" id="txtdnipn" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating" id="dvnonbrespn">
                                                    <label class="control-label">Nombres: <span class="req-ast">*</span></label>
                                                    <input type="text" class="form-control" name="txtnombrespn" id="txtnombrespn">
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating" id="dvapellidos">
                                                    <label class="control-label">Apellidos: <span class="req-ast">*</span></label>
                                                    <input type="text" class="form-control" name="txtapellidospn" id="txtapellidospn">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating" >
                                                    <label class="control-label">Email:</label>
                                                    <input type="email" class="form-control" name="txtemailpn" id="txtemailpn">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Teléfono: </label>
                                                    <input type="text" class="form-control" name="txttelefonopn" id="txttelefonopn">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating" >
                                                    <label class="control-label">Empresa:</label>
                                                    <input type="text" class="form-control" name="txtempresapn" id="txtempresapn">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Cargo: </label>
                                                    <input type="text" class="form-control" name="txtcargopn" id="txtcargopn">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row card" style="margin-top: 10px !important;">
                                            <div class="col-md-12">
                                                <h4 class="info-text">Datos importantes para el ingreso</h4>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating" id="dvnomusuariopn">
                                                    <label class="control-label">Usuario: <span class="req-ast">*</span></label>
                                                    <input type="text" class="form-control" name="txtusuariopn" id="txtusuariopn">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating" id="dvpasswordpn">
                                                    <label class="control-label">Escribe la contraseña:</label>
                                                    <input type="password" class="form-control" minlength="8" maxlength="20" name="txtpasswordpn" id="txtpasswordpn">
                                                </div>
                                            </div>
                                            <div class="col-md-6"></div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating" id="dvpassword1pn">
                                                    <label class="control-label">Vuelve a escribir la contraseña:</label>
                                                    <input type="password" class="form-control" minlength="8" maxlength="20" name="txtpassword1pn" id="txtpassword1pn">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="checkbox">
                                                    <label>
                                                         <input type="hidden" value="0" name="txttermspn" />
                                                         <input type="checkbox" value="1" name="txttermspn" id="txttermspn" />
                                                         Acepto, <a href="#">Terminos y Condiciones</a>
                                                    </label>
                                              </div>
                                            </div>
                                        </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" id="btnSavepn" class="btn btn-primary">Registrarme</button>
                                    <button type="button" id="btnResetpn" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <!---->




<!--                     <div class="row" id="dvbtnregistro" style="padding: 16em 0em;">
                            <div class="col-md-4"></div>
                            <div class="col-md-4 text-center">
                                    <button type="button" id="btnRegEm" class="btn btn-primary" data-toggle="modal">
                                        <i class="material-icons">line_style</i>
                                        Regístrarme como empresa
                                    </button>
                                    <button type="button" id="btnRegPN" class="btn btn-primary" data-toggle="modal">
                                        <i class="material-icons">line_style</i>
                                        Regístrarme como persona natural
                                    </button>
                            </div>
                            <div class="col-md-4"></div>
                    </div> -->



                    <div class="row" id="dvbtnregistro" style="padding-top: 12em;">
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                            <div class="card card-profile" style="background:rgba(255, 255, 255, 0.64);">
                                <div class="card-avatar">
                                    <a href="#pablo">
                                        <img class="img" src="<?php echo base_url(); ?>/assets/img/img-icon-empresa.png">
                                    </a>
                                </div>
                                <div class="content">
                                    <h4 class="card-title"><b>Empresa</b></h4>
                                    <p class="card-content">
                                        Registrese como Empresa en<br>SAFESI.
                                    </p>
                                    <button type="button" id="btnRegEm" class="btn btn-primary btn-round">Regístrarme</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-profile" style="background:rgba(255, 255, 255, 0.64);">
                                <div class="card-avatar">
                                    <a href="#pablo">
                                        <img class="img" src="<?php echo base_url(); ?>/assets/img/img-icon-pn.png">
                                    </a>
                                </div>
                                <div class="content">
                                    <h4 class="card-title"><b>Persona Natural</b></h4>
                                    <p class="card-content">
                                        Registrese como Persona Natural en <br>SAFESI.
                                    </p>
                                    <button type="button" id="btnRegPN" class="btn btn-primary btn-round">Regístrarme</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>



                    <div class="row hidden" id="dvcargando" style="padding-top: 14em;">
                            <div class="col-md-4"></div>
                            <div class="col-md-4 text-center">
                                   <img src="<?php echo base_url(); ?>assets/img/loading.gif">
                            </div>
                            <div class="col-md-4"></div>
                    </div>
            </div>
        </div>
        <footer class="footer footreg">
            <div class="container-fluid">
                <p class="copyright pull-right footxt">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                    <a class="footxt" href="http://safesi.com">SAFESI&nbsp;&nbsp;&nbsp;&nbsp;</a>
                </p>
            </div>
        </footer>
    </div>
</body>

<script>
    baseUrl = "<?php echo base_url(); ?>";
</script>

<!--   Core JS Files   -->
<script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/material.min.js" type="text/javascript"></script>

<!-- Sweetalert -->
<script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script>

<!--  Charts Plugin -->
<script src="<?php echo base_url(); ?>assets/js/chartist.min.js"></script>

<!--  Dynamic Elements plugin -->
<script src="<?php echo base_url(); ?>assets/js/arrive.min.js"></script>

<!--  PerfectScrollbar Library -->
<script src="<?php echo base_url(); ?>assets/js/perfect-scrollbar.jquery.min.js"></script>

<!--  Notifications Plugin    -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap-notify.js"></script>

<!-- Material Dashboard javascript methods -->
<script src="<?php echo base_url(); ?>assets/js/material-dashboard.js?v=1.2.0"></script>

<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url(); ?>assets/js/demo.js"></script>

<!-- Datapicker! -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>

<!-- Timepicker! -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap-timepicker.js"></script>

<script src="<?php echo base_url(); ?>assets/empresa/js/empresaRegistroOnline.js" ></script>
</html>