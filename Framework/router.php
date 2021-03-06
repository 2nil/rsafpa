<?php

require_once 'request.php';
require_once '/Framework/View.php';

class Router {

    // Route une requête entrante : exécute l'action associée
    public function routerRequest() {
        try {
            // Fusion des paramètres GET et POST de la requête
            $request = new Request(array_merge($_GET, $_POST));

            $controller = $this->createController($request);
            $action = $this->createAction($request);

            $controller->executeAction($action);
        }
        catch (Exception $e) {
            $this->error($e);
        }
    }

    // Crée le contrôleur approprié en fonction de la requête reçue
    private function createController(Request $request) {
        $controller = "home"; // Contrôleur par défaut
        if ($request->paramsExist('controller')) {
            $controller = $request->getParams('controller');

            // Première lettre en majuscule
            $controller = ucfirst(strtolower($controller));
        }
        // Création du nom du fichier du contrôleur
        $controllerClass = $controller . "Controller";
        $controllerFile = "Controller/" . $controllerClass . ".php";
        if (file_exists($controllerFile)) {
            // Instanciation du contrôleur adapté à la requête
            require ($controllerFile);
            $controller = new $controllerClass();
            $controller->setRequest($request);
            return $controller;
        }
        else
            throw new Exception("Fichier '$controllerFile' introuvable");
    }

    // Détermine l'action à exécuter en fonction de la requête reçue
    private function createAction(Request $request) {
        $action = "index"; // Action par défaut
        if ($request->paramsExist('action')) {
            $action = $request->getParams('action');
        }
        return $action;
    }

    private function error(Exception $exception) {
        $view = new View('error');
        $view->generate(array('errorMsg' => $exception->getMessage()));
    }
}