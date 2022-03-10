<?php
$id_Permiso='';
$id_Opcion='';
$num_Permiso='';
$permiso='';
extract($datos);

$html='<form id="formOpcion" name="formOpcion" action="">
            <input type="hidden" id="id_Permiso" name="id_Permiso" value="'.$id_Permiso.'">
            <input type="hidden" id="id_Opcion" name="id_Opcion" value="'.$id_Opcion.'">
            <label for="num_Permiso">N&uacute;mero Permiso:<br>
				<input type="text" id="num_Permiso" name="num_Permiso" value="'.$num_Permiso.'" size="5">
            </label><br>
            <label for="permiso">Permiso:<br>
				<input type="text" id="permiso" name="permiso" value="'.$permiso.'" size="45">
            </label><br>
        </form>';

echo $html;