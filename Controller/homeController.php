<?php

require_once '/Model/salle.php';
require_once '/View/view.php';

class homeController {

    private $salle;

    public function __construct() {
        $this->salle = new Salle();
    }

    public function home() {
        $salles = $this->salle->getSalles();
        $view = new View("home");
        $view->generate(array('salles' => $salles));
    }
}