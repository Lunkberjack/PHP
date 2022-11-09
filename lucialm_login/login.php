<?php
require 'connection.php';

session_start();

if(!empty($_POST['user-login']) && !empty($_POST['pass-login'])) {
    $stmt = $pdo->prepare("SELECT nombre, pass FROM usuario WHERE nombre = :nombre");
    $stmt->bindParam(":nombre", $_POST['user-login']);
    $stmt->execute();
    // Obtenemos un array asociativo.
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (count($result) > 0 && password_verify($_POST['pass-login'], $result['pass'])) {
        // Guardamos el nombre de usuario de la sesión en una variable de sesión PHP.
        $_SESSION['username'] = $_POST['user-login'];
        header("Location: home.html");
    } else {
        header("Location: error-login.html");
    }
}
?>