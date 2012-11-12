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
                                <a href="#" class="eliminar">[Eliminar]</a>
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
                        <a href="<?php echo BASE_URL ?>habitaciones" class="k-button">Cancelar</a>
                    </p>
                </td>
            </tr>
        </table>
    </fieldset>
</form>