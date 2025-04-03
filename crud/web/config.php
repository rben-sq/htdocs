<?php
$servidor = 'mariadb';
$basedatos = 'nefli';
$tabla = 'peliculas';
$usuario = 'root';
$contrasena = 'root';

$mysqli = new mysqli($servidor, $usuario, $contrasena, $basedatos); 

if ($mysqli->connect_error) {
    die('Error de Conexión (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}
 
?>
