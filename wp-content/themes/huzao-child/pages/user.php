<?php

/**
 * template name: 用户中心(/user)
 */
date_default_timezone_set('Asia/Shanghai');
if(!is_user_logged_in() || !is_site_shop_open()){
	header("Location:".home_url());
	exit();
}
global $current_user;
$part_action = (isset($_GET['action'])) ? strtolower($_GET['action']) : '' ;
  
  $container = _cao( 'navbar_full', false );
  $menu_class = 'main-menu hidden-xs hidden-sm hidden-md';
  if ( cao_compare_options( _cao( 'navbar_hidden', false ), rwmb_meta( 'navbar_hidden' ) ) == true ) {
    $menu_class .= ' hidden-lg hidden-xl';
  }
  $logo_regular = _cao( 'site_logo');
  $logo_regular_dark = _cao( 'site_dark_logo');
  
  $CaoUser = new CaoUser($current_user->ID);
  $site_money_ua = _cao('site_money_ua');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="<?php echo _cao('site_favicon') ?>" rel="icon">
  <title><?php echo _title() ?></title>

	<?php wp_head(); ?>
	<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="<?php echo get_stylesheet_directory_uri() ?>/assets/js/html5shiv.js"></script>
      <script src="<?php echo get_stylesheet_directory_uri() ?>/assets/js/respond.min.js"></script>
    <![endif]-->
     <script src="//at.alicdn.com/t/font_1169726_u1uoi1l1g9q.js"></script>
     <link rel='stylesheet' href='//at.alicdn.com/t/font_1575172_o74aqw4vxeb.css' type='text/css' />
</head>

<body <?php body_class(); ?>>

<div class="site">
<?php if (_cao('sucaihu_ui_navbar_top')) : ?>
<div class="header-banner">
	<div class="container">
		<div class="header-banner-content wrapper">
    		<div class="deanggwrap">
    			<div class="deangg comfff wow fadeInUp">
        			<div class="deanggspan"><i class="fa fa-volume-up"></i><span>最新公告</span></div>
						<b></b>
					<div class="deanggc"><!--[diy=deanggc]-->
						<div class="announce-wrap">
	                      	<ul class="announce-list line">
	                      	<?php 
								$args = array(
		    					'post_type'           => 'kuaixun',
		    					'post_status'         => 'publish',
		    					'showposts'           => '5',
								);
								$the_query = new WP_Query( $args );
							?>
	
							<?php if ( $the_query->have_posts() ) : ?>
						    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<li><a href="<?php echo esc_url( get_permalink() ); ?>" target="_blank"><?php the_title(); ?></a><span><?php the_time('Y.n.j'); ?></span></li>
	
							<?php endwhile; ?>
						    <?php wp_reset_postdata(); ?>
							<?php else : ?>
	    					<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
							<?php endif; ?>
							</ul>
                		</div>
					</div><!--[/diy]-->
        		<div class="clear"></div>
        	</div>
    	<div class="clear"></div>
	</div>
		    
		<div class="header-banner-left">
			<div id="ym-menu" class="ym-menu">
				<ul id="menu-header-top" class="menu">
					<li><?php wp_nav_menu( array( 'theme_location' => 'menu-3' ) ); ?></li>
				</ul>
			</div>
	    </div>
		</div>
	</div>
</div>
<header class="site-header uitop" id="navHeight">
<?php else: ?>
<header class="site-header <?php if (_cao('sucaihu_ui_frosted_glass')) : ?>frosted<?php endif; ?>" id="navHeight">
<?php endif; ?>
  <?php if ( $container == false ) : ?>
    <div class="container">
  <?php endif; ?>
    <div class="navbar">
      <div class="logo-wrapper<?php if (_cao('sucaihu_ui_logo_streamer')) : ?>s<?php endif; ?>">
      <?php if ( ! empty( $logo_regular ) ) : ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
          <img class="logo regular tap-logo" src="<?php echo esc_url( $logo_regular ); ?>" data-dark="<?php echo esc_url(_cao( 'site_dark_logo')); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
        </a>
      <?php else : ?>
        <a class="logo text" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
      <?php endif; ?>
      </div>
      <div class="sep"></div>
      
      <nav class="<?php echo esc_attr( $menu_class ); ?>">
        <?php wp_nav_menu( array(
          'container' => false,
          'fallback_cb' => 'Cao_Walker_Nav_Menu::fallback',
          'menu_class' => 'nav-list u-plain-list',
          'theme_location' => 'menu-1',
          'walker' => new Cao_Walker_Nav_Menu( true ),
        ) ); ?>
      </nav>
      
      <div class="main-search">
        <?php get_search_form(); ?>
        <div class="search-close navbar-button"><i class="mdi mdi-close"></i></div>
      </div>

      <div class="actions">
        <?php if (is_site_shop_open()) : ?>
          <!-- user -->
          <?php if (is_user_logged_in()) : ?>
            <?php if (_cao('is_navbar_newhover','1')) { 
              get_template_part( 'parts/navbar-hover' );
            }else{ ?>
              <a class="user-pbtn" href="<?php echo esc_url(home_url('/user')) ?>"><?php echo get_avatar($current_user->user_email); ?>
              <?php if(!_cao('is_navbar_ava_name','0')){
                echo '<span>'.$current_user->display_name.'</span>';
              }?>
              </a>
            <?php } ?>
            
          <?php else: ?>
              <div class="login-btn navbar-button">登录/注册
              <?php if (_cao('sucaihu_ui_Land_xiala')) : ?>
				<span class="diamond">
				    <ul>
                    <?php $sucaihu_ui_Land_xiala_text = _cao('sucaihu_ui_Land_xiala_text');
                    if (!empty($sucaihu_ui_Land_xiala_text)) {
                        foreach ($sucaihu_ui_Land_xiala_text as $key => $link) {
                            echo '<li><i></i>'.$link['_title'].'</li>';
                        }
                    }
                    ?>
				    </ul> 
				    <i class="kt">立即开通<?php if (_cao('sucaihu_ui_Land_xiala_biaoyu')) : ?><em><?php echo _cao('sucaihu_ui_Land_xiala_biaoyu');?></em><?php endif; ?></i>
				</span>
			  <?php endif; ?>	
              </div>
          <?php endif; ?>
        <?php endif; ?>
        <!-- user end -->
        <div class="search-open navbar-button"><i class="mdi mdi-magnify"></i></div>
        <?php if (_cao('is_ripro_dark_btn')) : ?>
        <div class="tap-dark navbar-button"><i class="mdi mdi-brightness-4"></i></div>
        <?php endif; ?>
        <div class="burger navbar-button" style="margin-right: 0;"><i class="fa fa-list"></i></div>
      </div>
    </div>
  <?php if ( $container == false ) : ?>
    </div>
  <?php endif; ?>
</header>
    
<div class="site-content" style="padding-top: 0px;">
	
<div class="term-bar visible lazyloaded" style="background-image:url(http://api.ahsubway.com/);background-size: cover;background-repeat: no-repeat;background-position: 15% 15%;background-color: rgba(0, 0, 0, 0.2);text-align:left;display:block;">
	<div class="container">
		<div class="apollo-user-meta py-4 mt-4 mt-md-5">
	    	<div class="user-d-flex">
	        	<div class="mb-3 mb-md-0">
		            <div class="flex-avatar w-96 rounded">
		            	<?php echo get_avatar($current_user->user_email); ?>
		            </div>
	        	</div>
		        <div class="text-white mx-md-4 flex-fill">
		            <div class="name text-lg"><span class=""></span><?php echo $current_user->display_name;?> 
		                <?php 
		                global $current_user;
						$CaoUser = new CaoUser($current_user->ID);
			                if ($CaoUser->vip_status()) {
			                	echo '<span class="wp wp-VIP"><i class="fa fa-diamond"></i> '.$CaoUser->vip_name().'用户</span>';
			                	echo '<div class="data mt-2"><span class="mr-3"><span class="font-theme text-lg text-white">'.$CaoUser->vip_end_time().'</span><small class=" text-xs text-light mx-1">  会员到期</small></span></div>  ';
			                }else{
			                	echo '<span class="wp wp-VIP"><i class="fa fa-user"></i> '.$CaoUser->vip_name().'用户</span>';
			                	echo '<div class="data mt-2"><span class="mr-3"><span class="font-theme text-lg text-white">'.$CaoUser->vip_end_time().'</span><small class=" text-xs text-light mx-1">  暂无特权</small></span></div>  ';
			                }
		                ?>
		        	</div>
		    	</div>
			</div>		
		</div>
	</div>
</div>
<div class="lang"><div class="lang__3"></div><div class="lang__4"></div></div>

<?php get_template_part( 'pages/user/header');?>


<!-- #user-profile
============================================= -->

<div class="container">
    <section id="user-profile" class="user-profile">
        <div class="row">
            <?php
            if ($part_action != 'addproduct') {
               get_template_part( 'pages/user/nav');
            }?>
            <!-- .col-md-4 -->
            <?php
	            if ($part_action) {
					get_template_part( 'pages/user/'.$part_action);
				}else{
					get_template_part( 'pages/user/index');
				}
			?>
            
        </div>
    </section>
</div>
<!-- #user-profile  end -->



<?php get_footer(); ?>