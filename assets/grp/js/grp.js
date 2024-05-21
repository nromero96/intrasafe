
$(function(){
	//Seleccionar Empresa ===============
	$('select#idslempresa').on('change',function(){
		var getid = $(this).val();
		var tipocl = 'EM';
		var url = baseUrl+'grp_em/grupos?client&idcl='+getid+'&%20safesi&tipcl='+tipocl;
 		window.open(url, '_self');	
	});

	//Persona Natural ===================
	$('select#idslpersnatural').on('change',function(){
		var getid = $(this).val();
		var tipocl = 'PN';
		var url = baseUrl+'grp_pn/grupos?client&idcl='+getid+'&%20safesi&tipcl='+tipocl;
 		window.open(url, '_self');	
	});

});

