<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>" class="tabForm" id="frm">
    <h3>Amortizar Cobro:</h3>
    <input type="hidden" name="guardar" id="guardar" value="1"/>
    <input type="hidden" name="codigo" id="codigo" value="<?php if(isset ($this->datos[0]['IDCOMPRA']))echo $this->datos[0]['IDCOMPRA']?>"/>
    <input type="hidden" id="monto_restante" value="<?php echo $this->monto_restante?>" />
<table align="center">
    <tr>
        <td><label>Fecha Pago:</label></td>
        <td>
            <input class="datepicker" readonly="readonly" placeholder="Seleccione fecha" name="fecha_pago" required
                   id="fechapago" value="<?php echo date('d-m-Y')?>"/>
        </td>
        <td><div class="k-invalid-msg msgerror" data-for="fecha_pago"></div></td>
    </tr>
    <tr>
        <td><label>Monto Amortizado:</label></td>
        <td>
            <input class="precio" placeholder="Ingrese monto" required name="monto" id="monto" />
        </td>
        <td><div class="k-invalid-msg msgerror" data-for="monto"></div></td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            <p>
                <button type="button" class="k-button" id="saveform">Guardar</button>
                <a href="<?php echo BASE_URL ?>cobros" class="k-button cancel">Cancelar</a>
            </p>
        </td>
        <td><div class="msgerror"></div></td>
    </tr>
</table>
</form>