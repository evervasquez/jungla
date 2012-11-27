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
    'apellidos' => array('name' => 'apellidos', 'type' => 'xsd:string'),
    'perfil' => array('name' => 'perfil', 'type' => 'xsd:string')
        )
);

$server->wsdl->addComplexType(
'habitaciones',
'complexType',
'struct',
'all',
'',
array(
'nro_habitacion'=>array('name' => 'nro_habitacion', 'type' => 'xsd:string'),
'descripcion'=>array('name' => 'descripcion', 'type' => 'xsd:string'))
);

$server->wsdl->addComplexType(
'habitacion_list',
'complexType',
'array',
'',
'',
array(),
array (
	array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:habitaciones[]')
	),
'tns:habitaciones'
);

$server->register('get_habitaciones',                    // method name
    array('codigo' => 'xsd:string'),          // input parameters
    array('habitacion_list' => 'tns:habitacion_list'),    // output parameters
    'urn:servidor',                         // namespace
    'urn:servidor#get_habitaciones',                   // soapaction
    'rpc',                                    // style
    'encoded',                                // use
    'devuelve el total de habitaciones con sus respectivos datos'        // documentation
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
function get_habitaciones($codigo){
    $obj = new webservice_controlador();
    $res = $obj->selecciona_habitaciones();
    return $res;
}
if (!isset($HTTP_RAW_POST_DATA))
    $HTTP_RAW_POST_DATA = file_get_contents('php://input');
$server->service($HTTP_RAW_POST_DATA);
//$r=login_user('mauro', '123');
//echo '<pre>';
//print_r($r);
//$r=get_habitaciones();
//echo '<pre>';
//print_r($r);
?>

