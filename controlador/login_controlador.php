<?php

class login_controlador extends controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        session::set('autenticado', true);
        session::set('level', 'especial');
        session::set('var1', 'var1');
        session::set('var2', 'var2');

        $this->redireccionar('login/mostrar');
    }

    public function mostrar() {
        echo 'Level: ' . session::get('level') . '<br>';
        echo 'Var1: ' . session::get('var1') . '<br>';
        echo 'Var2: ' . session::get('var2') . '<br>';
    }

    public function cerrar() {
        session::destroy();
        $this->redireccionar('login/mostrar');
    }

}

?>
