<?php
session_start();
$_SESSION['nombre'] = $_POST['nombre'];
$_SESSION['genero'] = $_POST['genero'];

// Cookies agregadas
setcookie('nombre', $_POST['nombre'], time() + 3600);
setcookie('genero', $_POST['genero'], time() + 3600);

header('Location: ../juguetes.html');
exit;
?>
