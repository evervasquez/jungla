<form method="post" action="#">
    <div align="center">
        <h3>Registrar Habitacion</h3>
        <div>
            <label>Codigo</label>
            <input type="text" readonly="readonly" class="k-textbox" />
        </div>
        <div>
            <label>Nro.de Habitacion</label>
            <input type="text" class="k-textbox" placeholder="Ingrese Nro.de habitacion" required />
        </div>
        <div>
            <label>Descripcion</label>
            <input type="text" class="k-textbox" placeholder="Ingrese descripcion" required />
        </div>
        <button type="button" class="k-button">Asignar Tipo de Habitacion</button>
        <table border="1">
            <tr>
                <td>Tipo de Habitacion</td><td>Costo</td><td>Observacion</td>
            </tr>
        </table>
        <button type="submit" class="k-button">Guardar</button>
    </div>
</form>