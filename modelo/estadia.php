<?php 

class estadia extends Main{
    
    public $idventa;
    public $representante;
    
    public function selecciona() {
        if(is_null($this->idventa)){
            $this->idventa=0;
        }
        if(is_null($this->representante)){
            $this->representante='';
        }
        $datos = array($this->idventa, $this->representante);
        $r = $this->get_consulta("pa_selecciona_estadia", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchall();
    }
    
}

?>
