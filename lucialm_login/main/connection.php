<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "login";

$connection = mysqli_connect($host, $user, $password, $database);

if($connection) {
    echo "Conexión realizada con éxito";
} else {
    echo "ERROR: ha habido un problema con la conexión";
}
?>