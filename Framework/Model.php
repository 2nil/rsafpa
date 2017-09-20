<?php

require_once '/Framework/config.php';

/*
@version 1.0
@author Ugo DELAFOSSE
*/

abstract class Model
{
    /** Objet PDO d'accès à la BDD
    Statique donc partagé par toutes les instances des classes dérivées */
    private static $bdd;

    /**
     * Exécute une requête SQL
     *
     * @param string $sql Requête SQL
     * @param array $params Paramètres de la requête
     * @return PDOStatement Résultats de la requête
     */
    protected function executeRequest($sql, $params = null) {

        if ($params == null) {
            $results = self::getBdd()->query($sql); //Exécution directe
        }
        else {
            $results = self::getBdd()->prepare($sql); //Execution préparée
            $results->execute($params);
        }
        return $results;
    }

    /**
     * Renvoie un objet de connexion à la BDD en initialisant la connexion au besoin
     *
     * @return PDO Objet PDO de connexion à la BDD
     */
    private function getBdd() {

        if (self::$bdd == null) {
            // Récupération des paramètres de configuration BDD
            $dsn = config::get("dsn");
            $username = config::get("username");
            $passwd = config::get("passwd");
            // Création de la connexion
            self::$bdd = new PDO($dsn, $username, $passwd,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
            return self::$bdd;
    }
}

