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
        echo "<div class='juguete'>";
        echo "<img src='{$juguete['imagen_url']}' alt='{$juguete['nombre']}'>";
        echo "<h3>{$juguete['nombre']}</h3>";
        echo "<p>{$juguete['descripcion']}</p>";
        echo "</div>";
    }
} else {
    echo "<p>No hay juguetes disponibles para este género.</p>";
}
?>
