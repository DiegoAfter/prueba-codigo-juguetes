<?php
// Datos de conexión
$host = 'localhost';

$user = 'root';         
$pass = '';             
$db   = 'catalogo_juguetes'; 

try {
    
    $conexion = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}
?>
