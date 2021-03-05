<?php
// SUCAIHU 模块赞助
$sucaihu_ui_advert = _cao('sucaihu_ui_advert');
$sucaihu_ui_bannerroll_img = _cao('sucaihu_ui_bannerroll_img');
$sucaihu_ui_bannerroll_sort_pz = _cao('sucaihu_ui_bannerroll_sort_pz');
?>
<div class="toptu">
  <div class="item scroll">
    <img class="scroll-image lazyloaded" src="<?php echo $sucaihu_ui_bannerroll_img['_rolledimg']; ?>" data-was-processed="true">
    
    <img class="scroll-image lazyloaded" src="<?php echo $sucaihu_ui_bannerroll_img['_rolledimg']; ?>" data-was-processed="true">
    
    <div class="sc-1wssj0-17 hVBrzU">
      <img src="<?php echo $sucaihu_ui_bannerroll_img['_wordimg']; ?>" class="lazyloaded" data-was-processed="true">
    </div>
  </div>
  
	<?php if (_cao('sucaihu_ui_banenrrollsort')) : ?>
	<div class="cl statics htkYRs">
	  <div class="container">
	    <ul class="flex">
	    	
	      <?php foreach ($sucaihu_ui_bannerroll_sort_pz['sucaihu_ui_bannerroll_data'] as $key => $item) {
				echo '<li class="st_one">';
				echo '<a href="'.esc_url( $item['_href'] ).'" '.( $item['_blank'] ? ' target="_blank"' : '' ).'>';
				echo '<img class="lazy card-main lazyloaded" alt="'.$item['_title'].'" src="'.esc_url( $item['_img'] ).'">';
				echo '<h5 class="active-card-title">'.$item['_title'].'</h5>';
				echo '</a>';
				echo '</li>';
		  } ?>
		  
	    </ul>
	  </div>
	</div>
	<?php endif; ?>
	
</div>