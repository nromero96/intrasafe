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

	$('#id_radioem').click(function () {
  		$("#dslsem").removeClass("hidden");
  		$("#dslspn").addClass("hidden");
		$("#dradioslc").addClass("hidden");
		$("#dcursosyresevs").removeClass("hidden");
		orderdatalist();
    });

    $('#id_radiopn').click(function () {
		$("#dslspn").removeClass("hidden");
  		$("#dslsem").addClass("hidden");
  		$("#dradioslc").addClass("hidden");
  		$("#dcursosyresevs").removeClass("hidden");
  		orderdatalist();
    });

	$('select#idslempresa').on('change',function(){
    	var valor = $(this).val();
    	$('input[name=txtIdEmpresa]').val(valor);
    	$('input[name=txtIdEmpresapg]').val(valor);
    	$('input[name=txtidEmpParaGrup]').val(valor);

    	$('#txtpagoTotal').val("00.00");
		$('#lbltotalapagar').text('S/.00.00');

    	id_empget = $("#txtIdEmpresa").val();
    	showAllReservas(id_empget);
    	showAllPagado(id_empget);
	});

	$('select#idslpersnatural').on('change',function(){
    	var valor = $(this).val();
    	$('input[name=txtIdEmpresa]').val(valor);
    	$('input[name=txtIdEmpresapg]').val(valor);
    	$('input[name=txtidEmpParaGrup]').val(valor);

    	$('#txtpagoTotal').val("00.00");
		$('#lbltotalapagar').text('S/.00.00');

    	id_empget = $("#txtIdEmpresa").val();
    	showAllReservas(id_empget);
    	showAllPagado(id_empget);
	});

    //Mostar Lista

	showAllCurso();

	//Ver Detalle
	$('#showdata').on('click', '.btnView', function(){
		var id = $(this).attr('data');
		$('#mymodal').modal({backdrop: 'static',});
		$('div').removeClass('label-floating');
		$('#mymodal').find('.tit-modal').text('Detalle del Curso');
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: baseUrl + "emp/CursoController/viewCursoSafesi",
			data: {id: id},
			async: false,
			dataType: 'json',

			success: function(data){

				if(data.cupos=='1'){
					$txtcup='Cupo';
				}else{
					$txtcup='Cupos';
				}

				$('#lblnombre').text(data.nombrecurso);
				//$('textarea[name=txtdescripcion]').val(data.descripcion);

				$('.txtdescripspn').html(data.descripcion);

				$('#lblcapacitador').text(data.apellidos_capacitador+' '+data.nombres_capacitador);
				$('#lblhoras').text(data.horas);
				$('#lblcupos').text(data.cupos + ' '+$txtcup);
				$('#lblfecha1').text('Hasta: '+data.Fecha1);
				$('#lblfecha2').text('Hasta: '+data.Fecha2);
				$('#lblfecha3').text('Hasta: '+data.Fecha3);
				$('#lblprecio').text(data.precioa);
				$('#lblprecio2').text(data.preciob);
				$('#lblprecio3').text(data.precioc);
				$('input[name=txtIdCurso]').val(data.id_curso);

			},
			error: function(){
				 swal("¡Ups!", "Algo salió mal.! Intentelo nuevamente.", "error");
			}
		});

		$.ajax({
			type: 'ajax',
			method: 'get',
			url: baseUrl + "emp/CursoController/showAllHorarioForCurso",
			data:{id:id},
			async: false,
			dataType: 'json',
			success: function(datah){
				var html = '';
				var i;
				for (i=0; i<datah.length; i++){
					html +='<tr>'+
								'<td>'+'#'+'</td>'+
								'<td>'+datah[i].fecha+'</td>'+
								'<td>'+datah[i].hora_inicio+'</td>'+
								'<td>'+datah[i].hora_fin+'</td>'+
							'</tr>';
				}
				$('#showhorario').html(html);
			},
			error:function(){
				swal("¡Ups!", "Algo salió mal al ver detalle.! Intentelo nuevamente.", "error");
			}
		});
	}
		);

	//Boton Reservar
	$('#showdata').on('click', '.btnReservar', function(){
		var id_empreselec = $('input[name=txtIdEmpresa]');

		if(id_empreselec.val()==''){
			swal("Ups!", "Te olvidastes seleccionar la Empresa/Persona Natural.!", "error");
		}else{
		var id = $(this).attr('data');
		$('#modalreservar').modal({backdrop: 'static',});
		$('div').addClass('label-floating');
		$('#modalreservar').find('.tit-modal').text('Reservar cupos');
		$('#formReservar').attr('action', baseUrl + 'emp/CursoController/saveReserva');
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: baseUrl + "emp/CursoController/viewCursoSafesi",
			data: {id: id},
			async: false,
			dataType: 'json',
			success: function(data){
				$('#lblnombre1').text(data.nombrecurso);
				//$('textarea[name=txtdescripcion]').val(data.descripcion);

				$('.txtdescripspn').html(data.descripcion);

				$('#lblcapacitador1').text(data.apellidos_capacitador+' '+data.nombres_capacitador);
				$('input[name=txtIdCursoR]').val(data.id_curso);
				var c=1;   
    			for(c=1; c<=data.cupos; c++){
    				if(c=='1'){
    					$txtcup ='cupo';
    				}else{
    					$txtcup ='cupos';
    				}
    				var option = "<option value='" + c + "'>" + c +' ' +$txtcup+"</option>"
    				document.getElementById('selectId').innerHTML += option;   
    			}

    			$( "#dslscupos" ).change(function() {
    				var cup = $("#dslscupos option:selected").val();
      				var res = parseFloat(cup*data.precio).toFixed(2);
    				$('input[name=txtcostotal]').val(res);
  					});
			},
			error: function(){
				 swal("¡Ups!", "Algo salió mal al momento de Reservar.! Intentelo nuevamente.", "error");

			}
		});
		}
	});

	//Guardar Reserva
	$('#btnSaveReserva').click(function(){
		var url = $('#formReservar').attr('action');
		var data = $('#formReservar').serialize();
		//validar
		var id_curso = $('input[name=txtIdCursoR]');
		var id_empresa = $('input[name=txtIdEmpresa]');
		var n_reserva = $('select[name=slsncupos]');
		var ct_total = $('input[name=txtcostotal]');

		var resultad = '';
		if(id_curso.val()==''){
			$('#dcurso').addClass('has-error');
		}else{
			$('#dcurso').removeClass('has-error');
			resultad +='1';
		}

		if(id_empresa.val()==''){
			$('#dempresa').addClass('has-error');
		}else{
			$('#dempresa').removeClass('has-error');
			resultad +='2';
		}
		if(n_reserva.val()<1){
			$('#dslscupos').addClass('has-error');
			bootbox.alert("Seleccione cuantos cupos desea reservar");
		}else{
			$('#dslscupos').removeClass('has-error');
			resultad +='3';
		}
		if(ct_total.val()==''){
			bootbox.alert("El precio total no puede ser 0");
		}else{
			$('#dslscupos').removeClass('has-error');
			resultad +='4';
		}
		id_empget = $("#txtIdEmpresa").val();
			if(resultad=='1234'){
				$.ajax({
				type:'ajax',
				method: 'post',
				url: url,
				data: data,
				async: false,
				dataType:'json',
				success: function(respuesta){
					dnotificacion.showNotification('top','right');
					showAllReservas(id_empget);
					showAllCurso();
					$('#modalreservar').modal('hide');
					$('#formReservar')[0].reset();
					$("#selectId").empty();
						if(respuesta.type=='add'){
							var type='Reservado'
						}else if(respuesta.type=='update'){
                             var type='Actualizado'
						}
				},

				error: function(){
					swal("¡Ups!", "Algo salió mal al guaradr la reserva.! Intentelo nuevamente.", "error");
				}
			});
		    }
	});

   //Eliminar Reserva
	$('#showdatareservas').on('click', '.btnDeletRes', function (){
		var idReserva = $(this).attr('data');
		id_empget = $("#txtIdEmpresa").val();

		swal({
		  title: "¿Estás seguro?",
		  text: "Una vez que se elimine, ¡no podrá recuperar la reserva!",
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
				url: baseUrl + "emp/CursoController/DeleteReserva",
				data:{id:idReserva},
				success: function(respuesta){
					$('#txtpagoTotal').val("00.00");
					$('#lbltotalapagar').text('S/.00.00');
					showAllReservas(id_empget);
					$("#selectId").empty();
					showAllCurso();
				},
				error: function(){
					swal("¡Ups!", "Error al eliminar reserva!. Intentelo nuvamente.", "error");
				}
			});

		    swal("¡Echo! ¡La reserva ha sido eliminado!", {
		      icon: "success",
		    });

		  }else{
		    
		  }
		});

	});


	//Pagar Reserva
	$('#btnpgTotal').click(function(){
		var pagotota = $('input[name=txtpagoTotal]');
		if(pagotota.val()<1){
			swal("Alerta!", "No hay cursos reservados por pagar!!!", "info");
		}else{
			$('#modalpagoreserva').modal('show');
			$('#modalpagoreserva').find('.tit-modal').text('Pago');
			$('#formPagoReserva').attr('action', baseUrl + 'CrearReservaController/savePago');
		}
	});

	$('#btnSavePagoReserva').click(function(){
		var urlp = $('#formPagoReserva').attr('action');
		var data = $('#formPagoReserva').serialize();

		//validar
		var id_banco = $('select[name=slistabancos]');
		var codigoperacion = $('input[name=txtcodoperacion]');
		var fechatransaccion = $('input[name=txtfechatrans]');
		var pagotota = $('input[name=txtpagoTotal]');
		var resultad = '';

		if(id_banco.val()==''){
			$('#dnbanco').addClass('has-error');
		}else{
			$('#dnbanco').removeClass('has-error');
			resultad +='1';
		}

		if(codigoperacion.val()==''){
			$('#dcoperacion').removeClass('has-error');
			resultad +='2';
		}else{
			$('#dcoperacion').removeClass('has-error');
			resultad +='2';
		}

		if(fechatransaccion.val()==''){
			$('#dftransac').addClass('has-error');
		}else{
			$('#dftransac').removeClass('has-error');
			resultad +='3';
		}

		if(pagotota.val()<1){
			bootbox.alert("<b>Usted no tiene cursos reservados<br>Gracias!!!</b>");
		}else{
			$('#dpgtotal').removeClass('has-error');
			resultad +='4';
		}

		id_empget = $("#txtIdEmpresa").val();
			if(resultad=='1234'){
				$.ajax({
				type:'ajax',
				method: 'post',
				url: urlp,
				data: data,
				async: false,
				dataType:'json',
				success: function(respuesta){
					dnotificacion.showNotification('top','right');
					$('#txtpagoTotal').val("00.00");
					$('#lbltotalapagar').text('S/.00.00');
					$("#selectId").empty();
					showAllCurso();
					showAllReservas(id_empget);
					showAllPagado(id_empget);
					$('#modalpagoreserva').modal('hide');
					$('#formPagoReserva')[0].reset();
						if(respuesta.type=='add'){
							var type='Reservado'
						}else if(respuesta.type=='update'){
                             var type='Actualizado'
						}
				},
				error: function(){
					swal("Ups!", "Error al realizar pago! Intentelo nuevamente", "error");
				}
			});
		    }
	});
	//.............


	//Boton Generar Grupo
	$('#showdatacursospagados').on('click', '.btnInscribir', function(){
		var idRpagado = $(this).attr('data');
		$('#modalgenerargrupo').modal('show');
		$('#modalgenerargrupo').find('.tit-modal').text('Grupo para el Curso');
		$('#formGenerarGrupo').attr('action', baseUrl + 'CrearReservaController/saveGrupoForEmpresa');


		Date.prototype.toString = function() { return this.getDate()+"/"+(this.getMonth()+1)+"/"+this.getFullYear(); } 
		var miFecha = new Date(); 
		$('#txtfcreacion').val(miFecha);

		$.ajax({
			type: 'ajax',
			method: 'get',
			url: baseUrl + "emp/CursoController/GetDataReserva",
			data: {id: idRpagado},
			async: false,
			dataType: 'json',
			success: function(data){
				$('input[name=txtnombrecursopg]').val(data.nombrecurso);
				$('input[name=txtnombregrupo]').val(data.nombrecurso);
				$('input[name=txtidReservaParaGrup').val(data.id_reserva);
			},
			error: function(){
				 swal("¡Ups!", "Algo salió mal.! Intentelo nuevamente.", "error");
			}
		});
	});
	//.............

	//Guardar Generar Grupo
	$('#btnSaveGrup').click(function(){


	/*Verificar y crear grupo*/
    var idresv = $('#txtidReservaParaGrup').val();
    if(idresv != ""){
        $.ajax({
            type: 'ajax',
            method: 'get',
            url: baseUrl+"CrearReservaController/validarGrupo",
            data: {getidreserva: idresv},
            beforeSend: function(){
                $('#txt-btnsg').html('<img src="http://www.skedtechnology.com/wp-content/themes/electron/images/attr/loading.gif" style="width: 14px;"> Verificando y Creando...');
            },
            success: function(respuesta){
                if(respuesta == 'true'){
                    alert('El grupo ya está creado, favor de verificar en la sección Notas');
                    $('#txt-btnsg').html('Crear');
                }else{
                    crearGrupo();
                }
            }
            
        });
    }

	});
	//.............

	function crearGrupo(){
		var url = $('#formGenerarGrupo').attr('action');
		var data = $('#formGenerarGrupo').serialize();
		var getIdRes = $('#txtidReservaParaGrup').val();

		//validar
		var nombregrup = $('input[name=txtnombregrupo]');
		var idRes = $('input[name=txtidReservaParaGrup]');
		var resultad = '';

		if(nombregrup.val()==''){
			$('#dnombregrup').addClass('has-error');
		}else{
			$('#dnombregrup').removeClass('has-error');
			resultad +='1';
		}

		if(idRes.val()==''){
			$('#dridCurso').addClass('has-error');
		}else{
			$('#dridCurso').removeClass('has-error');
			resultad +='2';
		}

		id_empget = $("#txtIdEmpresa").val();
			if(resultad=='12'){
				$.ajax({
				type:'ajax',
				method: 'post',
				url: url,
				data: data,
				async: false,
				dataType:'json',
				success: function(respuesta){
					$('#modalgenerargrupo').modal('hide');
					$('#formGenerarGrupo')[0].reset();
					$('#txt-btnsg').html('Crear');
					showAllPagado(id_empget);
					swal("¡Éxito!", "El grupo fue creado!", "success");
				},
				error: function(){
					swal("¡Ups!", "Algo salió mal.! Intentelo nuevamente.", "error");
					$('#txt-btnsg').html('Crear');
				}
			});
		}
	}




	//Mostrar Lista Disponibles
	function showAllCurso(){
		var txtc='Todo';
		var url1=baseUrl + "CrearReservaController/showAllCursoParaSafesi";
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: url1,
			data:{nomcur:txtc},
			async: true,
			dataType: 'json',
			success: function(data){
				var html = '';
				var i;
				for (i=0; i<data.length; i++){
					if(data[i].cupos <= '0'){
						btnreserva = '<a href="javascript:;" type="button" title="Reservar" class="btn btn-primary" disabled><i class="material-icons">perm_contact_calendar</i> RESERVAR</a>';
					}else{
						btnreserva = '<a href="javascript:;" type="button" title="Reservar" class="btn btn-primary btnRsv1 btnReservar" data="'+data[i].id_curso+'"><i class="material-icons">perm_contact_calendar</i> RESERVAR</a>';
					}

					if(data[i].cupos <='1'){
						smscupo = data[i].cupos+' Cupo';
					}else{
						smscupo = data[i].cupos+' Cupos';
					}

					html +='<tr>'+
								
								'<td>'+data[i].nombrecurso+'</td>'+
								'<td> <span class="hidden">'+data[i].FechaInicioOrden+'</span>'+data[i].FechaInicio+'</td>'+ 
								'<td>'+data[i].horas+' Horas'+'</td>'+
								'<td>'+smscupo+'</td>'+
								'<td>'+'S/.'+data[i].precio+'</td>'+
								'<td>'+data[i].apellidos_capacitador+' '+data[i].nombres_capacitador+'</td>'+
								'<td class="td-actions text-right">'+
									'<a href="javascript:;" type="button" title="Ver" class="btn btn-info btnView" data="'+data[i].id_curso+'"><i class="material-icons">visibility</i></a> '+btnreserva+
								'</td>'+
							'</tr>';
				}
				$('#showdata').html(html);
			},
			error:function(){
				swal("¡Ups!", "Algo salió mal.! Intentelo nuevamente.", "error");
			}
		});
	}

	//Mostrar Lista Reservas
	function showAllReservas(getidemp){
		var idem = getidemp;
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: baseUrl + "CrearReservaController/showAllReserva",
			data:{id:idem},
			async: true,
			dataType: 'json',
			success: function(data){
				var html = '';
				var i;
				var sumtota=0;
				for (i=0; i<data.length; i++){
                    sumtota += Number(data[i].costo_total);
                    $('#lbltotalapagar').text('S/.' + parseFloat(sumtota).toFixed(2));
                    $('input[name=txtpagoTotal]').val(parseFloat(sumtota).toFixed(2));

					if(data[i].cupos <='1'){
						rescups = data[i].ncupos+' Cupo';
					}else{
						rescups = data[i].ncupos+' Cupos';
					}

					if(data[i].estado_reserva=='1'){
						btnestapago = '<a href="javascript:;" type="button" title="Cancelar Reserva" class="btn btn-danger btnDeletRes" data="'+data[i].id_reserva+'"><i class="material-icons">close</i></a>';
					}else if(data[i].estado_reserva=='2'){
						btnestapago = '<span class="btn btn-link pgverif parpadea"><i class="material-icons">input</i> Pago en verificación</span>';
						$('#btnpgTotal').prop('disabled', true);
						$('.btnRsv1').attr('disabled', true);
						$('.btnRsv1').removeClass('btnReservar');
					}

					html +='<tr>'+
								'<td>'+'#'+'</td>'+
								'<td>'+data[i].nombrecurso+'</td>'+
								'<td>'+data[i].horas+' Horas'+'</td>'+ 
								'<td>'+rescups+'</td>'+
								'<td>'+data[i].apellidos_capacitador+' '+data[i].nombres_capacitador+'</td>'+
								'<td>'+'S/.'+data[i].costo_total+'</td>'+
								
								'<td class="td-actions text-right">'+btnestapago+'</td>'+
							'</tr>';
				}

				$('#showdatareservas').html(html);
			},
			error:function(){
				bootbox.alert('Error al listar las Reservas');

			}
		});
	}

	//Mostrar Lista cursos pagados Pagados
	function showAllPagado(getidemp){
		var idem = getidemp;
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: baseUrl + "CrearReservaController/showAllPagado",
			data:{id:idem},
			async: true,
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
								'<td>'+data[i].nombrecurso+'</td>'+
								'<td>'+data[i].horas+' Horas'+'</td>'+
								'<td>'+rescups+'</td>'+
								'<td>'+data[i].apellidos_capacitador+' '+data[i].nombres_capacitador+'</td>'+
								'<td class="td-actions text-right">'+
									' <a href="javascript:;" type="button" title="Inscribir" class="btn btn-success btnInscribir" data="'+data[i].id_reserva+'"><i class="material-icons">rate_review</i> INSCRIBIR</a>'+
								'</td>'+
							'</tr>';
				}
				$('#showdatacursospagados').html(html);
			},
			error:function(){
				swal("¡Ups!", "Algo salió mal.! Intentelo nuevamente.", "error");
			}
		});
	}


	$('#btnFiltCurso').click(function(){
		var fdesde = $('input[name=txtdesde]');
		var fhasta = $('input[name=txthasta]');
		var resultad='';

		if(fdesde.val()==''){
			bootbox.alert('¿Desde cuando?');
		}else{
			resultad +='1';
		}

		if(fhasta.val()==''){
			bootbox.alert('¿Hasta cuando?');
		}else{
			resultad +='2';
		}

		var getf1 = $("#txtdesde").val();
		var getf2 = $("#txthasta").val();

		if(resultad=='12'){
			showAllCursoFiltro(getf1,getf2);
            //bootbox.alert(getf1+' y '+getf2);
		}
	});

	//Mostrar Lista Disponibles
	function showAllCursoFiltro(getfdesde,getfhasta){
		var desde=getfdesde;
		var hasta=getfhasta;
		$.ajax({
			type:'get',
			method: 'get',
			url: baseUrl + 'CrearReservaController/showAllCursoForDateSafesi',
			data:{id:desde, id2:hasta},
			async: false,
			dataType: 'json',
			success: function(data){
				var html = '';
				var i;
				for (i=0; i<data.length; i++){

					if(data[i].cupos <= '0'){
						btnreserva = '<a href="javascript:;" type="button" title="Reservar" class="btn btn-primary" disabled><i class="material-icons">perm_contact_calendar</i> RESERVAR</a>';
					}else{
						btnreserva = '<a href="javascript:;" type="button" title="Reservar" class="btn btn-primary btnRsv1 btnReservar" data="'+data[i].id_curso+'"><i class="material-icons">perm_contact_calendar</i> RESERVAR</a>';
					}
					if(data[i].cupos <='1'){
						smscupo = data[i].cupos+' Cupo';
					}else{
						smscupo = data[i].cupos+' Cupos';
					}
					html +='<tr>'+
								
								'<td>'+data[i].nombrecurso+'</td>'+
								'<td> <span class="hidden">'+data[i].FechaInicioOrden+'</span>'+data[i].FechaInicio+'</td>'+ 
								'<td>'+'S/.'+data[i].precio+'</td>'+
								'<td>'+data[i].horas+' Horas'+'</td>'+
								'<td>'+smscupo+'</td>'+
								'<td>'+data[i].apellidos_capacitador+' '+data[i].nombres_capacitador+'</td>'+
								'<td class="td-actions text-right">'+
									'<a href="javascript:;" type="button" title="Ver" class="btn btn-info btnView" data="'+data[i].id_curso+'"><i class="material-icons">visibility</i></a> '+btnreserva+
								'</td>'+
							'</tr>';
				}
				$('#showdata').html(html);
			},
			error:function(){
				swal("¡Ups!", "Algo salió mal.! Intentelo nuevamente.", "error");
			}
		});
	}

	//boton reset
	$("#btnReset").click(function(){
		$("#formCurso")[0].reset();
	});

	$("#btnResetRv").click(function(){
		$("#formReservar")[0].reset();
		$("#selectId").empty();
	});

});


$( document ).ready(function() {
    $('#fechatrans').datepicker();
    $('#txtdesde').datepicker();
    $('#txthasta').datepicker();
});



function orderdatalist(){
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
}

