<?php
namespace FrameworkM2L\DAO;


use FrameworkM2L\Domain\Ligue;


class LigueDAO extends DAO 

{

    /**

     * @var \MicroCMS\DAO\ArticleDAO

     */

    private $reservationDAO;


    public function setReservationDAO(reservationDAO $reservationDAO) {
        $this->reservationDAO = $reservationDAO;
    }

    /**
     * Return a list of all comments for an article, sorted by date (most recent last).
     *
     * @param integer $reservationId The article id.
     *
     * @return array A list of all comments for the article.
     */

    public function findAllByReservation($reservationId) {
        // The associated article is retrieved only once
        $reservation = $this->reservationDAO->find($reservationId);

        // art_id is not selected by the SQL query
        // The article won't be retrieved during domain objet construction
        $sql = "select id,label from ligue where id=? order by id";
        $result = $this->getDb()->fetchAll($sql, array($reservationId));

        // Convert query result to an array of domain objects
        $ligues = array();
        foreach ($result as $row) {
            $ligueId = $row['id'];
            $ligue = $this->buildDomainObject($row);
            // The associated article is defined for the constructed comment
            $ligue->setReservation($reservation);
            $ligues[$ligueId] = $ligue;
        }
        return $ligues;
    }

    /**
     * Creates an Comment object based on a DB row.
     *
     * @param array $row The DB row containing Comment data.
     * @return \MicroCMS\Domain\Comment
     */
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