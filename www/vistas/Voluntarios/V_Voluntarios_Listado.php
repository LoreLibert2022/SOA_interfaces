<?php
$voluntarios=$datos['voluntarios'];
//$filtros=$datos['filtros'];

$html='';

$html.='<table class="table table-sm table-striped">
            <thead>
                <tr>
                    <td width="1%"></td>
                    <td width="1%">
                        <input type="checkbox" id="setAll" onclick="cambiarTodos();">
                    </td>
                    <td width="1%" nowrap><b>Nombre completo</b></td>
                    <td width="1%"></td>
                    <td width="1%"><b>Tipo de voluntario</b></td>
                    <td width="auto" nowrap><b>Telefono de contacto</b></td>
                    <td width="auto" nowrap><b>Documentacion</b></td>
                    <td width="auto" nowrap><b>Formación</b></td>
                </tr>
            </thead>
            <tbody>';
foreach($voluntarios as $reg){
    //print_r($reg);
    $nombreCompleto=$reg['apellidos'].', '.$reg['nombre'];
    
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
                
    $html.='<tr id="tr_'.$reg['id_voluntario'].'">
                <td nowrap>';
    $html.='        <img src="imagenes/image/editar.png" style="height:1.5em;" 
                       onclick="editarNuevo(\''.$reg['id_voluntario'].'\')">';
    $html.='    </td>';

    $html.='    <td>
                    <input type="checkbox" id="ids" class="checks"
                    name="ids['.$reg['id_voluntario'].']" >
                </td>';

    $html.='    <td nowrap style="color:'.$color.'" id="tdNombre_'.$reg['id_voluntario'].'">'.$nombreCompleto.'</td>
                <td nowrap>
                    <img src="imagenes/image/delete.png" style="height:1.2em;" 
                            onclick="borrar(\''.$reg['id_voluntario'].'\')">
                </td>
                <td nowrap style="color:'.$color.'" id="tdNombre_'.$reg['id_voluntario'].'">'.$reg['tipo_voluntario'].'</td>
                <td nowrap style="color:'.$color.'" id="tdNombre_'.$reg['id_voluntario'].'">'.$reg['telefono_contacto'].'</td>
                <td nowrap>
                    <img src="imagenes/image/addPermiso.png" style="height:1.2em;" 
                            onclick="listarDocumentacion(\''.$reg['id_voluntario'].'\')">
                </td>

                <td nowrap>
                <img src="imagenes/image/addPermiso.png" style="height:1.2em;" 
                        onclick="listarFormacion(\''.$reg['id_voluntario'].'\')">
            </td>

            </tr>';
}
$html.='    </tbody>
        </table>';

echo $html;     
?>