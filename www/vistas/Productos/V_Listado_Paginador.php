<?php
    $page = false;
    $num_total_rows = $datos['num_total_rows'];
    $cant_lineas = $_POST["cant"];
//echo json_encode($datos);
echo '<div> Registros encontrados: '.$num_total_rows.'</div>';
echo '<div> <ul class="pagination">';

//calculo el total de paginas
$total_pages = ceil($num_total_rows / $cant_lineas);

if ($total_pages > 1) {
    if ($_POST["page"] != 1) {
        echo '<li class="page-item"><a class="page-link" onclick="buscar('.(1).', '.($_POST["cant"]).')"><span aria-hidden="true">Primera</span></a></li>';
        echo '<li class="page-item"><a class="page-link" onclick="buscar('.($_POST["page"]-1).', '.($_POST["cant"]).')"><span aria-hidden="true">Anterior</span></a></li>';
    }

    for ($i=1;$i<=$total_pages;$i++) {
        if ($_POST["page"] == $i) {
            echo '<li class="page-item active"><a class="page-link" onclick="buscar('.$i.', '.($_POST["cant"]).')">'.$i.'</a></li>';
        } else {
            echo '<li class="page-item"><a class="page-link" onclick="buscar('.$i.', '.($_POST["cant"]).')"; >'.$i.'</a></li>';
        }
    }

    if ($_POST["page"] != $total_pages) {
        echo '<li class="page-item"><a class="page-link" onclick="buscar('.($_POST["page"] + 1).', '.($_POST["cant"]).')"><span aria-hidden="true">Siguiente</span></a></li>';
        echo '<li class="page-item"><a class="page-link" onclick="buscar('.($total_pages).', '.($_POST["cant"]).')"><span aria-hidden="true">Última</span></a></li>';
    }
}
echo '</div></ul>

<div class="content-select col-lg-4 col-md-6 col-xs-12">
<label for="items_por_pagina">Elementos por pagina:</label>
<select name="items_por_pagina" id="items_por_pagina" class="selector" onChange="buscar('.(1).', items_por_pagina.value)">';
    for ($i = 10; $i <= 30; $i = $i + 10){
        if ($i == $_POST["cant"])
            echo '<option selected value="'.($i).'">'.($i).'</option>';
        else echo '<option value="'.($i).'">'.($i).'</option>';
    }

echo '</select>
<i></i>
</div></div>';
?>