<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>" id="frm">
    <input type="hidden" name="guardar" id="guardar" value="1"/>
    <input type="hidden" name="codigo" id="codigo" value="<?php echo $this->datos[0]['idventa']?>"/>
    <fieldset>
        <legend><?php echo $this->titulo ?></legend>
        <table>
            <tr>
                <td>Representante:</td>
                <td>
                    <input type="text" class="k-textbox" readonly="readonly" value="<?php echo $this->datos[0]['cliente'] ?>"/>
                </td>
            </tr>
            <tr>
                <td>Fecha reserva:</td>
                <td>
                    <input type="text" class="k-textbox" readonly="readonly" 
                   value="<?php if(isset ($this->datos)){echo $this->datos[0]['fecha_reserva'];} else {echo date("d-m-Y");} ?>"/>
                </td>
            </tr>
            <tr>
                <td>Fecha entrada:</td>
                <td>
                    <input type="text" class="k-textbox" readonly="readonly" 
                   id="fecha_entrada" value="<?php echo date('d-m-Y') ?>"/>
                </td>
            </tr>
            <tr>
                <td>Fecha salida:</td>
                <td>
                    <input type="text" class="k-textbox" readonly="readonly" name="fecha_salida" 
                   id="fecha_salida" value="<?php echo $this->datos[0]['fecha_salida'] ?>"/>
                </td>
            </tr>
            <tr id="celda_detalle_estadia">
                <td colspan="2">
                    <fieldset>
                        <legend>Pasajeros x habitacion:</legend>
                        <table>
                            <tr class="celda_asignar_pasajero">
                                <td colspan="5">
                                    <table border="1" align="center" id="detalle_estadia">
                                        <tr>
                                            <th>Habitacion</th>
                                            <th>Tipo</th>
                                            <th>Pasajero</th>
                                            <th>Doc. Ident.</th>
                                            <th id="ciudad">Procedencia</th>
                                            <th>Confirmar</th>
                                        </tr>
                                        <?php for($i=0;$i<count($this->datos_detalle_estadia);$i++){ ?>
                                        <tr>
                                            <td><?php echo $this->datos_detalle_estadia[$i]['habitacion']?></td>
                                            <td><?php echo $this->datos_detalle_estadia[$i]['tipo']?></td>
                                            <td>
                                                <input type="hidden" value="<?php echo $this->datos_detalle_estadia[$i]['idcliente']?>" name="idcliente[]"/>
                                                <?php echo $this->datos_detalle_estadia[$i]['huesped']?>
                                            </td>
                                            <td><?php echo $this->datos_detalle_estadia[$i]['documento']?></td>
                                            <td>
                                                <input type="button" value="Buscar" class="k-button" id="btn_vtna_ciudades"/>
                                            </td>
                                            <td><input type="checkbox"/></td>
                                        </tr>
                                        <?php }?>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </td>
            </tr>
        </table>
        <p>
            <button type="button" class="k-button" id="btn_confirmar">Confirmar</button>
            <a href="<?php echo BASE_URL ?>estadia" class="k-button cancel">Cancelar</a>
        </p>
    </fieldset>
</form>


<div id="vtna_busca_ciudades">
    <h3>Procedencia</h3>
    <input type="hidden" id="index_tr" />
    <table>
        <tr>
            <td><label>Pais:</label></td>
            <td>
                <select placeholder="Seleccione..." class="combo" id="paises" required name="paises">
                    <option></option>
                    <?php for($i=0;$i<count($this->datos_paises);$i++){ ?>
                    <option value="<?php echo $this->datos_paises[$i]['idpais'] ?>"><?php echo $this->datos_paises[$i]['descripcion'] ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label>Region:</label></td>
            <td>
                <select placeholder="Seleccione..." class="comboX" id="regiones" required name="regiones">
                    <option>Seleccione...</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label>Provincia:</label></td>
            <td>
                <select placeholder="Seleccione..." class="comboX" id="provincias" required name="provincias">
                    <option>Seleccione...</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label>Ciudad:</label></td>
            <td>
                <select placeholder="Seleccione..." class="comboX" id="ciudades" required name="ciudades">
                    <option>Seleccione...</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <p>
                    <button type="button" class="k-button" id="btn_selecciona_ciudad">Seleccionar</button>
                    <button type="button" class="k-button cancel" id="btn_cancelar_ciudad">Cancelar</button>
                </p>
            </td>
        </tr>
    </table>
</div>