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


                   <!--PopUp Registro Persona Natural-->
                    <div class="modal fade" id="modalregistropn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form id = "formPersonaNatural" method="POST">
                            <input type="hidden" name="txtidempresapn">
                        <div class="modal-dialog" role="document" style="margin-top: 10px !important;">
                            <div class="modal-content card">
                                <div class="card-header" data-background-color="blue">
                                    <h4 class="title text-bold tit-modal">Persona Natural</h4>
                                    <p id="txtdesc">Datos de la persona</p>
                                </div>
                                <div class="modal-body" style="padding-top: 5px !important;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating dvinpts" id="dvnumdni">
                                                    <label class="control-label">DNI: <span class="req-ast">*</span></label>
                                                    <input type="text" class="form-control inpted" name="txtdnipn" id="txtdnipn" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating dvinpts" id="dvnonbrespn">
                                                    <label class="control-label">Nombres: <span class="req-ast">*</span></label>
                                                    <input type="text" class="form-control inpted" name="txtnombrespn" id="txtnombrespn">
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating dvinpts" id="dvapellidos">
                                                    <label class="control-label">Apellidos: <span class="req-ast">*</span></label>
                                                    <input type="text" class="form-control inpted" name="txtapellidospn" id="txtapellidospn">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating dvinpts" >
                                                    <label class="control-label">Email:</label>
                                                    <input type="email" class="form-control inpted" name="txtemailpn" id="txtemailpn">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating dvinpts">
                                                    <label class="control-label">Teléfono: </label>
                                                    <input type="text" class="form-control inpted" name="txttelefonopn" id="txttelefonopn">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating dvinpts" >
                                                    <label class="control-label">Empresa:</label>
                                                    <input type="text" class="form-control inpted" name="txtempresapn" id="txtempresapn">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating dvinpts">
                                                    <label class="control-label">Cargo: </label>
                                                    <input type="text" class="form-control inpted" name="txtcargopn" id="txtcargopn">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row card" style="margin-top: 10px !important;">
                                            <div class="col-md-12">
                                                <h4 class="info-text">Datos importantes para el ingreso</h4>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating dvinpts" id="dvnomusuariopn">
                                                    <label class="control-label">Usuario: <span class="req-ast">*</span></label>
                                                    <input type="text" class="form-control inpted" name="txtusuariopn" id="txtusuariopn">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating dvinpts" id="dvpasswordpn">
                                                    <label class="control-label">Contraseña:</label>
                                                    <input type="password" class="form-control inpted" minlength="8" maxlength="20" name="txtpasswordpn" id="txtpasswordpn">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="checkbox">
                                                    <label>
                                                         <input type="hidden" value="0" name="txttermspn" />
                                                         <input type="checkbox" value="1" name="txttermspn" id="txttermspn" />
                                                         Acepto, <a href="#">Terminos y Condiciones</a>
                                                    </label>
                                              </div>
                                            </div>
                                        </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" id="btnSavepn" class="btn btn-primary">Guardar</button>
                                    <button type="button" id="btnResetpn" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
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
                                    <button type="button" id="btnSenMailPn" class="btn btn-primary" ><span id="cargagif" class="hidden"><img src="<?php echo base_url(); ?>assets/img/reload.gif" style="width: 17px;"></span> Enviar</button>
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

                                        <button type="button" id="btnSndmPn" data-target="#mymodalcoore" class="btn btn-info btn-email">
                                        <i class="material-icons">email</i>
                                        ENVIAR POR CORREO
                                    </button>

                                </div>
                            </div>

                            <div class="col-md-3"></div>

                            <div class="col-md-3 text-right">
                                    <a target="_blank" href="<?php echo base_url();?>PdfsController/getAllPersonasNaturales?tpReg=PN" id="btnPListE" class="btn btn-warning" data-toggle="modal">
                                        <i class="material-icons md-36">print</i>
                                        Imprimir
                                    </a>
                            </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="blue">
                                    <h4 class="title">Lista de Personas Naturales</h4>
                                </div>
                                <div class="card-content table-striped table-responsive">
                                    <table class="table tablafiltro">
                                        <thead class="">
                                            <th><b>N° Documento</b></th>
                                            <th><b>Nombres</b></th>
                                            <th><b>Apellidos</b></th>
                                            <th><b>Teléfono</b></th>
                                            <th><b>Correo</b></th>
                                            <th class="no-sort"><b>Acciones</b></th>
                                        </thead>
                                        <tbody id="showdatapn">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="space"></div>
                </div>
            </div>
