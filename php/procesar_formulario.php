<?php
session_start();

if (isset($_POST['nombre'])) {
    $_SESSION['nombre'] = $_POST['nombre'];
}
if (isset($_POST['genero'])) {
    $_SESSION['genero'] = $_POST['genero'];
}

//  agregar cookies
if (isset($_POST['nombre'])) {
    setcookie('nombre', $_POST['nombre'], time() + 3600);
}
if (isset($_POST['genero'])) {
    setcookie('genero', $_POST['genero'], time() + 3600);
}

// Rediridigir después
header('Location: ../juguetes.html');
exit;
?>
