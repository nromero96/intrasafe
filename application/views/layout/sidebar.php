<div class="sidebar" data-color="blue" data-image="<?php echo base_url(); ?>assets/img/sidebar-1.jpg">
        <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"
        Tip 2: you can also add an image using data-image tag
        -->
            <div class="logo" style="padding: 0 !important;">
                <a href="https://www.safesi.com" class="simple-text">
                    <img src="<?php echo base_url(); ?>assets/img/logo-1.png">
                </a>
            </div>
            <div class="sidebar-wrapper ps-container ps-theme-default" data-ps-id="39020311-f0ed-5c8f-cd91-70d1e46d1b8f">
                <ul class="nav">
                    <li <?php if ($this->uri->segment(1) == 'inicio') {?> class="active" <?php }?> >
                        <a href="<?=base_url()?>inicio">
                            <i class="material-icons">dashboard</i>
                            <p>INICIO</p>
                        </a>
                    </li>
                    <li <?php if ($this->uri->segment(1) == 'cursos') {?> class="active" <?php }?> >
                        <a href="<?=base_url()?>cursos">
                            <i class="material-icons">book</i>
                            <p>CURSOS</p>
                        </a>
                    </li>
                    <li <?php if ($this->uri->segment(1) == 'capacitadores') {?> class="active" <?php }?> >
                        <a href="<?=base_url()?>capacitadores">
                            <i class="material-icons">streetview</i>
                            <p>CAPACITADORES</p>
                        </a>
                    </li>
                    <li routerlinkactive="active">
                        <a data-toggle="collapse" href="#tables" <?php if ($this->uri->segment(1) == 'crear_reserva' or $this->uri->segment(1) == 'reservas') {?> class="selectactv" <?php }?> >
                            <i class="material-icons">timer</i>
                            <p>RESERVAS<b class="caret"></b></p>
                        </a>
                        <div class="collapse" id="tables">
                            <ul class="nav">
                                <li <?php if ($this->uri->segment(1) == 'reservas') {?> class="active" <?php }?> >
                                    <a href="<?=base_url()?>reservas">
                                        <span class="sidebar-normal">> GESTIÓN DE RESERVAS</span>
                                    </a>
                                </li>
                                <li <?php if ($this->uri->segment(1) == 'crear_reserva') {?> class="active" <?php }?> >
                                    <a href="<?=base_url()?>crear_reserva">
                                        <span class="sidebar-normal">> CREAR RESERVA</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li routerlinkactive="active">
                        <a data-toggle="collapse" href="#tables1" <?php if ($this->uri->segment(1) == 'empresas' or $this->uri->segment(1) == 'personasnaturales') {?> class="selectactv" <?php }?> >
                            <i class="material-icons">business</i>
                            <p>CLIENTES<b class="caret"></b></p>
                        </a>
                        <div class="collapse" id="tables1" >
                            <ul class="nav">
                                <li <?php if ($this->uri->segment(1) == 'empresas') {?> class="active" <?php }?> >
                                    <a href="<?=base_url()?>empresas">
                                        <span class="sidebar-normal">> EMPRESAS</span>
                                    </a>
                                </li>
                                <li <?php if ($this->uri->segment(1) == 'personasnaturales') {?> class="active" <?php }?> >
                                    <a href="<?=base_url()?>personasnaturales">
                                        <span class="sidebar-normal">> PERSONAS NATURALES</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                <li routerlinkactive="active">
                        <a data-toggle="collapse" href="#tables2" <?php if ($this->uri->segment(1) == 'grp_em' or $this->uri->segment(1) == 'grp_pn') {?> class="selectactv" <?php }?> >
                            <i class="material-icons">folder</i>
                            <p>NOTAS<b class="caret"></b></p>
                        </a>

                        <div class="collapse" id="tables2" >
                            <ul class="nav">
                                <li <?php if ($this->uri->segment(1) == 'grp_em') {?> class="active" <?php }?> >
                                    <a href="<?=base_url()?>grp_em">
                                        <span class="sidebar-normal">> EMPRESAS</span>
                                    </a>
                                </li>
                                <li <?php if ($this->uri->segment(1) == 'grp_pn') {?> class="active" <?php }?> >
                                    <a href="<?=base_url()?>grp_pn">
                                        <span class="sidebar-normal">> PERSONAS NATURALES</span>
                                    </a>
                                </li>
                                <li <?php if ($this->uri->segment(1) == 'grp_cs') {?> class="active" <?php }?> >
                                    <a href="<?=base_url()?>grp_cs">
                                        <span class="sidebar-normal">> POR CURSO</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li <?php if ($this->uri->segment(1) == 'alumnos') {?> class="active" <?php }?>>
                        <a href="<?=base_url()?>alumnos">
                            <i class="material-icons">portrait</i>
                            <p>ALUMNOS</p>
                        </a>
                    </li>

                    <li <?php if ($this->uri->segment(1) == 'bancos') {?> class="active" <?php }?>>
                        <a href="<?=base_url()?>bancos">
                            <i class="material-icons">credit_card</i>
                            <p>BANCOS</p>
                        </a>
                    </li>


                <li routerlinkactive="active">
                        <a data-toggle="collapse" href="#tablesrpt" <?php if ($this->uri->segment(1) == 'rpt') {?> class="selectactv" <?php }?> >
                            <i class="material-icons">assessment</i>
                            <p>REPORTES<b class="caret"></b></p>
                        </a>

                        <div class="collapse" id="tablesrpt" >
                            <ul class="nav">
                                <li <?php if ($this->uri->segment(2) == 'alumcurs') {?> class="active" <?php }?> >
                                    <a href="<?=base_url()?>rpt/alumcurs">
                                        <span class="sidebar-normal">> ALUMNOS POR CURSO</span>
                                    </a>
                                </li>
                                <li <?php if ($this->uri->segment(2) == 'alumcert') {?> class="active" <?php }?> >
                                    <a target="_blank" href="<?=base_url()?>rpt/alumcert">
                                        <span class="sidebar-normal">> LISTA DE CERTIFICADOS</span>
                                    </a>
                                </li>

                                <li <?php if ($this->uri->segment(2) == 'pagos_empresas') {?> class="active" <?php }?> >
                                    <a href="<?=base_url()?>rpt/pagos_empresas">
                                        <span class="sidebar-normal">> PAGOS EMPRESA</span>
                                    </a>
                                </li>

                                <li <?php if ($this->uri->segment(2) == 'pagos_personas_natural') {?> class="active" <?php }?> >
                                    <a href="<?=base_url()?>rpt/pagos_personas_natural">
                                        <span class="sidebar-normal">> PAGOS P. NATURALES</span>
                                    </a>
                                </li>

                                <li <?php if ($this->uri->segment(2) == 'correos') {?> class="active" <?php }?> >
                                    <a href="<?=base_url()?>rpt/correos">
                                        <span class="sidebar-normal">> EXPORTAR CORREOS</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                </li>

                <li routerlinkactive="active">
                        <a data-toggle="collapse" href="#tablescert" <?php if ($this->uri->segment(1) == 'certificados-internacionales') {?> class="selectactv" <?php }?> >
                            <i class="material-icons">wysiwyg</i>
                            <p>CERTIFICADOS<b class="caret"></b></p>
                        </a>

                        <div class="collapse" id="tablescert" >
                            <ul class="nav">
                                
                                <li <?php if ($this->uri->segment(2) == 'alumcert') {?> class="active" <?php }?> >
                                    <a target="_blank" href="<?=base_url()?>rpt/alumcert">
                                        <span class="sidebar-normal">> SAFESI</span>
                                    </a>
                                </li>

                                <li <?php if ($this->uri->segment(2) == 'pagos_empresas') {?> class="active" <?php }?> >
                                    <a href="<?=base_url()?>certificados-internacionales">
                                        <span class="sidebar-normal">> INTERNACIONAL</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                </li>


                    <li <?php if ($this->uri->segment(1) == 'settings') {?> class="active" <?php }?>>
                        <a href="<?=base_url()?>settings">
                            <i class="material-icons">perm_data_setting</i>
                            <p>CONFIGURACIÓN</p>
                        </a>
                    </li>

                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                </ul>
            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 0px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
        <div class="sidebar-background" style=""></div></div>