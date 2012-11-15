<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>" id="frm">
    <fieldset>
        <legend><?php echo $this->titulo ?></legend>
        <input type="hidden" name="guardar" id="guardar" value="1"/>
        <input type="hidden" name="codigo" id="codigo" value="<?php if(isset ($this->datos[0]['idhabitacion']))echo $this->datos[0]['idhabitacion']?>"/>
        <table width="50%" align="center" class="tabCompra">
            <tr>
                <td><label>Nro.de Habitacion:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese Nro.de habitacion" required name="nro_habitacion" onKeyPress="return soloNumeros(event);"
                           id="nro_habitacion" value="<?php if(isset ($this->datos[0]['nro_habitacion']))echo $this->datos[0]['nro_habitacion']?>"/>
                </td>
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
        <div id="tbl_hb_esp">
        <legend>Costos de habitacion</legend>
        <table class="tabCompra">
            <tr>
                <td><label>Tipo Habitacion:</label></td>
                <td>
                    <select placeholder="Seleccione..." class="list" id="tipo_habitacion">
                        <option value="0">Seleccione...</option>
                        <?php for($i=0;$i<count($this->datos_tipo_habitacion);$i++){?>
                        <option id="tipo_habitacion" value="<?php echo $this->datos_tipo_habitacion[$i]['idtipo_habitacion']?>"><?php echo $this->datos_tipo_habitacion[$i]['descripcion']?></option>
                        <?php }?>
                    </select>
                </td>
                <td><label>Costo:</label></td>
                <td>
                    <input type="text" class="precio" placeholder="Ingrese costo" id="costo" />
                </td>
            </tr> 
            <tr>
                <td><label>Observaciones:</label></td>
                <td colspan="3">
                    <textarea class="k-textbox textarea" placeholder="Ingrese observacion" id="observacion"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="4" align="center">
                    <input type="button" class="k-button" value="Asignar" <?php if(isset ($this->datos_habitacion_especifica)){?>id="agrega_he"
                                                                    <?php }else{ ?> id="asignar_costo" <?php } ?> />
                </td>
            </tr>
            <tr>
                <td colspan="7" align="center">
                    <table border="1" id="tbl_habitacion_especifica" class="tabgrilla">
                        <tr>
                            <th width='60px'>Tipo de Habitacion</th><th>Costo</th><th>Observacion</th><th>Acciones</th>
                        </tr>
                        <?php if(isset ($this->datos_habitacion_especifica)){?>
                            <?php for($i=0;$i<count($this->datos_habitacion_especifica);$i++){ ?>
                        <tr>
                            <td>
                                <input type="hidden" class="tipo_habitacion" value="<?php echo $this->datos_habitacion_especifica[$i]['idtipo_habitacion']?>" />
                                <?php echo $this->datos_habitacion_especifica[$i]['tipo_habitacion']?>
                            </td>
                            <td>
                                <?php echo $this->datos_habitacion_especifica[$i]['costo'] ?>
                            </td>
                            <td>
                                <?php echo $this->datos_habitacion_especifica[$i]['observaciones'] ?>
                            </td>
                            <td>
                                <a href="#" class="eliminar imgdelete"></a>
                            </td>
                        </tr>
                            <?php } ?>
                        <?php } ?>
                    </table>
                </td>        
            </tr>
            <tr>
               <td colspan="7" align="center">
                    <p>
                        <button type="submit" class="k-button">Guardar</button>
                        <a href="<?php echo BASE_URL ?>habitaciones" class="k-button cancel">Cancelar</a>
                    </p>
                </td>
            </tr>
        </table>
    </div>
    </fieldset>
</form>