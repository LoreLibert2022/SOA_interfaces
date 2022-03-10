<?php
//nombre, apellido_1, apellido_2, sexo, fechaAlta, mail, móvil, login, activo
$id_Usuario='';
$nombre='';
$apellido_1='';
$apellido_2='';
$sexo='';
$fecha_Alta='';
$mail='';
$movil='';
$login='';
$activo='S';
extract($datos);
$CV=md5(session_id().$id_Usuario); //codigo para verificar que no se ha cambiado el id


$operacion='NUEVO';
if($id_Usuario!=''){
	$operacion='MODIFICANDO';
}
?>
	
	<div class="row">
		<div class="col-lg-12">
			<b><span id="operacion"><?php echo $operacion; ?></span> USUARIO</b>
		</div>
	</div>
	<form role="form" id="formularioEdicion" name="formularioEdicion">
		<div class="row">
			<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<input type="hidden" id="CV" name="CV" value="<?php echo $CV; ?>"/>
				<input type="hidden" id="id_Usuario" name="id_Usuario" value="<?php echo $id_Usuario; ?>"/>
				<label for="nombre" >Nombre:</label><br>
				<input type="text" id="nombre" name="nombre" 
					class="form-control" placeholder="Nombre usuario"  value="<?php echo $nombre; ?>"/>
			</div>
			<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<label for="apellido_1" >Primer Apellido:</label><br>
				<input type="text" id="apellido_1" name="apellido_1" 
					class="form-control" placeholder="Primer Apellido"  value="<?php echo $apellido_1; ?>"/>
			</div>
			<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<label for="apellido_1" >Segundo Apellido:</label><br>
				<input type="text" id="apellido_2" name="apellido_2" 
					class="form-control" placeholder="Segundo Apellido"  value="<?php echo $apellido_2; ?>"/>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<label for="sexo" >Sexo:</label><br>
                <select id="sexo" name="sexo" class="form-control">
                    <option value="" selected></option>
                    <option value="H" <?php if($sexo=='H') echo 'selected'; ?>>Hombre</option>
                    <option value="M" <?php if($sexo=='M') echo 'selected'; ?>>Mujer</option>
                </select>
			</div>
			<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<label for="mail" >Correo electrónico:</label>
				<span class="msj msjRed" name="msjmail" id="msjmail"></span><br>
				<input type="text" id="mail" name="mail" 
					class="form-control" placeholder="correo electrónico"  value="<?php echo $mail; ?>"/>
			</div>
			<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<label for="movil" >Teléfono móvil:</label><br>
				<input type="text" id="movil" name="movil" 
					class="form-control" placeholder="Teléfono móvil"  value="<?php echo $movil; ?>"/>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<label for="nombre" >Login:</label>
				<span class="msj msjRed" name="msjlogin" id="msjlogin"></span><br>
				<input type="text" id="login" name="login" onblur="resetErrores('login');"
					class="form-control" placeholder="Login usuario"  value="<?php echo $login; ?>"/>
			</div>
			<div class="form-group col-lg-4 col-md-4 d-none d-sm-block">
                <label for="fecha_Alta" >Fecha Alta:</label><br>
				<input type="date" id="fecha_Alta" name="fecha_Alta" onblur="resetErrores('fecha_Alta');"
					class="form-control" placeholder="Fecha Alta"  value="<?php echo $fecha_Alta; ?>"/>
			</div>
			<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<label for="activo" >Activo:</label>
				<select id="activo" name="activo" class="form-control">
					<option value="S" <?php if($activo=='S') echo 'selected'; ?> >Activo</option>
					<option value="N" <?php if($activo=='N') echo 'selected'; ?> >Inactivo</option>
				</select>
			</div>

		</div>
		<div class="row">
			<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<label for="pass" >Contrase&ntilde;a:</label><br>
				<input type="password" id="pass" name="pass" 
					class="form-control" placeholder="Contrase&ntilde;a" />
			</div>
			<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<label for="repass" >Repetir Contrase&ntilde;a:</label>
					<span class="msj msjRed" name="msjpass" id="msjpass"></span>
				<br>
				<input type="password" id="repass" name="repass"  
					class="form-control" placeholder="Repetir contrase&ntilde;a" />
			</div>
			<div class="form-group col-lg-4 col-md-4 d-none d-sm-block">
				
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

