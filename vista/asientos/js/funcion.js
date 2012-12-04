    $(function(){
        $(".tabgrilla").kendoGrid({
            dataSource: {
                pageSize: 6
            },
            pageable: true,
            columns: [{field:"NroOperacion", width:9},
                {field:"FechaOperacion", width:10},
                {field:"Glosa", width:12},
                {field:"CodigoLibro", width:8},
                {field:"NroCorrelativo", width:9},
                {field:"NroDelDocumento", width:12},
                {field:"NroCuenta", width:8},
                {field:"Denominacion", width:12},
                {field:"Debe", width:7},
                {field:"Haber", width:7}]
        });
    });