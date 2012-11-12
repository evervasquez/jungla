<?php

class configurarbd_controlador extends controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        if($_POST['guardar']==1){
            $driver = $_POST['sgbd'];
            $user = $_POST['usuario'];
            $password = $_POST['contraseña'];
            $host = $_POST['host'];
            $port = $_POST['puerto'];
            $dbname = $_POST['basedatos'];

            $configuracion = array("driver" => $driver, "usuario" => $user, "password" => $password, "host" => $host,
                "puerto" => $port, "basedatos" => $dbname);
            $fp = fopen(ROOT.DS."basedatos".DS."config.ini", "w");
            fwrite($fp, "[database]");
            $fp = fopen(ROOT.DS."basedatos".DS."config.ini", "a+");
            foreach ($configuracion as $key => $valor) {
                fwrite($fp, "\n" . $key . " = " . $valor);
            }
            fclose($fp);
            conexion::conexionSingleton();
            echo '<script>
                        alert("conexion correcta");
                        window.location="'.BASE_URL.'";
                    </script>';
        }
        $this->_vista->action = BASE_URL . 'configurarbd';
        $this->_vista->renderizar('index');
    }
    
}

?>
