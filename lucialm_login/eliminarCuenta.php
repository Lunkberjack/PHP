<?php
require 'connection.php';
// Borramos la entrada del usuario por completo.
$stmt = $pdo->prepare("DELETE FROM usuario WHERE nombre = :nombre");
$stmt->bindParam(":nombre", $_COOKIE['NombreUsuario']);
$stmt->execute();

// Nos aseguramos de que su foto de perfil quede también borrada.
$stmt = $pdo->prepare("DELETE FROM imagen WHERE nombre_usuario = :nombre");
$stmt->bindParam(":nombre", $_COOKIE['NombreUsuario']);
$stmt->execute();

// Revoca la asignación del nombre de usuario de
// la sesión en las variables de sesión. 
unset($_SESSION['username']);
unset($_SESSION['name']);
unset($_SESSION['id']);

// Elimina completamente las cookies que se muestran en la navbar.
setcookie("NombreUsuario", "", time() - 3600);
setcookie("NombreImagenPerfil", "", time() - 3600);

unset($_COOKIE['NombreUsuario']);
unset($_COOKIE['NombreImagenPerfil']);

// Destruye todo en la sesión actual.
header('Location: ' . $_SERVER['PHP_SELF']);
session_destroy();

// Redirige a la página de cierre de sesión exitosa.
header("Location: exito-eliminar.html");
