<?php

namespace Controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require_once "/../DatabaseController.php"; 

class ContactController
{
    public function showContactPage(Environment $twig) 
    {
        $contactInfo = [];
        
        $db = DatabaseController::connect(); 
        if ($db) {
            $stmt = $db->query("SELECT * FROM Contact");
            $contactInfo = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

        
        echo $twig->render('contact.html', ['contactInfo' => $contactInfo]);




   }
}

