$(function(){
	//Lista de cursos para notas por curso================

	idusersession = $('#idusersession').val();

	showListacursos(idusersession);

	function showListacursos(idusersession){
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: baseUrl + "emp/RptController/showListaCurso",
			data: {idempresa: idusersession},
			async: false,
			dataType: 'json',
			success: function(data){
				var html = '';
				var i;
				for (i=0; i<data.length; i++){
					html +='<tr>'+
								'<td>'+data[i].nombrecurso+'</td>'+
								'<td>'+data[i].FechaInicio+'</td>'+
								'<td>'+data[i].apellidos_capacitador+' '+data[i].nombres_capacitador+'</td>'+
								'<td class="td-actions text-right">'+
								'<a href="javascript:;" type="button" title="Ver" class="btn btn-primary btn-round btnVer" data="'+data[i].id_grupo+'">&ensp;&ensp;&ensp;&ensp;VER <i class="material-icons">chevron_right</i>&ensp;&ensp;</a>'+'</td>'+
							'</tr>';
				}
				$('#showcurso').html(html);
			},
			error:function(){
				swal("¡Ups!", "Algo salió mal!. Refresca la página", "error");
			}
		});
	}

	//Boton ver detalle
	$('#showcurso').on('click', '.btnVer', function(){
		var id_grupo = $(this).attr('data');

		var url = baseUrl+'emp/e_rpt/listacursos/curso?curso&idcg='+id_grupo+'&%20safesi';
 		window.open(url, '_self');	
		
	});

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