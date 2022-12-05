<?php
require 'connection.php';

if (!empty($_POST['user-cambio']) && !empty($_POST['pass-cambio']) && !empty($_POST['pass-cambio2'])) {
    $stmtDupli = $pdo->prepare("SELECT nombre FROM usuario WHERE nombre = :nombre");
    $stmtDupli->bindParam(":nombre", $_POST['user-registro']);
    $stmtDupli->execute();
    $resultDupli = $stmtDupli->fetch(PDO::FETCH_ASSOC);

    if (count($resultDupli) > 0 && $resultDupli['nombre'] != null) {
        // El nombre de usuario no está disponible.
        header("Location: error-cambio.html");

        // Si las dos contraseñas coinciden:
    } elseif ($_POST['pass-cambio'] == $_POST['pass-cambio2']) {
        $sql = "UPDATE usuario SET nombre = :nuevoNombre WHERE nombre = :nombre";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombre', $_COOKIE['NombreUsuario']);
        $stmt->bindParam(':nuevoNombre', $_POST['user-cambio']);
        $stmt->execute();

        // Ciframos la contraseña, con cifrado tipo hash.
        $cifrada = password_hash($_POST['pass-cambio'], PASSWORD_BCRYPT);
        // La pasamos a la consulta una vez cifrada.
        $sql = "UPDATE usuario SET pass = :nuevaPass WHERE nombre = :nombre";
        $stmt->bindParam(':nuevaPass', $cifrada);
        $stmt->bindParam(':nombre', $_POST['user-cambio']);
        $stmt->execute();

        header("Location: exito-cambio.html");
    } else {
        // Las dos contraseñas no coinciden.
        header("Location: error-cambio.html");
    }
}
?>