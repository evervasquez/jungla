    $(function(){
        $(".tabgrilla").kendoGrid({
            dataSource: {
                pageSize: 16
            },
            pageable: true,
            columns: [
                {field:"FechaOperacion", width:9},
                {field:"Glosa", width:14},
                {field:"CodigoLibro", width:7},
                {field:"NroCorrelativo", width:6},
                {field:"NroDelDocumento", width:8},
                {field:"NroCuenta", width:6},
                {field:"Denominacion", width:21},
                {field:"Debe", width:5},
                {field:"Haber", width:5}]
        });
    });