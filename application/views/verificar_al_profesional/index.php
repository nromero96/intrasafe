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
			p{
				font-size: 17px;
				line-height: 22px;
			}

			.space-img{
				
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
				height: 100%;
                background-image: url(<?php echo base_url(); ?>assets/img/safe_vrf_2033.jpg);
				background-size: cover;
				background-position: center;
				
            }
            
            .contsearch{
                margin-top: 8vh;
				margin-bottom: 10vh;
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

			.listempresas{
				margin-bottom: 30px;
			}

			.listempresas img{
				width: 120px;
				margin: 5px;
				border: 1px solid #f5f5f5;
				box-shadow: 0px 0px 15px 0px #f2f2f2;
				border-radius: 10px;
				background: white;
			}

			.bjparamcert span{
				border: 1px solid #f5f5f5;
				box-shadow: 0px 0px 15px 0px #f2f2f2;
				border-radius: 10px;
				background: white;
				padding: 0px 0px 0px 8px;
				max-width: 190px;
				display: grid;
				grid-template-columns: 1fr 0fr;
			}

			.vert-center{
				vertical-align: middle !important;
			}

			.bjparamcert b{
				padding: 10px 6px 10px 4px;
				line-height: 26px;
			}

			.bjparamcert img{
				margin: 2px;
				border-radius: 7px;
				border: 1px solid #f5f5f5;
				background: white;
			}
            
        </style>
        
    </head>
    <body class="bodyreg" style="background-color:transparent !important;}">
        <div class="wrapper">
            <div class="content">
                <div class="container-fluid">
                    <div class="row" id="bxbuscador">
                        <div class="col-md-6 text-center bgimg hidden-xs">
                            
							<div class="space-img"></div>
                            
                        </div>
                        <div class="col-md-6 text-center contsearch">

							<p class="text-center">Emitimos certificados conforme a los parámetros establecidos por Safesi o por las empresas que confían en nosotros y nos autorizan a capacitar a sus contratistas.</p>

							<div class="listempresas">
								<?php foreach($logos_cerficados as $logo){ ?>
									<?php if($logo->logo_provcertificado){ ?>
										<img src="<?php echo base_url(); ?>uploads/bgcertificado/<?php echo $logo->logo_provcertificado; ?>" title="<?php echo $logo->nombre; ?>" class="imgverif">
									<?php } ?>
								<?php } ?>
							</div>

							<p>Certificaciones internacionales</p>
							<div class="listempresas">
								<img src="<?php echo base_url(); ?>uploads/bgcertificado/logo-saia.png" title="SAIA" class="imgverif">
							</div>

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
										<th><b>Bajo los parámetros de:</b></th>
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
										<th><b>Empresa</b></th>
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
