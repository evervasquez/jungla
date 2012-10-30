<?php

class error_controlador extends controller
{
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        $this->_vista->mensaje = $this->_get_error();
        $this->_vista->renderizar('index');
    }
    
    public function access($codigo)
    {
        $this->_vista->titulo = 'Error';
        $this->_vista->mensaje = $this->_get_error($codigo);
        $this->_vista->renderizar('access');
    }
    
    private function _get_error($codigo = false)
    {
        if($codigo){
            $codigo = $this->filtrarInt($codigo);
            if(is_int($codigo))
                $codigo = $codigo;
        }
        else{
            $codigo = 'default';
        }        
        
        $error['default'] = 'Ha ocurrido un error y la página no puede mostrarse';
        $error['5050'] = 'Acceso restringido!';
        $error['8080'] = 'Tiempo de la sesion agotado';
        
        if(array_key_exists($codigo, $error)){
            return $error[$codigo];
        }
        else{
            return $error['default'];
        }
    }
}

?>