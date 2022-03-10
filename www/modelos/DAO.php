<?php
    define('HOST', 'localhost');
    define('USER','root');
    define('PASS','');
    define('DB','di21');

    class DAO{
        private $conexion;

        public function __construct()
        { //__construct() //constructor
            $this->conexion= new mysqli(HOST, USER, PASS, DB);
            if($this->conexion->connect_errno){
                die('Error de conexion a BD: '.$this->conexion->connect_error);
            }
            
        }
        //creo la funcion que devuelve datos
        public function consultar($SQL){
            $res=$this->conexion->query($SQL, MYSQLI_USE_RESULT);
            //lo que me devuelva lo pongo como filas
            $filas=array();
            //compruebo que no haya errores
            if($this->conexion->connect_errno){
                die('Error de consulta a BD: '.$SQL);
            }else{
                //agarro la siguiente fila con los nombres de campos incluidos
                while($reg=$res->fetch_assoc()){
                    $filas[]=$reg;
                }
            }
            //devuele las filas
            return $filas;
        }

        public function insertar($SQL){
            $res=$this->conexion->query($SQL, MYSQLI_USE_RESULT);
            if($this->conexion->connect_errno){
                die('Error de consulta a BD: '.$SQL);
                return '';
            }else{
                //devuelve el ultimo ID insertado
                return $this->conexion->insert_id;   
            }
        }

        public function borrar($SQL){
            $res=$this->conexion->query($SQL, MYSQLI_USE_RESULT);
            if($this->conexion->connect_errno){
                die('Error de consulta a BD: '.$SQL);
                return '';
            }else{
                //elimina el ID seleccionado
                return $this->conexion->affected_rows;   
            }
        }


        public function editar($SQL){
            $res=$this->conexion->query($SQL, MYSQLI_USE_RESULT);
            if($this->conexion->connect_errno){
                die('Error de consulta a BD: '.$SQL);
                return '';
            }else{
                return $this->conexion->affected_rows;
            }
        }
    }
?>