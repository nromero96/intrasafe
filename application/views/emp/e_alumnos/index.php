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

                    <?php
                        $userempresa = $this->session->userdata('userempresa');
                        extract($userempresa);
                    ?>

                    <!--PopUp Nuevo Alumno-->
                    <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form id = "formAlumno" method="POST">
                            <input type="hidden" name="txtIdEmpresaSession" value=<?php echo $id_empresa; ?> id="txtIdEmpresaSession">
                            <input type="hidden" value="0" name="txtIdAlumno" id="txtAlumno">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content card">
                                <div class="card-header" data-background-color="blue">
                                    <h4 class="title text-bold tit-modal">Titulo Alumno</h4>
                                    <p>Datos del alumno</p>
                                </div>
                                <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Tipo de Documento: <span class="req-ast">*</span></label>
                                                    <select class="form-control" name="txttipodocumento" required >
                                                        <option value=""></option>
                                                        <option value="dni" >DNI</option>
                                                        <option value="Pasaporte">Pasaporte</option>
                                                        <option value="cex">CEX</option>
                                                        <option value="otros">Otros</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">N° Documento: <span class="req-ast">*</span></label>
                                                    <input type="text" class="form-control" name="txtnumerodocumento" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Apellidos: <span class="req-ast">*</span></label>
                                                    <input type="text" class="form-control" name="txtapellidos">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Nombres: <span class="req-ast">*</span></label>
                                                    <input type="text" class="form-control" name="txtnombres">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating" id="dateRangePicker">
                                                    <label class="control-label">Fecha de Nacimiento: <span class="req-ast">*</span></label>
                                                    <input type="text" class="form-control" id="idfnacimiento" name="txtfnacimiento" data-provide="datepicker" data-date-format="dd/mm/yyyy">
                                                </div>
                                            </div>
                                            <div class="col-md-6"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Teléfono: <span class="req-ast">*</span></label>
                                                    <input type="text" class="form-control" name="txttelefono">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Email <span class="req-ast">*</span></label>
                                                    <input type="email" class="form-control" name="txtemail">
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="btnSave" class="btn btn-primary">Guardar</button>
                                    <button type="button" id="btnReset" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>

                    <!---->
                <!--<div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-5"></div>
                            <div class="col-md-3 text-right">
                            <button type="button" id="btnAdd" class="btn btn-success" data-toggle="modal">
                                <i class="material-icons">person_add</i>
                                Nuevo Alumno
                            </button>
                            </div>
                    </div> -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="blue">
                                    <h4 class="title">Lista de Alumnos</h4>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th>#</th>
                                            <th>N° Documento</th>
                                            <th>Apellidos</th>
                                            <th>Nombres</th>
                                            <th>Teléfono</th>
                                            <th>Correo</th>
                                            <th></th>
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