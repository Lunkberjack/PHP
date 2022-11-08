<?php
require 'connection.php';
session_start(); 

$user = $_POST['user'];
$password = $_POST['clave'];

$count = "SELECT COUNT(*) AS total FROM users WHERE user = '$user' AND password = '$password'";
$query = mysqli_query($connection, $count);
$data = mysqli_fetch_array($query);

if($data['total'] > 0) {
    // Guardamos el nombre de sesión de usuario como el usado para
    // el login exitoso.
    $_SESSION['username'] = $user;
    header("location: ../home_page.php");
} else {
    echo "ERROR: datos incorrectos";
}
?>

https://www.youtube.com/watch?v=37IN_PW5U8E video del llutube