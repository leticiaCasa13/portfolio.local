<?php
require_once "DatabaseController.php";

class ProjectController {

    private $connection;

    public function __construct() {
        $this->connection = DatabaseController::connect();
    }

    public function getProjects() {
        try  {
            $sql = "SELECT * FROM Project WHERE 1";
            $statement = $this->connection->prepare($sql);
            $statement->setFetchMode(PDO::FETCH_OBJ);
            $statement->execute();
            return $statement->fetchAll();
        } catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }

    public function index($twig) {
        $projects = $this->getProjects();
        echo $twig->render('index.html', ['projects' => $projects]);
    }
}

