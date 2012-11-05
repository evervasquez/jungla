<script>
$(document).ready(function(){

    $("#asignar_costo").click(function(){
       idth=$("#tipo_habitacion").val();
       th=$("#tipo_habitacion option:selected").html(); 
       c=$("#costo").val();
       o=$("#observacion").val();
       error= false;
       msg='';
       
       $("#tbl_habitacion_especifica tr").each(function(){
           id_th = $("#tbl_habitacion_especifica tr td:eq(0) :input").val();
           if(idth==id_th){
               error= true;
               msg = "Este tipo de habitacion ya fue asignado";
           }
       });
       
       if(error){
           alert(msg);
       }else{
           html="<tr>";
           html=html+"<td><input type='hidden' name='tipo_habitacion[]' value='"+idth+"'/>"+th+"</td>";
           html=html+"<td><input type='hidden' name='costo[]' value='"+c+"'/>"+c+"</td>";
           html=html+"<td><input type='hidden' name='observacion[]' value='"+o+"'/>"+o+"</td>";
           html=html+'<td><a class="delete" title="Eliminar item" href="javascript:">[Eliminar]</a></td>';
           html=html+"</tr>";

           $("#tbl_habitacion_especifica").append(html);
           $("#tipo_habitacion option:eq(0)").attr('selected',true);
           $("#tipo_habitacion").kendoComboBox();
           $("#costo").val('');
           $("#observacion").val('');
       }
   });
   
   $(".delete").live('click', function() {
       i = $(this).parent().parent().index();
       $("#tbl_habitacion_especifica tr:eq("+i+")").remove();
   });
});
</script>
<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>">
    <fieldset>
        <legend><?php echo $this->titulo ?></legend>
        <input type="hidden" name="guardar" id="guardar" value="1"/>
        <table width="50%" align="center">
            <tr>
                <td><label>Codigo:</label></td>
                <td>
                    <input type="text" class="k-textbox" readonly="readonly" name="codigo" id="codigo"
                           value="<?php if(isset ($this->datos[0]['idhabitacion']))echo $this->datos[0]['idhabitacion']?>"/>
                </td>
            </tr>
            <tr>
                <td><label>Nro.de Habitacion:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese Nro.de habitacion" required name="nro_habitacion" 
                           value="<?php if(isset ($this->datos[0]['nro_habitacion']))echo $this->datos[0]['nro_habitacion']?>"/>
                </td>
            </tr>
            <tr>
                <td><label>Descripcion:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese descripcion" required name="descripcion" 
                           value="<?php if(isset ($this->datos[0]['descripcion']))echo $this->datos[0]['descripcion']?>"/>
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
                <select placeholder="Seleccione..." class="combo" id="tipo_habitacion">
                    <option></option>
                    <?php for($i=0;$i<count($this->datos_tipo_habitacion);$i++){?>
                    <option id="tipo_habitacion" value="<?php echo $this->datos_tipo_habitacion[$i]['idtipo_habitacion']?>"><?php echo $this->datos_tipo_habitacion[$i]['descripcion']?></option>
                    <?php }?>
                </select>
                </td>
                <td><label>Costo:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese costo" id="costo" />
                </td>
                <td><label>Observaciones:</label></td>
                <td>
                    <textarea class="k-editable-area" placeholder="Ingrese observacion" id="observacion"></textarea>
                </td>
                <td>
                    <div id="asignar_costo" class="ui-state-default ui-corner-all" title="Asginar costo">
                        <span class="ui-icon ui-icon-plusthick"></span>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="7" align="center">
                    <table border="1" id="tbl_habitacion_especifica" class="tabgrilla">
                        <tr>
                            <th>Tipo de Habitacion</th><th>Costo</th><th>Observacion</th><th>Acciones</th>
                        </tr>
                    </table>
                </td>        
            </tr>
            <tr>
               <td colspan="7" align="center">
                    <p>
                        <button type="submit" class="k-button">Guardar</button>
                        <a href="<?php echo BASE_URL ?>habitaciones" class="k-button">Cancelar</a>
                    </p>
                </td>
            </tr>
        </table>
    </fieldset>
</form>