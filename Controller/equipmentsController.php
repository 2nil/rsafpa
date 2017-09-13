<?php

require_once '/Model/salle.php';
require_once '/Model/equipment.php';
require_once '/View/view.php';

class equipmentsController {

    private $salle;
    private $equipment;

    public function __construct() {
        $this->salle = new Salle();
        $this->equipment = new Equipment();
    }

    public function salle($idSalle) {
        $salles = $this->salle->getSalles();
        $equipments = $this->equipment->getEquipments($idSalle);
        $view = new View("equipments");
        $view->generate(array('salles' => $salles, 'equipments' => $equipments));
    }

    public function addEquipment($quantity, $idSalle, $equipmentName) {
        $this->equipment->updateQuantity($quantity, $idSalle, $equipmentName);
        $this->equipment->getEquipments($idSalle);
    }
}