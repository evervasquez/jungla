<?php

abstract class controller {

    protected $_vista;
    protected $_modelo;

    //aqui ya tenemos el objeto vista disponible en el controlador
    public function __construct() {
        
        $this->_modelo = $this->cargar_modelo('modulos');
        $this->_modelo->idmodulo = 9999;
        $menu=$this->_modelo->selecciona();
        $this->_vista = new view(new request, $menu);
        
        
    }

    abstract public function index();

    protected function cargar_modelo($modelo, $modulo = false) {
        //ruta del modelo
        $rutaModelo = ROOT . 'modelo' . DS . $modelo . '.php';
        //die($rutaModelo);
        /* if(!$modulo){
          $modulo = $this->_request->getModulo();
          }

          if($modulo){
          if($modulo != 'default'){
          $rutaModelo = ROOT . 'modules' . DS . $modulo . DS . 'models' . DS . $modelo . '.php';
          }
          } */

        //verificamos si exxiste y es legible
        if (is_readable($rutaModelo)) {
            //requerimos el archivo
            require_once $rutaModelo;
            //instanciamos
            $modelo = new $modelo;

            return $modelo;
        } else {
            throw new Exception('Error de modelo');
        }
    }

    protected function redireccionar($ruta = false) {
        if ($ruta) {
            header('location:' . BASE_URL . $ruta);
            exit;
        } else {
            header('location:' . BASE_URL);
            exit;
        }
    }

    protected function filtrarInt($int) {
        $int = (int) $int;
        if (is_int($int)) {
            return $int;
        } else {
            return 0;
        }
    }
    
    protected function fecha_en($fecha) {
	$d=substr($fecha,0,2);
	$m=substr($fecha,3,2);
	$a=substr($fecha,6,4);
	return "$a-$m-$d";
    }
    
    public function acceso($perfil,$modulo){
        if (!session::get('autenticado')) {
            header('location:' . BASE_URL . 'error/access/5050');
            exit;
        }
        $permisos = $this->cargar_modelo('permisos');
        $permiso=$permisos->seleccionar($perfil,$modulo);
        if($permiso[0]['perfil']==''){
            return false;
        }else{
            return true;
        }
    }

}

?>
