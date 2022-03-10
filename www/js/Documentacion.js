function listarDocumentacion(id_voluntario){
	var parametros='&controlador=Documentacion&metodo=listarDocumentacion';
	parametros+='&id_voluntario='+id_voluntario;
	$.ajax({
		url:'C_Ajax.php',
		type:'post',
		data: parametros,
		success: function(vista){
			$('#capaResultadosBusqueda').hide();
			$('#capaEdicionDocumentacion').html(vista);
			$('#capaEdicionDocumentacion').show();
		}
	})
}

function agregarDocumentacion(id_voluntario, descripcion){
	var parametros='&controlador=Documentacion&metodo=agregarDocumentacion';
	parametros+='&id_voluntario='+id_voluntario;
	parametros+='&f_descripcion='+descripcion;
	$.ajax({
		url:'C_Ajax.php',
		type:'post',
		data: parametros,
		success: function(vista){
			$('#capaEdicionDocumentacion').html(vista);
			$('#capaEdicionDocumentacion').show();
		}
	})
}

function borrarDocumento(id_voluntario, id_documentacion){
	var parametros='&controlador=Documentacion&metodo=borrarDocumento';
	parametros+='&id_voluntario='+id_voluntario;
	parametros+='&id_documentacion='+id_documentacion;
	$.ajax({
		url:'C_Ajax.php',
		type:'post',
		data: parametros,
		success: function(vista){
			$('#capaEdicionDocumentacion').html(vista);
			$('#capaEdicionDocumentacion').show();
		}
	})
}