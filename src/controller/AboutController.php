<?php

require_once "DatabaseController.php";

class AboutController {
    public function index($twig) {
        // Información estática o desde la base de datos
        $aboutInfo = [];

        $db = DatabaseController::connect();
        if ($db) {
            $stmt = $db->query("SELECT * FROM About");
            $aboutInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // Renderiza el archivo about.html usando Twig y envía los datos a la plantilla
        echo $twig->render('about.html', ['aboutInfo' => $aboutInfo]);
    }
}

