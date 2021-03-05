<?php
$sucaihu_ui_mobile_pz = _cao('sucaihu_ui_mobile_pz');
?>
<?php if (_cao('sucaihu_ui_mobile')) : ?>
<div class="section sucaihu-ui-section">
	<div class="cl static htkYRs">
		<div class="container">
			<ul class="flex">
				<?php foreach ($sucaihu_ui_mobile_pz['sucaihu_ui_mobile_data'] as $key => $item) {
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
</div>
<?php endif; ?>