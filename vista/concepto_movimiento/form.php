<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>">
    <input type="hidden" name="guardar" id="guardar" value="1"/>
    <table width="50%" align="center">
        <caption><h3><?php echo $this->titulo ?></h3></caption>
        <tr>
            <td><label>Codigo:</label></td>
            <td><input type="text" class="k-textbox" readonly="readonly" name="codigo" id="codigo"
                       value="<?php if(isset ($this->datos[0]['idconcepto_movimiento']))echo $this->datos[0]['idconcepto_movimiento']?>"/></td>
        </tr>
        <tr>
            <td><label>Descripcion:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese almacen" required name="descripcion"
                       id="descripcion" value="<?php if(isset ($this->datos[0]['descripcion']))echo $this->datos[0]['descripcion']?>"/></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <p><button type="submit" class="k-button">Guardar</button>
                <a href="<?php BASE_URL ?>concepto_movimiento" class="k-button">Cancelar</a></p>
            </td>
        </tr>
    </table>
</form>