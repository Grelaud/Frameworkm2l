<?php

/**
 * Classe Connexion
 *
 */
class Connexion {

    private static $_pdo = null;

    private function __construct() {
        
    }

    /**
     * 
     * @return PDO
     */
    private function _get() {
        if (is_null(self::$_pdo)) {
            self::$_pdo = new PDO('mysql:dbname=m2l_v1;host=127.0.0.1', 'root', 'pwsio');
            self::$_pdo->exec('SET CHARACTER SET utf8');
        }
        return self::$_pdo;
    }

    public static function query($query) {
        $tab = [];
        $result = self::_get()->query($query, PDO::FETCH_NUM);
        if (!$result) {
            throw new Exception(self::_get()->errorInfo()[2]);
        }
        foreach ($result as $row) {
            $tab[] = $row;
        }
        return $tab;
    }

}
