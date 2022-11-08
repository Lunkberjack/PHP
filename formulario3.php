<html>
    <head></head>
    <body>
        <p>Mi cerveza favorita es:
        <?php
            if($_POST['cerveza']){                
                //setcookie('cervezafav',$_POST['cerveza'],time()+3600);
                echo $_POST['cerveza[]'];            
            } else {
                echo 'seleccione una cerveza';
            }
        ?>
        </p>
            
        <form action="" method="post">
            <select multiple name="cerveza[]">
                <option value="warthog">Warthog</option>
                <option value="guinness">Guinness</option>
                <option value="stuttgarter">Stuttgarter Schwabenbräu</option>
            </select><br/>
            <input type="submit" value="Enviar"/>
        </form>
    </body>
</html>