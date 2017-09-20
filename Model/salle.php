<?php

require_once '/Framework/Model.php';

class Salle extends Model {

    public function getSalles() {
        $sql = ("SELECT id_room, name FROM `rooms` ORDER BY name ASC");
        $salles = $this->executeRequest($sql);
        return $salles;
    }
}