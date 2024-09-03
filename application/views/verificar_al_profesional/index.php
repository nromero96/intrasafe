<!DOCTYPE doctype html>
<html lang="en">
    <head><meta charset="gb18030">
        
        <link href="<?php echo base_url(); ?>assets/img/apple-icon.png" rel="apple-touch-icon" sizes="76x76"/>
        <link href="<?php echo base_url(); ?>assets/img/favicon.png" rel="icon" type="image/png"/>
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/>
        <title>
            SAFESI | VERIFICAR PERSONAL
        </title>
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"/>
        <meta content="width=device-width" name="viewport"/>
        <!-- Bootstrap core CSS     -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet"/>
        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="<?php echo base_url(); ?>assets/css/demo.css" rel="stylesheet"/>
        
        <style>
            .imgverif{
                max-width: 100%;
            }

            .bxdainfo{
                background: #ffffff;
                box-shadow: 0px 4px 10px -1px #b6b6b6;
                padding: 11px;
            }

            .bxdainfo b{
                color: #1e648c;
            }

            .bxdainfo::after {
                content: '';
                position: absolute;
                width: 145px;
                height: 6px;
                background: url(https://www.safesi.com/wp-content/themes/manya_safesi/img/h2.png);
                bottom: 0px;
                left: 0;
            }

            .bxdainfo::before {
                content: '';
                position: absolute;
                width: 90%;
                width: calc(100% - 150px);
                width: -webkit-calc(100% - 150px);
                width: -moz-calc(100% - 150px);
                width: -o-calc(100% - 150px);
                width: -ms-calc(100% - 150px);
                height: 2px;
                background: #1A597F;
                bottom: 0px;
                left: 150px;
            }

            .fotoperfil{
                width: 100%;
                border-radius: 7px;
            }
            
            .bgimg{
                padding: 4em;
                background: rgba(30,100,140,1);
                background: -moz-linear-gradient(-45deg, rgba(30,100,140,1) 0%, rgba(30,100,140,1) 12%, rgba(15,62,88,1) 80%, rgba(15,62,88,1) 100%);
                background: -webkit-gradient(left top, right bottom, color-stop(0%, rgba(30,100,140,1)), color-stop(12%, rgba(30,100,140,1)), color-stop(80%, rgba(15,62,88,1)), color-stop(100%, rgba(15,62,88,1)));
                background: -webkit-linear-gradient(-45deg, rgba(30,100,140,1) 0%, rgba(30,100,140,1) 12%, rgba(15,62,88,1) 80%, rgba(15,62,88,1) 100%);
                background: -o-linear-gradient(-45deg, rgba(30,100,140,1) 0%, rgba(30,100,140,1) 12%, rgba(15,62,88,1) 80%, rgba(15,62,88,1) 100%);
                background: -ms-linear-gradient(-45deg, rgba(30,100,140,1) 0%, rgba(30,100,140,1) 12%, rgba(15,62,88,1) 80%, rgba(15,62,88,1) 100%);
                background: linear-gradient(135deg, rgba(30,100,140,1) 0%, rgba(30,100,140,1) 12%, rgba(15,62,88,1) 80%, rgba(15,62,88,1) 100%);
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1e648c', endColorstr='#0f3e58', GradientType=1 );
            }
            
            .contsearch{
                margin-top: 40vh;
            }
            
            .contsearch input{
                max-width: 500px;
                margin: 0 auto;
                height: 50px;
                background: url(https://intranet.safesi.com/assets/img/dni_pm.png) no-repeat left center;
                border-radius: .3em .3em .3em .3em!important;
                border: 2px solid #11435f;
                padding-left: 65px;
                text-align: left;
                font-size: 1.3em;
                font-weight: 400;
            }
            
            .contsearch button{
                background: rgba(30,100,140,1);
                letter-spacing: .5px;
                font-size: 1.3em;
                font-weight: 600;
                margin: 15px auto;
                padding: 10px 41px;
                text-transform: uppercase;
                border: none;
                -webkit-border-radius: 2px;
                border-radius: 2px;
                -webkit-box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
                box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
            }
            
            .btnnewct{
                background: rgba(30,100,140,1);
                letter-spacing: .5px;
                font-size: 1.3em;
                font-weight: 600;
                margin: 15px auto;
                padding: 10px 41px;
                text-transform: uppercase;
                border: none;
                -webkit-border-radius: 2px;
                border-radius: 2px;
                -webkit-box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
                box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
            }
            
        </style>
        
    </head>
    <body class="bodyreg" style="background-color:transparent !important;}">
        <div class="wrapper">
            <div class="content">
                <div class="container-fluid">
                    <div class="row" id="bxbuscador">
                        <div class="col-md-6 text-center bgimg hidden-xs">
                            
                            <img src="<?php echo base_url(); ?>assets/img/safesi-verificar-personal.png" class="imgverif">
                            
                        </div>
                        <div class="col-md-6 text-center contsearch">
                            <div class="form-group">
                                <input class="form-control" name="txtdni" id="txtdni" type="text" placeholder="Ingresar documento de identidad" autocomplete="off" />
                            </div>
                            <button class="btn btn-primary" id="btnBuscar" type="button"> Buscar <div class="ripple-container"></div></button>
                        </div>
                    </div>
                </div>
                
                <div class="container">
                    <div class="row hidden" id="dvdatosalumno">
                        <br>
                        <div class="text-right">
                            <button class="btn btn-primary btnnewct" id="btnNuevaconsulta" type="button"> Nueva Consulta <div class="ripple-container"></div></button>
                        </div>
                        <br>
                        <div class="col-md-6 bxdainfo">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="" id="fotoperfil" class="fotoperfil">
                                </div>
                                <div class="col-md-9">
                                    <h4>
                                        <p><b>Documento: </b></span><br><span id="spdni">...</p>
                                        <p><b>Nombres: </b></span><br><span id="spnombresyapellidos">...</p>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row hidden" id="dvlistacertificado">
                        <div class="col-md-12" style="background: #ffffff;box-shadow: 0px 4px 10px -1px #b6b6b6;;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><b>Curso</b></th>
                                        <th><b>Duración</b></th>
										<th><b>Certifíca</b></th>
                                        <th><b>Cód. de certificado</b></th>
                                        <th><b>Fecha de emisión</b></th>
                                        <th><b>Fecha de expiración</b></th>
                                    </tr>
                                </thead>
                                <tbody id="liscertalumno">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

					<div class="row hidden" id="dvlistacertificadointernacional" style="margin-top: 20px; margin-bottom: 20px;">
                        <div class="col-md-12" style="background: #ffffff;box-shadow: 0px 4px 10px -1px #b6b6b6;;">
							<h4><b>Certificados Internacionales</b></h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><b>Curso</b></th>
                                        <th><b>Código</b></th>
										<th><b>Expira</b></th>
                                    </tr>
                                </thead>
                                <tbody id="liscertalumnointenacional">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                
            </div>
        </div>
    </body>
</html>
<script>
    baseUrl = "<?php echo base_url(); ?>";
</script>
<!--   Core JS Files   -->
<script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js" type="text/javascript">
</script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript">
</script>

<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url(); ?>assets/js/demo.js">
</script>
<!-- Sweetalert -->
<script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script>
</script>
<script src="<?php echo base_url(); ?>assets/verificarprofesional/js/verificarprofesional.js" ></script>
</script>
