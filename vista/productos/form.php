<script>
$(document).ready(function(){
    $("#descripcion").focus(); 
    $("#saveform").click(function(){
        bval = true;        
        bval = bval && $( "#descripcion" ).required();  
        bval = bval && $( "#stock" ).required();
        bval = bval && $( "#precio_unitario" ).required();
        bval = bval && $( "#precio_compra" ).required();  
        bval = bval && $( "#tipo_producto" ).required(); 
        bval = bval && $( "#unidad_medida" ).required();  
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    }); 
    $("#unidad_medida").kendoComboBox();
    function get_um(unidad){
        $.post('/sisjungla/productos/get_um','id=0',function(datos){
            $("#unidad_medida").html('<option></option>');
            for(var i=0;i<datos.length;i++){
                if(datos[i].descripcion==unidad){
                    $("#unidad_medida").append('<option selected="selected" value="'+ datos[i].idunidad_medida + '">' + datos[i].descripcion+ '</option>');
                }else{
                    $("#unidad_medida").append('<option value="'+ datos[i].idunidad_medida + '">' + datos[i].descripcion+ '</option>');
                }
            }
            $("#unidad_medida").kendoComboBox();
        },'json');
    }
    $( "#des_um" ).focus(); 
    $("#btn_um").click(function(){
            bval = true;        
            bval = bval && $( "#des_um" ).required();    
            bval = bval && $( "#abreviatura_um" ).required();
            if ( bval ) {
                $.post('/sisjungla/productos/inserta_um',
            'descripcion='+$("#des_um").val()+"&abreviatura="+$("#abreviatura_um").val())
            $("#ventana").fadeOut(300);
            $("#fondooscuro").fadeOut(300); 
            get_um($("#des_um").val());
            $("#des_um").val(''); 
            $("#abreviatura_um").val(''); 
            }
            return false;
    });
    
}); 
</script>
<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>" id="frm">
    <fieldset>
        <legend><h3><?php echo $this->titulo ?></h3></legend>
    <input type="hidden" name="guardar" id="guardar" value="1"/>
    <table width="50%" align="center" class="tabForm">
            <tr>
            	<td><label>Codigo:</label></td>
            <td>
                <input type="text" class="k-textbox" readonly="readonly" name="codigo"
                       value="<?php if(isset ($this->datos[0]['idproducto']))echo $this->datos[0]['idproducto']?>"/>
            </td>
            </tr>
            <tr>
            	<td><label>Descripcion:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese descripcion" required name="descripcion" id="descripcion"
                           value="<?php if(isset ($this->datos[0]['descripcion']))echo $this->datos[0]['descripcion']?>"/>
                </td>
                <td><label>Stock</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese stock" required name="stock" id="stock"
                           value="<?php if(isset ($this->datos[0]['stock']))echo $this->datos[0]['stock']?>"/>
                </td>
            </tr>
            <tr>
            	<td><label>Precio Unitario</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese precio" required name="precio_unitario" id="precio_unitario"
                           value="<?php if(isset ($this->datos[0]['precio_unitario']))echo $this->datos[0]['precio_unitario']?>"/>
                </td>
                <td><label>Precio de Compra</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese precio" required name="precio_compra" id="precio_compra"
                           value="<?php if(isset ($this->datos[0]['precio_compra']))echo $this->datos[0]['precio_compra']?>"/>
                </td>
            </tr>
            <tr>
            	<td><label>Tipo de Producto</label></td>
                <td>
                    <select class="combo"  placeholder="Seleccione..." required name="tipo_producto" id="tipo_producto">
                    <option></option>
                    <?php for($i=0;$i<count($this->datos_tipo);$i++){ ?>
                        <?php if( $this->datos[0]['idtipo_producto'] == $this->datos_tipo[$i]['idtipo_producto'] ){ ?>
                    <option value="<?php echo $this->datos_tipo[$i]['idtipo_producto'] ?>" selected="selected"><?php echo $this->datos_tipo[$i]['descripcion'] ?></option>
                        <?php } else { ?>
                    <option value="<?php echo $this->datos_tipo[$i]['idtipo_producto'] ?>"><?php echo $this->datos_tipo[$i]['descripcion'] ?></option>
                        <?php } ?>
                    <?php } ?>
                    </select>
            	</td>
                <td><label>Ubicacion</label></td>
                <td>
                    <select class="combo"  placeholder="Seleccione..." required name="ubicacion" id="ubicacion">
                    <option></option>
                    <?php for($i=0;$i<count($this->datos_ubicaciones);$i++){ ?>
                        <?php if( $this->datos[0]['idubicacion'] == $this->datos_ubicaciones[$i]['idubicacion'] ){ ?>
                    <option value="<?php echo $this->datos_ubicaciones[$i]['idubicacion'] ?>" selected="selected"><?php echo $this->datos_ubicaciones[$i]['descripcion'] ?></option>
                        <?php } else { ?>
                    <option value="<?php echo $this->datos_ubicaciones[$i]['idubicacion'] ?>"><?php echo $this->datos_ubicaciones[$i]['descripcion'] ?></option>
                        <?php } ?>
                    <?php } ?>
                    </select>
            	</td>
            </tr>
            <tr>
            	<td><label>Unidad de Medida</label></td>
                <td>
                    <select placeholder="Seleccione..." required name="unidad_medida" id="unidad_medida">
                    <option></option>
                    <?php for($i=0;$i<count($this->datos_um);$i++){ ?>
                        <?php if( $this->datos[0]['idunidad_medida'] == $this->datos_um[$i]['idunidad_medida'] ){ ?>
                    <option value="<?php echo $this->datos_um[$i]['idunidad_medida'] ?>" selected="selected"><?php echo $this->datos_um[$i]['descripcion'] ?></option>
                        <?php } else { ?>
                    <option value="<?php echo $this->datos_um[$i]['idunidad_medida'] ?>"><?php echo $this->datos_um[$i]['descripcion'] ?></option>
                        <?php } ?>
                    <?php } ?>
                    </select>
                    <a id="um" class="k-button">Nuevo</a>
            	</td>
            </tr>
            <tr>
            	<td><label>Servicio</label></td>
                <td>
                    <select class="combo"  placeholder="Seleccione..." required name="servicio">
                    <option></option>
                    <?php for($i=0;$i<count($this->datos_servicios);$i++){ ?>
                        <?php if( $this->datos[0]['idservicio'] == $this->datos_servicios[$i]['idservicio'] ){ ?>
                    <option value="<?php echo $this->datos_servicios[$i]['idservicio'] ?>" selected="selected"><?php echo $this->datos_servicios[$i]['descripcion'] ?></option>
                        <?php } else { ?>
                    <option value="<?php echo $this->datos_servicios[$i]['idservicio'] ?>"><?php echo $this->datos_servicios[$i]['descripcion'] ?></option>
                        <?php } ?>
                    <?php } ?>
                    </select>
            	</td>
                <td><label>Promocion</label></td>
                <td>
                    <select class="combo"  placeholder="Seleccione..." required name="promocion">
                    <option></option>
                    <?php for($i=0;$i<count($this->datos_promociones);$i++){ ?>
                        <?php if( $this->datos[0]['idpromocion'] == $this->datos_promociones[$i]['idpromocion'] ){ ?>
                    <option value="<?php echo $this->datos_promociones[$i]['idpromocion'] ?>" selected="selected"><?php echo utf8_encode($this->datos_promociones[$i]['descripcion']) ?></option>
                        <?php } else { ?>
                    <option value="<?php echo $this->datos_promociones[$i]['idpromocion'] ?>"><?php echo utf8_encode($this->datos_promociones[$i]['descripcion']) ?></option>
                        <?php } ?>
                    <?php } ?>
                    </select>
            	</td>
            </tr>
            <tr>
            	<td><label>Estado</label></td>
                <td>
                    <?php if (isset ($this->datos[0]['estado']) && $this->datos[0]['estado']==0) {?>
                    <input type="radio" name="estado" value ="1" />Activo
                    <input type="radio" name="estado" value="0" checked="checked"/>Inactivo
                    <?php } else { ?>
                    <input type="radio" name="estado" value ="1" checked="checked"/>Activo
                    <input type="radio" name="estado" value="0" />Inactivo
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td><label>Observaciones:</label></td>
                <td>
                    <textarea placeholder="Ingrese observacion" required id="observaciones" name="observaciones" class="k-textbox" style="height: 100px"><?php if(isset ($this->datos[0]['observaciones']))echo $this->datos[0]['observaciones']?></textarea>
                </td>
            </tr>
            <tr>
            	<td colspan="4" align="center">
                    <p>
                        <button type="submit" class="k-button" id="saveform">Guardar</button>
                        <a href="<?php echo BASE_URL ?>productos" class="k-button">Cancelar</a>
                    </p>
                </td>
            </tr>
        </table>
    </fieldset>
    </form>
    <div id="ventana" align="center">
    <span class="close"><img src="<?php echo BASE_URL ?>lib/img/close.gif" /></span>
        <form method="post" action="#">
            <table align="center">
                    <caption><h3>Registrar Unidad de Medida</h3></caption>
                <tr>
                    <td><label>Codigo:</label></td>
                    <td><input type="text" readonly="readonly" class="k-textbox" /></td>
                </tr>
                <tr>
                    <td><label>Descripcion:</label></td>
                    <td><input type="text" class="k-textbox" placeholder="Ingrese unidad de medida" required id="des_um"/></td>
                </tr>
                <tr>
                    <td><label>Abreviatura:</label></td>
                    <td><input type="text" class="k-textbox" placeholder="Ingrese abreviatura" required id="abreviatura_um"/></td>
                </tr>
                <tr>
                    <td align="center" colspan="2">
                        <p><button type="button" class="k-button" id="btn_um">Guardar y  Seleccionar</button></p>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div id="fondooscuro"></div>
