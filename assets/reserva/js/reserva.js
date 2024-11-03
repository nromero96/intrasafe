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

	//Ver Pago de la Reserva...
	$('#showreserpagpendaprob').on('click', '.btnViewPagoReserva', function(){
		var idr = $(this).attr('data');
		$('#modalverpagoreserva').modal('show');
		$('#modalverpagoreserva').find('.tit-modal').text('Detalle del Pago');
		$('#formVPagoReserva').attr('action', baseUrl + "ReservaController/saveReserPagovaVerificado");
		$.ajax({
			method: 'GET',
			url: baseUrl + "ReservaController/viewReservaPago",
			data: {id: idr},
			async: false,
			dataType: 'json',
			success: function(data){
				$('#lblnombanco').text(data.nombre_banco);
				$('#lblcodoperacion').text(data.cod_operacion);
				$('#lblfechaperacion').text(data.fecha_transaccion);
				$('#lblcantidadep').text(data.pagototal);
				$('input[name=txtidpago]').val(data.id_pago);
			},
			error: function(){
				 alert('Erro al mostrar Detalle');
			}
		});

		//Listar Cursos
		$.ajax({
			method: 'GET',
			url: baseUrl + "ReservaController/showListReservasPorPago",
			data: {id: idr},
			async: false,
			dataType: 'json',
			success: function(data){
						var html = '';
						var i;
						for (i=0; i<data.length; i++){
							if(data[i].ncupos =='1'){
								rescups = data[i].ncupos+' Cupo';
							}else{
								rescups = data[i].ncupos+' Cupos';
							}
							html +='<tr>'+
								'<td>'+data[i].nombrecurso+'</td>'+
								'<td>'+rescups+'</td>'+
								'<td>'+'S/.'+data[i].costo_total+'</td>'+
							'</tr>';

						}
					$('#showlisrespag').html(html);	
			},
			error: function(){
				 alert('Erro al mostrar Detalle');
			}
		});
	});



	//EnviarPago Verificar
	$('#btnConfirmPago').click(function(){
		var url = $('#formVPagoReserva').attr('action');
		var data = $('#formVPagoReserva').serialize();
		var idreserv = $('input[name=txtidpago]');
		var estadopago = $('input:radio[name=reservapagoverif]:checked');

		if(estadopago.val()=='0' || estadopago.val()=='2'){
				$.ajax({
				method: 'GET',
				url: url,
				data: data,
				async: false,
				dataType:'json',
				success: function(respuesta){
					$('#modalverpagoreserva').modal('hide');
						$('#formVPagoReserva')[0].reset();
						if(respuesta.type=='add'){
							var type='Agregado'
						}else if(respuesta.type=='update'){
                             var type='Actualizado'
						}
						setInterval("location.reload()",900);
						dnotificacion.showNotification('top','right');
				},
				error: function(){
					bootbox.alert('Error al verificar');
				}
			});

		}else{
			bootbox.alert('Favor de seleccionar el estado de pago.'+'<br>'+'Gracias!!!');
		}
	});





	//Selec Cliente Tipo
	$('select#tipocliente').on('change',function(){
    	var tipocliente = $(this).val();

    	//Empresa
    	if(tipocliente =='EM'){
    		$('.avisolistares').hide();
    		$('#hdlistrsEm').removeClass('hidden');
    		$('#hdlistrspgnovEm').removeClass('hidden');
    		$('#hdlistrspgvEm').removeClass('hidden');
    		$('#hdlistrsPn').addClass('hidden');
    		$('#hdlistrspgnovPn').addClass('hidden');
    		$('#hdlistrspgvPn').addClass('hidden');

    			//Reservas
			 	$.ajax({
					method: 'GET',
					url: baseUrl + "ReservaController/showAllReserva",
					data: {id: tipocliente},
					async: false,
					dataType: 'json',
					success: function(data){
						var html = '';
						var i;
						for (i=0; i<data.length; i++){
							if(data[i].ncupos >='2'){
								rescups = data[i].ncupos+' Cupos';
							}else{
								rescups = data[i].ncupos+' Cupo';
							}

							html +='<tr>'+
								'<td>'+'#'+'</td>'+
								'<td>'+data[i].ruc+'</td>'+
								'<td>'+data[i].razonsocial+'</td>'+
								'<td>'+data[i].nombrecurso+'</td>'+
								'<td>'+rescups+'</td>'+
								'<td>'+'S/.'+data[i].costo_total+'</td>'+
								'<td class="td-actions text-right">'+'<a href="javascript:;" type="button" title="Ver" class="btn btn-primary btnDescReservaEM" data="'+data[i].id_reserva+'"><i class="material-icons">strikethrough_s</i> REALIZAR DESCUENTO</a>'+'</td>'+
							'</tr>';

						}
					$('#showlistreservas').html(html);	
					},
					error:function(){
						alert('Error Al Listar');
					}
				});

    			//Reservas Pagos Pendientes de verificar
			 	$.ajax({
					method: 'GET',
					url: baseUrl + "ReservaController/viewPagoReservaPorVerifcar",
					data: {id: tipocliente},
					async: false,
					dataType: 'json',
					success: function(data){
						var html = '';
						var i;
						for (i=0; i<data.length; i++){
							if(data[i].ncupos =='1'){
								rescups = data[i].ncupos+' Cupo';
							}else{
								rescups = data[i].ncupos+' Cupos';
							}

							html +='<tr>'+
								'<td>'+'#'+'</td>'+
								'<td>'+data[i].ruc+'</td>'+
								'<td>'+data[i].razonsocial+'</td>'+
								'<td>'+data[i].fecha_transaccion+'</td>'+
								'<td>'+'S/.'+data[i].pagototal+'</td>'+
								'<td class="td-actions text-right">'+
									'<a href="javascript:;" type="button" title="Ver" class="btn btn-info btnViewPagoReserva" data="'+data[i].id_pago+'"><i class="material-icons">visibility</i> VER PAGO</a>'+
								'</td>'+
							'</tr>';
						}

					$('#showreserpagpendaprob').html(html);	
					},
					error:function(){
						alert('Error Al Listar');
					}
				});

    			//Reservas Pagos Verificados
			 	$.ajax({
					method: 'GET',
					url: baseUrl + "ReservaController/showAllReservaPagoVerificado",
					data: {id: tipocliente},
					async: false,
					dataType: 'json',
					success: function(data){
						var html = '';
						var i;
						for (i=0; i<data.length; i++){
							if(data[i].ncupos >='2'){
								rescups = data[i].ncupos+' Cupos';
							}else{
								rescups = data[i].ncupos+' Cupo';
							}

							html +='<tr>'+
								'<td>'+'#'+'</td>'+
								'<td>'+data[i].ruc+'</td>'+
								'<td>'+data[i].razonsocial+'</td>'+
								'<td>'+data[i].nombrecurso+'</td>'+
								'<td>'+rescups+'</td>'+
								'<td>'+'S/.'+data[i].costo_total+'</td>'+
								'<td class="td-actions text-right">'+'<a href="javascript:;" type="button" title="Ver" class="btn btn-success btnViewPagoOkEM" data="'+data[i].id_reserva+'"><i class="material-icons">visibility</i></a>'+'</td>'+
							'</tr>';
						}
					$('#showreserpagoaprobado').html(html);	

					},
					error:function(){
						alert('Error Al Listar');
					}
				});

	    //Persona Natural
    	}if(tipocliente =='PN'){
    		$('.avisolistares').hide();
    		$('#hdlistrsEm').addClass('hidden');
    		$('#hdlistrspgnovEm').addClass('hidden');
    		$('#hdlistrspgvEm').addClass('hidden');
    		$('#hdlistrsPn').removeClass('hidden');
    		$('#hdlistrspgnovPn').removeClass('hidden');
    		$('#hdlistrspgvPn').removeClass('hidden');

    			//Reservas
    			$.ajax({
					method: 'GET',
					url: baseUrl + "ReservaController/showAllReserva",
					data: {id: tipocliente},
					async: false,
					dataType: 'json',
					success: function(data){
						var html = '';
						var i;
						for (i=0; i<data.length; i++){
							if(data[i].ncupos >='2'){
								rescups = data[i].ncupos+' Cupos';
							}else{
								rescups = data[i].ncupos+' Cupo';
							}

							html +='<tr>'+
								'<td>'+'#'+'</td>'+
								'<td>'+data[i].ruc+'</td>'+
								'<td>'+data[i].nombrecontacto+'</td>'+
								'<td>'+data[i].nombrecurso+'</td>'+
								'<td>'+rescups+'</td>'+
								'<td>'+'S/.'+data[i].costo_total+'</td>'+
								'<td class="td-actions text-right">'+'<a href="javascript:;" type="button" title="Ver" class="btn btn-primary btnDescReservaPN" data="'+data[i].id_reserva+'"><i class="material-icons">strikethrough_s</i> REALIZAR DESCUENTO</a>'+'</td>'+
							'</tr>';
						}

					$('#showlistreservas').html(html);	
					},
					error:function(){
						alert('Error Al Listar');
					}
				});

    			//Reservas Pagos Pendientes de verificar
    			$.ajax({
					method: 'GET',
					url: baseUrl + "ReservaController/viewPagoReservaPorVerifcar",
					data: {id: tipocliente},
					async: false,
					dataType: 'json',
					success: function(data){
						var html = '';
						var i;
						for (i=0; i<data.length; i++){
							if(data[i].ncupos >='2'){
								rescups = data[i].ncupos+' Cupos';
							}else{
								rescups = data[i].ncupos+' Cupo';
							}

							html +='<tr>'+
								'<td>'+'#'+'</td>'+
								'<td>'+data[i].ruc+'</td>'+
								'<td>'+data[i].apellidoscontacto+' '+data[i].nombrecontacto+'</td>'+
								'<td>'+data[i].fecha_transaccion+'</td>'+
								'<td>'+'S/.'+data[i].pagototal+'</td>'+
								'<td class="td-actions text-right">'+
									'<a href="javascript:;" type="button" title="Ver" class="btn btn-info btnViewPagoReserva" data="'+data[i].id_pago+'"><i class="material-icons">visibility</i> VER PAGO</a>'+
								'</td>'+
							'</tr>';
						}
					$('#showreserpagpendaprob').html(html);	
					},
					error:function(){
						alert('Error Al Listar');
					}
				});



    			//Reservas Pagos Verificados
    			$.ajax({
					method: 'GET',
					url: baseUrl + "ReservaController/showAllReservaPagoVerificado",
					data: {id: tipocliente},
					async: false,
					dataType: 'json',
					success: function(data){
						var html = '';
						var i;
						for (i=0; i<data.length; i++){
							if(data[i].ncupos >='2'){
								rescups = data[i].ncupos+' Cupos';
							}else{
								rescups = data[i].ncupos+' Cupo';
							}

							html +='<tr>'+
								'<td>'+'#'+'</td>'+
								'<td>'+data[i].ruc+'</td>'+
								'<td>'+data[i].nombrecontacto+'</td>'+
								'<td>'+data[i].nombrecurso+'</td>'+
								'<td>'+rescups+'</td>'+
								'<td>'+'S/.'+data[i].costo_total+'</td>'+
								'<td class="td-actions text-right">'+'<a href="javascript:;" type="button" title="Ver" class="btn btn-success btnViewPagoOkPN" data="'+data[i].id_reserva+'"><i class="material-icons">visibility</i></a>'+'</td>'+
							'</tr>';
						}
					$('#showreserpagoaprobado').html(html);	

					},

					error:function(){
						alert('Error Al Listar');
					}
				});
    	}
	});
	//........................................................ 



	//Realizar Descuento EMPRESA...
	$('#showlistreservas').on('click', '.btnDescReservaEM', function(){
		var idr = $(this).attr('data');
		$('#modalverreservaEM').modal('show');
		$('#formDescuentoResvEM').attr('action', baseUrl + "ReservaController/updateReservaPrecioEM");
		$.ajax({
			method: 'GET',
			url: baseUrl + "ReservaController/viewReserva",
			data: {id: idr},
			async: false,
			dataType: 'json',
			success: function(data){

				if(data.ncupos >='2'){
					ncpos3 = data.ncupos+' Cupos';
				}else{
					ncpos3 = data.ncupos+' Cupo';
				}
				$('#lblnumruc').text(data.ruc);
				$('#lblrazonsocial').text(data.razonsocial);
				$('#lblcurso').text(data.nombrecurso);
				$('#lblncupos').text(ncpos3);
				$('#lblpreciototal').text('S/.'+data.costo_total);

				$('input[name=txtidreservaparadescEM]').val(data.id_reserva);
			},
			error: function(){
				 alert('Erro al mostrar Detalle');
			}
		});
	});

	$('#btnSaveDEM').click(function(){
		var url = $('#formDescuentoResvEM').attr('action');
		var data = $('#formDescuentoResvEM').serialize();
			$.ajax({
				method: 'POST',
				url: url,
				data: data,
				async: false,
				dataType:'json',
				success: function(respuesta){
					$('#modalverreservaEM').modal('hide');
						$('#formDescuentoResvEM')[0].reset();
						if(respuesta.type=='add'){
							var type='Agregado'
						}else if(respuesta.type=='update'){
                             var type='Actualizado'
						}
						dnotificacion.showNotification('top','right');
						setInterval("location.reload()",900);
				},
				error: function(){
					alert('Error 2');
				}
			});
	});
	//..
	//............................
	//Realizar Descuento Persona Natural...
	$('#showlistreservas').on('click', '.btnDescReservaPN', function(){
		var idr = $(this).attr('data');
		$('#modalverreservaPN').modal('show');
		$('#formDescuentoResvPN').attr('action', baseUrl + "ReservaController/updateReservaPrecioPN");
		$.ajax({
			method: 'GET',
			url: baseUrl + "ReservaController/viewReserva",
			data: {id: idr},
			async: false,
			dataType: 'json',
			success: function(data){
				if(data.ncupos >='2'){
					ncpos1 = data.ncupos+' Cupos';
				}else{
					ncpos1 = data.ncupos+' Cupo';
				}

				$('#lblnumdnipn').text(data.ruc);
				$('#lblnombrepn').text(data.nombrecontacto);
				$('#lblcursopn').text(data.nombrecurso);
				$('#lblncupospn').text(ncpos1);
				$('#lblpreciototalpn').text('S/.'+data.costo_total);
				$('input[name=txtidreservaparadescPN]').val(data.id_reserva);
			},
			error: function(){
				 alert('Erro al mostrar Detalle');
			}
		});
	});



	$('#btnSaveDPN').click(function(){
		var url = $('#formDescuentoResvPN').attr('action');
		var data = $('#formDescuentoResvPN').serialize();
			$.ajax({
				method: 'POST',
				url: url,
				data: data,
				async: false,
				dataType:'json',
				success: function(respuesta){
					$('#modalverreservaPN').modal('hide');
						$('#formDescuentoResvPN')[0].reset();
						if(respuesta.type=='add'){
							var type='Agregado'
						}else if(respuesta.type=='update'){
                             var type='Actualizado'
						}
						dnotificacion.showNotification('top','right');
						setInterval("location.reload()",900);
				},
				error: function(){
					alert('Error 2');
				}
			});
	});

	//............................


	//Ver Pago aprobado/Confirmado Empresa
	$('#showreserpagoaprobado').on('click', '.btnViewPagoOkEM', function(){
		var idr = $(this).attr('data');
		$('#modalverreservapagoconfirmadoem').modal('show');
		$.ajax({
			method: 'GET',
			url: baseUrl + "ReservaController/viewReservaPagoConfirmado",
			data: {id: idr},
			async: false,
			dataType: 'json',
			success: function(data){
				if(data.ncupos >='2'){
					ncpos2 = data.ncupos+' Cupos';
				}else{
					ncpos2 = data.ncupos+' Cupo';
				}

				$('#lblnumrucpgdem').text(data.ruc);
				$('#lblrazonsocialpgdem').text(data.razonsocial);
				$('#lblcursopgdem').text(data.nombrecurso);
				$('#lblncupopgdem').text(ncpos2);

				$('#lblnombrebancpgdem').text(data.nombre_banco);
				$('#lblpagototalpgdem').text('S/.'+data.pagototal);
				$('#lblcodoperacionpgdem').text(data.cod_operacion);
				$('#lblfechatranspgdem').text(data.fecha_transaccion);
			},
			error: function(){
				 alert('Erro al mostrar Detalle');
			}
		});
	});

	//Ver Pago aprobado/Confirmado Persona Natural...
	$('#showreserpagoaprobado').on('click', '.btnViewPagoOkPN', function(){
		var idr = $(this).attr('data');
		$('#modalverreservapagoconfirmadopn').modal('show');
		$.ajax({
			method: 'GET',
			url: baseUrl + "ReservaController/viewReservaPagoConfirmado",
			data: {id: idr},
			async: false,
			dataType: 'json',
			success: function(data){
				if(data.ncupos >='2'){
					ncpos = data.ncupos+' Cupos';
				}else{
					ncpos = data.ncupos+' Cupo';
				}
				$('#lblnumrucpgdpn').text(data.ruc);
				$('#lblrazonsocialpgdpn').text(data.nombrecontacto);
				$('#lblcursopgdpn').text(data.nombrecurso);
				$('#lblncupopgdpn').text(ncpos);
				$('#lblnombrebancpgdpn').text(data.nombre_banco);
				$('#lblpagototalpgdpn').text('S/.'+data.pagototal);
				$('#lblcodoperacionpgdpn').text(data.cod_operacion);
				$('#lblfechatranspgdpn').text(data.fecha_transaccion);
			},
			error: function(){
				 alert('Erro al mostrar Detalle');
			}
		});
	});


});

$(function(){
  var hash = window.location.hash;
  hash && $('ul.nav a[href="' + hash + '"]').tab('show');
});

