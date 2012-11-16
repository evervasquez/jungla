// JavaScript Document

$(document).ready(function(){
    $("#menu").kendoMenu();
    var validator = $("#frm").kendoValidator();
//    $("#saveform").click(function() {
//        if (validator.validate()) {
//            $("#frm").submit();
//        }
//        else{
//            $('input.k-input.k-invalid:first').focus();
//        }
//    });
    $(".datepicker").kendoDatePicker({
        format: "dd-MM-yyyy"
    });
    $(".combo").kendoComboBox();
    //        $("#regiones").kendoComboBox();
    $("#panelbar").kendoPanelBar({
        expandMode: "single"
    });
    $(".imgedit").attr("title","Editar");
    $(".imgdelete").attr("title","Eliminar");
    $(".imgselect").attr("title","Seleccionar");
    $(".imgview").attr("title","Ver");
    $(".search").attr("title","Buscar");
    $(".plus").attr("title","Nuevo");
    $(".list").kendoDropDownList();
    $(".cantidad").kendoNumericTextBox({
        decimals:0
    });
    $(".precio").kendoNumericTextBox({
        format: "c" 
    });
    $(".descuento").kendoNumericTextBox({
        format: "p0",
        min: 0,
        max: 1,
        step: 0.01
    });
    $("#btn_asignar_tipo_habitacion").click(function(){
        var pwd = $(this).next().html();
        $("#ventana_tipo_habitacion").fadeIn(300);
        $("#fondoclaro").fadeIn(300);
    });
    $("#cancela_tmphabitacion").click(function(){
        $("#ventana_tipo_habitacion").fadeOut(300);
        $("#fondoclaro").fadeOut(300);
    });
});

