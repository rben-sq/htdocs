<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="crud.css" rel="stylesheet" type="text/css" >
	<title>Añadir Peli</title>
</head>

<body>
	<div class="container">
		
		<?php
		include_once("config.php");
		
		if(isset($_POST['Submit'])) {	
			$poster = mysqli_real_escape_string($mysqli, $_FILES['poster']['name']);
			$titulo = mysqli_real_escape_string($mysqli, $_POST['titulo']);
			$director = mysqli_real_escape_string($mysqli, $_POST['director']);
			$fecha = mysqli_real_escape_string($mysqli, $_POST['fecha']);
			$duracion = mysqli_real_escape_string($mysqli, $_POST['duracion']);
			$carpetaSubida = "subidacrud/";
			$max_file_size = 5000000;
			$allowed_extensions = array(".jpg","jpeg",".png",".webp");
			if(isset($_FILES['poster'])){
				$errores = 0;
				$nombreArchivo = $_FILES['poster']['name'];
				$filesize = $_FILES['poster']['size'];
				$directorioTemp = $_FILES['poster']['tmp_name'];
				$extension = strtolower(substr($poster, -4));
				if(!in_array($extension,$allowed_extensions)){
					echo "<script>alert('Formato inválido. Permitidos: jpg / jpeg/ png /webp');</script>";
					$errores = 1;
				}
				if($filesize > $max_file_size){
					echo "<script>alert('El poster debe pesar como máximo 500Mb');</script>";
					$errores = 1;
				}
				if($errores == 0){
					$nombreCompleto = $carpetaSubida.$nombreArchivo;
					move_uploaded_file($directorioTemp,$nombreCompleto);
				}
			
			}

			if(empty($titulo) || empty($director) || empty($fecha)|| empty($duracion)|| empty($poster)) {
						
				if(empty($titulo)) {
					echo "<div class=\"alert alert-danger\" role=\"alert\">Título vacío</div>";
				}
				
				if(empty($director)) {
					echo "<div class=\"alert alert-danger\" role=\"alert\">Director vacío.</div>";
				}
				
				if(empty($fecha)) {
					echo "<div class=\"alert alert-danger\" role=\"alert\">Fecha vacía.</div>";
				}
				if(empty($duracion)) {
					echo "<div class=\"alert alert-danger\" role=\"alert\">Duración vacía.</div>";
				}
				echo "<a class=\"btn btn-primary\" href='javascript:self.history.back();'>Volver</a>";
			} else { 
				$result = mysqli_query($mysqli, "INSERT INTO $tabla(poster,titulo,director,fecha,duracion) VALUES('$nombreArchivo','$titulo','$director','$fecha','$duracion')");
			
				echo "<div class=\"alert alert-success\">Película añadida correctamente.</div>";
				echo "<a class=\"btn btn-primary\" href='crud.php'>Listado de películas</a>";
				echo "<a class=\"btn btn-primary\" id='boton-iz' href='add.php'>Seguir añadiendo</a>";
			}
		}
		?>
		
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
