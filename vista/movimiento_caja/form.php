<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>" id="frm">
    <input type="hidden" name="guardar" id="guardar" value="1"/>
    <h3><?php echo $this->titulo ?></h3>
    <div id="tabla">
    <table align="center" class="tabForm">
        <tr>
            <td><label>Concepto Movimiento:</label></td>
            <td>
                <select class="combo" placeholder="Seleccione..." required name="concepto" id="concepto">
                    <option></option>
                    <?php for($i=0;$i<count($this->datos_concepto_movimiento);$i++){ ?>
                    <?php if($this->datos_concepto_movimiento[$i]['IDCONCEPTO_MOVIMIENTO']>5){?>
                    <option value="<?php echo $this->datos_concepto_movimiento[$i]['IDCONCEPTO_MOVIMIENTO'] ?>"><?php echo $this->datos_concepto_movimiento[$i]['DESCRIPCION'] ?></option>
                    <?php } ?>
                    <?php } ?>
                </select>
            </td>
            <td>
                <div class="msgerror"></div>
            </td>
        </tr>
        <tr>
            <td><label>Monto:</label></td>
            <td><input type="text" class="k-textbox" name="monto" id="monto" placeholder="Ingrese Monto"
                       value=""/>
            </td>
            <td>
                <div class="msgerror"></div>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <p><button type="submit" class="k-button" id="saveform">Guardar</button>
                <a href="<?php echo BASE_URL ?>movimiento_caja" class="k-button cancel">Cancelar</a></p>
            </td>
            <td>
                <div class="msgerror"></div>
            </td>
        </tr>
    </table>
    </div>