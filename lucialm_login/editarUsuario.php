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
            <a class="navbar-brand" href="editarUsuario.php">
                <img src="logo.png" width="60" height="60" class="d-inline-block align-top" alt="">
            </a>
            <span class="navbar-brand">
                <?php echo ($_COOKIE["NombreUsuario"]); ?>
                <!--POR FIN-->
                <img class="perfil rounded-circle" alt="<?php $_COOKIE['NombreImagenPerfil'] ?>" src="
                <?php printf("subidos/" . $_COOKIE['NombreImagenPerfil']) ?>" style="width:60px;height:60px" />
            </span>
        </nav>
    </header>

    <main>
        <div class="container-fluid">
            <div class="volverin d-flex flex-column text-right">
                <a href="index.php">Volver</a>
                <a href="logout.php">Cerrar sesión</a>
            </div>
            <div id="texto-bienvenida" class="row">
                <div class="col-5">
                    <h1 class="text-right">Edita tus<br><span class="underlined-grad">datos</span></h1>
                </div>
                <div class="col-1"></div>
                <div class="col-3">
                    <form class="text-center d-flex flex-column mr-5" action="editar.php" method="POST" id="editar">
                        <label for="user-cambio">Nombre de usuario:</label>
                        <input class="text-center" type="text" name="user-cambio" required value="
                            <?php
                            // El nombre de usuario actual.
                            echo ($_COOKIE["NombreUsuario"]);
                            ?>
                        ">
                        <br>
                        <label class="pt-3" for="pass-cambio">Nueva contraseña:</label>
                        <input class="text-center" type="password" name="pass-cambio" required>
                        <label class="pt-3" for="pass-cambio2">Repita la nueva contraseña:</label>
                        <input class="text-center" type="password" name="pass-cambio2" required>
                        <button class="btn btn-outline-primary mt-3" type="submit" form="editar" value="submit">Submit</button>
                    </form>
                    <br>

                    <div id="content">
                        <form method="POST" action="" enctype="multipart/form-data" style="max-width: 91%;">
                            <div class="form-group">
                                <input class="form-control" type="file" name="uploadfile" value="" />
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" name="upload" style="max-width: 100%;">Subir</button>
                            </div>
                        </form>
                    </div>

                    <div id="mostrarFoto">
                        <?php
                        require 'connection.php';

                        // Si se pulsa el botón de subir:
                        if (isset($_POST['upload'])) {
                            $filename = $_FILES["uploadfile"]["name"];
                            $tempname = $_FILES["uploadfile"]["tmp_name"];
                            $folder = "../lucialm_login/subidos/" . $filename;

                            // Se asegura de que cada usuario sobreescriba su imagen de perfil anterior.
                            $sqlBorrar = "DELETE FROM imagen WHERE (nombre_usuario) = :nombreUser";
                            $stmtBorrar = $pdo->prepare($sqlBorrar);
                            $stmtBorrar->bindParam(':nombreUser', $_COOKIE['NombreUsuario']);
                            $stmtBorrar->execute();

                            // Inserta la nueva imagen.
                            $sqlSubir = "INSERT INTO imagen VALUES ('$filename', :usuario)";
                            $stmtSubir = $pdo->prepare($sqlSubir);
                            $stmtSubir->bindParam(':usuario', $_COOKIE["NombreUsuario"]);
                            $stmtSubir->execute();

                            // Mueve la imagen a la carpeta designada para ellas.
                            if (move_uploaded_file($tempname, $folder)) {
                                echo "<h3>  Imagen subida con éxito.</h3>";
                            } else {
                                echo "<h3>  Hubo un error al subir la imagen.</h3>";
                            }
                        }

                        // DISPLAY
                        // $files = glob("subidos/" . $filename . ".*");
                        // Si usamos el filename anterior, no tenemos que buscar por extensión.
                        if (isset($filename)) {
                            setcookie('NombreImagenPerfil', $filename, time() + 3600);
                            // Se recarga la página y la imagen de perfil se actualiza sola.
                            header('Location: '.$_SERVER['PHP_SELF']);
                            $carpeta = "subidos/";
                            echo ("<img src=" . $carpeta . $filename . " alt='Tu imagen de perfil' style='max-width:60%; />" . "<br /><br />");
                        }
                        ?>
                    </div>
                </div>
                <div class="col-3"></div>
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
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/dd5c343ba9.js" crossorigin="anonymous"></script>
</body>

</html>