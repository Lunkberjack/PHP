<?php
// Se crea una nueva cookie y se le asigna valor y caducidad.
setcookie("MiPrimeraCookie", "Galleta de chocolate", time()+60);
// Printea la cuqui
echo htmlspecialchars(print_r($_COOKIE, true));
?>