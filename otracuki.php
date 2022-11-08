<?php
if(isset($_COOKIE['MiCuqui'])){
    echo $_COOKIE['MiCuqui']['foo'];
} else {
    setcookie("MiCuquifu", "que");
    // No está terminado xd
    setcookie(("MiCuqui"));
}
?>


