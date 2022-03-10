<?php
require_once 'modelos/DAO.php';

class M_Formacion
{
    private $DAO;

    public function __construct()
    {
        $this->DAO = new DAO();
    }
    public function insertar()
    {
        $SQL = "INSERT INTO formacion (fecha, entidad, descripcion, nro_horas, nombre_curso) 
        VALUES('$_POST[f_fecha]', '$_POST[f_entidad]', '$_POST[f_descripcion]', '$_POST[f_nro_horas]', '$_POST[f_nombre_curso]')";
        $res = $this->DAO->insertar($SQL);
        return $res;
    }
    public function actualizar($filtros = array())
    {
        $f_id_formacion = '';
        $f_fecha = '';
        $f_entidad = '';
        $f_descripcion = '';
        $f_nro_horas = '';
        $f_nombre_curso = '';
        extract($filtros);

        $SQL = "UPDATE formacion SET ";

        if ($f_fecha != '') {
            $SQL .= " fecha = '$f_fecha',";
        }
        if ($f_entidad != '') {
            $SQL .= " entidad = '$f_entidad',";
        }
        if ($f_descripcion != '') {
            $SQL .= " descripcion = '$f_descripcion',";
        }
        if ($f_nro_horas != '') {
            $SQL .= " nro_horas = '$f_nro_horas',";
        }
        if ($f_nombre_curso != '') {
            $SQL .= " nombre_curso = '$f_nombre_curso'";
        }

        $SQL .= " WHERE id_formacion = '$f_id_formacion';";

        $res = $this->DAO->editar($SQL);
        return $res;
    }


    public function buscarCategoria()
    {
        $SQL = "SELECT id_ProductoCategoria, productoCategoria FROM productoscategorias WHERE 1=1";
        $res = $this->DAO->consultar($SQL);
        return $res;
    }

    public function buscar($filtros = array())
    {
        $texto = '';;
        $datos = '';

        extract($filtros);

        $SQL = "SELECT * FROM formacion WHERE 1=1 ";
        //$SQL="SELECT id_ProductoCategoria, productoCategoria FROM productoscategorias WHERE 1=1";

        if ($datos != '') {
            $SQL .= " AND id_formacion ='$datos' ";
            $SQL .= " AND fecha ='$datos' ";
            $SQL .= " AND entidad ='$datos' ";
            $SQL .= " AND descripcion ='$datos' ";
            $SQL .= " AND nro_horas ='$datos' ";
            $SQL .= " AND nombre_curso ='$datos' ";
            return $res;
        }
        if ($texto != '') {
            // $SQL.=" AND producto LIKE '%$texto%'";
            $lista = explode(' ', $texto);

            $SQL .= " AND(1=2 ";
            foreach ($lista as $palabra) {
                $SQL .= " || nombre_curso LIKE '%$palabra%'  
                          || descripcion LIKE '%$palabra%' ";  

            }
            $SQL .= " ) ";
        }

        $res = $this->DAO->consultar($SQL);
        return $res;
    }
}
