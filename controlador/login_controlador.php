<?php

class login_controlador extends controller {
    
    private $_empleados;
    
    public function __construct() {
        parent::__construct();
        $this->_empleados=  $this->cargar_modelo('empleados');
    }

    public function index() {
        $datos=$this->_empleados->seleccionar($_POST['usuario'],$_POST['clave']);
        if($datos['usuario']=$_POST['usuario'] && $datos['idempleado']!=''){
            session::set('autenticado', true);
            session::set('empleado', $datos['nombres'].' '.$datos['apellidos']);
            session::set('idempleado', $datos['idempleado']);
            session::set('perfil', $datos['perfil']);
            session::set('idperfil', $datos['idperfil']);
            $this->redireccionar();
        }else{
            echo '<script>alert("usuario o clave incorrecta")</script>';
            $this->redireccionar();
        }
    }
    
    public function mostrar() {
        echo 'Empleado: ' . session::get('empleado') . '<br>';
        echo 'Perfil: ' . session::get('perfil') . '<br>';
    }

    public function cerrar() {
        session::destroy();
        echo '<script>alert("Sesion finalizada")</script>';
        $this->redireccionar();
//        $this->redireccionar('login/mostrar');
    }

}

?>
