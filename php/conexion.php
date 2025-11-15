<?php
// Datos de conexión 
$host = 'localhost';
$db   = 'catalogo_juguetes';
$user = 'root'; // usuario por defecto
$pass = '';     // contraseña vacía

try {
    $conexion = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}
?>
