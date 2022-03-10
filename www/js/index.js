function getVista(controlador, metodo){
    var parametros='&controlador='+controlador;
    parametros+='&metodo='+metodo;
    //hago una peticion desde el navegador al servidor con el fichero ajax(intermediario)
    $.ajax({
        url:'C_Ajax.php',
        type: 'post',
        data: parametros,
        //le digo que tiene que hacer cuando me devuelva lo que le pedí y lo pongo en la variable vista 
        success: function(vista){
            $('#capaContenido').html(vista);
        }//vinculo el fichero en index.php
    })

}