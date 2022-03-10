<?php 
//echo json_encode($_SESSION['permisos']); 

?>
<link rel="stylesheet" href="js/jquery-ui-1.12.1.custom/jquery-ui.css" type="text/css" />
<script type="text/javascript" src="js/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="js/Menus.js"></script> 
<form id="formularioBuscar" name="formularioBuscar">
	<label for="id_Usuario">Usuario:
		<select id="id_UsuarioB" name="id_UsuarioB" onchange="cambiadoUsuario();">
			<option value="">-usuario-</option>
			<?php 
			     foreach ($datos['usuarios'] as $usuario) {
			         echo '<option value="'.$usuario['id_Usuario'].'">'.utf8_decode($usuario['apellido_1'].' '.$usuario['apellido_2'].' '.$usuario['nombre']).'</option>';
			     }
			?>
		</select>
	</label>
	&nbsp;&nbsp;&nbsp;&nbsp;
	<label id="la_id_Rol" for="id_Rol">Rol:
		
	</label>
	&nbsp;&nbsp;
	<img id="imgDeleteRol" src="imagenes/delete.png" style="height:1em;display:none;" title="Eliminar Rol." onclick="borrarRol();">	
	<img id="imgAddRol" src="imagenes/addRol.png" style="height:1em;" title="Crear un nuevo rol." onclick="editarRol('nuevo');">	
	<img id="imgEditRol" src="imagenes/editar.png" style="height:1em;display:none;" title="Modificar nombre rol." onclick="editarRol('editar');">	
	&nbsp;&nbsp;
	<img id="imgAsignarRol" src="imagenes/addLink_verde.png" style="height:1em;display:none;" title="Asignar rol al usuario." onclick="asignarRol();">	
	<img id="imgDesasignarRol" src="imagenes/deleteLink_rojo.png" style="height:1em;display:none;" title="Des-Asignar rol del usuario." onclick="desasignarRol();">	
	<img id="imgUsuariosRol" src="imagenes/rol_blue.png" style="height:1em;display:none;" title="Usuarios del rol" onclick="verUsuariosRol();">	
		
	<input type="text" style="width:1px; border:none;"><br>
	<button type="button" onclick="buscar();">Buscar</button>
	&nbsp;&nbsp;<span id="msjError" style="color:red"></span>
</form>
<div id="capaResultadosBusqueda"></div>
<div id="capaEdicionNuevo" style="display:none;">