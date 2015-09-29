<!doctype html>
<html>
    <head>
        <title>M2L</title>
    </head>
    <body>
        <h1>M2L - ACCUEIL</h1>
        <?php
        foreach ($reservations as $reservation){
        ?>
        <article>
                <?php
                     echo $reservation[0].' | '.$reservation[1].' | '.$reservation[2].' | '.$reservation[3].' | '.$reservation[4].' | '.$reservation[5];
                    ?>
        </article>
        <?php } ?>
    </body>
</html>     
                