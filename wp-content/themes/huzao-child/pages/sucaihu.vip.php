<?php
/*
Template Name: vip介绍
*/
$home_mode_vip = _cao('home_vip_mod');
?>
<?php get_header(); ?>

<div class="vip-banner">
  <div class="vipbj">
    <h2><?php echo $home_mode_vip['title'];?></h2>
    <p>现在努力只为 不再仰望大神的后背！</p>
	<?php if (is_user_logged_in()) : ?>
	<a href="<?php echo esc_url(home_url('/user?action=vip'));?>" class="btn-sm primary">前往开通</a>
	<?php else: ?>
	<a class="login-btn btn-sm primary">登录开通</a>
	<?php endif; ?>
    </div>
</div>
<div class="module-line"> <span class="arrow left-arrow"></span> <span class="text">会员尊享6项特权</span> <span class="arrow right-arrow"></span> </div>
<ul class="vip-slogan">
  <li class="vip-slogan-box"><i class="fa fa-pie-chart"></i>
    <div class="vip-slogan-text">
      <p>1000+资源，无限量下载</p>
      <p>真正的海量，无套路，诚意满满</p>
    </div>
  </li>
  <li class="vip-slogan-box"><i class="fa fa-jsfiddle " style="font-size: 60px"></i>
    <div class="vip-slogan-text">
      <p>5m/s速度，百度云极速下载</p>
      <p>本地无需备份，即需即下，无需等待</p>
    </div>
  </li>
  <li class="vip-slogan-box"><i class="fa fa-gratipay" style="font-size: 55px"></i>
    <div class="vip-slogan-text">
      <p>看上喜欢的，加入收藏</p>
      <p>文件夹式收藏，方便快捷，精确查到</p>
    </div>
  </li>
  <li class="vip-slogan-box"><i class="fa fa-vine"></i>
    <div class="vip-slogan-text">
      <p>50+原创精品，专享下载</p>
      <p>严格审核原创版权作品，VIP任性下载！</p>
    </div>
  </li>
  <li class="vip-slogan-box"><i class="fa fa-weixin"></i>
    <div class="vip-slogan-text">
      <p>全体在线客服，技术支持</p>
      <p>尊贵特权，极速响应，为你提供保障！</p>
    </div>
  </li>
  <li class="vip-slogan-box"><i class="fa fa-vimeo-square"></i>
    <div class="vip-slogan-text">
      <p>VIP标示，彰显尊贵身份</p>
      <p>点亮尊贵身份标示，散发与众不同气质</p>
    </div>
  </li>
</ul>
<div class="container">
  <article class="single-content">
    <div class="module-line"> <span class="arrow left-arrow"></span> <span class="text">VIP会员资费介绍</span> <span class="arrow right-arrow"></span>
      <div class="vip-desc">在这里，会员每月平均10个用户开通会员， 下载资源 300+份~</div>
    </div>
<?php
if (is_site_shop_open()): 
// 模块 参考来自：https://www.doupir.com/ 豆皮儿UI素材 由会员投稿
$home_mode_vip = _cao('home_vip_mod');
?>
<div class="section pt-0 pb-0">
	<div class="home-vip-mod">
		<div class="container">
	      <div class="row">
	      	<div class="col-12 col-sm-6 col-md-4 col-lg-3">
		        <div class="vip-cell vip-text">
		          <h4><i class="fa fa-gift"></i> <?php echo $home_mode_vip['title'];?></h4>
		          <p><?php echo $home_mode_vip['desc'];?></p>
		        </div>
		    </div>
			<?php foreach ( $home_mode_vip['vip_group'] as $item ) : ?>
				<div class="col-12 col-sm-6 col-md-4 col-lg-3">
			        <div class="vip-cell">
				        <?php if ($item['_tehui']) : ?>
				        <span class="tehui"><i class="fa fa-diamond"></i> <?php echo $item['_tehui'];?></span>
				        <?php endif; ?>
						<span class="time"><?php echo $item['_time'];?></span>
						<div class="price" style="color:<?php echo $item['_color'];?>"><span><?php echo _cao('site_money_ua')?></span><?php echo $item['_price'];?></div>
						<p><?php echo $item['_desc'];?></p>
						<?php if (is_user_logged_in()) : ?>
						<a href="<?php echo esc_url(home_url('/user?action=vip'));?>" class="btn-sm primary" style="background:<?php echo $item['_color'];?>"><i class="fa fa-unlink"></i> 前往开通</a>
						<?php else: ?>
						<a class="login-btn btn-sm primary" style="background:<?php echo $item['_color'];?>"><i class="fa fa-user"></i> 登录购买</a>
						<?php endif; ?>
			        </div>
			    </div>
			<?php endforeach; ?>
	      </div>
		</div>
	</div>
</div>
<?php endif; ?>
<?php get_footer(); ?>
