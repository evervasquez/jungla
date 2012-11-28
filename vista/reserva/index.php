<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>" id="frm">
    <input type="hidden" name="guardar" id="guardar" value="1"/>
    <fieldset>
        <legend><?php echo $this->titulo ?></legend>
        <table>
            <tr>
                <td>Fecha reserva:</td>
                <td>
                    <input readonly="readonly" placeholder="Seleccione fecha" class="datepicker" name="fecha_reserva" required
                   value="<?php if(isset ($this->datos)){echo $this->datos[0]['fecha_reserva'];} else {echo date("d-m-Y");} ?>"/>
                </td>
            </tr>
            <tr>
                <td>Fecha entrada:</td>
                <td>
                    <input readonly="readonly" placeholder="Seleccione fecha" class="datepicker" name="fecha_entrada" required
                   value="<?php echo $this->datos[0]['fecha_entrada'] ?>"/>
                </td>
            </tr>
            <tr>
                <td>Fecha salida:</td>
                <td>
                    <input readonly="readonly" placeholder="Seleccione fecha" class="datepicker" name="fecha_salida" required
                   value="<?php echo $this->datos[0]['fecha_salida'] ?>"/>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <fieldset>
                        <legend>Asignar pasajero:</legend>
                        <table>
                            <tr>
                                <td><label>Pasajero:</label></td>
                                <td>
                                    <input type="hidden" name="idcliente" id="idcliente" 
                                           value="<?php if(isset ($this->datos[0]['idcliente']))echo $this->datos[0]['idcliente']?>"/>
                                    <input type="text" class="k-textbox" placeholder="Busque pasajero" required  readonly="readonly" name="cliente"
                                           id="cliente" value="<?php if(isset ($this->datos[0]['cliente']))echo $this->datos[0]['cliente']?>"/>
                                </td>
                                <td>
                                    <button type="button" class="k-button" id="btn_vtna_busca_pasajeros"><span class="k-icon k-i-search"></span></button>
                                    <button type="button" class="k-button" id="btn_vtna_agrega_pasajeros"><span class="k-icon k-i-plus"></span></button>
                                </td>
                                <td><label>Habitacion:</label></td>
                                <td>
                                    <select placeholder="Seleccione..." class="combo" id="habitacion">
                                        <option></option>
                                        <?php for($i=0;$i<count($this->datos_habitaciones);$i++){ ?>
                                        <option value="<?php echo $this->datos_habitaciones[$i]['idhabitacion'] ?>"><?php echo utf8_encode($this->datos_habitaciones[$i]['descripcion']) ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr align="center">
                                <td colspan="5"><input type="button" class="k-button" value="Agregar" id="asignar_pasajero"/></td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <table border="1" align="center" id="detalle_estadia">
                                        <tr>
                                            <th>Pasajero</th>
                                            <th>Habitacion</th>
                                            <th>Representante</th>
                                            <th>Accion</th>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </td>
            </tr>
        </table>
        <p>
            <button type="submit" class="k-button">Guardar</button>
            <a href="<?php echo BASE_URL ?>index" class="k-button cancel">Cancelar</a>
        </p>
    </fieldset>
</form>



<div id="vtna_busca_pasajero">
    <h3>Lista de Pasajeros</h3>
    <p>
        <select class="combo" id="filtro_pasajeros">
            <option value="0">Nombre/Apellido</option>
            <option value="1">Razon Social</option>
            <option value="2">DNI</option>
            <option value="3">RUC</option>
        </select>
        <input type="text" class="k-textbox" style="width: 40%" id="txt_buscar_pasajeros">
        <button type="button" class="k-button" id="btn_buscar_pasajeros"><span class="k-icon k-i-search"></span></button>
        <a class="k-button cancelar cancel">Cancelar</a>
    </p>
    <div id="grilla_pasajeros"></div>
</div>


<div id="vtna_agrega_pasajero">
    
</div>




<div id="fondooscuro"></div>