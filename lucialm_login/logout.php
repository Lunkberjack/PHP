<?php 
    session_start();
    
    // Revoca la asignación del nombre de usuario de
    // la sesión en las variables de sesión. 
    unset($_SESSION['username']);

    // Elimina completamente las cookies que se muestran en la navbar.
    setcookie("NombreUsuario", "", time() - 3600);
    setcookie("NombreImagenPerfil", "", time() - 3600);

    unset($_COOKIE['NombreUsuario']);
    unset($_COOKIE['NombreImagenPerfil']);

    // Destruye todo en la sesión actual.
    session_destroy();

    // Redirige a la página de cierre de sesión exitosa.
    header("Location: logout-hub.php");
?>