<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible:wght@400;700&family=Eczar:wght@400;700&family=Quicksand:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Bienvenido</title>
</head>
<header>
    <nav class="navbar fixed-top navbar-light bg-light">
        <a class="navbar-brand" href="index.php">
            <img src="logo.png" width="60" height="60" class="d-inline-block align-top" alt="">
        </a>
        <span class="navbar-brand">
            <a id="enlace-index" href="editarUsuario.php">
                <?php
                if (!empty($_COOKIE['NombreUsuario'])) {
                    echo ($_COOKIE['NombreUsuario']);
                } else {
                ?>
                    <script>
                        // Si no hay usuario logueado, el enlace redirige al inicio de sesión.
                        const enlaceIndex = document.getElementById('enlace-index');
                        enlaceIndex.setAttribute('href', 'login-hub.html');
                    </script>
                <?php
                    echo ("Inicia sesión");
                }
                ?>
            </a>
            <!--POR FIN-->
            <?php
            $imagen;
            if (!empty($_COOKIE['NombreImagenPerfil'])) {
                $imagen = $_COOKIE['NombreImagenPerfil'];
            } else {
                $imagen = "default.jpg";
            }
            ?>
            <img class="perfil rounded-circle" alt="<?php printf($imagen) ?>" src="
                <?php printf("subidos/" . $imagen) ?>" style="width:60px;height:60px;" />
        </span>
    </nav>
</header>

<body>
    <?php
    session_start();
    ?>

    <main>
        <div class="container-fluid">
            <div class="volverin d-flex flex-column text-right">
                <a href="index.php">Volver</a>
                <a href="logout.php">Cerrar sesión</a>
            </div>
            <div id="texto-bienvenida" class="row">
                <div class="col-12">
                    <!-- Saluda personalmente al usuario logueado haciendo uso de variables de sesión -->
                    <h1 class="text-right underlined-grad">Bienvenid@ de nuevo,
                        <?php
                        echo $_SESSION['username'];
                        ?>
                        &nbsp;&nbsp;</h1>
                </div>
            </div>
        </div>
    </main>
</body>

</html>