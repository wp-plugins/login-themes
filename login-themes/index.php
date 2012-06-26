<?php
/*
Plugin Name: theme login
Plugin URI: http://panateam.ir/plugins/
Description: this plugin let you chose a theme for your login page
Version: 1.0
Author: panateam.ir
Author URI: http://panateam.ir/

*/
define('pana_theme_url', get_option('siteurl').'/wp-content/plugins/login-themes');
class pana_theme_login{
		public $options;
		
		public function __construct(){
			$this->options=get_option('pana_theme_options');
			$this->pana_theme_setting();
			global $pagenow;
/*			if($this->options['pana_theme_name']!='')
			{
				add_action("login_head",array('pana_theme_login','theme_selector'));
				//echo $this->options['pana_theme_name'];
			//register_activation_hook(__FILE__,$this->pana_theme_activate());
			//error_log("plugin is active");
			}*/
			//echo $pagenow;
			if ($pagenow =='options-general.php' && $_GET['page']=='login-themes/index.php')
			{ 
				//add_action('wp_print_scripts', array('pana_theme_login','pana_theme_scripts'));
				//echo 'asas';
				add_action('admin_print_styles', array('pana_theme_login','pana_theme_styles'));
	 		}
		}
		public function pana_theme_add_menu()
		{
			add_options_page('تنظیمات پوسته ورود','تنظیمات پوسته ورود','administrator',__FILE__,array('pana_theme_login','pana_theme_display_page'));	
		}
		public function pana_theme_display_page()
		{
			?>
            <div class="wrap">
            <?php screen_icon(); ?>
            <h2>تنظیمات پوسته صفحه ورود</h2>
            <form method="post" action="options.php">
			<?php 
				settings_fields('pana_theme_options');
				do_settings_sections(__FILE__);
			
			?>
            <p class="submit">
            <input type="submit" name="submit" class="button-primary" value="ذخیره تنظیمات"  />
            </p>
            </form>
            </div>
            
            <?php
				
		}
		public function pana_theme_setting()
		{
			register_setting('pana_theme_options','pana_theme_options');
			add_settings_section('pana_theme_main_section','تنظیمات پوسته صفحه ورود',array('pana_theme_login','pana_theme_main_section_cb'),__FILE__);
			add_settings_field('pana_theme_name','انتخاب پوسته',array('pana_theme_login','pana_them_name_func'),__FILE__,'pana_theme_main_section');
		}
		public function pana_theme_main_section_cb()
		{
			
		}
		//Display Inputs
		public function pana_them_name_func()
		{
			//echo "{$this->options['pana_theme_name']}";
			$options = get_option('pana_theme_options'); 
			
            $html='<ul class="clearfix listofitmes">';
            $html.='<li><div class="pana_theme_item"><img src="'.pana_theme_url.'/images/brown_theme.jpg"/>پوسته قهوه ای ::<input type="radio" name="pana_theme_options[pana_theme_name]" class="wide_text" value="brown_theme"'.checked('brown_theme',$options['pana_theme_name'],false).' ></div></li>';
            $html.='<li class="even"><div class="pana_theme_item"><img src="'.pana_theme_url.'/images/blue_theme.jpg"/>پوسته آبی ::<input type="radio" name="pana_theme_options[pana_theme_name]" class="wide_text" value="blue_theme" '.checked('blue_theme',$options['pana_theme_name'],false).'></div></li>';
            $html.='<li><div class="pana_theme_item"><img src="'.pana_theme_url.'/images/yellow_theme.jpg"/>پوسته زرد ::<input type="radio" name="pana_theme_options[pana_theme_name]" class="wide_text" value="yellow_theme" '.checked('yellow_theme',$options['pana_theme_name'],false).'></div></li>';
            $html.='<li class="even"><div class="pana_theme_item"><img src="'.pana_theme_url.'/images/orange_theme.jpg"/>پوسته نارنجی ::<input type="radio" name="pana_theme_options[pana_theme_name]" class="wide_text" value="orange_theme" '.checked('orange_theme',$options['pana_theme_name'],false).' ></div></li>';
            $html.='</ul>';
            echo $html;
			
            
		}
		public function get_theme_name()
		{
			$options = get_option('pana_theme_options');
			return $options['pana_theme_name'];
		}
		public function pana_theme_styles()
		{
			wp_enqueue_style('pana_theme_styles', pana_theme_url.'/styles/styles.css', null, '1.0');
		}

}




add_action('admin_menu','setup_pana_theme_menu');
function setup_pana_theme_menu()
{
	pana_theme_login::pana_theme_add_menu();
}
//new pana_theme_login();
add_action('admin_init','make_a_instance_of_pana_theme');
function make_a_instance_of_pana_theme()
{
	new pana_theme_login();
}
add_action("login_head",'pana_theme_selector');
function pana_theme_selector()
{
	$res=pana_theme_login::get_theme_name();
	if($res)
	{
		echo '<script type="text/javascript" src="'.pana_theme_url.'/js/jquery-1.7.2.min.js"></script>';
		echo '<script type="text/javascript" src="'.pana_theme_url.'/js/ie.js"/></script>';
		if($res=="orange_theme")
		{
			$stylesheet_uri = pana_theme_url."/themes/orange/style.css";
			$javascript_uri = pana_theme_url."/themes/orange/java.js";
			echo '<link rel="stylesheet" href="'.$stylesheet_uri.'" type="text/css" media="screen" />';
			echo '<script type="text/javascript" src="'.$javascript_uri.'"></script>';
		}else if($res=="blue_theme"){
			$stylesheet_uri = pana_theme_url."/themes/blue/style.css";
			$javascript_uri = pana_theme_url."/themes/blue/java.js";
			echo '<link rel="stylesheet" href="'.$stylesheet_uri.'" type="text/css" media="screen" />';
			echo '<script type="text/javascript" src="'.$javascript_uri.'"></script>';			
		}
	}
}
?>