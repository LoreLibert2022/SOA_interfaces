function buscar(pagina){ 
	var parametros='&controlador=Actividades&metodo=buscar';
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

function editarNueva(id_Actividad){
	
	var parametros='&controlador=Actividades&metodo=editarNueva';
	parametros+='&id_Actividad='+id_Actividad;
	$.ajax({
		url:'C_Ajax.php',
		type:'post',
		data: parametros,
		success: function(vista){
			$('#capaResultadosBusqueda').hide();
			$('#capaEdicionNueva').html(vista);
		}
	})
}

function guardar(){
	resultadoValidar=verificarFormularioEdicionNueva();
	if(resultadoValidar!=''){ //error
		$('#mensaje').html(resultadoValidar);
	}else{ //correcto
		var parametros='&controlador=Actividades';
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
					$('#capaEdicionNueva').html('');
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
	$('#capaEdicionNueva').html('');
	$('#capaResultadosBusqueda').show();
}

function verificarFormularioEdicionNueva(){
	var resultado='';
	$('.inputRed').removeClass('inputRed');
	$('.msj').html('');
	
	if( $('#nombre_organizador').val()=='') {
		$('#nombre_organizador').addClass('inputRed');
	};
	if( $('#tipo_actividad').val()=='') {
		$('#tipo_actividad').addClass('inputRed');
	};
	if( $('#fecha').val()=='') {
		$('#fecha').addClass('inputRed');
	};
	if( $('#lugar').val()=='') {
		$('#lugar').addClass('inputRed');
	};
    if( $('#duracion').val()=='') {
		$('#duracion').addClass('inputRed');
	};
    if( $('#descripcion').val()=='') {
		$('#descripcion').addClass('inputRed');
	};
    if( $('#nombre_organizador').val()=='') {
		$('#nombre_organizador').addClass('inputRed');
	};
    if( $('#homologado').val()=='') {
		$('#homologado').addClass('inputRed');
	};
	if( $('.inputRed').length>0){
		resultado='Revisar los campos en rojo.';
	}
	return resultado;
}

function cambiarEstado(id_Actividad){
	var parametros='&controlador=Actividades';
		parametros+='&metodo=cambiarEstadoActividad';
		parametros+='&id_Actividad='+id_Actividad;
		$.ajax({
			url:'C_Ajax.php',
			type:'post',
			data: parametros,
			success: function(nuevoEstado){
				if(nuevoEstado=='S'){
					$('.activo_'+id_Actividad).show();
					$('.inactivo_'+id_Actividad).hide();
					$('.inactivo_'+id_Actividad).hide();
					$('#tr_'+id_Actividad+' td').css('color', 'black');
				}else{
					$('.activo_'+id_Actividad).hide();
					$('.inactivo_'+id_Actividad).show();
					$('#tr_'+id_Actividad+' td').css('color', 'red');
				}
			}
		})
}

function borrar(id_Actividad){
	$dialogoBorrar=$('<div></div>')
		.html('Desea borrar a:<br><b>'+$(id_Actividad).html()+'</b>')	
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
					var parametros='&controlador=Actividades';
					parametros+='&metodo=eliminarActividad';
					parametros+='&id_Actividad='+id_Actividad;
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

function cambiarTodos() {
    $('.checks').prop('checked', $('#setAll').is(':checked'));
}
