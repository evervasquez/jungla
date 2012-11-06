<?php
$ns = BASE_URL . 'servicio/index.php';
//se crea un objeto soap_server
$server = new soap_server();
//se configura el servidor
$server->configureWSDL('Servicio Web del Albergue Turistico la Jungla', $ns);
//$server->namespaces="http://alberguelajunglaconvenciones.com";
$server->wsdl->schemaTargetNamespace = $ns;

//declaran lo tipo de variables
$server->wsdl->addComplexType(
        'login', 'complexType', 'struct', 'all', '', array(
    'nombres' => array('name' => 'nombres', 'type' => 'xsd:string'),
    'apellidos' => array('name' => 'apellidos', 'type' => 'xsd:string')
        )
);

$server->wsdl->addComplexType(
        'cursos', 'complexType', 'struct', 'all', '', array(
    'NOMBRE_CURSO' => array('name' => 'NOMBRE_CURSO', 'type' => 'xsd:string'),
    'PROFESOR' => array('name' => 'PROFESOR', 'type' => 'xsd:string'))
);

$server->wsdl->addComplexType(
        'cursos_list', 'complexType', 'array', '', '', array(), array(
    array('ref' => 'SOAP-ENC:arrayType', 'wsdl:arrayType' => 'tns:cursos[]')
        ), 'tns:cursos'
);

$server->wsdl->addComplexType(
        'horario', 'complexType', 'struct', 'all', '', array(
    'HORARIO_P' => array('name' => 'HORARIO_P', 'type' => 'xsd:string'),
    'COD_CURSO' => array('name' => 'COD_CURSO', 'type' => 'xsd:string')
        )
);

$server->wsdl->addComplexType(
        'horario_list', 'complexType', 'array', '', '', array(), array(
    array('ref' => 'SOAP-ENC:arrayType', 'wsdl:arrayType' => 'tns:horario[]')
        ), 'tns:horario'
);
//$server->register('validarlogin',array('user' => 'xsd:string','clave' => 'xsd:string'), array('return' => 'xsd:array'),$ns);
//$server->wsdl->addComplexType('estructura', 'complexType', 'array', 
//'','SOAP-ENC:Array', array(),
//array(array('ref' => 'SOAP-ENC:arrayType', 'wsdl:arrayType' => 'tns:consulta[]')),'tns:consulta');

$server->register('login_user', // method name
        array('user' => 'xsd:string', 'clave' => 'xsd:string'), // input parameters
        array('ResultObject' => 'tns:login'), // output parameters
        'urn:servidor', // namespace
        'urn:servidor#login_user', // soapaction
        'rpc', // style
        'encoded', // use
        'Este Metodo permite hacer login en el sistema'        // documentation
);

$server->register('get_curso', // method name
        array('codigo' => 'xsd:string'), // input parameters
        array('cursos_list' => 'tns:cursos_list'), // output parameters
        'urn:servidor', // namespace
        'urn:servidor#get_curso', // soapaction
        'rpc', // style
        'encoded', // use
        'devuelve los cursos de un alumno'        // documentation
);

$server->register('get_horario', // method name
        array('codigo' => 'xsd:string'), // input parameters
        array('horario_list' => 'tns:horario_list'), // output parameters
        'urn:servidor', // namespace
        'urn:servidor#get_horario', // soapaction
        'rpc', // style
        'encoded', // use
        'devuelve el horario de un alumno'        // documentation
);

//////***********funcion para validar usuario****************

function login_user($user, $clave) {
    $obj = new webservice_controlador();
    //$res=  servicio_controlador::login_usuario($user, $clave);
    //return new soapval('login','tns:login',$res);
    $res = $obj->login_usuario($user, $clave);
    //return new soapval('login','tns:login',$res);
    return $res;
}

function get_curso($codigo) {
    $obj = new control_cursos();
    $res = $obj->retorna_cursos($codigo);
    return $res;
}

function get_horario($codigo) {
    $obj = new control_cursos();
    $res = $obj->retorna_horario($codigo);
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

