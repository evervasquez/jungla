<script>
$(document).ready(function(){
    $('select').kendoComboBox();
    
    $("#paises").change(function(){
        if(!$("#paises").val()){
            $("#regiones").html('<option></option>');
        }else{
            $.post('/sisjungla/empleados/get_regiones','idpais='+$("#paises").val(),function(datos){
                $("#regiones").html('<option></option>');
                $("#provincias").html('<option></option>');
                $("#ciudades").html('<option></option>');
                for(var i=0;i<datos.length;i++){
                    $("#regiones").append('<option value="'+ datos[i].idubigeo + '">' + datos[i].descripcion+ '</option>');
                }
                $("#regiones").kendoComboBox();
                $("#provincias").kendoComboBox();
                $("#ciudades").kendoComboBox();
            },'json');
        }
    });
    
    $("#regiones").change(function(){
        if(!$("#regiones").val()){
            $("#provincias").html('<option></option>');
        }else{
            $.post('/sisjungla/empleados/get_provincias','idregion='+$("#regiones").val(),function(datos){
                $("#provincias").html('<option></option>');
                $("#ciudades").html('<option></option>')
                for(var i=0;i<datos.length;i++){
                    $("#provincias").append('<option value="'+ datos[i].idubigeo + '">' + datos[i].descripcion+ '</option>');
                }
                $("#provincias").kendoComboBox();
                $("#ciudades").kendoComboBox();
            },'json');
        }
    });
    
    $("#provincias").change(function(){
        if(!$("#provincias").val()){
            $("#ciudades").html('<option></option>');
        }else{
            $.post('/sisjungla/empleados/get_ciudades','idprovincia='+$("#provincias").val(),function(datos){
                $("#ciudades").html('<option></option>');
                for(var i=0;i<datos.length;i++){
                    $("#ciudades").append('<option value="'+ datos[i].idubigeo + '">' + datos[i].descripcion+ '</option>');
                }       
                $("#ciudades").kendoComboBox();
            },'json');
        }
    });
    
}); 
</script>
<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>">
    <input type="hidden" name="guardar" id="guardar" value="1"/>
    <table width="50%" align="center">
        <caption><h3><?php echo $this->titulo ?></h3></caption>
        <tr>
            <td><label>Codigo:</label></td>
            <td>
                <input type="text" class="k-textbox" readonly="readonly" name="codigo" id="codigo"
                       value="<?php if(isset ($this->datos[0]['idproveedor']))echo $this->datos[0]['idproveedor']?>"/>
            </td>
        </tr>
        <tr>
            <td><label>Razon Social:</label></td>
            <td>
                <input type="text" class="k-textbox" placeholder="Ingrese razon social" required name="razon_social"
                   id="" value="<?php if(isset ($this->datos[0]['razon_social']))echo $this->datos[0]['razon_social']?>"/>
            </td>
        </tr>
        <tr>
            <td><label>RUC:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese razon social" required name="ruc"
                   id="" value="<?php if(isset ($this->datos[0]['ruc']))echo $this->datos[0]['ruc']?>"/>
            </td>
        </tr>
        <tr>
            <td><label>Pais:</label></td>
            <td>
                <select placeholder="Seleccione..." required id="paises">
                    <option></option>
                    <?php for($i=0;$i<count($this->datos_paises);$i++){ ?>
                        <?php if( $this->datos[0]['idpais'] == $this->datos_paises[$i]['idpais'] ){ ?>
                    <option value="<?php echo $this->datos_paises[$i]['idpais'] ?>" selected="selected"><?php echo $this->datos_paises[$i]['descripcion'] ?></option>
                        <?php } else { ?>
                    <option value="<?php echo $this->datos_paises[$i]['idpais'] ?>"><?php echo $this->datos_paises[$i]['descripcion'] ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </td>
        </tr>
         <tr>
            <td><label>Region:</label></td>
            <td>
                <select placeholder="Seleccione..." required id="regiones">
                    <option></option>
                    <?php if(count($this->datos_regiones)){ ?>
                        <?php for($i=0;$i<count($this->datos_regiones);$i++){ ?>
                            <?php if( $this->datos[0]['idregion'] == $this->datos_regiones[$i]['idubigeo'] ){ ?>
                        <option value="<?php echo $this->datos_regiones[$i]['idubigeo'] ?>" selected="selected"><?php echo $this->datos_regiones[$i]['descripcion'] ?></option>
                            <?php } else { ?>
                        <option value="<?php echo $this->datos_regiones[$i]['idubigeo'] ?>"><?php echo $this->datos_regiones[$i]['descripcion'] ?></option>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                </select>
           </td>
        </tr>
        <tr>
            <td><label>Provincia:</label></td>
            <td>
                <select placeholder="Seleccione..." required id="provincias">
                    <option></option>
                    <?php if(count($this->datos_provincias)){ ?>
                        <?php for($i=0;$i<count($this->datos_provincias);$i++){ ?>
                            <?php if( $this->datos[0]['idprovincia'] == $this->datos_provincias[$i]['idubigeo'] ){ ?>
                        <option value="<?php echo $this->datos_provincias[$i]['idubigeo'] ?>" selected="selected"><?php echo $this->datos_provincias[$i]['descripcion'] ?></option>
                            <?php } else { ?>
                        <option value="<?php echo $this->datos_provincias[$i]['idubigeo'] ?>"><?php echo $this->datos_provincias[$i]['descripcion'] ?></option>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label>Ciudad:</label></td>
            <td>
                <select placeholder="Seleccione..." required name="ubigeo" id="ciudades">
                    <option></option>
                    <?php if(count($this->datos_ubigeos)){ ?>
                        <?php for($i=0;$i<count($this->datos_ubigeos);$i++){ ?>
                            <?php if( $this->datos[0]['idubigeo'] == $this->datos_ubigeos[$i]['idubigeo'] ){ ?>
                        <option value="<?php echo $this->datos_ubigeos[$i]['idubigeo'] ?>" selected="selected"><?php echo $this->datos_ubigeos[$i]['descripcion'] ?></option>
                            <?php } else { ?>
                        <option value="<?php echo $this->datos_ubigeos[$i]['idubigeo'] ?>"><?php echo $this->datos_ubigeos[$i]['descripcion'] ?></option>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label>Direccion:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese direccion" required name="direccion"
                   id="" value="<?php if(isset ($this->datos[0]['direccion']))echo $this->datos[0]['direccion']?>"/>
            </td>
        </tr>
        <tr>
            <td><label>Representante:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese nombre representante" required name="representante"
                   id="" value="<?php if(isset ($this->datos[0]['representante']))echo $this->datos[0]['representante']?>"/>
            </td>
        </tr>
        <tr>
            <td><label>Telefono:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese numero telefonico" required name="telefono"
                   id="" value="<?php if(isset ($this->datos[0]['telefono']))echo $this->datos[0]['telefono']?>"/>
            </td>
        </tr>
        <tr>
            <td><label>Email:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese email" required name="email"
                   id="" value="<?php if(isset ($this->datos[0]['email']))echo $this->datos[0]['email']?>"/>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <p>
                    <button type="submit" class="k-button">Guardar</button>
                    <a href="<?php echo BASE_URL ?>proveedores" class="k-button">Cancelar</a>
                </p>
            </td>
        </tr>
    </table>
</form>
