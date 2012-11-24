/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function validarContacto(){
    n = $("#nombreContacto").val();
    e = $("#emailContacto").val();
    t = $("#telefonoContacto").val();
    m = $("#mensaje").val();
    if(n == "" || e == "" || t == "" || m == "" ){
        $("#mensaje_validacion").html("<p>Debe llenar todos los campos</p>");
        return false;
    }
    else return true;
}
