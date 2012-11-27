<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>" id="frm">
    <input type="hidden" name="guardar" id="guardar" value="1"/>
    <h3><?php echo $this->titulo ?></h3>
    <div id="tabla">
    <table align="center" class="tabForm">
        <tr>
            <td><label>Codigo:</label></td>
            <td><input type="text" class="k-textbox" readonly="readonly" name="codigo" id="codigo"
                       value="<?php if(isset ($this->datos[0]['idcomprobante']))echo $this->datos[0]['idcomprobante']?>"/></td>
            <td>
                <div class="msgerror"></div>
            </td>
        </tr>
        <tr>
            <td><label>Tipo de Comprobante:</label></td>
            <td>
                <select class="list" placeholder="Seleccione..." name="tipo_comprobante" required>
                    <?php for($i=0;$i<count($this->datos_tipo_comprobante);$i++){ ?>
                        <?php if( $this->datos[0]['idtipo_comprobante'] == $this->datos_tipo_comprobante[$i]['idtipo_comprobante'] ){ ?>
                    <option value="<?php echo $this->datos_tipo_comprobante[$i]['idtipo_comprobante'] ?>" selected="selected"><?php echo utf8_encode($this->datos_tipo_comprobante[$i]['descripcion']) ?></option>
                        <?php } else { ?>
                    <option value="<?php echo $this->datos_tipo_comprobante[$i]['idtipo_comprobante'] ?>"><?php echo utf8_encode($this->datos_tipo_comprobante[$i]['descripcion']) ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="serie">Serie:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese serie" required name="serie" 
                       id="serie" value="<?php if(isset ($this->datos[0]['serie']))echo $this->datos[0]['serie']?>"/></td>
            <td>
                <div class="k-invalid-msg msgerror" data-for="serie"></div>
            </td>
        </tr>
        <tr>
            <td><label for="correlativo">Correlativo:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese correlativo" required name="correlativo" 
                       id="correlativo" value="<?php if(isset ($this->datos[0]['correlativo']))echo $this->datos[0]['correlativo']?>"/></td>
            <td>
                <div class="k-invalid-msg msgerror" data-for="correlativo"></div>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <p><button type="submit" class="k-button" id="saveform">Guardar</button>
                <a href="<?php echo BASE_URL ?>comprobantes" class="k-button cancel">Cancelar</a></p>
            </td>
            <td>
                <div class="msgerror"></div>
            </td>
        </tr>
    </table>
    </div>
</form>