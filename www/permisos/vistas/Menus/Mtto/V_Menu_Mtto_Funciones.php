<?php 
function pintarSubOpciones($parametros){
    $ver=''; //usuario o rol
    $menu=array(); //Todas las opciones del menu
    $id_Padre=0; //padre de las opciones a pintar
    $permisosMenu=array(); //Permisos definidos para todas las opciones de menu
    $permisos=array(); //permisos que tiene el usurio o el rol a visualizar estructura: [id_Opcion][num_Permiso][id_Rol]
    $rolesUsuario=array(); //datos de los roles que tiene el usuario (solo para $ver='usuario')
    
    extract($parametros);
    global $idCapa;
    $orden=0;

    $html='';
    $ordenNuevo=10;
    foreach ($menu as $ind=>$opcion){
        //$ordenNuevo=floor(($opcion['orden']-$orden)/2);
        //$ordenNuevo=10;
        //añadir menu al comienzo
        if($ver=='menu'){
            $titulo='Crear nuevo men&uacute;.';
            if($id_Padre!=0) $titulo='Crear nueva subopci&oacute;n.';
            $html.='<div style="background-color:white;"><img src="imagenes/addmenu.png" style="height:1.5em;" title="'.$titulo.'"
            onclick="addOpcion(\''.$idCapa.'\',\''.$id_Padre.'\',\''.$opcion['orden'].'\');" ></div>';
            $html.='<div id="divEdicionOpcion_'.$idCapa.'" name="divEdicionOpcion_'.$idCapa.'" class="divEdicion"></div>';
            $idCapa++;
        }else{
            $html.='<div style="background-color:white;"><br></div>';
        }
        
        $html.='<span class="textoMenu" 
                    title="id: '.$opcion['id_Opcion'].'  &#10;Accion: '.$opcion['accion'].'">'.$opcion['texto'].'</span>';
        if($ver=='menu'){
            $html.='&nbsp;&nbsp;&nbsp;<img src="imagenes/editar.png" style="height:1em;" title="Modificar la opci&oacute;n."
                        onclick="editarOpcion(\''.$idCapa.'\',\''.$opcion['id_Opcion'].'\');">';
            $html.='&nbsp;&nbsp;&nbsp;<img src="imagenes/delete.png" style="height:1em;" title="Eliminar esta opci&oacute;n."
                        onclick="borrarOpcion(\''.$opcion['id_Opcion'].'\');">';
            //añadir nuevo permiso
            $html.='&nbsp;&nbsp;&nbsp;<img src="imagenes/addPermiso.png" style="height:1em;" title="A&ntilde;adir permiso a esta opci&oacute;n."
                                    onclick="editarPermiso(\''.$opcion['id_Opcion'].'\',\'\');">';
        }
        //pintar los permisos
        $html.='<div style="padding-left:6em;">';
    // 	if(isset($permisosMenu[$opcion['id_Opcion']])){
    // 		$html.=pintarPermisos($opcion['id_Opcion'],$permisosMenu[$opcion['id_Opcion']]);
    // 	}else{
            if(isset($permisos[$opcion['id_Opcion']])){
                $losPermisos=$permisos[$opcion['id_Opcion']];
            }else{
                $losPermisos=array();
            }
            if(isset($permisosMenu[$opcion['id_Opcion']])){
                $html.=pintarPermisos(array('id_Opcion'=>$opcion['id_Opcion'],
                                        'permisosMenu'=>$permisosMenu[$opcion['id_Opcion']],
                                        'ver'=>$ver,
                                        'permisos'=>$losPermisos,
                                        'rolesUsuario'=>$rolesUsuario)
                                    );
            }
    // 	}
            
        $html.='</div>';

        //pintar subopciones (el menu principal es un submenu del 0)
        if(isset($opcion['subOpciones']) && !empty($opcion['subOpciones'])){
            $html.='<div style="margin-left:6em;background-color:#F0F0EA;">';
            $parametosSubopciones=$parametros;
            $parametosSubopciones['menu']=$opcion['subOpciones'];
            $parametosSubopciones['id_Padre']=$opcion['id_Opcion'];
            $html.=pintarSubOpciones($parametosSubopciones);
            $html.='</div>';
        }
        
        else{
            if($id_Padre==0){ //para evitar crear mas de dos niveles 
                //no tiene subopciones pero hay que pintar las opciones de crearlas
                $html.='<div style="margin-left:6em;background-color:#F0F0EA;">';
                $parametosSubopciones=$parametros;
                $parametosSubopciones['menu']=array();//sin subopciones
                $parametosSubopciones['id_Padre']=$opcion['id_Opcion'];
                $html.=pintarSubOpciones($parametosSubopciones);
                $html.='</div>';
            }
        }
       
        $orden=$opcion['orden'];
    }
    //añadir menu al final
    if($ver=='menu'){
        $titulo='Crear nuevo men&uacute;.';
        if($id_Padre!=0) $titulo='Crear nueva subopci&oacute;n.';
        $html.='<div style="background-color:white;"><img src="imagenes/addmenu.png" style="height:1.5em;" title="'.$titulo.'"
                            onclick="addOpcion(\''.$idCapa.'\',\''.$id_Padre.'\',\''.($ordenNuevo+$orden).'\');"></div>';
        $html.='<div id="divEdicionOpcion_'.$idCapa.'" name="divEdicionOpcion_'.$idCapa.'" class="divEdicion"></div>';
    }
    return $html;
}


function pintarPermisos($parametros){
	$id_Opcion='';
	$permisosMenu=array();  
	$ver='';
	$permisos=array(); //con estructura [num_Permiso][id_Rol]
	$rolesUsuario=array();
	extract($parametros);
	$vistaP='';
	if( !empty($permisosMenu) ){
		foreach ($permisosMenu as $permiso){
			$num_Permiso=$permiso['num_Permiso'];
            $vistaP.='<div id="divPer_'.$permiso['id_Permiso'].'">';
			if($ver=='usuario'){
				$vistaP.='<input type="checkbox"  id="pu_'.$id_Opcion.'_'.$num_Permiso.'" onclick="clickPermisoUsuario(\''.$id_Opcion.'\',\''.$num_Permiso.'\');" ';
				if(isset($permisos[$num_Permiso][0])) $vistaP.=' checked ';
				$vistaP.='>';
			}
			if($ver=='rol'){
				$vistaP.='<input type="checkbox"  id="pr_'.$id_Opcion.'_'.$num_Permiso.'" onclick="clickPermisoRol(\''.$id_Opcion.'\',\''.$num_Permiso.'\');" ';
				if(isset($permisos[$num_Permiso])) $vistaP.=' checked ';
				$vistaP.='>';
			}
			$vistaP.='&nbsp;&nbsp;&nbsp;';
			if($ver=='usuario'){
				if(isset($permisos[$num_Permiso])){
					if(  (isset($permisos[$num_Permiso][0]) && sizeof($permisos[$num_Permiso])>1) 
							|| (!isset($permisos[$num_Permiso][0]) && sizeof($permisos[$num_Permiso])>0	)){
						unset($permisos[$num_Permiso][0]);// por si esta defido,lo borro
						$listaRoles='';
						foreach ($permisos[$num_Permiso] as $id_Rol=>$verdadero){
							$listaRoles.=$rolesUsuario[$id_Rol].', ';
						}
						
						$vistaP.='<img src="imagenes/rol_azul.png" style="height:1em;" title="Con permiso por rol: '.$listaRoles.'" onclick="';
						$vistaP.="alert('Con permiso por rol: ".$listaRoles."');";
						$vistaP.='" >';
						
					}else{
						$vistaP.='<img src="imagenes/rol_gris.png" style="height:1em;" title="NO tiene asignado el permiso por roles.">';
					}
				}else{
					$vistaP.='<img src="imagenes/rol_gris.png" style="height:1em;" title="NO tiene asignado el permiso por roles.">';
				}
			}
			$vistaP.='&nbsp;&nbsp;&nbsp;';
            $vistaP.=$permiso['num_Permiso'].' - '.$permiso['permiso'];
            if($ver=='menu'){
                //editar permiso
                $vistaP.='&nbsp;&nbsp;&nbsp;<img src="imagenes/editar.png" style="height:1em;" title="Modificar el permiso."
                        onclick="editarPermiso(\''.$id_Opcion.'\',\''.$permiso['id_Permiso'].'\');">';
                //elimiar permiso
                $vistaP.='&nbsp;&nbsp;&nbsp;<img src="imagenes/delete.png" style="height:1em;" title="Eliminar este permiso."
                                onclick="borrarPermiso(\''.$permiso['id_Permiso'].'\');">';
            }
            $vistaP.='<br>';
            $vistaP.='</div>';
		}
	}
	
	return $vistaP;
} // fin pintarPermisos

?>