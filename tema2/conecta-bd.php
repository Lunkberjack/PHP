<?php
include_once "usuario.php";
// CONEXIÓN CON PDO -----------------------------------------
$pdo = new PDO("mysql:host=localhost;dbname=test", 'root', '');
// MySQLi general
// $mysqli = mysqli_connect('127.0.0.1', 'root', '', 'test');
// MySQLi orientado objetos
// $mysqli_poo = new mysqli('127.0.0.1', 'root', '', 'test');

// CONSULTA PREPARADA (compila antes de ejecutarse)
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

// MAPEO DE UNA TABLA DE DB HACIA UN OBJETO DE CLASE
// CONSULTA NO PREPARADA (Query)
$result2 = $pdo->query("SELECT id, nombre, apellidos FROM usuario");
if($result2->setFetchMode(PDO::FETCH_CLASS, 'usuario')) {
    // Se ha comprobado que se ha podido realizar el mapeo
    while ($user = $result2->fetch()) {
        echo $user->info()."<br>";
    }
}

// MySQLi orientado a objetos (comentar todo lo de arriba excepto pdo) (Furula)
$mysqli_poo = new mysqli('localhost', 'root', '', 'test');
if($result3 = $mysqli_poo->query("SELECT id, nombre, apellidos FROM usuario")) {
    while($user2 = $result3->fetch_object('usuario')) {
        echo $user2->info()."<br>";
    }
}

// MySQLi general (comentar todo lo de arriba menos PDO) (Furula)
// MySQLi de manera general
$mysqli = mysqli_connect('localhost','root','','test');
if($result4 = mysqli_query($mysqli,"SELECT * FROM usuarios")){
   while($user3 = mysqli_fetch_object($result4,'usuario')){
       echo $use3r->info()."<br>";
   }
}