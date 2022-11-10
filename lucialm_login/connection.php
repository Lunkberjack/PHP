<?php
try {
    // Conectamos usando PDO y nuestras credenciales.
    $pdo = new PDO("mysql:host=localhost;dbname=login", 'root', '');
} catch (PDOException $e) {
    die("Conexión fallida");
}
?>