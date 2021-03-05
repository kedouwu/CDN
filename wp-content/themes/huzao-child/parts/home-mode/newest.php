<?php
$sidebar = 'none';
$column_classes = cao_column_classes( $sidebar );
$sucaihu_ui_tab_update = _cao('sucaihu_ui_tab_update');
$sucaihu_ui_two_recommend = _cao('sucaihu_ui_two_recommend');

$mo_postlist_no_cat = _cao('home_last_post');
if(!empty($mo_postlist_no_cat['home_postlist_no_cat'])){
  $args['cat'] = '-'.implode($mo_postlist_no_cat['home_postlist_no_cat'], ',-');
}
$args['paged'] = (get_query_var('paged')) ? get_query_var('paged') : 0;

query_posts($args);


?>
	<?php if (_cao('sucaihu_ui_tab_one')) : ?>
	<div class="section">
	    <div class="row">
	      <div class="<?php echo esc_attr( $column_classes[0] ); ?>">
	        <div class="content-area">
	          <main class="site-main widget_tabcontent  ct">
	              <?php if ( is_home() ) : ?>
		            <div class="category-header">
							<div class="catalog_types types">
							<h3 class="text-center">
								<span class="selected">最新资源</span>
								<span class="">热门资源</span>
								<span class="">最新免费</span>
							</h3>
							</div>
					</div>
					<div class="container">
	              	<?php _the_cao_ads('ad_list_header', 'list-header'); endif; ?>
	                </div>
	<?php endif; ?>
	<?php if (_cao('sucaihu_ui_tab_two')) : ?>
	<div class="section">
	    <div class="row">
	      <div class="<?php echo esc_attr( $column_classes[0] ); ?>">
	        <div class="content-area">
	          <main class="site-main widget_tabcontent  ct">
	           <link rel="stylesheet" id="wp-block-library-css" href="//at.alicdn.com/t/font_1631810_4drehjsmfd.css" type="text/css" media="all">
	              <?php if ( is_home() ) : ?>
	              
					<div class="container"><div class="cl pos">
					    <ul class="h-screen">
					        <li class="on"><a href="javascript:;" title="首页推荐">最新资源</a></li>
					        <li class=""><a href="javascript:;" rel="" data-status="">热门资源</a></li>                            
					        <li class=""><a href="javascript:;" title="最新作品">免费资源</a></li>   
					    </ul>
					<!--  -->
					    <ul class="h-soup cl">
					        <li>
					            <i class="iconfont icon_star" title="更新"></i>
					            <a class="txt" href="<?php echo $title = ($sucaihu_ui_tab_update['_link']); ?>" target="_blank"><?php echo $title = ($sucaihu_ui_tab_update['_title']); ?></a>
					        </li>
					        <li class="open">
					            <i class="iconfont icon_warn" title="推荐"></i>
					            <a class="txt" href="<?php echo $title = ($sucaihu_ui_two_recommend['_link']); ?>" target="_blank" ><?php echo $title = ($sucaihu_ui_two_recommend['_title']); ?></a>
					        </li>
					        <li>
					        <i class="iconfont icon_heart" title="一条"></i>
					            <a class="txt" href="javascript:;" target="_blank">
					            <p id="hitokoto"></p>
					            <script src="https://v1.hitokoto.cn/?encode=js&select=%23hitokoto" defer></script>
					            </a>
					        </li>
					    </ul>
					</div></div>
	              <div class="container">
	              	<?php _the_cao_ads('ad_list_header', 'list-header'); endif; ?>
	              </div>
	              
	<?php endif; ?>
    <?php if ( have_posts() ) : ?>
		<ul class="hide-code show">
              <div class="container">
            	<div class="row posts-wrapper">
					<?php
					$sidebar = 'none';
					$column_classes = cao_column_classes( $sidebar );
					
					$mo_postlist_no_cat = _cao('home_last_post');
					if(!empty($mo_postlist_no_cat['home_postlist_no_cat'])){
					  $args['cat'] = '-'.implode($mo_postlist_no_cat['home_postlist_no_cat'], ',-');
					}
					$args['paged'] = (get_query_var('paged')) ? get_query_var('paged') : 0;
					
					query_posts($args);

					?>
	                <?php while ( have_posts() ) : the_post();
	                  get_template_part( 'parts/template-parts/content', _cao( 'latest_layout', 'list' ) );
	                endwhile; ?>
            	</div>
	              <?php _the_cao_ads('ad_list_footer', 'list-footer');?>
	              <?php get_template_part( 'parts/pagination' ); ?>
              </div>
              </ul> 
              <?php wp_reset_query(); ?>
              <ul class="hide-code">
              <div class="container">
            	<div class="row posts-wrapper">
	              	<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$args = array(
					    // 以下代码中的 modified 就是 orderby 的值，按修改时间排序。
					    // 常用 orderby 值：title-按标题；date-按发布日期；modified-按修改时间；ID-按文章 ID；rand-随机排序；comment_count-按评论数。 
					   
					    // 控制每页显示 20 篇文章，如果将 20 改成-1 将显示所有文章。不加此代码表示按照后台设置。
					    'meta_key' => 'views',/* 此处为你的自定义栏目名称 */
					    //'showposts' => '10',
						'orderby' => 'meta_value_num', /* 配置排序方式为自定义栏目值 */
					    'paged' => $paged
					); 
					query_posts($args); ?>
	              	
	                <?php while ( have_posts() ) : the_post();
	                  get_template_part( 'parts/template-parts/content', _cao( 'latest_layout', 'list' ) );
	                endwhile; ?>
	            </div>
	              <?php _the_cao_ads('ad_list_footer', 'list-footer');?>
	              <?php get_template_part( 'parts/pagination' ); ?>
              </div>
              </ul> 
              
              <?php wp_reset_query(); ?>
              <ul class="hide-code">
              <div class="container">
               <div class="row posts-wrapper">
					<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$args = array(
					    
					    'meta_key' => 'cao_price',/* 此处为你的自定义栏目名称 */
					    //'showposts' => '10',
					    'meta_value' => '0',
						'orderby' => 'meta_value_num', /* 配置排序方式为自定义栏目值 */
					    'paged' => $paged
					); 
					query_posts($args); ?>	
 
	                <?php while ( have_posts() ) : the_post();
	                  get_template_part( 'parts/template-parts/content', _cao( 'latest_layout', 'list' ) );
	                endwhile; ?>
               </div>
	              <?php _the_cao_ads('ad_list_footer', 'list-footer');?>
	              
	          </div>
              </ul> 
                <?php wp_reset_query(); ?>
            <?php else : ?>
              <?php get_template_part( 'parts/template-parts/content', 'none' ); ?>
            <?php endif; ?>
          </main>
        </div>
      </div>
      <?php if ( $sidebar != 'none' ) : ?>
              <div class="<?php echo esc_attr( $column_classes[1] ); ?>">
                  <?php get_sidebar(); ?>
              </div>
          <?php endif; ?>
    </div>
  </div>
</div>

<?php
wp_reset_postdata();
echo ob_get_clean();