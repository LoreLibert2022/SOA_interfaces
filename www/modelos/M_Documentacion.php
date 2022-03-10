<?php
require_once 'modelos/DAO.php';

class M_Documentacion{
    private $DAO;
    

    public function agregarDocumento($datos = array()){
        $id_voluntario='';
        $f_descripcion = '3';
        extract($datos);
        $SQL="INSERT INTO documentacion_por_voluntario VALUES ($id_voluntario, $f_descripcion);";
        $id_documentacion=$this->DAO->insertar($SQL);
        return $id_documentacion;
    }

    public function listarDocumentacion($datos){
        $id_voluntario='';     
        extract($datos);
        $SQL="SELECT * ";
        $SQL.="FROM documentacion 
                INNER JOIN documentacion_por_voluntario on documentacion.id_documentacion=documentacion_por_voluntario.id_documentacion
                INNER JOIN voluntarios on documentacion_por_voluntario.id_voluntario=voluntarios.id_voluntario 
                WHERE voluntarios.id_voluntario='".$id_voluntario."'";
        $documentos=$this->DAO->consultar($SQL);
        if (count($documentos) == 0) {
            $documentos[0]["id_voluntario"] = $id_voluntario;
        }
        return $documentos;
    }

    public function listarTipoDocs(){
        $SQL="SELECT * FROM documentacion WHERE 1=1";
        $tipo_doc=$this->DAO->consultar($SQL);
        return $tipo_doc;
    }

    public function borrarDocumento($datos){
        $id_voluntario='';
        $id_documentacion='';  
        extract($datos);
        $SQL="DELETE FROM documentacion_por_voluntario WHERE id_documentacion ='".$id_documentacion."' AND id_voluntario = '".$id_voluntario."'";
        $id_documentacion = $this->DAO->borrar($SQL);
        return $id_documentacion;
    }

}