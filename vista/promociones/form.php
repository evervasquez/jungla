<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>" id="frm" >
    <input type="hidden" name="guardar" id="guardar" value="1"/>
    <h3><?php echo $this->titulo ?></h3>
    <div id="tabla">
    <table align="center" class="tabForm">
        <tr>
            <td><label>Codigo:</label></td>
            <td><input type="text" class="k-textbox" readonly="readonly" name="codigo" id="codigo"
                       value="<?php if(isset ($this->datos[0]['idpromocion']))echo $this->datos[0]['idpromocion']?>"/></td>
            <td>
                <div class="msgerror"></div>
            </td>
        </tr>
        <tr>
            <td><label for="descripcion">Descripcion:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese promocion" required name="descripcion" onkeypress="return soloLetras(event)"
                       id="descripcion" value="<?php if(isset ($this->datos[0]['descripcion']))echo $this->datos[0]['descripcion']?>" /></td>
            <td>
                <div class="k-invalid-msg msgerror" data-for="descripcion"></div>
            </td>
        </tr>
        <tr>
            <td><label for="descuento">Descuento:</label></td>
            <td><input type="number" class="descuento" placeholder="Ingrese descuento" required data-max-msg="Dato requerido" name="descuento" onkeypress="return dosDecimales(event, this)"
                       id="descuento" value="<?php if(isset ($this->datos[0]['descuento']))echo $this->datos[0]['descuento']?>" />
            </td>
            <td>
                <div class="k-invalid-msg msgerror" data-for="descuento"></div>
            </td>
        </tr>
        <tr>
            <td><label for="fecha_inicio">Fecha de Inicio:</label></td>
            <td><input class="datepicker" readonly="readonly" placeholder="Seleccione fecha" required name="fecha_inicio"
                       id="fechaini" value="<?php if(isset ($this->datos[0]['fecha_inicio'])){
                               $fecha=$this->datos[0]['fecha_inicio'];
                               echo substr($fecha,8,2).'-'.substr($fecha,5,2).'-'.substr($fecha,0,4);}?>"/>
            </td>
            <td>
                <div class="k-invalid-msg msgerror" data-for="fecha_inicio"></div>
            </td>
        </tr>
        <tr>
            <td><label for="fecha_final">Fecha de Finalizacion:</label></td>
            <td><input class="datepicker" readonly="readonly" placeholder="Seleccione fecha" required name="fecha_final"
                       id="fechafin" value="<?php if(isset ($this->datos[0]['fecha_final'])){
                               $fecha=$this->datos[0]['fecha_final'];
                               echo substr($fecha,8,2).'-'.substr($fecha,5,2).'-'.substr($fecha,0,4);}?>"/>
            </td>
            <td>
                <div class="k-invalid-msg msgerror" data-for="fecha_final"></div>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <p><button type="submit" class="k-button" id="saveform">Guardar</button>
                <a href="<?php echo BASE_URL ?>promociones" class="k-button cancel">Cancelar</a></p>
            </td>
            <td>
                <div class="msgerror"></div>
            </td>
        </tr>
    </table>
    </div>
</form>