<?php if (isset($this->datos) && count($this->datos)){ ?>
<h3>Productos:</h3>
<form action="<?php echo BASE_URL?>entrada_productos/inserta" method="post" id="form">
<input type="hidden" value="<?php echo $this->id ?>" name="idcompra"/>
<table border="1" class="tabgrilla" id="tbl_empleado">
    <tr>
        <th>Producto</th>
        <th>Unidad Medida</th>
        <th>Cantidad</th>
        <th>Confirmar</th>
    </tr>
<?php for ($i = 0; $i < count($this->datos); $i++) { ?>
    <tr>
        <td>
            <input type="hidden" name="idproducto[]" value="<?php echo $this->datos[$i]['idproducto'] ?>" />
            <?php echo $this->datos[$i]['producto'] ?>
        </td>
        <td><?php echo $this->datos[$i]['um'] ?></td>
        <td>
            <input type="hidden" name="cantidad[]" value="<?php echo $this->datos[$i]['cantidad'] ?>" />
            <?php echo $this->datos[$i]['cantidad'] ?>
        </td>
        <td><input type="checkbox" /></td>
    </tr>
<?php } ?>
</table>
<p><button type="button" class="k-button" id="confirma_entrada" >Confirmar</button>
    <a href="/sisjungla/entrada_productos/entradas_pendientes/" class="k-button cancel" >Cancelar</a></p>
</form>

<?php } else{ ?>
    <p>No hay productos por confirmar</p>
    <a href="<?php echo BASE_URL?>entrada_productos/entradas_pendientes" class="k-button cancelar">Aceptar</a>
<?php } ?>  
