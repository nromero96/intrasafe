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


	init_contadorTa("txtdescripcion","contadordescripcion", 335);

	function init_contadorTa(idtextarea, idcontador,max){
    	$("#"+idtextarea).keyup(function()
            {
                updateContadorTa(idtextarea, idcontador,max);
            });
    
    	$("#"+idtextarea).change(function(){
            updateContadorTa(idtextarea, idcontador,max);
    	});
    }

	function updateContadorTa(idtextarea, idcontador,max){
    	var contador = $("#"+idcontador);
    	var ta =     $("#"+idtextarea);
    	contador.html("0/"+max);
    
    	contador.html(ta.val().length+"/"+max);
    	if(parseInt(ta.val().length)>max){
        	ta.val(ta.val().substring(0,max-1));
        	contador.html(max+"/"+max);
    	}
	}



    //Mostar Lista
	showAllCurso();

	//Boton Agragar
	$('#btnAdd').click(function(){
		$('#mymodal').modal({backdrop: 'static',});
		$('div').addClass('label-floating');
		$('.dvcmp').removeClass('form-group-no');
		$('#mymodal').find('.tit-modal').text('Agregar Nuevo Curso');
		$('#formCurso').attr('action', baseUrl + 'CursoController/saveCurso');




	var options={
		url:baseUrl+'CursoController/showDataCurso',
		getValue:"nombrecurso",
		
		list:{
			maxNumberOfElements: 8,
			match:{
				enabled:true
			},
			onClickEvent: function(){
				var valuedescripcion = $('#txtnombrecurso').getSelectedItemData().descripcion;
				var valueprecio = $('#txtnombrecurso').getSelectedItemData().precio;
				var valueprecio2 = $('#txtnombrecurso').getSelectedItemData().precio2;
				var valueprecio3 = $('#txtnombrecurso').getSelectedItemData().precio3;
				var valuehoras = $('#txtnombrecurso').getSelectedItemData().horas;
				var valuenumeronotas = $('#txtnombrecurso').getSelectedItemData().numeronotas;
				var valuecupos = $('#txtnombrecurso').getSelectedItemData().cupos;

				$('#txtdescripcion').val(valuedescripcion).trigger('change');
				$('#txtprecio').val(valueprecio).trigger('change');
				$('#txtprecio2').val(valueprecio2).trigger('change');
				$('#txtprecio3').val(valueprecio3).trigger('change');
				$('#txthoras').val(valuehoras).trigger('change');
				$('#txtnumeronotas').val(valuenumeronotas).trigger('change');
				$('#txtcupos').val(valuecupos).trigger('change');
			},

			onKeyEnterEvent: function(){
				var valuedescripcion = $('#txtnombrecurso').getSelectedItemData().descripcion;
				var valueprecio = $('#txtnombrecurso').getSelectedItemData().precio;
				var valueprecio2 = $('#txtnombrecurso').getSelectedItemData().precio2;
				var valueprecio3 = $('#txtnombrecurso').getSelectedItemData().precio3;
				var valuehoras = $('#txtnombrecurso').getSelectedItemData().horas;
				var valuenumeronotas = $('#txtnombrecurso').getSelectedItemData().numeronotas;
				var valuecupos = $('#txtnombrecurso').getSelectedItemData().cupos;

				$('#txtdescripcion').val(valuedescripcion).trigger('change');
				$('#txtprecio').val(valueprecio).trigger('change');
				$('#txtprecio2').val(valueprecio2).trigger('change');
				$('#txtprecio3').val(valueprecio3).trigger('change');
				$('#txthoras').val(valuehoras).trigger('change');
				$('#txtnumeronotas').val(valuenumeronotas).trigger('change');
				$('#txtcupos').val(valuecupos).trigger('change');
			},

		}
	};
	$('#txtnombrecurso').easyAutocomplete(options);








	});

	//Guarda o Actualiza
	$('#btnSave').click(function(){
		var url = $('#formCurso').attr('action');
		var data = $('#formCurso').serialize();

		//validar
		var nombre = $('input[name=txtnombre]');
		var vigencia = $('select[name=txtvigencia]');
		var precio = $('input[name=txtprecio]');
		var precio2 = $('input[name=txtprecio2]');
		var precio3 = $('input[name=txtprecio3]');
		var horas = $('input[name=txthoras]');
		var numeronotas = $('input[name=txtnumeronotas]');
		var cupos = $('input[name=txtcupos]');
		var resultad = '';

		if(nombre.val()==''){
			$('#dnombre').addClass('has-error');
		}else{
			$('#dnombre').removeClass('has-error');
			resultad +='1';
		}

		if(vigencia.val()==''){
			$('#dvigencia').addClass('has-error');
		}else{
			$('#dvigencia').removeClass('has-error');
			resultad +='2';
		}

		if(precio.val()==''){
			$('#dprecio').addClass('has-error');
		}else{
			$('#dprecio').removeClass('has-error');
			resultad +='3';
		}

		if(precio2.val()==''){
			$('#dprecio2').addClass('has-error');
		}else{
			$('#dprecio2').removeClass('has-error');
			resultad +='4';
		}

		if(precio3.val()==''){
			$('#dprecio3').addClass('has-error');
		}else{
			$('#dprecio3').removeClass('has-error');
			resultad +='5';
		}

		if(horas.val()==''){
			$('#dduracion').addClass('has-error');
		}else{
			$('#dduracion').removeClass('has-error');
			resultad +='6';
		}

		if(numeronotas.val()==''){
			$('#dnnotas').addClass('has-error');
		}else{
			$('#dnnotas').removeClass('has-error');
			resultad +='7';
		}

		if(cupos.val()==''){
			$('#dndcupos').addClass('has-error');
		}else{
			$('#dndcupos').removeClass('has-error');
			resultad +='8';
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
					$('#mymodal').modal('hide');
						$('#formCurso')[0].reset();
						dnotificacion.showNotification('top','right');
						showAllCurso();
						setInterval("location.reload()",900);
				},
				error: function(){
					swal("¡Ups!", "Algo salió mal!. Intentelo nuevamente", "error");
				}
			});
		    }
	});


	//Editar
	$('#showdata').on('click', '.btnEdit', function(){
		var id = $(this).attr('data');
		$('#mymodal').modal({backdrop: 'static',});
		$('div').removeClass('label-floating');
		$('.dvcmp').addClass('form-group-no');
		$('#mymodal').find('.tit-modal').text('Actualizar Curso');
		$('#formCurso').attr('action', baseUrl + "CursoController/updateCurso");
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: baseUrl + "CursoController/editCurso",
			data: {id: id},
			async: false,
			dataType: 'json',
			success: function(data){
				$('input[name=txtnombre]').val(data.nombrecurso);
				$('select[name=txtvigencia]').val(data.vigencia_curso);
				$('textarea[name=txtdescripcion]').val(data.descripcion);
				$('select[name=slcapacitador]').val(data.id_capacitador);
				$('input[name=txtprecio]').val(data.precio);
				$('input[name=txtprecio2]').val(data.precio2);
				$('input[name=txtprecio3]').val(data.precio3);
				$('input[name=txthoras]').val(data.horas);
				$('input[name=txtnumeronotas]').val(data.numeronotas);
				$('input[name=txtcupos]').val(data.cupos);
				$('select[name=slcfirmagt]').val(data.firmagerente);
				$('textarea[name=tipocert]').val(data.desc_tipocertificado);

				$('checkbox[name=showdescripcion]').val(data.mostrar_descripcion);
				if(data.mostrar_descripcion=='1'){
					$("#showdescripcion").prop('checked', true);
				}else if(data.mostrar_descripcion=='0'){
					$("#showdescripcion").prop('checked', false);
				}

				$('checkbox[name=shownotact]').val(data.mostrar_nota);
				if(data.mostrar_nota=='1'){
					$("#shownotact").prop('checked', true);
				}else if(data.mostrar_nota=='0'){
					$("#shownotact").prop('checked', false);
				}

				$('input[name=txtCurso]').val(data.id_curso);

			},
			error: function(){
				 swal("¡Ups!", "Algo salió mal!. Intentelo nuevamente", "error");
			}
		});
	}
	);

	//Filtrar por nombre del curso
	
	// $('select#idslecurso').on('change',function(){
	// 	var nomcur = $(this).val();

	// 	if(nomcur !=''){
 // 			$.ajax({
	// 			type: 'ajax',
	// 			method: 'get',
	// 			url: baseUrl + "CursoController/showAllCurso",
	// 			data: {nomcur: nomcur},
	// 			async: false,
	// 			dataType: 'json',
	// 			success: function(data){
	// 				var html = '';
	// 				var i;
	// 				for (i=0; i<data.length; i++){
	// 					html +='<tr>'+
	// 								'<input value="'+data[i].id_curso+'" type="hide" id="iddcc" >'+
	// 								'<td>'+'#'+'</td>'+
	// 								'<td>'+data[i].nombrecurso+'</td>'+
	// 								'<td>'+data[i].FechaInicio+'</td>'+
	// 								'<td>'+data[i].horas+' Horas'+'</td>'+
	// 								'<td>'+data[i].cupos+'</td>'+
	// 								'<td>'+data[i].apellidos_capacitador+' '+data[i].nombres_capacitador+'</td>'+
	// 								'<td class="td-actions text-center">'+
	// 								'<a href="javascript:;" type="button" title="Horario" class="btn btn-info btnVHorario" data="'+data[i].id_curso+'"><i class="material-icons">insert_invitation</i></a>'+'</td>'+
	// 								'<td class="td-actions text-right">'+
	// 								'<a href="javascript:;" type="button" title="Editar" class="btn btn-success btnEdit" data="'+data[i].id_curso+'"><i class="material-icons">edit</i></a> <a href="javascript:;" type="button" title="Eliminar" class="btn btn-danger btnDeletCurso" data="'+data[i].id_curso+'"><i class="material-icons">close</i></a>'+'</td>'+
	// 							'</tr>';
	// 				}
	// 				$('#showdata').html(html);
	// 			},
	// 			error:function(){
	// 				swal("¡Ups!", "Algo salió mal al momento de listar!. Intentelo nuevamente", "error");
	// 			}
	// 		});	
 //    	}else{
 //    		swal("¡Ups!", "Algo salió mal!. Intentelo nuevamente", "error");
 //    	}
	// });


	$('#btnFiltCurso').click(function(){
		var txtnombrecurso = $('select[name=slccurso]');
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

		var gettxtnombrecurso = $("#idslecurso option:selected").val();
		var getf1 = $("#txtdesde").val();
		var getf2 = $("#txthasta").val();



		if(resultad=='12'){
			
			showAllCursoFiltro(gettxtnombrecurso,getf1,getf2);

			//alert('Prueba: '+getf1+' '+getf2+' '+gettxtnombrecurso)
		}

	});

	//Curso por fechas
	function showAllCursoFiltro(gettxtnombrecurso,getfdesde,getfhasta){
		$.ajax({
			type:'get',
			method: 'get',
			url: baseUrl + 'cursoController/showAllCursoForDateAndName',
			data:{nc:gettxtnombrecurso, f1:getfdesde, f2:getfhasta},
			async: false,
			dataType: 'json',
			success: function(data){
				var html = '';
				var i;
				for (i=0; i<data.length; i++){
					html +='<tr>'+
								'<input value="'+data[i].id_curso+'" type="hide" id="iddcc" >'+
								'<td>'+data[i].nombrecurso+'</td>'+
								'<td>'+data[i].FechaInicio+'</td>'+
								'<td>'+data[i].horas+' Horas'+'</td>'+
								'<td>'+data[i].cupos+'</td>'+
								'<td>'+data[i].apellidos_capacitador+' '+data[i].nombres_capacitador+'</td>'+
								'<td class="td-actions text-center">'+
								'<a href="javascript:;" type="button" title="Horario" class="btn btn-info btnVHorario" data="'+data[i].id_curso+'"><i class="material-icons">insert_invitation</i></a>'+'</td>'+
								'<td class="td-actions text-right">'+
								'<a href="javascript:;" type="button" title="Editar" class="btn btn-success btnEdit" data="'+data[i].id_curso+'"><i class="material-icons">edit</i></a> <a href="javascript:;" type="button" title="Eliminar" class="btn btn-danger btnDeletCurso" data="'+data[i].id_curso+'"><i class="material-icons">close</i></a>'+'</td>'+
							'</tr>';
				}
				$('#showdata').html(html);
				
			},

			error:function(){
				swal("¡Ups!", "Algo salió mal!. Intentelo nuevamente", "error");
			}
		});
	}


	//boton reset
	$("#btnReset").click(function(){
		$("#formCurso")[0].reset();
	});


	//Horarios del curso..............................//
    //DataPicker
	$( document ).ready(function() {
        $('#idfechahorario').datepicker();
    });

    //Añadir horario
 	$('#btnAddHorario').click(function(){
		var url = $('#formHorario').attr('action');
		var data = $('#formHorario').serialize();
		var fecha = $('input[name=txtfecha]');
		var horainicio = $('input[name=txthorainicio]');
		var horafin = $('input[name=txthorafin]');
		var lugardeclase = $('input[name=txtlugardeclase]');
		var idcurso = $('input[name=txtvalidcurso]');
		var resultad = '';
		if(fecha.val()==''){
			$('#dfecha').addClass('has-error');
		}else{
			$('#dfecha').removeClass('has-error');
			resultad +='1';
		}

		if(horainicio.val()==''){
			$('#dhorainicio').addClass('has-error');
		}else{
			$('#dhorainicio').removeClass('has-error');
			resultad +='2';
		}

		if(horafin.val()==''){
			$('#dhorafin').addClass('has-error');
		}else{
			$('#dhorafin').removeClass('has-error');
			resultad +='3';
		}

		if(lugardeclase.val()==''){
			$('#dlugarcurso').addClass('has-error');
		}else{
			$('#dlugarcurso').removeClass('has-error');
			resultad +='4';
		}

		if(idcurso.val()==''){
			$('#didcurso').addClass('has-error');
		}else{
			$('#didcurso').removeClass('has-error');
			resultad +='5';
		}
		getidcurso =$("#idcursoforhorario").val();
		if(resultad == '12345'){
			$.ajax({
				type:'ajax',
				method: 'post',
				url: url,
				data: data,
				async: false,
				dataType:'json',
				success: function(respuesta){
						$('#formHorario')[0].reset();
						showHoraioPorCurso(getidcurso);
						if(respuesta.type=='add'){
							var type='Agregado'
						}else if(respuesta.type=='update'){
                             var type='Actualizado'
						}
	
				},
				error: function(){
					swal("¡Ups!", "Algo salió mal!. Intentelo nuevamente", "error");
				}
			});
		}
	});

   //Eliminar Horario
	$('#showhorario').on('click', '.item-delete', function (){
		var idHorario = $(this).attr('data');
		getidcurso =$("#idcursoforhorario").val();
		swal({
  			title: "¿Estás seguro?",
  			text: "Una vez que se elimine, ¡no podrá recuperar!",
  			icon: "warning",
  			dangerMode: true,
  			buttons: true,
		})
		.then((willDelete) => {
  			if (willDelete) {
					$.ajax({
						type: 'ajax',
						method: 'get',
						async: false,
						url: baseUrl + "CursoController/deleHorarioForCurso",
						data:{id:idHorario},
						success: function(respuesta){
								showHoraioPorCurso(getidcurso);
						},
						error: function(){
							alert('Error deleting');
						}
					});
    			swal("¡Echo! ¡La fecha ha sido eliminado!", {
      				icon: "success",
    			});
  			}else{
    			swal("¡La fecha no fue eliminado!");
  			}
		});

	});



	//Boton Elimina Curso
	$('#showdata').on('click', '.btnDeletCurso', function(){
		var idcurso = $(this).attr('data');
		swal({
  			title: "¿Estás seguro?",
  			text: "Una vez que se elimine, ¡no podrá recuperar!",
  			icon: "warning",
  			dangerMode: true,
  			buttons: true,
		})
		.then((willDelete) => {
 		 if (willDelete) {
			$.ajax({
				type: 'ajax',
				method: 'get',
				async: false,
				url: baseUrl + "CursoController/deleteCurso",
				data:{id:idcurso},
				success: function(respuesta){
					swal("¡Echo! ¡El curso fue eliminado!", {
      					icon: "success",
    				});
					showAllCurso();
					location.reload();
				},
				error: function(){
					swal("¡Ups!", "Error al eliminar el curso!. Intentelo nuvamente.", "error");
				}
			});

  		} else {
    		
  		}
		});

	});


	//Listar Horario
	$('#showdata').on('click', '.btnVHorario', function(){
    	var idcurso = $(this).attr('data');
    	$("#validcurso").val(idcurso);
    	$('#mymodalHorario').modal({backdrop: 'static',});
    	$('#formHorario').attr('action', baseUrl + 'CursoController/saveHorarioForCurso');
    	$('#idcursoforhorario').val(idcurso);
    	viewNameCurso(idcurso);
    	showHoraioPorCurso(idcurso);
    });


	function showHoraioPorCurso(idcurso){
		$getidcurso = idcurso;
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: baseUrl + "CursoController/showAllHorarioForCurso",
			data:{id:idcurso},
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
								'<td>'+datah[i].lugar_de_clase+'</td>'+
								'<td class="td-actions text-right">'+
								'<a href="javascript:;" type="button" rel="tooltip" title="Eliminar" class="btn btn-danger item-delete" data="'+datah[i].id_horario+'"><i class="material-icons">close</i><div class="ripple-container"></div></a>'+'</td>'+
							'</tr>';
				}
				$('#showhorario').html(html);
			},
			error:function(){
				swal("¡Ups!", "Algo salió mal!. Intentelo nuevamente", "error");
			}
		});
	}

	function viewNameCurso(idcurso){
		$getidcurso = idcurso;
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: baseUrl + "CursoController/viewNameCurso",
			data:{id:idcurso},
			async: false,
			dataType: 'json',
			success: function(data){
				$('#spnomcurso').text(data.nombrecurso);
				$('#spnumhoras').text('('+data.horas+' Horas)');
			},
			error:function(){
				swal("¡Ups!", "Algo salió mal!. Intentelo nuevamente", "error");
			}
		});
	}


	$('#btnCerrarH').click(function(){
		location.reload();
	});


	//Funcion Mostar Lista
	function showAllCurso(){
		var txtc='Todo';
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: baseUrl + "CursoController/showAllCurso",
			data:{nomcur:txtc},
			async: false,
			dataType: 'json',
			success: function(data){
				var html = '';
				var i;
				for (i=0; i<data.length; i++){
					html +='<tr>'+
								'<input value="'+data[i].id_curso+'" type="hide" id="iddcc" >'+
								'<td>'+data[i].nombrecurso+'</td>'+
								'<td><span class="hidden">'+data[i].fhorder+'</span>'+data[i].FechaInicio+'</td>'+
								'<td>'+data[i].horas+' Horas'+'</td>'+
								'<td>'+data[i].cupos+'</td>'+
								'<td>'+data[i].apellidos_capacitador+' '+data[i].nombres_capacitador+'</td>'+
								'<td class="td-actions text-center">'+
								'<a href="javascript:;" type="button" title="Horario" class="btn btn-info btnVHorario" data="'+data[i].id_curso+'"><i class="material-icons">insert_invitation</i></a>'+'</td>'+
								'<td class="td-actions text-right">'+
								'<a href="javascript:;" type="button" title="Editar" class="btn btn-success btnEdit" data="'+data[i].id_curso+'"><i class="material-icons">edit</i></a> <a href="javascript:;" type="button" title="Eliminar" class="btn btn-danger btnDeletCurso" data="'+data[i].id_curso+'"><i class="material-icons">close</i></a>'+'</td>'+
							'</tr>';
				}
				$('#showdata').html(html);
			},
			error:function(){
				swal("¡Ups!", "Algo salió mal!. Refresca la página", "error");
			}
		});
	}

});


	$(document).ready(function(){
		$('#txtdesde').datepicker();
        $('#txthasta').datepicker();


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