<?php

class login_controlador extends controller {
    
    private $_empleados;
    
    public function __construct() {
        parent::__construct();
        $this->_empleados=  $this->cargar_modelo('empleados');
    }

    public function index() {
        $datos=$this->_empleados->seleccionar($_POST['usuario'],$_POST['clave']);
        
        if($datos['USUARIO']==$_POST['usuario'] && $datos['IDEMPLEADO']!=''){
            session::set('autenticado', true);
            session::set('empleado', $datos['NOMBRES'].' '.$datos['APELLIDOS']);
            session::set('idempleado', $datos['IDEMPLEADO']);
            session::set('perfil', $datos['PERFIL']);
            session::set('idperfil', $datos['IDPERFIL']);
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
    }

}

?>
