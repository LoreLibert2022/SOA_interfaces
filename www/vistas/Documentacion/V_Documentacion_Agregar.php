<script src="js/Voluntarios.js"></script>
<?php
echo $datos;
?>
<span id="msj" style="color:brown;"><?= $msj; ?></span>
<h1 align="center">AÑADIR DOCUMENTACION</h1>
<form id="formularioAgregarDoc" name="formularioAgregarDoc">
  <div class="form-group">
    <label for="Descripcion">Documento</label>
    <input type="text" class="form-control" name="f_descripcion" id="f_descripcion">
  </div>
</form>