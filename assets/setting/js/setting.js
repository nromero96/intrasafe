
    $(document).ready(function() {
        $('#formbgcertificado').attr('action', baseUrl + 'SettingController/saveBgCertificado');


        /*Ver Imagen certificado actual*/
        var estcert = '1';
        $('div').removeClass('label-floating');
        $('.dvfg').addClass('form-group-no');
        $.ajax({
            type: 'ajax',
            method: 'get',
            url: baseUrl + "SettingController/viewBgCertificado",
            data: {estado: estcert},
            async: false,
            dataType: 'json',
            success: function(data) {
                if(data.bg_cerficado_imagen){
                    $('#previewcertif1').html('<img src="'+baseUrl+'uploads/bgcertificado/'+data.bg_cerficado_imagen+'" style="width: 100%;height: auto;" ></img>');
                }else{
                    $('#previewcertif1').html('<br><br>(No hay imagen)');
                    $('#comboxdl').hdie();
                }
            },
            error: function() {
                swal("¡Ups!", "Algo salio mal.! Refresque la página.", "error");
            }
        });
        /*................................*/

    });
    
    showFirmaGerentes();
    
    /*Boton Agregar Nueva Firma*/
    $('#addFirmaGerente').click(function(){
        $('#mymodal').modal({backdrop: 'static',});
        $('#formdatagerente').attr('action', baseUrl + 'SettingController/saveFirmaGerente');
        $('#file_firma_gerente').prop('required',true);
        $('#savefirmagerente').text('Guardar');
    });
    
    /*Boton Editar Firma*/
	$('#showlistafirmas').on('click', '.btnEdit', function(){
		var id = $(this).attr('data');
		$('#mymodal').modal({backdrop: 'static',});
		$('#mymodal').find('.tit-modal').text('Actualizar Datos');
		$('#file_firma_gerente').prop('required',false);
		$('#savefirmagerente').text('Actualizar');
		
		$('#formdatagerente').attr('action', baseUrl + "SettingController/updateFirmaGerente");
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: baseUrl + "SettingController/editFirmaGerente",
			data: {id: id},
			async: false,
			dataType: 'json',
			success: function(data){
			    $('input[name=txtidfmgerente]').val(data.id_firma_gerente);
				$('input[name=txtnombregerente]').val(data.nombres_gerente);
				$('input[name=txtapellidogerete]').val(data.apellidos_gerente);
				$('input[name=txtcargo]').val(data.cargo);
				$('input[name=txtprofesion]').val(data.gerenteprofesion);
				$('input[name=txtcodcip]').val(data.gerentecip);
				$('#previewimg1').html('<img src="'+baseUrl+'uploads/firmas/'+data.img_firma_gerente+'" style="width: 164px;height: 72px;" ></img>');
			},
			error: function(){
				 swal("¡Ups!", "Algo salió mal...! Intentelo nuevamente", "error");
			}
		});
	}

	);
    
    /*Guardar Firma*/
    $('#formdatagerente').submit(function(e){
        e.preventDefault();
        
        var url = $('#formdatagerente').attr('action');
        var formData = new FormData($('#formdatagerente')[0]);

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
                $('#modalcapac').modal('hide');
                if (respuesta.type == 'add') {
                    var type = 'Agregado'
                } else if (respuesta.type == 'update') {
                    var type = 'Actualizado'
                }
                swal("Echo!", "Se registró correctamente.!", "success");
                location.reload();
            },
            error: function() {
                alert('Error al registrar');
            }
        });

    });
    
    
    
    
    
    
    /*Listar Firma Gerentes*/
    function showFirmaGerentes(){
		$.ajax({
			type: 'ajax',
            method: 'get',
			url: baseUrl + "SettingController/showAllFirmasGerente",
			async: false,
			dataType: 'json',
			success: function(data){
				var html = '';
				var i;
				for (i=0; i<data.length; i++){
					if(data[i].estado=='1'){
                        var estadtxt='Activo'
					}else if(data[i].estado=='0'){
                        var estadtxt='Inactivo'
					}
					html +='<tr>'+
								'<td><img src="'+baseUrl+'/uploads/firmas/'+data[i].img_firma_gerente+'" width="50"></td>'+
								'<td>'+data[i].nombres_gerente+' '+data[i].apellidos_gerente+'</td>'+
								'<td>'+data[i].cargo+'</td>'+
								'<td class="td-actions text-right">'+
								'<a href="javascript:;" type="button" title="Editar" class="btn btn-success btnEdit" data="'+data[i].id_firma_gerente+'"><i class="material-icons">edit</i></a>'
								'</td>'+
							'</tr>';
				}
				$('#showlistafirmas').html(html);
			},
			error:function(){
				swal("¡Ups!", "Algo salió mal.! Refresque la página.", "error");
			}

		});

	}


    /*Guarda imagen del fondo certificado*/
    $('#savebgcertificado').click(function() {
        var url = $('#formbgcertificado').attr('action');
        var formData = new FormData($('#formbgcertificado')[0]);

        var file_bg_cerficado = $('input[name=file_bg_cerficado]');
        var resultad = '';

        if(file_bg_cerficado.val()==''){
            swal("¡Alerta!", "Por favor seleccione el nuevo fondo!", "info");
        }else{
            resultad +='1';
        }

        if(resultad == '1'){
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
                $('#modalcapac').modal('hide');
                if (respuesta.type == 'add') {
                    var type = 'Agregado'
                } else if (respuesta.type == 'update') {
                    var type = 'Actualizado'
                }
                swal("Echo!", "El fondo del certificado fue actualizado!", "success");
                location.reload();
                //$('.alert-success').html('Curso '+type+' con éxito</b>').fadeIn().delay(4000).fadeOut('slow');
            },
            error: function() {
                swal("¡Ups!", "Algo salio mal :( ! Intentelo nuevamente.", "error");
            }
        });

        }
    });
    /*...................*/

