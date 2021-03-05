<?php
class WPJAM_Basic{
	use WPJAM_Setting_Trait;

	private $extends	= [];

	private function __construct(){
		$this->init('wpjam-basic');

		$this->extends	= wpjam_get_option('wpjam-extends');
		$this->extends	= $this->extends ? array_filter($this->extends) : [];

		if(is_multisite()){
			$sitewide_extendss	= get_site_option('wpjam-extends');
			$sitewide_extendss	= $sitewide_extendss ? array_filter($sitewide_extendss) : [];
			
			if($sitewide_extendss){
				$this->extends	= array_merge($this->extends, $sitewide_extendss);
			}
		}
	}

	public function get_setting($name){
		$value	= $this->settings[$name] ?? null;

		if($value){
			if($name == 'disable_rest_api'){
				return !empty($settings['disable_post_embed']) && !empty($settings['disable_block_editor']);
			}elseif($name == 'disable_xml_rpc'){
				return !empty($settings['disable_block_editor']);
			}
		}

		return $value;
	}

	public function get_extends(){
		return $this->extends;
	}

	public function has_extend($extend){
		$extend	= rtrim($extend, '.php').'.php';

		return isset($this->extends[$extend]);
	}

	public function load_extends(){
		if($this->extends){
			foreach (array_keys($this->extends) as $extend_file) {
				if(is_file(WPJAM_BASIC_PLUGIN_DIR.'extends/'.$extend_file)){
					include WPJAM_BASIC_PLUGIN_DIR.'extends/'.$extend_file;
				}
			}
		}
	}

	public static function load_template_extends(){
		$template_extend_dir	= get_template_directory().'/extends';

		if(is_dir($template_extend_dir)){
			if($extend_handle = opendir($template_extend_dir)) {   
				while (($extend = readdir($extend_handle)) !== false) {
					if ($extend == '.' || $extend == '..' || is_file($template_extend_dir.'/'.$extend)) {
						continue;
					}
					
					if(is_file($template_extend_dir.'/'.$extend.'/'.$extend.'.php')){
						include $template_extend_dir.'/'.$extend.'/'.$extend.'.php';
					}
				}   
				closedir($extend_handle);   
			}
		}
	}

	public static function get_default_settings(){
		return [
			'disable_revision'			=> 1,
			'disable_trackbacks'		=> 1,
			'disable_emoji'				=> 1,
			'disable_texturize'			=> 1,
			'disable_privacy'			=> 1,
			
			'remove_head_links'			=> 1,
			'remove_capital_P_dangit'	=> 1,

			'admin_footer'				=> '<span id="footer-thankyou">感谢使用<a href="https://cn.wordpress.org/" target="_blank">WordPress</a>进行创作。</span> | <a href="http://wpjam.com/" title="WordPress JAM" target="_blank">WordPress JAM</a>'
		];
	}
}

class WPJAM_Basic_Admin{
	private static $sub_pages	= [];

	public static function add_sub_page($sub_slug, $args=[]){
		self::$sub_pages[$sub_slug]	= $args;
	}

	public static function add_menu_pages(){
		$subs	= [];

		$subs['wpjam-basic']	= [
			'menu_title'	=> '优化设置',
			'function'		=> 'option',
			'page_file'		=> WPJAM_BASIC_PLUGIN_DIR.'admin/pages/wpjam-basic.php'
		];

		$verified	= WPJAM_Verify::verify();

		if(!$verified){
			$subs['wpjam-verify']	= [
				'menu_title'	=> '扩展管理',
				'page_title'	=> '验证 WPJAM',
				'function'		=> 'form',
				'form_name'		=> 'verify_wpjam',
				'load_callback'	=> ['WPJAM_Verify', 'page_action']
			];
		}else{
			$subs	+= self::$sub_pages;
			$subs	= apply_filters('wpjam_basic_sub_pages', $subs);

			$subs['server-status']	= [
				'menu_title'	=> '系统信息',
				'function'		=> 'tab',
				'capability'	=> is_multisite() ? 'manage_sites' : 'manage_options',
				'page_file'		=> WPJAM_BASIC_PLUGIN_DIR .'admin/pages/server-status.php',
				'summary'		=> '系统信息扩展让你在后台就能够快速实时查看当前的系统状态，详细介绍请点击：<a href="https://blog.wpjam.com/m/wpjam-basic-service-status/" target="_blank">系统信息扩展</a>。'
			];

			if(!is_multisite() || !is_network_admin()){
				$subs['dashicons']		= [
					'menu_title'	=> 'Dashicons',
					'function'		=> ['WPJAM_Basic_Admin', 'dashicons_page']
				];
			}

			$subs['wpjam-extends']	= [
				'menu_title'	=> '扩展管理',
				'function'		=> 'option',
				'load_callback'	=> ['WPJAM_Basic_Admin', 'load_extends_page']
			];

			if($verified !== 'verified'){
				$subs['wpjam-basic-topics']	= [
					'menu_title'	=> '讨论组',
					'function'		=> 'tab',
					'page_file'		=> WPJAM_BASIC_PLUGIN_DIR.'admin/pages/wpjam-topics.php',
				];
			}
		}

		if($verified !== 'verified'){
			$subs['wpjam-about']	= [
				'menu_title'	=> '关于WPJAM',
				'function'		=> ['WPJAM_Basic_Admin', 'about_page']
			];
		}

		$basic_menu	= [
			'menu_title'	=> 'WPJAM',
			'icon'			=> 'dashicons-performance',
			'position'		=> '58.99',
			'function'		=> 'option',
			'subs'			=> $subs
		];

		if(is_multisite() && is_network_admin()){
			$basic_menu['network']	= true;
		}

		wpjam_add_menu_page('wpjam-basic', $basic_menu);
	}

	public static function add_separator(){
		$GLOBALS['menu']['58.88']	= ['',	'read',	'separator'.'58.88', '', 'wp-menu-separator'];
	}

	public static function sanitize_callback($value){
		update_option('image_default_link_type', $value['image_default_link_type']);

		if(!empty($value['disable_auto_update'])){
			wp_clear_scheduled_hook('wp_version_check');
			wp_clear_scheduled_hook('wp_update_plugins');
			wp_clear_scheduled_hook('wp_update_themes');
			wp_clear_scheduled_hook('wp_maybe_auto_update');
		}

		flush_rewrite_rules();

		return $value;
	}

	public static function load_extends_page(){
		$fields		= [];
		$extend_dir = WPJAM_BASIC_PLUGIN_DIR.'extends';

		if(is_dir($extend_dir)) { 
			$wpjam_extends 	= wpjam_get_option('wpjam-extends');

			$file_headers	= [
				'Name'			=> 'Name',
				'URI'			=> 'URI',
				'Version'		=> 'Version',
				'Description'	=> 'Description'
			];

			if($wpjam_extends){	// 已激活的优先
				foreach ($wpjam_extends as $extend_file => $value) {
					if(!$value || !is_file($extend_dir.'/'.$extend_file)){
						continue;
					}

					$data	= get_file_data($extend_dir.'/'.$extend_file, $file_headers);

					if($data['Name']){
						$fields[$extend_file] = ['title'=>'<a href="'.$data['URI'].'" target="_blank">'.$data['Name'].'</a>', 'type'=>'checkbox', 'description'=>$data['Description']];
					}
				}
			}

			if($extend_handle = opendir($extend_dir)) {   
				while (($extend_file = readdir($extend_handle)) !== false) {
					if ($extend_file == '.' || $extend_file == '..' || !is_file($extend_dir.'/'.$extend_file) || !empty($wpjam_extends[$extend_file])){
						continue;
					}

					if(pathinfo($extend_file, PATHINFO_EXTENSION) != 'php') {
						continue;
					}

					$data	= get_file_data($extend_dir.'/'.$extend_file, $file_headers);

					if($data['Name']){
						$fields[$extend_file] = ['title'=>'<a href="'.$data['URI'].'" target="_blank">'.$data['Name'].'</a>', 'type'=>'checkbox', 'description'=>$data['Description']];
					}
				}   
				closedir($extend_handle);   
			}
		} 

		if(is_multisite() && !is_network_admin()){
			$sitewide_extends = get_site_option('wpjam-extends');

			unset($sitewide_extends['plugin_page']);

			if($sitewide_extends){
				foreach ($sitewide_extends as $extend_file => $value) {
					if($value){
						unset($fields[$extend_file]);
					}
				}
			}
		}

		$summary	= is_network_admin() ? '在管理网络激活将整个站点都会激活！' : '';

		wpjam_register_option('wpjam-extends', ['fields'=>$fields, 'summary'=>$summary, 'ajax'=>false]);
	}

	public static function dashicons_page(){
		?>
		<p>Dashicons 功能列出所有的 Dashicons 以及每个 Dashicon 的名称和 HTML 代码。<br />详细介绍请查看：<a href="https://blog.wpjam.com/m/wpjam-basic-dashicons/" target="_blank">Dashicons</a>，在 WordPress 后台<a href="https://blog.wpjam.com/m/using-dashicons-in-wordpress-admin/" target="_blank">如何使用 Dashicons</a>。</p>

		<?php
		$dashicon_css_file	= fopen(ABSPATH.'/'.WPINC.'/css/dashicons.css','r') or die("Unable to open file!");

		$i	= 0;

		$dashicons_html = '';

		while(!feof($dashicon_css_file)) {
			$line	= fgets($dashicon_css_file);
			$i++;
			
			if($i < 32) continue;

			if($line){
				if (preg_match_all('/.dashicons-(.*?):before/i', $line, $matches)) {
					$dashicons_html .= '<p data-dashicon="dashicons-'.$matches[1][0].'"><span class="dashicons-before dashicons-'.$matches[1][0].'"></span> <br />'.$matches[1][0].'</p>'."\n";
				}elseif(preg_match_all('/\/\* (.*?) \*\//i', $line, $matches)){
					if($dashicons_html){
						echo '<div class="wpjam-dashicons">'.$dashicons_html.'</div>'.'<div class="clear"></div>';
					}
					echo '<h2>'.$matches[1][0].'</h2>'."\n";
					$dashicons_html = '';
				}
			}
		}

		echo '<div class="wpjam-dashicons">'.$dashicons_html.'</div>'.'<div class="clear"></div>';

		fclose($dashicon_css_file);
		?>
		<style type="text/css">
		h2{max-width: 800px; margin:40px 0 20px 0; padding-bottom: 20px; clear: both; border-bottom: 1px solid #ccc;}
		div.wpjam-dashicons{max-width: 800px; float: left;}
		div.wpjam-dashicons p{float: left; margin:0px 10px 10px 0; padding: 10px; width:70px; height:70px; text-align: center; cursor: pointer;}
		div.wpjam-dashicons .dashicons-before:before{font-size:32px; width: 32px; height: 32px;}
		div#TB_ajaxContent p{font-size:20px; float: left;}
		div#TB_ajaxContent .dashicons{font-size:100px; width: 100px; height: 100px;}
		</style>
		<script type="text/javascript">
		jQuery(function($){
			$('body').on('click', 'div.wpjam-dashicons p', function(){
				var dashicon = $(this).data('dashicon');
				var dashicon_html = '&lt;span class="dashicons '+dashicon+'"&gt;&lt;/span&gt;';
				$('#tb_modal').html('<p><span class="dashicons '+dashicon+'"></span></p><p style="margin-left:20px;">'+dashicon+'<br /><br />HTML：<br /><code>'+dashicon_html+'</code></p>');
				tb_show(dashicon, '#TB_inline?inlineId=tb_modal&width=700&height=200');
				tb_position();
			});
		});
		</script>
		<?php
	}

	public static function get_jam_plugins(){
		$jam_plugins = get_transient('about_jam_plugins');

		if($jam_plugins === false){
			$response	= wpjam_remote_request('http://jam.wpweixin.com/api/template/get.json?id=5644');
			
			if(!is_wp_error($response)){
				$jam_plugins	= $response['template']['table']['content'];
				set_transient('about_jam_plugins', $jam_plugins, DAY_IN_SECONDS );
			}
		}

		return $jam_plugins;
	}

	public static function about_page(){ ?>
		<div style="max-width: 900px;">
			<table id="jam_plugins" class="widefat striped">
				<tbody>
				<tr>
					<th colspan="2">
						<h2>WPJAM 插件</h2>
						<p>加入<a href="http://97866.com/s/zsxq/">「WordPress果酱」知识星球</a>即可下载：</p>
					</th>
				</tr>
				<?php foreach(self::get_jam_plugins() as $jam_plugin){ ?>
				<tr>
					<th style="width: 100px;"><p><strong><a href="<?php echo $jam_plugin['i2']; ?>"><?php echo $jam_plugin['i1']; ?></a></strong></p></th>
					<td><?php echo wpautop($jam_plugin['i3']); ?></td>
				</tr>
				<?php } ?>
				</tbody>
			</table>

			<div class="card">
				<h2>WPJAM Basic</h2>

				<p><strong><a href="http://blog.wpjam.com/project/wpjam-basic/">WPJAM Basic</a></strong> 是 <strong><a href="http://blog.wpjam.com/">我爱水煮鱼</a></strong> 的 Denis 开发的 WordPress 插件。</p>
				
				<p>WPJAM Basic 除了能够优化你的 WordPress ，也是 「WordPress 果酱」团队进行 WordPress 二次开发的基础。</p>
				<p>为了方便开发，WPJAM Basic 使用了最新的 PHP 7.2 语法，所以要使用该插件，需要你的服务器的 PHP 版本是 7.2 或者更高。</p>
				<p>我们开发所有插件都需要<strong>首先安装</strong> WPJAM Basic，其他功能组件将以扩展的模式整合到 WPJAM Basic 插件一并发布。</p>
			</div>

			<div class="card">
				<h2>WPJAM 优化</h2>
				<p>网站优化首先依托于强劲的服务器支撑，这里强烈建议使用<a href="https://wpjam.com/go/aliyun/">阿里云</a>或<a href="https://wpjam.com/go/qcloud/">腾讯云</a>。</p>
				<p>更详细的 WordPress 优化请参考：<a href="https://blog.wpjam.com/article/wordpress-performance/">WordPress 性能优化：为什么我的博客比你的快</a>。</p>
				<p>我们也提供专业的 <a href="https://blog.wpjam.com/article/wordpress-optimization/">WordPress 性能优化服务</a>。</p>
			</div>
		</div>
		<style type="text/css">
			.card {max-width: 320px; float: left; margin-top:20px;}
			.card a{text-decoration: none;}
			table#jam_plugins{margin-top:20px; width: 520px; float: left; margin-right: 20px;}
			table#jam_plugins th{padding-left: 2em; }
			table#jam_plugins td{padding-right: 2em;}
			table#jam_plugins th p, table#jam_plugins td p{margin: 6px 0;}
		</style>
	<?php }
}

function wpjam_basic_get_setting($name){
	return WPJAM_Basic::get_instance()->get_setting($name);
}

function wpjam_basic_update_setting($name, $value){
	return WPJAM_Basic::get_instance()->update_setting($name, $value);
}

function wpjam_basic_delete_setting($name){
	return WPJAM_Basic::get_instance()->delete_setting($name);
}

function wpjam_basic_get_default_settings(){
	return WPJAM_Basic::get_default_settings();
}

function wpjam_get_extends(){
	return WPJAM_Basic::get_instance()->get_extends();
}

function wpjam_has_extend($extend){
	return WPJAM_Basic::get_instance()->has_extend($extend);
}

function wpjam_add_basic_sub_page($sub_slug, $args=[]){
	WPJAM_Basic_Admin::add_sub_page($sub_slug, $args);
}

if(is_admin()){
	add_filter('default_option_wpjam-basic',	['WPJAM_Basic', 'get_default_settings']);

	add_action('wpjam_admin_init',	['WPJAM_Basic_Admin', 'add_menu_pages']);
	add_action('admin_menu', 		['WPJAM_Basic_Admin', 'add_separator']);
}

	