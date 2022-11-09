<?php 
require 'connection.php';

$mensaje = "";

if(!empty($_POST['user-registro']) && !empty($_POST['pass-registro']) && !empty($_POST['pass-confirmar'])) {
    if($_POST['pass-registro'] == $_POST['pass-confirmar']) {
        $sql = "INSERT INTO usuario(nombre, pass) VALUES (:nombre, :pass)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombre', $_POST['user-registro']);
        // Ciframos la contraseña
        $cifrada = password_hash($_POST['pass-registro'], PASSWORD_BCRYPT);
        // La pasamos una vez cifrada
        $stmt->bindParam(':pass', $cifrada);

        if($stmt->execute()) {
            header("location: cuenta-creada.html");
        }
    } else {
        header("location: error-registro.html");
    }
}
?>