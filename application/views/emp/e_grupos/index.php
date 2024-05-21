    <div class="content">
        <div class="container-fluid">
            <?php
$userempresa = $this->session->userdata('userempresa');
extract($userempresa);
?>

            <!--......-->

            <!--Row  Regitro Grupos..........................................................................................................-->
            <div class="" id="dvnvgrupo">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" data-background-color="blue">
                                <h4 style="margin-top: 0;margin-bottom: 0;">Grupos</h4>
                            </div>
                            <div class="card-content" id="showgrupos">
                                    <!--Lista de grupos-->
                                    <p class="text-center"><img style="max-width: 150px;" src="<?php echo base_url();?>assets/img/load-22.gif"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Row Detalle del grupo......................................................................................................-->

            <!--PopUp Add Alumno a Grupo-->
            <div class="modal fade" id="modaladdalumnoagrupo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form id="formAddAlumnoGrupo" method="POST">
                        <input type="hidden" name="txtidalumno" id="txtididalumno">
                        <input type="hidden" name="texidgrupo" id="texididgrupo">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content card">
                            <div class="card-header" data-background-color="blue">
                                <h4 class="title text-bold tit-modal">Modal Titulo</h4>
                                <p>Datos del alumno</p>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating dvlfloat">
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
                                        <div class="form-group label-floating dvlfloat" id="dvnumdnialumn">
                                            <label class="control-label">N° Documento: <span class="req-ast">*</span></label>
                                            <input type="text" class="form-control" name="txtnumerodocumento" id="idtxtnumerodocumento" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating dvlfloat" id="dvapelidosalumn">
                                            <label class="control-label">Apellidos: <span class="req-ast">*</span></label>
                                            <input type="text" class="form-control" name="txtapellidos" id="idtxtapellidos" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating dvlfloat" id="dvnomalumn">
                                            <label class="control-label">Nombres: <span class="req-ast">*</span></label>
                                            <input type="text" class="form-control" name="txtnombres" id="idtxtnombres" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row hidden">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating dvlfloat" id="dateRangePicker">
                                            <label class="control-label">Fecha de Nacimiento: <span class="req-ast">*</span></label>
                                            <input type="text" class="form-control" name="txtfnacimiento" value="00/00/0000" id="idtxtfnacimiento" data-provide="datepicker" data-date-format="dd/mm/yyyy" >
                                        </div>
                                    </div>
                                    <div class="col-md-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating dvlfloat">
                                            <label class="control-label">Teléfono: </label>
                                            <input type="text" class="form-control" name="txttelefono" id="idtxttelefono" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating dvlfloat">
                                            <label class="control-label">Email: </label>
                                            <input type="email" class="form-control" name="txtemail" id="idtxtemail">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating dvlfloat" id="dcargo">
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
            

            <div class="hidden" id="dvdetallgrupo">
                <div class="row">
                    <div class="col-md-3"><a class="btn btn-btn-danger" href="<?=base_url()?>emp/e_grupos"><i class="material-icons">reply</i> Atras</a></div>
                    <div class="col-md-5"></div>
                    <div class="col-md-4 text-right">
                        <button type="button" id="btnAddAlumnoGrupo" class="btn btn-success" data-toggle="modal">
                            <i class="material-icons">person_add</i>Agregar Alumno al Grupo
                        </button>
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
                                <input type="hidden" name="estadogrupo" id="estadogrupo">
                            </div>
                            <div class="card-content">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                                <tr>
                                                    <th>#</th>
                                                    <th>N° Documento</th>
                                                    <th>Apellidos</th>
                                                    <th>Nombres</th>
                                                    <th id="thnot1" class="hidden">N1</th>
                                                    <th id="thnot2" class="hidden">N2</th>
                                                    <th id="thnot3" class="hidden">N3</th>
                                                    <th id="thnot4" class="hidden">N4</th>
                                                    <th>Promedio</th>
                                                    <th>Condición</th>
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

                                        

                                        <?php if ($tipo=='EM'){ ?> 
                                            <div class="col-md-4 text-right hidden" id="dvbtnconfirmar">
                                                <form id="formconflistalum" method="POST">
                                                    <input type="hidden" name="txtidgrup" id="txtidgrup">
                                                    <input type="hidden" name="txtidcurs" id="txtidcurs">
                                                    <button type="button" class="btn btn-primary" id="btnConfirmAlumnos" data-toggle="tooltip" data-placement="bottom" data-original-title="Confirmar Alumnos">
                                                    <i class="material-icons">done_all</i> Cerrar Grupo</button>
                                                </form>
                                            </div>
                                        <?php } ?>



                                        <div class="col-md-4 text-right" <?php if($tipo=='EM'){ ?> 
                                                                                id="dvbtnprinotas" 
                                                                                <?php }else{?> 
                                                                                id="dvbtnprinotaspn" 
                                                                                <?php } ?> >
                                            <a class="btn btn-primary btnimpnotas" rel="tooltip" title="" data-original-title="Imprimir Registro de Notas"><i class="material-icons">print</i> Registro de Notas<div class="ripple-container"></div></a>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>