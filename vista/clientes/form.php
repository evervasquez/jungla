<script>
$(document).ready(function(){
    $("#pais").change(function(){
        if(!$(this).val()){
            $(".regiones").html('<option></option>');
        }else{
            $.post('/sisjungla/clientes/get_regiones','idpais='+$("#pais").val(),function(datos){
                $(".regiones").html('<option></option>');
                $(".provincias").html('<option></option>');
                $(".ciudades").html('<option></option>');
                for(var i=0;i<datos.length;i++){
                    $(".regiones").append('<option value="'+ datos[i].idubigeo + '">' + datos[i].descripcion+ '</option>');
                }
            },'json');
        }
    });
    
    $("#paises").change(function(){
        if(!$(this).val()){
            $(".regiones").html('<option></option>');
        }else{
            $.post('/sisjungla/clientes/get_regiones','idpais='+$("#paises").val(),function(datos){
                $(".regiones").html('<option></option>');
                $(".provincias").html('<option></option>');
                $(".ciudades").html('<option></option>');
                for(var i=0;i<datos.length;i++){
                    $(".regiones").append('<option value="'+ datos[i].idubigeo + '">' + datos[i].descripcion+ '</option>');
                }
            },'json');
        }
    });
    
    $(".regiones").change(function(){
        if(!$(this).val()){
            $(".provincias").html('<option></option>');
        }else{
            $.post('/sisjungla/clientes/get_provincias','idregion='+$(this).val(),function(datos){
                $(".provincias").html('<option></option>');
                $(".ciudades").html('<option></option>')
                for(var i=0;i<datos.length;i++){
                    $(".provincias").append('<option value="'+ datos[i].idubigeo + '">' + datos[i].descripcion+ '</option>');
                }
            },'json');
        }
    });
    
    $(".provincias").change(function(){
        if(!$(this).val()){
            $(".ciudades").html('<option></option>');
        }else{
            $.post('/sisjungla/clientes/get_ciudades','idprovincia='+$(this).val(),function(datos){
                $(".ciudades").html('<option></option>');
                for(var i=0;i<datos.length;i++){
                    $(".ciudades").append('<option value="'+ datos[i].idubigeo + '">' + datos[i].descripcion+ '</option>');
                }       
            },'json');
        }
    });
    $("#frm_cliente_juridico").hide();
    $("#tipo_cliente").change(function(){
        $(".regiones").html('<option></option>');
        $(".provincias").html('<option></option>');
        $(".ciudades").html('<option></option>');
        if($(this).val()=='natural'){
            $("#frm_cliente_natural").show();
            $("#frm_cliente_juridico").hide();
        }else{
            $("#frm_cliente_natural").hide();
            $("#frm_cliente_juridico").show();
        }
    });
    
}); 
        
</script>
<h3><?php echo $this->titulo ?></h3>
<?php if(isset($this->action)){?>
<table>
    <tr>
        <td><label>Tipo de Cliente:</label></td>
        <td>
            <select class="combo" placeholder="Seleccione..." id="tipo_cliente">
                <option value="natural" selected="selected">Natural</option>
                <option value="juridico">Juridico</option>
            </select>
        </td>
    </tr>
</table>
<?php }else{ ?>
<script>
$(document).ready(function(){
    $("#frm_cliente_natural").hide();
    $("#frm_cliente_juridico").show();
});
</script>
<?php } ?>
<div id="frm_cliente_natural">
    <form method="post" action="<?php if(isset ($this->action))echo $this->action ?>">
        <input type="hidden" name="guardar" id="guardar" value="1"/>
        <input type="hidden" name="tipo_cliente" value="natural"/>
        <table width="50%" align="center">
            <tr>
                <td><label>Codigo:</label></td>
                <td>
                    <input type="text" class="k-textbox" readonly="readonly" name="codigo" id="codigo"
                           value="<?php if(isset ($this->datos[0]['idcliente']))echo $this->datos[0]['idcliente']?>"/>
                </td>
            </tr>
            <tr>
                <td><label>Nombre:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese nombre" required name="nombres"
                       id="" value="<?php if(isset ($this->datos[0]['nombres']))echo $this->datos[0]['nombres']?>"/>
                </td>
            </tr>
            <tr>
                <td><label>Apellidos:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese apellidos" required name="apellidos"
                       id="" value="<?php if(isset ($this->datos[0]['apellidos']))echo $this->datos[0]['apellidos']?>"/>
                </td>
            </tr>
            <tr>
                <td><label>Nro.Documento:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese nro.de documento" required name="documento"
                       id="" value="<?php if(isset ($this->datos[0]['documento']))echo $this->datos[0]['documento']?>"/>
                </td>
            </tr>
            <tr>
                <td><label>Direccion:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese direccion" required name="direccion"
                       id="" value="<?php if(isset ($this->datos[0]['direccion']))echo $this->datos[0]['direccion']?>"/>
                </td>
            </tr>
            <tr>
                <td><label>Sexo:</label></td>
                <td>
                    <?php if (isset ($this->datos[0]['sexo']) && $this->datos[0]['sexo']==0) {?>
                    <input type="radio" name="sexo" value ="1" />M
                    <input type="radio" name="sexo" value="0" checked="checked"/>F
                    <?php } else { ?>
                    <input type="radio" name="sexo" value ="1" checked="checked"/>M
                    <input type="radio" name="sexo" value="0" />F
                    <?php } ?>
                <td>
            </tr>
            <tr>
                <td><label>Telefono:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese nro.telefonico" name="telefono"
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
            <tr>
                <td><label>Fecha de Nacimiento:</label></td>
                <td>
                    <input class="datepicker" readonly="readonly" placeholder="Seleccione fecha" name="fecha_nacimiento"
                       id="" value="<?php if(isset ($this->datos[0]['fecha_nacimiento'])){
                           $fecha=$this->datos[0]['fecha_nacimiento'];
                           echo substr($fecha,8,2).'-'.substr($fecha,5,2).'-'.substr($fecha,0,4);}?>"/>
                </td>
            </tr>
            <tr>
                <td><label>Profesion:</label></td>
                <td>
                   <select class="combo" placeholder="Seleccione..." name="profesion">
                        <option value="0"></option>
                        <?php for($i=0;$i<count($this->datos_profesiones);$i++){ ?>
                            <?php if( $this->datos[0]['idprofesion'] == $this->datos_profesiones[$i]['idprofesion'] ){ ?>
                        <option value="<?php echo $this->datos_profesiones[$i]['idprofesion'] ?>" selected="selected"><?php echo utf8_encode($this->datos_profesiones[$i]['descripcion']) ?></option>
                            <?php } else { ?>
                        <option value="<?php echo $this->datos_profesiones[$i]['idprofesion'] ?>"><?php echo utf8_encode($this->datos_profesiones[$i]['descripcion']) ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </td>
            </tr>        
            <tr>
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
            </tr>
            <tr>
                <td><label>Pais:</label></td>
                <td>
                    <select class="combo" placeholder="Seleccione..." id="paises">
                        <option></option>
                        <?php for($i=0;$i<count($this->datos_paises);$i++){ ?>
                            <?php if( $this->datos[0]['idpais'] == $this->datos_paises[$i]['idpais'] && $this->datos_paises[$i]['idpais']!=0 ){ ?>
                        <option value="<?php echo $this->datos_paises[$i]['idpais'] ?>" selected="selected"><?php echo $this->datos_paises[$i]['descripcion'] ?></option>
                            <?php } else { ?>
                        <option value="<?php echo $this->datos_paises[$i]['idpais'] ?>"><?php echo $this->datos_paises[$i]['descripcion'] ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </td>
            </tr>
             <tr>
                <td><label>Region:</label></td>
                <td>
                    <select placeholder="Seleccione..." class="regiones">
                        <option></option>
                        <?php if(count($this->datos_regiones)){ ?>
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
            <tr>
                <td><label>Provincia:</label></td>
                <td>
                    <select placeholder="Seleccione..." class="provincias">
                        <option></option>
                        <?php if(count($this->datos_provincias)){ ?>
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
            <tr>
                <td><label>Ciudad:</label></td>
                <td>
                    <select placeholder="Seleccione..." name="ubigeo" class="ciudades">
                        <option></option>
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
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <p>
                        <button type="submit" class="k-button">Guardar</button>
                        <a href="<?php echo BASE_URL ?>clientes" class="k-button">Cancelar</a>
                    </p>
                </td>
            </tr>
        </table>
    </form>
</div>


<div id="frm_cliente_juridico">
    <form method="post" action="<?php if(isset ($this->action))echo $this->action ?>">
        <input type="hidden" name="guardar" id="guardar" value="1"/>
        <input type="hidden" name="tipo_cliente" value="juridico"/>
        <table width="50%" align="center">
            <tr>
                <td><label>Codigo:</label></td>
                <td>
                    <input type="text" class="k-textbox" readonly="readonly" name="codigo" id="codigo"
                           value="<?php if(isset ($this->datos[0]['idcliente']))echo $this->datos[0]['idcliente']?>"/>
                </td>
            </tr>
            <tr>
                <td><label>Razon Social:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese nombre" required name="nombres"
                       id="" value="<?php if(isset ($this->datos[0]['nombres']))echo $this->datos[0]['nombres']?>"/>
                </td>
            </tr>
            <tr>
                <td><label>Ruc:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese ruc" required name="documento"
                       id="" value="<?php if(isset ($this->datos[0]['documento']))echo $this->datos[0]['documento']?>"/>
                </td>
            </tr>
            <tr>
                <td><label>Direccion:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese direccion" required name="direccion"
                       id="" value="<?php if(isset ($this->datos[0]['direccion']))echo $this->datos[0]['direccion']?>"/>
                </td>
            </tr>
            <tr>
                <td><label>Telefono:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese nro.telefonico" name="telefono"
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
            <tr>
                <td><label>Pais:</label></td>
                <td>
                    <select class="combo" placeholder="Seleccione..." id="pais">
                        <option></option>
                        <?php for($i=0;$i<count($this->datos_paises);$i++){ ?>
                            <?php if( $this->datos[0]['idpais'] == $this->datos_paises[$i]['idpais'] ){ ?>
                        <option value="<?php echo $this->datos_paises[$i]['idpais'] ?>" selected="selected"><?php echo $this->datos_paises[$i]['descripcion'] ?></option>
                            <?php } else { ?>
                        <option value="<?php echo $this->datos_paises[$i]['idpais'] ?>"><?php echo $this->datos_paises[$i]['descripcion'] ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </td>
            </tr>
             <tr>
                <td><label>Region:</label></td>
                <td>
                    <select placeholder="Seleccione..." class="regiones">
                        <option></option>
                        <?php if(count($this->datos_regiones)){ ?>
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
            <tr>
                <td><label>Provincia:</label></td>
                <td>
                    <select placeholder="Seleccione..." class="provincias">
                        <option></option>
                        <?php if(count($this->datos_provincias)){ ?>
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
            <tr>
                <td><label>Ciudad:</label></td>
                <td>
                    <select placeholder="Seleccione..." name="ubigeo" class="ciudades">
                        <option></option>
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
                <td colspan="2" align="center">
                    <p>
                        <button type="submit" class="k-button">Guardar</button>
                        <a href="<?php echo BASE_URL ?>clientes" class="k-button">Cancelar</a>
                    </p>
                </td>
            </tr>
        </table>
    </form>
</div>