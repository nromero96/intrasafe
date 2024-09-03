$( document ).ready(function() {
    
});

$('#btnBuscar').click(function(){
  	var numdni = $('#txtdni').val();
  	viewDataAlumno(numdni);
  	
});

$('#btnNuevaconsulta').click(function(){
  	location.reload();
});

$('#txtdni').keypress(function(event) {
    if (event.keyCode == 13) {
        var numdni = $('#txtdni').val();
  		viewDataAlumno(numdni);
    }
});




function viewDataAlumno(numdni){
	var numdni = $('#txtdni').val();
  	$.ajax({
		type:'get',
		url: baseUrl + 'VerificarProfesionalController/getDataAlumno',
		data:{docalumno:numdni},
		async: false,
		dataType: 'json',
		success: function(data){
			if (data==false){
				//Alerta
				swal("¡Alerta!", "No hay profesionales con el DNI ingresado", "info");
				//Class Hidden Add
				$('#dvdatosalumno').addClass('hidden');
				$('#dvlistacertificado').addClass('hidden');

				$('#spdni').text('...');
				$('#spnombresyapellidos').text('...');
			}else{
				//Show Data Alumno
				$('#fotoperfil').attr('src',baseUrl+'uploads/fotos/'+data.fotoperfil);
				$('#spdni').text(data.numerodocumento);
				$('#spnombresyapellidos').text(data.nombres+' '+data.apellidos);

				//Show Certificado Alumno
				showListCertForAlumno(numdni);
				showListCertForAlumnoInternacional(numdni);
				
				//Class Hidden Remove
				$('#dvdatosalumno').removeClass('hidden');
				$('#dvlistacertificado').removeClass('hidden');
				$('#dvlistacertificadointernacional').removeClass('hidden');
				$('#bxbuscador').addClass('hidden');
				
				
			}
		},

		error:function(){
				swal("¡Ups!", "Algo salió mal!. Intentelo nuevamente", "error");
		}
	});
}

function showListCertForAlumno(numdni){
	$.ajax({
		type: 'ajax',
		method: 'get',
		url: baseUrl + "VerificarProfesionalController/showListCertForAlumno",
		data:{docalumno:numdni},
		async: false,
		dataType: 'json',
		success: function(data){
			var html = '';
			var i;
			
			for (i=0; i<data.length; i++){
			    if(data[i].vigencia_curso != '0'){
		                vigcert = data[i].fecha_vigenica;
		            }else{
		                vigcert = '-';
		        }
		    
				html +='<tr>'+
					'<td class="txtcolorcert">'+data[i].nombrecurso+'</td>'+
					'<td class="txtcolorcert">'+data[i].horas+' Horas</td>'+
					'<td class="txtcolorcert">'+data[i].certifica+'</td>'+
					'<td class="txtcolorcert">'+data[i].serie+''+data[i].correlativo+'</td>'+
					// '<td>'+'<a class="txtcolorcert btnVCert" href="javascript:;" type="button" title="Ver Certificado" data1="'+data[i].id_alumno_grupo+'" data2="'+data[i].id_curso+'" data3="'+data[i].descripcion+'">Ver certificado</a>'+'</td>'+
					'<td class="txtcolorcert">'+data[i].fechainiciocertificado+'</td>'+	
					'<td class="txtcolorcert">'+vigcert+'</td>'+							
					'</tr>';
				}
				if(html==''){
					$('#liscertalumno').html('<tr><td><label>El Profesional no tiene certificado.</label></td></tr>');
				}else{
					$('#liscertalumno').html(html);
				}
				
			},
			error:function(){
				swal("¡Ups!", "Algo salió mal!. Refresca la página", "error");
			}
		});
}

function showListCertForAlumnoInternacional(numdni){
	$.ajax({
		type: 'ajax',
		method: 'get',
		url: baseUrl + "VerificarProfesionalController/showListCertForAlumnoInternacional",
		data:{docalumno:numdni},
		async: false,
		dataType: 'json',
		success: function(data){
			var html = '';
			var i;
			
			for (i=0; i<data.length; i++){
				html +='<tr>'+
					'<td class="txtcolorcert">'+data[i].curso+'</td>'+
					'<td class="txtcolorcert">'+data[i].codigo+' Horas</td>'+
					'<td class="txtcolorcert">'+data[i].expira+'</td>'+							
					'</tr>';
				}
				if(html==''){
					$('#liscertalumnointenacional').html('<tr><td><label>El Profesional no tiene certificado internacional.</label></td></tr>');
				}else{
					$('#liscertalumnointenacional').html(html);
				}
				
			},
			error:function(){
				swal("¡Ups!", "Algo salió mal!. Refresca la página", "error");
			}
		});
}



$('#liscertalumno').on('click', '.btnVCert', function(){
		var getidalg = $(this).attr('data1');
		var getidcs = $(this).attr('data2');
		var getdescs = $(this).attr('data3');
		
		var url = baseUrl+'PdfsController/viewcertificado?idalg='+getidalg+'&idcs='+getidcs+'&safesi%20training';
		window.open(url, '_blank');

 		/* if (getdescs==''){
 			var url = baseUrl+'PdfsController/getCertAlumno?safesi%20training&num%20&idalg='+getidalg+'&0i8i30k1.0.MHD-PXKqd_8&q=certificado&oq=certificado&idcs='+getidcs+'&psy-ab.3..35i39k1j0&certif='+getidalg+'0i6';
			window.open(url, '_blank');
 		}else{
 			var url = baseUrl+'PdfsController/getCertDescripAlumno?safesi%20training&num%20&idalg='+getidalg+'&0i8i30k1.0.MHD-PXKqd_8&q=certificado&oq=certificado&idcs='+getidcs+'&psy-ab.3..35i39k1j0&certif='+getidalg+'0i6';
			window.open(url, '_blank');
 		} */
});





