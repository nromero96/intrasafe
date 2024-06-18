<div class="content">
    <div class="container-fluid">

    	<!-- Datos del gerente -->
	    <div class="row">
	    	<div class="col-md-6">
	    	    <!-- <div class="panel panel-default">
	      			<div class="panel-heading"><b>Fondo del certificado:</b></div>
	      			<div class="panel-body">
	          			<form id="formbgcertificado">
	            			<fieldset class="scheduler-border">
					               <div class="row">
					                   <div class="col-md-12">
					                           <label class="control-label">Fondo actual:</label>
					                           <div class="previewbgcertif" id="previewcertif1"></div><br><br>
					                           <input type="file" name="file_bg_cerficado" id="file-bg-cerficado">
					                   </div>
					               </div>
					               <div class="row">
					                   <div class="col-md-12 text-right">
					                           <button type="button" id="savebgcertificado" class="btn btn-primary btn-md">Actualizar</button>
					                   </div>
					               </div>
	            			</fieldset>
	        			</form>
	      			</div>
	    		</div> -->

				<div class="panel panel-default">
	      			<div class="panel-heading"><b>Fondos para certificados:</b></div>
					<div class="panel-body">
					 	<div class="table-responsive">
							<table class="table table-striped">
								<tr>
									<th>Nombre</th>
									<th>Imágen</th>
									<th>Estado</th>
									<th></th>
								</tr>
								<tbody id="showlistamodelcertif">
								
								</tbody>
							</table>
						</div>
						<button type="button" id="addModeloCertificado" class="btn btn-primary btn-round btn-fab btn-fab-mini" style="float: right;">
                            <i class="material-icons">add</i>
                            <div class="ripple-container"></div>
                        </button>
					</div>
				</div>

	    	</div>
	        <div class="col-md-6">
	            <div class="panel panel-default">
	      			<div class="panel-heading"><b>Firma Gerentes:</b></div>
	      			<div class="panel-body">
	      			    <div class="table-responsive">
	      			        <table class="table table-striped">
	    		                <tr>
	    		                    <th>Firma</th>
	    		                    <th>Nombre y Apellido</th>
	    		                    <th>Cargo</th>
	    		                    <th></th>
	    		                </tr>
	    		                <tbody id="showlistafirmas">
	    		                        
	    		                </tbody>
	    		                
	    		            </table>
	    		        </div>
	    		        <button type="button" id="addFirmaGerente" class="btn btn-primary btn-round btn-fab btn-fab-mini" style="float: right;">
                            <i class="material-icons">add</i>
                            <div class="ripple-container"></div>
                        </button>
	      			    
	      			</div>
	    		</div>
	        </div>
	    </div>

		<!--PopUp Agregar/Actualizar Modelo certificado-->
        <div class="modal fade" id="mymodalCertfificado" tabindex="-1" role="dialog" aria-labelledby="certificadoModalLabel" aria-hidden="true">
            <form id="formdatacertificado" method="POST">
                    <input type="hidden" value="0" name="txtidmdcertificado" id="txtidmdcertificado">
                    <div class="modal-dialog" style="margin-top: 17px !important;" role="document">
                        <div class="modal-content card">
                            <div class="card-header" data-background-color="blue">
                                <h4 class="title text-bold tit-modal">Modal Titulo</h4>
                                <p>Información del certificado</p>
                            </div>
                            <div class="modal-body">
                                <div class="row">
					                   <div class="col-md-12">
					                       <div class="form-group label-floating form-group-no dvfg" id="dvnomgeren">
					                           <label class="control-label">Nombre:<span class="req-ast">*</span></label>
					                           <input type="text" class="form-control" name="nombrecertificado" id="nombrecertificado" required>
					                       </div>
					                   </div>
					               </div>
					               <div class="row">
					                   <div class="col-md-12">
					                        <label class="control-label">Imágen 1:</label>
					                        <div class="preview" id="previewcertimg1"></div>
					                        <input type="file" name="bg_imagen_first" id="bg_imagen_first">
					                       	<small style="color: red">Tamaño: 1997x1412 | Tipo: .jpg</small>
					                   </div>
					               </div>
								   <div class="row">
					                   <div class="col-md-12">
					                        <label class="control-label">Imágen 2:</label>
					                        <div class="preview" id="previewcertimg2"></div>
					                        <input type="file" name="bg_imagen_second" id="bg_imagen_second">
					                       	<small style="color: red">Tamaño: 1997x1412 | Tipo: .jpg</small>
					                   </div>
					               </div>
								   <div class="row">
					                   	<div class="col-md-6">
										   <div class="form-group label-floating form-group-no"">
												<label class="control-label">Estado:</label>
												<select class="form-control" name="estadocertificado" id="estadocertificado" data-style="select-with-transition" title="Estado" data-size="7" required>
													<option value="activo">Activo</option>
													<option value="inactivo">Inactivo</option>
												</select>
											</div>
					                 	</div>
								   </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" id="savemodelocertificado" class="btn btn-primary">Guardar</button>
                                <button type="button" id="btnReset" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            </div>
                            </div>
                        </div>
            </form>
        </div>
        <!--......-->

	    <!--PopUp Agregar/Actualizar Gerente-->
        <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form id="formdatagerente" method="POST">
                    <input type="hidden" value="0" name="txtidfmgerente" id="txtidfmgerente">
                    <div class="modal-dialog" style="margin-top: 17px !important;" role="document">
                        <div class="modal-content card">
                            <div class="card-header" data-background-color="blue">
                                <h4 class="title text-bold tit-modal">Modal Titulo</h4>
                                <p>Datos</p>
                            </div>
                            <div class="modal-body">
                                <div class="row">
					                   <div class="col-md-6">
					                       <div class="form-group label-floating form-group-no dvfg" id="dvnomgeren">
					                           <label class="control-label">Nombres:<span class="req-ast">*</span></label>
					                           <input type="text" class="form-control" name="txtnombregerente" id="txtnombregerente">
					                       </div>
					                   </div>
					                   <div class="col-md-6">
					                       <div class="form-group label-floating form-group-no dvfg" id="dvnomgeren">
					                           <label class="control-label">Apellidos:<span class="req-ast">*</span></label>
					                           <input type="text" class="form-control" name="txtapellidogerete" id="txtapellidogerete">
					                       </div>
					                   </div>
					               </div>
					               <div class="row">
					                   <div class="col-md-6">
					                       <div class="form-group label-floating form-group-no dvfg" id="dvnomgeren">
					                           <label class="control-label">Cargo:<span class="req-ast">*</span></label>
					                           <input type="text" class="form-control" name="txtcargo" id="txtcargo">
					                       </div>
					                   </div>
					                   <div class="col-md-6">
					                       <div class="form-group label-floating form-group-no dvfg" id="dvnomgeren">
					                           <label class="control-label">Profesión:<span class="req-ast">*</span></label>
					                           <input type="text" class="form-control" name="txtprofesion" id="txtprofesion">
					                       </div>
					                   </div>
					               </div>
					               <div class="row">
					                   <div class="col-md-6">
					                       <div class="form-group label-floating form-group-no dvfg" id="dvnomgeren">
					                           <label class="control-label">CIP:<span class="req-ast">*</span></label>
					                           <input type="text" class="form-control" name="txtcodcip" id="txtcodcip">
					                       </div>
					                   </div>
					                   <div class="col-md-6"></div>
					               </div>
					               <div class="row">
					                   <div class="col-md-12">
					                        <label class="control-label">Firma:</label>
					                        <div class="preview" id="previewimg1"></div>
					                        <input type="file" name="file_firma_gerente" id="file_firma_gerente">
					                       	<small style="color: red">Tamaño: 300x137<br>Tipo: .png</small>
					                   </div>
					               </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" id="savefirmagerente" class="btn btn-primary">Guardar</button>
                                <button type="button" id="btnReset" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            </div>
                            </div>
                        </div>
            </form>
        </div>
        <!--......-->


	</div>
</div>
    <!-- /row -->
<br>
