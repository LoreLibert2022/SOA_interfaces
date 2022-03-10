<?php
require_once 'vistas/Vistas.php';
//para poder hacer la llamada creo el modelo
require_once 'modelos/M_Productos.php';

Class C_Productos{
    private $modelo;
    public function __construct(){
        $this->modelo = new M_Productos();
    }

    public function getVistaFiltros(){
        $filas = $this->modelo->buscarCategoria();
        Vista::render('vistas/Productos/V_Productos_Filtros.php',$filas);
    }
    
    //la funcion buscar recibe los datos(filtros)
    public function buscar($filtros){
        //busca y devuelve el array de filas llamando al modelo
        $filas = $this->modelo->buscar($filtros);
        $filtros['contar'] = true;
        $filtros['num_total_rows'] = $this->modelo->buscar($filtros);
        
        Vista::render('vistas/Productos/V_Productos_Listado.php', $filas);
        Vista::render('vistas/Productos/V_Listado_Paginador.php', $filtros);
    }


    public function guardar($id){
        $respuesta = $this->modelo->guardar($id);
        //ID VACIO(ID no existe, es un id NUEVO) INSERTAR
        //SI EL ID EXISTE MODIFICAR update al modelo
        echo $respuesta;
    }

    public function getVistaEdicion($filtros){
     //editar en cada producto y en la funcion que ejecutas tendrás el id //me tiene que traer todos los datos de la BD
        $filas=array();
        $filas[] = $this->modelo->buscarCategoria($filtros);
        $filas[] = $this->modelo->buscarPorId($_POST['id']);
        Vista::render('vistas/Productos/V_Productos_Nuevos.php', $filas);
        //"array con las $filas y buscar producto"
    }

    public function modificarActivo($filtros){

        $filas = $this->modelo->modificarActivo($filtros);

    }
}
?>