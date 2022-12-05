<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible:wght@400;700&family=Eczar:wght@400;700&family=Quicksand:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Regístrate o inicia sesión</title>
</head>

<body>
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

    <main>
        <div class="container-fluid">
            <div id="texto-bienvenida" class="row">
                <div class="col-6">
                    <h1 class="text-right">Inicia sesión<br>o <span class="underlined-grad">regístrate</span></h1>
                </div>
                <div class="col-1"></div>
                <div class="col-5">
                    <button type="button" id="btn-login" class="btn btn-grad">Inicia sesión</button>
                    <button type="button" id="btn-registro" class="btn btn-grad">&nbsp;&nbsp;Regístrate&nbsp;&nbsp;</button>
                </div>
            </div>
        </div>
    </main>

    <script>
        const btns_volver = document.querySelectorAll('.volver');

        btns_volver.forEach(boton => {
            boton.addEventListener('click', function handleClick(event) {
                boton.setAttribute('href', 'index.php');
            });
        });

        function verLogin() {
            document.getElementById("texto-bienvenida").style.display = 'none'
            document.getElementById("login-block").style.display = 'flex'
            document.getElementById("volver").style.display = 'flex'
            document.getElementById("registro-block").style.display = "none"
        }
        document.getElementById("btn-login").addEventListener("click", function() {
            document.location.href = "login-hub.html";
        })

        function verRegistro() {
            document.getElementById("registro-block").style.display = 'flex'
            document.getElementById("volver-registro").style.display = 'flex'
            document.getElementById("texto-bienvenida").style.display = 'none'
            document.getElementById("login-block").style.display = 'none'
        }
        document.getElementById("btn-registro").addEventListener("click", function() {
            document.location.href = "registro-hub.html";
        })

    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/dd5c343ba9.js" crossorigin="anonymous"></script>
</body>

</html>