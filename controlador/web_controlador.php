<?php

class web_controlador extends controller {

    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->_vista->setJs(array('jflow.plus.min'));
        $this->_vista->setJs(array('funciones_index'));
        $this->_vista->setCss(array('estilos_index'));
        $this->_vista->setCss(array('jflow.style'));
        $this->_vista->renderiza_web('index');
    }
    
    public function servicios(){
        $this->_vista->setCss(array('estilos_servicios'));
        $this->_vista->renderiza_web('servicios');
    }
    public function fotos(){
        $this->_vista->setJs(array('jquery.lightbox'));
        $this->_vista->setCss(array('jquery.lightbox'));
        $this->_vista->setJs(array('funciones_fotos'));
        $this->_vista->setCss(array('estilos_fotos'));
        $this->_vista->renderiza_web('fotos');
    }
    public function contactenos(){
        $this->_vista->setCss(array('estilos_contactenos'));
        $this->_vista->renderiza_web('contacto');
    }
    public function enviar(){
        
        $this->get_Libreria('mail' . DS . 'class.phpmailer');
        $mail = new PHPMailer();
        
        $nombre = $_POST['nombreContacto'];
        $email = $_POST['emailContacto'];
        $telefono = $_POST['telefonoContacto'];
        $mensaje = $_POST['mensaje'];

        $mail->FromName = $nombre;
        $mail->Body = '<strong>Hola Albergue Turistico La Jungla</strong><br>'.
                '<p>Soy '.$nombre.'</p><br><p>Mi Email '.$email.'</p><br>'.
                '<p>Mi Telefono '.$telefono.'</p><br>'.
                '<p>Y este es mi mensaje: <p><br><p>'.$mensaje.'</p>';
        $mail->AltBody = 'Su servidor de correo no soporta Html';
        $mail->AddAddress('jair_vr_10@hotmail.com');
        $mail->Send();
        $this->_vista->mensaje = "Mensaje enviado";
        $this->_vista->renderiza_web('contacto');
    }
}

?>
