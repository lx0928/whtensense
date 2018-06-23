$(function(){
    //日历
    $("#time_begin").datepicker({
        defaultDate: "+1w",
        numberOfMonths: 1,
        showButtonPanel: true,
        onClose: function (selectedDate) {
            $("#time_end").datepicker("option", "minDate", selectedDate);
        }
    });
    $("#time_end").datepicker({
        defaultDate: "+1w",
        numberOfMonths: 1,
        showButtonPanel: true,
        onClose: function (selectedDate) {
            $("#time_begin").datepicker("option", "maxDate", selectedDate);
        }
    });
});