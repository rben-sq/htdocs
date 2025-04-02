<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="crud.css" rel="stylesheet" type="text/css">
    <title>Editar Peli</title>
</head>

<body>
    <div class="container text center">
    <div class="text-center">
			<img src="imagenes/nefli.png">
		</div>

        <?php
        include_once("config.php");

        // Verifica si se ha enviado el formulario de actualización
        if(isset($_POST['update']))
        {   
            // Obtén los datos del formulario
            $id = intval($_POST['id']);
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

            // ... Validación de archivo y otros campos (código existente)

            if(empty($titulo) || empty($director) || empty($fecha)|| empty($duracion)|| empty($poster)) {
                // Código de manejo de errores
            } else { 
                // Consulta de actualización preparada para prevenir la inyección de SQL
                $stmt = $mysqli->prepare("UPDATE $tabla SET poster=?, titulo=?, director=?, fecha=?, duracion=? WHERE id=?");
                $stmt->bind_param("sssssi", $poster, $titulo, $director, $fecha, $duracion, $id);
                $stmt->execute();
                $stmt->close();

                // Manejo de errores y redirección
                if ($result) {
                    echo "<div class=\"alert alert-success\">Película actualizada correctamente.</div>";
                } else {
                    echo "<div class=\"alert alert-success\">Película actualizada correctamente.</div>";
                }
            }
        }

        // Obtén el ID de la película a editar
        $id = intval($_GET['id']);

        // Consulta para obtener los datos de la película a editar
        $result = mysqli_query($mysqli, "SELECT * FROM $tabla WHERE id=$id");

        while($res = mysqli_fetch_array($result))
        {
            $poster = $res['poster'];
            $titulo = $res['titulo'];
            $director = $res['director'];
            $fecha = $res['fecha'];
            $duracion = $res['duracion'];
        }
        ?>

        

        <form class="text-center" action="edit.php" method="post" name="form1" enctype="multipart/form-data">
        <a id="vol" class="btn btn-primary" href="crud.php">Volver</a>
            <!-- Campos del formulario -->
            <div class="form-group">
                <label for="poster">Poster</label>
                <input type="file" id="poster" name="poster" class="form-control" accept=".jpg, .jpeg, .png, .webp">
            </div>

            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" id="titulo" name="titulo" class="form-control"  value="<?php echo $titulo; ?>">
            </div>

            <div class="form-group">   
                <label for="director">Director</label>
                <input type="text" id="director" name="director" class="form-control" value="<?php echo $director; ?>">
            </div>

            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="text" id="fecha" name="fecha" class="form-control" value="<?php echo $fecha; ?>">
            </div>

            <div class="form-group">
                <label for="duracion">Duración</label>
                <input type="text" id="duracion" name="duracion" class="form-control" value="<?php echo $duracion; ?>">
            </div>

            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button class="btn btn-primary" type="submit" name="update">Modificar</button>

        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>