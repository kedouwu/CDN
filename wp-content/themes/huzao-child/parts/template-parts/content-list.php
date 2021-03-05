<?php
  $sidebar = cao_sidebar();
  $column_class = $sidebar == 'none' ? 'col-lg-6' : 'col-12';
?>

<div class="<?php echo esc_attr( $column_class ); ?>">
  <article id="post-<?php the_ID(); ?>" <?php post_class( 'post post-list' ); ?>>
  	
	<?php if (_cao('sucaihu_ui_article_marker')) : ?>
  	<?php if ((_get_post_shop_status() || _get_post_shop_hide()) && _cao('grid_is_price',true)) : 
  	$post_price = _get_post_price();
  	$post_price =($post_price) ? '<i class="vwip30"></i>' : '<i class="vwip10"></i>' ;
  ?>
  	<?php echo ''.$post_price;?>
  <?php endif; ?>
	<?php endif; ?>
  
    <?php cao_entry_media( array( 'layout' => 'rect_300' ) ); ?>
    <div class="entry-wrapper">
      <?php cao_entry_header( array( 'category' => true ,'author'=>true ) ); ?>
      <div class="entry-excerpt u-text-format"><?php echo _get_excerpt(); ?></div>
      <?php get_template_part( 'parts/entry-footer' ); ?>
    </div>
  </article>
</div>