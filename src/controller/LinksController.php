<?php

class LinksController {
    private $db;

    public function __construct() {
        // Conectar a la base de datos usando el controlador de la base de datos
        $this->db = new DatabaseController();
    }

    /**
     * Página de inicio que muestra un formulario para generar un enlace.
     */
    public function index() {
        // Incluir la vista de inicio (home)
        include 'views/home.php';
    }

    /**
     * Genera un enlace único y lo almacena en la base de datos.
     */
    public function generateLink() {
        // Generar un token único
        do {
            $token = $this->generateToken(32);
        } while ($this->db->tokenExists($token)); // Verificar que no exista un enlace con ese token

        // Insertar el token en la base de datos
        if ($this->db->createLink($token)) {
            // Mostrar el enlace generado
            echo "Enlace generado: <a href='/{$token}'>www.links.local/{$token}</a>";
        } else {
            echo "Error al generar el enlace.";
        }
    }

    /**
     * Accede a un enlace por su token, incrementa el número de usos y responde según la cantidad de usos.
     */
    public function accessLink($token) {
        // Verificar si el token existe en la base de datos
        if (!$this->db->tokenExists($token)) {
            echo "Enlace no válido o inexistente.";
            return;
        }

        // Obtener el número de usos del enlace
        $usages = $this->db->getUsages($token);

        // Comprobar el número de usos y mostrar el mensaje correspondiente
        if ($usages === 0) {
            echo "👍 Primera visita al enlace.";
        } elseif ($usages >= 1 && $usages < 4) {
            echo "🖕 Este enlace ha sido visitado " . ($usages + 1) . " veces.";
        } else {
            echo "⛔ Este enlace ha sido desactivado por alcanzar el límite de usos.";
            return; // No incrementar más si ya ha alcanzado el límite
        }

        // Incrementar el contador de usos
        $this->db->incrementUsage($token);
    }

    /**
     * Función privada para generar un token aleatorio.
     * @param int $size Longitud del token a generar.
     * @return string Token aleatorio generado.
     */
    private function generateToken($size) {
        return bin2hex(random_bytes($size / 2)); // Genera un token hexadecimal de tamaño dado
    }
}
