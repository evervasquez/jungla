<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of controlador
 *
 * @author pedro
 */
abstract class controller{

    protected $_vista;

    //aqui ya tenemos el objeto vista disponible en el controlador
    public function __construct() {
        $this->_vista = new view(new request);

    }

    abstract public function index();
}

?>
