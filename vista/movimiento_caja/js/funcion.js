    $(function(){
        var obj= new estilos_vistas();
        obj.kendo_grilla();
        $( "#buscar" ).focus();
        function buscar(){
            $.post('/jungla/movimiento_caja/buscador','descripcion='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
                HTML = '<table border="1" class="tabgrilla">'+
                        '<tr>'+
                            '<th>Codigo</th>'+
                            '<th>Concepto Movimiento</th>'+
                            '<th>Monto</th>'+
                        '</tr>';

                for(var i=0;i<datos.length;i++){
                    HTML = HTML + '<tr>';
                    HTML = HTML + '<td>'+datos[i].IDMOVIMIENTO_CAJA+'</td>';
                    HTML = HTML + '<td>'+datos[i].CONCEPTO+'</td>';
                    HTML = HTML + '<td>'+datos[i].MONTO+'</td>';
                    HTML = HTML + '</tr>';
                }
                HTML = HTML + '</table>'
                $("#grilla").html(HTML);
                var obj= new estilos_vistas();
                obj.kendo_grilla();
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


