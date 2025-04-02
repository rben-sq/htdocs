<!DOCTYPE html>
<html>
    <head>
        <title>Ejemplo</title>
    </head>
    <body>

        <?php
        $array= [];
            for ($i=2; $i <= 20; $i+=2) { 
                echo($i. " ");
                $array[]= $i;
            }

            foreach ($array as $num) {
                echo("</br>".$num);
            }
        ?>

    </body>
</html>