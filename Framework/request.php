<?php

class Request {

    // Paramètres de la requête
    private $params;

    public function __construct($params) {
        $this->params = $params;
    }

    // renvoi true si le paramètre existe dans la requête
    public function paramsExist($name) {
        return (isset($this->params[$name]) && $this->params[$name] != "");
    }

    // renvoi la valeur du parametre demandé
    // lève une exception si le parametre est introuvable
    public function getParams($name) {
        if ($this->paramsExist($name)) {
            return $this->params[$name];
        }
        else
            throw new Exception("Paramètre '$name' absent de la requête");
    }
}