<?php
/*!
 *@name     server.php
 *@project  jquery.barrager.js
 *@des      RiPro弹幕插件服务端
 *@author   Ernie
 *@url      www.sucaihu.com
*/
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-includes/wp-db.php');
$list = $wpdb->get_results("SELECT * FROM $paylog_table_name WHERE status =1 ORDER BY pay_time DESC limit 10");
$mode = intval($_GET['mode']);
$barrages = array();
foreach ($list as $value) {
  $info = substr_replace(get_user_by('id', $value->user_id)->user_login, '**', '2') . " 刚刚下载了 " . mb_substr(get_the_title($value->post_id), 0, 8);
  $img = str_replace('http:', 'https:', get_user_meta($value->user_id)['user_custom_avatar'][0]);
  $href = get_permalink($value->post_id);
  $new = array(
    'info'   => $info,
    'img'   => $img,
    'href'   => $href,
    'speed'   => 15,
    'color'  =>  '#fff',
    'bottom'  => 70,
    'close'  => false
  );
  array_push($barrages, $new);
};
if ($mode === 1) {
  echo json_encode($barrages[array_rand($barrages)]);
} elseif ($mode === 2) {
  echo json_encode($barrages);
}
