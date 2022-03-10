<?php
require_once 'vistas/Vistas.php';
require_once 'modelos/M_Materiales.php';
 
class C_Materiales{
	private $modelo;
	
	public function __construct(){ 
		$this->modelo= new M_Materiales();
	}
		
	public function getVistaFiltros(){ 
        Vista::render('vistas/Materiales/V_Materiales_Filtros.php');
	}

	public function buscarMaterial($datos){
        //consultar BD, los materiales
        $materiales=$this->modelo->buscar($datos);
		return $materiales;
	}

	public function listadoWord($datos){
        $datos['todos']='S';
        $materiales = $this->buscar($datos);
        $vista = new Vista();
        $vista->render('vistas/Materiales/L_Materiales_Word.php', array('materiales'=>$materiales));
    }
	public function listadoWordAvanzado($datos){
        $datos['todos']='S';
        $materiales = $this->buscar($datos);
        $vista = new Vista();
        $vista->render('vistas/Materiales/L_Materiales_Word_Avanzado.php', array('materiales'=>$materiales));
    }

	public function listadoExcel($datos){
        $datos['todos']='S';
        $materiales = $this->buscar($datos);
        $vista = new Vista();
        $vista->render('vistas/Materiales/L_Materiales_Excel.php', array('materiales'=>$materiales));
    }
	
	public function buscar($datos){
		//consultar BD, los materiales
		$materiales=$this->modelo->buscar($datos);

		Vista::render('vistas/Materiales/V_Materiales_Listado.php', 
								array('materiales'=>$materiales,
										'filtros'=>$datos) );
	}

	
	public function editarNuevo($datos){
		if($datos['id_material']!=''){ //editando uno existente
			$materiales = $this->modelo->buscar($datos);
			if( empty($materiales)){
				echo 'No encontrado.';
			}else{
					Vista::render('vistas/Materiales/V_Materiales_EditarNuevo.php', $materiales[0]);      
			}
		}else{ //nuevo
			Vista::render('vistas/Materiales/V_Materiales_EditarNuevo.php'); 
		}
	}

	public function guardar($datos){
		//parametros a recibir y que voy a comprobar aqui
		$id_material='';
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
		
		if($id_material==''){ //nuevo
			$id=$this->modelo->insertarMaterial($datos);
			if($id!='' && is_numeric($id)){
				$respuesta['mensaje']=utf8_encode('Se ha guardado correctamente el nuevo material.');
				$respuesta['id_material']=$id;
			}else{ //error al insertar
				$respuesta['mensaje']=utf8_encode($id);
				$respuesta['correcto']='N';
			}
		}else{//modificando
			$res=$this->modelo->actualizarMaterialPorId($datos);
			if($res!='' && is_numeric($res) && $res==1){
				$respuesta['mensaje']=utf8_encode('Se han guardado correctamente los cambios.');
			}else{ //error al insertar
				$respuesta['mensaje']=utf8_encode($res);
				$respuesta['correcto']='N';
			}
		}
		echo json_encode($respuesta);
	}


	public function eliminarMaterial($datos){
		$numFilasAfectadas=$this->modelo->borrarMaterial(array('id_material'=>$datos['id_material']));
		if($numFilasAfectadas==1){
			echo 'S';
		}else{
			echo 'N';
		}
	}


	public function datosmateriales($datos)	{
		$regs=$this->modelo->buscar($datos);
		return $regs;
	}


}