<br>
<table class="table table-sm table-striped">
    <tr>
        <th>NOMBRE DEL CURSO</th>
        <th>ENTIDAD</th>
        <th>DESCRIPCIÓN</th>
        <th>NÚMERO DE HORAS</th>
        <th>FECHA</th>
    </tr>

    <?php
    // echo json_encode($datos);
    if (empty($datos)) {
        // No hay productos
        echo 'No se han encontrado productos.';
    } else
        // hay productos
        foreach ($datos as $ind => $fila) { ?>
        <tr>
            <td><?php echo $fila['nombre_curso'] ?></td>
            <td><?php echo $fila['entidad'] ?></td>
            <td><?php echo $fila['descripcion'] ?></td>
            <td><?php echo $fila['nro_horas'] ?></td>
            <td><?php echo $fila['fecha'] ?></td>
            <td><button type="button" class="bg-transparent border-0" onclick="getVistaEditar(<?php echo $fila['id_formacion'] ?>,
            '<?php echo $fila['nombre_curso'] ?>','<?php echo $fila['entidad'] ?>','<?php echo $fila['descripcion'] ?>','<?php echo $fila['nro_horas'] ?>','<?php echo $fila['fecha'] ?>')" ;>✎</td>

        <?php
        } ?>



        </tr>


</table>