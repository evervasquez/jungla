<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>" class="tabForm" id="frm" onsubmit="return validarEmpleado();">
    <h3>Amortizar Deuda:</h3>
    <input type="hidden" name="guardar" id="guardar" value="1"/>
    <input type="hidden" name="codigo" id="codigo"
            value="<?php if(isset ($this->datos[0]['idcompra']))echo $this->datos[0]['idcompra']?>"/>
<table align="center">
    <tr>
        <td><label>Fecha Pago:</label></td>
        <td>
            <input class="datepicker" readonly="readonly" placeholder="Seleccione fecha" name="fecha_pago" required
                   id="fechapago" value="<?php echo date('d-m-Y')?>"/>
        </td>
    </tr>
    <tr>
        <td><label>Monto Amortizado:</label></td>
        <td>
            <input type="text" class="k-textbox" placeholder="Ingrese motno" required name="monto" />
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            <p>
                <button type="submit" class="k-button" id="saveform">Guardar</button>
                <a href="<?php echo BASE_URL ?>cobros" class="k-button cancel">Cancelar</a>
            </p>
        </td>
    </tr>
</table>