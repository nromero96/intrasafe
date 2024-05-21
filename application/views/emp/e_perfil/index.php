<div class="content">
    <div class="container-fluid">

        <!--Empresas .....................................-->
        <div class="row hidden" id="dvfrempresa">
        <form id="formperfilemp" method="post">  
            <input type="hidden" name="txtidusersessionem">              
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card perfdiv">
                    <h4><b>Datos de la empresa:</b></h4><br>
                    <div class="row" style="margin-top: -36px;">
                        <div class="col-md-6" id="drznsocial">
                            <div class="form-group form-group-no" id="drazonsocial">
                                <label class="control-label" id="lblraznsoc">Razón Social: <span class="req-ast">*</span></label>
                                <input type="text" class="form-control ng-pristine ng-invalid ng-touched" name="txtrazonsocial" id="txtrazonsocial">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-no" id="dnruc">
                                <label class="control-label" id="lblnrucodni">N° RUC: <span class="req-ast">*</span></label>
                                <input type="text" class="form-control" name="txtruc" id="txtruc" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-no" id="ddireccion">
                                <label class="control-label">Dirección: </label>
                                <input type="text" class="form-control" name="txtdireccion">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-no" id="demailcontacto">
                                <label class="control-label" id="lblemailc">Email De Contacto:</label>
                                <input type="email" class="form-control" name="txtemailcontacto">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-no" id="dnombrecontacto">
                                <label class="control-label" id="lblncont">Nombre Del Contacto:</label>
                                <input type="text" class="form-control" name="txtnombrecontacto" id="idtxtnombrecontacto">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-no" id="dapellidocontacto">
                                <label class="control-label" id="lblacont">Apellidos Del Contacto:</label>
                                <input type="text" class="form-control" name="txtapellidoscontacto">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-no" id="dtelefono">
                                <label class="control-label">Teléfono: </label>
                                <input type="text" class="form-control" name="txttelefono">
                            </div>
                        </div>
                        <div class="col-md-6" id="dfactele">
                            <div class="form-group form-group-no" id="demailfactura">
                                <label class="control-label">Email Para Factura Electrónica:</label>
                                <input type="email" class="form-control" name="txtemailfactura">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="button" id="updateperfilem" class="btn btn-primary btn-md btn-round">Actualizar<div class="ripple-container"></div></button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-2"></div>
        </form>
        </div>


        <!-- Personas Naturales .....................................-->
        <div class="row hidden" id="dvfrpersonanatural">
        <form id="formperfilpn" method="post">  
            <input type="hidden" name="txtidusersessionpn">              
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card perfdiv">
                    <h4><b>Datos Personales:</b></h4><br>
                    <div class="row" style="margin-top: -36px;">
                        <div class="col-md-6">
                            <div class="form-group form-group-no" id="dvnumdni">
                                <label class="control-label">DNI: <span class="req-ast">*</span></label>
                                <input type="text" class="form-control" name="txtdnipn" id="txtdnipn" >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-no" id="dvnonbrespn">
                                <label class="control-label">Nombres: <span class="req-ast">*</span></label>
                                <input type="text" class="form-control" name="txtnombrespn" id="txtnombrespn">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-no" id="dvapellidos">
                                <label class="control-label">Apellidos: <span class="req-ast">*</span></label>
                                <input type="text" class="form-control" name="txtapellidospn" id="txtapellidospn">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-no" >
                                <label class="control-label">Email:</label>
                                <input type="email" class="form-control" name="txtemailpn" id="txtemailpn">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-no">
                                <label class="control-label">Teléfono: </label>
                                <input type="text" class="form-control" name="txttelefonopn" id="txttelefonopn">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-no" >
                                <label class="control-label">Empresa:</label>
                                <input type="text" class="form-control" name="txtempresapn" id="txtempresapn">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-no">
                                <label class="control-label">Cargo: </label>
                                <input type="text" class="form-control" name="txtcargopn" id="txtcargopn">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="button" id="updateperfilpn" class="btn btn-primary btn-md btn-round">Actualizar<div class="ripple-container"></div></button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-2"></div>
        </form>
        </div>

       <!--  Cambiar contraseña -->
        <div class="row">
        <form id="formupdateacceso" method="post">  
            <input type="hidden" name="txtidusersessionone">              
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card perfdiv">
                    <h4><b>Cambiar contraseña:</b></h4><br>

                    <div class="row" style="margin-top: -36px;">
                            <div class="col-md-6">
                                <div class="form-group form-group-no dvfg " id="dvnomusuario">
                                    <label class="control-label">Usuario: <span class="req-ast">*</span></label>
                                    <input type="text" class="form-control" name="txtusuario" id="txtusuario" readonly="readonly">
                                <span class="material-input"></span></div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-no dvfg" id="dvpassword">
                                    <label class="control-label">Nueva contraseña:</label>
                                    <input type="password" class="form-control" minlength="8" maxlength="20" name="txtpassword" id="txtpassword">
                                <span class="material-input"></span></div>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <div class="form-group form-group-no dvfg" id="dvpassword1">
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

        <div class="space"></div>


    </div>
</div>
