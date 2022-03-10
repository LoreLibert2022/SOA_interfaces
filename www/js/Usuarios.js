function buscar(pagina){ 
	var parametros='&controlador=Usuarios&metodo=buscar';
	parametros+='&'+$('#formularioBuscar').serialize();
	$.ajax({
		url:'C_Ajax.php',
		type:'post',
		data: parametros,
		success: function(vista){
			$('#capaResultadosBusqueda').html(vista);
			$('#capaResultadosBusqueda').show();
		}
	});
}

function editarNuevo(id_Usuario){
	
	var parametros='&controlador=Usuarios&metodo=editarNuevo';
	parametros+='&id_Usuario='+id_Usuario;
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
		var parametros='&controlador=Usuarios';
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
	if($('#id_Usuario').val()==''){ //nuevo 
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

function cambiarEstado(id_Usuario){
	var parametros='&controlador=Usuarios';
		parametros+='&metodo=cambiarEstadoUsuario';
		parametros+='&id_Usuario='+id_Usuario;
		$.ajax({
			url:'C_Ajax.php',
			type:'post',
			data: parametros,
			success: function(nuevoEstado){
				if(nuevoEstado=='S'){
					$('.activo_'+id_Usuario).show();
					$('.inactivo_'+id_Usuario).hide();
					$('.inactivo_'+id_Usuario).hide();
					$('#tr_'+id_Usuario+' td').css('color', 'black');
				}else{
					$('.activo_'+id_Usuario).hide();
					$('.inactivo_'+id_Usuario).show();
					$('#tr_'+id_Usuario+' td').css('color', 'red');
				}
			}
		})
}

function borrar(id_Usuario){
	$dialogoBorrar=$('<div></div>')
		.html('Desea borrar a:<br><b>'+$('#tdNombre_'+id_Usuario).html()+'</b>')	
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
					var parametros='&controlador=Usuarios';
					parametros+='&metodo=eliminarUsuario';
					parametros+='&id_Usuario='+id_Usuario;
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
	var parametros='controlador=Usuarios&metodo=listadoWord&';
	parametros+=$('#formularioBuscar').serialize();
	window.open('listar.php?'+parametros, '_blank');
}
function listadoWordAvanzado(){
	var parametros='controlador=Usuarios&metodo=listadoWordAvanzado&';
	parametros+=$('#formularioBuscar').serialize();
	window.open('listar.php?'+parametros, '_blank');
}

function listadoExcel(){
	var parametros='controlador=Usuarios&metodo=listadoExcel&';
	parametros+=$('#formularioBuscar').serialize();
	window.open('listar.php?'+parametros, '_blank');
}

function listadoSpreadsheet(){
    $('#formularioBuscar').attr('action', 'listados/Usuarios/L_Usuarios_Spreadsheet.php');
    $('#formularioBuscar').attr('target', 'popup');
    $('#formularioBuscar').submit();
    $('#formularioBuscar').attr('action', '#');
}

function cambiarTodos() {
    $('.checks').prop('checked', $('#setAll').is(':checked'));
}