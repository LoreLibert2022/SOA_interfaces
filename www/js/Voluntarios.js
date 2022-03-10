function buscar(pagina){ 
	var parametros='&controlador=Voluntarios&metodo=buscar';
	parametros+='&'+$('#formularioBuscar').serialize();
	$.ajax({
		url:'C_Ajax.php',
		type:'post',
		data: parametros,
		success: function(vista){
			$('#capaResultadosBusqueda').html(vista);
			$('#capaEdicionDocumentacion').hide();
			$('#capaResultadosBusqueda').show();
		}
	});
}

function editarNuevo(id_Voluntario){
	
	var parametros='&controlador=Voluntarios&metodo=editarNuevo';
	parametros+='&id_Voluntario='+id_Voluntario;
	$.ajax({
		url:'C_Ajax.php',
		type:'post',
		data: parametros,
		success: function(vista){
			$('#capaResultadosBusqueda').hide();
			$('#capaEdicionNuevo').html(vista);
		}
	})
}

function guardar(){
	resultadoValidar=verificarFormularioEdicionNuevo();
	if(resultadoValidar!=''){ //error
		$('#mensaje').html(resultadoValidar);
	}else{ //correcto
		var parametros='&controlador=Voluntarios';
		parametros+='&metodo=guardar';
		parametros+='&'+$('#formularioEdicion').serialize();
		$.ajax({
			url:'C_Ajax.php',
			type:'post',
			data: parametros,
			dataType:'json',
			success: function(respuesta){
				if(respuesta.correcto=='S'){
					alert('Guardado correctamente.');
					$('#capaEdicionNuevo').html('');
					$('#capaResultadosBusqueda').show();
				}else{
					$('#mensaje').html(respuesta.mensaje);
					$.each(respuesta.camposErroneos, function(campo,texto){
						$('#'+campo).addClass('inputRed');
						$('#msj'+campo).html(texto);
					});
				}
			}
		})
	}
}

function noGuardar(){
	$('#capaEdicionNuevo').html('');
	$('#capaResultadosBusqueda').show();
}

function verificarFormularioEdicionNuevo(){
	var resultado='';
	$('.inputRed').removeClass('inputRed');
	$('.msj').html('');
	
	if( $('#nombre').val()=='') {
		$('#nombre').addClass('inputRed');
	};
	if( $('#apellido_1').val()=='') {
		$('#apellido_1').addClass('inputRed');
	};
	if( $('#sexo').val()=='') {
		$('#sexo').addClass('inputRed');
	};
	if( $('#mail').val()=='') {
		$('#mail').addClass('inputRed');
	};
	if( $('#login').val()=='') {
		$('#login').addClass('inputRed');
	};
	if( $('#fecha_Alta').val()=='') {
		$('#fecha_Alta').addClass('inputRed');
	};
	if($('#id_Voluntario').val()==''){ //nuevo 
		if( $('#pass').val()=='' || $('#repass').val()=='' || $('#pass').val()!=$('#repass').val()) {
			//deben completarse y ser iguales
			$('#pass').addClass('inputRed');
			$('#repass').addClass('inputRed');
			$('#msjPass').html('NO coinciden');
		}
	}else{//edicion
		if( $('#pass').val()!='' || $('#repass').val()!='' ){
			if( ($('#pass').val()!='' || $('#repass').val()!='') && $('#pass').val()!=$('#repass').val()) {
				//si se completa alguno, deben ser iguales: se está cambiando la pass
				$('#pass').addClass('inputRed');
				$('#repass').addClass('inputRed');
				$('#msjPass').html('NO coinciden');
			}
		}
	}
	if( $('.inputRed').length>0){
		resultado='Revisar los campos en rojo.';
	}
	return resultado;
}

function cambiarEstado(id_Voluntario){
	var parametros='&controlador=Voluntarios';
		parametros+='&metodo=cambiarEstadoVoluntario';
		parametros+='&id_Voluntario='+id_Voluntario;
		$.ajax({
			url:'C_Ajax.php',
			type:'post',
			data: parametros,
			success: function(nuevoEstado){
				if(nuevoEstado=='S'){
					$('.activo_'+id_Voluntario).show();
					$('.inactivo_'+id_Voluntario).hide();
					$('.inactivo_'+id_Voluntario).hide();
					$('#tr_'+id_Voluntario+' td').css('color', 'black');
				}else{
					$('.activo_'+id_Voluntario).hide();
					$('.inactivo_'+id_Voluntario).show();
					$('#tr_'+id_Voluntario+' td').css('color', 'red');
				}
			}
		})
}

function borrar(id_Voluntario){
	$dialogoBorrar=$('<div></div>')
		.html('Desea borrar a:<br><b>'+$('#tdNombre_'+id_Voluntario).html()+'</b>')	
		.dialog({
			resizable: false,
			height:250,
			width:500,
			title:'Confirmar borrado...',
			modal: true,
			close: function(){
				$(this).remove();
			},
			buttons: {
				"SI": function() {
					var parametros='&controlador=Voluntarios';
					parametros+='&metodo=eliminarVoluntario';
					parametros+='&id_Voluntario='+id_Voluntario;
					$.ajax({
						url:'C_Ajax.php',
						type:'post',
						data: parametros,
						async: false,
						success: function(borrado){
							if(borrado=='S'){
								buscar(1);
							}
							$dialogoBorrar.dialog( "close" );
						}
					})
				},
				"NO": function() {
					//$( this ).dialog( "close" );
					$( this ).dialog( "destroy" );
				}
			}
	});
}

function listadoWord(){
	var parametros='controlador=Voluntarios&metodo=listadoWord&';
	parametros+=$('#formularioBuscar').serialize();
	window.open('listar.php?'+parametros, '_blank');
}
function listadoWordAvanzado(){
	var parametros='controlador=Voluntarios&metodo=listadoWordAvanzado&';
	parametros+=$('#formularioBuscar').serialize();
	window.open('listar.php?'+parametros, '_blank');
}

function listadoExcel(){
	var parametros='controlador=Voluntarios&metodo=listadoExcel&';
	parametros+=$('#formularioBuscar').serialize();
	window.open('listar.php?'+parametros, '_blank');
}

function listadoSpreadsheet(){
    $('#formularioBuscar').attr('action', 'listados/Voluntarios/L_Voluntarios_Spreadsheet.php');
    $('#formularioBuscar').attr('target', 'popup');
    $('#formularioBuscar').submit();
    $('#formularioBuscar').attr('action', '#');
}

function cambiarTodos() {
    $('.checks').prop('checked', $('#setAll').is(':checked'));
}

function listarDocumentacion(id_voluntario){
	var parametros='&controlador=Voluntarios&metodo=listarDocumentacion';
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
	var parametros='&controlador=Voluntarios&metodo=agregarDocumentacion';
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
	var parametros='&controlador=Voluntarios&metodo=borrarDocumento';
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