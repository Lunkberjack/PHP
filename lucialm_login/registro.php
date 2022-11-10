<?php 
require 'connection.php';

$mensaje = "";

session_start();

// Para almacenar datos de la sesión en BD.
$path = session_save_path();
$id = session_id();
$name = session_name();

// Si los tres campos no están vacíos:
if(!empty($_POST['user-registro']) && !empty($_POST['pass-registro']) && !empty($_POST['pass-confirmar'])) {
    $stmtDupli = $pdo->prepare("SELECT nombre FROM usuario WHERE nombre = :nombre");
    $stmtDupli->bindParam(":nombre", $_POST['user-registro']);
    $stmtDupli->execute();
    $resultDupli = $stmtDupli->fetch(PDO::FETCH_ASSOC);

    // He comprobado que el resultado devuelto, si devuelve alguno, 
    // no sea de tipo null. Funcionaba mal si no se comprobaba, y pensé
    // que ese podía ser el problema (no me ha quedado muy claro).
    if(count($resultDupli) > 0 && $resultDupli['nombre'] != null) {
        // El nombre de usuario no está disponible.
        header("Location: error-registro.html");

    // Si las dos contraseñas coinciden:
    } elseif($_POST['pass-registro'] == $_POST['pass-confirmar']) {
        $sql = "INSERT INTO usuario VALUES (:nombre, :pass, :savepath, :id, :nombresesion)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombre', $_POST['user-registro']);
        // Ciframos la contraseña, cifrado tipo hash.
        $cifrada = password_hash($_POST['pass-registro'], PASSWORD_BCRYPT);
        // La pasamos a la consulta una vez cifrada.
        $stmt->bindParam(':pass', $cifrada);
        $stmt->bindParam(':savepath', $path);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombresesion', $name);
        
        // Insertamos al nuevo usuario en la base de datos.
        $stmt->execute();
        header("Location: cuenta-creada.html");
    } else {
        // Las dos contraseñas no coinciden.
        header("Location: error-registro.html");
    }
}
