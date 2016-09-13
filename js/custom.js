  function arrDuplicates(arr) {
        return arr.filter((item, index) => {
            return arr.lastIndexOf(item) !== index
            && index === arr.indexOf(item);
        });
    }

	 
 $(document).ready(function(){
	 let els = Array.from(document.querySelectorAll('[id]'));
    let ids = els.map(el => `#${el.id}`);
    let dups = arrDuplicates(ids);

    console.info(dups);	
    
	
		
		console.log($('script[src]:not([async])').map(script => script.src));	
 });
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
