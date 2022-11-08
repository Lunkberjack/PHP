<?php
    $cont = 0;
    session_start();
    setcookie('Contador', $cont);

    if (isset($_COOKIE['Contador'])) {
        $cont = $_COOKIE['Contador'] = session_id();
    }
    if(setcookie('Contador', $cont, time()+3600));

    $inactividad = 60;
    printf("La id actual es: ".session_id());

    // Comprobar si $_SESSION["timeout"] está establecida
    if(isset($_SESSION["timeout"])){
        // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
        $sessionTTL = time() - $_SESSION["timeout"];
        if($sessionTTL > $inactividad) {
            session_regenerate_id();
            header("Location: /sesiones/logout.php");
        }
    }
    // El siguiente key se crea cuando se inicia sesión
    $_SESSION["timeout"] = time();
?>