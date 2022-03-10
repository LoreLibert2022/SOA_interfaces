function buscar() {
    var parametros = "&controlador=Formacion";
    parametros += "&metodo=buscar";
    parametros += "&" + $("#formularioBuscar").serialize();
    $.ajax({
      url: "C_Ajax.php",
      type: "post",
      data: parametros,
      success: function (vista) {
        $("#capaResultadosBusqueda").html(vista);
        
      },
    });
  }
  
  function insertar() {
    $(".inputRed").removeClass("inputRed");
    if ($("#f_nombre_curso").val() == "") {
      $("#f_nombre_curso").addClass("inputRed");
    }
    if ($("#f_entidad").val() == "") {
      $("#f_entidad").addClass("inputRed");
    }
    // if ($("#f_id_Categoria").val() == "") {
    //   $("#f_id_Categoria").addClass("inputRed");
    // }
    if ($("#f_descripcion").val() == "") {
      $("#f_descripcion").addClass("inputRed");
    }
    if ($("#f_nro_horas").val() == "") {
      $("#f_nro_horas").addClass("inputRed");
    }
    if ($("#f_fecha").val() == "") {
      $("#f_fecha").addClass("inputRed");
    }

    if ($(".inputRed").length == 0) {
      $("#msj").html("");
      $("#formularioInsertar").submit();
  
      var parametros = "&controlador=Formacion";
      parametros += "&metodo=insertar";
      parametros += "&" + $("#formularioInsertar").serialize();
      $.ajax({
        url: "C_Ajax.php",
        type: "post",
        data: parametros,
        success: function (vista) {
          $("#capaContenido").html(vista);
        },
      });
    } else {
      $("#msj").html("Por favor rellene todos los campos");
    }
  }
  
  function actualizar() {
    $(".inputRed").removeClass("inputRed");
    if ($("#f_nombre_curso").val() == "") {
      $("#f_nombre_curso").addClass("inputRed");
    }
    if ($("#f_entidad").val() == "") {
      $("#f_entidad").addClass("inputRed");
    }
    // if ($("#f_id_Categoria").val() == "") {
    //   $("#f_id_Categoria").addClass("inputRed");
    // }
    if ($("#f_descripcion").val() == "") {
      $("#f_descripcion").addClass("inputRed");
    }
    if ($("#f_nro_horas").val() == "") {
      $("#f_nro_horas").addClass("inputRed");
    }
    if ($("#f_fecha").val() == "") {
      $("#f_fecha").addClass("inputRed");
    }
    
    if ($(".inputRed").length == 0) {
      $("#msj").html("");
      $("#formularioActualizar").submit();
  
      var parametros = "&controlador=Formacion";
      parametros += "&metodo=actualizar";
      parametros += "&" + $("#formularioActualizar").serialize();
      $.ajax({
        url: "C_Ajax.php",
        type: "post",
        data: parametros,
        success: function (vista) {
          $("#capaContenido").html(vista);
        },
      });
    } else {
      $("#msj").html("Por favor rellene todos los campos");
    }
  }
  
  function getVistaEditar(
    id_formacion,
    nombre_curso,
    entidad,
    descripcion,
    nro_horas,
    fecha
  ) {
    var parametros = "&controlador=Formacion";
    parametros += "&metodo=getVistaEditar";
    parametros += "&id_formacion=" + id_formacion;
    parametros += "&nombre_curso=" + nombre_curso;
    parametros += "&entidad=" + entidad;
    parametros += "&descripcion=" + descripcion;
    parametros += "&nro_horas=" + nro_horas;
    parametros += "&fecha=" + fecha;
    $.ajax({
      url: "C_Ajax.php",
      type: "post",
      data: parametros,
      success: function (vista) {
        $("#capaEdicion").html(vista);
      },
    });
  }
  