<div class="content">
    <div class="container-fluid">
        <?php
$userempresa = $this->session->userdata('userempresa');
extract($userempresa);
?>
        <div class="alert alert-success" hidden="hidden">
            <div class="container-fluid">
                <div class="alert-icon">
                    <i class="material-icons">check</i>
                </div>
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
                                    <span class="titinfo">Curso:</span><br>
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
                <input type="hidden" name="txtIdEmpresa" value=<?php echo $id_empresa; ?> id="">
                <div class="modal-dialog" role="document">
                    <div class="modal-content card">
                        <div class="card-header" data-background-color="blue">
                            <h4 class="title text-bold tit-modal">Modal Titulo</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row mgbottom">
                                <div class="col-md-8">
                                    <span class="titinfo">Título:</span><br>
                                    <label id="lblnombre1"></label>
                                </div>
                                <div class="col-md-4">
                                    <span class="titinfo">Fecha de Inicio:</span><br>
                                    <label id="lblfchinicio"></label>
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
                            <!-- <div class="row mgbottom">
                                <div class="col-md-12">
                                    <span class="titinfo">Capacitador:</span><br>
                                    <label id="lblcapacitador1"></label>
                                </div>
                            </div> -->
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group form-group-no" id="dslscupos">
                                        <label class="control-label">Cupos a reservar</label>
                                        <select id="selectId" name="slsncupos" class="form-control" onchange="operaciontotal()">
                                            <option value="" selected="selected" disabled="disabled"></option>
                                        </select>
                                        <input type="hidden" name="txtcostotal">
                                    </div>
                                </div>
                                <div class="col-md-5"> </div>
                                <div class="col-md-4 text-right">
                                    <div style="margin-top: 11px;">
                                        <label class="txtctot">Costo Total: S/.</label><label class="txtctot parpadea" id="totalw" >00.00</label>
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
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <p>Abono a nombre de <b>SAFE SCAFFOLDING INDUSTRY S.A.C. (RUC: 20535638137)</b> en:</p>
                                        <table class="table table-bordered" style="font-size: 12px;">
                                            <tr>
                                                <td class="tdbncs"></td>
                                                <td class="tdbncs">Cuenta Corriente BCP</td>
                                                <td class="tdbncs">Cuenta Corriente BBVA</td>
                                                <td class="tdbncs">Cuenta Detracciones BN</td>
                                            </tr>
                                            <tr>
                                                <td class="tdbncs">Nuevos Soles:</td>
                                                <td>194-1885076-0-70</td>
                                                <td>0011-0518-01-00004980</td>
                                                <td>00-003-028712*</td>
                                            </tr>
                                            <tr>
                                                <td class="tdbncs">Dólares:</td>
                                                <td>194-1907887-1-94</td>
                                                <td>0011-0518-01-00008331</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="tdbncs">CCI Soles:</td>
                                                <td>00219400188507607095</td>
                                                <td>011-518-000100004980-87</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="tdbncs">CCI Dólares:</td>
                                                <td>00219400190788719494</td>
                                                <td>011-518-000100008331-89</td>
                                                <td></td>
                                            </tr>
                                        </table>
                                        <p>*Los montos mayores a <b>S/.700</b> están afectos a detracción</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="btnSaveReserva" class="btn btn-primary">Guardar</button>
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
                <input type="hidden" name="iddelaemrpesa" value=<?php echo $id_empresa; ?> id="">
                <input type="hidden" name="txtpagoTotal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content card">
                        <div class="card-header" data-background-color="blue">
                            <h4 class="title text-bold tit-modal">Modal Titulo</h4>
                            <p>Datos del pago</p>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating" id="dnombanco">
                                        <label class="control-label">Nombre del Banco: <span class="req-ast">*</span></label>
                                            <?php $listabancos[''] = '';?>
                                            <?php echo form_dropdown('slistabancos', $listabancos, '', 'class="form-control" id="slistabancos"'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group label-floating" id="dcoperacion">
                                        <label class="control-label">Número de operación: <span class="req-ast">*</span></label>
                                        <input type="text" class="form-control" name="txtcodoperacion" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating" id="dftransac">
                                        <label class="control-label">Fecha de operación: <span class="req-ast">*</span></label>
                                        <input type="text" class="form-control" name="txtfechatrans" id="fechatrans" value="<?php echo date("d/m/Y"); ?>" data-provide="datepicker" data-date-format="dd/mm/yyyy">
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
        <!--..................-->

        <!--PopUp generar Grupo para el curso-->
        <div class="modal fade" id="modalgenerargrupo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form id="formGenerarGrupo" method="POST">
                <input type="hidden" name="txtfcreacion" id="txtfcreacion">
                <input type="hidden" name="txtidEmp" value=<?php echo $id_empresa; ?> id="txtidEmp">
                <input type="hidden" name="txtidReserva" id="txtidReserva">
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
                                        <input type="text" class="form-control" name="txtnombrecurso" id="txtnombrecurso" disabled="disabled">
                                        <input type="hidden" name="txtnombregrupo" id="txtnombregrupo">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="btnSaveGrup" class="btn btn-primary">Crear</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!--......-->

        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills nav-justified">
                    <li class="active"><a data-toggle="pill" href="#menu1">Cursos</a></li>
                    <li><a data-toggle="pill" href="#menu2">Reservas (<?php echo $countallreserva; ?>)</a></li>
                    <li><a data-toggle="pill" href="#menu3">Asignar personal al curso</a></li>
                </ul>
                <div class="tab-content">
                    <!--Contenido Lista de Cursos-->
                    <div id="menu1" class="tab-pane fade in active">
                        <div class="card">
                            <div class="card-header" data-background-color="blue">
                                    <h4 class="title">
                                        <span>Lista de Cursos Disponibles</span>
                                        <span style="float: right;">
                                            <a href="/calendario" target="_blank" rel="tooltip" title="Ver calendario">
                                                <span>Calendario de Cursos</span>
                                                <img src="https://intranet.safesi.com/assets/img/cl-icon.png" style="width: 37px;">
                                            </a>
                                        </span>
                                    </h4>

                                    
                            </div>
                            <div class="card-content table-responsive">
                                <div class="row">
                                    <div class="col-md-1">
                                        <div class="form-group" style="margin: 0px !important;">
                                            <input type="text" name="txtdesde" id="txtdesde" class="form-control" data-provide="datepicker" data-date-format="dd/mm/yyyy" style="width: 134%;" placeholder="Desde">
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
                                    <div class="col-md-1"></div>
                                    <div class="col-md-2">
                                        <div class="form-group" style="margin-top: 0px">
                                            <?php $nomcursos['Todo'] = 'Todo';?>
                                            <?php echo form_dropdown('slccurso', $nomcursos, '', 'class="form-control" id="idslecurso"'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5">
                                        <p>Los <b>precios</b> varian de acuerdo a la fecha de inicio, para ver el detalle haz clic en el icono <img src="<?php echo base_url();?>assets/img/btn-view.png" style="width: 21px;" >.</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="text-primary">
                                                    <th class="no-sort">#</th>
                                                    <th width="270px" class="no-sort">Título</th>
                                                    <th>Inicio</th>
                                                    <th >Duración</th>
                                                    <th >Cupos<br>Disponibles</th>
                                                    <th >Precio Actual</th>
                                                    <th width="138px"></th>
                                                </thead>
                                                <tbody id="showdata">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Contenido Lista de Reservas-->
                    <div id="menu2" class="tab-pane fade">
                        <div class="card">
                            <div class="card-header" data-background-color="blue">
                                <h4 class="title">Cursos Reservados</h4>
                            </div>
                            <div class="card-content">
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead class="text-primary">
                                                    <th>#</th>
                                                    <th>Título</th>
                                                    <th>Duración</th>
                                                    <th>Cupos Reservados</th>
                                                    <th>Costo</th>
                                                    <th></th>
                                                </thead>
                                                <tbody id="showdatareservas">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <td class="tabtdpago">
                                                        <div class="col-md-8"></div>
                                                        <div class="col-md-2 text-right">
                                                            <div style="padding-top: 19px;">
                                                                <b>
                                                                    <label class="txtctot">Total:</label>
                                                                    <label id="lbltotalapagar" class="txtctot"></label>
                                                                </b>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 text-right">
                                                            <button type="button" id="btnpgTotal" class="btn btn-primary">Registrar pago</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Contenido Lista cursos pagados-->
                    <div id="menu3" class="tab-pane fade">
                        <div class="card">
                            <div class="card-header" data-background-color="blue">
                                <h4 class="title">Asignar Personal al los cursos</h4>
                            </div>
                            <div class="card-content">
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead class="text-primary">
                                                    <th>#</th>
                                                    <th>Título</th>
                                                    <th>Duración</th>
                                                    <th>Cupos Pagados</th>
                                                    <th></th>
                                                </thead>
                                                <tbody id="showdatapagados">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <p style="border-top: 1px solid #e8e8e8; padding-top: 17px;" class="text-center">Los cursos puedes encontrar en la seccion <b><a href="<?=base_url()?>emp/e_grupos">Grupos<a></b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>