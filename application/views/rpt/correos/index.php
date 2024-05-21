    <div class="content" style="background: url(<?php echo base_url(); ?>assets/img/bg-2353.jpg); background-size: cover;">
        <div class="container-fluid">

            <!--Lista de empresas.................................................................................................-->
            <div> 

                <div style="height: 100px"></div>

                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-center"><b>EXPORTAR CORREOS</b></h4>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                        <a href="<?=base_url()?>RptController/expListaCorreosAlumnos" class="btn btn-primary" rel="tooltip" style="width: 100%;" title="Exportar Correos - Alumnos"><i class="material-icons">cloud_download</i> ALUMNOS</a>
                    </div>
                    <div class="col-md-4">
                        <a href="<?=base_url()?>RptController/expListaCorreosPN" class="btn btn-primary" rel="tooltip" style="width: 100%;" title="Exportar Correos - Personas Naturales"><i class="material-icons">cloud_download</i> PERSONAS NATURALES</a>
                    </div>
                    <div class="col-md-3">
                        <a href="<?=base_url()?>RptController/expListaCorreosEmpresas" class="btn btn-primary" rel="tooltip" style="width: 100%;" title="Exportar Correos - Empresas"><i class="material-icons">cloud_download</i> EMPRESAS</a>
                    </div>
                    <div class="col-md-1"></div>

                </div>

                <div class="space"></div>
                
            </div>

        </div>
    </div>