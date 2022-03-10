<!DOCTYPE html>
<html lang="es">
    <head>
        <script type="text/javascript" src="js/productos.js">
        </script>

    </head>
<form role="form" id="formularioNuevoProducto" name="formularioNuevoProducto">
    <br></br>
    <?php
        if($_POST["id"]!= 'undefined'){
            echo '<label for="texto">
                <div class="box-blue">
                    <h2> MODIFICAR DATOS DEL PRODUCTO </h2>
                </div>
                </label>';
            echo '<br></br>';
            echo '<label for="idproducto">Modificando Producto ID '.$_POST["id"].'</label>';
            echo '<input hidden name="idproducto" id="idproducto" class="form-control" value="'.$_POST["id"].'"/>';
            echo '<br><input class="form-control" type="text" name="producto" id="producto" style=width:450px placeholder="Nombre del Producto" value="'.$datos[1][0]['producto'].'"/></br>
            <input name="descripcion" id="descripcion" class="form-control" style=width:450px placeholder="Descripcion" value="'.$datos[1][0]['descripcion'].'"/>';
            echo '<br><div class="formulario-group col-lg-4 col-md-6 col-xs-12">
                    <label for="productoCategoria">Categorias:</label>
                    <select name="id_Categoria" id="id_Categoria" style=width:450px class="form-control">';
                        foreach($datos[0] as $fila){
                            if ($fila['id_ProductoCategoria'] != $datos[1][0]['id_Categoria']) {
                            echo '<option value="'.$fila['id_ProductoCategoria'].'">'.$fila['productoCategoria'].'</option> ';
                            }
                            else {
                                echo '<option selected value="'.$fila['id_ProductoCategoria'].'">'.$fila['productoCategoria'].' </option> ';
                            }
                        }
                    echo '</select>
                </div></br>';
            echo '<br><label for="editarstockMin">Stock mínimo:</label> 
            <input type="number" name="editarstockMin"  id="editarstockMin" class="form-control" style=width:150px placeholder="Stock Minimo" value="'.$datos[1][0]['stock_Minimo'].'"/></br>
            <div class="formulario-group col-lg-4 col-md-6 col-xs-12">
                <label for="activo">Estado:</label>
                <select name="editaractivo" id="editaractivo" style=width:450px class="form-control">';
                if($datos[1][0]["activo"] == "S"){
                    echo '<option selected value="S">Activo</option>
                    <option value="N">NO activo</option>';
                } else{
                    echo '<option value="S">Activo</option>
                    <option selected value="N">NO activo</option>';
                }
            echo '</select>
            </div></br>';
            
        }else{
            echo '<div class="box-blue">
                 <h2> NUEVO PRODUCTO </h2>
                </div>';
            echo '<input name="producto" id="producto" class="form-control" size="15"  placeholder="Nombre del Producto" value=""/>';
            echo '<br></br>';
            echo '<textarea name="descripcion" id="descripcion" class="form-control" style=width:450px placeholder="Descripción del producto" value=""/></textarea>';
            echo '<div class="formulario-group col-lg-4 col-md-6 col-xs-12">
                    <label for="productoCategoria"> Categorias:</label>
                    <select name="id_Categoria" id="id_Categoria" class="form-control">
                         <option value="">Todas</option>';
                        foreach($datos[0] as $fila){
                            echo '<option value="'.$fila['id_ProductoCategoria'].'">'.$fila['productoCategoria'].'</option> ';
                        }
                    echo '</select>
                </div></br>';
            echo '<br><label for="editarstockMin">Stock mínimo:</label>
            <input type="number" name="editarstockMin" id="editarstockMin" class="form-control" style=width:150px placeholder="Stock Minimo" value=""/></br>
            <div class="formulario-group col-lg-4 col-md-6 col-xs-12">
                <label for="activo">Estado:</label>
                <select name="editaractivo" id="editaractivo" class="form-control">
                    <option value="">Todos</option>
                    <option value="S">Activo</option>
                    <option value="N">NO activo</option>
                </select>
            </div><br></br>';
        }
    ?>    

    <button type="button" class="btn btn-primary" onclick="guardar();">GUARDAR</button>
 
    <button type="button" class="btn btn-primary" onclick="cancelar();">CANCELAR</button>

</form>
</html>