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
                    <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form id = "formAlumno" method="POST">
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
                                                <div class="form-group label-floating form-group-no">
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
                                                <div class="form-group label-floating form-group-no" id="dvnumdni">
                                                    <label class="control-label">N° Documento: <span class="req-ast">*</span></label>
                                                    <input type="text" class="form-control" name="txtnumerodocumento" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating form-group-no" id="dvapellidos">
                                                    <label class="control-label">Apellidos: <span class="req-ast">*</span></label>
                                                    <input type="text" class="form-control uppercase-input" name="txtapellidos" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating form-group-no" id="dvnombres">
                                                    <label class="control-label">Nombres: <span class="req-ast">*</span></label>
                                                    <input type="text" class="form-control uppercase-input" name="txtnombres" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row hidden">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating form-group-no" id="dateRangePicker">
                                                    <label class="control-label">Fecha de Nacimiento:</label>
                                                    <input type="text" class="form-control" id="idfnacimiento" value="00/00/0000" name="txtfnacimiento" data-provide="datepicker" data-date-format="dd/mm/yyyy">
                                                </div>
                                            </div>
                                            <div class="col-md-6"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating form-group-no">
                                                    <label class="control-label">Teléfono: </label>
                                                    <input type="text" class="form-control" name="txttelefono">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating form-group-no">
                                                    <label class="control-label">Email:</label>
                                                    <input type="email" class="form-control" name="txtemail">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
					                            <label class="control-label">Foto de perfil:</label>
					                            <div class="preview" id="previewimg1"></div>
                                                <br>
					                            <input type="file" name="fotoperfil" id="fotoperfil">
					                            <small style="color: red">Tamaño: (150x150) - Tipo: (.jpg | .png)</small>
					                        </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" id="btnSave" class="btn btn-primary">Guardar</button>
                                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>

                    <!---->
                    <!-- <div class="row text-center">
                        <button type="button" id="btnAdd" class="btn btn-success" data-toggle="modal">
                            <i class="material-icons">add</i>
                            Nuevo Alumno
                        </button>
                    </div> -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="blue">
                                    <h4 class="title">

                                        <span>Lista de Alumnos</span>

                                        <span style="float: right;"><a href="<?php echo base_url(); ?>RptController/expListaAlumnos" rel="tooltip" title="Exportar Lista General"><img style="max-width: 46px" src="<?php echo base_url(); ?>assets/img/excel-icon.png"></a></span>

                                    </h4>
                                    
                                </div>

                                <div class="card-content">
                                    <form class="row" action="<?php echo base_url('alumnos'); ?>" method="get">
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
                                            <div class="form-group" style="margin-top: 0px;">
                                                <select name="foremp" class="form-control">
                                                    
                                                    <option value="">Todas las empresas</option>
                                                    <?php foreach ($selectempresas as $selectempresa): ?>
                                                        <option value="<?php echo $selectempresa->id_empresa; ?>" <?php if($foremp == $selectempresa->id_empresa) echo 'selected'; ?>>
                                                            <?php echo truncate_text($selectempresa->razonsocial, 50); ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
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
                                                <th><b>Foto</b></th>
                                                <th><b>N° Documento</b></th>
                                                <th><b>Apellidos</b></th>
                                                <th><b>Nombres</b></th>
                                                <th><b>Teléfono</b></th>
                                                <th><b>Correo</b></th>
                                                <th class="no-sort"></th>
                                            </thead>
                                            <!-- <tbody id="showdata">
                                                <p class="text-center" id="loadgif"><img style="max-width: 150px;" src="<?php echo base_url();?>assets/img/load-22.gif"></p>
                                            </tbody> -->

                                            <tbody id="showdata">
                                                <?php foreach ($alumnos as $alumno): ?>

                                                <tr>
                                                    <td><?php echo $alumno->id_alumno; ?></td>
                                                    <td>
                                                        <img src="<?php echo base_url(); ?>uploads/fotos/<?php echo $alumno->fotoperfil; ?>" class="img-circle" style="width: 30px; height: 30px;">
                                                    </td>
                                                    <td><?php echo $alumno->numerodocumento; ?></td>
                                                    <td><?php echo $alumno->apellidos; ?></td>
                                                    <td><?php echo $alumno->nombres; ?></td>
                                                    <td><?php echo $alumno->telefono; ?></td>
                                                    <td><?php echo $alumno->email; ?></td>
                                                    <td class="td-actions text-right">
                                                        <a href="javascript:;" type="button" rel="tooltip" title="Editar" class="btn btn-success btnEdit" data="<?php echo $alumno->id_alumno; ?>">
                                                            <i class="material-icons">edit</i>
                                                            <div class="ripple-container"></div>
                                                        </a>
                                                        <a href="javascript:;" type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btnDelete" data="<?php echo $alumno->id_alumno; ?>">
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
                </div>
            </div>