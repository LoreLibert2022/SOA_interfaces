<script src="js/Formacion.js"></script>
<?php
$msj = '';
?>
<span id="msj" style="color:brown;"><?= $msj; ?></span>
<h1 align="center">EDICION DE FORMACION</h1>
<form id="formularioActualizar" name="formularioActualizar">
  <div class="form-group">
    <label for="inputCurso">ID de la Formación</label>
    <input type="text" class="form-control" readonly name="f_id_formacion" id="f_id_formacion" value="<?php echo ($_POST['id_formacion']); ?>">
  </div>
  <div class="form-group">
    <label for="inputCurso">Nombre del curso</label>
    <input type="text" class="form-control" name="f_nombre_curso" id="f_nombre_curso" value="<?php echo ($_POST['nombre_curso']); ?>">
  </div>
  <div class="form-row">
    <label for="inputEntidad">Entidad</label>
    <input type="text" class="form-control" id="f_entidad" name="f_entidad" value="<?php echo ($_POST['entidad']); ?>">
  </div>
  
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputDescripcion">Descripción</label>
      <input type="text" class="form-control" id="f_descripcion" name="f_descripcion" value="<?php echo ($_POST['descripcion']); ?>">
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputNro_horas">Número de horas</label>
        <input type="number" class="form-control" id="f_nro_horas" name="f_nro_horas" value="<?php echo ($_POST['nro_horas']); ?>">
      </div>
      <div class="form-group col-md-6">
        <label for="inputFecha">Fecha</label>
        <input type="date" class="form-control" id="f_fecha" name="f_fecha" value="<?php echo ($_POST['fecha']); ?>">
      </div>
      

    </div>
    <div class="form-group">
    </div>
    <br>
    <button type="button" class="btn btn-primary" onclick="actualizar();">✔ Editar</button>
    <button type="button" class="btn btn-primary" onclick="getVista('Formacion','getVistaFiltros');">✘ Cancelar</button>
</form>