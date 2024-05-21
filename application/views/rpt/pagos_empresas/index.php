<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-3"></div>
            <div class="col-md-1"></div>
            <div class="col-md-8 text-right" id="showbtns">
                <a class="btn btn-primary btnexportarpocurso" href="http://intranet.safesi.com/RptController/expPagosEmpresas" target="_top" rel="tooltip" title="Exportar"><i class="material-icons">print</i> Exportar</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="blue">
                        <h4 class="title"> <span>Pagos Empresas</span> <span style="float: right;" id="totalpgsem">...</span></h4>
                    </div>
                    <div class="card-content table-responsive">
                        <div class="table-responsive">
                            <table class="table table-striped tablafiltro" style="font-size: 12px;">
                                <thead class="">
                                                <th><b>RUC</b></th>
                                                <th><b>Razón Social</b></th>
                                                <th><b>Banco</b></th>
                                                <th><b>N° de operación</b></th>
                                                <th><b>Fecha de operación</b></th>
                                                <th><b>Monto</b></th>
                                                <th class="no-sort"></th>
                                            </thead>
                            <tbody id="showdatalist">

                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--  Modal Detalle Pago-->
        <div class="modal fade" id="modaldetpago" tabindex="-1" role="dialog"  aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="margin-top: 107px;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-text" data-background-color="blue">
                                <h4 class="card-title text-bold" style="margin: 0px;">
                                    <span>Cursos: </span>
                                </h4>
                            </div>

                            <div class="card-content table-responsive">

<!--                             	<div class="row">
                            		<div class="col-md-12">
                            			<span>Banco:</span><label></label>
                            		</div>
                            	</div>
                            	<div class="row">
                            		<div class="col-md-6">
                            			<span>N° de operación:</span><label></label>
                            		</div>
                            		<div class="col-md-6">
                            			<span>Fecha de operación:</span><label></label>
                            		</div>
                            	</div> -->

                            	<div class="row">
                            		<!-- <div class="col-md-12"><label>Cursos:</label></div> -->
                            		<div class="col-md-12">
                            			<table class="table">
                                    		<thead class="text-primary">
                                        		<th>#</th>
                                        		<th>Título</th>
                                        		<th>Cupos</th>
                                        		<th>Costo</th>
                                    		</thead>
                                    		<tbody id="showlistcurso">
                                    			<!-- Lista cursos pagdos -->
                                    		</tbody>
                                		</table>
                            		</div>
                            	</div>           
                            </div>
                            <div class="modal-footer label-floating">
                                    <button type="button" id="btnReset" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="space"></div>

    </div>
</div>