<?php
require_once 'modelos/DAO.php';

class M_Actividades{
    private $DAO;
    
    public function M_Actividades(){
        $this->DAO=new DAO();
    }
    
    public function buscar($filtros=array()){
        $texto='';
        $id_Actividad='';
        $ids=array(); //para filtrar por varios id
        $tipo_actividad='';
        $fecha=date('Y-m-d');
        $lugar='';
        $duracion='';
        $descripcion='';
        $nombre_organizador='';
        $observaciones='';
        $homologado='';

        $todos='S';
        
        //fin para el paginador      
        extract($filtros);
        
        $SQL="SELECT * ";
        $SQL.="FROM actividades
                WHERE 1=1 ";
        if($texto!=''){
            $aTexto=explode(' ', $texto);
            $SQL.=" AND ( 1=2 ";
            foreach ($aTexto as $palabra) {
                $SQL.=" || nombre_organizador LIKE '%$palabra%'";
            }
            $SQL.=" ) ";

        }

        if($id_Actividad!=''){
            $SQL.=" AND id_Actividad='$id_Actividad' ";
        }

        if($tipo_actividad!=''){
            $SQL.=" AND tipo_actividad='$tipo_actividad' ";
        }

        if($fecha!=''){
            $SQL.=" AND fecha='$fecha' ";
        }

        if($lugar!=''){
            $SQL.=" AND lugar='$lugar' ";
        }

        if($duracion!=''){
            $SQL.=" AND duracion='$duracion' ";
        }

        if($descripcion!=''){
            $SQL.=" AND descripcion='$descripcion' ";
        }

        if($nombre_organizador!=''){
            $SQL.=" AND nombre_organizador='$nombre_organizador' ";
        }

        if($observaciones!=''){
            $SQL.=" AND observaciones='$observaciones' ";
        }

        if($homologado!=''){
            $SQL.=" AND homologado='$homologado' ";
        }
        if(!empty($ids)){
            $SQL.=" AND id_Actividad IN (".implode(',',array_Keys($ids)).") ";
        }

        // $SQL.=" ORDER BY nombre_organizador, tipo_actividad ";
        $res=$this->DAO->consultar($SQL);
        return $res;
    }
    
    public function insertarActividad($datos){
        $tipo_actividad='';
        $fecha=date('Y-m-d');
        $lugar='';
        $duracion='';
        $descripcion='';
        $nombre_organizador='';
        $observaciones='';
        $homologado='';

        $SQL="INSERT INTO actividades SET
                tipo_actividad='$tipo_actividad',
                fecha='$fecha',
                lugar='$lugar',
                duracion='$duracion',
                descripcion='$descripcion',
                nombre_organizador='$nombre_organizador',
                observaciones='$observaciones',
                homologado='$homologado'";
        return $id_Actividad=$this->DAO->insertar($SQL);
    }

    public function actualizarActividadPorId($datos){
        $tipo_actividad='';
        $fecha=date('Y-m-d');
        $lugar='';
        $duracion='';
        $descripcion='';
        $nombre_organizador='';
        $observaciones='';
        $homologado='';
        extract($datos);

        $nombre_organizador=addslashes($nombre_organizador); //para aceptar comillas

        $SQL="UPDATE actividades SET ";
        
        $SQL.= "tipo_actividad='$tipo_actividad',
                fecha='$fecha',
                lugar='$lugar',
                duracion='$duracion',
                descripcion='$descripcion',
                nombre_organizador='$nombre_organizador',
                observaciones='$observaciones',
                homologado='$homologado' ";
		$SQL.="	WHERE id_Actividad='$id_Actividad' ";

        return $numFilasActualizadas=$this->DAO->actualizar($SQL);
    }

    public function borrarActividad($datos){
        $id_Actividad='';
        extract($datos);

        $SQL="DELETE FROM actividades WHERE 1=2 ";
        if( $id_Actividad!='' ){
            $SQL.= " OR id_Actividad='$id_Actividad' ";
        }

        return $numFilasEliminadas=$this->DAO->borrar($SQL);
    }

}