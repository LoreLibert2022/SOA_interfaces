
<link rel="stylesheet" href="js/jquery-ui-1.12.1.custom/jquery-ui.css" type="text/css" />
<script type="text/javascript" src="js/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="js/Usuarios.js" ></script>
<b style="font-size:2em;">Usuarios</b>
<form role="form" id="formularioBuscar" name="formularioBuscar">
	<div id="capaBusqueda" class="container-fluid">
	
		<div class="row">
			<div class="form-group col-lg-6 col-md-4 col-sm-6 col-xs-12">
				<label for="texto" >Nombre/login:</label><br>
				<input type="text" id="texto" name="texto" class="form-control" placeholder="texto a buscar"  value=""/>
			</div>
			
			<div class="form-group col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<label for="estado" >Estado:</label>
				<select id="estado" name="estado" class="form-control">
					<option value="">Activos y No Activos</option>
					<option value="S">Activos</option>
					<option value="N">Inactivos</option>
				</select>
			</div>    	
		
			<div class="col-lg-3 col-md-4 col-sm-12 col-sx-12 text-right"><br>
				<button type="button" class="btn btn-primary" onclick="buscar('1');">Buscar</button> 
				<button type="button" class="btn btn-secondary" onclick="editarNuevo('');">Nuevo</button>

			</div>
		</div>
	
	</div>
	<div id="capaResultadosBusqueda" class="container-fluid" >

	</div>
</form>
<div id="capaEdicionNuevo" class="container-fluid">

</div>
