<?php
$html='<div>Usuarios con rol <b>'.$datos['rol'].'</b>:<br></div>';
$html.= '<div style="overflow:scroll;height:15em;font-weigth:normal;font-size:0.8em;">';
foreach ($datos['usuarios'] as $usuario){
	$html.='<label>
				<input type="checkbox" id="chRU_'.$datos['id_Rol'].'_'.$usuario['id_Usuario'].'" 
					onchange="conmutarRolUsuario(\''.$datos['id_Rol'].'\',\''.$usuario['id_Usuario'].'\');" ';
	if($usuario['id_Rol']!=NULL){
		$html.='checked ';
	}
	$html.='>&nbsp;&nbsp;';
	$html.=$usuario['apellido_1'].' '.$usuario['apellido_1'].', '.$usuario['nombre'].'</label><br>';
}
$html.= '</div>';
echo $html;

?>