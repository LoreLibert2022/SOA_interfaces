<?php

$id_Actividad='';
$tipo_actividad='';
$fecha=date('Y-m-d');
$lugar='';
$duracion='';
$descripcion='';
$nombre_organizador='';
$observaciones='';
$homologado='';

extract($datos);
// $CV=md5(session_id().$id_Actividad); //codigo para verificar que no se ha cambiado el id


$operacion='NUEVA';
if($id_Actividad!=''){
	$operacion='MODIFICANDO';
}
?>
	
	<div class="row">
		<div class="col-lg-12">
			<b><span id="operacion"><?php echo $operacion; ?></span> ACTIVIDAD</b>
		</div>
	</div>
	<form role="form" id="formularioEdicion" name="formularioEdicion">
		<div class="row">
			<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<input type="hidden" id="id_Actividad" name="id_Actividad" value="<?php echo $id_Actividad; ?>"/>
				<label for="tipo_actividad" >Tipo de actividad:</label><br>
				<input type="text" id="tipo_actividad" name="tipo_actividad" 
					class="form-control" placeholder="Tipo actividad"  value="<?php echo $tipo_actividad; ?>"/>
			</div>
            <div class="form-group col-lg-4 col-md-4 d-none d-sm-block">
                <label for="fecha" >Fecha:</label><br>
				<input type="date" id="fecha" name="fecha" onblur="resetErrores('fecha');"
					class="form-control" placeholder="Fecha"  value="<?php echo $fecha; ?>"/>
			</div>
            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<label for="lugar" >Lugar:</label><br>
				<input type="text" id="lugar" name="lugar" 
					class="form-control" placeholder="lugar"  value="<?php echo $lugar; ?>"/>
			</div>
			<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<label for="duracion" >Duración:</label><br>
				<input type="text" id="duracion" name="duracion" 
					class="form-control" placeholder="duracion"  value="<?php echo $duracion; ?>"/>
			</div>
            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<label for="descripcion" >Descripción:</label><br>
				<input type="text" id="descripcion" name="descripcion" 
					class="form-control" placeholder="descripcion"  value="<?php echo $descripcion; ?>"/>
			</div>
            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<label for="nombre_organizador" >Nombre del organizador:</label><br>
				<input type="text" id="nombre_organizador" name="nombre_organizador" 
					class="form-control" placeholder="nombre_organizador"  value="<?php echo $nombre_organizador; ?>"/>
			</div>
            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<label for="observaciones" >Observaciones:</label><br>
				<input type="text" id="observaciones" name="observaciones" 
					class="form-control" placeholder="observaciones"  value="<?php echo $observaciones; ?>"/>
			</div>
            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<label for="homologado" >Homologado:</label><br>
				<input type="checkbox" id="homologado" name="homologado" value="<?php echo $homologado; ?>"/>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<button type="button" onclick="noGuardar();" class="btn">Cancelar</button>
				<button type="button" onclick="guardar();" class="btn btn-success">Guardar</button>
				<span id="mensaje" name="mensaje" style="color:blue;padding-left:1em;"></span>
			</div>
		</div>
	</form>
