<?php
$sucaihu_ui_float_hongbao = _cao('sucaihu_ui_float_hongbao');
$sucaihu_ui_float_kefu = _cao('sucaihu_ui_float_kefu');
$sucaihu_ui_float_diylj = _cao('sucaihu_ui_float_diylj');
$sucaihu_ui_float_full = _cao('sucaihu_ui_float_full');
$sucaihu_ui_float_tgzq = _cao('sucaihu_ui_float_tgzq');
$sucaihu_ui_float_blog = _cao('sucaihu_ui_float_blog');
?>
<!--跟随样式开始-->
<link rel="stylesheet" href="//at.alicdn.com/t/font_1691494_rmmzr5cl9bk.css"  type='text/css' media='all'>
<div class="rightList bar-v2">
    <ul class="sidebar">
    	
    	<?php if ($sucaihu_ui_float_hongbao['bgimg']) : ?>
        <li class="vip">
            <a href="/user?action=charge" target="_blank" data-block="666" data-position="1">
                <i class="iconfont iconhuiyuan"></i>
                <span>特惠红包</span>
                <div class="left-box">
                    <img src="<?php echo esc_url( @$sucaihu_ui_float_hongbao['bgimg'] ); ?>" alt="">
                </div>
            </a>
        </li>
        <?php endif; ?>
        <?php if (_cao('sucaihu_ui_float_kefu_open')) : ?>
        <?php if (_cao('sucaihu_ui_float_kefu')) : ?>
        <li class="customer-service">
            <a class="custom-w" data-block="666" data-position="4" data-ext-mark="custom-03">
                <i class="iconfont iconkefu"></i>
                <span>客服</span>
            </a>
            <div class="service-box">
                <div class="service-con" style="background-image:linear-gradient(120deg,#448aff 0,#18cef2 100%); color:#fff;">
                	
                	<?php if ($sucaihu_ui_float_kefu['sucaihu_ui_float_kfqun']) : ?>
                    <a href="<?php echo $title = ($sucaihu_ui_float_kefu['sucaihu_ui_float_kfqun']); ?>" target="_blank" rel="nofollow">
                        所有客服联系方式
                        <i class="iconfont icon-cebianlan"></i>
                    </a>
                    <?php endif; ?>
                    
                    <?php if ($sucaihu_ui_float_kefu['sucaihu_ui_float_kffaq']) : ?>
                    <a data-ext-mark="custom-01" href="<?php echo $title = ($sucaihu_ui_float_kefu['sucaihu_ui_float_kffaq']); ?>" target="_blank">
                        常见问题 FAQ
                        <i class="iconfont icon-cebianlan"></i>
                    </a>
                    <?php endif; ?>
                    
                    <?php if ($sucaihu_ui_float_kefu['sucaihu_ui_float_kfqq']) : ?>
                    <div class="custom-box">
                        <p>在线客服</p>
                        <a data-ext-mark="custom-02" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $title = ($sucaihu_ui_float_kefu['sucaihu_ui_float_kfqq']); ?>&site=qq&menu=yes" rel="nofollow"
                        class="btn-contact custom-w" style="color: #448aff;">
                            点我联系
                        </a>
                    </div>
                    <?php endif; ?>
                    <?php if ($sucaihu_ui_float_kefu['sucaihu_ui_float_zxsm']) : ?>
                    <div class="custom-tel">
                        <p>
                            <?php echo $title = ($sucaihu_ui_float_kefu['sucaihu_ui_float_zxsm']); ?>
                        </p>
                    </div>
                    <?php endif; ?>
                    <?php if ($sucaihu_ui_float_kefu['sucaihu_ui_float_gzsj']) : ?>
                    <div class="custom-tel">
                        <p>
                            工作时间: <?php echo $title = ($sucaihu_ui_float_kefu['sucaihu_ui_float_gzsj']); ?>
                        </p>
                    </div>
                    <div class="custom-tel">
                        <p>
                            点击“投稿”前请先登入
                        </p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </li>
        <?php endif; ?>
		<?php endif; ?>
        <?php if ($sucaihu_ui_float_tgzq['sucaihu_ui_float_tgzq_url']) : ?>
        <li class="recruit">
            <a href="<?php echo $title = ($sucaihu_ui_float_tgzq['sucaihu_ui_float_tgzq_url']); ?>" rel="nofollow" data-block="666"
            data-position="8" target="_blank">
                <i class="iconfont foot_btn f_f iconjiahao"></i>
                <span>投稿<br>赚钱</span>
            </a>
        </li>
        <?php endif; ?>
        <?php if (_cao('site_list_style','default') =='default'  && _cao('sucaihu_ui_float_blog','1')) : $_bid = (is_cao_site_list_blog()) ? 1 : 0 ; ?>
        <li class="twinkle-point">
            <a class="rollbar-item tap-blog-style" etap="tap-blog-style" data-id="<?php echo $_bid; ?>" title="博客模式">
                <i class="iconfont iconblog"></i>
                <span>博客<br>模式</span>
            </a>
        </li>
        <?php endif; ?>
        <?php if (_cao('sucaihu_ui_float_qiandao')) : ?>
        <li class="sign-in user-sign-in ">
            <a class="click-qiandao" href="javascript:void(0);" etap="to_top" title="打卡签到">
                <i class="iconfont iconqiandao"></i>
                <span>签到</span>
            </a>
        </li>
        <?php endif; ?>
		<?php if ($sucaihu_ui_float_diylj['sucaihu_ui_float_diy_url']) : ?>
        <li class="twinkle-point">
            <a href="<?php echo $title = ($sucaihu_ui_float_diylj['sucaihu_ui_float_diy_url']); ?>" class="update-log" id="update-log-click" data-block="666" data-position="6" target="_blank">
                <i class="iconfont icongengxin"></i>
                <span>更新<br>日历</span>
            </a>
        </li>
        <?php endif; ?>
        
        <?php if (_cao('sucaihu_ui_float_dark')) : ?>
        <li class="twinkle-point">
            <a class="rollbar-item tap-dark" href="javascript:void(0);" etap="tap-dark" title="夜间模式">
                <i class="iconfont iconbrightness-half"></i>
                <span>暗黑<br>模式</span>
            </a>
        </li>
        <?php endif; ?>
        
        <?php if (_cao('sucaihu_ui_float_full')) : ?>
        <li class="client">
            <a class="float-border float-text" href="javascript:void(0);" etap="to_full" title="点击全屏">
                <i class="iconfont iconquanping"></i>
                <span>全屏</span>
            </a>
        </li>
        
        <?php endif; ?>
    </ul>
    <div class="rollbar">
	    <div class="Top" style="display: block;"  etap="to_top" title="返回顶部">
	        <i class="iconfont icontop"></i>
	        <span class="common-gradient"></span>
	    </div>
    </div>
</div>
<?php if (_cao('sucaihu_ui_float_wapqq')) : ?>
<!--手机QQ跟随-->
<div class="suspend">
	<dl>
		<a href="mqqwpa://im/chat?chat_type=wpa&uin=<?php echo $title = ($sucaihu_ui_float_kefu['sucaihu_ui_float_kfqq']); ?>&version=1&src_type=web&web_src=sucaihu"></a>
	</dl>
</div>
<!--手机QQ跟随-->
<?php endif; ?>

<?php if (_cao('sucaihu_ui_float_wap1')) : ?>
<!--手机跟随样式1-->
<div id="foot-memu" class="aini_foot_nav">
  <ul>
    <li>
      <a href="/" class="foothover">
        <i class="nohover iconfont iconhome_light"></i>
        <p>首页</p>
      </a>
    </li>
    <li>
      <a class="click-qiandao" href="javascript:void(0);" etap="to_top" title="打卡签到">
        <i class="nohover iconfont iconqiandao"></i>
        <p>签到</p>
      </a>
    </li>
    <li class="aini_zjbtn">
      <a href="<?php echo $title = ($sucaihu_ui_float_tgzq['sucaihu_ui_float_tgzq_url']); ?>" rel="nofollow" data-block="666" data-position="8" target="_blank">
        <em class="bg_f b_ok"></em>
        <span class="bg_f">
          <i class="iconfont foot_btn f_f iconjiahao"></i>
        </span>
      </a>
    </li>
    <li>
      <a class="rollbar-item tap-dark" href="javascript:void(0);" etap="tap-dark" title="夜间模式">
        <i class="nohover iconfont iconbrightness-half"></i>
        <p>切换</p>
      </a>
    </li>
    <li>
      <a href="http://kedouwu.xyz/lxfs/">
        <i class="nohover iconfont iconkefu"></i>
        <p>客服</p>
      </a>
    </li>
  </ul>
</div>
<!--手机跟随样式1-->
<?php endif; ?>
<!--跟随样式结束-->