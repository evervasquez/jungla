<?php require("../cabecera.php");?>
	<form method="post" action="#">
    	<div align="center">
            <h3>Registrar Estadia</h3>
            <div>
            	<label>Codigo</label>
                <input type="text" readonly="readonly" class="k-textbox" />
            </div>
            <div>
            	<label>Representante</label>
                <select class="combo" placeholder="Seleccione...">
                    <option></option>
                </select>
            </div>
            <div>
            	<label>Venta</label>
                <select class="combo" placeholder="Seleccione...">
                    <option></option>
                </select>
            </div>
            <div>
            	<label>Fecha de Reserva</label>
                <input class="datepicker" value=""  placeholder="Seleccione fecha"/>
            </div>
            <div>
            	<label>Fecha de Ingreso</label>
                <input class="datepicker" value=""  placeholder="Seleccione fecha"/>
            </div>
            <div>
            	<label>Fecha de Salida</label>
                <input class="datepicker" value=""  placeholder="Seleccione fecha"/>
            </div>
            <button type="button" class="k-button">Agregar Pasajeros</button>
            <table border="1" align="center">
                <tr>
                    <td>ID</td><td>Nombre</td><td>Apellidos</td><td>Habitacion</td><td>Tipo de Habitacion</td>
                </tr>
            </table>
            <button type="submit" class="k-button">Guardar</button>
    	</div>
    </form>
<?php require("../pie.php"); ?>