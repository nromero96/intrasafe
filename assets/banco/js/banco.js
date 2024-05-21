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

	showAllBanco();

	//Boton Agragar

	$('#btnAddcuenta').click(function(){
		$('#modalnuevacuenta').modal('show');
		$('div').addClass('label-floating');
		$('#modalnuevacuenta').find('.tit-modal').text('Agregar Nuevo Cuenta');
		$('#formCuentaBanco').attr('action', baseUrl + 'BancoController/saveBanco');

	});



	//Guarda o Actualiza

	$('#btnSaveCuenBanc').click(function(){
		var url = $('#formCuentaBanco').attr('action');
		var data = $('#formCuentaBanco').serialize();


		//validar
		var nombrebanco = $('input[name=txtnombrebanco]');
		var titular = $('input[name=txtnombredeltitular]');
		var numcuenta = $('input[name=txtnumerodelacuenta]');
		var resultad = '';

		if(nombrebanco.val()==''){
			$('#dnombrebanco').addClass('has-error');
		}else{
			$('#dnombrebanco').removeClass('has-error');
			resultad +='1';
		}

		if(titular.val()==''){
			$('#dnombretitular').addClass('has-error');
		}else{
			$('#dnombretitular').removeClass('has-error');
			resultad +='2';
		}

		if(numcuenta.val()==''){
			$('#dnumcuenta').addClass('has-error');
		}else{
			$('#dnumcuenta').removeClass('has-error');
			resultad +='3';
		}

			if(resultad=='123'){
				$.ajax({
				type:'ajax',
				method: 'post',
				url: url,
				data: data,
				async: false,
				dataType:'json',
				success: function(respuesta){
					showAllBanco();
					$('#modalnuevacuenta').modal('hide');
					$('#formCuentaBanco')[0].reset();
					dnotificacion.showNotification('top','right');
				},
				error: function(){
					swal("¡Ups!", "Algo salió al guardar.! Intentelo nuevamente", "error");
				}
			});
		    }
	});


	//Editar
	$('#showdatabancos').on('click', '.btnEdit', function(){
		var id = $(this).attr('data');
		$('#modalnuevacuenta').modal('show');
		$('div').removeClass('label-floating');
		$('#modalnuevacuenta').find('.tit-modal').text('Actualizar Datos');
		$('#formCuentaBanco').attr('action', baseUrl + "BancoController/updateBanco");
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: baseUrl + "BancoController/editBanco",
			data: {id: id},
			async: false,
			dataType: 'json',
			success: function(data){
				$('input[name=txtnombrebanco]').val(data.nombre_banco);
				$('input[name=txtnombredeltitular]').val(data.nombre_del_titular);
				$('input[name=txtnumerodelacuenta]').val(data.numero_cuenta);
				$('input[name=txtidbanco]').val(data.id_banco);
			},
			error: function(){
				 swal("¡Ups!", "Algo salió mal.! Intentelo nuevamente", "error");
			}
		});
	}

	);


	//Funcion Mostar Lista
	function showAllBanco(){
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: baseUrl + "BancoController/showAllBanco",
			async: false,
			dataType: 'json',
			success: function(data){
				var html = '';
				var i;
				var num=1;
				for (i=0; i<data.length; i++){
					if(data[i].estado=='1'){
                        var estadtxt='Activo'
					}else if(data[i].estado=='0'){
                        var estadtxt='Inactivo'
					}
					html +='<tr>'+
								'<td>'+ num++ +'</td>'+
								'<td>'+data[i].nombre_banco+'</td>'+
								'<td>'+data[i].nombre_del_titular+'</td>'+
								'<td>'+data[i].numero_cuenta+'</td>'+
								'<td class="td-actions text-right">'+
								'<a href="javascript:;" type="button" title="Editar" class="btn btn-success btnEdit" data="'+data[i].id_banco+'"><i class="material-icons">edit</i></a>'+
								' <a href="javascript:;" type="button" title="Eliminar" class="btn btn-danger item-delete" data="'+data[i].id_banco+'"><i class="material-icons">clear</i></a>'
								'</td>'+
							'</tr>';
				}
				$('#showdatabancos').html(html);
			},
			error:function(){
				swal("¡Ups!", "Algo salió mal.! Refresque la página.", "error");
			}

		});

	}





	//boton reset

	$("#btnResetCB").click(function(){

	/* Single line Reset function executes on click of Reset Button */

	$("#formCuentaBanco")[0].reset();

	});





   //Eliminar

	$('#showdatabancos').on('click', '.item-delete', function (){
		var id = $(this).attr('data');

		swal({
		  title: "¿Estás seguro?",
		  text: "Una vez que se elimine, ¡no podrá recuperar!",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
			$.ajax({
				type: 'ajax',
				method: 'get',
				async: false,
				url: baseUrl + "BancoController/deleteBanco",
				data:{id:id},
				success: function(respuesta){
						$('#modalnuevacuenta').modal('hide');
						showAllBanco();
				},
				error: function(){
					swal("¡Ups!", "Algo salió mal.! Intentelo nuevamente", "error");
				}
			});

		    swal("¡Echo! ¡El banco ha sido eliminado!", {
		      icon: "success",
		    });

		  } else {
		    
		  }
		});

	});

});