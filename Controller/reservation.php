<?php

namespace FrameworkM2L;

class reservation {

    private $id;
    private $date;
    private $heureDebut;
    private $heureFin;
    private $salle_id;
    private $ligue_id;
    
    public function __construct (){
       $this->id = $id;
       $this->date = $date;
       $this->heureDebut = $heureDebut;
       $this->heureFin = $heureFin;
       $this->salle_id = $salle_id;
       $this->ligue_id = $ligue_id;
    }
    
    
            
function afficherReservations($reservations){
    foreach ($reservations as $reservation) {
        echo $reservation[0],' ',$reservation[1],' ',$reservation[2],' ',$reservation[3],' ',$reservation[4],' ',$reservation[5],'<br />';
    }
}

function listeReservations(){
    return Connexion::query('select * from reservation');    
}

}