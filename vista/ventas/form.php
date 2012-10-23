<?php require("../cabecera.php");?>
	<form method="post" action="#">
    	<div align="center">
            <h3>Registrar Venta</h3>
            <div>
            	<label>Codigo</label>
                <input type="text" readonly="readonly" class="k-textbox" />
            </div>
            <div>
            	<label>Tipo de Documento</label>
                	<select class="combo"  placeholder="Seleccione..." required>
                    	<option></option>
                    </select>
            </div>
            <div>
            	<label>Nro.Documento</label>
                <input type="text" class="k-textbox" placeholder="Ingrese Nro.de documento" required />
            </div>
            <div>
            	<label>Cliente</label>
                	<select class="combo"  placeholder="Seleccione..." required>
                    	<option></option>
                    </select>
            </div>
            <div>
            	<label>Tipo de Transaccion</label>
                	<select class="combo"  placeholder="Seleccione..." required>
                    	<option></option>
                    </select>
            </div>
            <button type="button" class="k-button">Agregar Productos</button>
            <button type="button" class="k-button">Agregar Paquetes</button>
            <table border="1" align="center">
                <tr>
                    <td>Item</td><td>Descripcion</td><td>Precio</td><td>Cantidad</td><td>Unidad de Medida</td><td>Subtotal</td>
                </tr>
            </table>
            <div>
            	<label>Importe</label>
                <input type="text" readonly="readonly" class="k-textbox" />
            </div>
            <div>
            	<label>IGV</label>
                <input type="text" readonly="readonly" class="k-textbox" />
            </div>
            <div>
            	<label>Total</label>
                <input type="text" readonly="readonly" class="k-textbox" />
            </div>
            <div>
            	<label>Observaciones</label>
                <textarea class="k-textbox" placeholder="Ingrese las observaciones" style="height:100px;"></textarea>
            </div>
            <button type="button" class="k-button">Guardar</button>
    	</div>
    </form>
<?php require("../pie.php"); ?>