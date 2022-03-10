<?php
//id_material y nombre del material
$id_material='';
$nombre='';

extract($datos);
$CV=md5(session_id().$id_material); //codigo para verificar que no se ha cambiado el id


$operacion='NUEVO';
if($id_material!=''){
	$operacion='MODIFICANDO';
}
?>
	
	<div class="row">
		<div class="col-lg-12">
			<b><span id="operacion"><?php echo $operacion; ?></span> MATERIAL</b>
		</div>
	</div>
	<form role="form" id="formularioEdicion" name="formularioEdicion">
		<div class="row">
			<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<input type="hidden" id="CV" name="CV" value="<?php echo $CV; ?>"/>
				<input type="hidden" id="id_material" name="id_material" value="<?php echo $id_material; ?>"/>
				<label for="nombre" >Nombre:</label><br>
				<input type="text" id="nombre" name="nombre" 
					class="form-control" placeholder="Nombre del material"  value="<?php echo $nombre; ?>"/>
			</div>
			
			
		<div class="row">
			<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<button type="button" onclick="noGuardar();" class="btn">Cancelar</button>
				<button type="button" onclick="guardar();" class="btn btn-success">Guardar</button>
				<span id="mensaje" name="mensaje" style="color:blue;padding-left:1em;"></span>
			</div>
		</div>
	</form>
