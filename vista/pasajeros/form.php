<h3><?php echo $this->titulo ?></h3>
<?php if(isset($this->action)){?>
<table>
    <tr>
        <td><label>Tipo de Pasajero:</label></td>
        <td>
            <select class="combo" placeholder="Seleccione..." id="tipo_cliente">
                <option value="natural" selected="selected">Natural</option>
                <option value="juridico">Juridico</option>
            </select>
        </td>
    </tr>
</table>
<br>
<?php }e ?>
<?php if($this->datos[0]['tipo']=='juridico'){ ?>
<script>
$(document).ready(function(){
    $("#frm_cliente_natural").hide();
    $("#frm_cliente_juridico").show();
});
</script>
<?php } ?>
<div id="frm_cliente_natural" class="tabFormComplejo">
    <form method="post" action="<?php if(isset ($this->action))echo $this->action ?>" id="frm_natural">
        <input type="hidden" name="guardar" id="guardar" value="1"/>
        <input type="hidden" name="tipo_cliente" value="natural"/>
        <input type="hidden" name="codigo" id="codigo"
               value="<?php if(isset ($this->datos[0]['idcliente']))echo $this->datos[0]['idcliente']?>"/>
        <table class="tabFormComplejo" align="center">
            <tr valign="top">
                <td><label>Nombre:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese nombre" required name="nombres" onkeypress="return soloLetras(event)"
                       id="" value="<?php if(isset ($this->datos[0]['nombres']))echo $this->datos[0]['nombres']?>"/>
                    <br><div class="k-invalid-msg msgerror" data-for="nombres"></div>
                </td>
                <td><label>Apellidos:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese apellidos" required name="apellidos" onkeypress="return soloLetras(event)"
                       id="" value="<?php if(isset ($this->datos[0]['apellidos']))echo $this->datos[0]['apellidos']?>"/>
                    <br><div class="k-invalid-msg msgerror" data-for="apellidos"></div>
                </td>
                <td><label>Direccion:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese direccion" required name="direccion"
                       id="" value="<?php if(isset ($this->datos[0]['direccion']))echo $this->datos[0]['direccion']?>"/>
                    <br><div class="k-invalid-msg msgerror" data-for="direccion"></div>
                </td>
            </tr>
            <tr valign="top">
                <td><label>Fecha de Nacimiento:</label></td>
                <td>
                    <input class="datepicker" readonly="readonly" placeholder="Seleccione fecha" name="fecha_nacimiento"
                       id="" value="<?php if(isset ($this->datos[0]['fecha_nacimiento'])){
                           $fecha=$this->datos[0]['fecha_nacimiento'];
                           echo substr($fecha,8,2).'-'.substr($fecha,5,2).'-'.substr($fecha,0,4);}?>"/>
                </td>
                <td><label>Telefono:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese nro.telefonico" name="telefono" onKeyPress="return numeroTelefonico(event);"
                       id="" value="<?php if(isset ($this->datos[0]['telefono']))echo $this->datos[0]['telefono']?>"/>
                </td>
                <td><label>Email:</label></td>
                <td>
                    <input type="email" class="k-textbox" placeholder="Ingrese email" name="email"
                       id="" value="<?php if(isset ($this->datos[0]['email']))echo $this->datos[0]['email']?>"/>
                </td>
            </tr>
            <tr valign="top">
                <td><label>Profesion:</label></td>
                <td>
                   <select class="combo" placeholder="Seleccione..." name="profesion">
                        <option value="67"></option>
                        <?php for($i=0;$i<count($this->datos_profesiones);$i++){ ?>
                            <?php if( $this->datos[0]['idprofesion'] == $this->datos_profesiones[$i]['idprofesion'] ){ ?>
                        <option value="<?php echo $this->datos_profesiones[$i]['idprofesion'] ?>" selected="selected"><?php echo utf8_encode($this->datos_profesiones[$i]['descripcion']) ?></option>
                            <?php } else { ?>
                        <option value="<?php echo $this->datos_profesiones[$i]['idprofesion'] ?>"><?php echo utf8_encode($this->datos_profesiones[$i]['descripcion']) ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </td>
                <td><label>Estado Civil:</label></td>
                <td>
                    <select class="combo" placeholder="Seleccione..." name="estado_civil">
                        <option></option>
                        <?php if($this->datos[0]['estado_civil']=='soltero'){?>
                        <option value="soltero" selected="selected">Soltero(a)</option>
                        <?php }else{ ?>
                        <option value="soltero">Soltero(a)</option>
                        <?php } ?>
                        <?php if($this->datos[0]['estado_civil']=='casado'){?>
                        <option value="casado" selected="selected">Casado(a)</option>
                        <?php }else{ ?>
                        <option value="casado">Casado(a)</option>
                        <?php } ?>
                        <?php if($this->datos[0]['estado_civil']=='viudo'){?>
                        <option value="viudo" selected="selected">Viudo(a)</option>
                        <?php }else{ ?>
                        <option value="viudo">Viudo(a)</option>
                        <?php } ?>
                        <?php if($this->datos[0]['estado_civil']=='divorciado'){?>
                        <option value="divorciado" selected="selected">Divorciado(a)</option>
                        <?php }else{ ?>
                        <option value="divorciado">Divorciado(a)</option>
                        <?php } ?>
                    </select>
                </td>
                <td><label>Doc. de Identidad:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese nro.de documento" required name="documento" onKeyPress="return soloNumeros(event);"
                       id="" value="<?php if(isset ($this->datos[0]['documento']))echo $this->datos[0]['documento']?>"/>
                    <br><div class="k-invalid-msg msgerror" data-for="documento"></div>
                </td>
            </tr>
            <tr class="celda_pais" valign="top">
                <td><label>Pais:</label></td>
                <td>
                    <select placeholder="Seleccione..." class="combo" id="paises">
                        <option></option>
                        <?php if(isset ($this->datos)){ ?>
                            <?php for($i=0;$i<count($this->datos_paises);$i++){ ?>
                                <?php if( $this->datos[0]['idpais'] == $this->datos_paises[$i]['idpais'] ){ ?>
                            <option value="<?php echo $this->datos_paises[$i]['idpais'] ?>" selected="selected"><?php echo $this->datos_paises[$i]['descripcion'] ?></option>
                                <?php } else { ?>
                            <option value="<?php echo $this->datos_paises[$i]['idpais'] ?>"><?php echo $this->datos_paises[$i]['descripcion'] ?></option>
                                <?php } ?>
                            <?php } ?>
                        <?php }else{ ?>
                            <?php for($i=0;$i<count($this->datos_paises);$i++){ ?>
                                <option value="<?php echo $this->datos_paises[$i]['idpais'] ?>"><?php echo $this->datos_paises[$i]['descripcion'] ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
               </td>
            <?php if($this->datos[0]['idpais']==193){?>
            <script>
                $(document).ready(function(){
                    $(".celda_region").show();
                });
            </script>
            <?php } ?>
                <td class="celda_region"><label>Region:</label></td>
                <td class="celda_region">
                    <select placeholder="Seleccione..." class="regiones comboX">
                        <option>Seleccione...</option>
                        <?php if(isset ($this->datos)){ ?>
                            <?php for($i=0;$i<count($this->datos_regiones);$i++){ ?>
                                <?php if( $this->datos[0]['idregion'] == $this->datos_regiones[$i]['idubigeo'] ){ ?>
                            <option value="<?php echo $this->datos_regiones[$i]['idubigeo'] ?>" selected="selected"><?php echo $this->datos_regiones[$i]['descripcion'] ?></option>
                                <?php } else { ?>
                            <option value="<?php echo $this->datos_regiones[$i]['idubigeo'] ?>"><?php echo $this->datos_regiones[$i]['descripcion'] ?></option>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </select>
               </td>
            <?php if($this->datos[0]['idregion']==1392){?>
            <script>
                $(document).ready(function(){
                    $(".celda_provincia").show();
                });
            </script>
            <?php } ?>
                <td class="celda_provincia"><label>Provincia:</label></td>
                <td class="celda_provincia">
                    <select placeholder="Seleccione..." class="provincias">
                        <option>Seleccione...</option>
                        <?php if(isset ($this->datos)){ ?>
                            <?php for($i=0;$i<count($this->datos_provincias);$i++){ ?>
                                <?php if( $this->datos[0]['idprovincia'] == $this->datos_provincias[$i]['idubigeo'] ){ ?>
                            <option value="<?php echo $this->datos_provincias[$i]['idubigeo'] ?>" selected="selected"><?php echo $this->datos_provincias[$i]['descripcion'] ?></option>
                                <?php } else { ?>
                            <option value="<?php echo $this->datos_provincias[$i]['idubigeo'] ?>"><?php echo $this->datos_provincias[$i]['descripcion'] ?></option>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr class="celda_ciudad">
                <td><label>Ciudad:</label></td>
                <td>
                    <select placeholder="Seleccione..." name="ubigeo" class="ciudades">
                        <?php if(count($this->datos_ubigeos)){ ?>
                            <?php for($i=0;$i<count($this->datos_ubigeos);$i++){ ?>
                                <?php if( $this->datos[0]['idubigeo'] == $this->datos_ubigeos[$i]['idubigeo'] ){ ?>
                            <option value="<?php echo $this->datos_ubigeos[$i]['idubigeo'] ?>" selected="selected"><?php echo $this->datos_ubigeos[$i]['descripcion'] ?></option>
                                <?php } else { ?>
                            <option value="<?php echo $this->datos_ubigeos[$i]['idubigeo'] ?>"><?php echo $this->datos_ubigeos[$i]['descripcion'] ?></option>
                                <?php } ?>
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
                            <?php if( $this->datos[0]['idmembresia'] == $this->datos_membresias[$i]['idmembresia'] ){ ?>
                        <option value="<?php echo $this->datos_membresias[$i]['idmembresia'] ?>" selected="selected"><?php echo utf8_encode($this->datos_membresias[$i]['descripcion']) ?></option>
                            <?php } else { ?>
                        <option value="<?php echo $this->datos_membresias[$i]['idmembresia'] ?>"><?php echo utf8_encode($this->datos_membresias[$i]['descripcion']) ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </td>
                <td><label>Sexo:</label></td>
                <td>
                    <?php if (isset ($this->datos[0]['sexo']) && $this->datos[0]['sexo']==0) {?>
                    <input type="radio" name="sexo" value ="1" />M
                    <input type="radio" name="sexo" value="0" checked="checked"/>F
                    <?php } else { ?>
                    <input type="radio" name="sexo" value ="1" checked="checked"/>M
                    <input type="radio" name="sexo" value="0" />F
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td colspan="6" align="center">
                    <p>
                        <button type="submit" class="k-button">Guardar</button>
                        <a href="<?php echo BASE_URL ?>pasajeros" class="k-button cancel">Cancelar</a>
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
               value="<?php if(isset ($this->datos[0]['idcliente']))echo $this->datos[0]['idcliente']?>"/>
        <div id="tabla">
        <table align="center" class="tabForm">
            </tr>
            <tr>
                <td><label>Razon Social:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese nombre" required name="nombres"
                       id="" value="<?php if(isset ($this->datos[0]['nombres']))echo $this->datos[0]['nombres']?>"/>
                </td>
                <td>
                    <div class="k-invalid-msg msgerror" data-for="nombres"></div>
                </td>
            </tr>
            <tr>
                <td><label>Ruc:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese ruc" required name="documento" onKeyPress="return soloNumeros(event);"
                       id="" value="<?php if(isset ($this->datos[0]['documento']))echo $this->datos[0]['documento']?>"/>
                </td>
                <td>
                    <div class="k-invalid-msg msgerror" data-for="documento"></div>
                </td>
            </tr>
            <tr>
                <td><label>Direccion:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese direccion" required name="direccion"
                       id="" value="<?php if(isset ($this->datos[0]['direccion']))echo $this->datos[0]['direccion']?>"/>
                </td>
                <td>
                    <div class="k-invalid-msg msgerror" data-for="direccion"></div>
                </td>
            </tr>
            <tr>
                <td><label>Telefono:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese nro.telefonico" name="telefono" onKeyPress="return numeroTelefonico(event);"
                       id="" value="<?php if(isset ($this->datos[0]['telefono']))echo $this->datos[0]['telefono']?>"/>
                </td>
            </tr>
            <tr>
                <td><label>Email:</label></td>
                <td>
                    <input type="email" class="k-textbox" placeholder="Ingrese email" name="email"
                       id="" value="<?php if(isset ($this->datos[0]['email']))echo $this->datos[0]['email']?>"/>
                </td>
            </tr>
            <tr class="celda_pais">
                <td><label>Pais:</label></td>
                <td>
                    <select placeholder="Seleccione..." class="combo" id="pais">
                        <option></option>
                        <?php if(isset ($this->datos)){ ?>
                            <?php for($i=0;$i<count($this->datos_paises);$i++){ ?>
                                <?php if( $this->datos[0]['idpais'] == $this->datos_paises[$i]['idpais'] ){ ?>
                            <option value="<?php echo $this->datos_paises[$i]['idpais'] ?>" selected="selected"><?php echo $this->datos_paises[$i]['descripcion'] ?></option>
                                <?php } else { ?>
                            <option value="<?php echo $this->datos_paises[$i]['idpais'] ?>"><?php echo $this->datos_paises[$i]['descripcion'] ?></option>
                                <?php } ?>
                            <?php } ?>
                        <?php }else{ ?>
                            <?php for($i=0;$i<count($this->datos_paises);$i++){ ?>
                                <option value="<?php echo $this->datos_paises[$i]['idpais'] ?>"><?php echo $this->datos_paises[$i]['descripcion'] ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
               </td>
            </tr>
            <tr class="celda_region">
                <td><label>Region:</label></td>
                <td>
                    <select placeholder="Seleccione..." class="regiones">
                        <option>Seleccione...</option>
                        <?php if(isset ($this->datos)){ ?>
                            <?php for($i=0;$i<count($this->datos_regiones);$i++){ ?>
                                <?php if( $this->datos[0]['idregion'] == $this->datos_regiones[$i]['idubigeo'] ){ ?>
                            <option value="<?php echo $this->datos_regiones[$i]['idubigeo'] ?>" selected="selected"><?php echo $this->datos_regiones[$i]['descripcion'] ?></option>
                                <?php } else { ?>
                            <option value="<?php echo $this->datos_regiones[$i]['idubigeo'] ?>"><?php echo $this->datos_regiones[$i]['descripcion'] ?></option>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </select>
               </td>
            </tr>
            <tr class="celda_provincia">
                <td><label>Provincia:</label></td>
                <td>
                    <select placeholder="Seleccione..." class="provincias">
                        <option>Seleccione...</option>
                        <?php if(isset ($this->datos)){ ?>
                            <?php for($i=0;$i<count($this->datos_provincias);$i++){ ?>
                                <?php if( $this->datos[0]['idprovincia'] == $this->datos_provincias[$i]['idubigeo'] ){ ?>
                            <option value="<?php echo $this->datos_provincias[$i]['idubigeo'] ?>" selected="selected"><?php echo $this->datos_provincias[$i]['descripcion'] ?></option>
                                <?php } else { ?>
                            <option value="<?php echo $this->datos_provincias[$i]['idubigeo'] ?>"><?php echo $this->datos_provincias[$i]['descripcion'] ?></option>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr class="celda_ciudad">
                <td><label>Ciudad:</label></td>
                <td>
                    <select placeholder="Seleccione..." name="ubigeo" class="ciudades">
                        <option value="0">Seleccione...</option>
                        <?php if(count($this->datos_ubigeos)){ ?>
                            <?php for($i=0;$i<count($this->datos_ubigeos);$i++){ ?>
                                <?php if( $this->datos[0]['idubigeo'] == $this->datos_ubigeos[$i]['idubigeo'] ){ ?>
                            <option value="<?php echo $this->datos_ubigeos[$i]['idubigeo'] ?>" selected="selected"><?php echo $this->datos_ubigeos[$i]['descripcion'] ?></option>
                                <?php } else { ?>
                            <option value="<?php echo $this->datos_ubigeos[$i]['idubigeo'] ?>"><?php echo $this->datos_ubigeos[$i]['descripcion'] ?></option>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="3" align="center">
                    <p>
                        <button type="submit" class="k-button">Guardar</button>
                        <a href="<?php echo BASE_URL ?>pasajeros" class="k-button cancel">Cancelar</a>
                    </p>
                </td>
            </tr>
        </table>
        </div>
    </form>
</div>