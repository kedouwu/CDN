<?php
$sucaihu_ui_advert = _cao('sucaihu_ui_advert');
$sucaihu_ui_banenr_pz = _cao('sucaihu_ui_banenr_pz');
$sucaihu_ui_banner_left_up = _cao('sucaihu_ui_banner_left_up');
$sucaihu_ui_banner_left_lower = _cao('sucaihu_ui_banner_left_lower');
?>
<div class="section">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-9">
                <div class="swiper-container">
                    <div class="swiper-wrapper">

                        <?php foreach ($sucaihu_ui_banenr_pz['sucaihu_ui_banenr_data'] as $key => $item) {
                            echo '<div class="swiper-slide">';
                            echo '<a '.( $item['_blank'] ? ' target="_blank"' : '' ).' href="'.esc_url( $item['_href'] ).'">';
                            echo '<img src="'.esc_url( $item['_img'] ).'">';
                            echo '<h3><span class="label label-h3">'.$item['_Recommend'].'</span>'.$item['_title'].'</h3>';
                            echo '</a>';
                            echo '</div>';
                        } ?>

                    </div>
                    
				    <?php if (_cao('sucaihu_ui_banenr_advert')) : ?>
				    <!--banner 固定小广告-->
					<div class="layout r_b_tip_box">
					    <div class="r_b_tip" style="background: url(<?php echo $sucaihu_ui_advert['bgimg']; ?>) no-repeat -3px -155px;"></div>
					</div>
					<?php endif; ?>
					
                    <!-- 如果需要分页器 -->
                    <div class="swiper-pagination"></div>

                    <!-- 如果需要导航按钮 -->
                    <span class="swiper-button-prev"><i class="mdi mdi-chevron-left"></i></span>
                    <div class="swiper-button-next"><i class="mdi mdi-chevron-right"></i></div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="row h-images no-gutters">
                    <div class="item-tuwen col-6 col-lg-12">
                        <a href="<?php echo $title = ($sucaihu_ui_banner_left_up['_link']); ?>" target="_blank" class="h-mark">
                            <i class="thumb" style="background-image:url(<?php echo esc_url( @$sucaihu_ui_banner_left_up['sucaihu_ui_banner_up_logo'] ); ?>);"></i>
                            <strong><?php echo $title = ($sucaihu_ui_banner_left_up['_title']); ?></strong>
                        </a>
                    </div>
                    <div class="item-tuwen col-6 col-lg-12">
                        <a href="<?php echo $title = ($sucaihu_ui_banner_left_lower['_link']); ?>" target="_blank" class="h-mark">
                            <i class="thumb" style="background-image:url(<?php echo esc_url( @$sucaihu_ui_banner_left_lower['sucaihu_ui_banner_lower_logo'] ); ?>);"></i>
                            <strong><?php echo $title = ($sucaihu_ui_banner_left_lower['_title']); ?></strong>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>