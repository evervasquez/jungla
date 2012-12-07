<h3>Permisos</h3>
<table>
    <tr>
        <td><label>Perfil:</label></td>
        <td>
            <select class="list" placeholder="Seleccione..." required name="perfil" id="perfil">
                <option value="0">Seleccione...</option>
                <?php for($i=0;$i<count($this->datos_perfiles);$i++){ ?>
                    <option value="<?php echo $this->datos_perfiles[$i]['IDPERFIL'] ?>"><?php echo $this->datos_perfiles[$i]['DESCRIPCION'] ?></option>
                <?php } ?>
            </select>
        </td>
        <td id="celda_aceptar">
            <a href="<?php echo BASE_URL?>permisos" class="k-button">Aceptar</a>
        </td>
    </tr>
</table>



<div id="div_modulos" align="left">
    <ul id='modulos'>
    <?php
        for($i=0;$i<count($this->datos_modulos);$i++){
            $idmodulo=$this->datos_modulos[$i]['IDMODULO'];
            $idmodulo_padre=$this->datos_modulos[$i]['IDMODULO_PADRE'];
            $modulo=$this->datos_modulos[$i]['DESCRIPCION'];
            if($idmodulo_padre==0){
                echo "<li><input type='checkbox' value='$id' id='$id'/>".$modulo."<ul>";
                for($j=0;$j<count($this->datos_modulos);$j++){
                    if($this->datos_modulos[$j]['IDMODULO_PADRE']==$idmodulo){
                        $id=$this->datos_modulos[$j]['IDMODULO'];
                        $descripcion=$this->datos_modulos[$j]['DESCRIPCION'];
                        echo "<li><input type='checkbox' value='$id' id='$id'/>".$descripcion."</li>";
                    }
                }                
                echo "</ul></li>";
            }
        }
    ?>
    </ul>
</div>

