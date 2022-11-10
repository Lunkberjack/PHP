<?php 
    session_start();
    // Revoca la asignación del nombre de usuario de
    // la sesión en las variables de sesión. 
    unset($_SESSION['username']);
    // Destruye todo en la sesión actual.
    session_destroy();
    // Redirige a la página de cierre de sesión exitosa.
    header("Location: logout-hub.php");
?>