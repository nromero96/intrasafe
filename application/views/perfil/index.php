<div class="content">
    <div class="container-fluid">
        <div class="row">
        <form id="formperfil" method="post">  
            <input type="hidden" name="txtidusersession">              
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card perfdiv">
                    <h4><b>Datos del usuario:</b></h4><br>
                    <div class="row" style="margin-top: -36px;">
                        <div class="col-md-6">
                            <div class="form-group dvfg" id="dvnombre">
                                <label class="control-label">Nombres:<span class="req-ast">*</span></label>
                                <input type="text" class="form-control" name="txtnombres">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group dvfg" id="dvnomgerenapellidos">
                                <label class="control-label">Apellidos:<span class="req-ast">*</span></label>
                                <input type="text" class="form-control" name="txtapellidos">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group dvfg" id="dvemail">
                                <label class="control-label">Correo:</label>
                                <input type="email" class="form-control" name="txtcorreo">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group dvfg" id="dvtelefono">
                                <label class="control-label">Teléfono:</label>
                                <input type="text" class="form-control" name="txttelefono">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group dvfg" id="dvdireccion">
                                <label class="control-label">Dirección:</label>
                                <input type="text" class="form-control" name="txtdireccion">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="button" id="updateperfil" class="btn btn-primary btn-md btn-round">Actualizar<div class="ripple-container"></div></button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-2"></div>
        </form>
        </div>


        <div class="row">
        <form id="formupdateacceso" method="post">  
            <input type="hidden" name="txtidusersession1">              
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card perfdiv">
                    <h4><b>Cambiar contraseña:</b></h4><br>

                    <div class="row" style="margin-top: -36px;">
                            <div class="col-md-6">
                                <div class="form-group dvfg" id="dvnomusuario">
                                    <label class="control-label">Usuario: <span class="req-ast">*</span></label>
                                    <input type="text" class="form-control" name="txtusuario" id="txtusuario" readonly="readonly">
                                <span class="material-input"></span></div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group dvfg" id="dvpassword">
                                    <label class="control-label">Nueva contraseña:</label>
                                    <input type="password" class="form-control" minlength="8" maxlength="20" name="txtpassword" id="txtpassword">
                                <span class="material-input"></span></div>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <div class="form-group dvfg" id="dvpassword1">
                                    <label class="control-label">Vuelve a escribir la nueva contraseña:</label>
                                    <input type="password" class="form-control" minlength="8" maxlength="20" name="txtpassword1" id="txtpassword1"><div style="display: none;"></div>
                                <span class="material-input"></span></div>
                            </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="button" id="updateacceso" class="btn btn-primary btn-md btn-round">Actualizar<div class="ripple-container"></div></button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-2"></div>
        </form>
        </div>



    </div>
</div>
