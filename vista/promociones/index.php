
	<h3>Lista de Promociones</h3>
   <!-- <table border="1">
        <tr>
            <td>Codigo</td>
            <td>Descripcion</td>
            <td>Descuento</td>
            <td>Fecha de Inicio</td>
            <td>Fecha de Finalizacion</td>
        </tr>
<<<<<<< HEAD
    </table>-->
    <a href="nuevo" class="k-button">Nuevo</a>
<div id="grid"></div>
<script>
                $(document).ready(function () {
                    var crudServiceBaseUrl = "http://demos.kendoui.com/service",
                        dataSource = new kendo.data.DataSource({
                            transport: {
                                read:  {
                                    url: crudServiceBaseUrl + "/Products"
                                },
                                update: {
                                    url: crudServiceBaseUrl + "/Products/Update"
                                },
                                destroy: {
                                    url: crudServiceBaseUrl + "/Products/Destroy"
                                },
                                create: {
                                    url: "nuevo",
                                    dataType: "jsonp"
                                },
                                parameterMap: function(options, operation) {
                                    if (operation !== "read" && options.models) {
                                        return {models: kendo.stringify(options.models)};
                                    }
                                }
                            },
                            batch: true,
                            pageSize: 8,
                            schema: {
                                model: {
                                    id: "idpromocion",
                                    fields: {
                                        idpromocion: { editable: false, nullable: true },
                                        descripcion: { validation: { required: true } },
                                        descuento: { type: "number", validation: { required: true, min: 1} },
                                        fecha_inicio: { type: "boolean" },
                                        fecha_final: { type: "number", validation: { min: 0, required: true } }
                                    }
                                }
                            }
                        });

                    $("#grid").kendoGrid({
                        dataSource: dataSource,
                        pageable: true,
                        height: 380,
                        columns: [
                            { field:"descripcion", title: "Promocion" },
                            { field: "descuento", title:"Descuento", format: "{0:c}", width: "130px" },
                            { field: "fecha_inicio", title:"Fecha de Inicio", width: "130px" },
                            { field: "fecha_final", title:"Fecha Final", width: "130px" },
                            { command: ["edit", "destroy"], title: "&nbsp;", width: "210px" }],
                        editable: "popup"
                    });
                });
            </script>
=======
    </table>
    <a href="index.php?controller=promociones&accion=nuevo" class="k-button">Nuevo</a>
>>>>>>> 61c847b4b166369e9e470e246d5123732e471027
