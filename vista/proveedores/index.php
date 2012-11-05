<script type="text/javascript">
    $(function(){
        $( "#buscar" ).focus();
        
        $( "#btn_buscar" ).click(function(){
            $.post('/sisjungla/proveedores/buscador','cadena='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
                HTML = '<table border="1" class="tabgrilla">'+
                        '<tr>'+
                            '<th>Codigo</th>'+
                            '<th>Razon Social</th>'+
                            '<th>Representante</th>'+
                            '<th>RUC</th>'+
                            '<th>Ubigeo</th>'+
                            '<th>Direccion</th>'+
                            '<th>Telefono</th>'+
                            '<th>Email</th>'+
                            '<th>Acciones</th>'+
                        '</tr>';

                for(var i=0;i<datos.length;i++){
                    HTML = HTML + '<tr>';
                    HTML = HTML + '<td>'+datos[i].idproveedor+'</td>';
                    HTML = HTML + '<td>'+datos[i].razon_social+'</td>';
                    HTML = HTML + '<td>'+datos[i].representante+'</td>';
                    HTML = HTML + '<td>'+datos[i].ruc+'</td>';
                    HTML = HTML + '<td>'+datos[i].ubigeo+'</td>';
                    HTML = HTML + '<td>'+datos[i].direccion+'</td>';
                    HTML = HTML + '<td>'+datos[i].telefono+'</td>';
                    HTML = HTML + '<td>'+datos[i].email+'</td>';
                    var editar='/sisjungla/proveedores/editar/'+datos[i].idproveedor; 
                    var eliminar='/sisjungla/proveedores/eliminar/'+datos[i].idproveedor;   
                    HTML = HTML + '<td> <a href="javascript:void(0)" onclick="editar(\''+editar+'\')"><img src="/sisjungla/lib/img/edit.png" class="imgfrm" /></a>';
                    HTML = HTML + '<a href="javascript:void(0)" onclick="eliminar(\''+eliminar+'\')"><img src="/sisjungla/lib/img/delete.png" class="imgfrm" /></a>';
                    HTML = HTML + '</td>';
                    HTML = HTML + '</tr>';
                }
                HTML = HTML + '</table>'
                $("#grilla").html(HTML);
                $(".tabgrilla").kendoGrid({
                    dataSource: {
                        pageSize: 5
                    },
                    pageable: true
                });
            },'json');
        });
        
    });
</script>
<?php if (isset($this->datos) && count($this->datos)) { ?>
<h3>Lista de Proveedores</h3>
    <p>
        <select class="combo" id="filtro">
            <option value="0">Razon Social</option>
            <option value="1">Representante</option>
            <option value="2">RUC</option>
            <option value="3">Ubigeo</option>
        </select>
        <input type="text" class="k-textbox" style="width: 50%" id="buscar">
        <button type="button" class="k-button" id="btn_buscar">Buscar</button>
        <a href="<?php echo BASE_URL?>proveedores/nuevo" class="k-button">Nuevo</a>
    </p>
    <div id="grilla">
    <table border="1" class="tabgrilla">
        <tr>
            <th>Codigo</th>
            <th>Razon Social</th>
            <th>Representante</th>
            <th>RUC</th>
            <th>Ubigeo</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
        <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['idproveedor'] ?></td>
                <td><?php echo utf8_encode($this->datos[$i]['razon_social']) ?></td>
                <td><?php echo $this->datos[$i]['representante'] ?></td>
                <td><?php echo $this->datos[$i]['ruc'] ?></td>
                <td><?php echo utf8_encode($this->datos[$i]['ubigeo']) ?></td>
                <td><?php echo $this->datos[$i]['direccion'] ?></td>
                <td><?php echo $this->datos[$i]['telefono'] ?></td>
                <td><?php echo $this->datos[$i]['email'] ?></td>
                <td><a href="javascript:void(0)" onclick="editar('<?php echo BASE_URL?>proveedores/editar/<?php echo $this->datos[$i]['idproveedor'] ?>')">
                <img src="<?php echo BASE_URL?>lib/img/edit.png" class="imgfrm" /></a>
                <a href="javascript:void(0)" onclick="eliminar('<?php echo BASE_URL?>proveedores/eliminar/<?php echo $this->datos[$i]['idproveedor'] ?>')">
                <img src="<?php echo BASE_URL?>lib/img/delete.png" class="imgfrm" /></a></td>
            </tr>
        <?php } ?>

<?php } else { ?>
    <tr>
        <td><p>No hay proveedores</p>
            <a href="<?php echo BASE_URL?>proveedores/nuevo" class="k-button">Nuevo</a></td>
        </tr>
    <?php } ?>
</table>
</div>