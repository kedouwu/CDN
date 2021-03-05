<?php
$site_yun_tu = _cao('site_yun_tu');
$site_data_tu = _cao('site_data_tu');
$site_lhot_tu = _cao('site_lhot_tu');
$site_hot_set= _cao('site_hot_set');
$site_hhot2_tu= _cao('site_hhot2_tu');
$site_hhot_tu= _cao('site_hhot_tu');
?>
<div class="section">
	<div class="home-first">
		<div class="container hide_sm">
				<div class="col-1-4">
					<div class="hf-widget hf-widget-1 hf-widget-software">
						<h3 class="hf-widget-title">
							<i class="ri-1x hhicon ri-cloud-line"></i>
							<a href="http://kedouwu.xyz/kuaixun/" target="_blank">必看讯息</a>
							<span>不容错过</span>
							<div class="pages">
								<i class="prev">
									<i class="ri-arrow-left-s-line"></i>
								</i>
								<i class="next">
									<i class="ri-arrow-right-s-line"></i>
								</i>
							</div>
						</h3>
						<div class="hf-widget-content">
							<div class="scroll-h">
								<ul> 
         <?php foreach ($site_yun_tu['site_yun_tu_data'] as $key => $item) {
         	echo '<li>';
         	echo '<a href="'.esc_url( $item['_href'] ).'" '.( $item['_blank'] ? ' target="_blank"' : '' ).'>';
         	echo '<i class="thumb " style="background-image:url('.esc_url( $item['_img'] ).')"></i>';
         	echo '<span>'.$item['_title'].'</span>';
         	echo '</a>';
         	echo '</li>';
         }?>
         </ul> 
         <ul class="holdon"> 
          <?php foreach ($site_data_tu['site_data_tu_data'] as $key => $item) {
         	echo '<li>';
         	echo '<a href="'.esc_url( $item['_href'] ).'" '.( $item['_blank'] ? ' target="_blank"' : '' ).'>';
         	echo '<i class="thumb " style="background-image:url('.esc_url( $item['_img'] ).')"></i>';
         	echo '<span>'.$item['_title'].'</span>';
         	echo '</a>';
         	echo '</li>';
         }?> 
         </ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-1-4 sxweb">
					<div class="hf-widget hf-widget-2">
						<h3 class="hf-widget-title">
							<i class="ri-1x hhicon ri-contrast-drop-2-line"></i>
							<a href="http://kedouwu.xyz/tag/rmzy/" target="_blank">热门资源</a>
							<span>火热标签</span></h3>
						<div class="hf-widget-content">
							<div class="no-scroll hf-tags">
								<?php foreach ($site_lhot_tu['site_lhot_tu_data'] as $key => $item) {
        	echo '<a href="'.esc_url( $item['_href'] ).'" '.( $item['_blank'] ? ' target="_blank"' : '' ).'>';
        	echo '<span>'.$item['_title'].'</span>';
        	echo '</a>';
        	}?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-1-4 sxweb">
					<div class="hf-widget hf-widget-1 hf-widget-hot-cats">
						<h3 class="hf-widget-title">
							<i class="ri-palette-fill"></i>
							<a  target="_blank">热门专区</a>
							<span>今天你看了吗</span></h3>
						<div class="hf-widget-content">
							<div class="scroll-h">
								<ul>
                                    
									<li> <a href="<?php echo esc_url( $site_hot_set['hot_primary_link'] ); ?>" target="_blank"> <i class="hhicon ri-bookmark-3-line"></i> <span><?php echo $site_hot_set['hot_primary_text']; ?></span></a> </li> 
          <li> <a href="<?php echo esc_url( $site_hot_set['hot_secondary_link'] ); ?>" target="_blank"> <i class="hhicon ri-paint-line"></i> <span><?php echo $site_hot_set['hot_secondary_text']; ?></span></a> </li> 
          <li> <a href="<?php echo esc_url( $site_hot_set['hot_three_link'] ); ?>" target="_blank"> <i class="hhicon ri-shape-line"></i> <span><?php echo $site_hot_set['hot_three_text']; ?></span></a> </li> 
          <li> <a href="<?php echo esc_url( $site_hot_set['hot_four_link'] ); ?>" target="_blank"> <i class="hhicon ri-pencil-ruler-2-line"></i> <span><?php echo $site_hot_set['hot_four_text']; ?></span></a> </li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-1-4 sxweb">
					<div class="hf-widget hf-widget-4">
						<h3 class="hf-widget-title">
							<i class="ri-1x hhicon ri-contacts-book-2-fill"></i>
							<a href="" target="_blank">最新活动</a>
							<span>免费会员享福利</span>
							<div class="pages">
								<i class="prev">
									<i class="ri-arrow-left-s-line"></i>
								</i>
								<i class="next">
									<i class="ri-arrow-right-s-line"></i>
								</i>
							</div>
						</h3>
						<div class="hf-widget-content">
							<div class="scroll-h">
								<ul> 
         <?php foreach ($site_hhot_tu['site_hhot_tu_data'] as $key => $item) {
         	echo '<li><h3>';
         	echo '<a href="'.esc_url( $item['_href'] ).'" '.( $item['_blank'] ? ' target="_blank"' : '' ).'>';
         	echo '<i class="icon-time"></i>';
         	echo '<span>'.$item['_title'].'</span>';
         	echo '<em>'.$item['_title2'].'</em>';
         	echo '</a>';
         	echo '</h3> </li> ';
         }?>
         </ul> 
         <ul class="holdon"> 
          <?php foreach ($site_hhot2_tu['site_hhot2_tu_data'] as $key => $item) {
         	echo '<li><h3>';
         	echo '<a href="'.esc_url( $item['_href'] ).'" '.( $item['_blank'] ? ' target="_blank"' : '' ).'>';
         	echo '<i class="icon-time"></i>';
         	echo '<span>'.$item['_title'].'</span>';
         	echo '<em>'.$item['_title2'].'</em>';
         	echo '</a>';
         	echo '</h3> </li> ';
         }?> 
         </ul>
							</div>
						</div>
					</div>
				</div>
		</div>
	</div>
</div>