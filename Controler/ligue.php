<?php

function listeReservationsLigue($ligue){
    return Connexion::query('select * from reservation where ligue=\''.$ligue.'\'');    
}