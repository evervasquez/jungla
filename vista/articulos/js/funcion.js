    $(function(){
        $(".tabgrilla").kendoGrid({
            dataSource: {
                pageSize: 7
            },
            pageable: true,
            columns: [{field:"Codigo", width:8},
                {field:"Titulo", width:20},
                {field:"Descripion", width:60},
                {field:"Acciones", width:10,attributes:{class:"acciones"}}]
        });
        $( "#buscar" ).focus();
        
    });
