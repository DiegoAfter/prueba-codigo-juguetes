<?php
include 'conexion.php';

session_start();
$genero = $_SESSION['genero'] ?? '';

$stmt = $conexion->prepare("SELECT nombre, descripcion, imagen_url FROM juguetes WHERE genero = :genero");
$stmt->bindParam(':genero', $genero);
$stmt->execute();
$juguetes = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($juguetes && count($juguetes) > 0) {
    foreach ($juguetes as $juguete) {
        $nombre = htmlspecialchars($juguete['nombre']);
        $descripcion = htmlspecialchars($juguete['descripcion']);
        $imagen = htmlspecialchars($juguete['imagen_url']);
        echo "<div class='juguete'>";
        echo "<img src='{$imagen}' alt='{$nombre}'>";
        echo "<div class='name'>{$nombre}</div>";
        echo "<div class='price'>$150.00</div>"; // Puedes hacer dinámico o cambiar el precio
        echo "<button class='btn'>Enviar</button>";
        echo "</div>";
    }
} else {
    echo "<p>No hay juguetes disponibles para este género.</p>";
}
?>
