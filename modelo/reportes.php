<?php
/*NUEVO
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of reportes
 *
 * @author doraliza santa cruz
 */
class reportes{
    public $idpromocion;
    public $datos;
    
    public function selecciona() {
        $datos = null;
        $r = consulta::procedimientoAlmacenado("pa_promociones_todo", $datos);
        if ($r[1] == '') {$stmt = $r[0];} else {die($r[1]);}$r = null;
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }
    public function promociones_todo() {
        $datos = array($this->idpromocion);
        $r = consulta::procedimientoAlmacenado("pa_promociones_todo", null);
        if ($r[1] == '') {$stmt = $r[0];} else {die($r[1]);}$r = null;
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }
    public function selecciona_datos_empresa() {
        $r = consulta::procedimientoAlmacenado("pa_selecciona_datos_empresa", null);
        if ($r[1] == '') {$stmt = $r[0];} else {die($r[1]);}$r = null;
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }
    public function selecciona_numero_arribos_huesped_dia_mes($mesano) {
        $datos=$mesano;
        $r = consulta::procedimientoAlmacenado("pa_selecciona_numero_arribos_huesped_dia_mes", $datos);
        if ($r[1] == '') {$stmt = $r[0];} else {die($r[1]);}$r = null;
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }
    public function selecciona_cantidad_empleados_x_tipo_x_actividad() {
        $dat=null;
        $r = consulta::procedimientoAlmacenado("pa_selecciona_cantidad_empleados_x_tipo_x_actividad", $dat);
        if ($r[1] == '') {$stmt = $r[0];} else {die($r[1]);}$r = null;
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }
    public function selecciona_numero_arribos_huesped_ubigeo_nacional($mesano) {
        $datos=$mesano;
        $r = consulta::procedimientoAlmacenado("pa_selecciona_numero_arribos_huesped_ubigeo_nacional", $datos);
        if ($r[1] == '') {$stmt = $r[0];} else {die($r[1]);}$r = null;
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }
    public function selecciona_numero_arribos_huesped_ubigeo_internacional($mesano) {
        $datos=$mesano;
        $r = consulta::procedimientoAlmacenado("pa_selecciona_numero_arribos_huesped_ubigeo_internacional", $datos);
        if ($r[1] == '') {$stmt = $r[0];} else {die($r[1]);}$r = null;
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }
    public function selecciona_numero_arribos_x_tipo_habitacion($mesano) {
        $datos=$mesano;
        $r = consulta::procedimientoAlmacenado("pa_selecciona_numero_arribos_x_tipo_habitacion", $datos);
        if ($r[1] == '') {$stmt = $r[0];} else {die($r[1]);}$r = null;
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }
    public function selecciona_stock_total($ubicacion) {
        $datos = array($ubicacion);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_stock_total", $datos);
        if ($r[1] == '') {$stmt = $r[0];} else {die($r[1]);}$r = null;
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }
    public function selecciona_ubicaciones() {
        $datos = array(0,'','');
        $r = consulta::procedimientoAlmacenado("pa_selecciona_ubicaciones", $datos);
        if ($r[1] == '') {$stmt = $r[0];} else {die($r[1]);}$r = null;
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }
   
    public function selecciona_tipo_habitacion_total(){
        $datos = array(0,"");
        $r = consulta::procedimientoAlmacenado("pa_selecciona_tipo_habitacion", $datos);
        if ($r[1] == '') {$stmt = $r[0];} else {die($r[1]);}$r = null;
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }
    public function selecciona_habitaciones_x_tipo_habitacion(){
        $datos = null;
        $r = consulta::procedimientoAlmacenado("pa_selecciona_habitaciones_x_tipo_habitacion", $datos);
        if ($r[1] == '') {$stmt = $r[0];} else {die($r[1]);}$r = null;
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }
    
    
//    public function index() {
//        //$this->_membresias->idreportes = 0;
//        //$this->_vista->datos = $this->_reportes->selecciona();
//        //$this->_reportes->idpromocion = 0;
//        $datos = $this->selecciona();
//        $cabeceras = array ('idpromocion','descripcion', 'descuento', 'fecha_inicio', 'fecha_final');
//        $this->_vista->datos = $this->get_matriz($datos, $cabeceras);
//        //$this->_vista->renderizar('index');
//    }
    
//    public function promociones(){
//        $n_promociones = count($this->datos);
//        for ($i = 0; $i < count($this->datos); $i++) {
//            $c_codigo=$c_codigo.$this->datos[$i]['idpromocion']."\n";
//            $c_descripcion=$c_descripcion.$this->datos[$i]['descripcion']."\n";
//        }
//        
//    }

}
?>
