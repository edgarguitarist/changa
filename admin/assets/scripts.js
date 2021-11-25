$(function() {
    // Side Bar Toggle
    $('.hide-sidebar').click(function() {
	  $('#sidebar').hide('fast', function() {
	  	$('#content').removeClass('span9');
	  	$('#content').addClass('span12');
	  	$('.hide-sidebar').hide();
	  	$('.show-sidebar').show();
	  });
	});

	$('.show-sidebar').click(function() {
		$('#content').removeClass('span12');
	   	$('#content').addClass('span9');
	   	$('.show-sidebar').hide();
	   	$('.hide-sidebar').show();
	  	$('#sidebar').show('fast');
	});
});

//const element = externalRef ? externalRef.current : fromRef.current;

function mostrar_select() {
	$("#sel-all").show();
	//$("#checkAll").css("display", "none");
}

function ocultar_select() {
	$("#sel-all").hide();
	//$("#checkAll").css("display", "block");
}