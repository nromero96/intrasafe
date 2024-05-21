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
	var id_grupo = getUrlParameter('idcg');


	//Listar Alumnos por curso
	if(id_grupo != ''){
		showDataCurso(id_grupo);
        showAllAlumnoCurso(id_grupo);
    }else{
    	swal("¡Ups!", "No encontramos los datos del curso.! Intente nuevamente.", "error");
    }



    // $('.tablafiltro33').DataTable({

    // 	"aLengthMenu": [[10, 20, 50, 100, -1], [10, 20, 50, 100, "Todos"]],
    // 	"sDom": 'Rfrtlip',
    // 	"order": [],

    // 	"columnDefs": [{
    //       	"targets": 'no-sort',
    //       	"orderable": false
    // 	}],

    //     language:{
    //             "sProcessing":     "Procesando...",
    //             "sLengthMenu":     "Mostrar _MENU_ registros",
    //             "sZeroRecords":    "No se encontraron resultados",
    //             "sEmptyTable":     "Ningún dato disponible en esta tabla",
    //             "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    //             "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    //             "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    //             "sInfoPostFix":    "",
    //             "sSearch":         "",
    //             "sUrl":            "",
    //             "sInfoThousands":  ",",
    //             "sLoadingRecords": "Cargando...",
    //             "oPaginate": {
    //                 "sFirst":    "Primero",
    //                 "sLast":     "Último",
    //                 "sNext":     "Siguiente",
    //                 "sPrevious": "Anterior"
    //             },

    //             "oAria": {
    //                 "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
    //                 "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    //             }
    //                 }
    //      });






});



	function showDataCurso(id_grupo){
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: baseUrl + "emp/RptController/showDataCurso",
			data:{idcg:id_grupo},
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
	function showAllAlumnoCurso(id_grupo){
	$.ajax({
			type: 'ajax',
			method: 'get',
			url: baseUrl + "emp/RptController/showListAlumnosPorGrupo",
			data:{idcg:id_grupo},
			async: false,
			dataType: 'json',
			success: function(data){

				var gtnumeronotas= $("#numnotasdelcurso").val();

				if(gtnumeronotas=='1'){
					$('#thnot1').removeClass('hidden');
				}

				if(gtnumeronotas=='2'){
					$('#thnot1').removeClass('hidden');
					$('#thnot2').removeClass('hidden');
				}

				if(gtnumeronotas=='3'){
					$('#thnot1').removeClass('hidden');
					$('#thnot2').removeClass('hidden');
					$('#thnot3').removeClass('hidden');
				}

				if(gtnumeronotas=='4'){
					$('#thnot1').removeClass('hidden');
					$('#thnot2').removeClass('hidden');
					$('#thnot3').removeClass('hidden');
					$('#thnot4').removeClass('hidden');
				}


				var html = '';
				var i;
				var condicionalm='No definido';
				for (i=0; i<data.length; i++){

					if(gtnumeronotas=='1'){
						ntdnots='<td>'+data[i].nota1+'</td>';
					}

					if(gtnumeronotas=='2'){
						ntdnots='<td>'+data[i].nota1+'</td>'+
								'<td>'+data[i].nota2+'</td>';
					}

					if(gtnumeronotas=='3'){
						ntdnots='<td>'+data[i].nota1+'</td>'+
								'<td>'+data[i].nota2+'</td>'+
								'<td>'+data[i].nota3+'</td>';
					}

					if(gtnumeronotas=='4'){
						ntdnots='<td>'+data[i].nota1+'</td>'+
								'<td>'+data[i].nota2+'</td>'+
								'<td>'+data[i].nota3+'</td>'+
								'<td>'+data[i].nota4+'</td>';
					}



					if(data[i].condicion=='1'){
						condicionalm='✅ Aprobado';
					}
					if(data[i].condicion=='2'){
						condicionalm='🔴 Desaprobado';
					}
					if(data[i].condicion=='0'){
						condicionalm='N.A';
					}


					html +='<tr>'+
							'<td>'+data[i].numerodocumento+'</td>'+
							'<td>'+data[i].apellidos+', '+data[i].nombres+'</td>'+
										ntdnots+
							'<td>'+data[i].promedio+'</td>'+
							'<td>'+condicionalm+'</td>'+
						'</tr>';
				}

				if (html==''){
					$('#showListaAlumnosForCurso').html('<tr><td colspan="13"><p class="text-center"><label>No hay alumnos regitrados en el curso.</label></p><td><tr>');
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








