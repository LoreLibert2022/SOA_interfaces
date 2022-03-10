<?php
	//inicializar variables recibidas en $datos.
	$id_Opcion='';
	$id_Padre=0;
	$texto='';
	$accion='';
    $orden=0;
    $activo='S';
	extract($datos);
	
    $html='<div style="margin-left:3em;background-color:#ABE7F5;">
            <form id="formEdicionOpcion" name="formEdicionOpcion">
                <input type="hidden" id="id_Opcion" name="id_Opcion" value="'.$id_Opcion.'">
                <input type="hidden" id="id_Padre" name="id_Padre" value="'.$id_Padre.'">
                <label for="texto">Texto:<br>
                    <input type="text" id="texto" name="texto" size="40" value="'.$texto.'">
                </label><br>
                <label for="accion">Acción:<br>
                    <input type="text" id="accion" name="accion" size="60" value="'.$accion.'">
                </label><br>
                <label for="orden">Orden:<br>
                    <input type="text" id="orden" name="orden" value="'.$orden.'">
                </label><br>
                <label for="activo">Activo:<br>
                    <select type="text" id="activo" name="activo">
                        <option value="S" ';
                            if($activo=='S') $html.= ' selected ';
    $html.=                 '>Activo</option>
                        <option value="N" ';
                            if($activo=='N') $html.= ' selected ';
    $html.=                 '>Inactivo</option>
                    </select>
                </label><br>
                <button type="button" onclick="cancelarOpcion()">Cancelar</button>&nbsp;&nbsp;
                <button type="button" onclick="guardarOpcion()">Guardar</button>
            </form>
        </div>';
    echo $html;
 ?>