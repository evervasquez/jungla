<?php require("../cabecera.php");?>
	<form method="post" action="#">
    	<div align="center">
            <h3>Registrar Paquete</h3>
            <div>
            	<label>Codigo</label>
                <input type="text" readonly="readonly" class="k-textbox" /></div>
            <div>
            	<label>Descripcion</label>
                <input type="text" class="k-textbox" placeholder="Ingrese descripcion" required />
            </div>
            <button type="button" class="k-button">Agregar Productos</button>
            <table border="1">
                <tr>
                    <td>Item</td><td>Descripcion</td><td>Cantidad</td><td>Precio</td><td>Unidad de Medida</td><td>SubTotal</td>
                </tr>
            </table>
            <div>
            	<label>Total</label>
                <input type="text" class="k-textbox" readonly="readonly"/>
            </div>
            <div>
            	<label>Descuento</label>
                <input type="text"  class="k-textbox" placeholder="Ingrese descuento" />
            </div>
            <div>
            	<label>Costo</label>
                <input type="text" class="k-textbox" readonly="readonly"/>
            </div>
            <button type="submit" class="k-button">Guardar</button>
    	</div>
    </form>
<?php require("../pie.php"); ?>