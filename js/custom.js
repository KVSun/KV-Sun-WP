  $(document).ready(function(){

	$(window).scroll(function() {
		if ($(this).scrollTop() > 1){
			$('.secondary').addClass("sticky");
		  }
		  else{
			$('.secondary').removeClass("sticky");
		  }
		});
 });

 function logoutConfirm(){
	var x = confirm("Are you sure you want to log out?");
	if(x == false)
		return false;
 }
