    <div class="content" style="background: url(<?php echo base_url(); ?>assets/img/bg-2353.jpg); background-size: cover;">
        <div class="container-fluid">

            <!--Lista de empresas.................................................................................................-->
            <div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="form-group" style="margin-top: 0px;">
                            <label class="control-label">Empresas:</label>
                            <?php $nombrepn[''] = 'Seleccione...'; ?>
                            <?php echo form_dropdown('slpersnatural', $nombrepn, '', 'data-live-search="true" class="form-control selectpicker" id="idslpersnatural"'); ?>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <div class="space"></div>
                <div class="space"></div>
            </div>

            
           

        </div>
    </div>