<?php

?>
<script src="js/Formacion.js"></script>
<b style="font-size:2em;">Formacion</b><br>
<form role="form" id="formularioBuscar" name="formularioBuscar">
    <div id="div-busqueda" class="container">
        <div class="row">
            <div class="form-group col-lg-4 col-md-6 col-xs-12">
                <label for="texto">Curso/Descripcion</label>
                <input type="text" id="texto" name="texto" class="form-control" placeholder="Texto a buscar" value="" />

            </div>
        </div>
        
        

        
    </div>
</form>
<br>
<button type="button" class="btn btn-primary" onclick="buscar()">Buscar</button>
<button type="button" class="btn btn-primary" onclick="getVista('Formacion','getVistaNuevo');">Añadir</button>

<div id="capaResultadosBusqueda" class="container-fluid"></div>
<div id="capaPaginador" class="container-fluid"></div>
<div id="capaEdicion" class="container-fluid">

</div>