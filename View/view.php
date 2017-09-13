<?php

class View {

    // Nom du fichier associé à la vue
    private $file;

    // Titre de la vue (défini dans le fichier vue)
    private $title;

    public function __construct($action) {
        // Détermination du nom du fichier vue à partir de l'action
        $this->file = "View/".$action."View.php";
    }

    // Génère et affiche la vue
    public function generate($data) {
        // Génération de la partie spécifique de la vue
        $content = $this->generateFile($this->file, $data);
        // Génération du gabarit commun utilisant la partie spécifique
        $view = $this->generateFile('View/Template/template.php', array('title' => $this->title, 'content' => $content));
        // Renvoi de la vue au navigateur
        echo $view;
    }

    // Génère un fichier vue et renvoie le résultat produit
    private function generateFile($file, $data) {
        if (file_exists($file)) {
            // Rend les éléments du tableau $donnees accessibles dans la vue
            extract($data);
            // Démarrage de la temporisation de sortie
            ob_start();
            // Inclut le fichier vue
            // Son résultat est placé dans le tampon de sortie
            require $file;
            // Arrêt de la temporisation et renvoi du tampon de sortie
            return ob_get_clean();
        }
        else {
            throw new Exception("Fichier '$file' introuvable");
        }
    }
}