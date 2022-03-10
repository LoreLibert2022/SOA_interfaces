<?php
require_once 'vistas/Vistas.php';
require_once 'modelos/M_Documentacion.php';
 
class C_Documentacion{
	private $modelo;
	
	public function __construct(){ 
		$this->modelo= new M_Documentacion();
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
        print_r($listas);
		$listas['tipo_docs']=$this->modelo->listarTipoDocs();
		Vista::render('vistas/Documentacion/V_Documentacion_Listado.php', $listas);
	}
}