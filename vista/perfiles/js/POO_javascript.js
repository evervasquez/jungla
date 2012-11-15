/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function estilos_vistas(){
    
    estilos_vistas.prototype.kendo_grilla =function (){
         $(document).ready(function(){
                    $(".tabgrilla").kendoGrid({
                        dataSource: {
                pageSize: 7
            },
            pageable: true,
            columns: [{field:"Codigo", width:8},
                {field:"Descripcion", width:80},
                {field:"Acciones", width:10,attributes:{class:"acciones"}}]
        });
            })
    }
    
    
}
var obj= new estilos_vistas();
obj.kendo_grilla();
