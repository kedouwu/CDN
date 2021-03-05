<?php
/*
Name: 移动主题
URI: https://blog.wpjam.com/m/mobile-theme/
Description: 给当前站点设置移动设备设置上使用单独的主题。
Version: 1.0
*/
add_action('plugins_loaded', function(){
	if(wp_is_mobile()){
		if(wpjam_basic_get_setting('mobile_stylesheet')){
			add_filter('stylesheet', function($stylesheet){
				return wpjam_basic_get_setting('mobile_stylesheet');
			});

			add_filter('template', function($template){
				$mobile_stylesheet	= wpjam_basic_get_setting('mobile_template');
				$mobile_theme		= wp_get_theme($mobile_stylesheet);

				return $mobile_theme->get_template();
			});
		}
	}
}, 0);

if(is_admin()){
	wpjam_add_menu_page('mobile-theme', ['menu_title'=>'移动主题',	'parent'=>'themes',	'function'=>'option',	'option_name'=>'wpjam-basic', 'load_callback'=>'wpjam_mobile_theme_option_page',]);

	function wpjam_mobile_theme_option_page($plugin_page){
		$current_theme	= wp_get_theme();
		$theme_options	= [];
		
		$theme_options[$current_theme->get_stylesheet()]	= $current_theme->get('Name');

		foreach(wp_get_themes() as $theme){
			$theme_options[$theme->get_stylesheet()]	= $theme->get('Name');
		}

		wpjam_register_option('wpjam-basic', [
			'fields'	=> ['mobile_stylesheet'=>['title'=>'选择移动主题',	'type'=>'select',	'options'=>$theme_options]],
			'summary'	=> '使用手机和平板访问网站的用户将看到以下选择的主题界面，而桌面用户依然看到 <strong>'.$current_theme->get('Name').'</strong> 主题界面。'
		]);
	}
}

