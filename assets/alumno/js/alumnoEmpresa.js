$(function() {
    //Ventana de notificacion
    dnotificacion = {
        showNotification: function(from, align) {
            color = Math.floor((Math.random() * 1) + 2);
            $.notify({
                icon: "notifications",
                message: "<b>ÉXITO</b> - Datos Guardados."
            }, {
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
    showAllAlumno();
    //Boton Agragar
    $('#btnAdd').click(function() {
        $('#mymodal').modal('show');
        $('#mymodal').find('.tit-modal').text('Agregar Nuevo Alumno');
        $('div').addClass('label-floating');
        $('#formAlumno').attr('action', baseUrl + 'emp/AlumnoController/saveAlumno');
    });
    //Guarda o Actualiza
    $('#btnSave').click(function() {
        var url = $('#formAlumno').attr('action');
        var data = $('#formAlumno').serialize();
        $.ajax({
            type: 'ajax',
            method: 'post',
            url: url,
            data: data,
            async: false,
            dataType: 'json',
            success: function(respuesta) {
                $('#mymodal').modal('hide');
                $('#formAlumno')[0].reset();
                if (respuesta.type == 'add') {
                    var type = 'Agregado'
                } else if (respuesta.type == 'update') {
                    var type = 'Actualizado'
                }
                //$('.alert-success').html('Curso '+type+' con éxito</b>').fadeIn().delay(4000).fadeOut('slow');
                dnotificacion.showNotification('top', 'right');
                showAllAlumno();
            },
            error: function() {
                alert('Error 2');
            }
        });
    });
    //Editar
    $('#showdata').on('click', '.btnEdit', function() {
        var id = $(this).attr('data');
        $('#mymodal').modal('show');
        $('div').removeClass('label-floating');
        $('#mymodal').find('.tit-modal').text('Actualizar Alumno');
        $('#formAlumno').attr('action', baseUrl + "emp/AlumnoController/updateAlumno");
        $.ajax({
            type: 'ajax',
            method: 'get',
            url: baseUrl + "emp/AlumnoController/editAlumno",
            data: {
                id: id
            },
            async: false,
            dataType: 'json',
            success: function(data) {
                $('select[name=txttipodocumento]').val(data.tipodocumento);
                $('input[name=txtnumerodocumento]').val(data.numerodocumento);
                $('input[name=txtapellidos]').val(data.apellidos);
                $('input[name=txtnombres]').val(data.nombres);
                $('input[name=txtfnacimiento]').val(data.fnacimiento);
                $('input[name=txttelefono]').val(data.telefono);
                $('input[name=txtemail]').val(data.email);
                $('input[name=txtIdAlumno]').val(data.id_alumno);
            },
            error: function() {
                alert('Error al Editar');
            }
        });
    });
    //Funcion Mostar Lista
    function showAllAlumno() {
        $.ajax({
            type: 'ajax',
            method: 'get',
            url: baseUrl + "emp/AlumnoController/showAllAlumno",
            async: false,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                for (i = 0; i < data.length; i++) {
                    html += '<tr>'+
                    			'<td>'+'#'+'</td>'+
                    			'<td>'+data[i].numerodocumento+'</td>'+
                    			'<td>'+data[i].apellidos+'</td>'+
                    			'<td>'+ data[i].nombres+'</td>'+
                    			'<td>'+data[i].telefono+'</td>'+
                    			'<td>'+data[i].email+'</td>'+
                    			'<td class="td-actions text-right">'+
                    			// '<a href="javascript:;" type="button" rel="tooltip" title="Editar" class="btn btn-success btnEdit" data="' + data[i].id_alumno + '"><i class="material-icons">edit</i><div class="ripple-container"></div></a>'+
                    			'</td>'+
                    		'</tr>';         
                }
                $('#showdata').html(html);
            },
            error: function() {
                alert('Error');
            }
        });
    }
    //DataPicker
    $(document).ready(function() {
        $('#idfnacimiento').datepicker();
    });
    //boton reset
    $("#btnReset").click(function() {
        /* Single line Reset function executes on click of Reset Button */
        $("#formAlumno")[0].reset();
    });
});