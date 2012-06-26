jQuery('document').ready(function() {
	    if(jQuery('#user_login').val()==''){
			jQuery('#user_login').attr('value','لطفا نام کاربری خود را وارد کنید');
		}

		$('link#wp-admin-css').attr('href','');
		$('link#wp-admin-rtl-css').attr('href','');
		$('link#colors-fresh-css').attr('href','');
        jQuery('<div class=\"thelogin\"></div>').insertAfter('p.submit');
		jQuery('form p:first-child label').html('<input type="text" name="log" id="user_login" class="input" value="" size="20" tabindex="10">');
		jQuery('form p:nth-child(2) label').html('<input type="password" name="pwd" id="user_pass" class="input" size="20" tabindex="20">');
		jQuery('<div class=\"lostpassword\"></div>').insertAfter('div.thelogin');
		var lostpass=jQuery('p#nav a').attr('href');
		jQuery('p#nav').remove();
		jQuery('div.lostpassword').html(
		'<span class="arrow"></span>'+
		'<a href='+lostpass+' class="lostpassword"></a>'
		);
        jQuery('<span class=\"passwordicon\"></span>').insertAfter('#user_pass');		
		jQuery('<span class=\"loginicon\"></span>').insertAfter('#user_login');
		$('#user_login').parent().parent().addClass('username');
		$('#user_pass').parent().parent().addClass('password');
		var flag=0;
		jQuery('span.arrow').click(function(){
			if(flag==0){
				if(jQuery('#login_error').size()==1){	
						jQuery('div.lostpassword').animate({width:'225px',left:'-225px'},500,function(){
							jQuery('a.lostpassword').text('آیا رمز عبور خود را فراموش کرده اید؟');
							jQuery('span.arrow').addClass('rarrow');
							flag=1;
						});	
				}else{
						jQuery('div.lostpassword').animate({width:'225px',left:'-226px'},500,function(){
							jQuery('a.lostpassword').text('آیا رمز عبور خود را فراموش کرده اید؟');
							jQuery('span.arrow').addClass('rarrow');
							flag=1;
						});					
				}
			}
			if(flag==1)
			{
				jQuery('a.lostpassword').text('');
				if(jQuery('#login_error').size()==1){
					jQuery('div.lostpassword').animate({width:'50px',left:'-50px'},500,function(){
						jQuery('span.arrow').removeClass('rarrow');
						flag=0;
					});						
				}else{
					
					jQuery('div.lostpassword').animate({width:'50px',left:'-51px'},500,function(){
						jQuery('span.arrow').removeClass('rarrow');
						flag=0;
					});	
				}
			}
		});	

				
				
});
	