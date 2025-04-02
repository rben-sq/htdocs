<?php
session_start();

// Si el número secreto no está establecido, lo generamos.
if (!isset($_SESSION['numero_secreto'])) {
    $_SESSION['numero_secreto'] = rand(1, 10);
    $_SESSION['intentos'] = 0; // Inicializamos los intentos en 0
}

// Verificamos si el jugador ha enviado un intento.
$mensaje = '';
$acertado = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Aumentamos el contador de intentos
    $_SESSION['intentos']++;

    // Obtenemos el intento del jugador
    $intento = $_POST['intento'];

    // Comprobamos si el intento es correcto
    if ($intento == $_SESSION['numero_secreto']) {
        $acertado = true;
        $mensaje = "¡Felicidades! Has acertado el número secreto en " . $_SESSION['intentos'] . " intentos.";
    } elseif ($intento < $_SESSION['numero_secreto']) {
        $mensaje = "El número secreto es mayor que " . $intento . ". ¡Intenta de nuevo!";
    } else {
        $mensaje = "El número secreto es menor que " . $intento . ". ¡Intenta de nuevo!";
    }
}

// Si el jugador ha acertado, podemos reiniciar el juego.
if ($acertado) {
    unset($_SESSION['numero_secreto']);
    unset($_SESSION['intentos']);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego del Número Secreto</title>
</head>
<body>
    <div class="container">
        <h1>Juego del Número Secreto</h1>
        <p>Adivina el número secreto entre 1 y 10.</p>

        <?php if ($acertado): ?>
            <div class="success">
                <p><?php echo $mensaje; ?></p>
                <a href="ej2.php">Jugar de nuevo</a>
            </div>
        <?php else: ?>
            <p><?php echo $mensaje; ?></p>

            <form action="ej2.php" method="POST">
                <label for="intento">Tu intento:</label>
                <input type="number" name="intento" id="intento" required min="1" max="10" autofocus>
                <button type="submit">Enviar</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
