<div class="content">

                <div class="container-fluid">



                <div class="alert alert-success" hidden="hidden">

                    <div class="container-fluid">

                    <div class="alert-icon"><i class="material-icons">check</i></div>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="material-icons">clear</i></span></button>

                        <b>Mensaje Alerta</b>

                    </div>

                </div>



                    <!--PopUp Registro Nueva cuenta Bancaria-->

                    <div class="modal fade" id="modalnuevacuenta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                        <form id="formCuentaBanco" method="POST">

                            <input type="hidden" name="txtidbanco">

                        <div class="modal-dialog" role="document">

                            <div class="modal-content card">

                                <div class="card-header" data-background-color="blue">

                                    <h4 class="title text-bold tit-modal">Modal Titulo</h4>

                                    <p>Datos de la cuenta</p>

                                </div>

                                <div class="modal-body">

                                        <div class="row">

                                            <div class="col-md-12">

                                                <div class="form-group label-floating form-group-no" id="dnombrebanco">

                                                    <label class="control-label">Nombre del Banco<span class="req-ast">*</span></label>

                                                    <input type="text" class="form-control" name="txtnombrebanco">

                                                </div>

                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-12">

                                                <div class="form-group label-floating" id="dnombretitular">

                                                    <label class="control-label">Titular <span class="req-ast">*</span></label>

                                                    <input type="text" class="form-control" name="txtnombredeltitular">

                                                </div>

                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-12">

                                                <div class="form-group label-floating" id="dnumcuenta">

                                                    <label class="control-label">Numero de la cuenta <span class="req-ast">*</span></label>

                                                    <input type="text" class="form-control" name="txtnumerodelacuenta">

                                                </div>

                                            </div>

                                        </div>

                                </div>

                                <div class="modal-footer">

                                    <button type="button" id="btnSaveCuenBanc" class="btn btn-primary">Guardar</button>

                                    <button type="button" id="btnResetCB" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

                                </div>

                            </div>

                        </div>

                        </form>

                    </div>

                    <!--......-->



                    <div class="row">

                            <div class="col-md-4"></div>



                            <div class="col-md-4"></div>



                            <div class="col-md-3 text-right">

                                    <button type="button" id="btnAddcuenta" class="btn btn-success">

                                        <i class="material-icons">add_box</i>

                                        Nueva Cuenta

                                    </button>

                            </div>

                            <div class="col-md-1" ></div>

                    </div>





                    <div class="row">

                        <div class="col-md-1" ></div>

                        <div class="col-md-10">

                            <div class="card">

                                <div class="card-header" data-background-color="blue">

                                    <h4 class="title">Lista de Cuentas</h4>

                                </div>

                                <div class="card-content table-responsive">

                                    <table class="table table-striped AllDataTables">

                                        <thead class="">

                                            <th><b>N°</b></th>

                                            <th><b>Nombre del Banco</b></th>

                                            <th><b>Titular</b></th>

                                            <th><b>N° de Cuenta</b></th>

                                            <th></th>

                                        </thead>

                                        <tbody id="showdatabancos">

                                            

                                        </tbody>

                                    </table>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-1" ></div>

                    </div>

                </div>

            </div>