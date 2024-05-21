$(function(){
	//Lista de cursos para notas por curso================
	showListCert();


	function showListCert(){
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: baseUrl + "RptController/showListCert",
			async: false,
			dataType: 'json',
			success: function(data){
				var html = '';
				var i;
				for (i=0; i<data.length; i++){
					html +='<tr>'+
							'<td>'+'<a class="txtcolorcert btnVCert" href="javascript:;" type="button" title="Ver Certificado" data1="'+data[i].id_alumno_grupo+'" data2="'+data[i].id_curso+'" data3="'+data[i].descripcion+'">'+data[i].serie+''+data[i].correlativo+'</a>'+'</td>'+
							'<td>'+data[i].razonsocial+'</td>'+
							'<td>'+data[i].nombrecurso+'</td>'+
							'<td><span class="hidden">'+data[i].fechainiciocertificadoparaorden+'</span>'+data[i].fechainiciocertificado+'</td>'+
							'<td><span class="hidden">'+data[i].fecha_vigenicaparaorden+'</span>'+data[i].fecha_vigenica+'</td>'+
							'<td>'+data[i].apellidos+' '+data[i].nombres+'</td>'+
							'<td>'+data[i].numerodocumento+'</td>'+
							'<td>'+data[i].promedio+'</td>'+			
						'</tr>';
					}
					$('#showListaCertificado').html(html);
					$('#loadgif').addClass('hidden');

				},
				error:function(){
					swal("¡Ups!", "Algo salió mal!. Refresca la página", "error");
				}
		});
	}


	$('#showListaCertificado').on('click', '.btnVCert', function(){
			var getidalg = $(this).attr('data1');

			var getidcs = $(this).attr('data2');
			var getdescs = $(this).attr('data3');
			
			var url = baseUrl+'PdfsController/viewcertificado?idalg='+getidalg+'&idcs='+getidcs+'&safesi%20training';
		    window.open(url, '_blank');

	 		/* if (getdescs==''){
	 			var url = baseUrl+'PdfsController/getCertAlumno?safesi%20training&num%20&idalg='+getidalg+'&0i8i30k1.0.MHD-PXKqd_8&q=certificado&oq=certificado&idcs='+getidcs+'&psy-ab.3..35i39k1j0&certif='+getidalg+'0i6';
				window.open(url, '_blank');
	 		}else{
	 			var url = baseUrl+'PdfsController/getCertDescripAlumno?safesi%20training&num%20&idalg='+getidalg+'&0i8i30k1.0.MHD-PXKqd_8&q=certificado&oq=certificado&idcs='+getidcs+'&psy-ab.3..35i39k1j0&certif='+getidalg+'0i6';
				window.open(url, '_blank');
	 		} */
	});


	$('#showbtns').on('click', '.btnexportar', function(){
				
	 			var url = baseUrl+'rptController/expListCert';
				window.open(url, '_top');
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