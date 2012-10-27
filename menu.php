<?php

Class menu {

//cargarmenu("0"); // Donde 0 es el Idpadre principal
    protected $_id;
    protected $_datos;
    private $_c = 0;

    public function __construct($datos) {
        $this->_datos = $datos;
        $this->unemenu();
    }

    function unemenu() {
        echo "<ul id='menu'>";
        $this->cargarmenu(0);
        echo '</ul>';
        echo "<div align='center' id='cuerpo'>";
    }

    function cargarmenu($id) {
        
        for($i=0; $i< count($this->_datos); $i++){
            if($this->_c==0){
                $descripcion=  $this->_datos[$i]['modulos'];
                echo "<li>$descripcion<ul>";
                $this->_c = 1;
            }
            if ($descripcion == $this->_datos[$i]['modulos']){
                $url = BASE_URL . $this->_datos[$i]['url'];
                echo "<li><a href='$url'>" . $this->_datos[$i]['modulos_hijos'] . "</a></li>";
            } else {
                echo "</ul></li>";
                $this->_c = 0;
                $i = $i -1;
            }
        }
        echo "</ul></li>";
        echo "</ul";
    }
}
?>
<!--FIn menu-->