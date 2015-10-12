<?php
namespace FrameworkM2L\DAO;


use FrameworkM2L\Domain\Ligue;


class LigueDAO extends DAO 

{
    private $reservationDAO;

    
    public function setReservationDAO(reservationDAO $reservationDAO) {
        $this->reservationDAO = $reservationDAO;
    }

    public function findAllByReservation($reservationId) {
        // The associated article is retrieved only once
        $reservation = $this->reservationDAO->find($reservationId);

        // art_id is not selected by the SQL query
        // The article won't be retrieved during domain objet construction
        $sql = "select ligue.id AS id,ligue.label AS label "
                . "from ligue,reservation "
                . "where ligue.id=reservation.ligue_id "
                . "and reservation.id=?";
        $result = $this->getDb()->fetchAll($sql, array($reservationId));

        // Convert query result to an array of domain objects
        $ligues = array();
        foreach ($result as $row) {
            $ligueId = $row['id'];
            $ligue = $this->buildDomainObject($row);
            // The associated article is defined for the constructed comment
            $ligue->setReservation($reservation);
            $ligues = array($ligue);
        }
        return $ligues;
    }

    protected function buildDomainObject($row) {
        $ligue = new Ligue();
        $ligue->setId($row['id']);
        $ligue->setLabel($row['label']);

        
        if (array_key_exists('id', $row)) {
            // Find and set the associated article
            $reservationId = $row['id'];
            $reservation = $this->reservationDAO->find($reservationId);
            $ligue->setReservation($reservation);
        }        
        return $ligue;
    }
}