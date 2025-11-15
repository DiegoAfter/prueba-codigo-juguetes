<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Obtener datos del usuario y la lista de juguetes
$nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : 'Cliente';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : 'correo@ejemplo.com';

$juguetes = [
    [
        'nombre' => 'Auto',
        'descripcion' => 'Auto rápido de carreras',
        'imagen_url' => 'http://localhost/prueba-codigo-juguetes/img/auto.png'
    ],
    [
        'nombre' => 'Muñeca',
        'descripcion' => 'Muñeca para jugar',
        'imagen_url' => 'http://localhost/prueba-codigo-juguetes/img/muñeca.png'
    ]
];

// Construir contenido HTML del "email"
$body = "<html><body>";
$body .= "<h2>Hola, " . htmlspecialchars($nombre) . "</h2>";
$body .= "<p>Estos son los juguetes recomendados para ti:</p>";

foreach ($juguetes as $juguete) {
    $nombre_juguete = htmlspecialchars($juguete['nombre']);
    $descripcion = htmlspecialchars($juguete['descripcion']);
    $img_url = htmlspecialchars($juguete['imagen_url']);
    $body .= "<div style='border:1px solid #ccc;padding:10px;margin-bottom:10px;text-align:center;'>";
    $body .= "<h3>{$nombre_juguete}</h3>";
    $body .= "<img src='{$img_url}' style='width:120px;border-radius:8px;'><br>";
    $body .= "<p>{$descripcion}</p>";
    $body .= "</div>";
}
$body .= "</body></html>";

// Mostrar en pantalla la vista previa del "email"
echo "<h3>Este sería el email enviado:</h3>";
echo "<p>Para: " . htmlspecialchars($email) . "</p>";
echo "<p>Asunto: Tus juguetes recomendados</p>";
echo "<div style='border:1px dashed #ccc;padding:10px;'>" . $body . "</div>";



$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "From: no-reply@tusitio.com\r\n";

if (mail($email, "Tus juguetes recomendados", $body, $headers)) {
    echo "Correo enviado correctamente.";
} else {
    echo "Error al enviar el correo.";
}

?>
