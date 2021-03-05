<?php if (_cao('is_mobele_list') && wp_is_mobile()) {
    get_template_part( 'parts/template-parts/content','list');
}else{
  $sidebar = cao_sidebar();
  $column_class = $sidebar == 'none' ? 'col-lg-1-5 col-6 col-sm-6 col-md-4 col-lg-3' : 'col-sm-6 col-md-4';
  $post_author_id   = get_post()->post_author;
?>
<div class="<?php echo esc_attr( $column_class ); ?>">
  <article id="post-<?php the_ID(); ?>" <?php post_class( 'post post-grid' ); ?>>
  	<?php yuanchuang(); ?>
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
      <?php if (_cao('grid_is_author',true)) { ?>
        <a<?php echo _target_blank();?> class="grid_author_avt" href="<?php echo esc_url( get_the_permalink( $post_id ) ); ?>"><div class="grid_author_bggo avatar bg-cover" style="background-image: url(<?php echo _get_user_avatar_url('user',get_the_author_meta( 'ID', $post_author_id ))?>);"></div> </a>
      <?php } ?>
      <?php cao_entry_header( array( 'category' => true ) ); ?>
      <?php if (_cao('grid_is_excerpt')) : ?>
       <div class="entry-excerpt u-text-format"><?php echo _get_excerpt(); ?></div>
      <?php endif; ?>
      <?php get_template_part( 'parts/entry-footer' ); ?>
    </div>
  </article>
</div>
<?php } ?>