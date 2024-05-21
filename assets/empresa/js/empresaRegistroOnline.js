$(function(){

	//Ventana de notificacion
	dnotificacion={
		showNotification: function(from, align) {
	    color = Math.floor((Math.random() * 1) + 2);
	    $.notify({
	        icon: "notifications",
	        message: "<b>ÉXITO</b> - Muchas gracias por registrarse a SAFESI"
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

	//Registro Empresas................................................

	//Boton Registro Empresa
	$('#btnRegEm').click(function(){
		$('#mymodal').modal({backdrop: 'static',});
		$('#formEmpresa').attr('action', baseUrl + 'EmpresaController/saveEmpresa');
		$('#btnSave').prop('disabled', true);
	});


	//Guarda o Actualiza
	$('#btnSave').click(function(){
		var url = $('#formEmpresa').attr('action');
		var data = $('#formEmpresa').serialize();

		//validar
		var tiporeg = $('input[name=txttipo]');
		var razonsocial = $('input[name=txtrazonsocial]');
		var nruc = $('input[name=txtruc]');
		var nombreusuario= $('input[name=txtnombreusuario]');
		var password1 = $('input[name=txtpassword]');
		var password2 = $('input[name=txtpassword1]');
		var cantpassword1= $('#txtpassword').val();
		var resultad = '';

		if(tiporeg.val()==''){
			swal("¡Ups!", "Algo salió mal!. Refresque la página.", "error");
		}else{
			resultad +='1';
		}

		if(razonsocial.val()==''){
			$('#drazonsocial').addClass('has-error');
		}else{
			$('#drazonsocial').removeClass('has-error');
			resultad +='2';
		}


		if(nruc.val()==''){
			$('#dnruc').addClass('has-error');
		}else{
			$('#dnruc').removeClass('has-error');
			resultad +='3';
		}

		if(nombreusuario.val()==''){
			$('#dnombreusuario').addClass('has-error');
		}else{
			$('#dnombreusuario').removeClass('has-error');
			resultad +='4';
		}

		if(password1.val()==''){
			$('#dpassword').addClass('has-error');
		}else{
			$('#dpassword').removeClass('has-error');
			resultad +='5';
		}

		if(password2.val()==''){
			$('#dpassword1').addClass('has-error');
		}else{
			$('#dpassword1').removeClass('has-error');
			resultad +='6';
		}

		if (cantpassword1.length>=8){
			resultad +='7';
		}else{
			swal("¡Alerta!", "La contraseña debe tener de 8 a 20 caracteres!", "info");
			return false;
		}

	    if(resultad=='1234567'){
			$.ajax({
				type:'ajax',
				method: 'post',
				url: url,
				data: data,
				async: false,
				dataType:'json',
				success: function(respuesta){
					if(respuesta['error']){
						swal(respuesta['mensaje'].replace("<p>", '').replace("</p>", '').replace("<p>", '').replace("</p>", ''));
					}else{
						$('#mymodal').modal('hide');
						$('#formEmpresa')[0].reset();
						$('#dvbtnregistro').addClass('hidden');
						$('#dvcargando').removeClass('hidden');
						setTimeout(function() {
	       				window.location.href = baseUrl+"emp"
	      				}, 2000);
						dnotificacion.showNotification('top','right');
					}
				},
				error: function(){
					swal("¡Ups!", "Error al registrarse. Intente de nuevo!", "error");
				}
			});
		}
	});


	//Activar boton
	$('#txtterms').click(function () {
	    //check if checkbox is checked
	    if($(this).is(':checked')){   
	        $('#btnSave').removeAttr('disabled'); //enable input 
	    }else{
	        $('#btnSave').attr('disabled', true); //disable input
	    }

	});

	//boton reset form Empresa
	$("#btnReset").click(function(){
		$("#formEmpresa")[0].reset();
	});



	//Registro Persona Natural................................................
	//Boton add PN
	$('#btnRegPN').click(function(){
		$('#modalregistropn').modal({backdrop: 'static',});
		$('#formregistropn').attr('action', baseUrl + 'EmpresaController/savePersonaNatural');
		$('#btnSavepn').prop('disabled', true);
	});

	//Guarda o Actualiza
	$('#btnSavepn').click(function(){
		var url = $('#formregistropn').attr('action');
		var data = $('#formregistropn').serialize();

		var tipo = $('input[name=txttipopn]');
		var numdni = $('input[name=txtdnipn]');
		var apellidos = $('input[name=txtapellidospn]');
		var nombres = $('input[name=txtnombrespn]');
		var nombreusuario = $('input[name=txtusuariopn]');
		var password1 = $('input[name=txtpasswordpn]');
		var password2 = $('input[name=txtpassword1pn]');
		var resultad = '';

		//Contar Cantidad de caracteres de contraseña
		var countpassword = $('#txtpasswordpn').val();

		if(tipo.val()==''){
			swal("¡Ups!", "Algo salió mal!. Refresque la página.", "error");
		}else{
			resultad +='1';
		}

		if(numdni.val()==''){
			$('#dvnumdni').addClass('has-error');
		}else{
			$('#dvnumdni').removeClass('has-error');
			resultad +='2';
		}

		if(apellidos.val()==''){
			$('#dvapellidos').addClass('has-error');
		}else{
			$('#dvapellidos').removeClass('has-error');
			resultad +='3';
		}

		if(nombres.val()==''){
			$('#dvnonbrespn').addClass('has-error');
		}else{
			$('#dvnonbrespn').removeClass('has-error');
			resultad +='4';
		}

		if(nombreusuario.val()==''){
			$('#dvnomusuariopn').addClass('has-error');
		}else{
			$('#dvnomusuariopn').removeClass('has-error');
			resultad +='5';
		}

		if(password1.val()==''){
			$('#dvpasswordpn').addClass('has-error');
		}else{
			$('#dvpasswordpn').removeClass('has-error');
			resultad +='6';
		}

		if(password2.val()==''){
			$('#dvpassword1pn').addClass('has-error');
		}else{
			$('#dvpassword1pn').removeClass('has-error');
			resultad +='7';
		}

		//Validar Cantidad de contraseña
		if(countpassword.length >= 8){
			resultad +='8';
		}else{
			swal("¡Alerta!", "La contraseña debe tener de 8 a 20 caracteres!", "info");
			return false;
		}

	    if(resultad=='12345678'){
			$.ajax({
				type:'ajax',
				method: 'post',
				url: url,
				data: data,
				async: false,
				dataType:'json',
				success: function(respuesta){
					if(respuesta['error']){
						swal(respuesta['mensaje'].replace("<p>", '').replace("</p>", '').replace("<p>", '').replace("</p>", ''));
					}else{
						$('#modalregistropn').modal('hide');
						$('#formregistropn')[0].reset();
						$('#dvbtnregistro').addClass('hidden');
						$('#dvcargando').removeClass('hidden');
						setTimeout(function() {
	       				window.location.href = baseUrl+"emp"
	      				}, 2000);
						dnotificacion.showNotification('top','right');
					}
				},
				error: function(){
					swal("¡Ups!", "Error al registrarse. Intente de nuevo!", "error");
				}
			});
		}
	});


	//Activar boton registrarse
	$('#txttermspn').click(function () {
	    //check if checkbox is checked
	    if($(this).is(':checked')){   
	        $('#btnSavepn').removeAttr('disabled'); //enable input 
	    }else{
	        $('#btnSavepn').attr('disabled', true); //disable input
	    }

	});

	//boton reset form Empresa
	$("#btnResetpn").click(function(){
		$("#formregistropn")[0].reset();
	});

	//...................................................................


	$(document).ready(function(){

		//variables contreseña Empresas
		var pass1 = $('[name=txtpassword]');
		var pass2 = $('[name=txtpassword1]');
		var confirmacion = "Las contraseñas si coinciden";
		var longitud = "La contraseña debe estar formada entre 8-20 carácteres (ambos inclusive)";
		var negacion = "No coinciden las contraseñas";
		var vacio = "La contraseña no puede estar vacía";

		//Variables contraseña Persona Natural
		var pass1pn = $('[name=txtpasswordpn]');
		var pass2pn = $('[name=txtpassword1pn]');

		//oculto por defecto el elemento span
		var span = $('<div></div>').insertAfter(pass2);
		span.hide();

		var spanpn = $('<div></div>').insertAfter(pass2pn);
		spanpn.hide();

		//función que comprueba las dos contraseñas
		function coincidePassword(){
			var valor1 = pass1.val();
			var valor2 = pass2.val();

			//Persona Natural
			var valor1pn = pass1pn.val();
			var valor2pn = pass2pn.val();

			//muestro el span
			span.show().removeClass();

			//Persona Natural
			spanpn.show().removeClass();

			//condiciones dentro de la función
			if(valor1 != valor2){
				span.text(negacion).addClass('negacion alert');
			}

			//Persona Natural
			if(valor1pn != valor2pn){
				spanpn.text(negacion).addClass('negacion alert');
			}

			if(valor2 != valor1){
				span.text(negacion).addClass('negacion alert');
			}

			//Persona Natural
			if(valor2pn != valor1pn){
				spanpn.text(negacion).addClass('negacion alert');
			}

			if(valor1.length==0 || valor1==""){
				span.text(vacio).addClass('negacion alert');	
			}

			//Persona Natural
			if(valor1pn.length==0 || valor1pn==""){
				spanpn.text(vacio).addClass('negacion alert');	
			}

			if(valor1.length<8 || valor1.length>20){
				span.text(longitud).addClass('negacion alert');
			}

			//Persona Natural
			if(valor1pn.length<8 || valor1pn.length>20){
				spanpn.text(longitud).addClass('negacion alert');
			}

			if(valor1.length!=0 && valor1==valor2){
				span.text(confirmacion).removeClass("negacion").addClass('confirmacion');
			}

			//Persona Natural
			if(valor1pn.length!=0 && valor1pn==valor2pn){
				spanpn.text(confirmacion).removeClass("negacion").addClass('confirmacion');
			}
		}

		//ejecuto la función al soltar la tecla
		pass2.keyup(function(){
			coincidePassword();
		});

		//Persona Natural
		pass2pn.keyup(function(){
			coincidePassword();
		});
	});




});