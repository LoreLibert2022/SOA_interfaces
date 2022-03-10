<?php
$actividades=$datos['actividades'];
//$filtros=$datos['filtros'];

$html='';

$html.='<table class="table table-sm table-striped">
            <thead>
                <tr>
                    <td width="1%"></td>
                    <td width="1%">
                        <input type="checkbox" id="setAll" onclick="cambiarTodos();">
                    </td>
                    <td width="1%" nowrap><b>Nombre organizador</b></td>
                    <td width="1%"></td>
                    <td width="1%"><b>Tipo de actividad</b></td>
                </tr>
            </thead>
            <tbody>';
foreach($actividades as $reg){
    //print_r($reg);
    
    //¿activo?
    $color='black;';
    /* $ac ='<span style="color:blue;';
    if($reg['activo']=='N'){
        $ac.='display:none;';
        $color='red';
    }
    $ac.='" class="activo_'.$reg['id_voluntario'].'" >Activo</span>';

    $ac.='<span style="color:red;';
    if($reg['activo']=='S'){
        $ac.='display:none;';
    }
    $ac.='" class="inactivo_'.$reg['id_voluntario'].'" >Inactivo</span>'; */

/*     $ac.='&nbsp;<img src="imagenes/image/cambiar.png" style="height:1.2em;cursor:pointer;"
                 onclick="cambiarEstado(\''.$reg['id_voluntario'].'\');" >'; */
                
    $html.='<tr id="tr_'.$reg['id_actividad'].'">
                <td nowrap>';
    $html.='        <img src="imagenes/image/editar.png" style="height:1.5em;" 
                       onclick="editarNueva(\''.$reg['id_actividad'].'\')">';
    $html.='    </td>';

    $html.='    <td>
                    <input type="checkbox" id="ids" class="checks"
                    name="ids['.$reg['id_actividad'].']" >
                </td>';

    $html.='    <td nowrap style="color:'.$color.'" id="tdNombre_'.$reg['id_actividad'].'">'.$reg['nombre_organizador'].'</td>
                <td nowrap>
                    <img src="imagenes/image/delete.png" style="height:1.2em;" 
                            onclick="borrar(\''.$reg['id_actividad'].'\')">
                </td>
                <td nowrap style="color:'.$color.'" id="tdNombre_'.$reg['id_actividad'].'">'.$reg['tipo_actividad'].'</td>
                <td nowrap style="color:'.$color.'" id="tdNombre_'.$reg['id_actividad'].'"></td>

            </tr>';
}
$html.='    </tbody>
        </table>';

echo $html;     
?>