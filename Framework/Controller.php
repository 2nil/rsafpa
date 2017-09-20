<?php

require_once 'request.php';
require_once 'View.php';

abstract class Controller {

    // Action à réaliser
    private $action;

    // Requête entrante
    protected $request;

    // Définit la requête entrante
    public function setRequest(Request $request) {
        $this->request = $request;
    }

    // Exécute l'action à réaliser
    public function executeAction($action) {
        if (method_exists($this, $action)) {
            $this->action = $action;
            $this->{$this->action} ();
        }
        else {
            $controllerClass = get_class($this);
            throw new Exception("Action '$action' non définie dans la classe $controllerClass");
        }
    }

    // Méthode abstraite correspondant à l'action par défaut
    // Oblige les classes dérivées à implémenter cette action par défaut
    public abstract function index();

    // Génère la vue associée au contrôleur courant
    protected function generateView($viewDatas = array()) {
        // Détermination du nom du fichier vue à partir du nom du contrôleur actuel
        $controllerClass = get_class($this);
        $controller = str_replace("Controller", "", $controllerClass);
        // Instanciation et génération de la vue
        $view = new View($this->action, $controller);
        $view->generate($viewDatas);
    }
}