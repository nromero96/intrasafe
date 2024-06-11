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

    //btnAdd
    $('#btnAdd').click(function(){
        $('#mymodal').modal('show');
        $('.tit-modal').text('Registrar Certificado');
        $('#formCertificado').attr('action', baseUrl + "CertificadoInternacionalController/addCertificado");
        $('.diinputs').addClass('label-floating');
    });

    //Get Alumno
	$('#queryalumno').on('keyup', function() {
		var query = $(this).val();
		if (query != '') {
			$.ajax({
				url: baseUrl + "CertificadoInternacionalController/buscarAlumnos",
				method: "POST",
				data: {queryalumno: query},
				dataType: "json",
				success: function(data) {
					$('#resultalumnos').empty();
					$.each(data, function(key, value) {
						$('#resultalumnos').append('<a href="#" class="list-group-item list-group-item-action" data-id="'+value.id_alumno+'">'+value.nombres+' '+value.apellidos+' ('+value.numerodocumento+')</a>');
					});
				}
			});
		} else {
			$('#resultalumnos').empty();
		}
	});
	

    // Manejar clic en un elemento de la lista de resultados
	$(document).on('click', '.list-group-item', function() {
		var nombre = $(this).text();
		var id_alumno = $(this).data('id');
		
		// Actualizar el campo de búsqueda con el nombre del alumno seleccionado
		$('#queryalumno').val(nombre);
		
		// Almacenar el ID del alumno seleccionado en un campo oculto
		$('#id_alumno').val(id_alumno);
		
		// Limpiar el resultado de búsqueda
		$('#resultalumnos').empty();
	});


	//Editar
	$('#showdata').on('click', '.btnEdit', function(){
		var id = $(this).attr('data');
		$('#mymodal').modal('show');
		$('.diinputs').removeClass('label-floating');
		$('#mymodal').find('.tit-modal').text('Actualizar Certificado');
		$('#formCertificado').attr('action', baseUrl + "CertificadoInternacionalController/updateCertificado");

		$.ajax({
			type: 'ajax',
			method: 'get',
			url: baseUrl + "CertificadoInternacionalController/editCertificado",
			data: {id: id},
			async: false,
			dataType: 'json',
			success: function(data){
				$('input[name=txtIdCertificado]').val(data.id);
				$('input[name=id_alumno]').val(data.id_alumno);
				$('input[name=queryalumno]').val(data.alumno_nombre+' '+data.alumno_apellido+' ('+data.alumno_numerodocumento+')');
				$('input[name=codigo]').val(data.codigo);
				$('input[name=curso]').val(data.curso);
				$('input[name=expira]').val(data.expira);
			},
			error: function(){
				 alert('Error al Editar');
			}
		});
	});

    //Actualiza
    $('#formCertificado').submit(function(e){
		e.preventDefault();
		
        var url = $('#formCertificado').attr('action');
		var formData = new FormData($('#formCertificado')[0]);
	
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
	            $('#formCertificado')[0].reset();
	            swal("Echo!", "Los datos fueron actualizados!", "success");
	            dnotificacion.showNotification('top', 'right');
	            //refrescar la pagina en 1 segundo
				setTimeout(function(){
					location.reload();
				}, 1000);

	        },
	        error: function() {
	            alert('Error');
	        }
	    });
		

    });

	//Eliminar
	$('#showdata').on('click', '.btnDelete', function(){
		var id = $(this).attr('data');
		// Confirmación de alerta
		swal({
			title: "¿Estás seguro?",
			text: "Una vez eliminado, no podrá recuperar este dato!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				$.ajax({
					type: 'post', // Cambiado a 'post' para seguir la convención REST para eliminación
					url: baseUrl + "CertificadoInternacionalController/deleteCertificado",
					data: {id: id},
					async: false,
					dataType: 'json',
					success: function(data){
						if(data.message == "eliminado"){
							swal("¡Hecho!", 'Certificado eliminado correctamente', "success");
							setTimeout(function(){
								location.reload();
							}, 1000);
						} else {
							swal("¡Error!", data.message, "error");
						}
					},
					error: function(){
						alert('Error al eliminar');
					}
				});
			}
		});
	});

	//reset form clic input type reset
	$('#btnReset').click(function(){
		$('#formCertificado')[0].reset();
	});

});

