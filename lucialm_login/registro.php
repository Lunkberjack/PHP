<?php 
require 'connection.php';

$mensaje = "";
// Modificamos el tiempo máximo de sesión en php.ini (1h).
ini_set('session.gc_maxlifetime', 3600);
// Las cookies también duran 1h.
ini_set('session.cookie_lifetime', 3600);
// Definimos el nombre de sesión (arbitrario).
// Estos cambios se pueden ver en los registros de phpmyadmin.
// Hay un usuario creado antes de aplicar estos cambios con el 
// nombre de sesión por defecto.
ini_set('session.name', $_POST['user-registro']);

// La sesión cambia cada vez que nos logueamos con un nuevo registro
// y cerramos sesión para loguearnos con otro.
// Además, el nombre de sesión es igual al nombre de usuario registrado.
// Se debería hacer en el login, pero así podemos comprobar los cambios 
// en las entradas de la base de datos.
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

    // TIPO DATO: he comprobado que el resultado devuelto, si devuelve alguno, 
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
