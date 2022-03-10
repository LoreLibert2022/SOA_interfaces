$(document).ready(function(){
	cargarSelectRoles('','');
});

function cargarSelectRoles(id_Usuario,id_Rol){
    var parametros='&controlador=Menus';
    parametros+='&metodo=getSelectRoles';
	parametros+='&id_Usuario='+id_Usuario;
	parametros+='&id_Rol='+id_Rol;
	$.ajax({
		url:'C_Ajax.php',
		type:'post',
		data: parametros,
		success: function(select){
			$('#la_id_Rol').html(select);
			$('#id_Rol').val(id_Rol);
			
			if( $('#id_UsuarioB').val()=='' ){
				$('#imgAsignarRol').hide();
				$('#imgDesasignarRol').hide();
			}else{
				if( $('#id_Rol option:selected').html().indexOf('(*)')<1 ){ //no tiene ese rol
					$('#imgAsignarRol').show();
					$('#imgDesasignarRol').hide();
				}else{
					$('#imgAsignarRol').hide();
					$('#imgDesasignarRol').show();
				}
			}
		}
	});
}

function cambiado_id_Rol(){
	$('#div-resultado-busqueda').html('');
	var id_Rol=$('#id_RolB').val();
	var id_Usuario=$('#id_UsuarioB').val();
	//opciones de asignacion de rol
	$('#imgDesasignarRol').hide();
	$('#imgAsignarRol').hide();
	if (id_Usuario!='' && id_Rol!=''){
		if( $('#id_RolB option:selected').html().indexOf('(*)')!=-1){ //ya está asignado
			$('#imgDesasignarRol').show();
		}else{ //no lo tiene
			$('#imgAsignarRol').show();
		}
	}
	//opciones sobre el rol
	$('#imgDeleteRol').hide();
	//$('#imgAddRol').hide();
	$('#imgEditRol').hide();
	$('#imgUsuariosRol').hide();
	if (id_Rol!=''){
		if( id_Rol!='1'){
			$('#imgDeleteRol').show();
		}
		$('#imgEditRol').show();
		$('#imgUsuariosRol').show();
	}else{
		//$('#imgAddRol').show();
	}
}

function buscar(){
	$('#msjError').html('');
	if($('#id_UsuarioB').val()!='' && $('#id_RolB').val()!=''){
		$('#msjError').html('Seleccionar un usuario o un rol (no ambos).');
	}else{
        var parametros='&controlador=Menus';
        parametros+='&metodo=getVistaMenusPermisos';
        parametros+='&id_Usuario='+$('#id_UsuarioB').val();
		parametros+='&id_Rol='+$('#id_RolB').val();
        $.ajax({
            url:'C_Ajax.php',
			type:'post',
			data: parametros,
			async: true,
			success: function(vista){
				$('#capaResultadosBusqueda').html(vista);
				if( $('#spanTitulo').length ){
					if($('#id_UsuarioB').val()!=''){
						$('#spanTitulo').html( $('#id_UsuarioNombre').val() );
					}else{
						if($('#id_RolB').val()!=''){
							$('#spanTitulo').html( $('#id_RolB option:selected').html() );
						}
					}
				}
			}
		});
	}
}

function editarOpcion(idCapa, id_Opcion){
	$('.divEdicion').html(''); //vaciar todas las capas de edicion
	var parametros='&controlador=Menus';
        parametros+='&metodo=getVistaEdicionOpcion';
	    parametros+='&id_Opcion='+id_Opcion;
	$.ajax({
		url:'C_Ajax.php',
		type:'post',
		data: parametros,
		async: true,
		success: function(vista){
			$('#divEdicionOpcion_'+idCapa).html(vista);
		}
	});
}

function cancelarOpcion(){
	$('.divEdicion').html(''); //vaciar todas las capas de edicion
}

function guardarOpcion(){
	var parametros='&controlador=Menus';
		parametros+='&metodo=guardarOpcion';
		parametros+='&'+$('#formEdicionOpcion').serialize();
	$.ajax({
		url:'C_Ajax.php',
		type:'post',
		data: parametros,
		dataType: 'json',
		success: function(respuesta){
			if(respuesta.correcto=='S'){
				//$('.divEdicion').html(''); //vaciar todas las capas de edicion
				buscar();
			}else{
				alert('Se ha producido un error al guardar.');
			}
		}
	});
}

function addOpcion(idCapa, id_Padre, orden){
	$('.divEdicion').html(''); //vaciar todas las capas de edicion
	var parametros ='&controlador=Menus';
		parametros+='&metodo=getVistaEdicionOpcion';
		parametros+='&id_Opcion=&id_Padre='+id_Padre+'&orden='+orden;
	$.ajax({
		url:'C_Ajax.php',
		type:'post',
		data: parametros,
		success: function(vista){
			$('#divEdicionOpcion_'+idCapa).html(vista);
		}
	});
}



function borrarOpcion(id_Opcion){
	$('<div></div>')
	.html('¿Realmente desea borrar esta opción?')
	.dialog({
		autoOpen: true,
		width: 350,
		title: 'Confirmar borrado...',
		modal: true,
		show: 'slide',
		hide: 'fold',
		resizable: false,
		buttons:{
			'SI': function(){
				var parametros='&controlador=Menus&metodo=borrarOpcion&id_Opcion='+id_Opcion;
				$.ajax({
					url:'C_Ajax.php',
					type:'post',
					data: parametros,
					success: function(respuesta){
						buscar();
					}
				});
				$(this).dialog('close');
			},
			'NO': function(){
				$(this).dialog('close');
			}
		}
	});
}

function borrarPermiso(id_Permiso){
	var dialogoBorrarPermiso=$('<div></div')
	.html('¿Seguro que desea borrar este tipo de permiso?')
	.dialog({
		autoOpen: true,
		width: 450,
		title: 'Confirmar borrar permiso',
		modal: true,
		resizable: false,
		buttons:{
			'Si': function(){
				var parametros='&controlador=Menus&metodo=borrarPermiso';
				parametros+='&id_Permiso='+id_Permiso;
				$.ajax({
					url:'C_Ajax.php',
					type:'post',
					data: parametros,
					success: function(borrado){
						dialogoBorrarPermiso.dialog('close');
						dialogoBorrarPermiso.dialog('destroy');
						if(borrado=='S'){
							$('#divPer_'+id_Permiso).remove();
						}
					}
				});
			},
			'Cancelar': function(){
				$(this).dialog('close');
				$(this).dialog('destroy');
			}
		}
	});
}

function editarPermiso(id_Opcion, id_Permiso){//id_Permiso='' para nuevo permiso
	var parametros='&controlador=Menus&metodo=getVistaEdicionPermiso';
	parametros+='&id_Opcion='+id_Opcion;
	parametros+='&id_Permiso='+id_Permiso;
	$.ajax({
		url:'C_Ajax.php',
		type:'post',
		data: parametros,
		success: function(capa){
			var titulo='Modificar permiso.';
			if(id_Permiso=='') titulo='Nuevo permiso.';
			var dialogoPermiso=$('<div id="dialogoPermiso" name="dialogoPermiso"></div')
				.html(capa)
				.dialog({
					autoOpen: true,
					width: 550,
					title: titulo,
					modal: true,
					resizable: false,
					buttons:{
						'Guardar': function(){
							var parametros='&controlador=Menus&metodo=guardarPermiso';
							parametros+='&id_Permiso='+$('#id_Permiso').val();
							parametros+='&id_Opcion='+$('#id_Opcion').val();
							parametros+='&num_Permiso='+$('#num_Permiso').val();
							parametros+='&permiso='+$('#permiso').val();
							$.ajax({
								url:'C_Ajax.php',
								type:'post',
								data: parametros,
								dataType: 'json',
								success: function(respuesta){
									if(respuesta.OK=='S'){
										//buscar();
										dialogoPermiso.dialog('close');
										dialogoPermiso.dialog('destroy');
									}else{
										alert('Se ha producido un error al guardar.');
									}
								}
							});
						},
						'Cancelar': function(){
							$(this).dialog('close');
							$(this).dialog('destroy');
						}
					}
				});
		}
	});
}


function clickPermisoRol(id_Opcion, num_Permiso){
	var accion='';
	if( $('#pr_'+id_Opcion+'_'+num_Permiso).is(':checked') ){
		accion='poner';
	}else{
		accion='quitar';
	}
	var parametros='&controlador=Menus&metodo=cambiarPermisoRol';
		parametros+='&id_Rol='+$('#id_RolB').val()+'&num_Permiso='+num_Permiso;
		parametros+='&id_Opcion='+id_Opcion+'&accion='+accion;
	$.ajax({
		url:'C_Ajax.php',
		type:'post',
		data: parametros,
		success: function(respuesta){
			//
		}
	});
}

function cambiadoUsuario(){
	//$('#imgAddRol').show();
	var id_Usuario=$('#id_UsuarioB').val();
	var id_Rol=$('#id_RolB').val();
	cargarSelectRoles(id_Usuario,id_Rol); //recargar combo para marcar los que tiene el usuario
}

function borrarRol(){
	var id_Rol=$('#id_RolB').val();
	var rol=$('#id_RolB option:selected').html();
	var id_Usuario=$('#id_UsuarioB').val()
	
	$('<div></div>')
	.html('¿Realmente desea borrar el rol: <b>'+rol+'</b> ?')
	.dialog({
		autoOpen: true,
		width: 350,
		title: 'Confirmar borrado...',
		modal: true,
		show: 'slide',
		hide: 'fold',
		resizable: false,
		buttons:{
			'SI': function(){
				var parametros='&controlador=Menus&metodo=borrarRol&id_Rol='+id_Rol;
				$.ajax({
					url:'C_Ajax.php',
					type:'post',
					data: parametros,
					dataType: 'json',
					success: function(respuesta){
						if(respuesta.OK=='N') {
							alert('Error: '+respuesta.msj);
						}else{
							cargarSelectRoles(id_Usuario,'');
							$('#imgDeleteRol').hide();
							$('#imgEditRol').hide();
						}
					}
				});
				$(this).dialog('close');
			},
			'NO': function(){
				$(this).dialog('close');
			}
		}
	});
}

function clickPermisoUsuario(id_Opcion, num_Permiso){
	var accion='';
	if( $('#pu_'+id_Opcion+'_'+num_Permiso).is(':checked') ){
		accion='poner';
	}else{
		accion='quitar';
	} 
	var parametros='&controlador=Menus&metodo=cambiarPermisoUsuario&id_Usuario='+$('#id_UsuarioB').val()+'&num_Permiso='+num_Permiso;
	parametros+='&id_Opcion='+id_Opcion+'&accion='+accion;
	$.ajax({
		url:'C_Ajax.php',
		type:'post',
		data: parametros,
		success: function(respuesta){
			//
		}
	});
}

function editarRol(accion){
	var parametros='&controlador=Menus&metodo=getVistaEdicionRol';
	var id_Rol=$('#id_RolB').val();
	var titulo='';
	if(accion=='nuevo'){
		parametros+='&id_Rol=';
		titulo='Nuevo rol.';
	}else{
		parametros+='&id_Rol='+id_Rol;
		titulo='Editar rol.';
	}

	$.ajax({
		url:'C_Ajax.php',
		type:'post',
		data: parametros,
		success: function(capa){
			var dialogoRol=$('<div id="dialogoRol" name="dialogoRol"></div')
				.html(capa)
				.dialog({
					autoOpen: true,
					width: 600,
					title: titulo,
					modal: true,
					resizable: false,
					buttons:{
						'Guardar': function(){
							var parametros='&controlador=Menus&metodo=guardarRol';
							parametros+='&id_Rol='+$('#id_Rol').val();
							parametros+='&rol='+$('#rol').val();
							$.ajax({
								url:'C_Ajax.php',
								type:'post',
								data: parametros,
								dataType: 'json',
								success: function(respuesta){
									if(respuesta.OK=='S'){
										cargarSelectRoles('',respuesta.id_Rol);
										dialogoRol.dialog('close');
										dialogoRol.dialog('destroy');
									}else{
										alert('Se ha producido un error al guardar.');
									}
								}
							});
						},
						'Cancelar': function(){
							$(this).dialog('close');
							$(this).dialog('destroy');
						}
					}
				});
		}
	});	
}

function verUsuariosRol(){
	var id_Rol=$('#id_RolB').val();
	var parametros='&controlador=Menus&metodo=getVistaUsuariosRol&id_Rol='+id_Rol+'&rol='+$('#id_RolB option:selected').html();
	$.ajax({
		url:'C_Ajax.php',
		type:'post',
		data: parametros,
		async: true,
		success: function(capa){
			var dialogoUsuariosRol=$('<div id="dialogoUsuariosRol" name="dialogoUsuariosRol"></div')
			.html(capa)
			.dialog({
				autoOpen: true,
				width: 500,
				title: 'Usuarios del rol...',
				modal: true,
				resizable: false,
				buttons:{
					'Cerrar': function(){
						$(this).dialog('close');
						$(this).dialog('destroy');
					}
				}
			});
		}
	});	
}

function desasignarRol(){
	var id_Usuario=$('#id_UsuarioB').val();
	var id_Rol=$('#id_RolB').val();
	
	var parametros='&controlador=Menus&metodo=desasignarRol';
	parametros+='&id_Rol='+id_Rol;
	parametros+='&id_Usuario='+id_Usuario;
	$.ajax({
		url:'C_Ajax.php',
		type:'post',
		data: parametros,
		success: function(respuesta){
			cargarSelectRoles(id_Usuario,id_Rol);
			$('#imgDesasignarRol').hide();
			$('#imgAsignarRol').show();
		}
	});
}

function asignarRol(){
	var id_Usuario=$('#id_UsuarioB').val();
	var id_Rol=$('#id_RolB').val();
	
	var parametros='&controlador=Menus&metodo=asignarRol';
	parametros+='&id_Rol='+id_Rol;
	parametros+='&id_Usuario='+id_Usuario;

	$.ajax({
		url:'C_Ajax.php',
		type:'post',
		data: parametros,
		success: function(respuesta){
			cargarSelectRoles(id_Usuario,id_Rol);
			$('#imgDesasignarRol').show();
			$('#imgAsignarRol').hide();
		}
	});
}

function conmutarRolUsuario(id_Rol, id_Usuario){
	var parametros='';
	if( $('#chRU_'+id_Rol+'_'+id_Usuario).is(':checked') ){
		parametros='&controlador=Menus&metodo=asignarRol';
	}else{
		parametros='&controlador=Menus&metodo=desasignarRol';
	}
	parametros+='&id_Rol='+id_Rol+'&id_Usuario='+id_Usuario;
	$.ajax({
		url:'C_Ajax.php',
		type:'post',
		data: parametros,
		success: function(respuesta){
			//
		}
	});
}
