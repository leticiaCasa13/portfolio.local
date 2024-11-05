<?php
 
require_once "../vendor/autoload.php";
require_once "../src/controller/ProjectController.php";
require_once"../src/controller/AboutController.php";



// Preparar Twig
$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);

// Verifica la URL para decidir qué controlador llamar
$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'home':
        $controller = new ProjectController();
        $projects = $controller->getProjects(); // Obtener proyectos
        echo $twig->render('index.html', ['projects' => $projects]); // Enviar proyectos a la plantilla
        break;
    case 'about':
        $controller = new AboutController();
        $controller->index($twig);
        break;
    case 'contact':
        $controller = new \Controller\ContactController(); // Crear una instancia de ContactController
        $controller->showContactPage($twig); // Llamar al método showContactPage
    break;

}
?>

