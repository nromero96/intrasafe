    <div class="content">
        <div class="container-fluid">

            <!--Row Detalle Grupo-->
            <div class="" id="dvdetallgrupo">
                <div class="row">
                    <div class="col-md-12" id="showbtns">
                        <a class="btn btn-primary btnexportar"><i class="material-icons">print</i> Exportar</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" data-background-color="blue">
                                <h4 style="margin-top: 0;margin-bottom: 0;">
                                    <span>Certificados</span>
                                </h4>
                                <input type="hidden" name="texididcurso" id="texididcurso">
                            </div>
                            <div class="card-content" >
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive" >
                                            <table class="table table-striped table-bordered tablafiltro" style="font-size: 11px;">
                                                <thead class="text-primary">
                                                    <tr>
                                                        <th class="txthdtabla"><b>N° CERTIFICADO</b></th>
                                                        <th class="txthdtabla" style="width: 130px !important;"><b>EMPRESA</b></th>
                                                        <th class="txthdtabla"><b>CURSO</b></th>
                                                        <th class="txthdtabla"><b>EMISIÓN</b></th>
                                                        <th class="txthdtabla"><b>VIGENCIA</b></th>
                                                        <th class="txthdtabla"><b>PARTICIPANTE</b></th>
                                                        <th class="txthdtabla"><b>DNI</b></th>
                                                        <th class="txthdtabla"><b>NOTA</b></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="showListaCertificado">
                                                    <!--Lista-->
                                                    <p class="text-center" id="loadgif"><img style="max-width: 150px;" src="<?php echo base_url();?>assets/img/load-22.gif"></p>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>