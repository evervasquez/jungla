<script>
$(document).ready(function(){
   $("#ventana_tipo_habitacion").hide();
   $("#btn_asignar_tipo_habitacion").click(function(){
       $("#ventana_tipo_habitacion").show();
   });
   
   $("#inserta_tmphabitacion").click(function(){
       if($("#tmp_habitacion").val()==''){
           
       }
   });
   
   $("#cancela_tmphabitacion").click(function(){
       $("#ventana_tipo_habitacion").hide();
   });
});
</script>
<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>">
    <fieldset>
        <legend><?php echo $this->titulo ?></legend>
        <input type="hidden" name="tmp_habitacion" id="tmp_habitacion" value=""/>
        <input type="hidden" name="guardar" id="guardar" value="1"/>
        <table width="50%" align="center">
            <tr>
                <td><label>Codigo:</label></td>
                <td>
                    <input type="text" class="k-textbox" readonly="readonly" name="codigo" id="codigo"
                           value="<?php if(isset ($this->datos[0]['idempleado']))echo $this->datos[0]['idempleado']?>"/>
                </td>
            </tr>
            <tr>
                <td><label>Nro.de Habitacion:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese Nro.de habitacion" required name="codigo" 
                           value="<?php if(isset ($this->datos[0]['idempleado']))echo $this->datos[0]['idempleado']?>"/>
                </td>
            </tr>
            <tr>
                <td><label>Descripcion:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese descripcion" required name="codigo" 
                           value="<?php if(isset ($this->datos[0]['idempleado']))echo $this->datos[0]['idempleado']?>"/>
                </td>
            </tr>
            <tr>
                <td><label>Ventilacion:</label></td>
                <td>
                    <?php if (isset ($this->datos[0]['ventilacion']) && $this->datos[0]['ventilacion']==0) {?>
                    <input type="radio" name="ventilacion" value ="1" />Ventilador<br/>
                    <input type="radio" name="ventilacion" value="0" checked="checked"/>Aire Acondicionado
                    <?php } else { ?>
                    <input type="radio" name="ventilacion" value ="1" checked="checked"/>Ventilador<br/>
                    <input type="radio" name="ventilacion" value="0" />Aire Acondicionado
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td><label>Estado:</label></td>
                <td>
                    <?php if (isset ($this->datos[0]['estado']) && $this->datos[0]['estado']==0) {?>
                    <input type="radio" name="estado" value ="1" />Habilitado<br/>
                    <input type="radio" name="estado" value="0" checked="checked"/>En Mantenimiento
                    <?php } else { ?>
                    <input type="radio" name="estado" value ="1" checked="checked"/>Habilitado<br/>
                    <input type="radio" name="estado" value="0" />En Mantenimiento
                    <?php } ?>
                </td>
            </tr>
        </table>
    </fieldset>
    <fieldset>
        <legend>Costos de habitacion</legend>
        <table>
            <tr>
            <td><label>Tipo Habitacion:</label></td>
            <td>
                <select placeholder="Seleccione..." class="combo" required id="idtipo_habitacion">
                    <option></option>
                    <?php for($i=0;$i<count($this->datos_tipo_habitacion);$i++){?>
                    <option value="<?php echo $this->datos_tipo_habitacion[$i]['idtipo_habitacion']?>"><?php echo $this->datos_tipo_habitacion[$i]['descripcion']?></option>
                    <?php }?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label>Costo:</label></td>
            <td>
                <input type="text" class="k-textbox" placeholder="Ingrese costo" required id="costo" />
            </td>
        </tr>
        <tr>
            <td><label>Observaciones:</label></td>
            <td>
                <textarea class="k-editable-area" placeholder="Ingrese observacion" required id="observacion"></textarea>
            </td>
        </tr>
            <tr>
                <td colspan="2" align="center">
                    <table border="1">
                    <caption><p><button type="button" class="k-button" id="btn_asignar_tipo_habitacion">Asignar Tipo de Habitacion</button></p></caption>
                    <?php if(isset($this->datos_detalle_habitacion)){?>
                        <tr>
                            <td>Tipo de Habitacion</td><td>Costo</td><td>Observacion</td><td>Acciones</td>
                        </tr>
                    <?php } ?>
                    </table>
                </td>        
            </tr>
            <tr>
               <td colspan="2" align="center">
                    <p>
                        <button type="submit" class="k-button">Guardar</button>
                        <a href="<?php echo BASE_URL ?>habitaciones" class="k-button">Cancelar</a>
                    </p>
                </td>
            </tr>
        </table>
    </fieldset>
</form>

<div id="ventana_tipo_habitacion">
    <table>
        <caption><p>Asignar Tipo de Habitacion</p></caption>
        <tr>
            <td><label>Tipo Habitacion:</label></td>
            <td>
                <select placeholder="Seleccione..." class="combo" required id="idtipo_habitacion">
                    <option></option>
                    <?php for($i=0;$i<count($this->datos_tipo_habitacion);$i++){?>
                    <option value="<?php echo $this->datos_tipo_habitacion[$i]['idtipo_habitacion']?>"><?php echo $this->datos_tipo_habitacion[$i]['descripcion']?></option>
                    <?php }?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label>Costo:</label></td>
            <td>
                <input type="text" class="k-textbox" placeholder="Ingrese costo" required id="costo" />
            </td>
        </tr>
        <tr>
            <td><label>Observaciones:</label></td>
            <td>
                <textarea class="k-editable-area" placeholder="Ingrese observacion" required id="observacion"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <p>
                    <button class="k-button" id="inserta_tmphabitacion">Insertar</button>
                    <button class="k-button" id="cancela_tmphabitacion">Cancelar</button>
                </p>
            </td>
        </tr>
    </table>
</div>
<div id="fondoclaro"></div>