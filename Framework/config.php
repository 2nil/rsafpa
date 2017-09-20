<?php

class config {

    private static $params;

    // Renvoie la valeur d'un paramètre de configuration
    public static function get($name, $defaultValue = null) {
        if (isset(self::getParams()[$name])) {
            $value = self::getParams()[$name];
        }
        else {
            $value = $defaultValue;
        }
        return $value;
    }

    // Renvoie le tableau des paramètres en le chargeant au besoin
    private static function getParams()
    {
        if (self::$params == null) {
            $filePath = "Config/prod.ini";
            if (!file_exists($filePath)) {
                $filePath = "Config/dev.ini";
            }
            if (!file_exists($filePath)) {
                throw new Exception("Aucun fichier de configuration trouvé");
            } else {
                self::$params = parse_ini_file($filePath);
            }
        }
        return self::$params;
    }
}