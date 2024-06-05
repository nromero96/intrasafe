    <div class="content">
        <div class="container-fluid">


            <!--Row Detalle Grupo-->
            <div class="" id="dvdetallgrupo">

            <!-- Pupup Registro de Notas -->
            <div class="modal fade" id="modalrnotas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form id="formrnotas" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="txtidalumno_grupo">
                        <input type="hidden" name="texidgrupo" id="texididgrupo">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content card">
                            <div class="card-header" data-background-color="blue">
                                <h4 class="title text-bold tit-modal">Modal Titulo</h4>
                                <p>Notas</p>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating form-group-no">
                                            <label class="control-label">N° Documento: <span class="req-ast">*</span></label>
                                            <input type="text" class="form-control" name="txtndocumento" disabled="disabled">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating form-group-no">
                                            <label class="control-label">Nombres: <span class="req-ast">*</span></label>
                                            <input type="text" class="form-control" name="txtnomalumno" disabled="disabled">
                                        </div>
                                    </div>
                                </div>




                                <div class="row">
                                	<div id="dnumnotas">
	                                    <div class="col-md-1 hidden" id="dnot1">
	                                        <div class="form-group label-floating form-group-no">
	                                            <label class="control-label">N1:</label>
	                                            <input type="text" class="form-control iptnotas" name="txtnt1" id="txtnt1" value="0" maxlength="2" onkeyup="fncProm()">
	                                        </div>
	                                    </div>
	                                    <div class="col-md-1 hidden" id="dnot2">
	                                        <div class="form-group label-floating form-group-no">
	                                            <label class="control-label">N2:</label>
	                                            <input type="text" class="form-control iptnotas" name="txtnt2" id="txtnt2" value="0" maxlength="2" onkeyup="fncProm()">
	                                        </div>
	                                    </div>
	                                    <div class="col-md-1 hidden" id="dnot3">
	                                        <div class="form-group label-floating form-group-no">
	                                            <label class="control-label">N3:</label>
	                                            <input type="text" class="form-control iptnotas" name="txtnt3" id="txtnt3" value="0" maxlength="2" onkeyup="fncProm()">
	                                        </div>
	                                    </div>
	                                    <div class="col-md-1 hidden" id="dnot4">
	                                        <div class="form-group label-floating form-group-no">
	                                            <label class="control-label">N4:</label>
	                                            <input type="text" class="form-control iptnotas" name="txtnt4" id="txtnt4" value="0" maxlength="2" onkeyup="fncProm()">
	                                        </div>
	                                    </div>
                                		
                                	</div>
                                    <div class="col-md-2">
                                        <div class="form-group label-floating form-group-no">
                                            <label class="control-label">Promedio:</label>
                                            <input type="text" class="form-control" name="txtpromnot" id="txtpromnot" value="0" maxlength="2" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                    	<div class="form-group label-floating form-group-no">
                                    		<label class="control-label">Condición:</label>
                                    		<label id="txtsmscond" style="margin-top: 10px;"></label>
                                    	</div>
                                        <div class="form-group label-floating form-group-no hidden">
                                            <label class="control-label">Condición:</label>
                                            <select class="form-control" name="slcondicion" id="slcondicion" readonly="readonly">
                                                <option value="0">----------</option>
                                                <option value="1">Aprobado</option>
                                                <option value="2">Desaprobado</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6">
                                       <textarea rows="4" cols="50" name="txtobservacion" class="form-control" placeholder="Observación"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="btnSaveNotas" class="btn btn-primary">Guardar</button>
                                <button type="button" id="btnReset" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- .......... -->


            <!-- Pupup selección de fecha por curso -->
            <div class="modal fade" id="modalselecfecha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content card">
                            <div class="card-header" data-background-color="blue">
                                <p class="text-center" style="font-size: 17px">Horarios</p>
                            </div>
                            <div class="modal-body">
                                <br>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                    	<div class="form-group" style="margin-top: 0px;">
                            				<label class="control-label">Fechas:</label>
                                            <select name="slchoraiocrs" id="slchoraiocrs" class="form-control">
                                                
                                            </select>
                        				</div>
                                    </div>
                                    <div class="col-md-3"></div>
                                    <input type="hidden" name="texidfecha" id="texidfecha">
                                    <input type="hidden" name="tipolist" id="tipolist">
                                </div>
                                <br>
                                <br>
                                <br>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="btnPrintAsis" class="btn btn-primary">Imprimir</button>
                                <button type="button" id="btnResetAsis" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- .......... -->



            <!--Pupup Generara Certificado-->
            <div class="modal fade" id="modalgnrarcert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form id="formgnrarcert">  
                    <div class="modal-dialog" role="document">
                        <div class="modal-content card">
                            <div class="card-header" data-background-color="blue">
                                <p class="text-center" style="font-size: 18px"><b>Certificado para el alumno</b></p>
                            </div>
                            <div class="modal-body" style="padding-top: 0px !important;">
                                <div class="row">
                                    <div class="col-md-9">
                                    	<small>Fondo Actual</small>
                                    	<div id="prvwcertbg">
                                    		
                                    	</div>
                                        <input type="hidden" name="txtidalumnogrupo" id="txtidalumnogrupo">
                                		<input type="hidden" name="txtnombgcert" id="txtnombgcert">

                                    </div>
                                    <div class="col-md-3">
                                        <div class="text-center" style="margin-top: 4px; margin-bottom: 4px;">
                                            <small style="line-height: 14px;display: block;">
                                                Último Certificado del serie: <b><span id="ultimocertif">...</span></b>
                                            </small>
                                        </div>
                                    	
                                    	<input type="text" name="txtsericert" id="txtsericert" class="text-center" style="width: 100%"> <!-- readonly -->
                                    	<input type="text" name="txtcodigoc" id="txtcodigoc" class="text-center" placeholder="000" maxlength="3" style="width: 100%;    margin-top: 9px;" >
										<br>
										<br>
										<button type="button" id="btnSaveCert" class="btn btn-primary">Guardar</button>
                                		<button type="button" id="btnCloseCert" class="btn btn-danger" data-dismiss="modal" style="margin: 0px;">Cerrar&nbsp;&nbsp;&nbsp;</button>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- .......... -->




                <div class="row">

                    

                    <div class="col-md-3"><a type="button" href="<?php echo base_url();?>grp_cs" class="btn btn-btn-defauld">Atras</a></div>
                    <div class="col-md-1"></div>
                    <div class="col-md-8 text-right" id="showbtns">
                        <a class="btn btn-warning btnimplisasis" rel="tooltip" title="Imprimir Lista de Asistencia" data="ASI"><i class="material-icons">print</i> Asistencia</a>
                        <a class="btn btn-danger btnimplisasis" rel="tooltip" title="Imprimir Lista de Asistencia" data="PRA"><i class="material-icons">print</i> Practica</a>
                        <a class="btn btn-primary btnimpnotas" rel="tooltip" title="Imprimir Registro de Notas"><i class="material-icons">print</i> Notas</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" data-background-color="blue">
                                <h4 style="margin-top: 0;margin-bottom: 0;">
                                    <span id="cnombrecurso">...</span>
                                    <span style="float: right;">Fecha de Inicio: <span id="fcinicio"></span></span>
                                </h4>
                                <input type="hidden" name="numnotasdelcurso" id="numnotasdelcurso">
                                <input type="hidden" name="txtdescipcioncurso" id="txtdescipcioncurso">
                                <input type="hidden" name="texididcurso" id="texididcurso">
                            </div>
                            <div class="card-content">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead class="">
                                                <tr>
                                                    <th><b>N°</b></th>
                                                    <th><b>N° Documento</b></th>
                                                    <th><b>Apellidos</b></th>
                                                    <th><b>Nombres</b></th>
                                                    <th id="thnot1" class="hidden"><b>N1</b></th>
                                                    <th id="thnot2" class="hidden"><b>N2</b></th>
                                                    <th id="thnot3" class="hidden"><b>N3</b></th>
                                                    <th id="thnot4" class="hidden"><b>N4</b></th>
                                                    <th><b>Promedio</b></th>
                                                    <th><b>Condición</b></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="showListaAlumnosForCurso">
                                                <!--Lista-->

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space"></div>
            </div>

        </div>
    </div>