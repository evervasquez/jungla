<?php require("../cabecera.php");?>
	<form method="post" action="#">
    	<div align="center">
            <h3>Registrar Comanda</h3>
            <div>
            	<label>Codigo</label>
                <input type="text" readonly="readonly" class="k-textbox" />
            </div>
            <div>
            	<label>Venta</label>
                <select class="combo" placeholder="Seleccione...">
                    <option></option>
                </select>
            </div>
            <button type="button" class="k-button">Agregar Producto</button>
            <button type="button" class="k-button">Agregar Paquete</button>
            <table border="1" align="center">
                <tr>
                    <td>Item</td><td>Descripcion</td><td>Precio</td><td>Cantidad</td><td>Unidad de Medida</td><td>Subtotal</td>
                </tr>
            </table>
            <div>
            	<label>Total</label>
                <input type="text" readonly="readonly" class="k-textbox" />
            </div>
            <div>
            	<label>Descuento</label>
                <input type="text" class="k-textbox" placeholder="Ingrese Descuento" required/>
            </div>
            <button type="submit" class="k-button">Guardar</button>
    	</div>
    </form>
<?php require("../pie.php"); ?>