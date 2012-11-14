<?php

class conexion extends PDO{

    private static $instancia = null;
    public static $_servidor = null;
    
    public function __construct() {
        if (!is_null(self::$instancia)) {
            return self::$instancia;
        }
        $file = 'config.ini';
        $settings = parse_ini_file($file, TRUE);
        $dsn = $settings['database']['driver'] . ':dbname=' . $settings['database']['basedatos'] . '; host=' . $settings['database']['host'] . '; port=' . $settings['database']['puerto'];
        self::$_servidor=$settings['database']['driver'];
        $user = $settings['database']['usuario'];
        $password = trim($settings['database']['password']);
        try {
            self::$instancia = parent::__construct($dsn, $user, $password);
            return self::$instancia;
        } catch (PDOException $e) {
            echo '<script>
                alert("Conexion Fallida!: ' . $e->getMessage() . '");
                    window.location="index.php";
                </script>';
        }
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
