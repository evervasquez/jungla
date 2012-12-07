<form method="post" action="<?php if (isset($this->action)) echo $this->action ?>" id="frm">
    <input type="hidden" name="guardar" id="guardar" value="1"/>
    <h3><?php echo $this->titulo ?></h3>
    <div id="tabla">
        <table align="center" class="tabForm">
            <tr>
                <td><label>Codigo:</label></td>
                <td><input type="text" class="k-textbox" readonly="readonly" name="codigo" id="codigo"
                           value="<?php if (isset($this->datos[0]['IDPLANTILLA_MOVIMIENTO'])) echo $this->datos[0]['IDPLANTILLA_MOVIMIENTO'] ?>"/></td>
                <td>
                    <div class="msgerror"></div>
                </td>
            </tr>
            <tr>
                <td><label for="descripcion">Descripcion:</label></td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese la plantilla movimiento" required name="descripcion" onkeypress="return soloLetras(event)"
                           id="descripcion" value="<?php if (isset($this->datos[0]['DESCRIPCION'])) echo $this->datos[0]['DESCRIPCION'] ?>"/></td>
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
                            <?php if ($this->datos[0]['IDCUENTA'] == $this->datosCuentas[$i]['IDCUENTA']) { ?>
                                <option value="<?php echo $this->datosCuentas[$i]['IDCUENTA'] ?>" selected="selected"><?php echo $this->datosCuentas[$i]['NRO_CUENTA'] . ':' . utf8_encode($this->datosCuentas[$i]['DESCRIPCION']); ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $this->datosCuentas[$i]['IDCUENTA'] ?>"><?php echo $this->datosCuentas[$i]['NRO_CUENTA'] . ':' . utf8_encode($this->datosCuentas[$i]['DESCRIPCION']); ?></option>
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
                            <?php if ($this->datos[0]['IDCONCEPTO_MOVIMIENTO'] == $this->datosConcepto[$i]['IDCONCEPTO_MOVIMIENTO']) { ?>
                        <option value="<?php echo $this->datosConcepto[$i]['IDCONCEPTO_MOVIMIENTO'] ?>" selected="selected"><?php echo utf8_encode($this->datosConcepto[$i]['DESCRIPCION']); ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $this->datosConcepto[$i]['IDCONCEPTO_MOVIMIENTO'] ?>"><?php echo utf8_encode($this->datosConcepto[$i]['DESCRIPCION']); ?></option>
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
                        <?php if ($this->datos[0]['DEBE_HABER'] == 'debe') { ?>
                            <option value="debe" selected="selected">debe</option>
                            <option value="haber">haber</option>
                            <?php } 
                            else{
                            if ($this->datos[0]['DEBE_HABER'] == 'haber') { ?>
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