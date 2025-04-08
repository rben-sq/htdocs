<?php
include_once("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM $tabla ORDER BY id DESC");
?>

<html lang="es"><head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="crud.css" type="text/css" >
	<title>Nefli</title>
</head>

<body>
	<div class="container">
		<div class="text-center">
			<img src="imagenes/nefli.png">
		</div>
		<div class="table-responsive">
			<table class="table table-dark table-hover">
				<thead>
					<tr>
						<th id="celdaImg" scope="col">Poster</th>
						<th scope="col">Título</th>
						<th scope="col">Director</th>
						<th scope="col">Año</th>
						<th scope="col">Duración</th>
					</tr>
				</thead>
				<tbody>
				<?php
					while($res = mysqli_fetch_array($result)){ 
				?>
					<tr class="align-middle">
						<td id="celdaImg" scope="row"><?php echo '<img class="poster" src="subidacrud/'.$res['poster'].'">'; ?></td>
						<td><p><?php echo $res['titulo']; ?></p></td>
						<td><p><?php echo $res['director']; ?></p></td>
						<td><p><?php echo $res['fecha']; ?></p></td>
						<td><p><?php echo $res['duracion']; ?></p></td>
						<td id="celdaImg" class="botones"><p><?php echo "<a class=\"btn btn-light bnt-sm\" href=\"edit.php?id=$res[id]\">Editar</a> | <a class=\"btn btn-light bnt-sm\" href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Estás seguro?')\">Borrar</a>"?></p></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<div class="text-center">
			<a class="btn btn-danger" id="boton-add" href="add.html">Añadir película</a>
		</div>
	</div>
	 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body></html>