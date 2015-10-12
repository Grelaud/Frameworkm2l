<?php

namespace FrameworkM2L\Domain;


class Reservation{

    private $id;
    private $date;
    private $heureDebut;
    private $heureFin;
    private $salle_id;
    private $ligue_id;

    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }


    public function getDate() {
        return $this->date;
    }


    public function setDate($date) {
        $this->date = $date;
    }


    public function getHeureDebut() {
        return $this->heureDebut;
    }


    public function setHeureDebut($heureDebut) {
        $this->heureDebut = $heureDebut;
    }
    
    public function getHeureFin() {
        return $this->heureFin;
    }
    
    public function setHeureFin($heureFin) {
        $this->heureFin = $heureFin;
    }


    public function getSalle_id() {
        return $this->salle_id;
    }


    public function setSalle_id($salle_id) {
        $this->salle_id = $salle_id;
    }


    public function getLigue_id() {
        return $this->ligue_id;
    }


    public function setLigue_id($ligue_id) {
        $this->ligue_id = $ligue_id;
    }

}
