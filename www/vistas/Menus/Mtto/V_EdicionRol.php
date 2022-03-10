<?php
$id_Rol='';
$rol='';
extract($datos);

$html='<form id="formRol" name="formRol" action="">
            <input type="hidden" id="id_Rol" name="id_Rol" value="'.$id_Rol.'">
            <label for="rol">Rol:<br>
				<input type="text" id="rol" name="rol" value="'.$rol.'" size="45">
            </label><br>
        </form>';

echo $html;