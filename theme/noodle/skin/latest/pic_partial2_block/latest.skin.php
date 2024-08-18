<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
$thumb_width = 400;
$thumb_height = 266;
$list_count = (is_array($list) && $list) ? count($list) : 0;

$is_partial = false;
?>

<div class="pic_partial_lt">
    <h2 class="lat_title"><a href="<?php echo get_pretty_url($bo_table); ?>"><?php echo $bo_subject ?></a></h2>
    <ul>
		<?php
		for ($i=0; $i<$list_count; $i++) {
			$thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

			if($thumb['src']) {
				$img = $thumb['src'];
			} else {
				$img = G5_IMG_URL.'/no_img.png';
				$thumb['alt'] = '이미지가 없습니다.';
			}
			$img_content = '<img width="400" height="266" src="'.$img.'" alt="'.$thumb['alt'].'" >';
			$wr_href = get_pretty_url($bo_table, $list[$i]['wr_id']);
		?>
        <li class="galley_li">
			<section class="<?php echo $is_partial?'reduced':'no-preference';?>" style="margin-bottom:20px;">
				<figure class="card">
					<a href="<?php echo $wr_href; ?>"><?php echo run_replace('thumb_image_tag', $img_content, $thumb); ?></a>
					<figcaption>
						<h2><a href="<?php echo $wr_href; ?>"><?php echo $list[$i]['subject'];?></a></h2>
						<p><a href="<?php echo $wr_href; ?>"><?php echo utf8_strcut(strip_tags($list[$i]['wr_content']), 100, '..'); ?></a></p>
					</figcaption>
				</figure>
			</section>
        </li>
		<?php }  ?>
		<?php if ($list_count == 0) { //게시물이 없을 때  ?>
		<li class="empty_li">게시물이 없습니다.</li>
		<?php }  ?>
    </ul>
    <a href="<?php echo get_pretty_url($bo_table); ?>" class="lt_more"><span class="sound_only"><?php echo $bo_subject ?></span>더보기</a>

</div>
