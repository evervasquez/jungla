<script>
$(document).ready(function(){
    $("#div_modulos").hide();
    $("#perfil").change(function(){
        $(document).find(':checkbox').attr('checked',false);
        if($(this).val()==''){
            $("#div_modulos").hide();
        }else{
            $.post('/sisjungla/permisos/get_permisos','idperfil='+$(this).val(),function(datos){
                for(var i=0;i<datos.length;i++){
                    $("#"+datos[i].idmodulo).attr('checked','checked');
                }
            },'json');
            $("#div_modulos").show();
        }            
    });
    $("input:checkbox").click(function(){
        if(this.checked){
            $.post('/sisjungla/permisos/inserta_permiso','idperfil='+$("#perfil").val()+'&idmodulo='+$(this).val())
        }else{
            $.post('/sisjungla/permisos/elimina_permiso','idperfil='+$("#perfil").val()+'&idmodulo='+$(this).val())
        }
        
    });
});
</script>
<style type="text/css">
    #div_modulos{
        margin-left: 35%;
    }
    #div_modulos ul li{
        list-style: none;
    }
    #div_modulos ul li ul li{
        list-style: none;
    }
</style>
<h3>Permisos</h3>
<label>Perfil:</label>
<select class="combo" placeholder="Seleccione..." required name="perfil" id="perfil">
    <option></option>
    <?php for($i=0;$i<count($this->datos_perfiles);$i++){ ?>
        <option value="<?php echo $this->datos_perfiles[$i]['idperfil'] ?>"><?php echo $this->datos_perfiles[$i]['descripcion'] ?></option>
    <?php } ?>
</select>

<div id="div_modulos" align="left">
    <ul id='modulos'>
    <?php
        for($i=0;$i<count($this->datos_modulos);$i++){
            $idmodulo=$this->datos_modulos[$i]['idmodulo'];
            $idmodulo_padre=$this->datos_modulos[$i]['idmodulo_padre'];
            $modulo=$this->datos_modulos[$i]['descripcion'];
            if($idmodulo_padre==0){
                echo "<li>".$modulo."<ul>";
                for($j=0;$j<count($this->datos_modulos);$j++){
                    if($this->datos_modulos[$j]['idmodulo_padre']==$idmodulo){
                        $id=$this->datos_modulos[$j]['idmodulo'];
                        $descripcion=$this->datos_modulos[$j]['descripcion'];
                        echo "<li><input type='checkbox' value='$id' id='$id'/>".$descripcion."</li>";
                    }
                }                
                echo "</ul></li>";
            }
        }
    ?>
    </ul>
</div>
