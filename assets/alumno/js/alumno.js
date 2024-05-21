$(function(){
    //Ventana de notificacion
	dnotificacion={
		showNotification: function(from, align) {
        color = Math.floor((Math.random() * 1) + 2);

        $.notify({
            icon: "notifications",
            message: "<b>ÉXITO</b> - Datos Guardados."
        },{
            type: type[color],
            timer: 2000,
            placement: {
                from: from,
                align: align
            }
        			});
    	}
	}

    //Mostar Lista
	showAllAlumno();

	//Editar
	$('#showdata').on('click', '.btnEdit', function(){
		var id = $(this).attr('data');
		$('#mymodal').modal('show');
		$('div').removeClass('label-floating');
		$('#mymodal').find('.tit-modal').text('Actualizar Alumno');
		$('#formAlumno').attr('action', baseUrl + "AlumnoController/updateAlumno");
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: baseUrl + "AlumnoController/editAlumno",
			data: {id: id},
			async: false,
			dataType: 'json',
			success: function(data){
				$('select[name=txttipodocumento]').val(data.tipodocumento);
				$('input[name=txtnumerodocumento]').val(data.numerodocumento);
				$('input[name=txtapellidos]').val(data.apellidos);
				$('input[name=txtnombres]').val(data.nombres);
				$('input[name=txtfnacimiento]').val(data.fnacimiento);
				$('input[name=txttelefono]').val(data.telefono);
				$('input[name=txtemail]').val(data.email);
				$('input[name=txtIdAlumno]').val(data.id_alumno);

				$('#previewimg1').html('<img src="'+baseUrl+'uploads/fotos/'+data.fotoperfil+'" width="150" style="width: 150px;">');

			},
			error: function(){
				 alert('Error al Editar');
			}
		});
	});

    //Actualiza
    $('#formAlumno').submit(function(e){
		e.preventDefault();
		
        var url = $('#formAlumno').attr('action');
		var formData = new FormData($('#formAlumno')[0]);
	
		$.ajax({
	        type: 'ajax',
            method: 'post',
            url: url,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            async: false,
            dataType: 'json',
	        success: function(respuesta) {
	            $('#mymodal').modal('hide');
	            $('#formAlumno')[0].reset();
	            swal("Echo!", "Los datos fueron actualizados!", "success");
	            dnotificacion.showNotification('top', 'right');
	            showAllAlumno();
	        },
	        error: function() {
	            alert('Error');
	        }
	    });
		

    });

	//Listar por empresa
	$('select#idslempresa').on('change',function(){
    	var id = $(this).val();
    	//alert(id);
    	if(id !=''){
 			$.ajax({
				type: 'ajax',
				method: 'get',
				url: baseUrl + "AlumnoController/showAllForEmpresa",
				data: {id: id},
				async: false,
				dataType: 'json',
				success: function(data){
					var html = '';
					var i;
					for (i=0; i<data.length; i++){
						html +='<tr>'+
									'<td>'+'👤'+'</td>'+
									'<td>'+data[i].numerodocumento+'</td>'+
									'<td>'+data[i].apellidos+'</td>'+
									'<td>'+data[i].nombres+'</td>'+
									'<td>'+data[i].telefono+'</td>'+
									'<td>'+data[i].email+'</td>'+
									'<td class="td-actions text-right">'+
									'<a href="javascript:;" type="button" rel="tooltip" title="Editar" class="btn btn-success btnEdit" data="'+data[i].id_alumno+'"><i class="material-icons">edit</i><div class="ripple-container"></div></a>'+'</td>'+
								'</tr>';
								    //Boton Ver: <a href="javascript:;" type="button" rel="tooltip" title="Ver" class="btn btn-info"><i class="material-icons">visibility</i><div class="ripple-container"></div></a>
					}
					$('#showdata').html(html);
				},
				error:function(){
					alert('Error');
				}
			});	
    	}else{
    		showAllAlumno();
    	}
	});

	//Funcion Mostar Lista
	function showAllAlumno(){
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: baseUrl + "AlumnoController/showAllAlumno",
			async: false,
			dataType: 'json',
			success: function(data){
				var html = '';
				var i;
				for (i=0; i<data.length; i++){
					html +='<tr>'+
								'<td>'+'👤'+'</td>'+
								'<td>'+data[i].numerodocumento+'</td>'+
								'<td>'+data[i].apellidos+'</td>'+
								'<td>'+data[i].nombres+'</td>'+
								'<td>'+data[i].telefono+'</td>'+
								'<td>'+data[i].email+'</td>'+
								'<td class="td-actions text-right">'+
								'<a href="javascript:;" type="button" rel="tooltip" title="Editar" class="btn btn-success btnEdit" data="'+data[i].id_alumno+'"><i class="material-icons">edit</i><div class="ripple-container"></div></a>'+'</td>'+
							'</tr>';
							    //Boton Ver: <a href="javascript:;" type="button" rel="tooltip" title="Ver" class="btn btn-info"><i class="material-icons">visibility</i><div class="ripple-container"></div></a>
				}
				$('#showdata').html(html);
				$('#loadgif').addClass('hidden');
			},
			error:function(){
				alert('Error');
			}
		});	
	}

    //DataPicker
	$( document ).ready(function() {
            $('#idfnacimiento').datepicker();
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
    
});

