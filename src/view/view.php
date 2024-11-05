<?php

namespace App\View; // Define el espacio de nombres para la clase

class View
{
    private $view; // Propiedad para almacenar el nombre de la vista

    public function __construct($view)
    {
        $this->view = $view; // Inicializa la propiedad con el nombre de la vista
    }

    public function render($data = [])
    {
        // Extraer los datos para que estén disponibles como variables en la vista
        extract($data); // Convierte el array $data en variables

        // Incluir el archivo de vista correspondiente
        include "../view/{$this->view}.php"; // Asegúrate de que la ruta sea correcta
    }
}
=

