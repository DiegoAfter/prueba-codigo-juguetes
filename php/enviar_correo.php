<?php
session_start();
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$genero = $_POST['genero'];

include 'conexion.php';

// Juguetes por Gnero
$stmt = $conexion->prepare("SELECT nombre, descripcion FROM juguetes WHERE genero = :genero");
$stmt->bindParam(':genero', $genero);
$stmt->execute();
$juguetes = $stmt->fetchAll(PDO::FETCH_ASSOC);

// e-mail
$cuerpo = "Hola, $nombre.\nEstos son los juguetes recomendados para ti:\n\n";

foreach ($juguetes as $juguete) {
    $cuerpo .= "- " . $juguete['nombre'] . ": " . $juguete['descripcion'] . "\n";
}

// Enviar el e-mail
$headers = "From: no-reply@tusitio.com\r\n";

if (mail($email, "Tus juguetes recomendados", $cuerpo, $headers)) {
    echo "Correo enviado correctamente.";
} else {
    echo "Error al enviar el correo.";
}
?>
