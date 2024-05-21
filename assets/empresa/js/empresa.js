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
    showAllEmpresa();
    showAllPersonaNatural();


	//Boton Agragar
	$('#btnAdd').click(function(){
		$('#mymodal').modal('show');
		$('#mymodal').find('.tit-modal').text('Nueva Empresa');
		$('div').addClass('label-floating');
		$('#formEmpresa').attr('action', baseUrl + 'EmpresaController/saveEmpresa');
		$('#btnSave').prop('disabled', true);
		$('#btnSave').show();
		$('#resetText').html('Cerrar');

	});


	//Actualizar empresa
	$('#btnSave').click(function(){
		var url = $('#formEmpresa').attr('action');
		var data = $('#formEmpresa').serialize();

		//validar
		var razonsocial = $('input[name=txtrazonsocial]');
		var nruc = $('input[name=txtruc]');
		var nombreusuario= $('input[name=txtnombreusuario]');
		var password = $('input[name=txtpassword]');
		var resultad = '';

		if(razonsocial.val()==''){
			$('#drazonsocial').addClass('has-error');
		}else{
			$('#drazonsocial').removeClass('has-error');
			resultad +='1';
		}

		if(nruc.val()==''){
			$('#dnruc').addClass('has-error');
		}else{
			$('#dnruc').removeClass('has-error');
			resultad +='2';
		}


		if(nombreusuario.val()==''){
			$('#dnombreusuario').addClass('has-error');
		}else{
			$('#dnombreusuario').removeClass('has-error');
			resultad +='3';
		}

		if(password.val()==''){
			$('#dpassword').addClass('has-error');
		}else{
			$('#dpassword').removeClass('has-error');
			resultad +='4';
		}

           if(resultad=='1234'){
			$.ajax({
				type:'ajax',
				method: 'post',
				url: url,
				data: data,
				async: false,
				dataType:'json',
				success: function(respuesta){
					$('#mymodal').modal('hide');
						$('#formEmpresa')[0].reset();
						if(respuesta.type=='add'){
							var type='Agregado'
						}else if(respuesta.type=='update'){
                             var type='Actualizado'
						}
						//$('.alert-success').html('Curso '+type+' con éxito</b>').fadeIn().delay(4000).fadeOut('slow');
						dnotificacion.showNotification('top','right');
						showAllEmpresa();
				},
				error: function(){
					alert('Error 2');
				}
			});
		}
	});


    //Button Submit
    $('#txtterms').click(function () {
    //check if checkbox is checked
    if ($(this).is(':checked')) {
        $('#btnSave').removeAttr('disabled'); //enable input
    } else {
        $('#btnSave').attr('disabled', true); //disable input
    }
	});


	//Ver Empresa.......................................
	$('#showdata').on('click', '.btnView', function(){
		var id = $(this).attr('data');
		$('#mymodal').modal('show');
		$('div').removeClass('label-floating');
		$(".inpted").prop( "disabled", true );
		$('#btnSave').hide();
		$('#resetText').html('Cerrar');
		$('#mymodal').find('.tit-modal').text('Empresa');

		$.ajax({
			type: 'ajax',
			method: 'get',
			url: baseUrl + "EmpresaController/editEmpresa",
			data: {id: id},
			async: false,
			dataType: 'json',
			success: function(data){
				$('input[name=txtrazonsocial]').val(data.razonsocial);
				$('input[name=txtruc]').val(data.ruc);
				$('input[name=txtdireccion]').val(data.direccion);
				$('input[name=txtemailcontacto]').val(data.emailcontacto);
				$('input[name=txtnombrecontacto]').val(data.nombrecontacto);
				$('input[name=txtapellidoscontacto]').val(data.apellidoscontacto);
				$('input[name=txttelefono]').val(data.telefono);
				$('input[name=txtemailfactura]').val(data.emailfactura);
				$('input[name=txtnombreusuario]').val(data.nombreusuario);
				$('input[name=txtpassword]').val(data.password);
				$('checkbox[name=txtterms]').val(data.tyc);
				$('input[name=txtIdEmpresa]').val(data.id_empresa);

				if(data.tyc=='1'){
					document.getElementById("txtterms").checked = true;
				}else if(data.tyc=='0'){
					document.getElementById("txtterms").checked = false;
				}
			},

			error: function(){
				 alert('Error al Editar');
			}
		});
	});


	//Editar Empresa...................................
	$('#showdata').on('click', '.btnEdit', function(){
		var id = $(this).attr('data');
		$('#mymodal').modal('show');
		$('div').removeClass('label-floating');
		$(".inpted").prop( "disabled", false );
		$('#btnSave').prop('disabled', false);
		$('#btnSave').show();
		$('#resetText').html('Cancelar');
		$('#mymodal').find('.tit-modal').text('Actualizar Empresa');
		$('#formEmpresa').attr('action', baseUrl + "EmpresaController/updateEmpresa");
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: baseUrl + "EmpresaController/editEmpresa",
			data: {id: id},
			async: false,
			dataType: 'json',
			success: function(data){
				$('input[name=txtrazonsocial]').val(data.razonsocial);
				$('input[name=txtruc]').val(data.ruc);
				$('input[name=txtdireccion]').val(data.direccion);
				$('input[name=txtemailcontacto]').val(data.emailcontacto);
				$('input[name=txtnombrecontacto]').val(data.nombrecontacto);
				$('input[name=txtapellidoscontacto]').val(data.apellidoscontacto);
				$('input[name=txttelefono]').val(data.telefono);
				$('input[name=txtemailfactura]').val(data.emailfactura);
				$('input[name=txtnombreusuario]').val(data.nombreusuario);
				$('input[name=txtpassword]').val(data.password);
				$('checkbox[name=txtterms]').val(data.tyc);
				$('input[name=txtIdEmpresa]').val(data.id_empresa);

				if(data.tyc=='1'){
					document.getElementById("txtterms").checked = true;
				}else if(data.tyc=='0'){
					document.getElementById("txtterms").checked = false;
				}
			},
			error: function(){
				 alert('Error al Editar');
			}
		});
	});



	//Ver Persona Natural.............................................
	$('#showdatapn').on('click', '.btnViewPN', function(){
		var id = $(this).attr('data');
		$('#modalregistropn').modal('show');
		$('.dvinpts').removeClass('label-floating');
		$('.dvinpts').addClass('form-group-no');
		$(".inpted").prop( "disabled", true );
		$('#btnSavepn').hide();
		$('#resetText').html('Cerrar');

		$.ajax({
			type: 'ajax',
			method: 'get',
			url: baseUrl + "EmpresaController/editEmpresa",
			data: {id: id},
			async: false,
			dataType: 'json',
			success: function(data){
				$('input[name=txtdnipn]').val(data.ruc);
				$('input[name=txtnombrespn]').val(data.nombrecontacto);
				$('input[name=txtapellidospn]').val(data.apellidoscontacto);
				$('input[name=txtemailpn]').val(data.emailcontacto);
				$('input[name=txttelefonopn]').val(data.telefono);
				$('input[name=txtempresapn]').val(data.empresa_pn);
				$('input[name=txtcargopn]').val(data.cargo_pn);
				$('input[name=txtusuariopn]').val(data.nombreusuario);
				$('input[name=txtpasswordpn]').val(data.password);
				$('checkbox[name=txttermspn]').val(data.tyc);
				$('input[name=txtidempresapn]').val(data.id_empresa);

				if(data.tyc=='1'){
					document.getElementById("txttermspn").checked = true;
				}else if(data.tyc=='0'){
					document.getElementById("txttermspn").checked = false;
				}
			},

			error: function(){
				 alert('Error al Editar');
			}
		});
	});


	//Editar Persona Natural..............................
	$('#showdatapn').on('click', '.btnEditPN', function(){
		var id = $(this).attr('data');
		$('#modalregistropn').modal('show');
		$('.dvinpts').removeClass('label-floating');
		$('.dvinpts').addClass('form-group-no');
		$(".inpted").prop( "disabled", false );
		$('#btnSavepn').prop('disabled', false);
		$('#btnSavepn').show();
		$('#modalregistropn').find('.tit-modal').text('Actualizar Persona Natural');
		$('#formPersonaNatural').attr('action', baseUrl + "PersonaNaturalController/updatePersonaNatural");
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: baseUrl + "EmpresaController/editEmpresa",
			data: {id: id},
			async: false,
			dataType: 'json',

			success: function(data){
				$('input[name=txtdnipn]').val(data.ruc);
				$('input[name=txtnombrespn]').val(data.nombrecontacto);
				$('input[name=txtapellidospn]').val(data.apellidoscontacto);
				$('input[name=txtemailpn]').val(data.emailcontacto);
				$('input[name=txttelefonopn]').val(data.telefono);
				$('input[name=txtempresapn]').val(data.empresa_pn);
				$('input[name=txtcargopn]').val(data.cargo_pn);
				$('input[name=txtusuariopn]').val(data.nombreusuario);
				$('input[name=txtpasswordpn]').val(data.password);
				$('checkbox[name=txttermspn]').val(data.tyc);
				$('input[name=txtidempresapn]').val(data.id_empresa);

				if(data.tyc=='1'){
					document.getElementById("txttermspn").checked = true;
				}else if(data.tyc=='0'){
					document.getElementById("txttermspn").checked = false;
				}
			},
			error: function(){
				 swal('Error al Editar.! Intente nuevamente.');
			}
		});
	});

    //Button Submit
    $('#txttermspn').click(function () {
    //check if checkbox is checked
    if ($(this).is(':checked')) {
        $('#btnSavepn').removeAttr('disabled'); //enable input
    } else {
        $('#btnSavepn').attr('disabled', true); //disable input
    }
	});


	//Actualizar Persona Natural
	$('#btnSavepn').click(function(){
		var url = $('#formPersonaNatural').attr('action');
		var data = $('#formPersonaNatural').serialize();

		//validar
		var numdni = $('input[name=txtdnipn]');
		var nombres = $('input[name=txtnombrespn]');
		var apellidos= $('input[name=txtapellidospn]');
		var nombreusuario = $('input[name=txtusuariopn]');
		var password = $('input[name=txtpasswordpn]');
		var resultad = '';

		if(numdni.val()==''){
			$('#dvnumdni').addClass('has-error');
		}else{
			$('#dvnumdni').removeClass('has-error');
			resultad +='1';
		}

		if(nombres.val()==''){
			$('#dvnonbrespn').addClass('has-error');
		}else{
			$('#dvnonbrespn').removeClass('has-error');
			resultad +='2';
		}

		if(apellidos.val()==''){
			$('#dvapellidos').addClass('has-error');
		}else{
			$('#dvapellidos').removeClass('has-error');
			resultad +='3';
		}

		if(nombreusuario.val()==''){
			$('#dvnomusuariopn').addClass('has-error');
		}else{
			$('#dvnomusuariopn').removeClass('has-error');
			resultad +='4';
		}

		if(password.val()==''){
			$('#dvpasswordpn').addClass('has-error');
		}else{
			$('#dvpasswordpn').removeClass('has-error');
			resultad +='5';
		}

           if(resultad=='12345'){
			$.ajax({
				type:'ajax',
				method: 'post',
				url: url,
				data: data,
				async: false,
				dataType:'json',
				success: function(respuesta){
					$('#modalregistropn').modal('hide');
					$('#formPersonaNatural')[0].reset();
					dnotificacion.showNotification('top','right');
					showAllPersonaNatural();
				},
				error: function(){
					swal('Error al actualizar.! Intente nuevamente.');
				}
			});
		}
	});


	//Boton Enviar Mail Empresas
	$('#btnSndm').click(function(){
		$('#modalsendcoreo').modal('show');
		$('#formSendUrl').attr('action', baseUrl + 'EmpresaController/sendMailEm');
	});

	$('#btnSenMail').click(function(){
		var url = $('#formSendUrl').attr('action');
		var data = $('#formSendUrl').serialize();

		var mdestino = $('input[name=txtemaildestino]');
		var resultad = '';

		if(mdestino.val()==''){
			$('#dcrdestino').addClass('has-error');
		}else{
			$('#dcrdestino').removeClass('has-error');
			resultad +='1';
		}

        if(resultad=='1'){
        	$('#cargagif').removeClass('hidden');
			$.ajax({
				type:'ajax',
				method: 'post',
				url: url,
				data: data,
				async: false,
				dataType:'json',
				success: function(respuesta){
					$('#modalsendcoreo').modal('hide');
					$('#formSendUrl')[0].reset();
					$('#cargagif').addClass('hidden');
					swal("Enviado", "El enlace de registro fue enviado!", "success");
				},
				error: function(){
					swal("Erro", "Intente de nuevo!", "error");
					$('#cargagif').addClass('hidden');
				}
			});
		}

	});



	//Boton Enviar Mail Empresas
	$('#btnSndmPn').click(function(){
		$('#modalsendcoreo').modal('show');
		$('#formSendUrl').attr('action', baseUrl + 'EmpresaController/sendMailPn');
	});

	$('#btnSenMailPn').click(function(){
		var url = $('#formSendUrl').attr('action');
		var data = $('#formSendUrl').serialize();

		var mdestino = $('input[name=txtemaildestino]');
		var resultad = '';

		if(mdestino.val()==''){
			$('#dcrdestino').addClass('has-error');
		}else{
			$('#dcrdestino').removeClass('has-error');
			resultad +='1';
		}

        if(resultad=='1'){
        	$('#cargagif').removeClass('hidden');
			$.ajax({
				type:'ajax',
				method: 'post',
				url: url,
				data: data,
				async: false,
				dataType:'json',
				success: function(respuesta){
					$('#modalsendcoreo').modal('hide');
					$('#formSendUrl')[0].reset();
					$('#cargagif').addClass('hidden');
					swal("Enviado", "El enlace de registro fue enviado!", "success");
				},
				error: function(){
					swal("Erro", "Intente de nuevo!", "error");
					$('#cargagif').addClass('hidden');
				}
			});
		}

	});














	//Lista de Empresas
	function showAllEmpresa(){
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: baseUrl + 'EmpresaController/showAllEmpresa',
			async: false,
			dataType: 'json',
			success: function(data){
				var html = '';
				var i;
				for(i=0; i<data.length; i++){
					html +='<tr>'+
								'<td>'+data[i].razonsocial+'</td>'+
								'<td>'+data[i].ruc+'</td>'+
								'<td>'+data[i].direccion+'</td>'+
								'<td>'+data[i].telefono+'</td>'+
								'<td>'+data[i].emailcontacto+'</td>'+
								'<td class="td-actions text-right">'+
								'<a href="javascript:;" type="button" rel="tooltip" title="Ver" class="btn btn-info btnView" data="'+data[i].id_empresa+'"><i class="material-icons">visibility</i><div class="ripple-container"></div></a> <a href="javascript:;" type="button" rel="tooltip" title="Editar" class="btn btn-success btnEdit" data="'+data[i].id_empresa+'"><i class="material-icons">edit</i><div class="ripple-container"></div></a>'+'</td>'+
							'</tr>';
				}
				$('#showdata').html(html);
			},
			error:function(){
				alert('No hay Lista');
			}
		});
	}

	//Lista de Personas Naturales
	function showAllPersonaNatural(){
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: baseUrl + 'PersonaNaturalController/showAllPersonaNatural',
			async: false,
			dataType: 'json',
			success: function(data){
				var html = '';
				var i;
				for(i=0; i<data.length; i++){
					html +='<tr>'+
								'<td>'+data[i].ruc+'</td>'+
								'<td>'+data[i].nombrecontacto+'</td>'+
								'<td>'+data[i].apellidoscontacto+'</td>'+
								'<td>'+data[i].telefono+'</td>'+
								'<td>'+data[i].emailcontacto+'</td>'+
								'<td class="td-actions text-right">'+
								'<a href="javascript:;" type="button" rel="tooltip" title="Ver" class="btn btn-info btnViewPN" data="'+data[i].id_empresa+'"><i class="material-icons">visibility</i><div class="ripple-container"></div></a> <a href="javascript:;" type="button" rel="tooltip" title="Editar" class="btn btn-success btnEditPN" data="'+data[i].id_empresa+'"><i class="material-icons">edit</i><div class="ripple-container"></div></a>'+'</td>'+
							'</tr>';
				}
				$('#showdatapn').html(html);
			},
			error:function(){
				alert('No hay Lista');
			}
		});
	}

  	//Copy
	function copyToClipboard(text, el) {
  	var copyTest = document.queryCommandSupported('copy');
  	var elOriginalText = el.attr('data-original-title');
  	if (copyTest === true) {
    	var copyTextArea = document.createElement("textarea");
    	copyTextArea.value = text;
    	document.body.appendChild(copyTextArea);
    	copyTextArea.select();
    	try {
      	var successful = document.execCommand('copy');
      	var msg = successful ? 'Enlace Copiado!' : '¡Ups, no copiado!';
      	el.attr('data-original-title', msg).tooltip('show');
    	} catch (err) {
      	console.log('Vaya, no se puede copiar');
    	}
    	document.body.removeChild(copyTextArea);
    	el.attr('data-original-title', elOriginalText);
  	} else {
    	// Fallback if browser doesn't support .execCommand('copy')
    	window.prompt("Copiar al portapapeles: Ctrl+C or Command+C, Enter", text);
  	}
	}

	$(document).ready(function() {

  	// Initialize
  	// Tooltips
  	// Requires Bootstrap 3 for functionality
  	$('.js-tooltip').tooltip();
  	// Copy to clipboard
  	// Grab any text in the attribute 'data-copy' and pass it to the 
  	// copy function
  	$('.js-copy').click(function() {
    	var text = $(this).attr('data-copy');
    	var el = $(this);
    	copyToClipboard(text, el);
  	});
	});

	//boton reset
	$("#btnReset").click(function(){
	/* Single line Reset function executes on click of Reset Button */
	$("#formEmpresa")[0].reset();
	});

	$(document).ready(function(){
    $('.tablafiltro').DataTable({

    	"aLengthMenu": [[10, 20, 50, 100, -1], [10, 20, 50, 100, "Todos"]],
    	"sDom": 'Rfrtlip',
    	"order": [],

    	"columnDefs": [{
          	"targets": 'no-sort',
          	"orderable": false,
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