<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of view
 *
 * @author pedro
 */
class view {

    //put your code here
    private $_controlador;

    //parametro request = es el parametro del ccontrolador
    public function __construct(request $peticion) {
        //guardamos el nombre del controlador
        $this->_controlador = $peticion->get_controlador();
    }

    public function renderizar($vista, $item = false) {
        //aqui podemos poner el menu
        //creamos la ruta de la vista
<<<<<<< HEAD
        $ruta_vista = ROOT . 'vista' . DS . $this->_controlador . DS . $vista.'.php';
=======
        $ruta_vista = ROOT . 'vista' . DS . $this->_controlador . DS . $vista. '.php';
>>>>>>> fe9e342fdd94667ad8dbf4bf5666d50d03d24675
        //die($ruta_vista);
        //comprobamos si el archivo existe y es legible
        //die($ruta_vista);
        if (is_readable($ruta_vista)) {
            //enviamos parametros como css, js
            //archivos propios del template
            /* $_layoutParams= array(
              'ruta_css'=> BASE_URL.'vistas/layout/'.DEFAULT_LAYOUT.'/css/',
              'ruta_img'=> BASE_URL.'vistas/layout/'.DEFAULT_LAYOUT.'/img/',
              'ruta_js'=> BASE_URL.'vistas/layout/'.DEFAULT_LAYOUT.'/js/',
              'menu'=> $menu
              ); */

            //incluimos los layout
            include_once ROOT . DS . 'cabecera.php';

            include_once $ruta_vista;
            include_once ROOT . DS . 'pie.php';
            //incluimos la vista
        } else {
            throw new Exception('Error de vista');
        }
    }

}

?>