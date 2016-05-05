
jQuery(document).ready(function() {
	
    /*
        Fullscreen background
    */
    $.backstretch("assets/img/backgrounds/1.jpg");
    
    /*
        Form validation
    */
    $('.login-form input[type="text"], .login-form input[type="password"], .login-form textarea').on('focus', function() {
    	$(this).removeClass('input-error');
    	//alert("SAdasdasdasdsadasdasdasd");
    });
    
    $('.login-form').on('submit', function(e) {
    	usename = $("#form-username").val();
    	passwrd = $("#form-password").val();
    	if(usename=="" && passwrd=="")
    	{
			e.preventDefault();
    		$("#form-username").addClass('input-error');
    		$("#form-password").addClass('input-error');
		}
		else if(usename=="")
		{
			e.preventDefault();
    		$("#form-username").addClass('input-error');	
    	}
    	else if(passwrd=="")
    	{
			e.preventDefault();
    		$("#form-password").addClass('input-error');	
		}
		else
		{
			$("#form-password").removeClass('input-error');
			$("#form-username").removeClass('input-error');
			ValidateLogin(usename, passwrd);
			return false;
		}
    	/*$(this).find('input[type="text"], input[type="password"], textarea').each(function(){
    		if( $(this).val() == "" ) {
    			e.preventDefault();
    			$(this).addClass('input-error');
    		}
    		else {
    			$(this).removeClass('input-error');
    			alert("Asdasdasd");
    		}
    	});*/
    	
    });
    
    
});
