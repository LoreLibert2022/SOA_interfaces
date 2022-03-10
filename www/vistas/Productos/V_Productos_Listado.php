<!DOCTYPE html lang="es">
<head>
    <meta charset="UTF-8"/>
</head>
</html>
<style>
    table, th, td 
    {
        border: 1px solid black;
    }
</style>
<br></br>

<table class="table table-striped table-hover">
    <tr bgcolor=#1F618D border="1" cellpadding="1" cellspacing="1">
        <td><font color=#FFFFFF face="verdana"><b>Producto</b></font></td>
        <td><font color=#FFFFFF face="verdana"><b>Descripción</b></font></td>
        <td><font color=#FFFFFF face="verdana"><b>Categoría</b></font></td>
        <td><font color=#FFFFFF face="verdana"><b>Estado</b></font></td>
        <td><font color=#FFFFFF face="verdana"><b>Stock</b></font></td>
        <td><font color=#FFFFFF face="verdana"><b>Stock Minimo</b></font></td>
        <td><font color=#FFFFFF face="verdana"><b>Acciones</b></font></td>   
    </tr>

    <?php
    
    if(empty($datos)){
        echo 'No se han encontrado productos.';
    } else{
        //Hay productos
        echo '<div class="box-blue"><br>
            <h2>RESULTADOS ENCONTRADOS</h2></br></div>';
        foreach($datos as $ind=>$fila){
            echo "<tr><td><font face=\"verdana\">".$fila["producto"]."</font></td>";
            echo "<td><font face=\"verdana\">".$fila["descripcion"]."</font></td>";
            echo "<td><font face=\"verdana\">".$fila["productoCategoria"]."</font></td>";
            echo '<td><font face=\"verdana\"><select name="editaractivo" id="editaractivo" style=width:100px class="form-control" onChange="modificarActivo(\''.$fila['id_Producto'].'\',\''.$fila['activo'].'\') ;">';
            if($fila["activo"]=="s"){
                echo '<option selected value="s">Activo</option>
                <option value="n">NO activo</option>';
            } else{
                echo '<option value="s">Activo</option>
                <option selected value="n">No activo</option>';
            } 
            echo '</select></font></td>';
            echo "<td><font face=\"verdana\">".$fila["stock"]."</font></td>";
            echo "<td><font face=\"verdana\">".$fila["stock_Minimo"]."</font></td>";
            echo "<td><button type='button' class='btn btn-primary' onclick='getVistaEdicion(".$fila["id_Producto"].");'><img src='imagenes/delete-edit/edit2.png' style= heigth:2em style='height:2em;'/> </button>";
            echo "<div><button type='button' class='btn btn-primary' onclick='borrarProducto(".$fila["id_Producto"].");'><img src='imagenes/delete-edit/delete.png' style= heigth:2em style='height:2em; width:2em;'/></button></td></div></tr>";
        }
    }
?>
</table>
