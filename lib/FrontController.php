<?php
class FrontControllerException extends Exception {  }
class FrontController {

    public static function Main() {
        $controladorDir = "/sisjungla/controlador/";
        // Obtenemos el controlador y la accion
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                $controlador = $_GET['controlador'];
                $accion = $_GET['accion'];
                break;
            case 'POST':
                $controlador = $_POST['controlador'];
                $accion = $_POST['accion'];
                break;
            default:
                break;
        }
        if (empty($controlador)) { // Comprobamos si esta vacia, si asi es definimos que por defecto cargue Index
            $controlador = "principal";
        }
        if (empty($accion)) { // Comprobamos tambien..
            $accion = "princial";
        }
        if (!isset($_SESSION['user']) && empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
            header('Location: ../index.php');
        } else {
            if (isset($_SESSION['idoficina'])) {
                
            } else {
                header('Location: seleccion.php');
            }
        }
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' && !isset($_SESSION['user'])) {
            header('NOT_AUTHORIZED: 499');
            die();
        }
        $controladorFile = $controladorDir . $controlador . "_controller.php";
        if (!file_exists($controladorFile)) { // Si no existe el archivo lanzamos una excepcion
            $msg = self::msgerror(" No se encontro el archivo especificado ! &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ( &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php'>Regresar</a>");
            die($msg);
        } else {
            require_once $controladorFile;
        }

        $controladorClass = $controlador . "_controlador";

        if (!class_exists($controladorClass, false)) { // Si existe el archivo pero no esta la clase lanzamos otra excepcion        
            $msg = self::msgerror(" El controlador fue cargado pero no se encontro la clase ! &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ( ");
            die($msg);
        }

        $controladorInst = new $controladorClass();
        if (!is_callable(array($controladorInst, $accion))) { // Comprobamos si la accion es posible llamarla
            $msg = self::msgerror(" El controlador no tiene definida la accion " . $accion . " ! &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ( ");
            die($msg);
        } else {
            $controladorInst->$accion(); // Llamamos a la accion y dejamos el proceso al controlador
        }
    }

    function msgerror($msg) {
        $html = "<div style='padding:10px; margin:20px auto; border:1px solid #000; width:500px; background:#dadada'>";
        $html .= $msg;
        $html .= "</div>";
        return $html;
    }

}

?>