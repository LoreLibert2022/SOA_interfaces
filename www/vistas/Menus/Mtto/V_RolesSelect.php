<?php
$roles=array();
$id_Usuario='';
$id_Rol='';
extract($datos);

echo 'Rol:';
echo '<SELECT id="id_RolB" name="id_RolB" onchange="cambiado_id_Rol();">';
echo '<option value="" >-seleccionar rol-</option>';
foreach ($roles as $rol){
	echo '<option value="'.$rol['id_Rol'].'" ';
	if($rol['id_Rol']==$id_Rol){
		echo ' selected ';
	}
	echo '>'.$rol['rol'];
	if($id_Usuario!='' && $rol['id_Usuario']==$id_Usuario){
		echo ' (*)';
	}
	echo '</option>';
}
echo '</SELECT>';