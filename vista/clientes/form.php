<h3><?php echo $this->titulo ?></h3>
<?php if(isset($this->action)){?>
<table>
    <tr>
        <td><label>Tipo de Cliente:</label></td>
        <td>
            <select class="list" placeholder="Seleccione..." id="tipo_cliente">
                <option value="natural" selected="selected">Natural</option>
                <option value="juridico">Juridico</option>
            </select>
        </td>
    </tr>
</table>
<br>
<?php }e ?>
<?php if($this->datos[0]['TIPO']=='juridico'){ ?>
<script>
$(document).ready(function(){
    $("#frm_cliente_natural").hide();
    $("#frm_cliente_juridico").show();
});
</script>
<?php } ?>
<div id="frm_cliente_natural">
    <form method="post" action="<?php if(isset ($this->action))echo $this->action ?>" id="frm_natural">
        <input type="hidden" name="guardar" id="guardar" value="1"/>
        <input type="hidden" name="tipo_cliente" value="natural"/>
        <input type="hidden" name="codigo" id="codigo"
               value="<?php if(isset ($this->datos[0]['IDCLIENTE']))echo $this->datos[0]['IDCLIENTE']?>"/>
        <table align="center" class="tabFormComplejo">
            <tr valign="top">
                <td><label>Nro.Documento:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese nro.de documento" required name="documento" onKeyPress="return soloNumeros(event);"
                      maxlength="8" id="nrodoc" value="<?php if(isset ($this->datos[0]['DOCUMENTO']))echo $this->datos[0]['DOCUMENTO']?>"/>
                    <br><div class="k-invalid-msg msgerror" data-for="documento"></div>
                </td>
                <td><label>Nombre:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese nombre" required name="nombres" onkeypress="return soloLetras(event)"
                       id="nombre" value="<?php if(isset ($this->datos[0]['NOMBRES']))echo $this->datos[0]['NOMBRES']?>"/>
                    <br><div class="k-invalid-msg msgerror" data-for="nombres"></div>
                </td>
                <td><label>Apellidos:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese apellidos" required name="apellidos" onkeypress="return soloLetras(event)"
                       id="apellidos" value="<?php if(isset ($this->datos[0]['APELLIDOS']))echo $this->datos[0]['APELLIDOS']?>"/>
                    <br><div class="k-invalid-msg msgerror" data-for="apellidos"></div>
                </td>
            </tr>
            <tr valign="top">
                <td><label>Direccion:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese direccion" required name="direccion"
                       id="direccion" value="<?php if(isset ($this->datos[0]['DIRECCION']))echo $this->datos[0]['DIRECCION']?>"/>
                    <br><div class="k-invalid-msg msgerror" data-for="direccion"></div>
                </td>
                <td><label>Sexo:</label></td>
                <td>
                    <?php if (isset ($this->datos[0]['SEXO']) && $this->datos[0]['SEXO']==0) {?>
                    <input type="radio" name="sexo" value ="1" />M
                    <input type="radio" name="sexo" value="0" checked="checked"/>F
                    <?php } else { ?>
                    <input type="radio" name="sexo" value ="1" checked="checked"/>M
                    <input type="radio" name="sexo" value="0" />F
                    <?php } ?>
                </td>
                <td><label>Telefono:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese nro.telefonico" name="telefono" onKeyPress="return numeroTelefonico(event);"
                       id="" value="<?php if(isset ($this->datos[0]['TELEFONO']))echo $this->datos[0]['TELEFONO']?>"/>
                </td>
            </tr>
            <tr valign="top">
                <td><label>Email:</label></td>
                <td>
                    <input type="email" class="k-textbox" placeholder="Ingrese email" name="email"
                       id="" value="<?php if(isset ($this->datos[0]['EMAIL']))echo $this->datos[0]['EMAIL']?>"/>
                    <br><div class="k-invalid-msg msgerror" data-for="email"></div>
                </td>
                <td><label>Fecha de Nacimiento:</label></td>
                <td>
                    <input readonly="readonly" placeholder="Seleccione fecha" name="fecha_nacimiento"
                       id="fechanac" value="<?php echo $this->datos[0]['FECHA_NACIMIENTO'] ?>"/>
                </td>
                <td><label>Profesion:</label></td>
                <td>
                   <select class="combo" placeholder="Seleccione..." name="profesion">
                        <option value="67"></option>
                        <?php for($i=0;$i<count($this->datos_profesiones);$i++){ ?>
                            <?php if( $this->datos[0]['IDPROFESION'] == $this->datos_profesiones[$i]['IDPROFESION'] ){ ?>
                        <option value="<?php echo $this->datos_profesiones[$i]['IDPROFESION'] ?>" selected="selected"><?php echo utf8_encode($this->datos_profesiones[$i]['DESCRIPCION']) ?></option>
                            <?php } else { ?>
                        <option value="<?php echo $this->datos_profesiones[$i]['IDPROFESION'] ?>"><?php echo utf8_encode($this->datos_profesiones[$i]['DESCRIPCION']) ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr valign="top">
                <td><label>Membresia:</label></td>
                <td>
                    <select class="combo" placeholder="Seleccione..." name="membresia">
                        <option value="0"></option>
                        <?php for($i=0;$i<count($this->datos_membresias);$i++){ ?>
                            <?php if( $this->datos[0]['IDMEMBRESIA'] == $this->datos_membresias[$i]['IDMEMBRESIA'] ){ ?>
                        <option value="<?php echo $this->datos_membresias[$i]['IDMEMBRESIA'] ?>" selected="selected"><?php echo utf8_encode($this->datos_membresias[$i]['DESCRIPCION']) ?></option>
                            <?php } else { ?>
                        <option value="<?php echo $this->datos_membresias[$i]['IDMEMBRESIA'] ?>"><?php echo utf8_encode($this->datos_membresias[$i]['DESCRIPCION']) ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                    <br><div class="msgerror"></div>
                </td>
                <td><label>Estado Civil:</label></td>
                <td>
                    <select class="combo" placeholder="Seleccione..." name="estado_civil">
                        <option></option>
                        <?php if($this->datos[0]['ESTADO_CIVIL']=='Soltero(a)'){?>
                        <option value="Soltero(a)" selected="selected">Soltero(a)</option>
                        <?php }else{ ?>
                        <option value="Soltero(a)">Soltero(a)</option>
                        <?php } ?>
                        <?php if($this->datos[0]['ESTADO_CIVIL']=='Casado(a)'){?>
                        <option value="Casado(a)" selected="selected">Casado(a)</option>
                        <?php }else{ ?>
                        <option value="Casado(a)">Casado(a)</option>
                        <?php } ?>
                        <?php if($this->datos[0]['ESTADO_CIVIL']=='Viudo(a)'){?>
                        <option value="Viudo(a)" selected="selected">Viudo(a)</option>
                        <?php }else{ ?>
                        <option value="Viudo(a)">Viudo(a)</option>
                        <?php } ?>
                        <?php if($this->datos[0]['ESTADO_CIVIL']=='Divorciado(a)'){?>
                        <option value="Divorciado(a)" selected="selected">Divorciado(a)</option>
                        <?php }else{ ?>
                        <option value="Divorciado(a)">Divorciado(a)</option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="6" align="center">
                    <p>
                        <button type="submit" class="k-button" id="saveformnatural">Guardar</button>
                        <a href="<?php echo BASE_URL ?>clientes" class="k-button cancel">Cancelar</a>
                    </p>
                </td>
            </tr>
        </table>
    </form>
</div>


<div id="frm_cliente_juridico">
    <form method="post" action="<?php if(isset ($this->action))echo $this->action ?>" id="frm_juridico">
        <input type="hidden" name="guardar" id="guardar" value="1"/>
        <input type="hidden" name="tipo_cliente" value="juridico"/>
        <input type="hidden" name="codigo" id="codigo"
               value="<?php if(isset ($this->datos[0]['IDCLIENTE']))echo $this->datos[0]['IDCLIENTE']?>"/>
        <div id="tabla">
        <table align="center" class="tabForm">
            <tr>
                <td><label>Ruc:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese ruc" required name="documento" onKeyPress="return soloNumeros(event);"
                       maxlength="11" id="ruc" value="<?php if(isset ($this->datos[0]['DOCUMENTO']))echo $this->datos[0]['DOCUMENTO']?>"/>
                </td>
                <td>
                    <div class="k-invalid-msg msgerror" data-for="documento"></div>
                </td>
            </tr>
            <tr>
                <td><label>Razon Social:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese nombre" required name="nombres"
                       id="razonsocial" value="<?php if(isset ($this->datos[0]['NOMBRES']))echo $this->datos[0]['NOMBRES']?>"/>
                </td>
                <td>
                    <div class="k-invalid-msg msgerror" data-for="nombres"></div>
                </td>
            </tr>
            <tr>
                <td><label>Direccion:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese direccion" required name="direccion"
                       id="direccionrs" value="<?php if(isset ($this->datos[0]['DIRECCION']))echo $this->datos[0]['DIRECCION']?>"/>
                </td>
                <td>
                    <div class="k-invalid-msg msgerror" data-for="direccion"></div>
                </td>
            </tr>
            <tr>
                <td><label>Telefono:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese nro.telefonico" name="telefono" onKeyPress="return numeroTelefonico(event);"
                       id="" value="<?php if(isset ($this->datos[0]['TELEFONO']))echo $this->datos[0]['TELEFONO']?>"/>
                </td>
                <td>
                    <div class="msgerror"></div>
                </td>
            </tr>
            <tr>
                <td><label>Email:</label></td>
                <td>
                    <input type="email" class="k-textbox" placeholder="Ingrese email" name="email"
                       id="" value="<?php if(isset ($this->datos[0]['EMAIL']))echo $this->datos[0]['EMAIL']?>"/>
                </td>
                <td>
                    <div class="msgerror"></div>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <p>
                        <button type="submit" class="k-button" id="saveformjuridico">Guardar</button>
                        <a href="<?php echo BASE_URL ?>clientes" class="k-button cancel">Cancelar</a>
                    </p>
                </td>
                <td>
                    <div class="msgerror"></div>
                </td>
            </tr>
        </table>
        </div>
    </form>
</div>