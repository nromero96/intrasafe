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


                    <!--PopUp Registro Nuevo para Empresa-->
                    <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form id = "formEmpresa" method="POST">
                            <input type="hidden" value="0" name="txtIdEmpresa" id="txtEmpresa">
                        <div class="modal-dialog modaltop10" role="document">
                            <div class="modal-content card">
                                <div class="card-header" data-background-color="blue">
                                    <h4 class="title text-bold tit-modal">Titulo Modal</h4>
                                    <p>Datos de la empresa</p>
                                </div>
                                <div class="modal-body" style="padding-top: 0px !important;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating form-group-no" id="drazonsocial">
                                                    <label class="control-label">Razón Social: <span class="req-ast">*</span></label>
                                                    <input type="text" class="form-control inpted" name="txtrazonsocial">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating form-group-no" id="dnruc">
                                                    <label class="control-label">N° RUC: <span class="req-ast">*</span></label>
                                                    <input type="text" class="form-control inpted" name="txtruc">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating form-group-no" id="ddireccion">
                                                    <label class="control-label">Dirección: <span class="req-ast">*</span></label>
                                                    <input type="text" class="form-control inpted" name="txtdireccion">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating form-group-no" id="demailcontacto">
                                                    <label class="control-label">Email De Contacto: </label>
                                                    <input type="email" class="form-control inpted" name="txtemailcontacto">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating form-group-no" id="dnombrecontacto">
                                                    <label class="control-label">Nombre Del Contacto: </label>
                                                    <input type="text" class="form-control inpted" name="txtnombrecontacto">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating form-group-no" id="dapellidocontacto">
                                                    <label class="control-label">Apellidos Del Contacto: </label>
                                                    <input type="text" class="form-control inpted" name="txtapellidoscontacto">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating form-group-no" id="dtelefono">
                                                    <label class="control-label">Teléfono: </label>
                                                    <input type="text" class="form-control inpted" name="txttelefono">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating form-group-no" id="demailfactura">
                                                    <label class="control-label">Email Para Factura Electrónica:</label>
                                                    <input type="email" class="form-control inpted" name="txtemailfactura">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row card">
                                            <div class="col-md-12">
                                                <h4 class="info-text">Datos importantes para el ingreso</h4>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating form-group-no" id="dnombreusuario">
                                                    <label class="control-label">Usuario: <span class="req-ast">*</span></label>
                                                    <input type="text" class="form-control inpted" id="txtnombreusuario" name="txtnombreusuario">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating form-group-no" id="dpassword">
                                                    <label class="control-label">Contraseña:</label>
                                                    <input type="password" class="form-control inpted" name="txtpassword">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <img id="logoemp" src="" class="img-responsive">
                                                <input type="file" name="logo_emp" id="logo_emp">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="checkbox">
                                                    <label>
                                                         <input type="hidden" value="0" name="txtterms" />
                                                         <input type="checkbox" value="1" name="txtterms" id="txtterms" />
                                                         Acepto, <a href="#">Terminos y Condiciones</a>
                                                    </label>
                                              </div>
                                            </div>
                                        </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="btnSave" class="btn btn-primary">Guardar</button>
                                    <button type="button" id="btnReset" class="btn btn-danger" data-dismiss="modal"><span id="resetText"></span></button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <!---->

                    <!--PopUp Enviar Correo-->
                    <div class="modal fade" id="modalsendcoreo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form id = "formSendUrl" method="POST">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content card">
                                <div class="card-header" data-background-color="blue">
                                    <h4 class="title text-bold">Enviar enla por correo</h4>
                                </div>
                                <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating" id="dcrdestino">
                                                    <label class="control-label">Correo electrónico <span class="req-ast">*</span></label>
                                                    <input type="email" class="form-control" name="txtemaildestino">
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="btnSenMail" class="btn btn-primary" ><span id="cargagif" class="hidden"><img src="<?php echo base_url(); ?>assets/img/reload.gif" style="width: 17px;"></span> Enviar</button>
                                    <button type="button" id="btnResetmail" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <!---->

                    <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-copy js-tooltip js-copy" data-toggle="tooltip" data-placement="bottom" data-copy="http://intranet.safesi.com/empresas_registro_online" title="Copiar enlace de registro">
                                    <i class="material-icons">content_copy</i>
                                    </button>
                                </div>
                                <div class="btn-group">
                                    <a type="button" href="<?=base_url()?>empresas_registro_online" target='_blank' class="btn js-tooltip btn-primary" data-toggle="tooltip" data-placement="bottom" title="Abrir en otra ventana">
                                    <i class="material-icons">open_in_new</i>
                                    </a>
                                </div>
                                <div class="btn-group">

                                        <button type="button" id="btnSndm" data-target="#mymodalcoore" class="btn btn-info btn-email">
                                        <i class="material-icons">email</i>
                                        ENVIAR POR CORREO
                                    </button>

                                </div>
                            </div>

                            <div class="col-md-3"></div>

                            <div class="col-md-3 text-right">
                                    <a target="_blank" href="<?php echo base_url();?>PdfsController/getAllEmpresa?tpReg=EM" id="btnPListE" class="btn btn-warning" data-toggle="modal">
                                        <i class="material-icons md-36">print</i>
                                        Imprimir
                                    </a>
                            </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="blue">
                                    <h4 class="title">Lista de Empresas</h4>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table table-striped tablafiltro">
                                        <thead class="">
                                            <th><b>ID</b></th>
                                            <th class="no-sort">-</th>
                                            <th><b>Razón Social</b></th>
                                            <th><b>N° RUC</b></th>
                                            <th><b>Dirección</b></th>
                                            <th><b>Teléfono</b></th>
                                            <th><b>Correo</b></th>
                                            <th class="no-sort" style="width: 66px;"></th>
                                        </thead>
                                        <tbody id="showdata">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="space"></div>
                </div>
            </div>