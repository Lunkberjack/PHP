<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo("Me cago en dios");
        echo("<br>AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA<br>");
        $a = 1.23456789;
        $b = 1.23456789;
        $epsilon = 0.00001;
        
        if(abs($a-$b) < $epsilon) {
            echo "true";
        }
        
        $array = array(
            true => "a",
            "1" => "b",
            1.5 => "c",
            1 => "d"
        );
    ?>
</body>
</html>
