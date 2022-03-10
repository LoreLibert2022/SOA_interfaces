<?php
$documentacion=$datos["documentos"];
$tipo_doc = $datos["tipo_docs"];

$html='';
$html.='<table class="table table-sm table-striped">
            <thead>
                <tr>
                    <td width="1%">
                        <input type="checkbox" id="setAll" onclick="cambiarTodos();">
                    </td>
                    <td width="1%" nowrap><b>Nombre completo</b></td>
                    <td width="1%"><b>Tipo de voluntario</b></td>
                    <td width="auto" nowrap><b>Telefono de contacto</b></td>
                    <td width="auto" nowrap><b>Documentacion</b></td>
                    <td width="1%"></td>
                    <td width="1%"></td>
                </tr>
            </thead>
            <tbody>';
if (count($documentacion[0]) > 1){
    foreach($documentacion as $reg){
        $nombreCompleto=$reg['apellidos'].', '.$reg['nombre'];
        
        $color='black;';
        $html.='<tr id="tr_'.$reg['id_voluntario'].'">';
        $html.='    <td>
                        <input type="checkbox" id="ids" class="checks"
                        name="ids['.$reg['id_voluntario'].']" >
                    </td>';
        $html.='    <td nowrap style="color:'.$color.'" id="tdNombre_'.$reg['id_voluntario'].'">'.$nombreCompleto.'</td>
                    <td nowrap style="color:'.$color.'" id="tdNombre_'.$reg['id_voluntario'].'">'.$reg['tipo_voluntario'].'</td>
                    <td nowrap style="color:'.$color.'" id="tdNombre_'.$reg['id_voluntario'].'">'.$reg['telefono_contacto'].'</td>
                    <td nowrap style="color:'.$color.'" id="tdNombre_'.$reg['id_voluntario'].'">'.$reg['descripcion'].'</td>
                    <td nowrap> 
                            <img src="imagenes/image/editar.png" style="height:1.5em;" 
                           onclick="editarDocumento('.$reg['id_documentacion'].')">
                    </td>
                    <td nowrap>
                        <img src="imagenes/image/delete.png" style="height:1.2em;" 
                                onclick="borrarDocumento('.$reg['id_voluntario'].', '.$reg['id_documentacion'].')">
                    </td>';
        $html.='</tr>';
    }
}

$html.='    </tbody>
            </table>';
$html.='<form role=form id="formularioAgregarDoc" name="formularioAgregarDoc">
            <div class="form-group">
            <div class="content-select col-lg-4 col-md-6 col-xs-12">
                <label for="Descripcion">Documento:</label>
                <select name="f_descripcion" id="f_descripcion" class="selector">';
                        foreach($tipo_doc as $fila){
                            $html.='<option value="'.$fila['id_documentacion'].'">'.$fila['descripcion'].'</option> ';
                        }
$html.='        </select>
                <i></i>
            </div>
            </div>
        </form>';
$html.='<button type="button" class="btn btn-primary" onclick="agregarDocumentacion('.$documentacion[0]['id_voluntario'].', f_descripcion.value);">Agregar</button> ';
$html.='<button type="button" class="btn btn-primary" onclick="buscar(1);">Cerrar</button> ';
echo $html;     
?>
<div id="capaAgregarDocumentacion" class="container-fluid">