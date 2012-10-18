<?php

require '../../basedatos/conexion.php';
$driver = $_POST['sgbd'];
$user = $_POST['usuario'];
$password = $_POST['contraseña'];
$host = $_POST['host'];
$port = $_POST['puerto'];
$dbname = $_POST['basedatos'];

$configuracion = array("driver" => $driver, "usuario" => $user, "password" => $password, "host" => $host,
    "puerto" => $port, "basedatos" => $dbname);
$fp = fopen("../../basedatos/config.ini", "w");
fwrite($fp, "[database]");
$fp = fopen("../../basedatos/config.ini", "a+");
foreach ($configuracion as $key => $valor) {
    fwrite($fp, "\n" . $key . " = " . $valor);
}
fclose($fp);
conexion::conexionSingleton();
echo '<script>
            alert("conexion correcta");
            window.location="../usuarios/index.php";
        </script>';
?>

