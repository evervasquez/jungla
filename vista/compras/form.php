<?php require("../cabecera.php");?>
	<form method="post" action="#">
    	<div align="center">
            <h3>Registrar Compra</h3>
            <div>Codigo<input type="text" disabled="disabled" /></div>
            <div>Nro.Documento<input type="text" /></div>
            <div>Proveedor
                	<select>
                    	<option>Seleccione...</option>
                    </select>
            </div>
            <div>Tipo de Transaccion
                	<select>
                    	<option>Seleccione...</option>
                    </select>
            </div>
            <div>Fecha de Compra<input type="date" /></div>
            <button type="button" class="k-button">Agregar Productos</button>
            <table border="1">
                <tr>
                    <td>Item</td><td>Descripcion</td><td>Precio</td><td>Cantidad</td><td>Unidad de Medida</td><td>Subtotal</td>
                </tr>
            </table>
            <div>Importe<input type="text" /></div>
            <div>IGV<input type="text" /></div>
            <div>Observaciones<input type="text" /></div>
            <button type="button" class="k-button">Guardar</button>
    	</div>
    </form>
<?php require("../pie.php"); ?>