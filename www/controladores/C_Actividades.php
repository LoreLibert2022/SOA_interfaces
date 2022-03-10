<?php
require_once 'vistas/Vistas.php';
require_once 'modelos/M_Actividades.php';
 
class C_Actividades{
	private $modelo;
	
	public function __construct(){ 
		$this->modelo= new M_Actividades();
	}
		
	public function getVistaFiltros(){ 
        Vista::render('vistas/Actividades/V_Actividades_Filtros.php');
	}

	public function buscarActividad($datos){

        $actividades=$this->modelo->buscar($datos);
		return $actividades;
	}

	public function buscar($datos){

		$actividades=$this->modelo->buscar($datos);

		Vista::render('vistas/Actividades/V_Actividades_Listado.php', 
								array('actividades'=>$actividades,
										'filtros'=>$datos) );
	}
	
	public function editarNueva($datos){
		if($datos['id_Actividad']!=''){ //editando uno existente
			$actividades = $this->modelo->buscar($datos);
			if( empty($actividades)){
				echo 'No encontrado.';
			}else{
					Vista::render('vistas/Actividades/V_Actividades_EditarNueva.php', $actividades[0]);      
			}
		}else{ //nueva
			Vista::render('vistas/Actividades/V_Actividades_EditarNueva.php'); 
		}
	}

	public function guardar($datos){
		//parametros a recibir y que voy a comprobar aqui
		$id_Actividad='';
		extract($datos);

		//preparar respuesta
		$respuesta['correcto']='S';
		$respuesta['camposErroneos']=array();
		$respuesta['mensaje']='';
		
		if($id_Actividad==''){ //nueva
			$id=$this->modelo->insertarActividad($datos);
			if($id!='' && is_numeric($id)){
				$respuesta['mensaje']=utf8_encode('Se ha guardado correctamente la nueva actividad.');
				$respuesta['id_Actividad']=$id;
			}else{ //error al insertar
				$respuesta['mensaje']=utf8_encode($id);
				$respuesta['correcto']='N';
			}
		}else{//modificando
			$res=$this->modelo->actualizarActividadPorId($datos);
			if($res!='' && is_numeric($res) && $res==1){
				$respuesta['mensaje']=utf8_encode('Se han guardado correctamente los cambios.');
			}else{ //error al insertar
				$respuesta['mensaje']=utf8_encode($res);
				$respuesta['correcto']='N';
			}
		}
		echo json_encode($respuesta);
	}


	public function eliminarActividad($datos){
		$numFilasAfectadas=$this->modelo->borrarActividad(array('id_Actividad'=>$datos['id_Actividad']));
		if($numFilasAfectadas==1){
			echo 'S';
		}else{
			echo 'N';
		}
	}


	public function datosActividades($datos)	{
		$regs=$this->modelo->buscar($datos);
		return $regs;
	}

}