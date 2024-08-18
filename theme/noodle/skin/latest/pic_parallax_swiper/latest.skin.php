<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css">', 0);
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);

$thumb_width = 600;
$thumb_height = 400;
$list_count = (is_array($list) && $list) ? count($list) : 0;

// 글내용길이 설정
$content_txt = 70;
?>

<div class="pic_parallax_swiper_lt">
	<!-- partial:index.partial.html -->
	<div class="swiper-container main-slider loading">
		<div class="swiper-wrapper">

			<?php
			$swiper_slide_div = '';
			for ($i=0; $i<$list_count; $i++) {
				$thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

				if($thumb['src']) {
					$img = $thumb['src'];
				} else {
					$img = G5_IMG_URL.'/no_img.png';
					$thumb['alt'] = '이미지가 없습니다.';
				}
				$img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" >';
				$wr_href = get_pretty_url($bo_table, $list[$i]['wr_id']);

				$swiper_slide_div .= '<div class="swiper-slide">
					<figure class="slide-bgimg" style="background-image:url('.run_replace('thumb_image_tag', $img, $thumb).')">
						<img src="'.run_replace('thumb_image_tag', $img, $thumb).'" class="entity-img" />
					</figure>
					<div class="content">
						<!-- <p class="title">'.$list[$i]['subject'].'</p> -->
					</div>
				</div>';

			?>
			<div class="swiper-slide">
				<figure class="slide-bgimg" style="background-image:url('<?php echo run_replace('thumb_image_tag', $img, $thumb); ?>')">
					<img src="<?php echo run_replace('thumb_image_tag', $img, $thumb); ?>" class="entity-img" />
				</figure>
				<div class="content">
					<!-- <p class="title"><?php echo $list[$i]['subject'];?></p> -->
					<span class="caption"><?php // echo cut_str(strip_tags($list[$i]['wr_content']), $content_txt)?></span>
				</div>
			</div>
			<?php }  ?>
			<?php if ($list_count == 0) { //게시물이 없을 때  ?>
			<div class="swiper-slide">
				<figure class="slide-bgimg" style="background-image:url('https://assets.codepen.io/1462889/sl1.jpg')">
					<img src="https://assets.codepen.io/1462889/sl1.jpg" class="entity-img" />
				</figure>
			</div>
			<?php }  ?>
		</div>
		<!-- If we need navigation buttons -->
		<div class="swiper-button-prev swiper-button-white"></div>
		<div class="swiper-button-next swiper-button-white"></div>
	</div>

	<!-- Thumbnail navigation -->
	<div class="swiper-container nav-slider loading">
		<div class="swiper-wrapper" role="navigation">
			<?php echo $swiper_slide_div;?>
		</div>
	</div>
	<!-- partial -->
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/js/swiper.min.js'></script>
<script  src="<?php echo $latest_skin_url;?>/script.js"></script>
