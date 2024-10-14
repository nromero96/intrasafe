<div class="content">
    <div class="container-fluid">
        <div class="alert alert-success" hidden="hidden">
            <div class="container-fluid">
                <div class="alert-icon">
					<i class="material-icons">check</i>
				</div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                </button>
                <b>Mensaje Alerta</b>
			</div>
        </div>
    </div>

    <!--PopUp Nuevo Certificado-->
    <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form id = "formCertificado" method="POST">
            <input type="hidden" value="0" name="txtIdCertificado" id="txtCertificado">
            <div class="modal-dialog" role="document">
                <div class="modal-content card">
                    <div class="card-header" data-background-color="blue">
                        <h4 class="title text-bold tit-modal">Titulo Alumno</h4>
                        <p>Datos del certificado</p>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Alumno: <span class="req-ast">*</span></label>
                                    <input type="hidden" name="id_alumno" id="id_alumno" value="">
									<div class="input-group">
										<input name="queryalumno" id="queryalumno" class="form-control" placeholder="Buscar alumno..." autocomplete='off'>
										<span class="input-group-btn">
											<button class="btnnewalumno" id ="btnnewalumno" type="button">Nuevo Alumno</button>
										</span>
									</div>


                                    <div id="resultalumnos"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group diinputs label-floating" id="dvcodigo">
                                    <label class="control-label">Código: <span class="req-ast">*</span></label>
                                    <input type="text" class="form-control" name="codigo" id="codigo" required>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group diinputs label-floating" id="dvcurso">
                                    <label class="control-label">Curso: <span class="req-ast">*</span></label>
                                    <input type="text" class="form-control" name="curso" id="curso" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Empresa:</label>
									<input type="text" class="form-control" id="empresa" value="" name="empresa">
								</div>
							</div>
                            <div class="col-md-3">
                                <div class="form-group" id="expira">
                                    <label class="control-label">Expira:</label>
                                    <input type="date" class="form-control" id="expira" value="" name="expira">
                                </div>
                            </div>
                            <div class="col-md-6">

							</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btnSave" class="btn btn-primary">Guardar</button>
                    	<button type="reset" class="btn btn-danger" id="btnReset" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="blue">
                    <h4 class="title">
                        <span>Certificados Internacionales</span>
                        <button type="button" id="btnAdd" class="btn btn-white" data-toggle="modal" style="margin: 0px;padding: 10px 10px;float: right;margin-top: -4px;}">
                            <i class="material-icons">add</i>
                            Nuevo Certificado
                        </button>
                    </h4>
                </div>

                <div class="card-content">
                    <form class="row" action="<?php echo base_url('certificados-internacionales'); ?>" method="get">
                        <?php
                        //get in url data '?listforpage=3'
                        $listforpage = $this->input->get('listforpage') ? $this->input->get('listforpage') : 10;
                        $search = $this->input->get('search') ? $this->input->get('search') : '';
                        $foremp = $this->input->get('foremp') ? $this->input->get('foremp') : '';
                        ?>

                        <div class="col-md-2">
                            <div class="formserach">
                                <select name="listforpage" class="form-control" onchange="this.form.submit()">
                                    <option value="5" <?php if($listforpage == 5) echo 'selected'; ?>>5</option>
                                    <option value="10" <?php if($listforpage == 10) echo 'selected'; ?>>10</option>
                                    <option value="20" <?php if($listforpage == 20) echo 'selected'; ?>>20</option>
                                    <option value="50" <?php if($listforpage == 50) echo 'selected'; ?>>50</option>
                                    <option value="100" <?php if($listforpage == 100) echo 'selected'; ?>>100</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-4">
                            <div class="formserach">
                                <input type="text" name="search" class="form-control" placeholder="Buscar..." value="<?php echo $search; ?>">
                                <button type="submit" class="btn btn-primary">
                                    Buscar
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-striped tablafiltro">
                            <thead class="">
                                <th class="no-sort"><b>ID</b></th>
                                <th><b>N° Documento</b></th>
                                <th><b>Apellidos</b></th>
                                <th><b>Nombres</b></th>
                                <th><b>Código</b></th>
                                <th><b>Curso</b></th>
								<th><b>Empresa</b></th>
                                <th><b>Expira</b></th>
                                <th class="no-sort"><b>Acciones</b></th>
                            </thead>
                            <!-- <tbody id="showdata">
                                <p class="text-center" id="loadgif"><img style="max-width: 150px;" src="<?php echo base_url();?>assets/img/load-22.gif"></p>
                            </tbody> -->

                            <tbody id="showdata">
                                <?php foreach ($certificados as $certificado): ?>
                                <tr>
                                    <td><?php echo $certificado->id; ?></td>
                                    <td><?php echo $certificado->alumno_numerodocumento; ?></td>
                                    <td><?php echo $certificado->alumno_apellido; ?></td>
                                    <td><?php echo $certificado->alumno_nombre; ?></td>
                                    <td><?php echo $certificado->codigo; ?></td>
                                    <td><?php echo $certificado->curso; ?></td>
									<td><?php echo $certificado->empresa; ?></td>
                                    <td><?php echo $certificado->expira; ?></td>
                                    <td class="td-actions text-right">
                                        <a href="javascript:;" type="button" rel="tooltip" title="Editar" class="btn btn-success btnEdit" data="<?php echo $certificado->id; ?>">
                                            <i class="material-icons">edit</i>
                                            <div class="ripple-container"></div>
                                        </a>
                                        <a href="javascript:;" type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btnDelete" data="<?php echo $certificado->id; ?>">
                                            <i class="material-icons">close</i>
                                            <div class="ripple-container"></div>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <hr style="margin: 4px 0px 10px 0px;">
                        <div class="row">
                            <div class="col-md-6">
                                <?php echo $pagination_links; ?>
                            </div>
                            <div class="col-md-6">
                                <div class="text-right">
                                    <p class="infocantpagi"><?php echo $info_message; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="space"></div>

	<!-- PopUp Nuevo Alumno -->
	<div class="modal fade" id="mymodalalumno" tabindex="-1" role="dialog" aria-labelledby="alumnoModalLabel" aria-hidden="true">
		<form id="formAddAlumno" method="POST" action="<?php echo base_url('AlumnoController/addAlumnoByCertInternacional'); ?>" enctype="multipart/form-data">
        	<div class="modal-dialog" role="document">
            	<div class="modal-content card">
                	<div class="card-header" data-background-color="blue">
                        <h4 class="title text-bold tit-modal">Modal Titulo</h4>
                        <p>Datos del grupo</p>
            		</div>
                    <div class="modal-body">
                    	<div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Tipo de Documento: <span class="req-ast">*</span></label>
                                    <select class="form-control" name="txttipodocumento" id="idtxttipodocumento" required>
                                        <option value=""></option>
                                        <option value="dni" >DNI</option>
                                        <option value="Pasaporte">Pasaporte</option>
                                        <option value="cex">CEX</option>
                                        <option value="otros">Otros</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating" id="dvnumdnialumn">
                                    <label class="control-label">N° Documento: <span class="req-ast">*</span></label>
                                    <input type="text" class="form-control" name="txtnumerodocumento" id="idtxtnumerodocumento" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating" id="dvapelidosalumn">
                                    <label class="control-label">Apellidos: <span class="req-ast">*</span></label>
                                    <input type="text" class="form-control uppercase-input" name="txtapellidos" id="idtxtapellidos" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating" id="dvnomalumn">
                                    <label class="control-label">Nombres: <span class="req-ast">*</span></label>
                                    <input type="text" class="form-control uppercase-input" name="txtnombres" id="idtxtnombres" required>
                                </div>
                            </div>
                        </div>
                        <div class="row hidden">
                            <div class="col-md-6">
                                <div class="form-group label-floating" id="dateRangePicker">
                                    <label class="control-label">Fecha de Nacimiento:</label>
                                    <input type="text" class="form-control" name="txtfnacimiento" value="00/00/0000" id="idtxtfnacimiento" data-provide="datepicker" data-date-format="dd/mm/yyyy" >
                                </div>
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Teléfono: </label>
                                    <input type="text" class="form-control" name="txttelefono" id="idtxttelefono" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Email: </label>
                                    <input type="email" class="form-control" name="txtemail" id="idtxtemail">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating" id="dcargo">
                                    <label class="control-label">Cargo: </label>
                                    <input type="text" class="form-control" name="txtcargo">
                                </div>
                            </div>
                        </div>
                        <div  class="row">
                        	<div class="col-md-12">
					           	<label class="control-label">Foto de perfil:</label>
					           	<div class="preview" id="previewimg1"></div>
					           	<input type="file" name="fotoperfil" id="fotoperfil">
					           	<small style="color: red">Tamaño: (150x150) - Tipo: (.jpg | .png)</small>
					        </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btnSaveAlumno" class="btn btn-primary">Agregar</button>
                        <button type="button" id="btnReset1" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </form>
	</div>
</div
