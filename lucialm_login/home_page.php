<?php
session_start();
// Obtenemos el nombre de sesión (el que ya habíamos
// definido como el del login exitoso) y saludamos 
// personalmente al usuario.
$user = $_SESSION['username'];

echo "<h1>Bienvenido, $user</h1>";

echo "<button type='submit'>Log out</button>"
?>