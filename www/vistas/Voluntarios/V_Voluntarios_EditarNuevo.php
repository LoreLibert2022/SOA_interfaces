<?php
//nombre, apellido_1, apellido_2, sexo, fechaAlta, mail, móvil, login, activo
$id_Voluntario='';
$nombre='';
$apellidos='';
$dni='';
$telefono_contacto='';
$telefono_emergencias='';
$fecha_nac=date('Y-m-d');
$direccion='';
$cp='';
$email='';
$foto='';
$fecha_inscrip_soa=date('Y-m-d');
$hobbies_otros_cursos='';
$usuario_instag='';
$usuario_faceb='';
$fecha_baja=date('Y-m-d');
$ocupacion='';
$tipo_voluntario='';
$caracteristicas_generales='';
extract($datos);
$CV=md5(session_id().$id_Voluntario); //codigo para verificar que no se ha cambiado el id


$operacion='NUEVO';
if($id_Voluntario!=''){
	$operacion='MODIFICANDO';
}
?>
	
	<div class="row">
		<div class="col-lg-12">
			<b><span id="operacion"><?php echo $operacion; ?></span> VOLUNTARIO</b>
		</div>
	</div>
	<form role="form" id="formularioEdicion" name="formularioEdicion">
		<div class="row">
			<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<input type="hidden" id="CV" name="CV" value="<?php echo $CV; ?>"/>
				<input type="hidden" id="id_Voluntario" name="id_Voluntario" value="<?php echo $id_Voluntario; ?>"/>
				<label for="nombre" >Nombre:</label><br>
				<input type="text" id="nombre" name="nombre" 
					class="form-control" placeholder="Nombre usuario"  value="<?php echo $nombre; ?>"/>
			</div>
			<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<label for="apellidos" >Apellidos:</label><br>
				<input type="text" id="apellidos" name="apellidos" 
					class="form-control" placeholder="Apellidos"  value="<?php echo $apellidos; ?>"/>
			</div>
			<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<label for="dni" >DNI:</label><br>
				<input type="text" id="dni" name="dni" 
					class="form-control" placeholder="DNI"  value="<?php echo $dni; ?>"/>
			</div>
			<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<label for="telefono_contacto" >telefono_contacto:</label><br>
				<input type="text" id="telefono_contacto" name="telefono_contacto" 
					class="form-control" placeholder="telefono_contacto"  value="<?php echo $telefono_contacto; ?>"/>
			</div>
			<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<label for="telefono_emergencias" >telefono_emergencias:</label><br>
				<input type="text" id="telefono_emergencias" name="telefono_emergencias" 
					class="form-control" placeholder="telefono_emergencias"  value="<?php echo $telefono_emergencias; ?>"/>
			</div>
			<div class="form-group col-lg-4 col-md-4 d-none d-sm-block">
                <label for="fecha_nac" >Fecha Nacimiento:</label><br>
				<input type="date" id="fecha_nac" name="fecha_nac" onblur="resetErrores('fecha_nac');"
					class="form-control" placeholder="Fecha Nacimiento"  value="<?php echo $fecha_nac; ?>"/>
			</div>
			<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<label for="direccion" >Direccion:</label><br>
				<input type="text" id="direccion" name="direccion" 
					class="form-control" placeholder="direccion"  value="<?php echo $direccion; ?>"/>
			</div>
			<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<label for="cp" >CP:</label><br>
				<input type="text" id="cp" name="cp" 
					class="form-control" placeholder="CP"  value="<?php echo $cp; ?>"/>
			</div>
			<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<label for="email" >Correo electrónico:</label>
				<span class="msj msjRed" name="msjmail" id="msjmail"></span><br>
				<input type="text" id="email" name="email" 
					class="form-control" placeholder="correo electrónico"  value="<?php echo $email; ?>"/>
			</div>
			<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<label for="foto" >foto:</label><br>
				<input type="text" id="foto" name="foto" 
					class="form-control" placeholder="foto"  value="<?php echo $foto; ?>"/>
			</div>
			<div class="form-group col-lg-4 col-md-4 d-none d-sm-block">
                <label for="fecha_inscrip_soa" >Fecha Inscripcion:</label><br>
				<input type="date" id="fecha_inscrip_soa" name="fecha_inscrip_soa" onblur="resetErrores('fecha_inscrip_soa');"
					class="form-control" placeholder="Fecha Inscripcion"  value="<?php echo $fecha_inscrip_soa; ?>"/>
			</div>
			<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<label for="hobbies_otros_cursos" >hobbies_otros_cursos:</label><br>
				<input type="text" id="hobbies_otros_cursos" name="hobbies_otros_cursos" 
					class="form-control" placeholder="hobbies_otros_cursos"  value="<?php echo $hobbies_otros_cursos; ?>"/>
			</div>
			<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<label for="usuario_instag" >usuario_instag:</label><br>
				<input type="text" id="usuario_instag" name="usuario_instag" 
					class="form-control" placeholder="usuario_instag"  value="<?php echo $usuario_instag; ?>"/>
			</div>
			<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<label for="usuario_faceb" >usuario_faceb:</label><br>
				<input type="text" id="usuario_faceb" name="usuario_faceb" 
					class="form-control" placeholder="usuario_faceb"  value="<?php echo $usuario_faceb; ?>"/>
			</div>
			<div class="form-group col-lg-4 col-md-4 d-none d-sm-block">
                <label for="fecha_baja" >Fecha Baja:</label><br>
				<input type="date" id="fecha_baja" name="fecha_baja" onblur="resetErrores('fecha_baja');"
					class="form-control" placeholder="Fecha Baja"  value="<?php echo $fecha_baja; ?>"/>
			</div>
			<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<label for="ocupacion" >ocupacion:</label><br>
				<input type="text" id="ocupacion" name="ocupacion" 
					class="form-control" placeholder="ocupacion"  value="<?php echo $ocupacion; ?>"/>
			</div>
			<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<label for="tipo_voluntario" >tipo_voluntario:</label><br>
				<input type="text" id="tipo_voluntario" name="tipo_voluntario" 
					class="form-control" placeholder="tipo_voluntario"  value="<?php echo $tipo_voluntario; ?>"/>
			</div>
			<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<label for="caracteristicas_generales" >caracteristicas_generales:</label><br>
				<input type="text" id="caracteristicas_generales" name="caracteristicas_generales" 
					class="form-control" placeholder="caracteristicas_generales"  value="<?php echo $caracteristicas_generales; ?>"/>
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

