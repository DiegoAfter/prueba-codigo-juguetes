<?php
// Datos de conexión - ajusta según tu setup
$host = 'localhost';
$db   = 'catalogo_juguetes';
$user = 'root'; // en XAMPP, usuario por defecto
$pass = '';     // en XAMPP, contraseña vacía

try {
    $conexion = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}
?>
