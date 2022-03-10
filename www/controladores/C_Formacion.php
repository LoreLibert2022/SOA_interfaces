<?php
require_once 'vistas/Vistas.php';
require_once 'modelos/M_Formacion.php';

class C_Formacion
{
    private $modelo;
    public function __construct()
    {
        $this->modelo = new M_Formacion();
    }

    public function getVistaFiltros($filtros){
        $filas = $this->modelo->buscarCategoria();
        Vista::render('vistas/Formacion/V_Formacion_Filtros.php', $filas);
    }

    public function buscar($filtros){
        $filas = $this->modelo->buscar($filtros);
        Vista::render('vistas/Formacion/V_Formacion_Listado.php', $filas);
    }
    
    public function getVistaNuevo(){
        $filas = $this->modelo->buscarCategoria();
        Vista::render('vistas/Formacion/V_Nuevo.php', $filas);
    }
    
    public function insertar($filtros){
        $filas = $this->modelo->insertar($filtros);
        Vista::render('vistas/Formacion/V_Nuevo.php', $filas);
    }

    public function getVistaEditar($datos){
        $filas = $this->modelo->buscarCategoria();
        $datos = $this->modelo->buscar($datos);
        Vista::render('vistas/Formacion/V_Editar.php', $filas, $datos);
    }

    public function actualizar($filtros){
        $filas= $this->modelo->actualizar($filtros);
    }
}