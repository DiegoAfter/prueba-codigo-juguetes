<?php
// Datos de conexión - reemplaza con tus datos reales
$host = 'localhost';
$db   = 'catalogo_juguetes';
$user = 'tu_usuario';      // <--- Cambia esto por tu usuario
$pass = 'tu_contrasena';   // <--- Cambia esto por tu contraseña

try {
    // Crear conexión PDO
    $conexion = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}
?>
