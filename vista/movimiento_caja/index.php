<?php if (isset($this->datos) && count($this->datos)) { ?>
<p><h3>Movimiento Caja</h3></p>
    
    <select class="combo" placeholder="Seleccione..." required name="concepto_movimiento">
                    <option></option>
                    <?php for($i=0;$i<count($this->datos);$i++){ ?>  
                    <option value="<?php echo $this->datos[$i]['idconcepto_movimiento'] ?>"><?php echo $this->datos[$i]['descripcion'] ?></option>
                    <?php } ?>
                </select>
                
 <select class="combo" placeholder="Seleccione..." required name="venta">
                    <option></option>
                    <?php for($i=0;$i<count($this->datos_venta);$i++){ ?>  
                    <option value="<?php echo $this->datos_venta[$i]['idventa'] ?>"><?php echo $this->datos_venta[$i]['importe'] ?></option>
                    <?php } ?>
                </select>
<td colspan="2" align="center">
                <p><button type="submit" class="k-button" id="saveform">Guardar</button>
                <a class="k-button cancel">Cancelar</a></p>
            </td>
    <?php } else { ?>
        <p>No hay Concepto movimiento</p>
        <a href="<?php echo BASE_URL?>modulos/nuevo" class="k-button">Nuevo</a>
    <?php } ?>