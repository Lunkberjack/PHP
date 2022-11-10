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

<body>
    <?php
        session_start();
    ?>
    <main>
        <div class="container-fluid">
        <div class="volverin d-flex flex-column text-right">
            <a href="index.html">Volver</a>
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