<div class="main-panel">

<nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <?php if($this->uri->segment(1) == 'inicio'){ ?>
                            <a class="navbar-brand" href="#"> Inicio </a>    
                        <?php } ?>

                        <?php if($this->uri->segment(1) == 'perfil'){ ?>
                            <a class="navbar-brand" href="#"> Perfil </a>    
                        <?php } ?>

                        <?php if($this->uri->segment(1) == 'empresas'){ ?>
                            <a class="navbar-brand" href="#"> Empresas </a>    
                        <?php } ?>

                        <?php if($this->uri->segment(1) == 'personasnaturales'){ ?>
                            <a class="navbar-brand" href="#"> Personas Naturales </a>    
                        <?php } ?>

                        <?php if($this->uri->segment(1) == 'cursos'){ ?>
                            <a class="navbar-brand" href="#"> Cursos </a>    
                        <?php } ?>

                        <?php if($this->uri->segment(1) == 'capacitadores'){ ?>
                            <a class="navbar-brand" href="#"> Capacitadores </a>    
                        <?php } ?>

                        <?php if($this->uri->segment(1) == 'reservas'){ ?>
                            <a class="navbar-brand" href="#">Gestión de Reservas </a>    
                        <?php } ?>

                        <?php if($this->uri->segment(1) == 'crear_reserva'){ ?>
                            <a class="navbar-brand" href="#">Crear Reserva </a>    
                        <?php } ?>

                        <?php if($this->uri->segment(1) == 'alumnos'){ ?>
                            <a class="navbar-brand" href="#"> Alumnos </a>    
                        <?php } ?>

                        <?php if($this->uri->segment(1) == ''){ ?>
                            <a class="navbar-brand" href="#"> Inicio </a>    
                        <?php } ?>

                        <?php if($this->uri->segment(1) == 'bancos'){ ?>
                            <a class="navbar-brand" href="#"> Cuentas Bancarias </a>    
                        <?php } ?>

                        <?php if($this->uri->segment(1) == 'grp_em'){ ?>
                            <a class="navbar-brand" href="#"> Grupos por Empresa </a>    
                        <?php } ?>

                        <?php if($this->uri->segment(1) == 'grp_pn'){ ?>
                            <a class="navbar-brand" href="#"> Grupos por Personas Naturales </a>    
                        <?php } ?>

                        <?php if($this->uri->segment(1) == 'grp_cs'){ ?>
                            <a class="navbar-brand" href="#"> Notas por curso </a>    
                        <?php } ?>

                        <?php if($this->uri->segment(1) == 'rpt'){ ?>
                            <a class="navbar-brand" href="#"> Reportes </a>    
                        <?php } ?>

                    </div>

                    <?php
                        $userempresa = $this->session->userdata('user');
                        extract($userempresa);
                    ?>

                    <div class="collapse navbar-collapse" id="dvtopbar">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a class="dropdown-toggle" href="#"> 
                                    <script>
                                        var meses = new Array ("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                                        var dias = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
                                        var fecha = new Date();
                                        document.write(dias[fecha.getDay()] + ", " + fecha.getDate() + " de " + meses[fecha.getMonth()] + " de " + fecha.getFullYear());
                                    </script>
                                </a>   
                            </li>
                            <li>
                                <a href="<?=base_url()?>inicio" class="dropdown-toggle" >
                                    <i class="material-icons">dashboard</i>
                                    <p class="hidden-lg hidden-md">Dashboard</p>
                                </a>
                            </li>
                        
                            <li class="dropdown">

                            	  
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">person</i>
                                    <p class="hidden-lg hidden-md">Perfil</p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="<?php echo base_url(); ?>perfil">Editar Perfil</a>
                                        <input type="hidden" name="idusersession" id="idusersession" value=<?php echo $id_usuario; ?> >
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>LoginController/logout">Salir</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>