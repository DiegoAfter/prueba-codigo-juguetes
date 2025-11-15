<?php
// Verificar que llegan los datos
if (!isset($_POST['nombre']) || !isset($_POST['email']) || !isset($_POST['genero'])) {
    die('Faltan los datos necesarios para enviar el correo.');
}

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$genero = $_POST['genero'];

// Crear cuerpo del correo con los juguetes del género
include 'conexion.php';

$stmt = $conexion->prepare("SELECT nombre, descripcion FROM juguetes WHERE genero = :genero");
$stmt->bindParam(':genero', $genero);
$stmt->execute();
$juguetes = $stmt->fetchAll(PDO::FETCH_ASSOC);

$cuerpo = "Hola, $nombre.\nEstos son los juguetes recomendados para ti:\n\n";

foreach ($juguetes as $juguete) {
    $cuerpo .= "- " . $juguete['nombre'] . ": " . $juguete['descripcion'] . "\n";
}

// Para pruebas, en lugar de enviar el mail, mostramos en pantalla qué sería enviado
echo "<h3>Este sería el email enviado:</h3>";
echo "<p>Para: " . htmlspecialchars($email) . "</p>";
echo "<p>Asunto: Tus juguetes recomendados</p>";
echo "<pre>" . htmlspecialchars($cuerpo) . "</pre>";
// Si quieres, en producción, usa mail() con configuración SMTP
// ejemplo:
/*
$headers = "From: no-reply@tusitio.com\r\n";

if (mail($email, "Tus juguetes recomendados", $cuerpo, $headers)) {
    echo "Correo enviado correctamente.";
} else {
    echo "Error al enviar el correo.";
}
*/
exit;
?>
