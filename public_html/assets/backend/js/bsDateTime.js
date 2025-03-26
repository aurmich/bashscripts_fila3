$(function() {
//$( document ).ready(function() {
$.getScript(base_url+'/bc/moment/min/moment.min.js', function() {    
$.getScript(base_url+'/bc/bootstrap-daterangepicker/daterangepicker.js', function() {
	//var $j = jQuery.noConflict();
    $('.datetime').daterangepicker({ 
        timePicker: true,
        singleDatePicker: true,
        timePicker24Hour: true,
        //locale: 'it',
        //timePickerIncrement: 30,
        showDropdowns: true,
        locale: {
            //format: 'YYYY-MM-DD h:mm A'   ///bisogna usare tipo di campo date
            format: 'DD/MM/YYYY h:mm A'
        //    format: 'YYYY-MM-DD h:mm A'
        }
         //   format: 'DD/MM/YYYY'
        
    });
});
});
});

