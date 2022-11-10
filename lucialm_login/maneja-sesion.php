 <?php /*
Surgieron ciertos problemas a la hora de usarlo.
Más info en login.php.

class MySessionHandler implements SessionHandlerInterface {
    private $sessionId;
    private $savePath;
    public function __construct() {        
    }
    public function open($savePath, $sessionName):bool
    {
        //obtengo el id de la sesión almacenado en la superglobal
        //de las cookies
        $this-> sessionId = $_COOKIE[$sessionName];
        //se almacena la ruta configurada en php.ini para guardar las 
        //sesiones
        $this->savePath=$savePath;
        echo "Se ha abierto la sesión ".$_COOKIE[$sessionName];
        return true;
    }
    public function destroy($sessionId):bool
    {
        echo "Se ha llamado a destruir la sesión".$sessionId;
        return true;
    }
    public function close(): bool {
        echo "Se ha llamado a cerrar la sesión".$this->sessionId;
        return false;
    }
    
    public function gc(int $max_lifetime): bool {
        return false;
    }
    public function read(string $id): string{
        //se obtiene el contenido completo del fichero de la sesión a partir
        //del id de la misma y la ruta donde se guarda
        $sessionObjects = (string)@file_get_contents($this->savePath."sess_$id");
        echo "Se ha llamado a la sesión para leer lo que tiene= $sessionObjects";
        return $sessionObjects;
    }
    public function write(string $id, string $data): bool{
        echo "Se ha llamado a la sesión para guardar un valor";
        //se guardan los valores añadidos en $_SESSION al fichero
        return file_put_contents($this->savePath."sess_$id", $data) === false ? false : true;
    }
}
$sh = new MySessionHandler();
session_set_save_handler($sh,false);
session_start();

$_SESSION["instante"]=time();
$_SESSION["prueba"]="2dam";
*/
?>