<?php
// Aquí podrías tener PHP para procesar información antes de mostrarla

// Por ejemplo, podrías recibir datos del controlador
// y pasarlos a esta vista para mostrarla.
$aboutInfo = [
    'nombre' => 'Leticia',
    'profesion' => 'Estudiante y junior desarrollador de aplicaciones web',
    'descripcion' => 'Me interesa aprender nuevas tecnologías y mejorar mis habilidades.'
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Mí - <?php echo $aboutInfo['nombre']; ?></title>
    <link rel="stylesheet" href="path/to/your/styles.css"> <!-- Cambia esto por la ruta de tu CSS -->
</head>
<body>
    <h1>Sobre Mí</h1>
    <p>Hola, soy <?php echo $aboutInfo['nombre']; ?>.</p>
    <p><?php echo $aboutInfo['descripcion']; ?></p>
</body>
</html>
