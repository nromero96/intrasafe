<div class="sidebar" data-color="blue" data-image="<?php echo base_url(); ?>assets/img/sidebar-2.jpg">

        <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"
        Tip 2: you can also add an image using data-image tag
        -->

            <?php
                $userempresa = $this->session->userdata('userempresa');
                extract($userempresa);
            ?>

            <div class="logo" style="padding: 0 !important;">
                <a href="https://www.safesi.com" class="simple-text">
                    <img src="<?php echo base_url(); ?>assets/img/logo-1.png">
                </a>
            </div>
            <div class="sidebar-wrapper ps-container ps-theme-default" data-ps-id="39020311-f0ed-5c8f-cd91-70d1e46d1b8f">
                <ul class="nav">
                    <li <?php if($this->uri->segment(1) == 'emp' && $this->uri->segment(2) == 'e_inicio' ){ ?> class="active" <?php } ?> >
                        <a href="<?=base_url()?>emp/e_inicio">
                            <i class="material-icons">dashboard</i>
                            <p>INICIO</p>
                        </a>
                    </li>

                    <li <?php if($this->uri->segment(1) == 'emp' && $this->uri->segment(2) == 'e_cursos'){ ?> class="active" <?php } ?>>
                        <a href="<?=base_url()?>emp/e_cursos">
                            <i class="material-icons">book</i>
                            <p>CURSOS</p>
                        </a>
                    </li>

                    <li <?php if($this->uri->segment(1) == 'emp' && $this->uri->segment(2) == 'e_grupos'){ ?> class="active" <?php } ?>>
                        <a href="<?=base_url()?>emp/e_grupos">
                            <i class="material-icons">folder</i>
                            <p>NOTAS</p>
                        </a>
                    </li>



                <li routerlinkactive="active">
                        <a data-toggle="collapse" href="#tablesrpt" <?php if ($this->uri->segment(1) == 'emp' && $this->uri->segment(2) == 'e_rpt') {?> class="selectactv" <?php }?> >
                            <i class="material-icons">assessment</i>
                            <p>REPORTES<b class="caret"></b></p>
                        </a>

                        <div class="collapse" id="tablesrpt" >
                            <ul class="nav">
                                <li <?php if ($this->uri->segment(2) == 'listacursos') {?> class="active" <?php }?> >
                                    <a href="<?=base_url()?>emp/e_rpt/listacursos">
                                        <span class="sidebar-normal">> CURSOS</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                </li>


                    <li>
                        <a href="<?=base_url()?>emp/LoginController/logoutEmpresa">
                            <i class="material-icons">settings_power</i>
                            <p>SALIR</p>
                        </a>
                    </li>


                </ul>
            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps-scrollbar-y-rail" style="top: 0px; right: 0px;">
                <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div>
            </div>
        </div>
        <div class="logo" style="padding: 0 !important;">
                <a href="https://www.safesi.com" class="simple-text">
                    <img src="<?php echo base_url(); ?>assets/img/logo-1.png">
                </a>
        </div>
        <div class="sidebar-background" style=""></div></div>