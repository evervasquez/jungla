<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>" id="frm">
    <input type="hidden" name="guardar" id="guardar" value="1"/>
    <h3><?php echo $this->titulo ?></h3>
    <div id="tabla">
    <table align="center" class="tabForm">
        <tr>
            <td><label>Codigo:</label></td>
            <td><input type="text" class="k-textbox" readonly="readonly" name="codigo" id="codigo"
                       value="<?php if(isset ($this->datos[0]['IDUBICACION']))echo $this->datos[0]['IDUBICACION']?>"/></td>
            <td>
                <div class="msgerror"></div>
            </td>
        </tr>
        <tr>
            <td><label for="descripcion">Descripcion:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese ubicacion" required name="descripcion"
                       id="descripcion" value="<?php if(isset ($this->datos[0]['DESCRIPCION']))echo $this->datos[0]['DESCRIPCION']?>"/></td>
            <td>
                <div class="k-invalid-msg msgerror" data-for="descripcion"></div>
            </td>
        </tr>
        <tr>
            <td><label for="almacen">Almacen:</label></td>
            <td>
                <select class="combo" placeholder="Seleccione..." required name="almacen" id="almacen">
                    <option></option>
                    <?php for($i=0;$i<count($this->datosAlmacen);$i++){ ?>
                        <?php if( $this->datos[0]['IDALMACEN'] == $this->datosAlmacen[$i]['IDALMACEN'] ){ ?>
                    <option value="<?php echo $this->datosAlmacen[$i]['IDALMACEN'] ?>" selected="selected"><?php echo $this->datosAlmacen[$i]['DESCRIPCION'] ?></option>
                        <?php } else { ?>
                    <option value="<?php echo $this->datosAlmacen[$i]['IDALMACEN'] ?>"><?php echo $this->datosAlmacen[$i]['DESCRIPCION'] ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </td>
            <td>
                <div class="k-invalid-msg msgerror" data-for="almacen"></div>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <p><button type="submit" class="k-button" id="saveform">Guardar</button>
                <a href="<?php echo BASE_URL ?>ubicaciones" class="k-button cancel">Cancelar</a></p>
            </td>
            <td>
                <div class="msgerror"></div>
            </td>
        </tr>
    </table>
</div>
</form>