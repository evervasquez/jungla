<?php

class Main {

    protected static $db;
    private static $stmt;

    public function __construct() {
        $site_path = realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'config.ini';
        try {
            self::$db = DatabaseFactory::create($site_path);
            // $this->exec = DatabaseFactory::getExecute($site_path);
        } catch (PDOException $e) {
            $error = 'Conexion Fallada: ' . $e->getMessage();
            // header("Location:index.php?controller=BaseDatos&action=orror&str=" . $error);
        }
    }

    public static function get_servidor() {
        switch (BaseDatos::$_driver) {
            case 'mssql': $_servidor = "SQL Server ";
                break;
            case 'mysql': $_servidor = "MySql ";
                break;
            case 'pgsql': $_servidor = "PostgreSQL";
                break;
            case 'oci': $_servidor = "ORACLE";
                break;
            default :
                echo "<script>alert('No existe este servidor');
                            window.location='/localhost/';
                        </script>";
                break;
        }
        return $_servidor;
    }

    protected static function get_consulta($pa, $datos) {
        if (BaseDatos::$_archivo != 'OCI') {
            //self::$db->exec("SET CHARACTER SET utf8");
            self::$db->setAttribute(PDO::ATTR_CASE, PDO::CASE_UPPER);
            return self::procedimientoAlmacenado($pa, $datos);
        } else {
            return self::procedimientoAlmacenado_oci($pa, $datos);
        }
    }

//procedimiento oci
    private static function procedimientoAlmacenado_oci($pa, $datos) {
        $identificador = explode('_', $pa);
        $identificador = array_filter($identificador);
        $selec = $identificador[1];
        //die($selec);
//        exit;
        $sql = 'BEGIN ' . $pa;
        if ($datos != null) {
            $sql = $sql . "(";
            if ($selec == 'selecciona') {
                $num_datos = count($datos) + 1;
            } else {
                $num_datos = count($datos);
            }
            for ($i = 1; $i <= $num_datos; $i++) {
                $sql = $sql . ":p" . $i;
                if ($i < $num_datos) {
                    $sql = $sql . ",";
                } else {
                    $sql = $sql . ")";
                }
            }
        }
        $sql = $sql . '; END;';
        //die($sql);
        //poner if en el cursor
        if ($selec == 'selecciona') {
            $cursor = OCI_conexion::crea_cursor();
        }
        self::$stmt = OCI_conexion::ejecutar($sql);
        if ($datos != null) {
            if ($selec == 'selecciona') {
                //die('jaja');
//                print_r($datos);
//                die();
                for ($i = 0; $i < count($datos); $i++) {
                    //oci_bind_by_name(self::$stmt, ":p" . $i, $datos[$i]);
                    // $stmt->bindValue($j, $datos[$i], PDO::PARAM_INT);
                    $numero = $i + 1;
                    //   if (is_int($datos[$i])) {
                    oci_bind_by_name(self::$stmt, ":p" . $numero, $datos[$i]/* , OCI_B_INT */);
                    /* }
                      if (is_string($datos[$i])) {
                      oci_bind_by_name(self::$stmt, ":p" . $numero, $datos[$i], SQLT_STR);
                      }
                      if (is_double($datos[$i])) {
                      //echo 'nose';
                      //$stmt->bindValue($j, $datos[$i], PDO::PARAM_INT);
                      } */
                }
                $num = count($datos) + 1;
                oci_bind_by_name(self::$stmt, ":p" . $num, $cursor, -1, OCI_B_CURSOR);
                OCI_conexion::execute();
                oci_execute($cursor, OCI_DEFAULT);
                return array($cursor, $error);
                $error = 'error';
            } else {
                for ($i = 1; $i < count($datos); $i++) {
                    $numero = $i + 1;
                    oci_bind_by_name(self::$stmt, ":p" . $numero, $datos[$i]/* , OCI_B_INT */);
                }
                OCI_conexion::execute();
                //$error = $stmt->errorInfo();
                //return array($cursor,$error); 
//                oci_fetch_all($cursor,$data,null,null,OCI_FETCHSTATEMENT_BY_ROW);
//                return $data;
            }
        }
        //oci_free_statement($stmt);
        //oci_close(self::$db);
    }

    // procedimiento almacenado para ejecutar consultas
    private function procedimientoAlmacenado($pa, $datos) {
        //arreglar archivo
        //$config = parse_ini_file('config.ini', TRUE);
        $driver = BaseDatos::$_driver;
        switch ($driver) {
            case 'mssql': $sql = "execute ";
                break;
            case 'mysql': $sql = "call ";
                break;
            case 'pgsql': $sql = "select * from ";
                break;
            case 'oci': $sql = "execute ";
                break;
        }
        $sql = $sql . $pa . " ";
        if ($driver != 'mssql') {
            $sql = $sql . "(";
        }

        if ($datos != null) {
            for ($i = 1; $i <= count($datos); $i++) {
                $sql = $sql . "?";
                if ($i < count($datos)) {
                    $sql = $sql . ",";
                } else {
                    if ($driver != 'mssql') {
                        $sql = $sql . ")";
                    }
                }
            }
        } else {
            if ($driver != 'mssql') {
                $sql = $sql . ")";
            }
        }
//        die($sql);
        try {

            if ($driver == 'mysql') {
                //die('jajaja');
                $stmt = self::$db->prepare($sql, array(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true));
            } else {
                $stmt = self::$db->prepare($sql);
            }
            $j = 0;
            if ($datos != null) {
                for ($i = 0; $i < count($datos); $i++) {
                    $j++;
                    if (is_int($datos[$i])) {
                        $stmt->bindValue($j, $datos[$i], PDO::PARAM_INT);
                    }
                    if (is_string($datos[$i])) {
                        $stmt->bindValue($j, $datos[$i], PDO::PARAM_STR);
                    }
                    if (is_double($datos[$i])) {
                        $stmt->bindValue($j, $datos[$i], PDO::PARAM_INT);
                    }
                    if (is_null($datos[$i])) {
                        $stmt->bindValue($j, $datos[$i], PDO::PARAM_NULL);
                    }
                }
            }
            $stmt->execute();
            $error = $stmt->errorInfo();
            if ($driver == 'mssql') {
                if ($error[2] == '(null) [0] (severity 0) [(null)]') {
                    return array($stmt, '');
                } else {
                    die($error[2]);
                }
            } else {
                return array($stmt, $error[2]);
            }

//            return array($stmt,$error[2]);
//            return $stmt;
        } catch (PDOException $e) {
            return false;
            echo '<script>
                alert("Fallo ejecucion!: ' . $e->getMessage() . '");
                    window.location="index.php";
                </script>';
        } catch (Exception $ex) {
            return false;
            echo '<script>
                alert("Fallo ejecucion!: ' . $ex->getMessage() . '");
                    window.location="index.php";
                </script>';
        }
    }

}

?>