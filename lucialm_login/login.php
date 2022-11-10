<?php
require 'connection.php';
require 'maneja-sesion.php';
// Inicia una nueva sesión.
session_start();
/* He intentado hacer uso de MySessionHandler, pero me saltaban fatal errors
del tipo "Fatal error: Declaration of MySessionHandler::read(string $id): string must
be compatible with SessionHandlerInterface::read($key) in /opt/lampp/htdocs/lucialm_login/maneja-sesion.php
on line 31" y no he sido capaz de solucionarlos, ni de modificar los métodos.

$sh = new MySessionHandler();
$sh->open($_SESSION['savePath'], $_SESSION['sessionName']); */

if (!empty($_POST['user-login']) && !empty($_POST['pass-login'])) {
    // Guardamos una consulta preparada de SQL en $stmt.
    $stmt = $pdo->prepare("SELECT nombre, pass FROM usuario WHERE nombre = :nombre");
    // Lo que pasemos en 'user-login' se almacenará en :nombre en la consulta.
    $stmt->bindParam(":nombre", $_POST['user-login']);
    $stmt->execute();
    // TIPO DATO: obtenemos un array asociativo al ejecutar.
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Si ha encontrado un resultado donde la cuenta almacenada tenga las mismas
    // credenciales que las introducidas en el loginm y las contraseñas coinciden:
    if (count($result) > 0 && password_verify($_POST['pass-login'], $result['pass'])) {
        // Guardamos el nombre de usuario de la sesión en una variable de sesión PHP.
        $_SESSION['username'] = $_POST['user-login'];
        // Redirigimos a una nueva página (bienvenida).
        header("Location: home.php");
    } else {
        // Algo ha salido mal con los datos. Redirigimos a pág de error.
        header("Location: error-login.html");
    }
}
