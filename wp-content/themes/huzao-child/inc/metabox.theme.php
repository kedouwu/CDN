
<?php
/*
Plugin Name: 文章发布功能
Plugin URI: https://www.sucaihu.com
Description: 为RIPRO主题文章增加版本，文章类型
Author: 素材虎
Version: 1.9
Author URI:https://www.sucaihu.com
*/ 
add_action( 'after_setup_theme', 'jopt_ver' );
function jopt_ver() 
{
	$prefix_post_opts = '_cao_single_mole';
	CSF::createMetabox($prefix_post_opts, array( 'title' => '<span class="badge badge-radius badge-primary">素材虎</span>文章类型', 'post_type' => 'post', 'data_type' => 'unserialize', 'priority' => 'high', ));
	CSF::createSection($prefix_post_opts, array( 'fields' => array( array( 'id' => 'post_style_art', 'type' => 'radio', 'title' => '文章类型', 'inline' => true, 'options' => array( 'yuanc' => '原创', 'zhuanz' => '投稿', 'jinhua' => '精华', 'tuijian' => '推荐', 'yiceshi' => '已验证', 'daice' => '待验证', 'tejia' => '特惠','zhongc' => '众筹', ), 'desc' => '选择类型，或展示在首页，文章页，不需要则不用选择', ), ), ));
}
?>