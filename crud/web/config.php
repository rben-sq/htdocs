<?php
$servidor = 'localhost:3306';
$basedatos = 'nefli';
$tabla = 'peliculas';
$usuario = 'root';
$contrasena = 'root';

$mysqli = mysqli_connect($servidor, $usuario, $contrasena, $basedatos); 

if ($mysqli->connect_error) {
    die('Error de Conexión (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}
 
?>
