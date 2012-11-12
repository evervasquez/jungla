<?php

class conexion {

    private static $instancia = null;
    public static $_servidor = null;

    public static function conexionSingleton() {
        if (self::$instancia != null) {
            return self::$instancia;
        }
        $file = 'config.ini';
        $settings = parse_ini_file($file, TRUE);
        $dsn = $settings['database']['driver'] . ':dbname=' . $settings['database']['basedatos'] . '; host=' . $settings['database']['host'] . '; port=' . $settings['database']['puerto'];
        self::$_servidor=$settings['database']['driver'];
        $user = $settings['database']['usuario'];
        $password = trim($settings['database']['password']);
//        die($dsn . " - " . $user . " - " . $password);

        try {
            self::$instancia = new PDO($dsn, $user, $password);
//            echo '<script>
//                alert("conexion correcta ' . $settings['database']['driver'] . '");
//                </script>';
            return self::$instancia;
        } catch (PDOException $e) {
            echo '<script>
                alert("Conexion Fallida!: ' . $e->getMessage() . '");
                    window.location="index.php";
                </script>';
        }
    }

    public static function __callStatic($name, $args) {
        $callback = array(self :: conexionSingleton(), $name);
        return call_user_func_array($callback, $args);
    }

    /*  para mostrar en que servidor estamos*/
    public static function get_servidor() {
        switch (self::$_servidor) {
            case 'mssql': $_servidor = "SQL Server ";
                break;
            case 'mysql': $_servidor = "MySql ";
                break;
            case 'pgsql': $_servidor = "PostgreSQL";
                break;
            case 'oci': $_servidor = "Oracle";
                break;
            default :
                echo "<script>alert('No existe este servidor');
                            window.location='/localhost/';
                        </script>";
                break;
        }
        return $_servidor;
    }

}

?>
