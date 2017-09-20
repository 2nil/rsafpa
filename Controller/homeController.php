<?php

require_once '/Model/salle.php';
require_once '/Framework/Controller.php';

class homeController extends Controller {

    private $salle;

    public function __construct() {
        $this->salle = new Salle();
    }

    public function index() {
        $salles = $this->salle->getSalles();
        $this->generateView(array('salles' => $salles));
    }
}