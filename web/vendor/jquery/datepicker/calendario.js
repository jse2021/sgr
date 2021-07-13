$(document).ready(function() {
    var green = ["2021-07-29"];

    $(function() {
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

});