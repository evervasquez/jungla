/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    $(function(){
        $(".tabgrilla").kendoGrid({
            dataSource: {
                pageSize: 7
            },
            pageable: true
        });
        $( "#buscar" ).focus();
        });
        