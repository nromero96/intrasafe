$(function(){
	//Lista de cursos para notas por curso================
	showListPagoEmpresas();
	showPagoTotalEmpresas();


	function showListPagoEmpresas(){
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: baseUrl + "RptController/showListPagosEmpresas",
			async: false,
			dataType: 'json',
			success: function(data){
				var html = '';
				var i;
				for (i=0; i<data.length; i++){
					html +='<tr>'+
							'<td>'+data[i].ruc+'</td>'+
							'<td>'+data[i].razonsocial+'</td>'+
							'<td>'+data[i].nombre_banco+'</td>'+
							'<td>'+data[i].cod_operacion+'</td>'+
							'<td><span class="hidden">'+data[i].fecha_transaccionorden+'</span>'+data[i].fecha_transaccion+'</td>'+
							'<td>S/.'+data[i].pagototal+'</td>'+
							'<td><a href="javascript:;" type="button" title="Ver Detalle" class="btn btn-primary btn-round btn-sm btnVerP" data="'+data[i].id_pago+'"><i class="material-icons">visibility</i> VER </a></td>'+			
						'</tr>';
					}
					$('#showdatalist').html(html);
				},
				error:function(){
					swal("¡Ups!", "Algo salió mal!. Refresca la página", "error");
				}
		});
	}


	function showPagoTotalEmpresas(){
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: baseUrl + "RptController/sumaTotalPagosEmpresas",
			async: false,
			dataType: 'json',
			success: function(data){
					$('#totalpgsem').text('Total: S/.'+data.total);
				},
				error:function(){
					swal("¡Ups!", "Algo salió mal!. Refresca la página", "error");
				}
		});
	}


	$('#showbtns').on('click', '.btnexportar', function(){
	 	var url = baseUrl+'rptController/expListPagos';
		window.open(url, '_top');
	});



	$('#showdatalist').on('click', '.btnVerP', function(){
		var idpago = $(this).attr('data');
		showListCursoPorPago(idpago);
		$('#modaldetpago').modal({backdrop: 'static',});

	});



	function showListCursoPorPago(idpago){
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: baseUrl + "RptController/showListCursosPorPago",
			data:{idp:idpago},
			async: false,
			dataType: 'json',
			success: function(datah){
				var html = '';
				var i;
				for (i=0; i<datah.length; i++){
					html +='<tr>'+
								'<td>'+'#'+'</td>'+
								'<td>'+datah[i].nombrecurso+'</td>'+
								'<td>'+datah[i].ncupos+' Cupos</td>'+
								'<td>S/.'+datah[i].costo_total+'</td>'+
							'</tr>';
				}
				$('#showlistcurso').html(html);
			},
			error:function(){
				swal("¡Ups!", "Algo salió mal!. Intentelo nuevamente", "error");
			}
		});
	}




























});

$(document).ready(function(){
		

    $('.tablafiltro').DataTable({

    	"aLengthMenu": [[10, 20, 50, 100, -1], [10, 20, 50, 100, "Todos"]],
    	"sDom": 'Rfrtlip',
    	"order": [],

    	"columnDefs": [{
          	"targets": 'no-sort',
          	"orderable": false
    	}],

        language:{
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },

                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
                    }
                });
 	});