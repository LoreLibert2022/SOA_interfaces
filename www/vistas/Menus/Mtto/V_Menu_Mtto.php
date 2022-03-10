<?php 
//http://www.iconsplace.com/lime-icons/add-property-icon


//parametros que se esperan recibir:
$ver='usuario'; //usuario o rol
$menu=array(); //Todas las opciones del menu
$permisosMenu=array(); //Permisos definidos para todas las opciones de menu
$permisos=array(); //permisos que tiene el usurio o el rol a visualizar estructura: [id_Opcion][num_Permiso][id_Rol]
$rolesUsuario=array(); //datos de los roles que tiene el usuario (solo para $ver='usuario')
extract($datos);

echo 'permisos:<br>';
echo json_encode($permisos);

$html='';

$idCapa=1;

if($ver=='usuario'){
    echo '<b>Mostrando permisos de usuario: </b><span id="spanTitulo" style="color:blue;font-weight:bold;"></span>';
}else{
    if($ver=='rol'){
        echo '<b>Mostrando permisos del rol: </b><span id="spanTitulo" style="color:blue;font-weight:bold;"></span>';
    }else{
        echo '<b>Mostrando permisos del <span style="color:blue;">Men&uacute;.</span></b>';
    }
}
echo '<br>';

$datos['id_Padre']=0;
require 'V_Menu_Mtto_Funciones.php';  //contiene las funciones que pintas las opciones y permisos
echo pintarSubOpciones($datos);

?>
