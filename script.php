<?php
    session_start();
    // Establecer tiempo de vida de la sesión en segundos
    $inactividad = 10;
    $contador = 1;
    // Comprobar si $_SESSION["timeout"] está establecida
    if(isset($_SESSION["timeout"])) {
        // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
        $sessionTTL = time() - $_SESSION["timeout"];
        if($sessionTTL > $inactividad){
            echo $contador;
            session_destroy();
            // Se carga el fichero desde aquí 
            header("Location: /sesiones/logout.php");
        }
        $contador += 1;
    }
    // El siguiente key se crea cuando se inicia sesión
    $_SESSION["timeout"] = time();
?>