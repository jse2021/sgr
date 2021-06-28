$(function() {
    $(".datepicker").datepicker({
        dateFormat: "yy-mm-dd",
        dayNamesMin: ["Dom", "Lun", "Mar", "Mier", "Jue", "Vie", "Sab"],
        monthNamesShort: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        changeMonth: true,
        changeYear: true,
    });

});