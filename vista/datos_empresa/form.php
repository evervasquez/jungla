<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>" id="frm">
    <input type="hidden" name="guardar" id="guardar" value="1"/>
    <h3><?php echo $this->titulo ?></h3>
    <input type="hidden" name="codigo" id="codigo" value="1"/>
    <table align="center" class="tabFormComplejo">
        <tr valign="top">
            <td><label>Razon Social:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese razon social" required name="descripcion"
                       id="descripcion" value="<?php if(isset ($this->datos[0]['NOMBRE_COMERCIAL']))echo $this->datos[0]['NOMBRE_COMERCIAL']?>"/>
                <br><div class="k-invalid-msg msgerror" data-for="descripcion"></div>
            </td>
            <td><label>RUC:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese ruc" required name="ruc"
                       id="ruc" value="<?php if(isset ($this->datos[0]['RUC']))echo $this->datos[0]['RUC']?>"/>
                <br><div class="k-invalid-msg msgerror" data-for="ruc"></div>
            </td>
        </tr>
        <tr valign="top">
            <td><label>Dirección:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese direccion" required name="direccion"
                       id="direccion" value="<?php if(isset ($this->datos[0]['DIRECCION']))echo $this->datos[0]['DIRECCION']?>"/>
                <br><div class="k-invalid-msg msgerror" data-for="direccion"></div>
            </td>
            <td><label>Email:</label></td>
            <td><input type="email" class="k-textbox" placeholder="Ingrese email" required name="e_mail"
                       id="e_mail" value="<?php if(isset ($this->datos[0]['E_EMAIL']))echo $this->datos[0]['E_MAIL']?>"/>
                <br><div class="k-invalid-msg msgerror" data-for="e_mail"></div>
            </td>
        </tr>
        <tr valign="top">
            <td><label>Fecha y Hora:</label></td>
            <td><input class="horayfecha" placeholder="Ingrese direccion" required name="direccion"
                       id="direccion" value=""/>
                <br><div class="k-invalid-msg msgerror" data-for="direccion"></div>
            </td>
            <td><label>Email:</label></td>
            <td><input type="email" class="k-textbox" placeholder="Ingrese email" required name="e_mail"
                       id="e_mail" value="<?php if(isset ($this->datos[0]['E_MAIL']))echo $this->datos[0]['E_MAIL']?>"/>
                <br><div class="k-invalid-msg msgerror" data-for="e_mail"></div>
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