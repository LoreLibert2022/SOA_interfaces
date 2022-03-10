function buscar(page, cant){
    var parametros='&controlador=Productos';
    parametros+='&metodo=buscar';
    parametros+='&page=' + page;
    parametros+='&cant=' + cant;
    parametros+='&' +$('#formularioBuscar').serialize();
    $('#capaResultadosBusqueda').show();
    //hago una peticion desde el navegador al servidor con el fichero ajax(intermediario)
    $.ajax({
        url:'C_Ajax.php',
        type: 'post',
        data: parametros,
        //le digo que tiene que hacer cuando me devuelva lo que le pedí y lo pongo en la variable vista 
        success: function(vista){
            $('#capaResultadosBusqueda').html(vista);

        }//vinculo el fichero en index.php
    })
}

function nuevo(){
    var parametros='&controlador=Productos';
    parametros+='&metodo=nuevo';
    parametros+='&' +$('#formularioNuevoProducto').serialize();
    //hago una peticion desde el navegador al servidor con el fichero ajax(intermediario)
    $.ajax({
        url:'C_Ajax.php',
        type: 'post',
        data: parametros,
        //le digo que tiene que hacer cuando me devuelva lo que le pedí y lo pongo en la variable vista 
        success: function(vista){
            $('#capaNuevoProducto').html(vista);

        }//vinculo el fichero en index.php
    })
}

function guardar(){
    if (validarGuardar()){
        var parametros='&controlador=Productos';
        parametros+='&metodo=guardar';
        parametros+='&' +$('#formularioNuevoProducto').serialize();
        //hago una peticion desde el navegador al servidor con el fichero ajax(intermediario)
        $.ajax({
            url:'C_Ajax.php',
            type: 'post',
            data: parametros,
            //le digo que tiene que hacer cuando me devuelva lo que le pedí y lo pongo en la variable vista 
            success: function($respuesta){
                if($respuesta=="REPETIDO")
                {
                    alert("Producto ya existe");

                }else{
                    alert("Producto agregado");

                }  
                $('#formularioNuevoProducto').hide();
                $('#capaNuevoProducto').html("");                    
            }//vinculo el fichero en index.php        
        })
    }
}

function validarGuardar(){
    $('.inputRed').removeClass('inputRed');              
    if( $('#producto').val()=='' ){
        $('#producto').addClass('inputRed');
    }if( $('#id_Categoria').val()=='' ){
        $('#id_Categoria').addClass('inputRed');
    
    }else{
        return confirm('Está seguro que desea realizar el cambio.');}
    
    if($('.inputRed').length==0){
        $('#msj').html('');
        $('#formularioNuevoProducto').submit();
    }else{
        $('#msj').html('Debe rellenar los campos')
    }
}

function getVistaEdicion(id){
    var parametros='&controlador=Productos';
    parametros+='&metodo=getVistaEdicion';
    parametros+='&id=' + id;
    parametros+='&' +$('#formularioNuevoProducto').serialize();
    //hago una peticion desde el navegador al servidor con el fichero ajax(intermediario)
    $.ajax({
        url:'C_Ajax.php',
        type: 'post',
        data: parametros,
        //le digo que tiene que hacer cuando me devuelva lo que le pedí y lo pongo en la variable vista 
        success: function(vista){
            $('#capaResultadosBusqueda').hide();
            $('#capaEdicion').html(vista);
        }//vinculo el fichero en index.php
    })
}

function modificarActivo(idproducto, activo){
    var parametros='&controlador=Productos';
    parametros+='&metodo=modificarActivo';
    parametros+='&idProducto=' + idproducto;
    parametros+='&factivo=' + activo;
    parametros+='&' +$('#formularioBuscar').serialize();
    //hago una peticion desde el navegador al servidor con el fichero ajax(intermediario)
    $.ajax({
        url:'C_Ajax.php',
        type: 'post',
        data: parametros,
        //le digo que tiene que hacer cuando me devuelva lo que le pedí y lo pongo en la variable vista 
        success: function($respuesta){
            confirm('Está seguro que desea realizar el cambio?' + $respuesta);
        }
    })
}

function borrarProducto(idproducto, activo){
    var parametros='&controlador=Productos';
    parametros+='&metodo=borrarProducto';
    parametros+='&idProducto=' + idproducto;
    parametros+='&factivo=' + activo;
    parametros+='&' +$('#formularioBuscar').serialize();
    //hago una peticion desde el navegador al servidor con el fichero ajax(intermediario)
    $.ajax({
        url:'C_Ajax.php',
        type: 'post',
        data: parametros,
        //le digo que tiene que hacer cuando me devuelva lo que le pedí y lo pongo en la variable vista 
        success: function($respuesta){
            confirm('Está seguro que desea realizar borrar?' + $respuesta);
        }
    })
}

function cancelar(){
    $('#formularioNuevoProducto').hide();
}

function limpiar(){
    $('#capaResultadosBusqueda').hide();
}