
<br></br>
<script src="js/productos.js"></script>

<!DOCTYPE html lang="es">
<head>
    <meta charset="UTF-8"/>
</head>
<form role="form" id="formularioBuscar" name="formularioBuscar">
    <div id="div-busqueda" class="container">
        <div class="row">
            <div class="box-blue">
                <h2>BUSQUEDA</h2>
            </div>
            <div class="formulario-group col-lg-4 col-md-6 col-xs-12">
                <label for="texto">Buscar Producto/Texto </label>
                <input type="text" id="texto" name="texto" class="form-control" placeholder="Ingrese producto/palabra clave a buscar" value="" />
                <br></br>   
            </div>

            <div class="content-select col-lg-4 col-md-6 col-xs-12">
                <label for="activo">ESTADO:</label>
                <select name="factivo" id="factivo" class="selector">
                    <option value="">Todos</option>
                    <option value="S">Activos</option>
                    <option value="N">NO activos</option>
                </select>
                <i></i>
            </div>

            <div class="formulario-group col-lg-4 col-md-6 col-xs-12">
                <br><label><input type="checkbox" name="cstock_min" id="cstock_min" value="s"> Productos por debajo del stock mínimo</label></br>
            </div>

            <div class="content-select col-lg-4 col-md-6 col-xs-12">
                <label for="productoCategoria">Buscar Categoría:</label>
                <select name="fcategoria" id="fcategoria" class="selector">
                    <option value="">Todas</option>
                    <?php
                        foreach($datos as $fila){
                            echo '<option value="'.$fila['id_ProductoCategoria'].'">'.$fila['productoCategoria'].'</option> ';
                        }
                    ?>
                </select>
                <i></i>
            </div>
        </div>
    </div>
</form>

<br></br>
<button type="button" class="btn btn-primary" onclick="buscar(1, 10);">BUSCAR</button>
<button type="button" class="btn btn-primary" onclick="limpiar();">LIMPIAR</button>
<button type="button" class="btn btn-primary" data-toggle="modal" onclick="getVistaEdicion();"> + NUEVO</button>



<div id="capaResultadosBusqueda" class="container-fluid mt-5"></div>

<div id="capaNuevoProducto" class="container-fluid mt-5"></div>

<div id="capaEdicion" class="container-fluid mt-5"></div>

</html>
