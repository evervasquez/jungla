    $(function(){
        $(".tabgrilla").kendoGrid({
            dataSource: {
                pageSize: 6
            },
            pageable: true,
            columns: [{field:"NroOperacion", width:8},
                {field:"FechaOperacion", width:9},
                {field:"Glosa", width:15},
                {field:"CodigoLibro", width:7},
                {field:"NroCorrelativo", width:8},
                {field:"NroDelDocumento", width:10},
                {field:"NroCuenta", width:7},
                {field:"Denominacion", width:15},
                {field:"Debe", width:6},
                {field:"Haber", width:6}]
        });
    });