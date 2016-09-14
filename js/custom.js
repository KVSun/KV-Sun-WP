if ( !(('CSS' in window) && ('supports' in CSS) && CSS.supports('position', 'sticky'))) {
    $(document).ready(function(){
       $(window).scroll(function() {
           if ($(this).scrollTop() > 1){
               $('.secondary.sticky').addClass("stuck");
             }
             else{
               $('.secondary.sticky').removeClass("stuck");
             }
           });
    });
}

 function logoutConfirm(){
	var x = confirm("Are you sure you want to log out?");
	if(x == false)
		return false;
 }
