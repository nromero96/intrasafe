            <div class="content">
                <div class="container-fluid">
                    <div class="alert alert-success" hidden="hidden">
                        <div class="container-fluid">
                            <div class="alert-icon"><i class="material-icons">check</i></div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="material-icons">clear</i></span>
                            </button>
                            <b>Mensaje Alerta</b>
                        </div>
                    </div>

                    <!--PopUp Nuevo Alumno-->
                    <div class="modal fade" id="modalcapac" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form id = "formCapacitador" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="txtIdCapacitador">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content card">
                                <div class="card-header" data-background-color="blue">
                                    <h4 class="title text-bold tit-modal">Titulo Capacitador</h4>
                                    <p>Datos del capacitador</p>
                                </div>
                                <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating dvfg" id="ddni">
                                                    <label class="control-label">DNI: <span class="req-ast">*</span></label>
                                                    <input type="text" class="form-control" name="txtnumdni" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating dvfg" id="dapellidoscap">
                                                    <label class="control-label">Apellidos: <span class="req-ast">*</span></label>
                                                    <input type="text" class="form-control" name="txtapellidos">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating dvfg" id="dnombrescap">
                                                    <label class="control-label">Nombres: <span class="req-ast">*</span></label>
                                                    <input type="text" class="form-control" name="txtnombres">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating dvfg">
                                                    <label class="control-label">Teléfono:</label>
                                                    <input type="text" class="form-control" name="txttelefono">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating dvfg" id="demailcap">
                                                    <label class="control-label">Correo <span class="req-ast">*</span></label>
                                                    <input type="email" class="form-control" name="txtemail">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating dvfg">
                                                    <label class="control-label">Profesión:</label>
                                                    <input type="text" class="form-control" name="txtprofesion" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating dvfg">
                                                    <label class="control-label">Cod. CIP:</label>
                                                    <input type="text" class="form-control" name="txtcod_cip" id="txtcod_cip" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="control-label">Firma:</label>
                                                <div class="preview" id="previewimg1"></div>
                                                <div id="comboxdl"></div>
                                                <input type="file" id="filefirma " name="firmacapacitador">
                                                <small style="color: red">Tamaño firma: 300x182<br> Tipo: .png</small>
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="btnSaveCap" class="btn btn-primary"><span id="cargagif" class="hidden"><img src="<?php echo base_url(); ?>assets/img/reload.gif" style="width: 17px;"></span> Guardar</button>
                                    <button type="button" id="btnResetCap" class="btn btn-danger">Cancelar</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>

                    <!---->
                    <div class="row">
                        <div class="col-md-8"></div>
                        <div class="col-md-4 text-right">
                            <button type="button" id="btnAddCap" class="btn btn-success" data-toggle="modal">
                                <i class="material-icons">streetview</i>
                            Nuevo Capacitador
                            </button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="blue">
                                    <h4 class="title">Lista de Capacitadores</h4>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table table-striped tablafiltro">
                                        <thead class="">
                                            <th><b>DNI</b></th>
                                            <th><b>Apellidos</b></th>
                                            <th><b>Nombres</b></th>
                                            <th><b>Profesión</b></th>
                                            <th><b>Teléfono</b></th>
                                            <th><b>Correo</b></th>
                                            <th class="no-sort"><b>Acciones</b></th>
                                        </thead>
                                        <tbody id="showdatacapacitador">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="space"></div>
                </div>
            </div>
