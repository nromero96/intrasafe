$(document).ready(function(){

	function getUrlParameter(search_param){
		var url_part = window.location.search.substring(1);
		var decoded_url_part = decodeURIComponent(url_part);
		var params = decoded_url_part.split('&');
		for(i = 0; i < params.length; i++){
			param = params[i].split('=');
			if(search_param == param[0]){
				return param[1];
			}
		}
	}
	var id_curso = getUrlParameter('idcs');


	//Listar Alumnos por curso
	if(id_curso != ''){
		showDataCurso(id_curso);
        showAllAlumnoCurso(id_curso);
    }else{
    	swal("¡Ups!", "No encontramos la empresa.! Intente nuevamente.", "error");
    }



    $('.tablafiltro1').DataTable({

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



	function showDataCurso(idcurso){
		var idc=idcurso;
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: baseUrl + "RptController/showDataCurso",
			data:{idcs:idc},
			async: false,
			dataType: 'json',
			success: function(data){
				$('#cnombrecurso').text(data.nombrecurso);
				$('#fcinicio').text(data.FechaInicio);

				$('input[name=texididcurso]').val(data.id_curso);
				$('input[name=txtdescipcioncurso]').val(data.descripcion);
				$('input[name=numnotasdelcurso]').val(data.numeronotas);
			},
			error:function(){
				swal("¡Ups!", "Algo salió mal!. Refresque la página.", "error");
			}
		});

	}



	//funcion show lista
	function showAllAlumnoCurso(idcurso){
	var idc=idcurso;
	$.ajax({
			type: 'ajax',
			method: 'get',
			url: baseUrl + "GrupoEmpresaController/showAlumnosPorCurso",
			data:{idcs:idc},
			async: false,
			dataType: 'json',
			success: function(data){
				var html = '';
				var i;
				var condicionalm='No definido';
				for (i=0; i<data.length; i++){

					html +='<tr>'+
							'<td>'+data[i].numerodocumento+'</td>'+
							'<td>'+data[i].apellidos+' '+data[i].nombres+'</td>'+
							'<td>'+data[i].email+'</td>'+
							'<td>'+data[i].telefono+'</td>'+
						'</tr>';
				}

				if (html==''){
					$('#showListaAlumnosForCurso').html('<tr><td colspan="8"><p class="text-center"><label>Aún no hay alumnos regitrados en el curso.</label></p><td><tr>');
				}else{
					$('#showListaAlumnosForCurso').html(html);
				}

			},
			error:function(){
				swal("¡Ups!", "Algo salió mal!. Refresque la página.", "error");
			}
		});
	}


	//Boton Exportar excel
	$('#dvdetallgrupo').on('click', '.btnexportarpocurso', function(){
			var idcurso = $('#texididcurso').val();
	
	 		var url = baseUrl+'rptController/expAlumnoPorCurso?idcs='+idcurso;
			window.open(url, '_top');
	});


	//Lista de notas
	$('#showbtns').on('click', '.btnimpnotas', function(){
		// var getidcurso = $("#texididcurso").val();
		// if(getidcurso!=''){
		// 			var url = baseUrl+'PdfsController/getListOfNotasForCurso?idc='+getidcurso;
 	// 				window.open(url, '_blank');	
		// }else{
		// 	swal("Ups!", "Algo salió mal.! Refresque la página.", "error");
		// }

	});





