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

                        <?php if($this->uri->segment(1) == 'emp' && $this->uri->segment(2) == 'e_inicio'){ ?>
                            <a class="navbar-brand" href="#"> Panel </a>    
                        <?php } ?>

                        <?php if($this->uri->segment(1) == 'emp' && $this->uri->segment(2) == 'e_cursos'){ ?>
                            <a class="navbar-brand" href="#"> Cursos </a>    
                        <?php } ?>

                        <?php if($this->uri->segment(1) == 'emp' && $this->uri->segment(2) == 'e_alumnos'){ ?>
                            <a class="navbar-brand" href="#"> Alumnos </a>    
                        <?php } ?>


                        <?php if($this->uri->segment(1) == 'emp' && $this->uri->segment(2) == 'e_grupos'){ ?>
                            <a class="navbar-brand" href="#"> Grupos </a>    
                        <?php } ?>
                    </div>

                    <?php
                        $userempresa = $this->session->userdata('userempresa');
                        extract($userempresa);

                        if($tipo=='EM') {
                            $txtrazonnom = $razonsocial;
                        }else if($tipo=='PN'){
                            $txtrazonnom = $nombrecontacto;
                        }

                    ?>



                    <div class="collapse navbar-collapse">
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
                                <a href="<?=base_url()?>emp/e_inicio" class="dropdown-toggle" >
                                    <i class="material-icons">dashboard</i>
                                    <p class="hidden-lg hidden-md">Dashboard</p>
                                </a>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">person</i><?php echo $txtrazonnom; ?>
                                    <p class="hidden-lg hidden-md">Perfil</p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="<?php echo base_url(); ?>emp/e_perfil">Editar Perfil</a>
                                        <input type="hidden" name="idusersession" id="idusersession" value=<?php echo $id_empresa; ?> >
                                        <input type="hidden" name="txttipuser" id="txttipuser" value=<?php echo $tipo; ?> >
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>emp/LoginController/logoutEmpresa">Salir</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>