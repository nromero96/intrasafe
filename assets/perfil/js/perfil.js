$(function() {

    $(document).ready(function(){
        $('#formperfil').attr('action', baseUrl + 'PerfilController/updateDataUser');
        $('#formupdateacceso').attr('action', baseUrl + 'PerfilController/updateAcceso');
        $('.dvfg').addClass('form-group-no');
        
        var iduser = $('#idusersession').val();
        
        $.ajax({
            type: 'ajax',
            method: 'get',
            url: baseUrl + "PerfilController/getDataUser",
            data: {id: iduser},
            async: false,
            dataType: 'json',
            success: function(data){
                $('input[name=txtidusersession]').val(data.id_usuario);
                $('input[name=txtidusersession1]').val(data.id_usuario);

                $('input[name=txtnombres]').val(data.nombre);
                $('input[name=txtapellidos]').val(data.apellido);
                $('input[name=txtcorreo]').val(data.email);
                $('input[name=txttelefono]').val(data.telefono);
                $('input[name=txtdireccion]').val(data.direccion);
                $('input[name=txtusuario]').val(data.nombreusuario);
            },
            error: function() {
                swal("¡Ups!", "Algo salio mal! Refresque la página.", "error");
            }
        });
        //................................

        
        //Validar contraseña
        var pass1 = $('[name=txtpassword]');
        var pass2 = $('[name=txtpassword1]');
        var confirmacion = "Las contraseñas si coinciden";
        var longitud = "La contraseña debe estar formada entre 8-20 carácteres (ambos inclusive)";
        var negacion = "No coinciden las contraseñas";
        var vacio = "La contraseña no puede estar vacía";

        var span = $('<div></div>').insertAfter(pass2);
        span.hide();

        //función que comprueba las dos contraseñas
        function coincidePassword(){
            var valor1 = pass1.val();
            var valor2 = pass2.val();

            //muestro el span
            span.show().removeClass();

            //condiciones dentro de la función
            if(valor1 != valor2){
                span.text(negacion).addClass('negacion alert');
            }

            if(valor2 != valor1){
                span.text(negacion).addClass('negacion alert');
            }

            if(valor1.length==0 || valor1==""){
                span.text(vacio).addClass('negacion alert');    
            }

            if(valor1.length<8 || valor1.length>20){
                span.text(longitud).addClass('negacion alert');
            }

            if(valor1.length!=0 && valor1==valor2){
                span.text(confirmacion).removeClass("negacion").addClass('confirmacion');
            }
        }

        //ejecuto la función al soltar la tecla
        pass2.keyup(function(){
            coincidePassword();
        });


    });


    //Actualizar datos del Usuario
    $('#updateperfil').click(function() {
        var url = $('#formperfil').attr('action');
        var data = $('#formperfil').serialize();

        var nombre = $('input[name=txtnombres]');
        var apellido = $('input[name=txtapellidos]');
        var resultad = '';

        if(nombre.val()==''){
            $('#dvnombre').addClass('has-error');
        }else{
            $('#dvnombre').removeClass('has-error');
            resultad +='1';
        }

        if(apellido.val()==''){
            $('#dvnomgerenapellidos').addClass('has-error');
        }else{
            $('#dvnomgerenapellidos').removeClass('has-error');
            resultad +='2';
        }

        if(resultad == '12'){
            $.ajax({
            type: 'ajax',
            method: 'post',
            url: url,
            data: data,
            async: false,
            dataType: 'json',
            success: function(respuesta) {
                swal("¡Echo!", "Los datos fueron actualizados actualizados!", "success");                
            },
            error: function() {
                swal("¡Ups!", "Algo salió mal.! Intente nuevamente", "error");
            }
        });

        }
    });
    //...................



    //Actualizar datos del Usuario
    $('#updateacceso').click(function() {
        var url = $('#formupdateacceso').attr('action');
        var data = $('#formupdateacceso').serialize();

        var password = $('input[name=txtpassword]');
        var password1 = $('input[name=txtpassword1]');
        var resultad = '';

        if(password.val()==''){
            $('#dvpassword').addClass('has-error');
        }else{
            $('#dvpassword').removeClass('has-error');
            resultad +='1';
        }

        if(password1.val()==''){
            $('#dvpassword1').addClass('has-error');
        }else{
            $('#dvpassword1').removeClass('has-error');
            resultad +='2';
        }

        if(resultad == '12'){
            $.ajax({
            type: 'ajax',
            method: 'post',
            url: url,
            data: data,
            async: false,
            dataType: 'json',
            success: function(respuesta) {
                swal("¡Echo!", "La contraseña fue actualizados!", "success");
                setTimeout(function() {
                    window.location.href = baseUrl+"LoginController/logout"
                }, 2000);
            },
            error: function() {
                swal("¡Ups!", "Algo salió mal.! Intente nuevamente", "error");
            }
        });

        }
    });
    //...................




});