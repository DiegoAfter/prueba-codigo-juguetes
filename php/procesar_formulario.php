<?php
session_start();

// Verificar que los datos llegan
if (!isset($_POST['nombre']) || !isset($_POST['email']) || !isset($_POST['genero'])) {
    die('Faltan los datos del formulario.');
}

// Guardar en sesión
$_SESSION['nombre'] = $_POST['nombre'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['genero'] = $_POST['genero'];

// Redirigir a la página de juguetes
header('Location: ../juguetes.html');
exit;
?>
