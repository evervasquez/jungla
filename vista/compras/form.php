<?php require("../cabecera.php");?>
	<form method="post" action="#">
    	<div align="center">
            <h3>Registrar Compra</h3>
            <div>
            	<label>Codigo</label>
                <input type="text" readonly="readonly" class="k-textbox" />
            </div>
            <div>
            	<label>Nro.Documento</label>
                <input type="text" class="k-textbox" placeholder="Ingrese Nro.de Documento" required/>
            </div>
            <div>
            	<label>Proveedor</label>
                <select class="combo" placeholder="Seleccione...">
                    <option></option>
                </select>
            </div>
            <div>
            	<label>Tipo de Transaccion</label>
                <select class="combo" placeholder="Seleccione...">
                    <option></option>
                </select>
            </div>
            <div>
            	<label>Fecha de Compra</label>
                <input class="datepicker" value=""  placeholder="Seleccione fecha"/>
            </div>
            <button type="button" class="k-button">Agregar Productos</button>
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
                <input type="text" readonly="readonly" class="k-textbox"/>
            </div>
            <div>
            	<label>Observaciones</label>
                <textarea type="text" class="k-textbox" placeholder="Ingrese observaciones" style="height:50px;">
                </textarea>
            </div>
            <button type="submit" class="k-button">Guardar</button>
    	</div>
    </form>
<?php require("../pie.php"); ?>