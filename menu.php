<?php

Class menu {

//cargarmenu("0"); // Donde 0 es el Idpadre principal
    protected $_id;
    protected $_datos;

    public function __construct($datos) {
        $this->_datos = $datos;
        $this->unemenu();
    }

    function unemenu() {
        echo "<ul id='menu'>";
        $this->cargarmenu(0);
        echo '</ul>';
    }

    function cargarmenu($id) {
        // $sql = "select * from modulos where idpadre='$id' and estado='1'";
        // $r = mysql_query($sql);
//        $this->_id = $id;
//        $this->_datos = $id;

        for ($i = 0; $i < count($this->_datos); $i++) {
            $descripcion = $this->_datos[$i]['descripcion']; //MAN
            $idmodulo = $this->_datos[$i]['idmodulo']; //1
            //*echo $idmodulo;
            if ($this->_datos[$i]['idmodulo_padre'] == 0 && $idmodulo != 0) {
                echo "<li>$descripcion <ul>"; //MAN
                //cargarmenu($idmodulo);
                for ($j = 0; $j < count($this->_datos); $j++) {
                    if ($idmodulo === $this->_datos[$j]['idmodulo_padre'] && $this->_datos[$j]['idmodulo'] != 0) {
                        $url = BASE_URL . $this->_datos[$j]['url'];
//                        $url = 'index.php?controller=' . $this->_datos[$j]['url'];
                        echo "<li><a href='$url'>" . $this->_datos[$j]['descripcion'] . "</a></li>";
                    }
                }
                echo "</ul></li>";
            } else {
                
            }
        }
    }

}
?>

<!--FIn menu-->