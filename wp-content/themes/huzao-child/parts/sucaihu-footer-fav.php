<?php

$sucaihu_ui_footerfav_style = _cao('sucaihu_ui_footerfav_style');

?>
<div class="footer-fav">
	<div class="container">
		<div class="fl site-info">
			<h2> <a href="#"> <?php echo $title = ($sucaihu_ui_footerfav_style['_title']); ?> </a> </h2>
			<div class="site-p">
				<a href="#">
					<p><?php echo $title = ($sucaihu_ui_footerfav_style['introduce_title']); ?></p>
				</a>
			</div>
		</div>
	<div class="fr site-fav">
		<a href="#" class="btn btn-fav btn-orange" style=" background: <?php echo $color = ($sucaihu_ui_footerfav_style['sucaihu_ui_footer_fav_color']); ?>; "> <i class="ri-heart-line"></i>  按Ctrl+D收藏本站 </a>    </div>
	<div class="site-girl">
		<a href="#">
		<div class="girl fl"> <i class="thumb " style="background-image:url(<?php echo $title = ($sucaihu_ui_footerfav_style['_logo']); ?>);-moz-background-size: 100% 100%;background-size:100% 100%;"></i> </div>
			<div class="girl-info hide_md">
				<h4> <?php echo $title = ($sucaihu_ui_footerfav_style['right_title_upper']); ?> </h4>
				<h4> <?php echo $title = ($sucaihu_ui_footerfav_style['right_title_lower']); ?> </h4>
			</div>
		</a>
		</div>
	</div>
</div>