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
	showAllGrupoForEmpresa();

	//Boton ver detalle
	$('#showgrupos').on('click', '.btnVDetalle', function(){
		var id_g = $(this).attr('data');
		$('#dvnvgrupo').addClass('hidden');
		$('#dvdetallgrupo').removeClass('hidden');

		$('#formconflistalum').attr('action', baseUrl + 'emp/GrupoController/confirmarAlumnos');

		$.ajax({
			type: 'ajax',
			method: 'get',
			url: baseUrl + "emp/GrupoController/verGrupoDetalle",
			data: {id: id_g},
			async: false,
			dataType: 'json',
			success: function(data){
				$('#lblnombredelcurso').text('Curso: '+data.nombrecurso);
				$('#txtnombredelcurso').text(data.nombrecurso);
				$('input[name=txidcurso]').val(data.id_curso);
				$('#lblcuposreservados').text(data.ncupos);
				$('input[name=txtcuposreservados]').val(data.ncupos);
				$('input[name=texidcurso]').val(data.id_curso);
				$('#gnombredelgrupo').text(data.nombregrupo);
				$('input[name=estadogrupo]').val(data.estado_grupo);
				$('input[name=texidgrupo]').val(data.id_grupo);
				$('input[name=numnotasdelcurso]').val(data.numeronotas);
				$('input[name=txtidcurs]').val(data.id_curso);
				$('input[name=txtdescipcioncurso]').val(data.descripcion);
				$('input[name=txtidgrup]').val(data.id_grupo);

			},
			error: function(){
				 swal("¡Ups!", "¡Algo salió mal!. Refresque la página", "error");
			}
		});
		showAllAlumnoGrupo(id_g);
		countAlumnoPorGrupo(id_g);
	});


	function showAllGrupoForEmpresa(){
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: baseUrl + "emp/GrupoController/showAllGrupoForEmpresa",
			async: false,
			dataType: 'json',
			success: function(data){
				var html = '';
				var i;
				for (i=0; i<data.length; i++){
					html +='<div class="col-md-3">'+
								'<div class="card card-pricing card-raised">'+
									'<div class="content text-center">'+
										'<div class="card-header" data-background-color="blue">'+
											'<marquee direction="left"><span>'+data[i].nombregrupo+'</span></marquee>'+
										'</div>'+
										'<p>'+'<img style="max-width: 80px;" src="'+baseUrl + 'assets/img/folder.png'+'">'+'</p>'+
										'<span>'+data[i].FechaInicio+'</span>'+'<br>'+
										'<a class="btn btn-info btn-round btnVDetalle" href="javascript:;" data1="'+data[i].id_curso+'" data="'+data[i].id_grupo+'"><i class="material-icons">supervisor_account</i> Participantes</a>'+
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
				swal("¡Ups!", "¡Algo salió mal!. Refresque la página", "error");
			}
		});
	}

	//boton reset
	$("#btnReset").click(function(){
	$("#formGrupo")[0].reset();
	});


	//Detalle de Grupos...................................................................................................

	//Boton Add Alumno al grupo
	$('#btnAddAlumnoGrupo').click(function(){
		$('.dvlfloat').addClass('label-floating');
		$('.dvlfloat').removeClass('form-group-no');
		$('#modaladdalumnoagrupo').modal('show');
		$('#modaladdalumnoagrupo').find('.tit-modal').text('Agregar Alumno al Grupo');
		$('#formAddAlumnoGrupo').attr('action', baseUrl + 'emp/GrupoController/saveAlumnoAGrupo');
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

				$('#txtididalumno').val(valueidalumno).trigger('change');
				$('#idtxttipodocumento').val(valuetipodocumento).trigger('change');
				$('#idtxtapellidos').val(valueapellidos).trigger('change');
				$('#idtxtnombres').val(valuenombres).trigger('change');
				$('#idtxtfnacimiento').val(valuefnacimiento).trigger('change');
				$('#idtxttelefono').val(valuetelefono).trigger('change');
				$('#idtxtemail').val(valueemail).trigger('change');
			},

			onKeyEnterEvent: function(){
				var valueidalumno = $('#idtxtnumerodocumento').getSelectedItemData().id_alumno;
				var valuetipodocumento = $('#idtxtnumerodocumento').getSelectedItemData().tipodocumento;
				var valueapellidos = $('#idtxtnumerodocumento').getSelectedItemData().apellidos;
				var valuenombres = $('#idtxtnumerodocumento').getSelectedItemData().nombres;
				var valuefnacimiento = $('#idtxtnumerodocumento').getSelectedItemData().fnacimiento;
				var valuetelefono = $('#idtxtnumerodocumento').getSelectedItemData().telefono;
				var valueemail = $('#idtxtnumerodocumento').getSelectedItemData().email;

				$('#txtididalumno').val(valueidalumno).trigger('change');
				$('#idtxttipodocumento').val(valuetipodocumento).trigger('change');
				$('#idtxtapellidos').val(valueapellidos).trigger('change');
				$('#idtxtnombres').val(valuenombres).trigger('change');
				$('#idtxtfnacimiento').val(valuefnacimiento).trigger('change');
				$('#idtxttelefono').val(valuetelefono).trigger('change');
				$('#idtxtemail').val(valueemail).trigger('change');
			}
		}
	};
	$('#idtxtnumerodocumento').easyAutocomplete(options);


	//Boton Save Alumno a Grupo
	$('#btnSaveAlumnoGrupo').click(function(){
		var id_grupo = $("#texididgrupo").val();
		var id_alumno = $("#txtididalumno").val();
		$.ajax({
			type: 'ajax',
			method: 'get',
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
					var data = $('#formAddAlumnoGrupo').serialize();

					//validar
					var numdnialum = $('input[name=txtnumerodocumento]');
					var apellidosalumn = $('input[name=txtapellidos]');
					var nombresalumn = $('input[name=txtnombres]');

					var idcurso = $('input[name=texidcurso]');
					var cargo = $('input[name=txtcargo]');
					var idgrupo = $('input[name=texidgrupo]');  

					var id_grupo = $("#texididgrupo").val(); //Data para enviar a la funcion

					var resultad = '';


					if(numdnialum.val()==''){
						$('#dvnumdnialumn').addClass('has-error');
					}else{
						$('#dvnumdnialumn').removeClass('has-error');
						resultad +='1';
					}

					if(apellidosalumn.val()==''){
						$('#dvapelidosalumn').addClass('has-error');
					}else{
						$('#dvapelidosalumn').removeClass('has-error');
						resultad +='2';
					}

					if(nombresalumn.val()==''){
						$('#dvnomalumn').addClass('has-error');
					}else{
						$('#dvnomalumn').removeClass('has-error');
						resultad +='3';
					}

					if(idcurso.val()==''){
						$('#didcurso').addClass('has-error');
					}else{
						$('#didcurso').removeClass('has-error');
						resultad +='4';
					}

					if(cargo.val()==''){
						resultad +='5';
					}else{
						resultad +='5';
					}

					if(idgrupo.val()==''){
						$('#didgrupo').addClass('has-error');
					}else{
						$('#didgrupo').removeClass('has-error');
						resultad +='6';
					}

					if(resultad=='123456'){
						$.ajax({
							type:'ajax',
							method: 'post',
							url: url,
							data: data,
							async: false,
							dataType:'json',
							success: function(respuesta){
								showAllAlumnoGrupo(id_grupo);
					    		countAlumnoPorGrupo(id_grupo);
								$('#modaladdalumnoagrupo').modal('hide');
								$('#formAddAlumnoGrupo')[0].reset();
								dnotificacion.showNotification('top','right');
							},
							error: function(){
								swal("¡Ups!", "¡Algo salió mal!. Intentelo nuevamente", "error");
							}
						});
					}
				}
			},
			error: function(){
				 swal("¡Ups!", "Algo salió mal!. Intentelo nuevamente", "error");
			}
		});


	});

   //Confirmar lista de alumnos
   	$('#btnConfirmAlumnos').click(function(){

   		var url = $('#formconflistalum').attr('action');
		var data = $('#formconflistalum').serialize();


		var gdatagrupo = $('input[name=txtidgrup]');
		var gidcurso = $('input[name=txtidcurs]');
		var resultad='';

		if(gdatagrupo.val()==''){
			swal("¡Ups!", "¡Algo salió mal!. Refresque la página", "error");
		}else{
			resultad +='1';
		}

		if(gidcurso.val()==''){
			swal("¡Ups!", "¡Algo salió mal!. Refresque la página", "error");
		}else{
			resultad +='2';
		}

		var getidgrup = $("#txtidgrup").val();

		if(resultad=='12'){
				$.ajax({
				type:'ajax',
				method: 'post',
				url: url,
				data: data,
				async: false,
				dataType:'json',
				success: function(respuesta){
						if(respuesta.type=='add'){
							var type='Agregado'
						}else if(respuesta.type=='update'){
                             var type='Actualizado'
						}
						showAllAlumnoGrupo(getidgrup);
						dnotificacion.showNotification('top','right');
				},
				error: function(){
					swal("¡Ups!", "¡Algo salió mal!. Refresque la página", "error");
				}
			});
		}
	});


	//funcion show lista
	function showAllAlumnoGrupo(getidgrupo){
	var tipouser = $('#txttipuser').val();
	var idg=getidgrupo;
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: baseUrl + "emp/GrupoController/showAlumnoIEnGrupo",
			data:{id:idg},
			async: false,
			dataType: 'json',
			success: function(data){

				var gtnumeronotas= $("#numnotasdelcurso").val();

				if(gtnumeronotas=='0'){
					
				}
				
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
				var i;
				var btns;
				var btns1;
				var btns1;
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

					if(data[i].estado_alumno_grupo=='1'){
						if (data[i].cert_btn=='1'){
							btns1='';
							btns2='';
						}else{

							btns1=' <a href="javascript:;" type="button" rel="tooltip" title="Editar" class="btn btn-success btnEditAlu" data="'+data[i].id_alumno_grupo+'"><i class="material-icons">border_color</i> Editar</a>'
							
							if (tipouser=='PN'){
								btns2='';
							}else{
								btns2=' <a href="javascript:;" type="button" rel="tooltip" title="Quitar" class="btn btn-danger btnDeletAl" data="'+data[i].id_alumno_grupo+'"><i class="material-icons">close</i></a>';
							}
						}

					}
					
					if(data[i].estado_alumno_grupo=='2'){
						btns1='';
						btns2='';
					}

					if(data[i].cert_btn == '0'){
						btns3 = '';
					}

					if(data[i].cert_btn == '1'){
						btns3 = '<a href="javascript:;" type="button" rel="tooltip" title="Certificado" class="btn btn-info btnVCert" data="'+data[i].id_alumno_grupo+'"><i class="material-icons">chrome_reader_mode</i> Ver Certificado</a>';
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

					html +='<tr>'+
								'<td>'+'#'+'</td>'+
								'<td>'+data[i].numerodocumento+'</td>'+
								'<td>'+data[i].apellidos+'</td>'+
								'<td>'+data[i].nombres+'</td>'+
										ntdnots+
								'<td>'+data[i].promedio+'</td>'+
								'<td>'+condicionalm+'</td>'+
								'<td class="td-actions text-right">'+btns3+btns1+btns2+'</td>'+
							'</tr>';
							    
				}
				$('#showListaAlumnosForGrupo').html(html);
			},
			error:function(){
				swal("¡Ups!", "¡Algo salió mal!. Refresque la página", "error");
			}
		});
	}

	//funcion show lista
	function countAlumnoPorGrupo(getidgrupo){
	var idg=getidgrupo;
		$.ajax({
			type: 'ajax',
			method: 'get',
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
					$('#dvbtnprinotas').addClass('hidden');
					$('#btnAddAlumnoGrupo').attr('disabled',false);
				}else if(estadgrup==1){
					$('#btnAddAlumnoGrupo').addClass('hidden');
					$('#dvbtnprinotas').removeClass('hidden');
					$('#btnAddAlumnoGrupo').attr('disabled',true);
				}

				var cuposreservados = $("#txtcuposreservados").val();
				if(data >= cuposreservados){
					$('#btnAddAlumnoGrupo').attr('disabled',true);
					$('#btnConfirmAlumnos').attr('disabled',false);
				}else{
					$('#btnAddAlumnoGrupo').attr('disabled',false);
					$('#btnConfirmAlumnos').attr('disabled',true);
				}

				if(estadgrup==0 && data >= 1){
					$('#dvbtnconfirmar').removeClass('hidden');
				}else{
					$('#dvbtnconfirmar').addClass('hidden');
				}

			},
			error:function(){
				swal("¡Ups!", "¡Algo salió mal!. Refresque la página", "error");
			}
		});
	}

	//Editar Alumno
	$('#showListaAlumnosForGrupo').on('click', '.btnEditAlu', function(){
		var id = $(this).attr('data');
		$('#modaladdalumnoagrupo').modal('show');
		$('.dvlfloat').removeClass('label-floating');
		$('.dvlfloat').addClass('form-group-no');
		$('#modaladdalumnoagrupo').find('.tit-modal').text('Actualizar Alumno');
		$('#formAddAlumnoGrupo').attr('action', baseUrl + "emp/GrupoController/updateAlumno");
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: baseUrl + "emp/GrupoController/editAlumno",
			data: {id: id},
			async: false,
			dataType: 'json',
			success: function(data){
				$('select[name=txttipodocumento]').val(data.tipodocumento);
				$('input[name=txtnumerodocumento]').val(data.numerodocumento);
				$('input[name=txtapellidos]').val(data.apellidos);
				$('input[name=txtnombres]').val(data.nombres);
				$('input[name=txtfnacimiento]').val(data.fnacimiento);
				$('input[name=txttelefono]').val(data.telefono);
				$('input[name=txtemail]').val(data.email);
				$('input[name=txtidalumno]').val(data.id_alumno);

			},
			error: function(){
				 alert('Error al Editar');
			}
		});
	});


	//Boton ver Certificado
	$('#showListaAlumnosForGrupo').on('click', '.btnVCert', function(){
		var getidal = $(this).attr('data');
		var getidcs = $("#texididcurso").val();
 		var getdescurso = $("#txtdescipcioncurso").val();
 		
 		var url = baseUrl+'PdfsController/viewcertificado?idalg='+getidal+'&idcs='+getidcs+'&safesi%20training';
		window.open(url, '_blank');

 		/*if (getdescurso==''){
 			var url = baseUrl+'PdfsController/getCertAlumno?safesi%20training&num%20&idalg='+getidal+'&0i8i30k1.0.MHD-PXKqd_8&q=certificado&oq=certificado&idcs='+getidcs+'&psy-ab.3..35i39k1j0&certif='+getidal+'0i6';
			window.open(url, '_blank');
 		}else{
 			var url = baseUrl+'PdfsController/getCertDescripAlumno?safesi%20training&num%20&idalg='+getidal+'&0i8i30k1.0.MHD-PXKqd_8&q=certificado&oq=certificado&idcs='+getidcs+'&psy-ab.3..35i39k1j0&certif='+getidal+'0i6';
			window.open(url, '_blank');
 		} */
 		
	});


	//Lista de notas EM
	$('#dvbtnprinotas').on('click', '.btnimpnotas', function(){
		var getidgrup = $("#texididgrupo").val();
		if(getidgrup!=''){
					var url = baseUrl+'PdfsController/getListOfNotasForEmp?idg='+getidgrup;
 					window.open(url, '_blank');	
		}else{
			swal("Ups!", "Algo salió mal.! Refresque la página.", "error");
		}

	});

	//Lista de notas PN
	$('#dvbtnprinotaspn').on('click', '.btnimpnotas', function(){
		var getidgrup = $("#texididgrupo").val();
		if(getidgrup!=''){
					var url = baseUrl+'PdfsController/getListOfNotasForEmp?idg='+getidgrup;
 					window.open(url, '_blank');	
		}else{
			swal("Ups!", "Algo salió mal.! Refresque la página.", "error");
		}

	});



   //Eliminar Alumno del grupo y curso
	$('#showListaAlumnosForGrupo').on('click', '.btnDeletAl', function (){
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
					type: 'ajax',
					method: 'get',
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



    //Reset Buton
	$("#btnReset1").click(function(){
		$("#formAddAlumnoGrupo")[0].reset();
	});


	//DataPicker
	$(document).ready(function() {
        $('#idtxtfnacimiento').datepicker({
        	format: 'dd/mm/yyyy',
        	//startDate: '-0d',
        });
    });


	//Pago..............................................................................................................

	//Boton Pagar
	$('#btnPagar').click(function(){
		$('#modalpagogrupo').modal('show');
		$('#modalpagogrupo').find('.tit-modal').text('Pago');
		$('#formPagoDeGrupo').attr('action', baseUrl + 'emp/GrupoController/savePagoGrupo');
	});






});