$(function() {

    $(document).ready(function(){

        var tipouser = $('#txttipuser').val();

        if(tipouser == 'EM'){
            $('#dvfrempresa').removeClass('hidden');
            $('#formperfilemp').attr('action', baseUrl + 'emp/PerfilController/updateEmpresa');
        }else if(tipouser == 'PN'){
            $('#dvfrpersonanatural').removeClass('hidden');
            $('#formperfilpn').attr('action', baseUrl + 'emp/PerfilController/updatePersonaNatural');
        }

        $('#formupdateacceso').attr('action', baseUrl + 'emp/PerfilController/updateAcceso');
        
        var iduser = $('#idusersession').val();
        
        $.ajax({
            type: 'ajax',
            method: 'get',
            url: baseUrl + "emp/PerfilController/getDataEmp",
            data: {id: iduser},
            async: false,
            dataType: 'json',
            success: function(data){

                //Empresa
                $('input[name=txtidusersessionem]').val(data.id_empresa);
                $('input[name=txtrazonsocial]').val(data.razonsocial);
                $('input[name=txtruc]').val(data.ruc);
                $('input[name=txtdireccion]').val(data.direccion);
                $('input[name=txtemailcontacto]').val(data.emailcontacto);
                $('input[name=txtnombrecontacto]').val(data.nombrecontacto);
                $('input[name=txtapellidoscontacto]').val(data.apellidoscontacto);
                $('input[name=txttelefono]').val(data.telefono);
                $('input[name=txtemailfactura]').val(data.emailfactura);


                //Personas Natural
                $('input[name=txtidusersessionpn]').val(data.id_empresa);
                $('input[name=txtdnipn]').val(data.ruc);
                $('input[name=txtnombrespn]').val(data.nombrecontacto);
                $('input[name=txtapellidospn]').val(data.apellidoscontacto);
                $('input[name=txtemailpn]').val(data.emailcontacto);
                $('input[name=txttelefonopn]').val(data.telefono);
                $('input[name=txtempresapn]').val(data.empresa_pn);
                $('input[name=txtcargopn]').val(data.cargo_pn);


                //Nombre Usuario empresa o persona natural
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
    $('#updateperfilem').click(function() {
        var url = $('#formperfilemp').attr('action');
        var data = $('#formperfilemp').serialize();

        var razonsocial = $('input[name=txtrazonsocial]');
        var ruc = $('input[name=txtruc]');
        var resultad = '';

        if(razonsocial.val()==''){
            $('#drazonsocial').addClass('has-error');
        }else{
            $('#drazonsocial').removeClass('has-error');
            resultad +='1';
        }

        if(ruc.val()==''){
            $('#dnruc').addClass('has-error');
        }else{
            $('#dnruc').removeClass('has-error');
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
    $('#updateperfilpn').click(function() {
        var url = $('#formperfilpn').attr('action');
        var data = $('#formperfilpn').serialize();

        var numdni = $('input[name=txtdnipn]');
        var nombres = $('input[name=txtnombrespn]');
        var apellidos = $('input[name=txtapellidospn]');
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

        if(resultad == '123'){
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
                    window.location.href = baseUrl+"emp/LoginController/logoutEmpresa"
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