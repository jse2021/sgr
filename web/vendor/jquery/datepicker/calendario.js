$(document).ready(function() {
   
    ajaxCancha();
    levantoCalendario();
    levantoHorario();
});
// Fin DocumentReady

$(function ajaxCancha() {
    $("#nueva_reserva_cancha").click(function() {
        var Vcancha = {
            cancha: $("#nueva_reserva_cancha").val()
        }
    });
    var pasoUrl = "/buscoCancha";
    $.ajax({
        type: 'POST',
        url: pasoUrl,
        dataType: "json",
        data: {
            'test': Vcancha.cancha
        },
    
        success: function() {

        }        
    });
    $("#nueva_reserva").append($('<p>' + Vcancha.cancha + '</p>'));
});
$(function levantoHorario() {
    $('.timepicker').timepicker({
        timeFormat: 'HH:mm',
        interval: 60,
        minTime: '9:00',
        maxTime: '23:00',
        dropdown: true,
        scrollbar: true,
    });
});
// Fin hora

$(function levantoCalendario() {
    var green = ["2021-07-29"];
    $(".datepicker").datepicker({
        dateFormat: "yy-mm-dd",
        dayNamesMin: ["Dom", "Lun", "Mar", "Mier", "Jue", "Vie", "Sab"],
        monthNamesShort: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        changeMonth: true,
        changeYear: true,
        maxDate: '+2Y',
        minDate: '-4d',

        beforeShowDay: function(date) {
            var dateISO = $.datepicker.formatDate('yy-mm-dd', date);
            //console.log(dateISO);

            // if (red.indexOf(dateISO) > -1) {
            //     return [true, "red"] // Enabled, class
            // }
            // if (yellow.indexOf(dateISO) > -1) {
            //     return [true, "yellow"]
            // }
            if (green.indexOf(dateISO) > -1) {
                return [true, "green"]
            }
            return [true] // If not found, must at least return the enabled boolean.
        }
    });
});
// Fin Calendario
// function pulsacion() {

//     // Fin ajax

// }