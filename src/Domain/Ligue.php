<?php

namespace FrameworkM2L\Domain;


class Ligue {
    private $id;
    private $label;
    private $reservation;
    private $author;
    
    public function getId(){
        return $this->id;
    }
    
    public function setId($id){
        $this->id = $id;
    }
    
    public function getLabel(){
        return $this->label;
    }
    
    public function setLabel($label){
        $this->label = $label;
    }
    
    public function getReservation(){
        return $this->reservation;
    }
    
    public function setReservation(Reservation $reservation){
        $this->reservation = $reservation;
    }
    
     public function setAuthor(User $author) {
        $this->author = $author;
    }
}
