<?php

namespace FrameworkM2L\DAO;

use Doctrine\DBAL\Connection;

use FrameworkM2L\Domain\Reservation;

class ReservationDAO {

    /**

     * Database connection

     *

     * @var \Doctrine\DBAL\Connection

     */

    private $db;

    /**

     * Constructor

     *

     * @param \Doctrine\DBAL\Connection The database connection object

     */

    public function __construct(Connection $db) {
        $this->db = $db;
    }


    /**

     * Return a list of all articles, sorted by date (most recent first).

     *

     * @return array A list of all articles.

     */

    public function findAll() {
        $sql = "select * from reservation";
        $result = $this->db->fetchAll($sql);

        

        // Convert query result to an array of domain objects
        $reservations = array();
        foreach ($result as $row) {
            $reservationId = $row['id'];
            $reservations[$reservationId] = $this->buildReservation($row);
        }
        return $reservations;

    }


    /**

     * Creates an Article object based on a DB row.

     *

     * @param array $row The DB row containing Article data.

     * @return \MicroCMS\Domain\Article

     */

    private function buildReservation(array $row) {
        $reservation = new Reservation();
        $reservation->setId($row['id']);
        $reservation->setDate($row['date']);
        $reservation->setHeureDebut($row['heureDebut']);
        $reservation->setHeureFin($row['heureFin']);
        $reservation->setSalle_id($row['salle_id']);
        $reservation->setligue_id($row['ligue_id']);
        return $reservation;
    }
    
    /*function getReservations(){
   $bdd = new PDO('mysql:host=localhost;dbname=m2l_v1;charset=utf8', 'root', 'pwsio');
    $reservations = $bdd->query('select * from reservation'); 
    return $reservations;
    }*/
}