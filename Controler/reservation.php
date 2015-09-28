<?php

function afficherReservations($reservations){
    foreach ($reservations as $reservation) {
        echo $reservation[0],' ',$reservation[1],' ',$reservation[2],' ',$reservation[3],' ',$reservation[4],' ',$reservation[5],'<br />';
    }
}

function listeReservations(){
    return Connexion::query('select * from reservation');    
}