<?php
$item = "producto";
if(isset($_COOKIE['conteo'])) {
    echo $_COOKIE['conteo'] + 1;
} else {
    $conteo = 1;
}

if(setcookie('conteo', $conteo, time()+3600)) {
    $item .= $conteo;
    setcookie("Carrito[$conteo]", $item, time()+ 3600);
}
?>