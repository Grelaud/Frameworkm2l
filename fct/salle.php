<?php

function listeReservationsSalle($salle){
    return Connexion::query('select * from reservation where salle=\''.$salle.'\'');    
}