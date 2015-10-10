<?php

namespace FrameworkM2L\DAO;

use FrameworkM2L\Domain\Reservation;


class ReservationDAO extends DAO {

    /**
     * Return a list of all articles, sorted by date (most recent first).
     *
     * @return array A list of all articles.
     */

    public function findAll() {
        $sql = "select id,date,heureDebut,heureFin,salle_id,ligue_id from reservation order by id";
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $reservations = array();
        foreach ($result as $row) {
            $reservationId = $row['id'];
            $reservations[$reservationId] = $this->buildDomainObject($row);
        }
        return $reservations;
    }

    /**
     * Creates an Article object based on a DB row.
     *
     * @param array $row The DB row containing Reservation data.
     * @return \MicroCMS\Domain\Reservation
     */

    protected function buildDomainObject($row) {
        $reservation = new Reservation();
        $reservation->setId($row['id']);
        $reservation->setId($row['date']);
        $reservation->setId($row['heureDebut']);
        $reservation->setId($row['heureFin']);
        $reservation->setId($row['salle_id']);
        $reservation->setId($row['ligue_id']);
        return $reservation;
    }
    
    public function find($id) {
        $sql = "select * from reservation where id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row){
            return $this->buildDomainObject($row);
        }else{
            throw new \Exception("No article matching id " . $id);
        }   
    }
}