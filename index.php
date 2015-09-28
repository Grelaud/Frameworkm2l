<?php
header('Content-Type: text/html; charset=utf-8');

include('./Modele/connexion.php');
include('./Controler/salle.php');
include('./Controler/ligue.php');
include('./Controler/reservation.php');

include('./Vue/form/reservations_par_salle.php');
include('./Vue/form/reservations_par_ligue.php');
?>
<!doctype html>
<html>
    <head>
        <title>M2L</title>
    </head>
    <body>
        <h1>M2L - ACCUEIL</h1>
        <<?php
        foreach ($reservations as $reservation){
        ?>
        <article>
                <?php
                     echo $reservation[0];
                     
                    ?>
                    <?php
                    echo $reservation[1];
                    ?>
        </article>
        <?php } ?>
    </body>
</html>     
                