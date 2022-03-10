<?php
require_once 'vistas/Vistas.php';
require_once 'modelos/M_Usuarios.php';
 
class C_Usuarios{
	private $modelo;
	
	public function __construct(){ 
		$this->modelo= new M_Usuarios();
	}
		
	public function getVistaFiltros(){ 
        Vista::render('vistas/Usuarios/V_Usuarios_Filtros.php');
	}

	public function buscarUsuario($datos){
        //consultar BD, los usuarios
        $usuarios=$this->modelo->buscar($datos);
		return $usuarios;
	}

	public function listadoWord($datos){
        $datos['todos']='S';
        $usuarios = $this->buscar($datos);
        $vista = new Vista();
        $vista->render('vistas/Usuarios/L_Usuarios_Word.php', array('usuarios'=>$usuarios));
    }
	public function listadoWordAvanzado($datos){
        $datos['todos']='S';
        $usuarios = $this->buscar($datos);
        $vista = new Vista();
        $vista->render('vistas/Usuarios/L_Usuarios_Word_Avanzado.php', array('usuarios'=>$usuarios));
    }

	public function listadoExcel($datos){
        $datos['todos']='S';
        $usuarios = $this->buscar($datos);
        $vista = new Vista();
        $vista->render('vistas/Usuarios/L_Usuarios_Excel.php', array('usuarios'=>$usuarios));
    }
	
	public function buscar($datos){
		//consultar BD, los usuarios
		$usuarios=$this->modelo->buscar($datos);

		Vista::render('vistas/Usuarios/V_Usuarios_Listado.php', 
								array('usuarios'=>$usuarios,
										'filtros'=>$datos) );
	}
	
	
	public function editarNuevo($datos){
		if($datos['id_Usuario']!=''){ //editando uno existente
			$usuarios = $this->modelo->buscar($datos);
			if( empty($usuarios)){
				echo 'No encontrado.';
			}else{
					Vista::render('vistas/Usuarios/V_Usuarios_EditarNuevo.php', $usuarios[0]);      
			}
		}else{ //nuevo
			Vista::render('vistas/Usuarios/V_Usuarios_EditarNuevo.php'); 
		}
	}

	public function guardar($datos){
		//parametros a recibir y que voy a comprobar aqui
		$id_Usuario='';
		$CV=''; //codigo verificacion manipulación
		$pass='';
		extract($datos);

		//preparar respuesta
		$respuesta['correcto']='S';
		$respuesta['camposErroneos']=array();
		$respuesta['mensaje']='';

		//comprobar que no han manipulado el id
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
			
		} //fin sin manipular

		if($respuesta['correcto']=='S'){ //es correcto, guardar
			if($id_Usuario==''){ //nuevo
				$id=$this->modelo->insertarUsuario($datos);
				if($id!='' && is_numeric($id)){
					$respuesta['mensaje']=utf8_encode('Se ha guardado correctamente el nuevo usuario.');
					$respuesta['id_Usuario']=$id;
				}else{ //error al insertar
					$respuesta['mensaje']=utf8_encode($id);
					$respuesta['correcto']='N';
				}
			}else{//modificando
				$res=$this->modelo->actualizarUsuarioPorId($datos);
				if($res!='' && is_numeric($res) && $res==1){
					$respuesta['mensaje']=utf8_encode('Se han guardado correctamente los cambios.');
				}else{ //error al insertar
					$respuesta['mensaje']=utf8_encode($res);
					$respuesta['correcto']='N';
				}
			}
		}

		echo json_encode($respuesta);
	}
	
	public function cambiarEstadoUsuario($datos){
		$this->modelo->cambiarActivo(array('id_Usuario'=>$datos['id_Usuario']));
		//devolver el estado que queda guardado
		$filas=$this->modelo->buscar(array('id_Usuario'=>$datos['id_Usuario']));
		echo $filas[0]['activo'];
	}

	public function eliminarUsuario($datos){
		$numFilasAfectadas=$this->modelo->borrarUsuario(array('id_Usuario'=>$datos['id_Usuario']));
		if($numFilasAfectadas==1){
			echo 'S';
		}else{
			echo 'N';
		}
	}


	public function datosUsuarios($datos)	{
		$regs=$this->modelo->buscar($datos);
		return $regs;
	}

	public function loginUsuario($datos){
        $usuario['correcto']='N';
        $usuario['msj']='Datos incorrectos.';

        $regs=$this->modelo->buscar(
                array('login'=>addslashes($datos['login']), 
                      'pass'=>MD5($datos['pass']),
                      'activo'=>'S'));

        if(!empty($regs)){
            $usuario['correcto']='S';
            $usuario['msj']='';
            $_SESSION['id_Usuario']=$regs[0]['id_Usuario'];
			$_SESSION['usuario']=$regs[0]['login'];

        }else{
            //no encontrado
        }
        return $usuario;
	}

}