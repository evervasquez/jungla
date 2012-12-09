<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>" id="frm">
    <input type="hidden" name="guardar" id="guardar" value="1"/>
    <h3><?php echo $this->titulo ?></h3>
    <table align="center" class="tabFormComplejo">
        <tr valign="top">
            <td><label>Telefono:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese telefono" required name="telefono"
                       id="telefono" value="<?php if(isset ($this->datos[0]['TELEFONO']))echo $this->datos[0]['TELEFONO']?>"/>
                <br><div class="k-invalid-msg msgerror" data-for="telefono"></div>
            </td>
            <td><label>Movistar:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese nro.movistar" required name="movistar"
                       id="movistar" value="<?php if(isset ($this->datos[0]['MOVISTAR']))echo $this->datos[0]['MOVISTAR']?>"/>
                <br><div class="k-invalid-msg msgerror" data-for="movistar"></div>
            </td>
        </tr>
        <tr valign="top">
            <td><label>RPM:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese rpm" required name="rpm"
                       id="rpm" value="<?php if(isset ($this->datos[0]['RPM']))echo $this->datos[0]['RPM']?>"/>
                <br><div class="k-invalid-msg msgerror" data-for="rpm"></div>
            </td>
            <td><label>RPC:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese rpc" required name="rpc"
                       id="rpc" value="<?php if(isset ($this->datos[0]['RPC']))echo $this->datos[0]['RPC']?>"/>
                <br><div class="k-invalid-msg msgerror" data-for="rpc"></div>
            </td>
        </tr>
        <tr valign="top">
            <td><label>Dirección:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese direccion" required name="direccion"
                       id="direccion" value="<?php if(isset ($this->datos[0]['DIRECCION']))echo $this->datos[0]['DIRECCION']?>"/>
                <br><div class="k-invalid-msg msgerror" data-for="direccion"></div>
            </td>
            <td><label>Email:</label></td>

            <td><input type="text" class="k-textbox" placeholder="Ingrese email" required name="e_mail"
                       id="e_mail" value="<?php if(isset ($this->datos[0]['E_EMAIL']))echo $this->datos[0]['E_EMAIL']?>"/>
                <br><div class="k-invalid-msg msgerror" data-for="e_mail"></div>
            </td>
        </tr>
        <tr valign="top">
            <td><label style="height: 65px">Presentacion:</label></td>
            <td colspan="3"><textarea class="k-textbox textarea" style="height: 75px" placeholder="Ingrese presentacion" required name="presentacion"
                       id="presentacion"><?php if(isset ($this->datos[0]['PRESENTACION']))echo $this->datos[0]['PRESENTACION']?></textarea>
                <br><div class="k-invalid-msg msgerror" data-for="presentacion"></div>
            </td>
        </tr>
        <tr valign="top">
            <td><label style="height: 65px">Misión:</label></td>
            <td colspan="3"><textarea class="k-textbox textarea" style="height: 75px" placeholder="Ingrese mision" required name="mision"
                       id="mision"><?php if(isset ($this->datos[0]['MISION']))echo $this->datos[0]['MISION']?></textarea>
                <br><div class="k-invalid-msg msgerror" data-for="mision"></div>
            </td>
        </tr>
        <tr valign="top">
            <td><label style="height: 65px">Visión:</label></td>
            <td colspan="3"><textarea class="k-textbox textarea" style="height: 75px" placeholder="Ingrese vision" required name="vision"
                       id="vision"><?php if(isset ($this->datos[0]['VISION']))echo $this->datos[0]['VISION']?></textarea>
                <br><div class="k-invalid-msg msgerror" data-for="vision"></div>
            </td>
        </tr>
        <tr>
            <td colspan="4" align="center">
                <p><button type="submit" class="k-button" id="saveform">Guardar</button>
                <a href="<?php echo BASE_URL ?>datos_empresa" class="k-button cancel">Cancelar</a></p>
            </td>
        </tr>
    </table>
</form>