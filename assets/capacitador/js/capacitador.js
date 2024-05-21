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
    showAllCapacitador();
    //Boton Agragar
    $('#btnAddCap').click(function() {
        $('#modalcapac').modal('show');
        $('#modalcapac').find('.tit-modal').text('Agregar Nuevo Capacitador');
        $('div').addClass('label-floating');
        $('.dvfg').removeClass('form-group-no');
        $('#formCapacitador').attr('action', baseUrl + 'CapacitadorController/saveCapacitador');
    });
    //Guarda o Actualiza
    $('#btnSaveCap').click(function() {
        var url = $('#formCapacitador').attr('action');
        //var data = $('#formCapacitador').serialize();
        var formData = new FormData($('#formCapacitador')[0]);

        var numdni = $('input[name=txtnumdni]');
        var apellidos_cap = $('input[name=txtapellidos]');
        var nombres_cap = $('input[name=txtnombres]');
        var email_cap = $('input[name=txtemail]');
        var resultad = '';

        if(numdni.val()==''){
            $('#ddni').addClass('has-error');
        }else{
            $('#ddni').removeClass('has-error');
            resultad +='1';
        }

        if(apellidos_cap.val()==''){
            $('#dapellidoscap').addClass('has-error');
        }else{
            $('#dapellidoscap').removeClass('has-error');
            resultad +='2';
        }

        if(nombres_cap.val()==''){
            $('#dnombrescap').addClass('has-error');
        }else{
            $('#dnombrescap').removeClass('has-error');
            resultad +='3';
        }

        if(email_cap.val()==''){
            $('#demailcap').addClass('has-error');
        }else{
            $('#demailcap').removeClass('has-error');
            resultad +='4';
        }

        if(resultad == '1234'){
            $('#cargagif').removeClass('hidden');
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
                $('#cargagif').addClass('hidden');
                $('#formCapacitador')[0].reset();
                if (respuesta.type == 'add') {
                    var type = 'Agregado'
                } else if (respuesta.type == 'update') {
                    var type = 'Actualizado'
                }
                //$('.alert-success').html('Curso '+type+' con éxito</b>').fadeIn().delay(4000).fadeOut('slow');
                dnotificacion.showNotification('top', 'right');
                showAllCapacitador();
            },
            error: function() {
                alert('Error al Guardar');
                $('#cargagif').addClass('hidden');
            }
        });

        }
    });
    //Editar
    $('#showdatacapacitador').on('click', '.btnEdit', function() {
        var id = $(this).attr('data');
        $('#modalcapac').modal('show');
        $('div').removeClass('label-floating');
        $('.dvfg').addClass('form-group-no');
        $('#modalcapac').find('.tit-modal').text('Actualizar Capacitador');
        $('#formCapacitador').attr('action', baseUrl + "CapacitadorController/updateCapacitador");
        $.ajax({
            type: 'ajax',
            method: 'get',
            url: baseUrl + "CapacitadorController/editCapacitador",
            data: {id: id},
            async: false,
            dataType: 'json',
            success: function(data) {
                $('input[name=txtnumdni]').val(data.dni_capacitador);
                $('input[name=txtapellidos]').val(data.apellidos_capacitador);
                $('input[name=txtnombres]').val(data.nombres_capacitador);
                $('input[name=txtprofesion]').val(data.profesion_capacitador);
                $('input[name=txtcod_cip]').val(data.cod_cip_capacitador);
                $('input[name=txttelefono]').val(data.telefono_capacitador);
                $('input[name=txtemail]').val(data.email_capacitador);
                $('input[name=txtIdCapacitador]').val(data.id_capacitador);

            if(data.firma_capacitador){
                $('#previewimg1').html('<img src="'+baseUrl+'uploads/firmas/'+data.firma_capacitador+'" style="width: 164px;height: 72px;" ></img>');
            }else{
                $('#previewimg1').html('<br><br>(No tiene firma)');
                $('#comboxdl').hdie();
            }
            },
            error: function() {
                alert('Error al Editar');
            }
        });





    });
    //Funcion Mostar Lista
    function showAllCapacitador() {
        $.ajax({
            type: 'ajax',
            method: 'get',
            url: baseUrl + "CapacitadorController/showAllCapacitador",
            async: false,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                for (i = 0; i < data.length; i++) {
                    html += '<tr>'+
                    			'<td>'+data[i].dni_capacitador+'</td>'+
                    			'<td>'+data[i]. apellidos_capacitador+'</td>'+
                    			'<td>'+ data[i].nombres_capacitador+'</td>'+
                                '<td>'+data[i].profesion_capacitador+'</td>'+
                    			'<td>'+data[i].telefono_capacitador+'</td>'+
                    			'<td>'+data[i].email_capacitador+'</td>'+
                    			'<td class="td-actions text-right">'+
                    			'<a href="javascript:;" type="button" rel="tooltip" title="Editar" class="btn btn-success btnEdit" data="' + data[i].id_capacitador + '"><i class="material-icons">edit</i><div class="ripple-container"></div></a>'+
                    			'</td>'+
                    		'</tr>';         
                }
                $('#showdatacapacitador').html(html);
            },
            error: function() {
                alert('Error');
            }
        });
    }

    //boton reset
    $("#btnResetCap").click(function() {
        $("#formCapacitador")[0].reset();
        $('#modalcapac').modal('hide');
    });

    $(document).ready(function(){
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
 });

});