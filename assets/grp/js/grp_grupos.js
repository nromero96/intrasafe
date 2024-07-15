$(document).ready(function(){

	function getUrlParameter(search_param){
		var url_part = window.location.search.substring(1);
		var decoded_url_part = decodeURIComponent(url_part);
		var params = decoded_url_part.split('&');
		for(i = 0; i < params.length; i++){
			param = params[i].split('=');
			if(search_param == param[0]){
				return param[1];
			}
		}
	}
	var id = getUrlParameter('idcl');
	var tipocl = getUrlParameter('tipcl');

	$('input[name=tpcliente]').val(tipocl);

	if(tipocl=='EM'){
		//Mostrar Datos de la empresa
		if(id != ''){
			$.ajax({
				type: 'GET',
				url: baseUrl + "GrupoEmpresaController/getNomEm",
				data: {id: id},
				async: false,
				dataType: 'json',
				success: function(data){
					$('#txtnomemp').text(data.razonsocial);
					$('#ruccliente').text(data.ruc);
				},
				error:function(){
					swal("¡Ups!", "Algo salió mal!. Por favor refresque la página", "error");
				}
			});
		}else{
    		swal("¡Ups!", "No encontramos la empresa.! Intente nuevamente.", "error");
    	}
	}

	if(tipocl=='PN'){
		//Mostrar Datos de la empresa
		if(id != ''){
			$.ajax({
				type: 'GET',
				url: baseUrl + "GrupoEmpresaController/getNomPn",
				data: {id: id},
				async: false,
				dataType: 'json',
				success: function(data){
					$('#txtnompna').text(data.nombrecontacto+' '+data.apellidoscontacto);
					$('#dnicliente').text(data.ruc);
				},
				error:function(){
					swal("¡Ups!", "Algo salió mal!. Por favor refresque la página", "error");
				}
			});
		}else{
    		swal("¡Ups!", "No encontramos la empresa.! Intente nuevamente.", "error");
    	}
	}


	//Listar Grupos de la empresa
	if(id != ''){
 			$.ajax({
				type: 'GET',
				url: baseUrl + "GrupoEmpresaController/showAllForEmpresa",
				data: {id: id},
				async: false,
				dataType: 'json',
				success: function(data1){
					var html = '';
					var i;
					var btndelgru;
					for (i=0; i<data1.length; i++){

						if(data1[i].cantidadAlumnos == 0){
							btndelgru = '<div class="text-right btndvdgroup"><a class="btn btn-danger btn-round btn-sm btnDeleteGrupo" style="padding: 5px 10px;" href="javascript:;" data="'+data1[i].id_grupo+'""><b>X</b></a></div>';
						}else{
							btndelgru = '';
						}
						html +='<div class="col-md-3">'+

								'<div class="card card-pricing card-raised">'+
									btndelgru+
									'<div class="content text-center">'+
										'<div class="card-header" data-background-color="blue">'+
											'<marquee direction="left"><span>'+data1[i].nombregrupo+'</span></marquee>'+
										'</div>'+
										'<p>'+'<img style="max-width: 80px;" src="'+baseUrl + 'assets/img/folder.png'+'">'+'</p>'+
										'<span>'+data1[i].FechaInicio+'</span>'+'<br>'+
										'<a class="btn btn-info btn-round btnVDetalle" href="javascript:;" data="'+data1[i].id_grupo+'"">Ver Detalle</a>'+
									'</div>'+
								'</div>'+
							'</div>';
				}
					
					if (html==''){
						$('#showgrupos').html('<p class="text-center"><label>Aun no tiene Grupos</label></p>');
					}else{
						$('#showgrupos').html(html);
					}
					
					
				},
				error:function(){
					swal("¡Ups!", "Algo salió mal!. Por favor refresque la página", "error");
				}
			});	
    	}else{
    		swal("¡Ups!", "No encontramos la empresa.! Intente nuevamente.", "error");
    	}


    	$('#txtcodigoc').on('input', function () { 
    		this.value = this.value.replace(/[^0-9]/g,'');
		});

    	$('.iptnotas').on('input', function () { 
    		this.value = this.value.replace(/[^0-9]/g,'');
		});	

		$('[data-toggle="tooltip"]').tooltip();	

});




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


	//Boton ver detalle
	$('#showgrupos').on('click', '.btnVDetalle', function(){
		var id_g = $(this).attr('data');
		detalleGrupo(id_g);
	});

	function detalleGrupo(id_g){
		$('#dvlisgrupo').addClass('hidden');
		$('#dvdetallgrupo').removeClass('hidden');

		//Para confirmar grupo
		$('#formconflistalum').attr('action', baseUrl + 'emp/GrupoController/confirmarAlumnos');

		//Para  reabrir grupo
		$('#formreablistalum').attr('action', baseUrl + 'GrupoEmpresaController/reabrirAlumnos');

		$.ajax({
			type: 'GET',
			url: baseUrl + "GrupoEmpresaController/verGrupoDetalle",
			data: {id: id_g},
			async: false,
			dataType: 'json',
			success: function(data){
				//$('#txtnombredelcurso').text(data.nombrecurso);
				$('input[name=texidcurso]').val(data.id_curso);
				$('#gnombredelgrupo').text(data.nombregrupo);
				$('input[name=estadogrupo]').val(data.estado_grupo);
				$('#lblcuposreservados').text(data.ncupos);
				$('input[name=txtcuposreservados]').val(data.ncupos);
				$('#txtnombredelcurso').text(data.nombregrupo);
				$('input[name=texidgrupo]').val(data.id_grupo);
				$('input[name=txt1idgrupo]').val(data.id_grupo);
				$('input[name=numnotasdelcurso]').val(data.numeronotas);

				$('input[name=txtidcurs]').val(data.id_curso);
				$('input[name=txtdescipcioncurso]').val(data.descripcion);
				$('input[name=txtidgrup]').val(data.id_grupo);

				$('input[name=txtidcursr]').val(data.id_curso);
				$('input[name=txtidgrupr]').val(data.id_grupo);
			},
			error: function(){
				 swal("¡Ups!", "Algo salió mal al momento de Editar!. Intentelo nuevamente", "error");
			}
		});
		showAllAlumnoGrupo(id_g);
		countAlumnoPorGrupo(id_g);
	}


	$('#showgrupos').on('click', '.btnDeleteGrupo', function(){
		var id_g = $(this).attr('data');
		swal({
		  title: "¿Estás seguro?",
		  text: "Una vez que se elimine no podrá recuperar!",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  	if (willDelete) {
				$.ajax({
					type: 'GET',
					async: false,
					url: baseUrl + "GrupoEmpresaController/deleteGrupo",
					data:{idg:id_g},
					success: function(respuesta){
		    			swal("¡Echo! ¡El grupo fue eliminado!", {
		      				icon: "success",
		    			});	
		    			setTimeout(function(){
       						location.reload();
   						},2000);
					},
					error: function(){
						swal("¡Ups!", "¡Algo salió mal!. Intentelo nuevamente", "error");
					}
				});
		  	}else{
		    	
		  }
		});

		

	});

   //Confirmar o Cerrar lista de alumnos
   	$('#btnConfirmAlumnos').click(function(){

   		var url = $('#formconflistalum').attr('action');
		var data = $('#formconflistalum').serialize();


		var gdatagrupo = $('input[name=txtidgrup]');
		var gidcurso = $('input[name=txtidcurs]');
		var resultad='';

		if(gdatagrupo.val()==''){
			swal("¡Ups!", "Algo salió mal!. Por favor refresque la página", "error");
		}else{
			resultad +='1';
		}

		if(gidcurso.val()==''){
			swal("¡Ups!", "Algo salió mal!. Por favor refresque la página", "error");
		}else{
			resultad +='2';
		}

		var getidgrup = $("#txtidgrup").val();

		if(resultad=='12'){
				$.ajax({
				type:'POST',
				url: url,
				data: data,
				async: false,
				dataType:'json',
				success: function(respuesta){
						detalleGrupo(getidgrup);
						showAllAlumnoGrupo(getidgrup);
						dnotificacion.showNotification('top','right');
				},
				error: function(){
					swal("¡Ups!", "Error al confirmar la lista de alumnos!. Intentelo nuevamente", "error");
				}
			});
		}
	});


	//reabrir lista de alumnos
   	$('#btnReabrirAlumnos').click(function(){

   		var url = $('#formreablistalum').attr('action');
		var data = $('#formreablistalum').serialize();


		var gdatagrupo = $('input[name=txtidgrupr]');
		var gidcurso = $('input[name=txtidcursr]');
		var resultad='';

		if(gdatagrupo.val()==''){
			swal("¡Ups!", "Algo salió mal!. Por favor refresque la página", "error");
		}else{
			resultad +='1';
		}

		if(gidcurso.val()==''){
			swal("¡Ups!", "Algo salió mal!. Por favor refresque la página", "error");
		}else{
			resultad +='2';
		}

		var getidgrup = $("#txtidgrupr").val();

		if(resultad=='12'){
				$.ajax({
				type:'POST',
				url: url,
				data: data,
				async: false,
				dataType:'json',
				success: function(respuesta){
						detalleGrupo(getidgrup);
						showAllAlumnoGrupo(getidgrup);
						dnotificacion.showNotification('top','right');
				},
				error: function(){
					swal("¡Ups!", "Error al reabrir la lista de alumnos!. Intentelo nuevamente", "error");
				}
			});
		}
	});



	//funcion show lista
	function countAlumnoPorGrupo(getidgrupo){
	var idg=getidgrupo;
		$.ajax({
			type: 'GET',
			url: baseUrl + "emp/GrupoController/countAlumnoPorGrupo",
			data:{id:idg},
			async: false,
			dataType: 'json',
			success: function(data){
				$('#lblcantalumns').text(data);
				$('input[name=txtcantalumns]').val(data);

				var estadgrup = $("#estadogrupo").val();
				if(estadgrup==0){
					$('#btnAddAlumnoGrupo').removeClass('hidden');
					$('#btnAddAlumnoGrupo').attr('disabled',false);
				}else if(estadgrup==1){
					$('#btnAddAlumnoGrupo').addClass('hidden');
					$('#btnAddAlumnoGrupo').attr('disabled',true);
				}

				var cuposreservados = $("#txtcuposreservados").val();
				if(data >= cuposreservados){
					$('#btnAddAlumnoGrupo').attr('disabled',true);
				}else{
					$('#btnAddAlumnoGrupo').attr('disabled',false);
					
				}
				
				if(estadgrup==0 && data >= 1){
					$('#dvbtnconfirmar').removeClass('hidden');
					$('#dvbtnreabrir').addClass('hidden');
				}else{
					$('#dvbtnconfirmar').addClass('hidden');
					$('#dvbtnreabrir').removeClass('hidden');
				}


			},
			error:function(){
				swal("¡Ups!", "Algo salió mal!. Por favor refresque la página", "error");
			}
		});
	}


	//Boton Add Alumno al grupo
	$('#btnAddAlumnoGrupo').click(function(){
		$('#modaladdalumnoagrupo').modal('show');
		$('#modaladdalumnoagrupo').find('.tit-modal').text('Agregar Alumno al Grupo');
		$('#formAddAlumnoGrupo').attr('action', baseUrl + 'emp/GrupoController/saveAlumnoAGrupo');

		$('#txtididalumno').val('');
		$('#previewimg1').html('');


	});

	var options={
		url:baseUrl+'emp/GrupoController/showDataAlumno',
		getValue:"numerodocumento",
		
		list:{
			maxNumberOfElements: 6,
			match:{
				enabled:true
			},
			onClickEvent: function(){
				var valueidalumno = $('#idtxtnumerodocumento').getSelectedItemData().id_alumno;
				var valuetipodocumento = $('#idtxtnumerodocumento').getSelectedItemData().tipodocumento;
				var valueapellidos = $('#idtxtnumerodocumento').getSelectedItemData().apellidos;
				var valuenombres = $('#idtxtnumerodocumento').getSelectedItemData().nombres;
				var valuefnacimiento = $('#idtxtnumerodocumento').getSelectedItemData().fnacimiento;
				var valuetelefono = $('#idtxtnumerodocumento').getSelectedItemData().telefono;
				var valueemail = $('#idtxtnumerodocumento').getSelectedItemData().email;
				var valfotoperfil = $('#idtxtnumerodocumento').getSelectedItemData().fotoperfil;

				$('#txtididalumno').val(valueidalumno).trigger('change');
				$('#idtxttipodocumento').val(valuetipodocumento).trigger('change');
				$('#idtxtapellidos').val(valueapellidos).trigger('change');
				$('#idtxtnombres').val(valuenombres).trigger('change');
				$('#idtxtfnacimiento').val(valuefnacimiento).trigger('change');
				$('#idtxttelefono').val(valuetelefono).trigger('change');
				$('#idtxtemail').val(valueemail).trigger('change');
				$('#previewimg1').html('<img src="'+baseUrl+'uploads/fotos/'+valfotoperfil+'" width="150" style="width: 150px;">');
			},

			onKeyEnterEvent: function(){
				var valueidalumno = $('#idtxtnumerodocumento').getSelectedItemData().id_alumno;
				var valuetipodocumento = $('#idtxtnumerodocumento').getSelectedItemData().tipodocumento;
				var valueapellidos = $('#idtxtnumerodocumento').getSelectedItemData().apellidos;
				var valuenombres = $('#idtxtnumerodocumento').getSelectedItemData().nombres;
				var valuefnacimiento = $('#idtxtnumerodocumento').getSelectedItemData().fnacimiento;
				var valuetelefono = $('#idtxtnumerodocumento').getSelectedItemData().telefono;
				var valueemail = $('#idtxtnumerodocumento').getSelectedItemData().email;
				var valfotoperfil = $('#idtxtnumerodocumento').getSelectedItemData().fotoperfil;

				$('#txtididalumno').val(valueidalumno).trigger('change');
				$('#idtxttipodocumento').val(valuetipodocumento).trigger('change');
				$('#idtxtapellidos').val(valueapellidos).trigger('change');
				$('#idtxtnombres').val(valuenombres).trigger('change');
				$('#idtxtfnacimiento').val(valuefnacimiento).trigger('change');
				$('#idtxttelefono').val(valuetelefono).trigger('change');
				$('#idtxtemail').val(valueemail).trigger('change');
				$('#previewimg1').html('<img src="'+baseUrl+'uploads/fotos/'+valfotoperfil+'" width="150" style="width: 150px;">');
			}
		}
	};

	$('#idtxtnumerodocumento').easyAutocomplete(options);
	
	//Boton Save Alumno a Grupo
	$('#formAddAlumnoGrupo').submit(function(e){
        e.preventDefault();

		var id_grupo = $("#texididgrupo").val();
		var id_alumno = $("#txtididalumno").val();
		$.ajax({
			type: 'GET',
			url: baseUrl + "GrupoEmpresaController/verifAlumEnGrupo",
			data: {idgrupo: id_grupo, idalumno:id_alumno},
			async: false,
			dataType: 'json',
			success: function(data){

				if(data==true){
					//Si, el alumno ya esta registrado en el curso y grupo
					swal("¡Alerta!", "El alumno ya se encuentra registrado en el curso", "info");
				
				}else if(data==false){
				    
					var url = $('#formAddAlumnoGrupo').attr('action');
					var formData = new FormData($('#formAddAlumnoGrupo')[0]);

					var id_grupo = $("#texididgrupo").val(); //Data para enviar a la funcion

					$.ajax({
						type: 'POST',
                        url: url,
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        async: false,
                        dataType: 'json',
						success: function(respuesta){
							$('#modaladdalumnoagrupo').modal('hide');
								$('#formAddAlumnoGrupo')[0].reset();
								if(respuesta.type=='add'){
									var type='Agregado'
								}else if(respuesta.type=='update'){
		                             var type='Actualizado'
								}
								//$('.alert-success').html('Curso '+type+' con éxito</b>').fadeIn().delay(4000).fadeOut('slow');
								dnotificacion.showNotification('top','right');
						},
						error: function(){
							swal("¡Ups!", "Algo salió mal!. Intentelo nuevamente", "error");

						}
					});
					
				    showAllAlumnoGrupo(id_grupo);
				    countAlumnoPorGrupo(id_grupo);
				}
			},
			error: function(){
				 swal("¡Ups!", "Algo salió mal!. Intentelo nuevamente", "error");
			}
		});
	});


	//funcion show lista
	function showAllAlumnoGrupo(getidgrupo){
	var idg=getidgrupo;
	$.ajax({
			type: 'GET',
			url: baseUrl + "GrupoEmpresaController/showAlumnoIEnGrupo",
			data:{id:idg},
			async: false,
			dataType: 'json',
			success: function(data){

				var gtnumeronotas= $("#numnotasdelcurso").val();

				if(gtnumeronotas=='1'){
					$('#thnot1').removeClass('hidden');
				}

				if(gtnumeronotas=='2'){
					$('#thnot1').removeClass('hidden');
					$('#thnot2').removeClass('hidden');
				}

				if(gtnumeronotas=='3'){
					$('#thnot1').removeClass('hidden');
					$('#thnot2').removeClass('hidden');
					$('#thnot3').removeClass('hidden');
				}

				if(gtnumeronotas=='4'){
					$('#thnot1').removeClass('hidden');
					$('#thnot2').removeClass('hidden');
					$('#thnot3').removeClass('hidden');
					$('#thnot4').removeClass('hidden');
				}



				var html = '';
				var html2 = '';
				var i;
				var num = 1;
				var condicionalm='No definido';
				for (i=0; i<data.length; i++){

					if(gtnumeronotas=='0'){
						ntdnots='';
					}

					if(gtnumeronotas=='1'){
						ntdnots='<td>'+data[i].nota1+'</td>';
					}

					if(gtnumeronotas=='2'){
						ntdnots='<td>'+data[i].nota1+'</td>'+
								'<td>'+data[i].nota2+'</td>';
					}

					if(gtnumeronotas=='3'){
						ntdnots='<td>'+data[i].nota1+'</td>'+
								'<td>'+data[i].nota2+'</td>'+
								'<td>'+data[i].nota3+'</td>';
					}

					if(gtnumeronotas=='4'){
						ntdnots='<td>'+data[i].nota1+'</td>'+
								'<td>'+data[i].nota2+'</td>'+
								'<td>'+data[i].nota3+'</td>'+
								'<td>'+data[i].nota4+'</td>';
					}


					if(data[i].condicion=='1'){
						condicionalm='Aprobado';
					}
					if(data[i].condicion=='2'){
						condicionalm='Desaprobado';
					}
					if(data[i].condicion=='0'){
						condicionalm='_____________';
					}

					if(data[i].cert_btn == '0'){

						btnedtnota = ' <a href="javascript:;" type="button" data-toggle="tooltip" data-placement="top" data-original-title="Editar Nota" class="btn btn-success btnEditAlu" data="'+data[i].id_alumno_grupo+'"><i class="material-icons">border_color</i> Editar Nota</a>';
					
						if(data[i].condicion == '1' || gtnumeronotas == '0'){
							btngccert = '<a href="javascript:;" type="button" data-toggle="tooltip" data-placement="top" data-original-title="Generar Certificado" class="btn btn-primary btngnrarcert" data="'+data[i].id_alumno_grupo+'"><i class="material-icons">chrome_reader_mode</i> Generar</a>';
						}
						else if(data[i].condicion == '2'){
							btngccert = '';
						}else if(data[i].condicion =='0'){
							btngccert = '';
						}

					}

					if(data[i].cert_btn == '1'){
						btngccert = ' <a href="javascript:;" type="button" data-toggle="tooltip" data-placement="top" data-original-title="Ver Certificado" class="btn btn-info btnVCert" data="'+data[i].id_alumno_grupo+'"><i class="material-icons">chrome_reader_mode</i> Ver Certificado</a> <a href="javascript:;" type="button" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar Certificado" class="btn btn-danger btnDlCert" data="'+data[i].id_alumno_grupo+'"><i class="material-icons">delete</i></a>';
						btnedtnota = ''; 
					}


					if(data[i].estado_alumno_grupo=='1'){
						tipocl=$('#tpcliente').val();
						if (tipocl=='EM') {

							btndeletealumno=' <a href="javascript:;" type="button" data-toggle="tooltip" data-placement="top" data-original-title="Quitar Alumno" class="btn btn-danger btnDeletAlu" data="'+data[i].id_alumno_grupo+'"><i class="material-icons">close</i></a>';
						
						}
						if(tipocl=='PN'){
							/*btndeletealumno='';*/
							btndeletealumno=' <a href="javascript:;" type="button" data-toggle="tooltip" data-placement="top" data-original-title="Quitar Alumno" class="btn btn-danger btnDeletAlu" data="'+data[i].id_alumno_grupo+'"><i class="material-icons">close</i></a>';
						
						}
					}

					if (data[i].estado_alumno_grupo=='2'){
						btndeletealumno='';
					}


					html +='<tr>'+
								'<td>'+ num++ +'</td>'+
								'<td><img src="'+baseUrl+'/uploads/fotos/'+data[i].fotoperfil+'" class="img-circle" style="width: 30px; height: 30px;"></td>'+
								'<td>'+data[i].numerodocumento+'</td>'+
								'<td>'+data[i].apellidos+'</td>'+
								'<td>'+data[i].nombres+'</td>'+
										ntdnots+
								'<td>'+data[i].promedio+'</td>'+
								'<td>'+condicionalm+'</td>'+
								'<td class="td-actions text-right">'+btngccert+''+btnedtnota+''+btndeletealumno+'</td>'+
							'</tr>';
							    /* Boton Ver: <a href="javascript:;" type="button" rel="tooltip" title="Ver" class="btn btn-info"><i class="material-icons">visibility</i><div class="ripple-container"></div></a> */
				}
				$('#showListaAlumnosForGrupo').html(html);
				$('[data-toggle="tooltip"]').tooltip();	

			},
			error:function(){
				swal("¡Ups!", "Algo salió mal!. Refresque la página.", "error");
			}
		});
	}

	//Editar Alumno en Grupo
	$('#showListaAlumnosForGrupo').on('click', '.btnEditAlu', function(){
		var id = $(this).attr('data');
		$('#modalrnotas').modal('show');
		$('div').removeClass('label-floating');
		$('#modalrnotas').find('.tit-modal').text('Actualizar Notas del Alumno');
		$('#formrnotas').attr('action', baseUrl + "GrupoEmpresaController/updateAlumnoNota");

		//Vista de textinputs por numero notas
		getnumnotas= $("#numnotasdelcurso").val();

		

		if(getnumnotas=='1'){
			$('#dnot1').removeClass('hidden');
		}

		if(getnumnotas=='2'){
			$('#dnot1').removeClass('hidden');
			$('#dnot2').removeClass('hidden');
		}

		if(getnumnotas=='3'){
			$('#dnot1').removeClass('hidden');
			$('#dnot2').removeClass('hidden');
			$('#dnot3').removeClass('hidden');
		}

		if(getnumnotas=='4'){
			$('#dnot1').removeClass('hidden');
			$('#dnot2').removeClass('hidden');
			$('#dnot3').removeClass('hidden');
			$('#dnot4').removeClass('hidden');
		}
		//...........

		$.ajax({
			type: 'GET',
			url: baseUrl + "GrupoEmpresaController/editAlumnoNota",
			data: {id: id},
			async: false,
			dataType: 'json',
			success: function(data){
				if(data.promedio <= 13){
    				$('#txtsmscond').text('Desaprobado');
    			}

    			else if(data.promedio >= 14){
    				$('#txtsmscond').text('Aprobado');
    			}
    			else if(data.promedio == ''){
    				$('#txtsmscond').text('-------------');
    			}

				$('input[name=txtndocumento]').val(data.numerodocumento);
				$('input[name=txtnomalumno]').val(data.nombres+' '+data.apellidos);
				$('input[name=txtnt1]').val(data.nota1);
				$('input[name=txtnt2]').val(data.nota2);
				$('input[name=txtnt3]').val(data.nota3);
				$('input[name=txtnt4]').val(data.nota4);
				$('input[name=txtpromnot]').val(data.promedio);
				$('select[name=slcondicion]').val(data.condicion);

				$('input[name=txtidalumno_grupo]').val(data.id_alumno_grupo);
				$('input[name=texidgrupo]').val(data.id_grupo);
			},
			error: function(){
				 swal("¡Ups!", "Algo salió mal!. Intentelo nuevamente", "error");
			}
		});
	});


	//Eliminar Certificado
	$('#showListaAlumnosForCurso, #showListaAlumnosForGrupo').on('click', '.btnDlCert', function(){
		var idalgp = $(this).attr('data');
		var id_curso = $("#texididcurso").val(); 

		
		swal({
		  title: "¿Estás seguro?",
		  text: "Una vez que se elimine, ¡no podrá recuperar el certificado!",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if(willDelete){
				$.ajax({
					type: 'GET',
					url: baseUrl + "GrupoEmpresaController/deleteCertificado",
					data: {idag: idalgp},
					async: false,
					dataType: 'json',
					success: function(data){

						swal("¡Echo! ¡El certificado ha sido eliminado!", {
				    	  icon: "success",
				    	});
				    	showAllAlumnoCurso(id_curso);

					},
					error: function(){
						 swal("¡Ups!", "Algo salió mal!. Intentelo nuevamente", "error");
					}
				});

		  }else{
		    
		  }
		});

	});


   //Eliminar Alumno del grupo y curso
	$('#showListaAlumnosForGrupo').on('click', '.btnDeletAlu', function (){
		var idAlGr = $(this).attr('data');
		var id_grupo = $("#texididgrupo").val(); //Data para enviar a la funcion

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
					type: 'GET',
					async: false,
					url: baseUrl + "emp/GrupoController/deleteAlumnoDelCurso",
					data:{id:idAlGr},
					success: function(respuesta){
						showAllAlumnoGrupo(id_grupo);
						countAlumnoPorGrupo(id_grupo);
		    			swal("¡Echo! ¡El alumno fue eliminado del grupo!", {
		      				icon: "success",
		    			});		
					},
					error: function(){
						swal("¡Ups!", "¡Algo salió mal!. Intentelo nuevamente", "error");
					}
				});

		  }else{
		    	showAllAlumnoGrupo(id_grupo);
				countAlumnoPorGrupo(id_grupo);
		  }
		});

	});



	//Guarda o Actualiza
	$('#btnSaveNotas').click(function(){
		var url = $('#formrnotas').attr('action');
		//var data = $('#formrnotas').serialize();

		var formData = new FormData($('#formrnotas')[0]);

		var id_grupo = $("#texididgrupo").val();

			$.ajax({
				type:'POST',
				url: url,
				data: formData,
				cache: false,
				contentType: false,
				processData: false,
				async: false,
				dataType:'json',
				success: function(respuesta){
					$('#modalrnotas').modal('hide');
						$('#formrnotas')[0].reset();
						if(respuesta.type=='add'){
							var type='Agregado'
						}else if(respuesta.type=='update'){
                             var type='Actualizado'
						}
						//$('.alert-success').html('Curso '+type+' con éxito</b>').fadeIn().delay(4000).fadeOut('slow');
						dnotificacion.showNotification('top','right');

				},
				error: function(){
					swal("¡Ups!", "Algo salió mal!. Intentelo nuevamente", "error");
				}
			});
			showAllAlumnoGrupo(id_grupo);
	});


	//Bton generar certificado
	$('#showListaAlumnosForGrupo').on('click', '.btngnrarcert', function(){

		$('#formgnrarcert').attr('action', baseUrl + "GrupoEmpresaController/saveCertif");


		$('#modalgnrarcert').modal({backdrop: 'static',});
		var idAlGrup = $(this).attr('data');

		$.ajax({
			type: 'GET',
			url: baseUrl + "GrupoEmpresaController/getDataAlumForCert",
			data: {idag: idAlGrup},
			async: false,
			dataType: 'json',
			success: function(data){
				$('input[name=txtidalumnogrupo]').val(data.id_alumno_grupo);
				$('input[name=txtsericert]').val(data.fechaserie);

				//Ultimo Certificado del serie
				$.ajax({
					type: 'GET',
					url: baseUrl + "Grp_csController/getUltimoCertificado?fechaserie="+data.fechaserie,
					async: false,
					dataType: 'json',
					success: function(datacorrelativo){
						if(datacorrelativo == ''){
							$('#ultimocertif').text('N/A');
						}else{
							$('#ultimocertif').text(datacorrelativo.ct_serie +'-'+ datacorrelativo.ct_correlativo);
						}
					},
					error: function(){
						swal("¡Ups!", "Algo salió mal, no pudimos obetener el correlativo!. Intentelo nuevamente", "error");
					}
				});

			},
			error: function(){
				 swal("¡Ups!", "Algo salió mal!. Intentelo nuevamente", "error");
			}
		});

		//slcertificado selected data-bgimg1
		var selectedOption = $('#slcertificado').find('option:selected');
    	var dataBgfirst = selectedOption.attr('data-bgimg1');
		var dataBgsecond = selectedOption.attr('data-bgimg2');
		$('input[name=txtnombgcert]').val(dataBgfirst);
		$('input[name=img_bg_certificado_dos]').val(dataBgsecond);
		
		$('#prvwcertbg').html('<a><img src="'+baseUrl+'uploads/bgcertificado/'+dataBgfirst+'" style="width: 100%;height: auto;" ></img></a>');

		// $.ajax({
		// 	type: 'GET',
		// 	url: baseUrl + "GrupoEmpresaController/getBgCert",
		// 	async: false,
		// 	dataType: 'json',
		// 	success: function(data){

		// 		$('input[name=txtnombgcert]').val(data.bg_cerficado_imagen);
		// 		$('#prvwcertbg').html('<a><img src="'+baseUrl+'uploads/bgcertificado/'+data.bg_cerficado_imagen+'" style="width: 100%;height: auto;" ></img></a>');
			
		// 	},
		// 	error: function(){
		// 		 swal("¡Ups!", "Algo salió mal!. Intentelo nuevamente", "error");
		// 	}
		// });

	});


	//Boton Guardar Certificado.
	$('#btnSaveCert').click(function(){
		var txtseri = $("#txtsericert").val();
		var txtcodi = $("#txtcodigoc").val();
		var codigocert = txtseri+txtcodi;

		if (txtcodi==''){
			swal('Ingrese el código correlativo');
		}else{

			if (txtcodi.length <= 2){
				swal('Debe ingresar como minimo 3 numero');
			}else{
				$.ajax({
					type: 'GET',
					url: baseUrl + "GrupoEmpresaController/verificarCodigoCertificado",
					data: {codcert: codigocert},
					async: false,
					dataType: 'json',
					success: function(data){
						if(data==true){
							swal("¡Alerta!",'El código "'+codigocert+'" ya existe! Registre otro código', "error")
						}else{

							var url = $('#formgnrarcert').attr('action');
							var data = $('#formgnrarcert').serialize();
							var id_grupo = $("#texididgrupo").val(); //Data para enviar a la funcion

							//validar
							var idalumonogrupo = $('input[name=txtidalumnogrupo]');
							var serie = $('input[name=txtsericert]');
							var bgcertificado = $('input[name=txtnombgcert]');
							var resultad = '';

							if(idalumonogrupo.val()==''){
								swal( "¡Ups!" ,  "Intentelo de nuevo!" ,  "error" );
							}else{
								resultad +='1';
							}

							if(serie.val()==''){
								swal( "¡Ups!" ,  "Intentelo de nuevo!" ,  "error" );
							}else{
								resultad +='2';
							}

							if(bgcertificado.val()==''){
								swal( "¡Ups!" ,  "Intentelo de nuevo!" ,  "error" );
							}else{
								resultad +='3';
							}

								if(resultad=='123'){
									$.ajax({
										type:'POST',
										url: url,
										data: data,
										async: false,
										dataType:'json',
										success: function(respuesta){
											$('#modalgnrarcert').modal('hide');
											$('#formgnrarcert')[0].reset();
											swal("¡Echo!", "El certificado fue generado!.", "success");
											showAllAlumnoGrupo(id_grupo);
										},
										error: function(){
											swal("¡Ups!", "Algo salió mal!. Intentelo nuevamente", "error");
										}
									});
							    }
						}
					},
					error: function(){
					 	swal("¡Ups!", "Algo salió mal!. Intentelo nuevamente", "error");
					}
				});
			}
		}

	});


	$('#showbtns').on('click', '.btnimplisasis', function(){
		$('#modalselecfecha').modal({backdrop: 'static',});
		var idcurso = $("#texididcurso").val();

		$.ajax({
			type: 'GET',
			url: baseUrl + "GrupoEmpresaController/GetListaHorario",
			data: {idcurs: idcurso},
			async: false,
			dataType: 'json',
			success: function(data){
					var i="";
				     var options = "";
				     	options += "<option value=''>-- Seleccione --</option>";
     					for (var i = 0; i < data.length; i++) {
         					options += "<option value=" + data[i].id_horario + ">" + data[i].fecha + "</option>";
     					}
     					$("#slchoraiocrs").html(options);
			},
			error: function(){
				 swal("¡Ups!", "Algo salió mal!. Intentelo nuevamente", "error");
			}
		});

	});


	$('select#slchoraiocrs').on('change',function(){
		var id = $(this).val();
			$('input[name=texidfecha]').val(id);

	});


	$('#btnPrintAsis').click(function(){
		var getidgrup = $("#texididgrupo").val();
		var getidfecha = $("#texidfecha").val();

		if(getidfecha!=''){
					var url = baseUrl+'PdfsController/getListOfAsistForEmp?idg='+getidgrup+'?&idfhc='+getidfecha;
 					window.open(url, '_blank');	
		}else{
			swal("Ups!", "Te olvidastes de seleccionar la fecha!", "error");
		}
	});


	//Lista de notas
	$('#showbtns').on('click', '.btnimpnotas', function(){
		var getidgrup = $("#texididgrupo").val();
		if(getidgrup!=''){
					var url = baseUrl+'PdfsController/getListOfNotasForEmp?idg='+getidgrup;
 					window.open(url, '_blank');	
		}else{
			swal("Ups!", "Algo salió mal.! Refresque la página.", "error");
		}

	});


	$('#showListaAlumnosForGrupo').on('click', '.btnVCert', function(){
		var getidal = $(this).attr('data');
		var getidcs = $("#texididcurso").val();
 		var getdescurso = $("#txtdescipcioncurso").val();
 		
 		var url = baseUrl+'PdfsController/viewcertificado?idalg='+getidal+'&idcs='+getidcs+'&safesi%20training';
		window.open(url, '_blank');

 		/* if (getdescurso==''){
 			var url = baseUrl+'PdfsController/getCertAlumno?safesi%20training&num%20&idalg='+getidal+'&0i8i30k1.0.MHD-PXKqd_8&q=certificado&oq=certificado&idcs='+getidcs+'&psy-ab.3..35i39k1j0&certif='+getidal+'0i6';
			window.open(url, '_blank');
 		}else{
 			var url = baseUrl+'PdfsController/getCertDescripAlumno?safesi%20training&num%20&idalg='+getidal+'&0i8i30k1.0.MHD-PXKqd_8&q=certificado&oq=certificado&idcs='+getidcs+'&psy-ab.3..35i39k1j0&certif='+getidal+'0i6';
			window.open(url, '_blank');
 		} */

		
	});
	

	//boton reset
	$("#btnReset").click(function(){
	/* Single line Reset function executes on click of Reset Button */
	$("#formrnotas")[0].reset();
	});


});

//Calumar promedio
function fncProm() {
	var numeronotas = $("#numnotasdelcurso").val();

    nt1=eval(document.getElementById('txtnt1').value); 
    nt2=eval(document.getElementById('txtnt2').value); 
    nt3=eval(document.getElementById('txtnt3').value); 
    nt4=eval(document.getElementById('txtnt4').value); 

    if (numeronotas=='1') {
    	sumanota = nt1;
    	sumanota2=sumanota;
    	if (nt1<14){
    		sumanota2 =0;
    	}
    }

    if (numeronotas=='2') {
    	sumanota = nt1 + nt2;
    	sumanota2=sumanota;
    	if (nt1<14){
    		sumanota2 =0;
    	}
    	if (nt2<14){
    		sumanota2 =0;
    	}

    }

    if (numeronotas=='3') {
    	sumanota = nt1 + nt2 + nt3;
    	sumanota2=sumanota;
      	if (nt1<14){
    		sumanota2 =0;
    	} 
    	if (nt2<14){
    		sumanota2 =0;
    	}
    	if (nt3<14){
    		sumanota2 =0;
    	}
    }

    if (numeronotas=='4') {
    	sumanota = nt1 + nt2 + nt3 + nt4;
    	sumanota2=sumanota;
    	if (nt1<14){
    		sumanota2 =0;
    	}
    	if (nt2<14){
    		sumanota2 =0;
    	}

    	if (nt3<14){
    		sumanota2 =0;
    	}

    	if (nt4<14){
    		sumanota2 =0;
    	}
    }

    promedio = parseInt(sumanota/numeronotas);
    document.getElementById('txtpromnot').value=promedio;





    if(promedio <= 13 ){
    	$('select#slcondicion').val('2');
    	$('#txtsmscond').text('Desaprobado');
    }

    if(promedio >= 14 && sumanota2 > 0){
    	$('select#slcondicion').val('1');
    	$('#txtsmscond').text('Aprobado');
    }

    if(promedio == ''){
    	$('select#slcondicion').val('0');
    	$('#txtsmscond').text('-------------');
    }
}

//slcertificado
$('#slcertificado').on('change', function(){
	var selectedOption = $(this).find('option:selected');
	var bgimg1 = selectedOption.data('bgimg1');
	var bgimg2 = selectedOption.data('bgimg2');
	$('#prvwcertbg').html('<a><img src="'+baseUrl+'uploads/bgcertificado/'+bgimg1+'" style="width: 100%; height: auto;"></a>');

	$('input[name=txtnombgcert]').val(bgimg1);
	$('input[name=img_bg_certificado_dos]').val(bgimg2);
	
	if(selectedOption.val() != '1'){
		$('#dvlogocliente').removeClass('hidden');
	}else{
		$('#dvlogocliente').addClass('hidden');
		$('input[name=logo_cliente]').val('no');
	}

});

//logo_cliente hidden dvempresa
$('input[name=logo_cliente]').on('change', function(){
	var val = $(this).val();
	if(val=='no'){
		$('#dvempresa').addClass('hidden');
	}else{
		$('#dvempresa').removeClass('hidden');
	}
});