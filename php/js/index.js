
$(document).ready(function(){
	$("#form-submit").submit(function(){
		if ($("#name-input").val() == "") {
			$("#name-box .error").fadeIn("fast");
			return false;
		}else{
			$("#name-box .error").fadeOut("fast");
		};
		if ($("#title-input").val().length < 5) {
			$("#title-box .error").fadeIn("fast");
			return false;
		}else{
			$("#title-box .error").fadeOut("fast");
		};
		if ($("#text-input").val() == "") {
			$(".text-error").fadeIn();
			return false;
		}else{
			$(".text-error").fadeOut();
		};
		
	})
})