// JavaScript Document
$(document).ready(function() {

//focus/blur default values
	$('input[type=text]').each(function() { 
	$(this).focus(function() {
	  if($(this).val() == this.defaultValue)
		$(this).val("");
	  });
	  $(this).blur(function() {
		if($(this).val() == "")
		  $(this).val(this.defaultValue);
	  });
	});

	
});//end document ready
