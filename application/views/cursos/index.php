<div class="content">

                <div class="container-fluid">

                <div class="alert alert-success" hidden="hidden">
                    <div class="container-fluid">
                    <div class="alert-icon"><i class="material-icons">check</i></div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="material-icons">clear</i></span></button>
                        <b>Mensaje Alerta</b>
                    </div>
                </div>

                    <!--PopUp Registro Nuevo Curso-->
                    <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form id="formCurso" method="POST">
                            <input type="hidden" value="0" name="txtCurso" id="txtIdCurso">
                        <div class="modal-dialog" style="margin-top: 17px !important;" role="document">
                            <div class="modal-content card">
                                <div class="card-header" data-background-color="blue">
                                    <h4 class="title text-bold tit-modal">Modal Titulo</h4>
                                    <p>Datos del curso</p>
                                </div>
                                <div class="modal-body">
                                
                                        <div class="taboption">
                                            <a href="javascript:;" class="botntap active" id="crinfo">Información</a>
                                            <a href="javascript:;" class="botntap" id="crmod">Módulo</a>
                                        </div>

                                        <div class="" id="crinfo_content">
                                            
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group label-floating form-group-no dvcmp" id="dnombre">
                                                        <label class="control-label">Titulo<span class="req-ast">*</span></label>
                                                        <input type="text" class="form-control" name="txtnombre" id="txtnombrecurso">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="form-group label-floating dvcmp">
                                                            <label class="control-label">Descripción <span style="color: red;">(Etiqueta <code>&lt;br&gt;</code> para salto de linea.)</span></label> 
                                                            <textarea class="form-control" rows="5" name="txtdescripcion" id="txtdescripcion" placeholder="Máximo 250 caracteres"></textarea>
                                                            <span style="float: right;" id="contadordescripcion"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                        <div class="form-group label-floating dvcmp">
                                                            <label class="control-label">Capacitador:</label>
                                                            <?php $nomcapacitador[''] = ''; ?>
                                                            <?php echo form_dropdown('slcapacitador', $nomcapacitador, '', 'class="form-control" id="slcapacitador"'); ?>
                                                        </div>
                                                </div>
                                                <div class="col-md-6"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group label-floating dvcmp" id="dprecio">
                                                        <label class="control-label">Precio 1 <span class="req-ast">*</span></label>
                                                        <input type="text" class="form-control" name="txtprecio" id="txtprecio">
                                                        <small class="txtmsprec">Prec. Alto</small>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group label-floating dvcmp" id="dprecio2">
                                                        <label class="control-label">Precio 2 <span class="req-ast">*</span></label>
                                                        <input type="text" class="form-control" name="txtprecio2" id="txtprecio2">
                                                        <small class="txtmsprec">Prec. Intermedio</small>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group label-floating dvcmp" id="dprecio3">
                                                        <label class="control-label">Precio 3 <span class="req-ast">*</span></label>
                                                        <input type="text" class="form-control" name="txtprecio3" id="txtprecio3">
                                                        <small class="txtmsprec">Prec. Bajo</small>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group label-floating dvcmp" id="dduracion">
                                                        <label class="control-label">Duración <span class="req-ast">*</span></label>
                                                        <input type="number" class="form-control" name="txthoras" id="txthoras" min="0">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group label-floating dvcmp" id="dnnotas">
                                                        <label class="control-label">N° Notas <span class="req-ast">*</span></label>
                                                        <input type="number" class="form-control" name="txtnumeronotas" id="txtnumeronotas" min="1" max="4">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group label-floating dvcmp" id="dndcupos">
                                                        <label class="control-label">N° Cupos</label>
                                                        <input type="number" class="form-control" name="txtcupos" id="txtcupos" min="1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                <hr style="margin-top: 13px;margin-bottom: 6px;">
                                                <p style="font-weight: bold;margin-bottom: 4px;">Certificado:</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating form-group-no dvcmp" id="dvigencia">
                                                        <label class="control-label">Vigencia<span class="req-ast">*</span></label>
                                                        <select class="form-control" name="txtvigencia" id="txtvigencia">
                                                            <option value="1">1 año</option>
                                                            <option value="2">2 años</option>
                                                            <option value="3">3 años</option>
                                                            <option value="0">Sin vigencia</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating dvcmp">
                                                        <label class="control-label">Firma Gerente:</label>
                                                        <?php echo form_dropdown('slcfirmagt', $firmagerentes, '', 'class="form-control" id="slcfirmagt"'); ?>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating form-group-no dvcmp" id="dvtipocert">
                                                        <label class="control-label">Tipo certificado<span class="req-ast">*</span></label>
                                                        <textarea class="form-control" name="tipocert" id="tipocert" rows="2" >Por haber aprobado satisfactoriamente el curso realizado el</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <br>
                                                    <input type="hidden" value="0" name="showdescripcion">
                                                    <input type="checkbox" id="showdescripcion" name="showdescripcion" value="1" checked> <label for="showdescripcion">Mostrar descripción en el certificado.</label>
                                                    
                                                    <br>
                                                    <input type="hidden" value="0" name="shownotact">
                                                    <input type="checkbox" id="shownotact" name="shownotact" value="1" checked> <label for="shownotact">Mostrar nota en el certificado.</label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="hidden" id="crmod_content">
											<small>Para separar en dos columnas poner: <code>[COL2]</code></small>
                                            <textarea name="textomodulo" id="textomodulo"></textarea>
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
                    <!--......-->

                    <!--  Modal Horario -->
                    <div class="modal fade" id="mymodalHorario" tabindex="-1" role="dialog"  aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" id="mdialTamanio" role="document" style="margin-top: 107px;">
                                <div class="row" id="horario">
                                    <div class="col-md-12">
                                        <div class="card">
                                        	
                                            <div class="text-right" style="margin-bottom: -71px;">
                                                <button type="button" id="btnCerrarH" class="btn btn-danger btn-sm" rel="tooltip" title="" data-original-title="Cerrar Ventana" data-dismiss="modal" style="margin-right: -46px;"><b>X</b></button>
                                            </div>
                                                

                                            <div class="card-header card-header-text" data-background-color="blue">
                                                <h4 class="card-title text-bold" style="margin: 0px;">
                                                    <span>Horario: </span>
                                                    <span id="spnomcurso" style="font-weight: 100;"></span>
                                                    <span id="spnumhoras" style="font-weight: 100; float: right;"></span>
                                                </h4>
                                                <input type="hidden" name="idcursoforhorario" id="idcursoforhorario">
                                            </div>

                                            <div class="card-content table-responsive">

                                                <table class="table">
                                                    <thead class="text-primary">
                                                        <th>#</th>
                                                        <th>Fecha</th>
                                                        <th>Hora Inicio</th>
                                                        <th>Hora Fin</th>
                                                        <th>Lugar</th>
                                                        <th></th>
                                                    </thead>
                                                    <tbody id="showhorario">

                                                    </tbody>
                                                </table>

                                                <div class="row box-adhorario">
                                                    <form id="formHorario"  method="post">
                                                        <input type="hidden" name="txtvalidcurso" id="validcurso">
                                                        <div class="col-md-3">
                                                            <input type="text" name="txtfecha" id="idfechahorario" placeholder="dd/mm/aaaa" class="frm-horario" data-provide="datepicker" data-date-format="dd/mm/yyyy">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="text" name="txthorainicio" placeholder="00:00 HH" class="frm-horario" data-provide="timepicker" >
                                                        </div>

                                                        <div class="col-md-2">
                                                            <input type="text" name="txthorafin" placeholder="00:00 HH" class="frm-horario" data-provide="timepicker" >
                                                        </div>

                                                        <div class="col-md-4">
                                                            <input type="text" name="txtlugardeclase" id="txtlugardeclase" placeholder="Lugar" class="frm-horario" >
                                                        </div>

                                                        <div class="col-md-1">
                                                            <button type="button" id="btnAddHorario" class="btn btn-success btn-round btn-fab btn-fab-mini" style="margin-top: 4px;">
                                                            <i class="material-icons">add</i>
                                                            <div class="ripple-container"></div>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>

                    <!--....-->
                    <div class="row">
                            <div class="col-md-4">
                                    
                            </div>
                            <div class="col-md-5"></div>
                            <div class="col-md-3 text-right">
                                    <button type="button" id="btnAdd" class="btn btn-success" data-toggle="modal">
                                        <i class="material-icons">add_box</i>
                                        Nuevo Curso
                                    </button>
                            </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="blue">
                                    <h4 class="title">
                                        <span>Lista de Cursos</span>
                                        <span style="float: right;">
                                            <a href="/calendario" target="_blank" rel="tooltip" title="Ver calendario">
                                                <span>Calendario de Cursos</span>
                                                <img src="https://intranet.safesi.com/assets/img/cl-icon.png" style="width: 37px;">
                                            </a>
                                        </span>
                                    </h4>
                                </div>
                                <div class="card-content table-responsive">
                                    <div class="row" style="margin-bottom: -72px;">
                                        <div class="col-sm-2 col-md-1">
                                            <div class="form-group" style="margin: 0px !important;">
                                                <input type="text" name="txtdesde" id="txtdesde" class="form-control" data-provide="datepicker" data-date-format="dd/mm/yyyy" style="width: 134%;" placeholder="Desde">
                                            </div>
                                        </div>
                                        <div class="col-sm-2 col-md-1">
                                            <div class="form-group" style="margin: 0px !important;">
                                                <input type="text" name="txthasta" id="txthasta" class="form-control" data-provide="datepicker" data-date-format="dd/mm/yyyy" style="width: 134%;"  placeholder="Hasta">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-4  col-md-4">
                                            <div class="form-group" style="margin-top: 0px">
                                                <?php $nomcursos['Todo'] = 'Todo';?>
                                                <?php echo form_dropdown('slccurso', $nomcursos, '', 'class="form-control" id="idslecurso"'); ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-2  col-md-1">
                                            <button type="button" id="btnFiltCurso" class="btn btn-primary btn-sm" >
                                            Filtrar</button>
                                        </div>
                                        <div class="col-sm-2  col-md-1"></div>
                                    </div>
                                    <div class="table-responsive">
                                    	<table class="table table-bordered table-striped tablafiltro">
                                        	<thead class="">
                                            	<th><b>Titulo</b></th>
                                            	<th class=""><b>Inicio</b></th>
                                            	<th class="no-sort"><b>Duración</b></th>
                                            	<th class="no-sort"><b>Cupos</b></th>
                                            	<th class="no-sort"><b>Capacitador</b></th>
                                            	<th class="text-center no-sort"><b>Horario</b></th>
                                            	<th class="no-sort"><b>Acciones </b></th>
                                        	</thead>
                                        	<tbody id="showdata">

                                        	</tbody>
                                    	</table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="space"></div>
                </div>
            </div>
