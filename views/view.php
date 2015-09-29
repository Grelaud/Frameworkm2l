<!doctype html>
<html>
    <head>
        <title>M2L</title>
    </head>
    <body>
        <h1>M2L - ACCUEIL</h1>
        <?php foreach ($reservations as $reservation): ?>
        <article>
            <h2><?php echo $reservation->getId() ?></h2>
            <p><?php echo $reservation->getDate() ?></p>
            <p><?php echo $reservation->getHeureDebut() ?></p>
            <p><?php echo $reservation->getHeureFin() ?></p>
            <p><?php echo $reservation->getSalle_id() ?></p>
            <p><?php echo $reservation->getLigue_id() ?></p>
        </article>
        <?php endforeach ?>
    </body>
</html>            