/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function validarContacto(){
    n = $("#nombreContacto").val();
    e = $("#emailContacto").val();
    t = $("#telefonoContacto").val();
    m = $("#mensaje").val();
    if(n == ""){
        alert("Debe ingresar nombre");
        return false;
    }
    else{
        if(e == ""){
            alert("Debe ingresar email");
            return false;
        }
        else{
            if(t == ""){
                alert("Debe ingresar etelefono");
                return false;
            }
            else{
                if(m == ""){
                    alert("Debe ingresar mensaje");
                    return false;
                }
                else return true;
            }
        }
    }
}
