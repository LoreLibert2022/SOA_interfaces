<?php
require_once 'modelos/DAO.php';

class M_Voluntarios{
    private $DAO;
    
    public function M_Voluntarios(){
        $this->DAO=new DAO();
    }
    
    public function buscar($filtros=array()){
        $texto='';
        $id_Voluntario='';
        $ids=array(); //para filtrar por varios id
        $fusuario_instag='';
        $fusuario_faceb=''; //recibirla en ya en md5
        $ftipo_voluntario=''; //igual que activo pero en filtros de pantalla
        $todos='S';
        
        //fin para el paginador      
        extract($filtros);
        
        $SQL="SELECT * ";
        $SQL.="FROM voluntarios
                WHERE 1=1 ";
        if($texto!=''){
            $aTexto=explode(' ', $texto);
            $SQL.=" AND ( 1=2 ";
            foreach ($aTexto as $palabra) {
                $SQL.=" || nombre LIKE '%$palabra%'  
                        || apellidos LIKE '%$palabra%'  
                        || dni LIKE '%$palabra%'    
                        || email LIKE '%$palabra%' ";
            }
            $SQL.=" ) ";

        }
        if($fusuario_instag!=''){
            $SQL.=" AND fusuario_instag='$fusuario_instag' ";
        }
        if($id_Voluntario!=''){
            $SQL.=" AND id_Voluntario='$id_Voluntario' ";
        }
        if($fusuario_faceb!=''){
            $SQL.=" AND fusuario_faceb='$fusuario_faceb' ";
        }
        if($ftipo_voluntario!=''){
            $SQL.=" AND ftipo_voluntario='$ftipo_voluntario' ";
        }
        if(!empty($ids)){
            $SQL.=" AND id_Voluntario IN (".implode(',',array_Keys($ids)).") ";
        }

        $SQL.=" ORDER BY apellidos, nombre, tipo_voluntario ";
        $voluntarios=$this->DAO->consultar($SQL);
        return $voluntarios;
    }
    
    public function insertarVoluntario( $datos){
        $nombre='';
        $apellidos='';
        $dni='';
        $telefono_contacto='';
        $telefono_emergencias='';
        $fecha_nac=date('Y-m-d');
        $direccion='';
        $cp='';
        $email='';
        $foto='';
        $fecha_inscrip_soa=date('Y-m-d');
        $hobbies_otros_cursos='';
        $usuario_instag='';
        $usuario_faceb='';
        $fecha_baja=date('Y-m-d');
        $ocupacion='';
        $tipo_voluntario='';
        $caracteristicas_generales='';
        extract($datos);
        
        $SQL="INSERT INTO voluntarios SET
                nombre='$nombre',
                apellidos='$apellidos',
                dni='$dni',
                telefono_contacto='$telefono_contacto',
                telefono_emergencias='$telefono_emergencias',
                fecha_nac='$fecha_nac',
                direccion='$direccion',
                cp='$cp',
                email='$email',
                foto='$foto',
                fecha_inscrip_soa='$fecha_inscrip_soa',
                hobbies_otros_cursos='$hobbies_otros_cursos',
                usuario_instag='$usuario_instag',
                usuario_faceb='$usuario_faceb',
                fecha_baja='$fecha_baja',
                ocupacion='$ocupacion',
                tipo_voluntario='$tipo_voluntario',
                caracteristicas_generales='$caracteristicas_generales' ";
        return $id_Voluntario=$this->DAO->insertar($SQL);
    }

    public function actualizarVoluntarioPorId($datos){
        $nombre='';
        $apellidos='';
        $dni='';
        $telefono_contacto='';
        $telefono_emergencias='';
        $fecha_nac=date('Y-m-d');
        $direccion='';
        $cp='';
        $email='';
        $foto='';
        $fecha_inscrip_soa=date('Y-m-d');
        $hobbies_otros_cursos='';
        $usuario_instag='';
        $usuario_faceb='';
        $fecha_baja=date('Y-m-d');
        $ocupacion='';
        $tipo_voluntario='';
        $caracteristicas_generales='';
        extract($datos);

        $nombre=addslashes($nombre); //para aceptar comillas
        $apellidos=addslashes($apellidos);

        $SQL="UPDATE voluntarios SET ";
        
        $SQL.= "nombre='$nombre',
                apellidos='$apellidos',
                dni='$dni',
                telefono_contacto='$telefono_contacto',
                telefono_emergencias='$telefono_emergencias',
                fecha_nac='$fecha_nac',
                direccion='$direccion',
                cp='$cp',
                email='$email',
                foto='$foto',
                fecha_inscrip_soa='$fecha_inscrip_soa',
                hobbies_otros_cursos='$hobbies_otros_cursos',
                usuario_instag='$usuario_instag',
                usuario_faceb='$usuario_faceb',
                fecha_baja='$fecha_baja',
                ocupacion='$ocupacion',
                tipo_voluntario='$tipo_voluntario',
                caracteristicas_generales='$caracteristicas_generales' ";
		$SQL.="	WHERE id_Voluntario='$id_Voluntario' ";

        return $numFilasActualizadas=$this->DAO->actualizar($SQL);
    }

    public function borrarVoluntario($datos){
        $id_Voluntario='';
        extract($datos);

        $SQL="DELETE FROM voluntarios WHERE 1=2 ";
        if( $id_Voluntario!='' ){
            $SQL.= " OR id_Voluntario='$id_Voluntario' ";
        }

        return $numFilasEliminadas=$this->DAO->borrar($SQL);
    }

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