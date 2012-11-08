<?php
$ns = 'http://localhost/sisjungla/webservice/';
$ep= 'http://localhost/sisjungla/webservice/servidor.php';
//se crea un objeto soap_server
$server = new soap_server();
//se configura el servidor
$server->configureWSDL('Servicio Web del Albergue Turistico la Jungla', $ns,$ep);
//$server->namespaces="http://alberguelajunglaconvenciones.com";
//$server->wsdl->schemaTargetNamespace = $ns;

//declaran lo tipo de variables
$server->wsdl->addComplexType(
        'login', 
        'complexType', 
        'struct', 
        'all', 
        '', 
        array(
    'nombres' => array('name' => 'nombres', 'type' => 'xsd:string'),
    'apellidos' => array('name' => 'apellidos', 'type' => 'xsd:string')
        )
);

$server->register('login_user', // method name
        array('user' => 'xsd:string', 'clave' => 'xsd:string'), // input parameters
        array('login' => 'tns:login'), // output parameters
        'urn:servidor', // namespace
        'urn:servidor#login_user', // soapaction
        'rpc', // style
        'encoded', // use
        'Este Metodo permite hacer login en el sistema'        // documentation
);

//////***********funcion para validar usuario****************

function login_user($user, $clave) {
    $obj = new webservice_controlador();
    $res = $obj->login_usuario($user, $clave);
    return $res;
}

if (!isset($HTTP_RAW_POST_DATA))
    $HTTP_RAW_POST_DATA = file_get_contents('php://input');
$server->service($HTTP_RAW_POST_DATA);
//$r=login_user('mauro', '123');
//echo '<pre>';
//print_r($r);
//prin
?>

