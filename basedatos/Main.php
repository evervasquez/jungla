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
            //$error = 'Conexion Fallada: ' . $e->getMessage();
            // header("Location:index.php?controller=BaseDatos&action=orror&str=" . $error);
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
            ?> 

            <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                    <script type="text/javascript" src="<?php echo BASE_URL ?>lib/js/jquery.js"></script>
                    <script type="text/javascript" src="<?php echo BASE_URL ?>lib/js/jquery.min.js"></script>

                    <script type="text/javascript">
                        alert("¡Conexion Fallida!. El sistema se inicializara, los datos que hayan sido guardados no se perderan.");
                        
                        $(document).ready(function(){
                            setTimeout("$('#bienvenido1').fadeIn(600)",0);
                            setTimeout("$('#bienvenido1').fadeOut(500)",1900);
                            setTimeout("$('#bienvenido2').fadeIn(600)",1700);
                            setTimeout("$('#bienvenido2').fadeOut(400)",3200);
                            setTimeout("$('#bienvenido2').fadeIn(500)",3500);
                            setTimeout("$('#bienvenido2').fadeOut(500)",4700);
                            setTimeout("$('#bienvenido3').fadeIn(500)",5000);
                            setTimeout("$('#bienvenido3').fadeOut(1500)",7500);
                            setTimeout("$('#formulario_bd').fadeIn(500)",7800);
                                        
                            var delay_linea = 8000;//8000
                            var intervalo = 500;
                            setTimeout("$('#linealogo').fadeIn(500)",delay_linea);
                            setTimeout("$('#linea1').fadeIn(500)",delay_linea+(intervalo*2));
                            setTimeout("$('#linea2').fadeIn(500)",delay_linea+(intervalo*3));
                            setTimeout("$('#linea3').fadeIn(500)",delay_linea+(intervalo*4));
                            setTimeout("$('#linea4').fadeIn(500)",delay_linea+(intervalo*5));
                            setTimeout("$('#linea5').fadeIn(500)",delay_linea+(intervalo*6));
                            setTimeout("$('#linea6').fadeIn(500)",delay_linea+(intervalo*7));
                            setTimeout("$('#linea7').fadeIn(500)",delay_linea+(intervalo*8));
                                        
                        });
                    </script>
                </head>
                <body>
                    <div id="bienvenido1" style="display: none; width: 100%; height: 100%; position:absolute;top:50%;margin-top:-50px;">
                        <table align="center"><tr><td><text style="font-family: Arial; font-size: 50;">Bienvenido</text></td></tr></table></div>
                    <div id="bienvenido2" style="display: none; width: 100%; height: 100%; position:absolute;top:50%;margin-top:-50px;">
                        <table align="center"><tr><td><text style="font-family: Arial; font-size: 26;">Procederemos a inicializar el sistema...</text></td></tr></table></div>
                    <div id="bienvenido3" style="display: none; width: 100%; height: 100%; position:absolute;top:50%;margin-top:-50px;">
                        <table align="center"><tr><td><text style="font-family: Arial; font-size: 26;">Necesitaremos datos t&eacute;cnicos del sistema.<br>Contacte con el administrador si es que los desconoce.</text></td></tr></table></div>
                    <div id="linealogo" style="display: none; width: 100%; height: 100%; position:absolute;top:20%;margin-top:-50px;" align="center">
                        <img src="<?php echo BASE_URL ?>lib/img/logo.png" height="91" width="383" />
                    </div>
                    <div id="formulario_bd" style="width: 100%; height: 100%; position:absolute;top:40%;margin-top:-50px;">
                        <form method="post" action="index" id="frm" >
                            <input type="hidden" name="guardar" id="guardar" value="1"/>

                            <table class="tabForm" align="center">
                                
                                <tr style="display: none" id="linea1">
                                    <td><label for="sgbd"><text style="font-family: Arial">SGBD: </text></label></td>
                                    <td>
                                        <select placeholder="Seleccione..." class="combo" name="sgbd" required id="sqbd">
                                            <option></option>
                                            <option value="mysql">MySQL</option>            
                                            <option value="pgsql">PostgreSQL</option>            
                                            <option value="mssql">SQL Server</option>            
                                            <option value="oci">Oracle</option>            
                                        </select>
                                        <span class="k-invalid-msg" data-for="sgbd"></span>
                                    </td>
                                    <td>
                                        <div class="k-invalid-msg msgerror" data-for="sgbd"></div>
                                    </td>
                                </tr>
                                <tr style="display: none" id="linea2">
                                    <td><label for="usuario"><text style="font-family: Arial">Usuario: </text></label></td>
                                    <td><input type="text" placeholder="Ingrese usuario" required class="k-textbox" name="usuario" value="" /></td>
                                    <td>
                                        <div class="k-invalid-msg msgerror" data-for="usuario"></div>
                                    </td>
                                </tr>
                                <tr style="display: none" id="linea3">
                                    <td><label for="password"><text style="font-family: Arial">Clave: </text></label></td>
                                    <td><input type="password" placeholder="Ingrese contrase&ntilde;a" class="k-textbox" name="clave" value="" /></td>
                                    <td>
                                        <div class="msgerror"></div>
                                    </td>
                                </tr>
                                <tr style="display: none" id="linea4">
                                    <td><label for="host"><text style="font-family: Arial">Host: </text></label></td>
                                    <td><input type="text" placeholder="Ingrese host" class="k-textbox" required name="host" value="" /></td>
                                    <td>
                                        <div class="k-invalid-msg msgerror" data-for="host"></div>
                                    </td>
                                </tr>
                                <tr style="display: none" id="linea5">
                                    <td><label for="puerto"><text style="font-family: Arial">Puerto: </text></label></td>
                                    <td><input type="text" placeholder="Ingrese puerto" class="k-textbox" required name="puerto" value="" /></td>
                                    <td>
                                        <div class="k-invalid-msg msgerror" data-for="puerto"></div>
                                    </td>
                                </tr>
                                <tr style="display: none" id="linea6">
                                    <td><label for="basedatos"><text style="font-family: Arial">Base de Datos: </text></label></td>
                                    <td><input type="text" placeholder="Ingrese nombre bd" class="k-textbox" required name="basedatos" value="" /></td>
                                    <td>
                                        <div class="k-invalid-msg msgerror" data-for="basedatos"></div>
                                    </td>
                                </tr>
                                <tr style="display: none" id="linea7">
                                    <td colspan="2" align="center">
                                        <p><button type="submit" class="k-button" id="saveform">Guardar</button>
                                            <button type="button" class="k-button cancel" onclick="window.location = '<?php echo BASE_URL ?>'">Cancelar</button></p>
                                    </td>
                                    <td>
                                        <div class="msgerror"></div>
                                    </td>
                                </tr>
                            </table>

                        </form>
                    </div>
                </body>
            </html>

            <?php
            die();
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
                    $url=str_replace(' ', '_', $error[2]);
                    die("<script> window.location=\"".BASE_URL."error/error_bd/".$url."\" ; </script>");
                }
            } else {
                return array($stmt, $error[2]);
//                if($error[2]!=''){
//                    return array($stmt, $error[2]);
//                }else{
//                    $url=str_replace(' ', '_', $error[2]);
//                    die("<script> window.location=\"".BASE_URL."error/error_bd/".$url."\" ; </script>");
//                }
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