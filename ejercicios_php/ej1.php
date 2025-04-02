<html>
<body>

<form action="ej1.php" method="POST">
Introduce un número: <input type="number" name="numero"><br>
<input type="submit">
</form>


<?php 
if (isset($_POST['numero'])) {
    echo("Tabla de el ".$_POST["numero"]."<br><br>");
    for ($i=1; $i <= 25; $i++) { 
        echo($_POST["numero"]." x ". $i. " = ". $_POST["numero"]*$i . "</br>");
    }
}
?>
</body>
</html>