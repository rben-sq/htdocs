<?php

include("config.php");


$id = $_GET['id'];

$result = mysqli_query($mysqli, "DELETE FROM $tabla WHERE id=$id");
$filename = $_GET['poster'];
unlink("subidacrud/".$filename);
header("Location:crud.php");
?>

