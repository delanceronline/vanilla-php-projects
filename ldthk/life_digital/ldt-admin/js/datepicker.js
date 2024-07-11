$(function() {
    var pickerOpts = {
       //showOn: "button",
       dateFormat: "yy-mm-dd",
       numberOfMonths: 1,
       buttonImage: "images/cal.png",
       changeYear: true
    };
    $(".date").datepicker(pickerOpts);  
    $(".date").click(function(){
        $(this).datepicker('show');
    });
});


