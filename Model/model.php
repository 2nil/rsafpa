<?php

abstract class Model
{
    // Objet PDO d'accès à la BDD
    private $bdd;

    // Execute une requête SQL eventuellement paramétrée
    protected function executeRequest($sql, $params = null) {

        if ($params == null) {
            $results = $this->getBdd()->query($sql);
        }
        else {
            $results = $this->getBdd()->prepare($sql);
            $results->execute($params);
        }
        return $results;
    }

    // Renvoie un objet de connexion à la BDD en initialisant la connexion au besoin
    private function getBdd() {

        if ($this->bdd == null) {

            $this->bdd = new PDO('mysql:host=localhost;dbname=gestion_salles;charset=utf8', 'root', '',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
            return $this->bdd;
    }
}

