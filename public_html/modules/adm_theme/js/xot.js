//$(document).ready(function(){
jQuery(document).ready(function($){
    $('[data-toggle="tooltip"]').tooltip(); 
    $('table').addClass('table table-striped table-bordered table-hover table-condensed table-responsive');
    var current_title;
    $(window).blur(function() {
    	//var current_href = $(location).attr('href');
		current_title = $(document).attr('title');
    	$(document).attr("title", "Torna Qua !");
    });
    $(window).focus(function() {
    	$(document).attr("title", current_title);
    }); 
});   
