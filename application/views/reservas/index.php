<div class="content">
    <div class="container-fluid">

            <div class="alert alert-success" hidden="hidden">
                <div class="container-fluid">
                <div class="alert-icon"><i class="material-icons">check</i></div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="material-icons">clear</i></span></button>
                    <b>Mensaje Alerta</b>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="form-group" style="margin: 0px;">
                        <select class="form-control" id="tipocliente">
                            <option value="" disabled selected>Seleccione...</option>
                            <option value="EM">Empresas</option>
                            <option value="PN">Personas Naturales</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills nav-justified">
                      <li class="active"><a data-toggle="pill" href="#menu1">Reservas pendientes de pago</a></li>
                      <li><a data-toggle="pill" href="#menu2">Validación de pagos</a></li> <!-- <?php echo $countallreserva; ?> -->
                      <li><a data-toggle="pill" href="#menu3">Cursos pagados</a></li>
                    </ul>
                    <div class="tab-content">

                        <!--Contenido Lista de Cursos-->
                        <div id="menu1" class="tab-pane fade in active">
                            <div class="card cardmrgn">
                                <div class="card-content table-responsive">
                                    <table class="table table-striped">
                                        <label class="avisolistares">Seleccione una opcion para ver la lista</label>
                                        <thead class="hidden" id="hdlistrsEm" >
                                            <th><b>#</b></th>
                                            <th><b>RUC</b></th>
                                            <th><b>Razón Social</b></th>
                                            <th><b>Título</b></th>
                                            <th><b>cupos</b></th>
                                            <th><b>Costo Total</b></th>
                                            <th></th>
                                        </thead>
                                        <thead class="hidden" id="hdlistrsPn" >
                                            <th><b>#</th>
                                            <th><b>N° Documento</b></th>
                                            <th><b>Nombres</b></th>
                                            <th><b>Título</b></th>
                                            <th><b>Cupos</b></th>
                                            <th><b>Costo Total</b></th>
                                            <th></th>
                                        </thead>
                                        <tbody id="showlistreservas">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                         <!--Contenido Lista de Pagos por aprobar-->
                        <div id="menu2" class="tab-pane fade">
                            <div class="card cardmrgn">
                                <div class="card-content table-responsive">
                                    <table class="table table-striped">
                                        <label class="avisolistares">Seleccione una opcion para ver la lista</label>
                                        <thead class="hidden" id="hdlistrspgnovEm" >
                                            <th><b>#</b></th>
                                            <th><b>RUC</b></th>
                                            <th><b>Razón Social</b></th>
                                            <th><b>Fecha</b></th>
                                            <th><b>Total</b></th>
                                            <th></th>
                                        </thead>
                                        <thead class="hidden" id="hdlistrspgnovPn" >
                                            <th><b>#</b></th>
                                            <th><b>N° Documento</b></th>
                                            <th><b>Nombres</b></th>
                                            <th><b>Fecha</b></th>
                                            <th><b>Total</b></th>
                                            <th></th>
                                        </thead>
                                        <tbody id="showreserpagpendaprob">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                         <!--Contenido Lista cursos pagados-->

                        <div id="menu3" class="tab-pane fade">
                            <div class="card cardmrgn">
                                <div class="card-content table-responsive">
                                    <table class="table table-striped">
                                        <label class="avisolistares">Seleccione una opcion para ver la lista</label>
                                        <thead class="hidden" id="hdlistrspgvEm" >
                                            <th><b>#</b></th>
                                            <th><b>RUC</b></th>
                                            <th><b>Razón Social</b></th>
                                            <th><b>Título</b></th>
                                            <th><b>cupos</b></th>
                                            <th><b>Costo Total</b></th>
                                            <th></th>
                                        </thead>
                                        <thead class="hidden" id="hdlistrspgvPn" >
                                            <th><b>#</b></th>
                                            <th><b>N° Documento</b></th>
                                            <th><b>Nombres</b></th>
                                            <th><b>Título</b></th>
                                            <th><b>Cupos</b></th>
                                            <th><b>Costo Total</b></th>
                                            <th></th>
                                        </thead>
                                        <tbody id="showreserpagoaprobado">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Popups................................................................................................-->

            <!--PopUp Verificacion Pago de la Reserva-->
            <div class="modal fade bootbox-prompt in" id="modalverpagoreserva" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form id="formVPagoReserva" method="POST">
                        <input type="hidden" name="txtidreserva">
                        <input type="hidden" name="txtidpago">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content card">
                            <div class="card-header" data-background-color="blue">
                                <h4 class="title text-bold tit-modal">Modal Titulo</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <span class="titinfo">Nombre del Banco:</span><br>
                                        <label id="lblnombanco"></label>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="titinfo">Total:</span><br>
                                        <label id="lblcantidadep"></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <span class="titinfo">Número de operación:</span><br>
                                        <label id="lblcodoperacion"></label>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="titinfo">Fecha de operación:</span><br>
                                        <label id="lblfechaperacion"></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="titinfo">Cursos:</span><br>
                                        <table class="table table-bordered">
                                            <thead class="">
                                                <th><b>Título</b></th>
                                                <th><b>Cupos</b></th>
                                                <th><b>Costo</b></th>
                                            </thead>
                                            <tbody id="showlisrespag">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row bxhorario">
                                    <div class="col-md-12" style="background: #fbfbfb;">
                                        <div class="radio" style="background: #ececec;margin: 0px -15px; padding: 8px 0px;">
                                            <label>
                                                <input name="reservapagoverif" type="radio" value="2"><span class="circle"></span><span class="check"></span><span class="circle"></span><span class="check"></span> Aprobado
                                            </label>
                                            <label>
                                                <input name="reservapagoverif" type="radio" value="0"><span class="circle"></span><span class="check"></span><span class="circle"></span><span class="check"></span> Rechazado
                                            </label>
                                        </div>
                                    <div class="form-group" style="margin: 0px !important;">
                                        <label class="control-label">Mensaje</label>
                                        <textarea class="form-control" rows="4" name="mensajepago" placeholder="..."></textarea>
                                        <span class="material-input"></span>
                                    <span class="material-input"></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="btnConfirmPago" class="btn btn-primary">Guardar</button>
                                <button type="button" id="btnResetPg" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!--..................-->

            <!--PopUp Descuento de Empresa-->
            <div class="modal fade bootbox-prompt in" id="modalverreservaEM" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form id="formDescuentoResvEM" method="POST">
                        <input type="hidden" name="txtidreservaparadescEM">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content card">
                            <div class="card-header" data-background-color="blue">
                                <h4 class="title text-bold">Detalle de la Reserva</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="titinfo">Razón Social:</span><br>
                                        <label id="lblrazonsocial"></label>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="titinfo">RUC:</span><br>
                                        <label id="lblnumruc"></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="titinfo">Título:</span><br>
                                        <label id="lblcurso"></label>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="titinfo">Cupos Reservados:</span><br>
                                        <label id="lblncupos"></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="titinfo">Precio Actual:</span><br>
                                        <label id="lblpreciototal"></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-sm-3">
                                        <span class="titinfo">Precio Nuevo:</span><span class="req-ast">*</span><br>
                                        <span class="simsols">S/</span><span><input type="text" class="frmtxtprecio" name="txtprecionuevoem"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="btnSaveDEM" class="btn btn-primary" data-dismiss="modal">Guardar</button>
                                <button type="button" id="btnResetDEM" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!--..................-->

            <!--PopUp Descuento de Persona Natural-->
            <div class="modal fade bootbox-prompt in" id="modalverreservaPN" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form id="formDescuentoResvPN" method="POST">
                        <input type="hidden" name="txtidreservaparadescPN">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content card">
                            <div class="card-header" data-background-color="blue">
                                <h4 class="title text-bold">Detalle de la Reserva</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="titinfo">Nombres:</span><br>
                                        <label id="lblnombrepn"></label>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="titinfo">DNI:</span><br>
                                        <label id="lblnumdnipn"></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="titinfo">Título:</span><br>
                                        <label id="lblcursopn"></label>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="titinfo">Cupos Reservados:</span><br>
                                        <label id="lblncupospn"></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="titinfo">Precio Actual:</span><br>
                                        <label id="lblpreciototalpn"></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-sm-3">
                                        <span class="titinfo">Precio Nuevo:</span><span class="req-ast">*</span><br>
                                        <span class="simsols">S/</span><span><input type="text" class="frmtxtprecio" name="txtprecionuevopn"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="btnSaveDPN" class="btn btn-primary" data-dismiss="modal">Guardar</button>
                                <button type="button" id="btnResetDPN" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!--..................-->

            <!--PopUp Ver Detalle del Pago Confirmado Empresa-->
            <div class="modal fade bootbox-prompt in" id="modalverreservapagoconfirmadoem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content card">
                            <div class="card-header" data-background-color="blue">
                                <h4 class="title text-bold">Detalle</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="titinfo">RUC:</span><br>
                                        <label id="lblnumrucpgdem"></label>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="titinfo">Razón Social</span><br>
                                        <label id="lblrazonsocialpgdem"></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="titinfo">Título:</span><br>
                                        <label id="lblcursopgdem"></label>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="titinfo">Cupos Pagados:</span><br>
                                        <label id="lblncupopgdem"></label>
                                    </div>
                                </div>
                                <div class="row bxhorario">
                                    <div class="col-md-6">
                                        <span class="titinfo">Nombre del Banco:</span><br>
                                        <label id="lblnombrebancpgdem"></label>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="titinfo">Pago Total:</span><br>
                                        <label id="lblpagototalpgdem"></label>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="titinfo">Código Operación:</span><br>
                                        <label id="lblcodoperacionpgdem"></label>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="titinfo">Fecha de transacción:</span><br>
                                        <label id="lblfechatranspgdem"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="btnResetpgdem" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
            </div>
            <!--..................-->

            <!--PopUp Ver Detalle del Pago Confirmado Empresa-->
            <div class="modal fade bootbox-prompt in" id="modalverreservapagoconfirmadopn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content card">
                            <div class="card-header" data-background-color="blue">
                                <h4 class="title text-bold">Detalle</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="titinfo">DNI:</span><br>
                                        <label id="lblnumrucpgdpn"></label>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="titinfo">Nombre</span><br>
                                        <label id="lblrazonsocialpgdpn"></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="titinfo">Título:</span><br>
                                        <label id="lblcursopgdpn"></label>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="titinfo">Cupos Pagados:</span><br>
                                        <label id="lblncupopgdpn"></label>
                                    </div>
                                </div>
                                <div class="row bxhorario">
                                    <div class="col-md-6">
                                        <span class="titinfo">Nombre del Banco:</span><br>
                                        <label id="lblnombrebancpgdpn"></label>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="titinfo">Pago Total:</span><br>
                                        <label id="lblpagototalpgdpn"></label>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="titinfo">Código Operación:</span><br>
                                        <label id="lblcodoperacionpgdpn"></label>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="titinfo">Fecha de transacción:</span><br>
                                        <label id="lblfechatranspgdpn"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="btnResetpgdpn" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
            </div>
            <!--..................-->
            <div class="space"><br><br><br></div>
        </div>
    </div>