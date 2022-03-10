<?php
$usuarios=$datos['usuarios'];
//$filtros=$datos['filtros'];

$html='
<div class="form-group col-lg-3 col-md-6 col-sm-6 col-sx-12 text-right"><br>
    <button type="button" class="btn btn-secondary btn-sm" onclick="listadoWord();">L.Word</button>
    <button type="button" class="btn btn-secondary btn-sm" onclick="listadoWordAvanzado();">L.Word Avanzado</button>
    <button type="button" class="btn btn-secondary btn-sm" onclick="listadoExcel();">L.Excel</button>
</div>';

$html.='<table class="table table-sm table-striped">
            <thead>
                <tr>
                    <td width="1%"></td>
                    <td width="1%">
                        <input type="checkbox" id="setAll" onclick="cambiarTodos();">
                    </td>
                    <td width="1%" nowrap><b>Nombre completo</b></td>
                    <td width="1%"></td>
                    <td width="auto"><b>Login</b></td>
                    <td width="1%" nowrap><b>¿Activo?</b></td>
                </tr>
            </thead>
            <tbody>';
foreach($usuarios as $reg){
    $nombreCompleto=$reg['apellido_1'].' '.$reg['apellido_2'].', '.$reg['nombre'];
    
    //¿activo?
    $color='black;';
    $ac ='<span style="color:blue;';
    if($reg['activo']=='N'){
        $ac.='display:none;';
        $color='red';
    }
    $ac.='" class="activo_'.$reg['id_Usuario'].'" >Activo</span>';

    $ac.='<span style="color:red;';
    if($reg['activo']=='S'){
        $ac.='display:none;';
    }
    $ac.='" class="inactivo_'.$reg['id_Usuario'].'" >Inactivo</span>';

    $ac.='&nbsp;<img src="imagenes/delete-edit/cambiar.png" style="height:1.2em;cursor:pointer;"
                 onclick="cambiarEstado(\''.$reg['id_Usuario'].'\');" >';
                
    $html.='<tr id="tr_'.$reg['id_Usuario'].'">
                <td nowrap>';
    $html.='        <img src="imagenes/image/editar.png" style="height:1.5em;" 
                       onclick="editarNuevo(\''.$reg['id_Usuario'].'\')">';
    $html.='    </td>';

    $html.='    <td>
                    <input type="checkbox" id="ids" class="checks"
                    name="ids['.$reg['id_Usuario'].']" >
                </td>';

    $html.='    <td nowrap style="color:'.$color.'" id="tdNombre_'.$reg['id_Usuario'].'">'.$nombreCompleto.'</td>
                <td nowrap>
                    <img src="imagenes/image/delete.png" style="height:1.2em;" 
                            onclick="borrar(\''.$reg['id_Usuario'].'\')">
                </td>
                <td style="color:'.$color.'">'.$reg['login'].'</td>
                <td nowrap style="text-align:right;">'.$ac.'</td>
            </tr>';
}
$html.='    </tbody>
        </table>';

echo $html;     
?>