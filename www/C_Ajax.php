<?php session_start();
header("Content-Type: text/html;charset=utf-8");
//creo una variable que me recoja cualquier parametro (desde cualquier lado y de cualquier formato
//y las guardo en un array para que estén todas juntas
$getPost=array_merge($_POST, $_GET, $_FILES);


$controlador=$_POST['controlador'];
$metodo=$_POST['metodo'];

$nombreControlador='C_'.$controlador;
//crear el objeto de este controlador
require_once 'controladores/'.$nombreControlador.'.php';
//creo el objeto de ese controlador
$objControlador= new $nombreControlador();
//ejecuto el metodo del objeto controlador
$objControlador->$metodo($getPost);
?>