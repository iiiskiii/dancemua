<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$content_skin_url.'/style.css">', 0);

?>
<?
include_once(G5_THEME_MOBILE_PATH.'/sub_slider.php');
?>

<article id="ctt" class="ctt_<?php echo $co_id; ?>">
	<div class="eye_con_title"><?php echo $g5['title']; ?></div>
    <div id="ctt_con">
		<span id="eye_con_mobile" style="display:none;"><?php echo $str_mobile; ?></span>
		<span id="eye_con_pc"><?php echo $str_pc; ?></span>
    </div>
</article>

