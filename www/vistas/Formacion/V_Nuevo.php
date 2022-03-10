<script src="js/Formacion.js"></script>
<?php
$msj = '';
?>
<span id="msj" style="color:brown;"><?= $msj; ?></span>
<h1 align="center">AÑADIR FORMACION</h1>
<form id="formularioInsertar" name="formularioInsertar">
  <div class="form-group">
    <label for="inputCurso">Nombre del curso</label>
    <input type="text" class="form-control" name="f_nombre_curso" id="f_nombre_curso">
  </div>
  <div class="form-row">
    <label for="inputEntidad" area->Entidad</label>
    <input type="text" class="form-control" id="f_entidad" name="f_entidad">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputDescripcion">Descripcion</label>
      <input type="text" class="form-control" id="f_descripcion" name="f_descripcion">
    </div>
      <div class="form-group col-md-6">
        <label for="inputNro_horas">Número de horas</label>
        <input type="number" class="form-control" id="f_nro_horas" name="f_nro_horas">
      </div>
      <div class="form-group col-md-6">
        <label for="inputFecha">Fecha</label>
        <input type="date" class="form-control" id="f_fecha" name="f_fecha">
      </div>
      

    </div>
    <div class="form-group">
    </div>
    <br>
    <button type="button" class="btn btn-primary" value="Enviar" onclick="insertar();">✔ Añadir</button>
    <button type="button" class="btn btn-primary" onclick="getVista('Formacion','getVistaFiltros');">✘ Cancelar</button>
</form>