jQuery('document').ready(function() {
	    if(jQuery('#user_login').val()==''){
			jQuery('#user_login').attr('value','لطفا نام کاربری خود را وارد کنید');
		}

		$('link#wp-admin-css').attr('href','');
		$('link#wp-admin-rtl-css').attr('href','');
		$('link#colors-fresh-css').attr('href','');
		//var submitholder= '<p class=\"submit\">'+$('p.submit').html()+'</p>';
		$('p.submit').wrap('<div class="btnholder clearfix" />');
		$('p.forgetmenot').remove();
		$('div.btnholder').append('<p class="forgetmenot"><label for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever" tabindex="90"> مرا به خاطر بسپار</label></p>');
        //jQuery('<div class=\"btnholder clearfix\"></div>').insertAfter('p.submit');
		//$('p.submit').remove();
		///$('p.forgetmenot').remove();
		//alert(forgetmenotholder);
		//$('div.btnholder').append(submitholder);	
		//$('div.btnholder').append(submitholder);
		
		jQuery('form p:first-child label').html('<input type="text" name="log" id="user_login" class="input" value="" size="20" tabindex="10">').parent().addClass('username');;
		jQuery('p.username').next().children('label').html('<input type="password" name="pwd" id="user_pass" class="input" size="20" tabindex="20">').parent().addClass('password');
		jQuery('<div class=\"logo\"></div>').insertAfter('div.btnholder');
		jQuery('<span class=\"loginicon\"></span>').insertAfter('#user_login');
		jQuery('<span class=\"passwordicon\"></span>').insertAfter('#user_pass');		
		jQuery('<div class=\"lostpassword\"></div>').insertAfter('#loginform');
		
		var lostpass=jQuery('p#nav a').attr('href');
		jQuery('p#nav').remove();
		jQuery('div.lostpassword').html('<a href='+lostpass+' class="lostpassword">آیا کلمه عبور خود را فراموش کرده اید ؟</a>');


				
				
});
	