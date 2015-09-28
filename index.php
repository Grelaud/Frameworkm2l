<?php
header('Content-Type: text/html; charset=utf-8');

include('./Modele/connexion.php');
include('./Controler/salle.php');
include('./Controler/ligue.php');
include('./Controler/reservation.php');

include('./Vue/reservations_par_salle.php');
include('./Vue/reservations_par_ligue.php');


//affichage des reservations par salle
if(isset($_POST['salle'])){
    $salle=$_POST['salle'];
    $reservations = listeReservationsSalle($salle);
    echo '<h1>Liste des réservations de '.$salle.'</h1>';
    afficherReservations($reservations);
}

//affichage des reservations par ligue
if(isset($_POST['ligue'])){
    $ligue=$_POST['ligue'];
    $reservations = listeReservationsLigue($ligue);
    echo '<h1>Liste des réservations de '.$ligue.'</h1>';
    afficherReservations($reservations);
}
