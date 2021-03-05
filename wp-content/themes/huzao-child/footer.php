</div><!-- end sitecoent --> 

	<?php
	$mode_banner = _cao('mode_banner');
	$sucaihu_ui_autonomy_links = _cao('sucaihu_ui_autonomy_links');
	$sucaihu_ui_footer_wavecolor = _cao('sucaihu_ui_footer_wavecolor');
	if (is_array($mode_banner) && isset($mode_banner['bgimg']) && _cao('is_footer_banner') ) : ?>

	<div class="module parallax">
		<img class="jarallax-img lazyload" data-srcset="<?php echo $mode_banner['bgimg']; ?>" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="">
		<div class="container">
			<h4 class="entry-title">
				<?php echo wp_kses( $mode_banner['text'], array(
					'br' => array(),
				) ); ?>
			</h4>
			<?php if ( $mode_banner['primary_text'] != '' ) : ?>
				<a<?php echo _target_blank(); ?> class="button" href="<?php echo esc_url( $mode_banner['primary_link'] ); ?>"><?php echo esc_html( $mode_banner['primary_text'] ); ?></a>
			<?php endif; ?>
			<?php if ( $mode_banner['secondary_text'] != '' ) : ?>
				<a<?php echo _target_blank(); ?> class="button transparent" href="<?php echo esc_url( $mode_banner['secondary_link'] ); ?>"><?php echo esc_html( $mode_banner['secondary_text'] ); ?></a>
			<?php endif; ?>
		</div>
	</div>
	<?php endif; ?>
	
	<?php
	$sucaihu_ui_statistics = _cao('sucaihu_ui_statistics');
	if (is_array($sucaihu_ui_statistics) && isset($sucaihu_ui_statistics['bgimg']) && _cao('sucaihu_ui_footer_statistics') ) : ?>
	<div class="footer-statistics">
		<div class="site-data-wp" id="J_siteDataBar" data-bg="<?php echo $sucaihu_ui_statistics['bgimg']; ?>" style="background-image: url(&quot;<?php echo $sucaihu_ui_statistics['bgimg']; ?>&quot;);">
	    <ul class="data-items">
	    	<li>
	    		<span class="srctive"><?php echo floor((time()-strtotime("2021-01-1"))/86400); ?></span><strong>本站运营(天)</strong>
	    	</li>
	        <li>
	        	<span class="srctive"><?php $users = $wpdb->get_var("SELECT COUNT(ID) FROM $wpdb->users"); echo $users; ?></span><strong>用户总数</strong>
	        </li>
	        <li>
	        	<span class="srctive"><?php $count_posts = wp_count_posts(); echo $published_posts = $count_posts->publish;?></span><strong>资源数(个)</strong>
	        </li>
	        <li>
	        	<span class="srctive"><?php get_week_post_count(); ?></span><strong>近7天更新(个)</strong>
	        </li>
	        <li>
	        	<span class="srctive srcshujia">1000</span><strong>资源大小(GB)</strong>
	        </li>
	        </ul>
				<?php if ( $sucaihu_ui_statistics['_text'] != '' ) : ?>
					<a class="btn btn-outlined" href="<?php echo esc_url( $sucaihu_ui_statistics['_link'] ); ?>" rel="nofollow"><?php echo esc_html( $sucaihu_ui_statistics['_text'] ); ?></a>
				<?php endif; ?>
	    
		</div>
	</div>
	<?php endif; ?>
	
	<?php if (_cao( 'sucaihu_ui_footer_fav','true' ) ){
		get_template_part( 'parts/sucaihu-footer-fav' );
	}?>
	<footer class="site-footer">
		<div class="container">
			
			<?php if (_cao( 'is_diy_footer','true' ) ){
				get_template_part( 'parts/diy-footer' );
			}?>
			<?php if (_cao( 'sucaihu_ui_footer_concise','true' ) ){
				get_template_part( 'parts/sucaihu-footer-concise' );
			}?>
			
			<?php if (_cao('sucaihu_ui_footer_links')) : ?>
			<!--Friendship Links Start-->
			<div class="codesign-dw">
				<div class="col-xs-12 friend-links">
					<ul class="codesign-fl">
						<?php wp_list_bookmarks('title_li=&show_images=0&categorize=0'); ?>
						<?php if (_cao('sucaihu_ui_autonomy_link')) : ?>
						<li>
                        <a class="ctrl-apply" href="<?php echo $title = ($sucaihu_ui_autonomy_links['_url']); ?>"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path fill-rule="nonzero" d="M7.5.5a7 7 0 110 14 7 7 0 010-14zm0 1a6 6 0 100 12 6 6 0 000-12zM8 4v3h3v1H8v3H7V8H4V7h3V4h1z"></path></svg> 申请友链</a>
                    	</li>
                    	<?php endif; ?>
					</ul>
				</div>
			</div>
			<!--Friendship Links End-->
			<?php endif; ?>
			
			<?php if ( _cao( 'cao_copyright_text', '' ) != '' ) : ?>
			  <div class="site-info">
			  	<div class="footer-shouquan"><?php echo _cao( 'sucaihu_ui_footer_state', '' ); ?></div>
			    <?php echo _cao( 'cao_copyright_text', '' ); ?>
			    <?php if(_cao('cao_ipc_info')) : ?>
			    <a href="http://www.beian.miit.gov.cn" target="_blank" class="text"><?php echo _cao('cao_ipc_info')?><br></a>
			    <?php endif; ?>
			  </div>
			<?php endif; ?>
		</div>
	</footer>
	
	<?php if (_cao( 'sucaihu_ui_footer_float','true' ) ){
		get_template_part( 'parts/sucaihu-float' );
	}?>
	
<?php if (_cao('pro_ui_footer_float')) : ?>
<div class="rollbar">
	<?php if (_cao('site_kefu_qq')) : ?>
    <div class="rollbar-item tap-qq" etap="tap-qq"><a target="_blank" title="QQ咨询" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo _cao('site_kefu_qq');?>&site=qq&menu=yes"><i class="fa fa-qq"></i></a></div>
    <?php endif; ?>

	<div class="rollbar-item" etap="to_full" title="全屏页面"><i class="fa fa-arrows-alt"></i></div>

	<?php if (_cao('is_ripro_blog_style_btn','1')) : $_bid = (is_cao_site_list_blog()) ? 1 : 0 ; ?>
    <div class="rollbar-item tap-blog-style" etap="tap-blog-style" data-id="<?php echo $_bid; ?>" title="博客模式"><i class="fa fa-list"></i></div>
    <?php endif; ?>

	<?php if (_cao('is_ripro_dark_btn')) : ?>
    <div class="rollbar-item tap-dark" etap="tap-dark" title="夜间模式"><i class="mdi mdi-brightness-4"></i></div>
    <?php endif; ?>
	<div class="rollbar-item" etap="to_top" title="返回顶部"><i class="fa fa-angle-up"></i></div>
</div>
<?php endif; ?>

<div class="dimmer"></div>

<?php if (!is_user_logged_in() && is_site_shop_open()) : ?>
    <?php get_template_part( 'parts/popup-signup' ); ?>
<?php endif; ?>

<?php get_template_part( 'parts/off-canvas' ); ?>

<?php if (_cao('is_console_footer','true')) : ?>
<script>
    console.log("version：<?php echo _the_theme_name().'_v'._the_theme_version();?>");
    console.log("SQL 请求数：<?php echo get_num_queries();?>");
    console.log("页面生成耗时： <?php echo timer_stop(0,5);?>");
</script>
<?php endif; ?>

<script type="text/javascript">
	jQuery(document).ready(function($){
		$('.ct h3 span').click(function(){
		$(this).addClass("selected").siblings().removeClass();
		$('.ct > ul').eq($(this).index()).addClass('show');
		$('.ct > ul').eq($(this).index()).siblings().removeClass('show');
		});
		$("pre > code").addClass("language-php");
	});
	jQuery(".header-dropdown").hover(function() {
		jQuery(this).addClass('active');
	}, function() {
		jQuery(this).removeClass('active');
	});
	$('.h-screen li').click(function(){
	$(this).addClass("on").siblings().removeClass();
	$('.ct > ul').eq($(this).index()).addClass('show');
	$('.ct > ul').eq($(this).index()).siblings().removeClass('show');
	});
	$(".h-soup li i").click(function(){
		var soupBtn = $(this).parent();
		$(".h-soup li").removeClass("open");
		soupBtn.addClass("open");
	});
	$('.srctive').countUp({
		delay: 10,
		time: 500
	});
</script>

<script> 
	 //内容信息导航吸顶
	$(document).ready(function(){ 
	var navHeight= $("#navHeight").offset().top; 
	var navFix=$("#navHeight"); 
	$(window).scroll(function(){ 
		if($(this).scrollTop()>navHeight){ 
			navFix.addClass("navFix"); 
		} 
		else{ 
			navFix.removeClass("navFix"); 
		} 
		}) 
	})
	var ndt = $("#help dt");
	var ndd = $("#help dd");
	ndd.eq(0).show();
	ndt.click(function () {
    ndd.hide();
    $(this).next().show();
	});
</script>
<script type="text/javascript">  
function extractNodes(pNode){ 
    if(pNode.nodeType == 3)return null; 
    var node,nodes = new Array(); 
    for(var i=0;node= pNode.childNodes[i];i++){ 
        if(node.nodeType == 1)nodes.push(node); 
    } 
    return nodes; 
} 
var obj=document.getElementById("rolltxt"); 
for(i=0;i<4;i++){ 
    obj.appendChild(extractNodes(obj)[i].cloneNode(true)); 
} 
settime=0; 
var t=setInterval(rolltxt,50); 
function rolltxt(){ 
    if(obj.scrollTop % (obj.clientHeight-0) ==0){ 
        settime+=1; 
        if(settime==50){ 
            obj.scrollTop+=1; 
            settime=0; 
        } 
    }else{ 
        obj.scrollTop+=1; 
        if(obj.scrollTop==(obj.scrollHeight-obj.clientHeight)){ 
            obj.scrollTop=0; 
        } 
    } 
} 
obj.onmouseover=function(){clearInterval(t)} 
obj.onmouseout=function(){t=setInterval(rolltxt,50)} 
</script> 
<?php if (_cao('web_js')) : ?>
<?php echo _cao('web_js');?>
<?php endif; ?>

<?php wp_footer(); ?>
<?php if (_cao('sucaihu_ui_footer_wave')) : ?>
<div class="waveHorizontals mobile-hide"> 
	<div id="waveHorizontal1" class="waveHorizontal"></div>
	<div id="waveHorizontal2" class="waveHorizontal"></div>
	<div id="waveHorizontal3" class="waveHorizontal"></div>
</div>
<?php endif; ?>
<!-- 弹幕引用 -->
<?php if (_cao('sucaihu_ui_barrager')) : ?>
 <script type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/assets/js/jquery.barrager.js"></script>
<?php endif; ?>
<!--广告应用
<div id="right_ad" class="right-ad-active" style="display: block;">
        <div class="kubao" style="display: none;"><span class="sm"></span></div>
        <a class="link animated" href="/vip" target="_blank" style=" background: url(<?php bloginfo('stylesheet_directory');?>/assets/images/left-float.png) no-repeat top /100% auto;"><em class="close">×</em></a></div>
        <link rel="stylesheet" id="rightad-css" href="<?php bloginfo('stylesheet_directory');?>/assets/css/right.css" type="text/css" media="all">
        <script type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/assets/js/right.js"></script>
        <script type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/assets/js/other.js"></script>-->

</body>
</html>