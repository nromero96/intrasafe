<div class="content" style="margin-top: 32px;">

                <div class="container-fluid">
                <div class="alert alert-success" hidden="hidden">
                    <div class="container-fluid">
                    <div class="alert-icon"><i class="material-icons">check</i></div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="material-icons">clear</i></span></button>
                        <b>Mensaje Alerta</b>
                    </div>
                </div>



                    <!--PopUp detalle Curso-->
                    <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form id="formCurso" method="POST">
                            <input type="hidden" value="0" name="txtIdCurso" id="txtCurso">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content card">
                                <div class="card-header" data-background-color="blue">
                                    <h4 class="title text-bold tit-modal">Modal Titulo</h4>
                                </div>
                                <div class="modal-body">
                                        <div class="row mgbottom">
                                            <div class="col-md-12">
                                                <span class="titinfo">Título:</span><br>
                                                <label id="lblnombre"></label>
                                            </div>
                                        </div>


                                        <div class="row mgbottom">
                                            <div class="col-md-12">
                                                <span class="titinfo">Descripción:</span><br>
                                                <div class="cajadescripcion">
                                                <span class="txtdescripspn"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mgbottom">
                                            <div class="col-md-12">
                                                <span class="titinfo">Capacitador:</span><br>
                                                <label id="lblcapacitador"></label>
                                            </div>
                                        </div>
                                        <div class="row mgbottom">
                                            <div class="col-md-3">
                                                <span class="titinfo">Duración:</span><br>
                                                <label id="lblhoras"></label> <label>Horas</label>
                                            </div>
                                            <div class="col-md-4">
                                                <span class="titinfo">Cupos disponibles:</span><br>
                                                <label id="lblcupos"></label>
                                            </div>
                                        </div>
                                        <div class="row mgbottom bxhorario">
                                            <div class="col-md-4">
                                                <span class="titinfo" id="lblfecha3"></span><br>
                                                <label>S/.</label><label id="lblprecio3"></label>
                                            </div>
                                            <div class="col-md-4">
                                                <span class="titinfo" id="lblfecha2"></span><br>
                                                <label>S/.</label><label id="lblprecio2"></label>
                                            </div>
                                            <div class="col-md-4">
                                                <span class="titinfo" id="lblfecha1"></span><br>
                                                <label>S/.</label><label id="lblprecio"></label>
                                            </div>
                                        </div>
                                        <div class="row bxhorario">
                                            <div class="col-md-12">
                                                <span class="titinfo">Horario:</span><br>
                                                <table class="table">
                                                <thead class="text-primary">
                                                    <th>#</th>
                                                    <th>Fecha</th>
                                                    <th>Hora Inicio</th>
                                                    <th>Hora Fin</th>
                                                </thead>
                                                <tbody id="showhorario">

                                                </tbody>
                                            </table>  
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="btnReset" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <!---->

                    <!--PopUp Reservar-->
                    <div class="modal fade" id="modalreservar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form id="formReservar" name="formReservar" method="POST">
                            <input type="hidden" value="0" name="txtIdCursoR" id="txtCursoR">
                            <input type="hidden" name="txtIdEmpresa" value="" id="txtIdEmpresa">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content card">
                                <div class="card-header" data-background-color="blue">
                                    <h4 class="title text-bold tit-modal">Modal Titulo</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row mgbottom">
                                        <div class="col-md-12">
                                            <span class="titinfo">Título:</span><br>
                                            <label id="lblnombre1"></label>
                                        </div>
                                    </div>
                                    <div class="row mgbottom">
                                        <div class="col-md-12">
                                            <span class="titinfo">Descripción:</span><br>
                                            <div class="cajadescripcion">
                                            <span class="txtdescripspn"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mgbottom">
                                        <div class="col-md-12">
                                            <span class="titinfo">Capacitadores:</span><br>
                                            <label id="lblcapacitador1"></label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group form-group-no" id="dslscupos">
                                                <label class="control-label">Cupos a reservar</label>
                                                <select id="selectId" name="slsncupos" class="form-control" onchange="operaciontotal()">
                                                    <option value="" selected="selected"></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-5"> </div>
                                        <div class="col-md-4 text-right"> 
                                            <div style="margin-top: 11px;">
                                                <label class="txtctot" style="float: left;margin-top: 5px;">Costo Total: S/.</label> <input type="text" name="txtcostotal" style="width:65px; float: right;">
                                                <!-- <label class="txtctot parpadea" id="totalw" >00.00</label> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <br>
                                        <div class="col-md-12">
                                        <div class="alert alert-defauld alert-with-icon" data-notify="container">
                                            <i class="material-icons" data-notify="icon">access_alarm</i>
                                                <span data-notify="message">Al reservar un curso usted tiene <b class="parpadea" style="color: #ff0000;">60 minutos</b> para realizar el pago, en caso contrario la reserva se cancelara.</span>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
									<button type="button" id="btnSaveReserva" class="btn btn-primary">Reservar</button>
                                    <button type="button" id="btnResetRv" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <!---->

             <!--PopUp Pago de Reserva-->
            <div class="modal fade" id="modalpagoreserva" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form id="formPagoReserva" method="POST">
                        <input type="hidden" name="txtpagoTotal" id="txtpagoTotal">
                        <input type="hidden" name="txtIdEmpresapg" value="" id="txtIdEmpresapg">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content card">
                            <div class="card-header" data-background-color="blue">
                                <h4 class="title text-bold tit-modal">Modal Titulo</h4>
                                <p>Datos del pago</p>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating" id="dnbanco">
                                            <label class="control-label">Nombre del Banco: <span class="req-ast">*</span></label>
                                            <?php $listabancos[''] = ''; ?>
                                            <?php echo form_dropdown('slistabancos', $listabancos, '', 'class="form-control" id="slistabancos"'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group label-floating" id="dcoperacion">
                                            <label class="control-label">Número de operación: <span>(Opcional)</span></label>
                                            <input type="text" class="form-control" value="" name="txtcodoperacion" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating" id="dftransac">
                                            <label class="control-label">Fecha de operación: <span class="req-ast">*</span></label>
                                            <input type="text" class="form-control" name="txtfechatrans" value="<?php echo date("d/m/Y"); ?>" id="fechatrans" data-provide="datepicker" data-date-format="dd/mm/yyyy">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="btnSavePagoReserva" class="btn btn-primary">Guardar</button>
                                <button type="button" id="btnResetPg" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        <!--PopUp generar Grupo para el curso-->
        <div class="modal fade" id="modalgenerargrupo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form id="formGenerarGrupo" method="POST">
                <input type="hidden" name="txtfcreacion" id="txtfcreacion">
                <input type="hidden" name="txtidEmpParaGrup" id="txtidEmpParaGrup">
                <input type="hidden" name="txtidReservaParaGrup" id="txtidReservaParaGrup">
                <div class="modal-dialog" role="document">
                    <div class="modal-content card">
                        <div class="card-header" data-background-color="blue">
                            <h4 class="title text-bold tit-modal">Modal Titulo</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group " id="dnombre" style="margin: 0px;">
                                        <label class="control-label">Título:<span class="req-ast">*</span></label>
                                        <input type="text" class="form-control" name="txtnombrecursopg" id="txtnombrecursopg" readonly="readonly">
                                        <input type="hidden" name="txtnombregrupo" id="txtnombregrupo">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="btnSaveGrup" class="btn btn-primary"><span id="txt-btnsg">Crear</span></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!--......-->


            <!--..................-->
            <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6">
                        <div class="radio text-center" id="dradioslc">
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <p><strong>Crear reserva para:</strong></p>
                            <input type="button" class=" btn btn-primary" id="id_radioem" value="Empresa" style="width: 168px;">
                            <input type="button" class=" btn btn-primary" id="id_radiopn" value="Persona Natural">
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            
                        </div>
                        <div class="form-group hidden" id="dslsem" style="margin-top: 0px;">
                            <label class="control-label">Empresas:</label>
                            <?php $nomempresa[''] = 'Seleccione...'; ?>
                            <?php echo form_dropdown('slempresas', $nomempresa, '', 'data-live-search="true" class="form-control selectpicker" id="idslempresa"'); ?>
                        </div>
                        <div class="form-group hidden" id="dslspn" style="margin-top: 0px;">
                            <label class="control-label">Personas Naturales:</label>
                            <?php $nompersonanatural[''] = 'Seleccione...'; ?>
                            <?php echo form_dropdown('slpersonanatural', $nompersonanatural, '', 'data-live-search="true" class="form-control selectpicker" id="idslpersnatural"'); ?>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
            </div>

            <div class="row hidden" id="dcursosyresevs">
                <div class="col-md-12">
                    <ul class="nav nav-pills nav-justified">
                      <li class="active"><a data-toggle="pill" href="#menu1">Cursos</a></li>
                      <li><a data-toggle="pill" href="#menu2">Reservas</a></li>
                      <li><a data-toggle="pill" href="#menu3">Asignar personal al curso</a></li>
                    </ul>

                    <div class="tab-content">
                        <!--Contenido Lista de Cursos-->
                        <div id="menu1" class="tab-pane fade in active">
                            <div class="card">
                                <div class="card-header" data-background-color="blue">
                                    <h4 class="title">Lista de Cursos Disponibles</h4>
                                </div>
                                <div class="card-content table-responsive">
                                <div class="row">
                                    <div class="col-md-1"> 
                                        <div class="form-group" style="margin: 0px !important;">
                                            <input type="text" name="txtdesde" id="txtdesde" class="form-control" data-provide="datepicker" data-date-format="dd/mm/yyyy" style="width: 134%;"  placeholder="Desde">
                                        </div>
                                    </div>
                                    <div class="col-md-1"> 
                                        <div class="form-group" style="margin: 0px !important;">
                                          <input type="text" name="txthasta" id="txthasta" class="form-control" data-provide="datepicker" data-date-format="dd/mm/yyyy" style="width: 134%;"  placeholder="Hasta">  
                                        </div>
                                    </div>
                                    <div class="col-md-1"> 
                                        <button type="button" id="btnFiltCurso" class="btn btn-primary btn-sm" >
                                        Filtrar</button>
                                    </div>
                                </div>
                                    <table class="table table-striped table-bordered tablafiltro">
                                        <thead class="text-primary">
                                            
                                            <th width="280px";>Título</th>
                                            <th>Inicio</th>
                                            <th class="no-sort">Duración</th>
                                            <th class="no-sort">Cupos<br>Disponibles</th>
                                            <th class="no-sort">Precio Actual</th>
                                            <th class="no-sort">Capacitador</th>
                                            <th width="255px" class="no-sort"></th>
                                        </thead>
                                        <tbody id="showdata">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                         <!--Contenido Lista de Reservas-->
                        <div id="menu2" class="tab-pane fade">
                            <div class="card">
                                <div class="card-header" data-background-color="blue">
                                    <h4 class="title">Cursos Reservados</h4>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table table-striped">
                                        <thead class="text-primary">
                                            <th>#</th>
                                            <th>Título</th>
                                            <th>Duración</th>
                                            <th>Cupos<br>Reservados</th>
                                            <th>Capacitador</th>
                                            <th>Costo</th>
                                            <th></th>
                                        </thead>
                                        <tbody id="showdatareservas">

                                        </tbody>
                                    </table>
                                    <table class="table">
                                        <tr>
                                            <td class="tabtdpago">
                                                <div class="col-md-8"></div>
                                                <div class="col-md-2 text-right"><div style="padding-top: 19px;"><b><label class="txtctot">Total:</label> <label id="lbltotalapagar" class="txtctot"></label></b></div></div>
                                                <div class="col-md-2 text-right"><button type="button" id="btnpgTotal" class="btn btn-primary">Registrar pago</button></div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                         <!--Contenido Lista de Curso Pagados por inscribir-->
                        <div id="menu3" class="tab-pane fade">
                            <div class="card">
                                <div class="card-header" data-background-color="blue">
                                    <h4 class="title">Asignar Personal al los cursos</h4>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table table-striped">
                                        <thead class="text-primary">
                                            <th>#</th>
                                            <th>Título</th>
                                            <th>Duración</th>
                                            <th>Cupos<br>Pagados</th>
                                            <th>Capacitador</th>
                                            <th></th>
                                        </thead>
                                        <tbody id="showdatacursospagados">

                                        </tbody>
                                    </table>
                                    <p style="border-top: 1px solid #e8e8e8; padding-top: 17px;" class="text-center">Los cursos puedes encontrar en la seccion <b><a href="#">Notas</a><a></a></b></p>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
