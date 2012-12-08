<?php

class configurarbd_controlador extends controller{
    
    public function __construct() {
        if (!$this->acceso(46)) {
            $this->redireccionar('error/access/5050');
        }
        parent::__construct();
    }
    
    public function index(){
        if($_POST['guardar']==1){
                $host = $_POST['host'];
                $comando = "ping ".$host; 
                $salida=shell_exec($comando);
                if(strstr($salida,'unreachable') || strstr($salida,'failed') || strstr($salida,'could not find host')){//0 = error, 1 = bien
                    $err = 0;
                } else { $err = 1;}
                if($err==1){
                    $driver = $_POST['sgbd'];
                    $user = $_POST['usuario'];
                    $password = $_POST['clave'];
                    $port = $_POST['puerto'];
                    $dbname = $_POST['basedatos'];
                    $archivo = '';
                    if($driver=='oci'){
                        $archivo = 'OCI';
                    }else{
                        $archivo = 'PDO';
                    }
                    $configuracion = array("archivo" => $archivo, "driver" => $driver, "usuario" => $user, "password" => $password, "host" => $host,
                        "puerto" => $port, "basedatos" => $dbname);
                    $fp = fopen(ROOT.DS."basedatos".DS."config.ini", "w");
                    fwrite($fp, "[database]");
                    $fp = fopen(ROOT.DS."basedatos".DS."config.ini", "a+");
                    foreach ($configuracion as $key => $valor) {
                        fwrite($fp, "\n" . $key . " = " . $valor);
                    }
                    fclose($fp);
        //            conexion::conexionSingleton();
                    echo '<script>
                                alert("Datos GRABADOS Correctamente");
                                window.location="'.BASE_URL.'";
                            </script>';
                } else{
                    echo '<script>
                                alert("No se pudo obtener respuesta del HOST indicado. Los datos seran descartados.");
                                window.location="'.BASE_URL.'";
                            </script>';
                }
                
            }
        $this->_vista->action = BASE_URL . 'configurarbd';
        $this->_vista->setJs(array('funcion'));
        $this->_vista->renderizar('index');
    }
    
}

?>
