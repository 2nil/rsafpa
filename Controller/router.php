<?php

require_once 'homeController.php';
require_once 'equipmentsController.php';
require_once '/View/view.php';

class Router {

    private $homeCtrl;
    private $equipmentCtrl;

    public function __construct() {
        $this->homeCtrl = new homeController();
        $this->equipmentCtrl = new equipmentsController();
    }

    public function routerRequest() {
        try {
            if (isset($_GET['action'])) {
                if (intval($_GET['action'] == 'salle')) {
                    $idSalle = intval($_GET['id']);
                    $this->equipmentCtrl->salle($idSalle);
                }
            }
            else
                $this->homeCtrl->home();
        }

        catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }

    private function error($errorMsg) {
        $view = new View("error");
        $view->generate(array('errorMsg' => $errorMsg));
    }
}