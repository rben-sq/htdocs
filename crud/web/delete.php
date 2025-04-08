<?php

include("config.php");


$id = $_GET['id'];

$result = mysqli_query($mysqli, "SELECT poster FROM $tabla WHERE id=$id");
$filename = mysqli_fetch_array($result);
// echo("<script>console.log('PHP: $filename[0]');</script>"); // si descomentas esto el header() no funciona

unlink("subidacrud/$filename[0]");
$result = mysqli_query($mysqli, "DELETE FROM $tabla WHERE id=$id");
header("Location: crud.php");
?>

