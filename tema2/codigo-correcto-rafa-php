<?php
include_once "usuario.php";

//PDO
try {
    //conexión con PDO
    //---------------------------------------------------------------------------
    //$pdo = new PDO("mysql:host=127.0.0.1;dbname=hlc2damblog",'root','usuario');
    //consulta preparada, es decir se compila antes de ejecutar
    //$exec = $pdo->prepare("SELECT nombre,apellidos FROM usuarios");
    //$exec->execute();
    //$stmt->bindColumn(1, $type, PDO::PARAM_STR, 40);
    //$stmt->bindColumn(2, $type, PDO::PARAM_STR, 80);    
    //$result = $exec->fetch(PDO::FETCH_ASSOC);
    //print_r($result);    

    //mapeo de una tabla de la bbdd con PDO hacia un objeto de una clase
    //consulta no preparada
    /*$result = $pdo->query("SELECT id,nombre,apellidos FROM usuarios");
    //mapeo de tabla a objeto de una clase Usuario
    if($result->setFetchMode(PDO::FETCH_CLASS,'Usuario')){
        //se ha comprobado que se ha podido realizar el mapeo
        while($user = $result->fetch()){
            echo $user->info()."\n";
        }
    }*/
    //---------------------------------------------------------------------------
    //MySQLi orientado a objetos
    /*$mysqlipoo = new mysqli('localhost','root','usuario','hlc2damblog');
    if($result = $mysqlipoo->query("SELECT id,nombre,apellidos FROM usuarios")){
        while($user=$result->fetch_object('Usuario')){
            echo $user->info()."\n";
        }
    }*/
    //MySQLi de manera general
    $mysqli = mysqli_connect('localhost','root','usuario','hlc2damblog');
    if($result = mysqli_query($mysqli,"SELECT * FROM usuarios")) {
        while($user = mysqli_fetch_object($result,'Usuario')){
            echo $user->info()."\n";
        }
    }

} catch(PDOException $e) {
    echo $e->getMessage();
}
//binding de las columnas de la tabla a variabesl con sus tipos
//de datos correpondientes

print("\n");
?>