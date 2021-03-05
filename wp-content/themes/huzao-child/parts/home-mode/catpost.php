<?php

$mode_catpost = _cao('mode_catpost');

foreach ($mode_catpost['catcms'] as $key => $cms) { 

	$args = array(
	    'cat'            => $cms['category'],
	    'ignore_sticky_posts' => true,
	    'post_status'         => 'publish',
	    'posts_per_page'      => $cms['count'],
	    'orderby'      => $cms['orderby'],
	    'sucaihu_ui_catcms_icon'      => $cms['sucaihu_ui_catcms_icon'],
	);

	$data = new WP_Query($args);
	$category = get_category( $cms['category'] );

	ob_start(); ?>
	<div class="section pb-0">
		<div class="container">
			<div class="home_title">
				<div class="title">
					<span class="pricing-title">
						<?php echo '<i class="'.$cms['sucaihu_ui_catcms_icon'].'"></i>';?>
						<?php echo $category->cat_name; ?>
						<div class="index_fenlei"><?php echo $category->description; ?></div>
						<div class="fwq_fenlei_title"></div>
					</span>
				</div>
				<div>
				<a href="<?php echo esc_url( get_category_link( $category->cat_ID ) ); ?>" title="查看更多" target="_blank" style="top: 5px; position: relative; color: rgb(51, 51, 51); font-size: 14px; font-weight: 300;">更多
				<i class="fa fa-angle-double-right"></i></a>
				</div>
			</div>
		  	<?php _the_cao_ads('ad_list_header', 'list-header');?>
			<div class="row cat-posts-wrapper">
			    <?php while ( $data->have_posts() ) : $data->the_post();
			      get_template_part( 'parts/template-parts/content',$cms['latest_layout'] );
			    endwhile; ?>
			</div>
			<?php _the_cao_ads('ad_list_footer', 'list-footer');?>

		</div>
	</div>
	<?php 
	wp_reset_postdata();
	echo ob_get_clean(); 
}
?>