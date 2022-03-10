<?php
require_once 'modelos/DAO.php';

class M_Productos{
    private $DAO;

    public function __construct()
    {   //creo el acceso al DAO
        $this->DAO = new DAO();
    }

    public function buscarCategoria($filtros=array()){
        $SQL="SELECT * FROM productoscategorias WHERE 1=1 ";

        $res= $this->DAO->consultar($SQL);
        return $res;
    }

    public function modificarActivo($filtros=array()){
        $idproducto='';
        $factivo='';
        extract($filtros);

        if($idproducto='')
        {
            return;
        }else{

            if($factivo=='N'){
                $factivo = 'S';          
            }
            else{
                $factivo = 'N';   
            }
            $SQL="UPDATE productos SET activo = '$factivo' WHERE id_Producto = '".$idproducto."' ";
            $res= $this-> DAO->editar($SQL);     
        }
    }

    public function guardar($campos=array()){
        $idproducto='';
        $producto='';
        $descripcion='';
        $editarstockMin='';
        $editaractivo = '';
        extract($campos);

        
        if($idproducto!='')
        {
            $count = "SELECT count(*) AS total FROM productos where producto = $producto";
            $existe= $this->DAO->consultar($count);
            if ($existe[0]["total"] == '0')
            {

                $res = "REPETIDO";
            }
            else {
                $SQL="UPDATE productos SET producto = '".$producto."' , descripcion = '".$descripcion."', id_Categoria = '".$id_Categoria.
                "', stock_Minimo = '".$editarstockMin."', activo = '".$editaractivo."' WHERE id_Producto = '".$idproducto."'";    
                $res= $this->DAO->editar($SQL);
                $res = "NO REPETIDO";
            }
        }
  
        else if($producto!='')
        {
            $count = "SELECT count(*) AS total FROM productos where producto = $producto";
            $existe= $this->DAO->consultar($count);
            if ($existe[0]["total"] != '0')
            {
                $res = "REPETIDO";
            }
        else {
            $SQL="INSERT INTO productos(producto, descripcion, id_Categoria,stock_Minimo, activo) VALUES 
            ('".$producto."', '".$descripcion."', '".$id_Categoria."','".$editarstockMin."','".$editaractivo."') ";
            $res= $this->DAO->insertar($SQL);
            $res = "NO REPETIDO";
            }       
        }
        return $res;
    }

    // buscar un producto por su ID para cargar luego sus datos en la vista de V_Productos_Nuevos
    public function buscarPorId($id){
        $SQL="SELECT * FROM productos WHERE '$id' = id_Producto";
        $res= $this->DAO->consultar($SQL);
        //print_r($res);
        return $res;
    }

    
    //devuelvo los datos al controlador, el modelo recibe el array de filtros
    public function buscar($filtros=array()){
        //inicializo la variable, si no llega nada lo deja vacío
        $id='';
        $texto='';
        $factivo = '';
        $cstock_min = '';
        $contar = false;
        $fcategoria = '';
        $page = 1;
        $cant = 10;

        extract($filtros);
        $items_por_pagina = $cant;
        
        if($page== 1) 
        {
            $start = 0;
        }else {
            $start = ($page - 1) * $items_por_pagina;
        }
        
        

        if($contar){

            $SQL="SELECT count(*) AS total";
        }else{ 
            $SQL="SELECT id_Producto, producto, productos.descripcion, id_Categoria, stock, precio_Compra,
            precio_Venta, stock_Vendido, stock_Minimo, productos.activo, productoCategoria ";
        }
       
         
        $SQL.=" FROM productos INNER JOIN productoscategorias ON productos.id_Categoria = productoscategorias.id_ProductoCategoria WHERE 1=1 ";

        if($fcategoria!=''){
            $SQL.= " AND id_Categoria = '$fcategoria' ";
        }

        /*$SQL.="ORDER BY producto, produsctos.descripcion";
        if($pagina!='' && $contar=='N' && $filasPagina!=''){
            $SQL.= "LIMIT ".($filasPagina"($pagina-1)).","$filasPagina;
        }*/


        if($cstock_min=='s'){
            $SQL.= " AND stock < stock_Minimo ";////NO DEJAR ESPACIO EN LOS NOMBRES VARIABLES
        }

        if($factivo!=''){
            $SQL.= " AND productos.activo = '$factivo' ";
        }

        if($texto!=''){
            $lista=explode(' ',$texto);

            $SQL.= " AND(1=2 ";
            foreach($lista as $palabra){
                $SQL.=" OR producto LIKE '%".$palabra."%' "; 
            }
            $SQL.=" ) ";
        }
        //$res = array();
        //$res[]= count($this->DAO->consultar($SQL));

        if(!$contar){
            $SQL.=" LIMIT ".$start.", ".$items_por_pagina;
        }

        $res= $this->DAO->consultar($SQL);

        if($contar){
            return $res[0]['total'];
        }else{
            
            return $res;
        }
    }

    public function borrarProducto($datos){
        $idproducto='';
        extract($datos);

        $SQL="DELETE FROM productos WHERE 1=2 ";
        if( $idproducto!='' ){
            $SQL.= " OR id_Producto='$idproducto' ";
        }

        return $numFilasEliminadas=$this->DAO->borrar($SQL);
    }

}
?>
