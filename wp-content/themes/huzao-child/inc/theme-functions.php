
<?php
/**
* [dimox_breadcrumbs 面包屑导航]
* @Author   Dadong2g
* @DateTime 2019-10-25T20:59:35+0800
* @return   [type]                   [修复附件页面报错问题]修复快讯报错
*/ function sucaihu_breadcrumbs() 
{
	global $post;
	if (is_single() && !_cao('is_archive_crumbs') && !is_attachment()) 
	{
		$categorys = get_the_category();
		$category = $categorys[0];
		return '当前位置：<a href="'.get_bloginfo('url').'">'.get_bloginfo('name').'</a> <small>></small> '.is_wp_error($cat_parents=get_category_parents($category->term_id, true, ' <small>></small> ')?"":$cat_parents).get_the_title();
	}
	elseif (is_attachment()) 
	{
		$parent = get_post($post->post_parent);
		$cat = get_the_category($parent->ID);
		if (!$cat) 
		{
			return false;
		}
		$cat = $cat[0];
		return '当前位置：<a href="'.get_bloginfo('url').'">'.get_bloginfo('name').'</a> <small>></small> '.get_category_parents($cat->term_id, true, ' <small>></small> ').get_the_title();
	}
	else
	{
		return false;
	}
}
function yuanchuang()
{
	$ymetaValue = get_post_meta(get_the_ID(), "post_style_art", true);
	if ($ymetaValue=="yuanc") 
	{
		echo '<div class="free-theme-tag">原创</div>';
	}
	elseif ($ymetaValue=="tuijian") 
	{
		echo '<div class="free-theme-tag">推荐</div>';
	}
	elseif ($ymetaValue=="zhuanz") 
	{
		echo '<div class="free-theme-tag">投稿</div>';
	}
	elseif ($ymetaValue=="jinhua") 
	{
		echo '<div class="free-theme-tag">精华</div>';
	}
	elseif ($ymetaValue=="yiceshi") 
	{
		echo '<div class="free-theme-tag">已验证</div>';
	}
	elseif ($ymetaValue=="daice") 
	{
		echo '<div class="free-theme-tag">未验证</div>';
	}
	elseif ($ymetaValue=="tejia") 
	{
		echo '<div class="free-theme-tag">特惠</div>';
	}
	elseif ($ymetaValue=="zhongc") 
	{
		echo '<div class="free-theme-tag">众筹</div>';
	}
}
?>