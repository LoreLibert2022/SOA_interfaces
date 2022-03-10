<?php
require_once 'modelos/DAO.php';

class M_Materiales{
    private $DAO;
    
    public function __construct(){
        $this->DAO=new DAO();
    }
    
    public function buscar($filtros=array()){
        $texto='';
        $id_material='';
        $ids=array(); //para filtrar por varios id
        $nombre='';
        $todos='S';
        
        //fin para el paginador      
        extract($filtros);
        
        $SQL="SELECT * ";
        $SQL.="FROM material
                WHERE 1=1 ";
        if($texto!=''){
            $aTexto=explode(' ', $texto);
            $SQL.=" AND ( 1=2 ";
            foreach ($aTexto as $palabra) {
                $SQL.=" || nombre LIKE '%$palabra%'";
            }
            $SQL.=" ) ";

        }

        $SQL.=" ORDER BY nombre";
        $materiales=$this->DAO->consultar($SQL);
        return $materiales;
    }
    
    public function insertarMaterial($datos){
        $nombre='';
        extract($datos);
        
        $SQL="INSERT INTO material SET
                nombre='$nombre'";
        return $id_material=$this->DAO->insertar($SQL);
    }

    public function actualizarMaterialPorId($datos){
        $nombre='';
        extract($datos);

        $nombre=addslashes($nombre);

        $SQL="UPDATE material SET ";
        
        $SQL.= "nombre='$nombre'";
		$SQL.="	WHERE id_material='$id_material' ";

        return $numFilasActualizadas=$this->DAO->editar($SQL);
    }

    public function borrarMaterial($datos){
        $id_material='';
        extract($datos);

        $SQL="DELETE FROM material WHERE 1=2 ";
        if( $id_material!='' ){
            $SQL.= " OR id_material='$id_material' ";
        }

        return $numFilasEliminadas=$this->DAO->borrar($SQL);
    }

    public function listarDocumentacion($datos){
        $id_material='';     
        extract($datos);
        
        $SQL="SELECT * ";
        $SQL.="FROM material INNER JOIN material_por_voluntario on material.id_voluntario=material_por_voluntario.id_voluntario
                WHERE material.id_material='".$id_material."'";
        $documentos=$this->DAO->consultar($SQL);
        return $documentos;
    }


}