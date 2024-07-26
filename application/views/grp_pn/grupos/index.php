    <div class="content">
        <div class="container-fluid">

              <div class="row">
                <div class="col-md-12 text-center"><span style="font-size: 15px;"><b>NOMBRES: </b> <span id="txtnompna"><img class="ldimg" src="<?php echo base_url();?>assets/img/load-11.gif"></span> | <b>DNI: </b><span id="dnicliente"><img class="ldimg" src="<?php echo base_url();?>assets/img/load-11.gif"></span></span></div>
                <input type="hidden" name="tpcliente" id="tpcliente">
            </div>

            
            <!--Row  Lista Grupos...........................-->
            <div class="" id="dvlisgrupo">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" data-background-color="blue">
                                <h4 class="title" id="tituloTab">Lista de Grupos</h4>
                                <img src="<?php echo base_url();?>assets/img/load-11.gif" id="logoimghd" class="imglogogp">
                            </div>
                            <div class="card-content" id="showgrupos">
                                    <!--Lista de grupos-->
                                    <p class="text-center"><img style="max-width: 150px;" src="<?php echo base_url();?>assets/img/load-22.gif"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space"></div>
            </div>



            <!--Row Detalle Grupo-->
            <div class="hidden" id="dvdetallgrupo">
                <hr style="border: 1px solid #c6c6c6;margin-top: 7px;margin-bottom: 0px;">

            <!--PopUp Add Alumno a Grupo-->
            <div class="modal fade" id="modaladdalumnoagrupo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form id="formAddAlumnoGrupo" method="POST">
                        <input type="hidden" name="txtidalumno" id="txtididalumno">
                        <input type="hidden" name="texidgrupo" id="texididgrupo">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content card">
                            <div class="card-header" data-background-color="blue">
                                <h4 class="title text-bold tit-modal">Modal Titulo</h4>
                                <p>Datos del grupo</p>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Tipo de Documento: <span class="req-ast">*</span></label>
                                            <select class="form-control" name="txttipodocumento" id="idtxttipodocumento" >
                                                <option value=""></option>
                                                <option value="dni" >DNI</option>
                                                <option value="Pasaporte">Pasaporte</option>
                                                <option value="cex">CEX</option>
                                                <option value="otros">Otros</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating" id="dvnumdnialumn">
                                            <label class="control-label">N° Documento: <span class="req-ast">*</span></label>
                                            <input type="text" class="form-control" name="txtnumerodocumento" id="idtxtnumerodocumento" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating" id="dvapelidosalumn">
                                            <label class="control-label">Apellidos: <span class="req-ast">*</span></label>
                                            <input type="text" class="form-control uppercase-input" name="txtapellidos" id="idtxtapellidos" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating" id="dvnomalumn">
                                            <label class="control-label">Nombres: <span class="req-ast">*</span></label>
                                            <input type="text" class="form-control uppercase-input" name="txtnombres" id="idtxtnombres" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row hidden">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating" id="dateRangePicker">
                                            <label class="control-label">Fecha de Nacimiento: <span class="req-ast">*</span></label>
                                            <input type="text" class="form-control" name="txtfnacimiento" value="00/00/0000" id="idtxtfnacimiento" data-provide="datepicker" data-date-format="dd/mm/yyyy" >
                                        </div>
                                    </div>
                                    <div class="col-md-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Teléfono: </label>
                                            <input type="text" class="form-control" name="txttelefono" id="idtxttelefono" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Email: </label>
                                            <input type="email" class="form-control" name="txtemail" id="idtxtemail">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating" id="dcargo">
                                            <label class="control-label">Cargo: </label>
                                            <input type="text" class="form-control" name="txtcargo">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-no">
                                            <label class="control-label">Curso:</label><br>
                                            <label id="txtnombredelcurso" class="lbltinp"></label>
                                            <input type="hidden" name="texidcurso" id="texididcurso">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="btnSaveAlumnoGrupo" class="btn btn-primary">Agregar</button>
                                <button type="button" id="btnReset1" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!--..................-->

                <!-- Pupup Registro de Notas -->
            <div class="modal fade" id="modalrnotas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form id="formrnotas" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="txtidalumno_grupo">
                        <input type="hidden" name="texidgrupo" id="texididgrupo">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content card">

                            <div class="card-header" data-background-color="blue">
                                <h4 class="title text-bold tit-modal">Modal Titulo</h4>
                                <p>Notas</p>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating form-group-no">
                                            <label class="control-label">N° Documento: <span class="req-ast">*</span></label>
                                            <input type="text" class="form-control" name="txtndocumento" disabled="disabled">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating form-group-no">
                                            <label class="control-label">Nombres: <span class="req-ast">*</span></label>
                                            <input type="text" class="form-control" name="txtnomalumno" disabled="disabled">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div id="dnumnotas">
                                        <div class="col-md-1 hidden" id="dnot1">
                                            <div class="form-group label-floating form-group-no">
                                                <label class="control-label">N1:</label>
                                                <input type="text" class="form-control iptnotas" name="txtnt1" id="txtnt1" maxlength="2" onkeyup="fncProm()">
                                            </div>
                                        </div>
                                        <div class="col-md-1 hidden" id="dnot2">
                                            <div class="form-group label-floating form-group-no">
                                                <label class="control-label">N2:</label>
                                                <input type="text" class="form-control iptnotas" name="txtnt2" id="txtnt2" maxlength="2" onkeyup="fncProm()">
                                            </div>
                                        </div>
                                        <div class="col-md-1 hidden" id="dnot3">
                                            <div class="form-group label-floating form-group-no">
                                                <label class="control-label">N3:</label>
                                                <input type="text" class="form-control iptnotas" name="txtnt3" id="txtnt3" maxlength="2" onkeyup="fncProm()">
                                            </div>
                                        </div>
                                        <div class="col-md-1 hidden" id="dnot4">
                                            <div class="form-group label-floating form-group-no">
                                                <label class="control-label">N4:</label>
                                                <input type="text" class="form-control iptnotas" name="txtnt4" id="txtnt4" maxlength="2" onkeyup="fncProm()">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group label-floating form-group-no">
                                            <label class="control-label">Promedio:</label>
                                            <input type="text" class="form-control" name="txtpromnot" id="txtpromnot" maxlength="2" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group label-floating form-group-no">
                                            <label class="control-label">Condición:</label>
                                            <label id="txtsmscond" style="margin-top: 10px;"></label>
                                        </div>
                                        <div class="form-group label-floating form-group-no hidden">
                                            <label class="control-label">Condición:</label>
                                            <select class="form-control" name="slcondicion" id="slcondicion" readonly="readonly">
                                                <option value="0">----------</option>
                                                <option value="1">Aprobado</option>
                                                <option value="2">Desaprobado</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                 <div class="row">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6">
                                       <textarea rows="4" cols="50" name="txtobservacion" class="form-control" placeholder="Observación"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="btnSaveNotas" class="btn btn-primary">Guardar</button>
                                <button type="button" id="btnReset" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- .......... -->


            <!--Pupup Generara Certificado-->
            <div class="modal fade" id="modalgnrarcert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form id="formgnrarcert">  
                    <div class="modal-dialog" role="document">
                        <div class="modal-content card">
                            <div class="card-header" data-background-color="blue">
                                <p class="text-center" style="font-size: 18px"><b>Certificado para el alumno</b></p>
                            </div>
                            <div class="modal-body" style="padding-top: 0px !important;">
                                <div class="row">
                                    <div class="col-md-9">
                                    <div class="form-group" style="margin-top: 5px;">
                                        <select name="slcertificado" id="slcertificado" class="form-control">
                                                <?php 
                                                foreach ($modelcertificados as $key => $value) {
                                                    echo '<option value="'.$value->id.'" data-bgimg1="'.$value->bg_imagen_first.'" data-bgimg2="'.$value->bg_imagen_second.'">'.$value->nombre.'</option>';
                                                }
                                                ?>
                                                </select>
                                        </div>
                                        <div id="prvwcertbg">
                                            
                                        </div>
                                        
                                        <input type="hidden" name="txtidalumnogrupo" id="txtidalumnogrupo">
                                		<input type="hidden" name="txtnombgcert" id="txtnombgcert">
                                            
                                        <input type="hidden" name="img_bg_certificado_dos" id="img_bg_certificado_dos">
                                        <input type="hidden" name="logo_emp" id="logo_emp">

                                        <div class="row">
                                            <div class="col-md-6 text-center">
                                                <label class="control-label">Mostrar Módulo:</label>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="mostrar_modulo" value="no" checked>
                                                        No
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="mostrar_modulo" value="si">
                                                        Sí
                                                    </label>
                                                </div>
                                            </div>
                                            <div id="dvlogocliente" class="col-md-6 text-center hidden">
                                                <label class="control-label">Logo Cliente:</label>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="logo_cliente" value="no" checked>
                                                        No
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="logo_cliente" value="si">
                                                        Sí
                                                    </label>
                                                </div>
                                                <div class="form-group hidden" id="dvempresa" style="margin-top: 5px;">
                                                    <img src="" id="imglogoempcertif" style="max-width: 80px;">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-3">
                                        <div class="text-center" style="margin-top: 14px; margin-bottom: 4px;">
                                            <small style="line-height: 14px;display: block;">
                                                Último Certificado de la serie: <b><span id="ultimocertif">...</span></b>
                                            </small>
                                        </div>
                                        <input type="text" name="txtsericert" id="txtsericert" class="text-center" style="width: 100%"> <!-- readonly -->
                                        <input type="text" name="txtcodigoc" id="txtcodigoc" class="text-center" placeholder="000" maxlength="3" style="width: 100%;    margin-top: 9px;" >
                                        <br>
                                        <br>
                                        <button type="button" id="btnSaveCert" class="btn btn-primary">Guardar</button>
                                        <button type="button" id="btnCloseCert" class="btn btn-danger" data-dismiss="modal" style="margin: 0px;">Cerrar&nbsp;&nbsp;&nbsp;</button>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- .......... -->


                <div class="row">
                    <div class="col-md-2"><input type="button" value="Atras" class="btn btn-btn-defauld" onClick="window.location.reload()"></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-8 text-right" id="showbtns">
                        <a class="btn btn-primary btnimpnotas" rel="tooltip" title="Imprimir Registro de Notas"><i class="material-icons">print</i> Notas</a>
                        <!-- <button type="button" id="btnAddAlumnoGrupo" class="btn btn-success" data-toggle="modal">
                            <i class="material-icons">person_add</i>Agregar Alumno al Grupo
                        </button> -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" data-background-color="blue">
                                <h4 style="margin-top: 0;margin-bottom: 0;">
                                    <span id="gnombredelgrupo">Detalle del Grupo:</span>
                                    <span style="float: right;"><span id="lblcantalumns"></span>/<span id="lblcuposreservados"></span></span>
                                    <input type="hidden" name="txtcuposreservados" id="txtcuposreservados">
                                </h4>
                                <input type="hidden" name="numnotasdelcurso" id="numnotasdelcurso">
                                <input type="hidden" name="txtdescipcioncurso" id="txtdescipcioncurso">

                            </div>
                            <div class="card-content">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="">
                                                <tr>
                                                    <th><b>N°</b></th>
                                                    <th><b>Foto</b></th>
                                                    <th><b>N° Documento</b></th>
                                                    <th><b>Apellidos</b></th>
                                                    <th><b>Nombres</b></th>
                                                    <th id="thnot1" class="hidden"><b>N1</b></th>
                                                    <th id="thnot2" class="hidden"><b>N2</b></th>
                                                    <th id="thnot3" class="hidden"><b>N3</b></th>
                                                    <th id="thnot4" class="hidden"><b>N4</b></th>
                                                    <th><b>Promedio</b></th>
                                                    <th><b>Condición</b></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="showListaAlumnosForGrupo">
                                                <!--Lista-->
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8"></div>
                                        <div class="col-md-4 text-right hidden" id="dvbtnconfirmar">
                                            <form id="formconflistalum" method="POST">
                                                <input type="hidden" name="txtidgrup" id="txtidgrup">
                                                <input type="hidden" name="txtidcurs" id="txtidcurs">
                                                <button type="button" class="btn btn-primary" id="btnConfirmAlumnos" data-toggle="tooltip" data-placement="bottom" data-original-title="Confirmar Alumnos">
                                                <i class="material-icons">done_all</i> Cerrar Grupo</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>