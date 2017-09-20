<?php

require_once '/Model/salle.php';
require_once '/Model/equipment.php';
require_once '/Framework/Controller.php';

class equipmentsController extends Controller {

    private $salle;
    private $equipment;

    public function __construct() {
        $this->salle = new Salle();
        $this->equipment = new Equipment();
    }

    public function salle() {
        $idSalle = $this->request->getParams("id");
        $salles = $this->salle->getSalles();
        $equipments = $this->equipment->getEquipments($idSalle);
        $this->generateView(array('salles' => $salles, 'equipments' => $equipments));
    }

    public  function index() {
        // TODO: Implement index() method.
    }

    public function addQuantity() {
        $idSalle = $this->request->getParams("id");
        $quantity = $this->request->getParams("quantity");
        $equipmentName = $this->request->getParams("equipName");
        $this->equipment->updateQuantity($quantity, $idSalle, $equipmentName);

        $this->executeAction("salle");
    }
}