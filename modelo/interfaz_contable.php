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
class interfaz_contable extends Main{
    
    public $datos;
    
    public function selecciona_asientos_intervalo_fechas($fecha_inicio_fecha_fin){
        $datos = $fecha_inicio_fecha_fin;
        $r = $this->get_consulta("pa_selecciona_asientos_intervalo_fechas", $datos);
        if ($r[1] == '') {$stmt = $r[0];} else {die($r[1]);}$r = null;
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }
    public function selecciona_datos_empresa(){
        $datos = null;
        $r = consulta::procedimientoAlmacenado("pa_selecciona_datos_empresa", $datos);
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
