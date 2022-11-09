<?php
// PDO
$pdo = new PDO("mysql:host=localhost;dbname=test", 'root', '');
// MySQLi general
// $mysqli = mysqli_connect('127.0.0.1', 'root', '', 'test');
// MySQLi orientado objetos
// $mysqli_poo = new mysqli('127.0.0.1', 'root', '', 'test');

$stmt = $pdo->prepare('SELECT * FROM usuario');
$stmt->execute();
// $stmt->bindColumn(1, $type, PDO::PARAM_INT);
// $stmt->bindColumn(2, $type, PDO::PARAM_STR, 50);
// $stmt->bindColumn(3, $type, PDO::PARAM_STR, 50);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $usuario) {
    printf($usuario['nombre'].' ');
    printf($usuario['apellidos']);
    echo "<br>";
}
?>