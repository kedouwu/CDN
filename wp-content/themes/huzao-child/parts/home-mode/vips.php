<?php
$sucaihu_ui_mode_vip = _cao('sucaihu_ui_vip_mod');
?>
<div class="section pt-0 pb-0">
	<div class="home-vip-mod">
		<div class="container">
	      <div class="row">
			<div class="card ent-base ">
				<div class="header" style="background:#19d44a">
					<div class="version">
						注册用户
					</div>
					<div class="price-year">
						<span class="dollar">￥</span><span class="price">0</span>
					</div>
					<div class="price-quarter">
				    	<span class="tehui"><i class="fa fa-diamond"></i> 限时优惠</span>
					</div>
						<p>
						<?php if (is_user_logged_in()) : ?>
						<a href="<?php echo esc_url(home_url('/user?action=vip'));?>" class="btn-sm primary" style="background:<?php echo $item['_color'];?>"><button class="btn user-login">升级会员</button></a>
						<?php else: ?>
						<a class="login-btn btn-sm primary"><button class="btn user-login"><i class="fa fa-user"></i> 立即注册</button></a>
						<?php endif; ?>
						</p>
                <div class="pricing-deco">
                    <svg class="pricing-deco-img" enable-background="new 0 0 300 100" id="Layer_1" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" x="0px" xml:space="preserve" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" y="0px">
                        <path class="deco-layer deco-layer--1" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729
	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="#FFFFFF" opacity="0.6"></path>
                        <path class="deco-layer deco-layer--2" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729
	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="#FFFFFF" opacity="0.6"></path>
                        <path class="deco-layer deco-layer--3" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716
	H42.401L43.415,98.342z" fill="#FFFFFF" opacity="0.7"></path>
                        <path class="deco-layer deco-layer--4" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428
	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="#FFFFFF"></path>
                    </svg>
                </div>
				</div>
				<div class="content">
					<div class="desc">
						站内免费资源</div>
					<div class="desc">
						每日3次下载次数</div>
					<div class="desc">
						<strong style="color:red">折扣次数</strong>：无折扣
					</div>
					<div class="desc">
						<strong style="color:red">会员权限</strong>：无权限
					</div>
				</div>
			</div>

			          <?php foreach ( $sucaihu_ui_mode_vip['sucaihu_ui_vip_group'] as $item ) : ?>
			<div class="card ent-base ">
				<div class="header"  style="background:<?php echo $item['_color'];?>">
					<div class="version">
						<?php echo $item['_time'];?>
					</div>
					<div class="price-year">
						<span class="dollar">￥</span><span class="price"><?php echo $item['_price'];?></span>
					</div>
					<div class="price-quarter">
				        <?php if ($item['_tehui']) : ?>
				        <span class="tehui"><i class="fa fa-diamond"></i> <?php echo $item['_tehui'];?></span>
					</div>
					<?php endif; ?>
					<p>
						<?php if (is_user_logged_in()) : ?>
						<a href="<?php echo esc_url(home_url('/user?action=vip'));?>" class="btn-sm primary" style="background:<?php echo $item['_color'];?>"><button class="btn user-login">前往开通</button></a>
						<?php else: ?>
						<a class="login-btn btn-sm primary"><button class="btn user-login"><i class="fa fa-user"></i> 登录购买</button></a>
						<?php endif; ?>
					</p>
                <div class="pricing-deco">
                    <svg class="pricing-deco-img" enable-background="new 0 0 300 100" id="Layer_1" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" x="0px" xml:space="preserve" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" y="0px">
                        <path class="deco-layer deco-layer--1" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729
	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="#FFFFFF" opacity="0.6"></path>
                        <path class="deco-layer deco-layer--2" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729
	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="#FFFFFF" opacity="0.6"></path>
                        <path class="deco-layer deco-layer--3" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716
	H42.401L43.415,98.342z" fill="#FFFFFF" opacity="0.7"></path>
                        <path class="deco-layer deco-layer--4" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428
	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="#FFFFFF"></path>
                    </svg>
                </div>
				</div>
				<div class="content">
					<div class="desc">
						<?php echo $item['_vipms01'];?>
					</div>
					<div class="desc">
						<?php echo $item['_vipms02'];?>
					</div>
					<div class="desc">
						<strong style="color:red">折扣次数</strong>：有效期内全站随意下载
					</div>
					<div class="desc">
						<strong style="color:red">会员权限</strong>：VIP用户投稿优先审核
					</div>

					<p>
					</p>
				</div>
			</div>
		<?php endforeach; ?>	
	      </div>
		</div>
	</div>
</div>