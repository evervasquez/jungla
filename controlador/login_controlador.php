<?php

class login_controlador extends controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        session::set('autenticado', true);
        session::set('empleado', 'Mauro Flores');
        session::set('perfil', 'administrador');
//        session::set('perfil', 'vendedor');
        
        $this->redireccionar();
//        $this->redireccionar('login/mostrar');
    }

    public function mostrar() {
        echo 'Empleado: ' . session::get('empleado') . '<br>';
        echo 'Perfil: ' . session::get('perfil') . '<br>';
    }

    public function cerrar() {
        session::destroy();
        $this->redireccionar();
//        $this->redireccionar('login/mostrar');
    }

}

?>
