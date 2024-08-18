<?php
$conexion = mysqli_connect("localhost","root","","libros");

//!Comprobar conexion
if(!$conexion){
    die("Conexion Fallida". mysqli_connect_error());
}
?>