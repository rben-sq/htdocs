<?php
header("Content-Type: application/json"); // Indica que la respuesta es JSON
header("Access-Control-Allow-Origin: *"); // Permite acceso desde cualquier origen

if (isset($_GET["numero"])) {
    $numero = intval($_GET["numero"]); // Convierte el parámetro a un número entero
    $resultado = ($numero % 2 === 0) ? "par" : "impar";

    echo json_encode(["numero" => $numero, "resultado" => $resultado]);
} 
?>