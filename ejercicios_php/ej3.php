<html>
<body>

<form action="ej3.php" method="POST">
Introduce un número: <input type="number" name="numero1"><br>
Introduce otro: <input type="number" name="numero2"><br>
<input type="submit">
</form>


<?php 
if (isset($_POST['numero1'])) {
    echo($_POST["numero1"]." + ". $_POST["numero2"]. " = ". $_POST["numero1"]+$_POST["numero2"] . "</br>");
    echo($_POST["numero1"]." - ". $_POST["numero2"]. " = ". $_POST["numero1"]-$_POST["numero2"] . "</br>");
    echo($_POST["numero1"]." x ". $_POST["numero2"]. " = ". $_POST["numero1"]*$_POST["numero2"] . "</br>");
    echo($_POST["numero1"]." / ". $_POST["numero2"]. " = ". $_POST["numero1"]/$_POST["numero2"] . "</br>");
}
    ?>
</body>
</html>