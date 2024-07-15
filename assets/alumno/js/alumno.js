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


	//Editar
	$('#showdata').on('click', '.btnEdit', function(){
		var id = $(this).attr('data');
		$('#mymodal').modal('show');
		$('div').removeClass('label-floating');
		$('#mymodal').find('.tit-modal').text('Actualizar Alumno');
		$('#formAlumno').attr('action', baseUrl + "AlumnoController/updateAlumno");

		$.ajax({
			type: 'GET',
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
					url: baseUrl + "AlumnoController/deleteAlumno",
					data: {id: id},
					async: false,
					dataType: 'json',
					success: function(data){
						if(data.message == "eliminado"){
							swal("¡Hecho!", 'Alumno eliminado correctamente', "success");
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
	
	




    //DataPicker
	$( document ).ready(function() {
            $('#idfnacimiento').datepicker();
    });

	

});

