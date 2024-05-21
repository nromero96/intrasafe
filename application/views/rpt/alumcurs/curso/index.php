    <div class="content">
        <div class="container-fluid">

            <!--Row Detalle Grupo-->
            <div class="" id="dvdetallgrupo">

                <div class="row">

                    <div class="col-md-3"><a type="button" href="<?php echo base_url();?>rpt/alumcurs" class="btn btn-btn-defauld">Atras</a></div>
                    <div class="col-md-1"></div>
                    <div class="col-md-8 text-right" id="showbtns">
                        
                        <a class="btn btn-primary btnexportarpocurso" rel="tooltip" title="Imprimir"><i class="material-icons">print</i> Exportar</a>
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
                                <input type="hidden" name="texididcurso" id="texididcurso">
                            </div>
                            <div class="card-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped tablafiltro1">
                                                <thead class="text-primary">
                                                    <tr>
                                                        <th>N° Documento</th>
                                                        <th>Apellidos y Nombres</th>
                                                        <th>Correo</th>
                                                        <th>Teléfono</th>
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