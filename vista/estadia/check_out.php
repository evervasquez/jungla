<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>" id="frm">
    <input type="hidden" name="guardar" id="guardar" value="1"/>
    <input type="hidden" name="codigo" id="codigo" value="<?php echo $this->datos[0]['idventa']?>"/>
    <table>
        <tr>
            <td>Fecha entrada:</td>
            <td>
                <input type="hidden" name="fecha_entrada" value="<?php echo $this->datos[0]['de_fecha_ingreso'] ?>" />
                <input type="text" class="k-textbox" readonly="readonly" 
               id="fecha_entrada" value="<?php echo $this->datos[0]['fecha_ingreso'] ?>"/>
            </td>
        </tr>
        <tr>
            <td>Fecha salida:</td>
            <td>
                <input type="hidden" name="fecha_salida" value="<?php echo date('d-m-Y H:i:s') ?>" />
                <input type="text" class="k-textbox" readonly="readonly" id="fecha_salida" value="<?php echo date('d-m-Y')?>"/>
            </td>
        </tr>
        <tr id="celda_detalle_estadia">
            <td colspan="2">
                <table border="1" align="center" id="detalle_estadia">
                    <tr>
                        <th>Habitacion</th>
                        <th>Tipo</th>
                        <th>Pasajero</th>
                        <th>Doc. Ident.</th>
                        <th id="ciudad">Destino</th>
                    </tr>
                    <?php for($i=0;$i<count($this->datos_detalle_estadia);$i++){ ?>
                    <tr>
                        <td><?php echo $this->datos_detalle_estadia[$i]['habitacion']?></td>
                        <td><?php echo $this->datos_detalle_estadia[$i]['tipo']?></td>
                        <td>
                            <input type="hidden" value="<?php echo $this->datos_detalle_estadia[$i]['idcliente']?>" name="idpasajero[]"/>
                            <?php echo $this->datos_detalle_estadia[$i]['huesped']?>
                        </td>
                        <td><?php echo $this->datos_detalle_estadia[$i]['documento']?></td>
                        <td align="center">
                            <input type="button" value="Buscar" class="k-button" id="btn_vtna_ciudades"/>
                        </td>
                    </tr>
                    <?php }?>
                </table>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td>Cliente:</td>
            <td>
                <input type="hidden" name="idcliente" id="idcliente"
                       value="<?php if(isset ($this->datos[0]['idcliente']))echo $this->datos[0]['idcliente']?>"/>
                <input type="text" class="k-textbox" placeholder="Busque cliente" required  readonly="readonly" name="cliente"
                       id="cliente" value="<?php if(isset ($this->datos[0]['cliente']))echo $this->datos[0]['cliente']?>"/>
            </td>
            <td>
                <button type="button" class="k-button" id="btn_vtna_clientes"><span class="k-icon k-i-search"></span></button>
                <button type="button" class="k-button" id="btn_vtna_agrega_pasajeros"><span class="k-icon k-i-plus"></span></button>
            </td>
            <td>Tipo de Comprobante:</td>
            <td>
                <select class="list" placeholder="Seleccione..." name="tipo_comprobante" id="tipo_comprobante" required>
                    <?php for($i=0;$i<count($this->datos_tipo_comprobante);$i++){ ?>
                        <?php if( $this->datos[0]['idtipo_comprobante'] == $this->datos_tipo_comprobante[$i]['idtipo_comprobante'] ){ ?>
                    <option value="<?php echo $this->datos_tipo_comprobante[$i]['idtipo_comprobante'] ?>" selected="selected"><?php echo utf8_encode($this->datos_tipo_comprobante[$i]['descripcion']) ?></option>
                        <?php } else { ?>
                    <option value="<?php echo $this->datos_tipo_comprobante[$i]['idtipo_comprobante'] ?>"><?php echo utf8_encode($this->datos_tipo_comprobante[$i]['descripcion']) ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="5">
                <table border="1" id="tbl_detalle_venta">
                    <tr>
                        <th>Item</th><th>Descripcion</th><th>Unidad de Medida</th><th>Cantidad</th><th>Precio</th><th>Subtotal</th>
                    </tr>
                    <?php $x=1; $total=0;?>
                    <?php if(isset ($this->datos_detalle_venta)){?>
                        <?php for($i=0;$i<count($this->datos_detalle_venta);$i++){ ?>
                    <tr>
                        <td>
                            <?php echo $x++; ?>
                        </td>
                        <td>
                            <input type="hidden" class="producto" value="<?php echo $this->datos_detalle_venta[$i]['idproducto']?>" />
                            <?php echo $this->datos_detalle_venta[$i]['producto']?>
                        </td>
                        <td>
                            <?php echo $this->datos_detalle_venta[$i]['um'] ?>
                        </td>
                        <td>
                            <?php echo $this->datos_detalle_venta[$i]['cantidad'] ?>
                        </td>
                        <td>
                            <?php echo $this->datos_detalle_venta[$i]['precio_venta'] ?>
                        </td>
                        <td>
                            <?php $total += $this->datos_detalle_venta[$i]['cantidad'] * $this->datos_detalle_venta[$i]['precio_venta'] ?>
                            <?php echo $this->datos_detalle_venta[$i]['cantidad'] * $this->datos_detalle_venta[$i]['precio_venta'] ?>
                        </td>
                    </tr>
                        <?php } ?>
                    <?php } ?>
                    <?php for($i=0;$i<count($this->datos_habitaciones);$i++){ ?>
                    <tr>
                        <td>
                            <?php echo $x++; ?>
                        </td>
                        <td>
                            <?php echo 'Habitacion '.$this->datos_habitaciones[$i]['habitacion'].' '.$this->datos_habitaciones[$i]['tipo']?>
                        </td>
                        <td>
                            <?php echo 'dias' ?>
                        </td>
                        <td>
                            <?php   $datetime1 = new DateTime($this->datos[0]['fecha_ingreso']);
                                    $datetime2 = new DateTime(date('d-m-Y'));
                                    $intervalo = $datetime1->diff($datetime2);
                                    $cantidad = $intervalo->format('%d%');
                                    echo $cantidad ?>
                        </td>
                        <td>
                            <?php echo $this->datos_habitaciones[$i]['costo'] ?>
                        </td>
                        <td>
                            <?php $total += $cantidad * $this->datos_habitaciones[$i]['costo'] ?>
                            <?php echo ($cantidad*$this->datos_habitaciones[$i]['costo']) ?>
                        </td>
                    </tr>
                        <?php } ?>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
            <td><label>Importe:</label></td>
            <td>
                <input type="text" class="k-textbox" required name="importe" id="importe" readonly="readonly"
                   value="<?php echo $total ?>"/>
            </td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
            <td><label>IGV:</label></td>
            <td>
                <input type="text" class="descuento" placeholder="0" name="igv" id="igv" 
                   value="<?php if(isset ($this->datos[0]['igv'])){echo $this->datos[0]['igv'];}else{echo '0';}?>" />
            </td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
            <td><label>Descuento:</label></td>
            <td>
                <input type="text" class="k-textbox" placeholder="0" id="descuento" 
                       value='0' name="descuento"/>
            </td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
            <td><label>Total:</label></td>
            <td>
                <input type="text" class="k-textbox" readonly="readonly" id="total" 
                       value='<?php echo $total ?>' name="total"/>
            </td>
        </tr>
    </table>
    <p>
        <td colspan="2" align="center">
            <button type="button" class="k-button" id="btn_confirmar">Confirmar</button>
            <a href="<?php echo BASE_URL ?>estadia" class="k-button cancel">Cancelar</a>
        </td>
    </p>
</form>


<div id="vtna_busca_ciudades">
    <h3>Destino</h3>
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