<script type="text/javascript">
    $(function(){
        $("#buscar").focus();
        function buscar(){
            $.post('/sisjungla/modulos/buscador','cadena='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
                HTML = '<table border="1" class="tabgrilla">'+
                        '<tr>'+
                            '<th>Codigo</th>'+
                            '<th>Descripcion</th>'+
                            '<th>Url</th>'+ 
                            '<th>Modulo Padre</th>'+
                            '<th>Acciones</th>'+
                        '</tr>';

                for(var i=0;i<datos.length;i++){
                    HTML = HTML + '<tr>';
                    HTML = HTML + '<td>'+datos[i].idmodulo+'</td>';
                    HTML = HTML + '<td>'+datos[i].descripcion+'</td>';
                    HTML = HTML + '<td>'+datos[i].url+'</td>';
                    if(datos[i].modulo_padre != null){
                        HTML = HTML + '<td>'+datos[i].modulo_padre+'</td>';
                    }else{
                        HTML = HTML + '<td>&nbsp;</td>';
                    }
                    var editar='/sisjungla/modulos/editar/'+datos[i].idmodulo; 
                    var eliminar='/sisjungla/modulos/eliminar/'+datos[i].idmodulo;   
                    HTML = HTML + '<td> <a href="#" onclick="editar(\''+editar+'\')"><img src="/sisjungla/lib/img/edit.png" class="imgfrm" /></a>';
                    HTML = HTML + '<a href="#" onclick="eliminar(\''+eliminar+'\')"><img src="/sisjungla/lib/img/delete.png" class="imgfrm" /></a>';
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
        }
        $("#buscar").keypress(function(event){
           if(event.which == 13){
               buscar();
           } 
        });
        
        $("#btn_buscar").click(function(){
            buscar();
            $("#buscar").focus();
        });
        
        
    });
</script>
<?php if (isset($this->datos) && count($this->datos)) { ?>
<p><h3>Lista de Modulos</h3></p>
    <p>
        <select class="combo" id="filtro">
            <option value="0">Descripcion</option>
            <option value="1">Modulo Padre</option>
        </select>
        <input type="text" class="k-textbox" id="buscar">
        <button type="button" class="k-button" id="btn_buscar"><span class="k-icon k-i-search"></span></button>
        <a href="<?php echo BASE_URL?>modulos/nuevo" class="k-button">Nuevo</a>
    </p>
    <div id="grilla">
    <table border="1" class="tabgrilla">
        <tr>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Url</th>
            <th>Modulo Padre</th>
            <th>Acciones</th>
        </tr>

        <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['idmodulo'] ?></td>
                <td><?php echo $this->datos[$i]['descripcion'] ?></td>
                <td><?php echo $this->datos[$i]['url'] ?></td>
                <td><?php echo $this->datos[$i]['modulo_padre'] ?></td>
                <td align="center">
                <a href="#" onclick="editar('<?php echo BASE_URL?>modulos/editar/<?php echo $this->datos[$i]['idmodulo'] ?>')">
                <img src="<?php echo BASE_URL?>lib/img/edit.png" class="imgfrm" /></a>
                <a href="#" onclick="eliminar('<?php echo BASE_URL?>modulos/eliminar/<?php echo $this->datos[$i]['idmodulo'] ?>')">
                <img src="<?php echo BASE_URL?>lib/img/delete.png" class="imgfrm" /></a></td>
            </tr>
        <?php } ?>

    <?php } else { ?>
        <tr>
            <td><p>No hay modulos</p></td>
            <a href="<?php echo BASE_URL?>modulos/nuevo" class="k-button">Nuevo</a>
        </tr>
    <?php } ?>
</table>
</div>