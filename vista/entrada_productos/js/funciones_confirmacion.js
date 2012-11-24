$(document).ready(function(){
        $(".tabgrilla").kendoGrid({
            dataSource: {
                pageSize: 7
            },
            pageable: true
        });
    $("#confirma_entrada").click(function(){
        tc=$('input:checkbox').length;
        cs=$('input:checkbox').filter(":checked").length;
        if(tc==cs){
            $("#form").submit();
//            $.post("/sisjungla/entrada_productos/inserta","idcompra="+$("#codigo").val(),function(datos){
//                alert("productos ingresados al almacen");
//                window.location = '/sisjungla/entrada_productos/entradas_pendientes';
//            },'json');
        }else{
            alert("Asegurese de confirmar la entrada de todos los productos de la compra.\n"+
                "de lo contrario cancele la entrada y comuniquelo al administrador");
        }
    });
});