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
	var id_curso = getUrlParameter('idcs');


	//Listar Alumnos por curso
	if(id_curso != ''){
		showDataCurso(id_curso);
        showAllAlumnoCurso(id_curso);
    }else{
    	swal("¡Ups!", "No encontramos la empresa.! Intente nuevamente.", "error");
    }

    $('.iptnotas').on('input', function () { 
    	this.value = this.value.replace(/[^0-9]/g,'');
	});


	$('[data-toggle="tooltip"]').tooltip();	

});





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

	function showDataCurso(idcurso){
		var idc=idcurso;
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: baseUrl + "GrupoEmpresaController/showDataCurso",
			data:{idcs:idc},
			async: false,
			dataType: 'json',
			success: function(data){
				$('#cnombrecurso').text(data.nombrecurso);
				$('#fcinicio').text(data.FechaInicio);

				$('input[name=texididcurso]').val(data.id_curso);
				$('input[name=txtdescipcioncurso]').val(data.descripcion);
				$('input[name=numnotasdelcurso]').val(data.numeronotas);
			},
			error:function(){
				swal("¡Ups!", "Algo salió mal!. Refresque la página.", "error");
			}
		});

	}



	//funcion show lista
	function showAllAlumnoCurso(idcurso){
	var idc=idcurso;
	$.ajax({
			type: 'ajax',
			method: 'get',
			url: baseUrl + "GrupoEmpresaController/showAlumnosPorCurso",
			data:{idcs:idc},
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
				var num=1;
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
						
						btnedtnota = ' <a href="javascript:;" type="button" rel="tooltip" title="Editar Nota" class="btn btn-success btnEditAlu" data="'+data[i].id_alumno_grupo+'"><i class="material-icons">border_color</i> Editar Nota</a>';

						if(data[i].condicion == '1' || gtnumeronotas == '0'){
							btngccert = '<a href="javascript:;" type="button" rel="tooltip" title="Generar Certificado" class="btn btn-primary btngnrarcert" data="'+data[i].id_alumno_grupo+'"><i class="material-icons">chrome_reader_mode</i> Generar</a>';
						}
						else if(data[i].condicion == '2'){
							btngccert = '';
						}else if(data[i].condicion =='0'){
							btngccert = '';
						}

					}

					if(data[i].cert_btn == '1'){
						btngccert = ' <a href="javascript:;" type="button" data-toggle="tooltip" rel="tooltip" data-original-title="Certificado" class="btn btn-info btnVCert" data="'+data[i].id_alumno_grupo+'"><i class="material-icons">chrome_reader_mode</i> Ver Certificado</a> <a href="javascript:;" type="button" data-toggle="tooltip" data-placement="top" class="btn btn-danger btnDlCert" data="'+data[i].id_alumno_grupo+'" data-original-title="Eliminar Certificado"><i class="material-icons">delete</i></a>';
						btnedtnota = ''; 
					}


					if (data[i].estado_alumno_grupo=='2'){
						btndeletealumno='';
					}


					html +='<tr>'+
								'<td>'+ num++ +'</td>'+
								'<td>'+data[i].numerodocumento+'</td>'+
								'<td>'+data[i].apellidos+'</td>'+
								'<td>'+data[i].nombres+'</td>'+
										ntdnots+
								'<td>'+data[i].promedio+'</td>'+
								'<td>'+condicionalm+'</td>'+
								'<td class="td-actions text-right">'+btngccert+''+btnedtnota+'</td>'+
							'</tr>';
							    //Boton Ver: <a href="javascript:;" type="button" rel="tooltip" title="Ver" class="btn btn-info"><i class="material-icons">visibility</i><div class="ripple-container"></div></a>
				}

				if (html==''){
					$('#showListaAlumnosForCurso').html('<tr><td colspan="8"><p class="text-center"><label>Aún no hay alumnos regitrados en el curso.</label></p><td><tr>');
				}else{
					$('#showListaAlumnosForCurso').html(html);
				}

			},
			error:function(){
				swal("¡Ups!", "Algo salió mal!. Refresque la página.", "error");
			}
		});
	}





	//Editar notas por curso
	$('#showListaAlumnosForCurso').on('click', '.btnEditAlu', function(){
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
			type: 'ajax',
			method: 'get',
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

	//Guarda o Actualiza notas
	$('#btnSaveNotas').click(function(){
		var url = $('#formrnotas').attr('action');
		//var data = $('#formrnotas').serialize();

		var formData = new FormData($('#formrnotas')[0]);

		var id_curso = $("#texididcurso").val();

			$.ajax({
				type:'ajax',
				method: 'post',
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
			showAllAlumnoCurso(id_curso);
	});




	//Ver Certificado
	$('#showListaAlumnosForCurso').on('click', '.btnVCert', function(){
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


	//Eliminar Certificado
	$('#showListaAlumnosForCurso').on('click', '.btnDlCert', function(){
		var idalgp = $(this).attr('data');
		var id_curso = $("#texididcurso").val(); //Data para enviar a la funcion
		
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
					type: 'ajax',
					method: 'get',
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



	//Bton generar certificado
	$('#showListaAlumnosForCurso').on('click', '.btngnrarcert', function(){

		$('#formgnrarcert').attr('action', baseUrl + "GrupoEmpresaController/saveCertif");


		$('#modalgnrarcert').modal({backdrop: 'static',});
		var idAlGrup = $(this).attr('data');

		$.ajax({
			type: 'ajax',
			method: 'get',
			url: baseUrl + "GrupoEmpresaController/getDataAlumForCert",
			data: {idag: idAlGrup},
			async: false,
			dataType: 'json',
			success: function(data){
				$('input[name=txtidalumnogrupo]').val(data.id_alumno_grupo);
				$('input[name=txtsericert]').val(data.fechaserie);

				//Ultimo Certificado del serie
				$.ajax({
					type: 'ajax',
					method: 'get',
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

		$.ajax({
			type: 'ajax',
			method: 'get',
			url: baseUrl + "GrupoEmpresaController/getBgCert",
			async: false,
			dataType: 'json',
			success: function(data){

				$('input[name=txtnombgcert]').val(data.bg_cerficado_imagen);
				$('#prvwcertbg').html('<a><img src="'+baseUrl+'uploads/bgcertificado/'+data.bg_cerficado_imagen+'" style="width: 100%;height: auto;" ></img></a>');
			
			},
			error: function(){
				 swal("¡Ups!", "Algo salió mal!. Intentelo nuevamente", "error");
			}
		});

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
					type: 'ajax',
					method: 'get',
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
							var id_curso = $("#texididcurso").val(); //Data para enviar a la funcion

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
										type:'ajax',
										method: 'post',
										url: url,
										data: data,
										async: false,
										dataType:'json',
										success: function(respuesta){
											$('#modalgnrarcert').modal('hide');
											$('#formgnrarcert')[0].reset();
											swal("¡Echo!", "El certificado fue generado!.", "success");
											showAllAlumnoCurso(id_curso);
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


	//Boton imprimir asistencia
	$('#showbtns').on('click', '.btnimplisasis', function(){
		$('#modalselecfecha').modal({backdrop: 'static',});
		var tiplist = $(this).attr('data');
		var idcurso = $("#texididcurso").val();

		var tiplist = $(this).attr('data');
		$('input[name=tipolist]').val(tiplist);

		$.ajax({
			type: 'ajax',
			method: 'get',
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

	//Option para seleccionar la fecha
	$('select#slchoraiocrs').on('change',function(){
		var id = $(this).val();
			$('input[name=texidfecha]').val(id);

	});

	//Boton imprimir
	$('#btnPrintAsis').click(function(){
		var getidcurso = $("#texididcurso").val();
		var getidfecha = $("#texidfecha").val();
		var tipolista = $("#tipolist").val();


		if(getidfecha!=''){

			if(tipolista=='ASI'){
				var url = baseUrl+'PdfsController/getListOfAsistForCurso?idc='+getidcurso+'?&idfhc='+getidfecha;
 				window.open(url, '_blank');	
			}
			if(tipolista=='PRA'){
				var url = baseUrl+'PdfsController/getListOfAsistForCursoRegistroPractica?idc='+getidcurso+'?&idfhc='+getidfecha;
 				window.open(url, '_blank');
			}
					


		}else{
			swal("Ups!", "Te olvidastes de seleccionar la fecha!", "error");
		}
	});


	//Lista de notas
	$('#showbtns').on('click', '.btnimpnotas', function(){
		var getidcurso = $("#texididcurso").val();
		if(getidcurso!=''){
					var url = baseUrl+'PdfsController/getListOfNotasForCurso?idc='+getidcurso;
 					window.open(url, '_blank');	
		}else{
			swal("Ups!", "Algo salió mal.! Refresque la página.", "error");
		}

	});




	//boton reset
	$("#btnReset").click(function(){
		$("#formrnotas")[0].reset();
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





