<?php
require 'connection.php';
// Hemos usado Mockaroo para generar una nueva tabla SQL (hemos incluido la sentencia
// CREATE TABLE para que, una vez importada a la base de datos elegida, se creara sola
// la nueva tabla).
// Al importarla, se han añadido mediante un INSERT automático todas las filas generadas
// aleatoriamente. Ahora podemos acceder a los datos usando nuestra conexión y PDO.

// Si no existe el método GET, se redirigirá aquí (si el usuario modifica la url).
if (!$_GET) {
    header('Location:clientes.php?pagina=1');
}

// Designamos los artículos máximos por página (quizá 40 sea mucho para mi página y haya
// que hacer scroll, pero era lo que pedía el enunciado).
$maxPagina = 40;

// Calculamos el número de páginas que van a ser necesarias, teniendo en cuenta
// el número de filas totales en la tabla de la base de datos.
$stmt = $pdo->prepare("SELECT * FROM cliente");
$stmt->execute();
$totalFilas = $stmt->rowCount();

// Si se pasa aunque sea un poco de un # de páginas, necesitaremos otra.
// Redondeamos al alza con ceil().
$paginas = ceil($totalFilas / $maxPagina);

// El límite en que empezará a imprimir los resultados de la consulta SQL
// cada página.
$comienzo = ($_GET['pagina'] - 1) * $maxPagina;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible:wght@400;700&family=Eczar:wght@400;700&family=Quicksand:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Lista de clientes</title>
</head>

<body>
    <main>
        <div class="container-fluid">
            <div class="volverin d-flex flex-column text-right">
                <a href="index.php">Volver</a>
            </div>
            <div id="texto-bienvenida" class="row">
                <div class="col-4">
                    <h1 class="text-right">Nuestros<br><span class="underlined-grad">clientes</span></h1>
                </div>
                <div class="col-1"></div>
                <div class="col-6">
                    <div style="height:700px; overflow-y:auto;">
                        <table id="" class="table table-striped table-bordered table-sm">
                            <thead>
                                <tr class="bg-primary text-white text-center">
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Si algún usuario decide modificar la url para romper la paginación, que le quede
                                // claro que nosotros somos más listos que él (lo redirigimos a la pág 1 si busca una 
                                // página que no existe).
                                if ($_GET['pagina'] > $paginas || $_GET['pagina'] <= 0) {
                                    header('Location:clientes.php?pagina=1');
                                }

                                // Conectamos a la base de datos y nos traemos los datos de 40 clientes cada vez.
                                $stmt = $pdo->prepare("SELECT * FROM cliente LIMIT :comienzo, :artPorPagina");

                                // Con PDO::PARAM_INT informamos a PDO de que no use comillas y la coloque como un
                                // tipo de dato entero.
                                $stmt->bindParam(':comienzo', $comienzo, PDO::PARAM_INT);
                                $stmt->bindParam(':artPorPagina', $maxPagina, PDO::PARAM_INT);
                                $stmt->execute();
                                $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                // Imprimimos una a una cada fila de la tabla de clientes.
                                foreach ($clientes as $cliente) : ?>
                                    <tr class="text-center">
                                        <td><?= $cliente['id']; ?></td>
                                        <td><?= $cliente['nombre']; ?></td>
                                        <td><?= $cliente['apellido']; ?></td>
                                        <td><?= $cliente['email']; ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>

                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                            <!--Lógica para desactivar el botón Anterior cuando la página es la 1 -->
                            <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : '' ?>">

                                <!--Obtenemos el número actual de página y le restamos uno -->
                                <a class="page-link" href="clientes.php?pagina=<?php echo $_GET['pagina'] - 1 ?>">
                                    Anterior
                                </a>
                            </li>

                            <?php for ($i = 0; $i < $paginas; $i++) : ?>
                                <li class="page-item <?php printf($_GET['pagina'] == $i + 1 ? 'active' : '') ?>">
                                    <a class="page-link" href="clientes.php?pagina=<?php echo $i + 1  ?>">
                                        <?php printf($i + 1) ?></a>
                                </li>
                            <?php endfor ?>

                            <!--Lógica para desactivar el botón de siguiente cuando se llega a la última página-->
                            <li class="page-item
                            <?php echo $_GET['pagina'] >= $paginas ? 'disabled' : '' ?>
                            ">
                                <a class="page-link" href="clientes.php?pagina=<?php echo $_GET['pagina'] + 1 ?>">
                                    Siguiente</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-1"></div>
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