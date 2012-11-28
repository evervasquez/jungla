<form method="post" action="<?php if (isset($this->action)) echo $this->action ?>" id="frm">
    <input type="hidden" name="guardar" id="guardar" value="1"/>
    <h3><?php echo $this->titulo ?></h3>
    <div id="tabla">
        <table align="center" class="tabForm">
            <tr>
                <td><label>Codigo:</label></td>
                <td><input type="text" class="k-textbox" readonly="readonly" name="codigo" id="codigo"
                           value="<?php if (isset($this->datos[0]['idplantilla_movimiento'])) echo $this->datos[0]['idplantilla_movimiento'] ?>"/></td>
                <td>
                    <div class="msgerror"></div>
                </td>
            </tr>
            <tr>
                <td><label for="descripcion">Descripcion:</label></td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese la plantilla movimiento" required name="descripcion" onkeypress="return soloLetras(event)"
                           id="descripcion" value="<?php if (isset($this->datos[0]['descripcion'])) echo $this->datos[0]['descripcion'] ?>"/></td>
                <td>
                    <div class="k-invalid-msg msgerror" data-for="descripcion"></div>
                </td>
            </tr>
            <tr>
                <td><label for="idcuenta">Cuenta:</label></td>
                <td>
                    <select class="combo" placeholder="Seleccione..." required name="idcuenta" id="idcuenta">
                        <option></option>
                        <?php for ($i = 0; $i < count($this->datosCuentas); $i++) { ?>
                            <?php if ($this->datos[0]['idcuenta'] == $this->datosCuentas[$i]['idcuenta']) { ?>
                                <option value="<?php echo $this->datosCuentas[$i]['idcuenta'] ?>" selected="selected"><?php echo $this->datosCuentas[$i]['nro_cuenta'] . ':' . utf8_encode($this->datosCuentas[$i]['descripcion']); ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $this->datosCuentas[$i]['idcuenta'] ?>"><?php echo $this->datosCuentas[$i]['nro_cuenta'] . ':' . utf8_encode($this->datosCuentas[$i]['descripcion']); ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </td>
                <td>
                    <div class="k-invalid-msg msgerror" data-for="idcuenta"></div>
                </td>
            </tr>
            <tr>
                <td><label for="idconcepto_movimiento">Concepto Movimiento:</label></td>
                <td>
                    <select class="combo" placeholder="Seleccione..." required name="idconcepto_movimiento" id="idconcepto_movimiento">
                        <option></option>

                        <?php for ($i = 0; $i < count($this->datosConcepto); $i++) { ?>
                            <?php if ($this->datos[0]['idconcepto_movimiento'] == $this->datosConcepto[$i]['idconcepto_movimiento']) { ?>
                        <option value="<?php echo $this->datosConcepto[$i]['idconcepto_movimiento'] ?>" selected="selected"><?php echo utf8_encode($this->datosConcepto[$i]['descripcion']); ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $this->datosConcepto[$i]['idconcepto_movimiento'] ?>"><?php echo utf8_encode($this->datosConcepto[$i]['descripcion']); ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </td>
                <td>
                    <div class="k-invalid-msg msgerror" data-for="idconcepto_movimiento"></div>
                </td>
            </tr>
            <tr>
                <td><label>Tipo</label></td>
                <td>
                    <select class="combo" placeholder="Seleccione..." required name="debe_haber" id="debe_haber">
                        <option></option>
                        <?php if ($this->datos[0]['debe_haber'] == 'debe') { ?>
                            <option value="debe" selected="selected">debe</option>
                            <option value="haber">haber</option>
                            <?php } 
                            else{
                            if ($this->datos[0]['debe_haber'] == 'haber') { ?>
                            <option value="debe">debe</option>
                            <option value="haber" selected="selected">haber</option>
                        <?php }else{ ?>
                            <option value="debe">debe</option>
                            <option value="haber">haber</option>
                            <?php }}?>
                    </select>
                </td>
                <td>
                    <div class="k-invalid-msg msgerror" data-for="debe_haber"></div>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <p><button type="submit" class="k-button" id="saveform">Guardar</button>
                        <a href="<?php echo BASE_URL ?>plantilla_movimiento" class="k-button cancel">Cancelar</a></p>
                </td>
                <td>
                    <div class="msgerror"></div>
                </td>
            </tr>
        </table>
    </div>
</form>