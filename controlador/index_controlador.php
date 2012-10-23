<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 */

class index_controlador extends controller {

    function __construct() {
    //llamamos al metodo constructor de la clase padre
        parent::__construct();
    }

    function index() {
        //enviamos el parametro a la vista index.phtml
        //$this->_vista->titulo = 'Portada';
        //llamamos al metodo renderizar para que muestre la vista enviada
        //por parametro
        $this->_vista->renderizar('index');
    }

}

?>
