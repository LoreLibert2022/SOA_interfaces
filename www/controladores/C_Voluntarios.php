<?php
require_once 'vistas/Vistas.php';
require_once 'modelos/M_Voluntarios.php';
 
class C_Voluntarios{
	private $modelo;
	private $m_documentacion;
	
	public function __construct(){ 
		$this->modelo= new M_Voluntarios();
	}
		
	public function getVistaFiltros(){ 
        Vista::render('vistas/Voluntarios/V_Voluntarios_Filtros.php');
	}

	public function buscarVoluntario($datos){
        //consultar BD, los voluntarios
        $voluntarios=$this->modelo->buscar($datos);
		return $voluntarios;
	}

	public function listadoWord($datos){
        $datos['todos']='S';
        $voluntarios = $this->buscar($datos);
        $vista = new Vista();
        $vista->render('vistas/Voluntarios/L_Voluntarios_Word.php', array('voluntarios'=>$voluntarios));
    }
	public function listadoWordAvanzado($datos){
        $datos['todos']='S';
        $voluntarios = $this->buscar($datos);
        $vista = new Vista();
        $vista->render('vistas/Voluntarios/L_Voluntarios_Word_Avanzado.php', array('voluntarios'=>$voluntarios));
    }

	public function listadoExcel($datos){
        $datos['todos']='S';
        $voluntarios = $this->buscar($datos);
        $vista = new Vista();
        $vista->render('vistas/Voluntarios/L_Voluntarios_Excel.php', array('voluntarios'=>$voluntarios));
    }
	
	public function buscar($datos){
		//consultar BD, los voluntarios
		$voluntarios=$this->modelo->buscar($datos);

		Vista::render('vistas/Voluntarios/V_Voluntarios_Listado.php', 
								array('voluntarios'=>$voluntarios,
										'filtros'=>$datos) );
	}
	
	public function editarNuevo($datos){
		if($datos['id_Voluntario']!=''){ //editando uno existente
			$voluntarios = $this->modelo->buscar($datos);
			if( empty($voluntarios)){
				echo 'No encontrado.';
			}else{
					Vista::render('vistas/Voluntarios/V_Voluntarios_EditarNuevo.php', $voluntarios[0]);      
			}
		}else{ //nuevo
			Vista::render('vistas/Voluntarios/V_Voluntarios_EditarNuevo.php'); 
		}
	}

	public function guardar($datos){
		//parametros a recibir y que voy a comprobar aqui
		$id_Voluntario='';
		extract($datos);

		//preparar respuesta
		$respuesta['correcto']='S';
		$respuesta['camposErroneos']=array();
		$respuesta['mensaje']='';

		/* //comprobar que no han manipulado el id
		if($CV!=md5(session_id().$id_Usuario)){
			$respuesta['correcto']='N';
			$respuesta['mensaje']='Formulario manipulado, se ha registrado el intento.';
		}else{
			//comprobar que no se repite el login
			$filas=$this->modelo->buscar(array('login'=>$datos['login']));
			if(!empty($filas) && $filas[0]['id_Usuario']!=$id_Usuario){
				$respuesta['camposErroneos']['login']=utf8_encode('Login repetido, elija otro.');
				$respuesta['correcto']='N';
			}
			//Caracteristicas de las pass aceptables.
			if($datos['pass']!='' && strlen($pass)<5 ){ 
				$respuesta['camposErroneos']['pass']='Demasiado corta';
				$respuesta['correcto']='N';
			}
			
		} //fin sin manipular */
		
		if($id_Voluntario==''){ //nuevo
			$id=$this->modelo->insertarVoluntario($datos);
			if($id!='' && is_numeric($id)){
				$respuesta['mensaje']=utf8_encode('Se ha guardado correctamente el nuevo voluntario.');
				$respuesta['id_Voluntario']=$id;
			}else{ //error al insertar
				$respuesta['mensaje']=utf8_encode($id);
				$respuesta['correcto']='N';
			}
		}else{//modificando
			$res=$this->modelo->actualizarVoluntarioPorId($datos);
			if($res!='' && is_numeric($res) && $res==1){
				$respuesta['mensaje']=utf8_encode('Se han guardado correctamente los cambios.');
			}else{ //error al insertar
				$respuesta['mensaje']=utf8_encode($res);
				$respuesta['correcto']='N';
			}
		}
		echo json_encode($respuesta);
	}


	public function eliminarVoluntario($datos){
		$numFilasAfectadas=$this->modelo->borrarVoluntario(array('id_Voluntario'=>$datos['id_Voluntario']));
		if($numFilasAfectadas==1){
			echo 'S';
		}else{
			echo 'N';
		}
	}


	public function datosVoluntarios($datos)	{
		$regs=$this->modelo->buscar($datos);
		return $regs;
	}

	public function loginVoluntario($datos){
        $voluntario['correcto']='N';
        $voluntario['msj']='Datos incorrectos.';

        $regs=$this->modelo->buscar(
                array('login'=>addslashes($datos['login']), 
                      'pass'=>MD5($datos['pass']),
                      'activo'=>'S'));

        if(!empty($regs)){
            $voluntario['correcto']='S';
            $voluntario['msj']='';
            $_SESSION['id_Voluntario']=$regs[0]['id_Voluntario'];
			$_SESSION['voluntario']=$regs[0]['login'];

        }else{
            //no encontrado
        }
        return $voluntario;
	}

	public function listarDocumentacion($datos){
		$listas = array();
		$listas['documentos']=$this->modelo->listarDocumentacion($datos);
		$listas['tipo_docs']=$this->modelo->listarTipoDocs();
		Vista::render('vistas/Documentacion/V_Documentacion_Listado.php', $listas);
	}

	public function agregarDocumentacion($datos){
		$this->modelo->agregarDocumento($datos);
		$listas = array();
		$listas['documentos']=$this->modelo->listarDocumentacion($datos);
		$listas['tipo_docs']=$this->modelo->listarTipoDocs();
		Vista::render('vistas/Documentacion/V_Documentacion_Listado.php', $listas);
	}

	public function borrarDocumento($datos){
		$this->modelo->borrarDocumento($datos);
		$listas = array();
		$listas['documentos']=$this->modelo->listarDocumentacion($datos);
		$listas['tipo_docs']=$this->modelo->listarTipoDocs();
		Vista::render('vistas/Documentacion/V_Documentacion_Listado.php', $listas);
	}

}