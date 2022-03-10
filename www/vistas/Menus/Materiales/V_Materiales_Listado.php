<?php
$materiales=$datos['materiales'];
//$filtros=$datos['filtros'];

$html='';

$html.='<table class="table table-sm table-striped">
            <thead>
                <tr>                
                    <td nowrap><b>Id material</b></td>
                    <td >Nombre material</td>
                </tr>
            </thead>
            <tbody>';
foreach($materiales as $reg){
    //print_r($reg);
    
    //¿activo?
    $color='black;';
    /* $ac ='<span style="color:blue;';
    if($reg['activo']=='N'){
        $ac.='display:none;';
        $color='red';
    }
    $ac.='" class="activo_'.$reg['id_material'].'" >Activo</span>';

    $ac.='<span style="color:red;';
    if($reg['activo']=='S'){
        $ac.='display:none;';
    }
    $ac.='" class="inactivo_'.$reg['id_material'].'" >Inactivo</span>'; */

/*     $ac.='&nbsp;<img src="imagenes/image/cambiar.png" style="height:1.2em;cursor:pointer;"
                 onclick="cambiarEstado(\''.$reg['id_material'].'\');" >'; */
                
    $html.='<tr id="tr_'.$reg['id_material'].'">
                <td nowrap>';
    $html.='        <img src="imagenes/image/editar.png" style="height:1.5em;" 
                       onclick="editarNuevo(\''.$reg['id_material'].'\')">';
    $html.='    </td>';

    $html.='    <td>
                    <input type="checkbox" id="ids" class="checks"
                    name="ids['.$reg['id_material'].']" >
                </td>
                
               

            </tr>';
}
$html.='    </tbody>
        </table>';

echo $html;     
?>