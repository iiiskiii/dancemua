<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$list_skin_url.'/list.css">', 0);

// 링크 동영상 출력안함
$is_plyr = (isset($boset['plyr_use']) && $boset['plyr_use']) ? false : true;

// plyr 컨트롤러 호버
$is_plyr_hover = (isset($boset['plyr_hover']) && $boset['plyr_hover']) ? false : true;

// NO 이미지
$no_img = (isset($boset['no_img']) && $boset['no_img']) ? na_url($boset['no_img']) : G5_THEME_URL.'/img/no_image.gif';

// 썸네일 및 이미지 비율
$thumb_w = (isset($boset['thumb_w']) && (int)$boset['thumb_w'] >= 0) ? (int)$boset['thumb_w'] : 400;
$thumb_h = (isset($boset['thumb_h']) && (int)$boset['thumb_h'] >= 0) ? (int)$boset['thumb_h'] : 300;

// 목록 가로수
$cols = array();
$cols[] = (isset($boset['list_xs']) && (int)$boset['list_xs'] > 0) ? 'row-cols-'.$boset['list_xs'] : 'row-cols-1';
$cols[] = (isset($boset['list_sm']) && (int)$boset['list_sm'] > 0) ? 'sm-'.$boset['list_sm'] : 'sm-2';
$cols[] = (isset($boset['list_md']) && (int)$boset['list_md'] > 0) ? 'md-'.$boset['list_md'] : 'md-3';
$cols[] = (isset($boset['list_lg']) && (int)$boset['list_lg'] > 0) ? 'lg-'.$boset['list_lg'] : 'lg-3';
$cols[] = (isset($boset['list_xl']) && (int)$boset['list_xl'] > 0) ? 'xl-'.$boset['list_xl'] : 'xl-4';
$cols[] = (isset($boset['list_xxl']) && (int)$boset['list_xxl'] > 0) ? 'xxl-'.$boset['list_xxl'] : 'xxl-4';
$list_cols = implode(' row-cols-', $cols);

// 목록수
$list_cnt = count($list);
?>
<style>
#bo_list .ratio { --bs-aspect-ratio: <?php echo na_img_ratio($thumb_w, $thumb_h, 75) ?>%; overflow:hidden; }
</style>
<section id="bo_list" class="line-top mb-2">
	<?php if($notice_count) { // 공지 ?>
		<ul class="list-group list-group-flush border-bottom">
		<?php
		for ($i=0; $i < $list_cnt; $i++) {

			if (!$list[$i]['is_notice'])
				break;

			$row = $list[$i];

			// 유뷰트 동영상(wr_9)
			$vinfo = na_check_youtube($row['wr_9']);

			// 이미지(wr_10)
			$img = na_check_img($row['wr_10']);

			//아이콘 체크
			$wr_icon = '';
			if (isset($row['icon_new']) && $row['icon_new'])
				$wr_icon .= '<span class="na-icon na-new"></span>'.PHP_EOL;

			if (isset($row['icon_secret']) && $row['icon_secret'])
				$wr_icon .= '<span class="na-icon na-secret"></span>'.PHP_EOL;

			if (isset($row['icon_hot']) && $row['icon_hot'])
				$wr_icon .= '<span class="na-icon na-hot"></span>'.PHP_EOL;

			if ($vinfo['vid']) {
				$wr_icon .= '<span class="na-icon na-video"></span>'.PHP_EOL;
			} else if ($img) {
				$wr_icon .= '<span class="na-icon na-image"></span>'.PHP_EOL;
			} else if (isset($row['icon_file']) && $row['icon_file']) {
				$wr_icon .= '<span class="na-icon na-file"></span>'.PHP_EOL;
			} else if (isset($row['icon_link']) && $row['icon_link']) {
				$wr_icon .= '<span class="na-icon na-link"></span>'.PHP_EOL;
			}

			// 잠긴글, 공지글, 현재글 스타일
			$li_css = '';
			if ($row['wr_7'] == 'lock') { // 잠금(wr_7)
				$li_css = '';
				$row['subject'] = '<span class="text-decoration-line-through">'.$row['subject'].'</span>';
				$row['num'] = '<span class="orangered">잠금</span>';
			} else if ($wr_id == $row['wr_id']) { // 열람
				$li_css = ' bg-body-tertiary';
				$row['subject'] = '<b class="text-primary fw-medium">'.$row['subject'].'</b>';
				$row['num'] = '<span class="orangered">열람</span>';
			} else if ($row['is_notice']) { // 공지
				$li_css = ' bg-body-tertiary';
				$row['subject'] = '<strong class="fw-medium">'.$row['subject'].'</strong>';
				$row['num'] = '<span class="orangered">공지</span>';
			}

			// 이미지 미리보기
			// $img_popover = (!G5_IS_MOBILE && $img) ? ' data-bs-toggle="popover-img" data-img="'.na_thumb($img, 400, 225).'"' : '';
			$img_popover = '';
		?>
			<li class="list-group-item<?php echo $li_css ?>">

				<div class="d-flex align-items-center gap-1">
					<div class="wr-num text-nowrap pe-2">
						<?php echo $row['num'] ?>
					</div>
					<?php if ($is_checkbox) { ?>
						<div>
							<input class="form-check-input me-1" type="checkbox" name="chk_wr_id[]" value="<?php echo $row['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
							<label for="chk_wr_id_<?php echo $i ?>" class="visually-hidden">
								<?php echo $row['subject'] ?>
							</label>
						</div>
					<?php } ?>
					<div class="flex-grow-1">
						<a href="<?php echo $row['href'] ?>"<?php echo $img_popover ?>>
							<?php if($row['icon_reply']) { ?>
								<i class="bi bi-arrow-return-right"></i>
								<span class="visually-hidden">답변</span>
							<?php } ?>
							<?php echo $row['subject']; // 제목 ?>
						</a>

						<?php if (!$sca && $is_category && $row['ca_name']) { ?>
							<a href="<?php echo $row['ca_name_href'] ?>" class="badge text-body-tertiary px-1">
								<?php echo $row['ca_name'] ?>
								<span class="visually-hidden">분류</span>
							</a>
						<?php } ?>

						<?php echo $wr_icon; ?>

						<?php if($row['wr_comment']) { ?>
								<span class="visually-hidden">댓글</span>
								<span class="count-plus orangered">
									<?php echo $row['wr_comment'] ?>
								</span>
						<?php } ?>
					</div>
					<div class="wr-num text-nowrap ps-2 d-none d-sm-block">
						<?php echo na_date($row['wr_datetime'], 'orangered', 'H:i', 'm.d', 'Y.m.d') ?>
						<span class="visually-hidden">등록</span>
					</div>
				</div>

			</li>
		<?php } ?>
	</ul>
	<?php } // Notice ?>

	<div class="p-3">
		<div class="row g-3 <?php echo $list_cols ?> plyr-gallery">
			<?php
			for ($i=0; $i < $list_cnt; $i++) {

				// 공지 통과
				if ($list[$i]['is_notice'])
					continue;

				$row = $list[$i];

				// 유뷰트 동영상(wr_9)
				$vinfo = na_check_youtube($row['wr_9']);

				// 이미지(wr_10)
				$img = na_check_img($row['wr_10']);
				$img = $img ? na_thumb($img, $thumb_w, $thumb_h) : $no_img;

				//아이콘 체크
				$wr_icon = '';
				if (isset($row['icon_new']) && $row['icon_new'])
					$wr_icon .= '<span class="na-icon na-new"></span>'.PHP_EOL;

				if (isset($row['icon_secret']) && $row['icon_secret'])
					$wr_icon .= '<span class="na-icon na-secret"></span>'.PHP_EOL;

				if (isset($row['icon_hot']) && $row['icon_hot'])
					$wr_icon .= '<span class="na-icon na-hot"></span>'.PHP_EOL;

				if ($vinfo['vid']) {
					$wr_icon .= '<span class="na-icon na-video"></span>'.PHP_EOL;
				} else if ($img) {
					$wr_icon .= '<span class="na-icon na-image"></span>'.PHP_EOL;
				} else if (isset($row['icon_file']) && $row['icon_file']) {
					$wr_icon .= '<span class="na-icon na-file"></span>'.PHP_EOL;
				} else if (isset($row['icon_link']) && $row['icon_link']) {
					$wr_icon .= '<span class="na-icon na-link"></span>'.PHP_EOL;
				}

				// 잠긴글, 공지글, 현재글 스타일
				$label_band = '';
				if ($row['wr_7'] == 'lock') { // 잠금(wr_7)
					$label_band = 'LOCK';
					$row['subject'] = '<span class="text-decoration-line-through">'.$row['subject'].'</span>';
				} else if ($wr_id == $row['wr_id']) { // 열람
					$label_band = 'NOW';
					$row['subject'] = '<b class="text-primary fw-medium">'.$row['subject'].'</b>';
				}


				$is_vimg = false;

				if($list[$i]['wr_link1']) {
					$vimg = na_video_info(trim(strip_tags($list[$i]['wr_link1'])));
					if(in_array($vimg['type'], array("youtube", "vimeo"))){
						$is_vimg = true;
					}
				}

				preg_match_all("/{(동영상|video)\:([^}]*)}/is", $list[$i]['wr_content'], $match);
				$vimgs = (isset($match[2]) && is_array($match[2])) ? $match[2] : array();
				if($vimgs[0]){
					$vimg = na_video_info(trim(strip_tags($vimgs[0])));
					if(in_array($vimg['type'], array("youtube", "vimeo"))){
						$is_vimg = true;
					}
				}

			?>
				<div class="col <?php echo ($is_plyr && $is_plyr_hover)?' is_hover':'';?>">

					<div class="card h-100">

						<?php if($is_plyr){ ?>
						<div class="img-wrap" style="padding-bottom:<?php echo round(($thumb_h / $thumb_w) * 100, 3) ?>%;">
							<div class="img-item">
								<a href="<?php echo $is_vimg?'javascript:;':$row['href']; ?>">
								<?php
								if($is_vimg){
									echo '<div class="vidiom_player" data-plyr-provider="'.$vimg['type'].'" data-plyr-embed-id="'.$vimg['vid'].'"></div>';
									/*
									$vimg['iframe']을 사용할 경우 아래 vidiom_player스크립트 삭제
									/theme/Marigold/js/nariya.js에 plyr_player 정의되어있음.
									*/
									//echo $vimg['iframe'];
								}else{
									echo '<img src="'.$img.'" class="object-fit-cover" alt="'.str_replace('"', '', get_text($row['wr_subject'])).'">';
								}
								?>
								<?php if($label_band) { ?>
									<div class="label-band text-bg-danger"><?php echo $label_band ?></div>
								<?php } ?>
								</a>
							</div>
						</div>
						<?php }else{ ?>
						<a href="<?php echo $row['href'] ?>" class="position-relative overflow-hidden">
							<div class="ratio card-img-top">
								<img src="<?php echo $img ?>" class="object-fit-cover" alt="<?php echo str_replace('"', '', get_text($row['wr_subject'])) ?>">
							</div>
							<?php if($label_band) { ?>
								<div class="label-band text-bg-danger"><?php echo $label_band ?></div>
							<?php } ?>
						</a>
						<?php } ?>

						<?php if ($is_checkbox) { ?>
							<div class="position-absolute top-0 start-0 p-2 z-1">
								<input class="form-check-input" type="checkbox" name="chk_wr_id[]" value="<?php echo $row['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
								<label for="chk_wr_id_<?php echo $i ?>" class="visually-hidden">
								<?php echo $row['subject'] ?>
								</label>
							</div>
						<?php } ?>

						<div class="card-body d-flex align-items-start flex-column">
							<div class="card-title">
								<a href="<?php echo $row['href'] ?>">
									<?php echo $row['subject'] ?>
								</a>

								<?php if (!$sca && $is_category && $row['ca_name']) { ?>
									<a href="<?php echo $row['ca_name_href'] ?>" class="badge text-body-tertiary px-1">
										<?php echo $row['ca_name'] ?>
										<span class="visually-hidden">분류</span>
									</a>
								<?php } ?>

								<?php echo $wr_icon; ?>

								<?php if($row['wr_comment']) { ?>
									<span class="visually-hidden">댓글</span>
									<span class="count-plus orangered">
										<?php echo $row['wr_comment'] ?>
									</span>
								<?php } ?>

							</div>
							<div class="mt-auto w-100 pt-1">
								<div class="d-flex align-items-end small wr-num text-nowrap gap-2">
									<div>
										<i class="bi bi-eye"></i>
										<?php echo $row['wr_hit'] ?>
										<span class="visually-hidden">조회</span>
									</div>
									<?php if($is_good) { ?>
										<div>
											<i class="bi bi-hand-thumbs-up"></i>
											<?php echo $row['wr_good'] ?>
											<span class="visually-hidden">추천</span>
										</div>
									<?php } ?>
									<div class="ms-auto">
										<?php echo na_date($row['wr_datetime'], 'orangered', 'H:i', 'm.d', 'Y.m.d') ?>
										<span class="visually-hidden">등록</span>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>

			<?php } ?>
		</div>
		<?php if ($list_cnt - $notice_count === 0) { ?>
			<div class="text-center py-5">
				게시물이 없습니다.
			</div>
		<?php } ?>
	</div>

</section>

<script>
// vidiom_player
$(function(){
	const vidiom_player = Plyr.setup( '.vidiom_player', {
		controls: [
		  'play-large',		// 중앙에 있는 큰 재생 버튼
		  //'restart',		// 재생 다시 시작
		  //'rewind',		// 탐색 시간(기본 10초)으로 되감기
		  //'fast-forward',	// 탐색 시간(기본 10초)으로 빨리 감기
		  'play',			// 재생/일시 정지
		  'progress',		// 재생 및 버퍼링을 위한 진행률 막대와 스크러버
		  'current-time',	// 현재 재생 시간
		  //'duration',		// 미디어의 전체 길이
		  'mute',			// 음소거 토글
		  //'volume',		// 볼륨 조절
		  'captions',		// 자막 토글
		  //'settings',		// 설정 메뉴
		  'pip',			// 화면 속 화면(현재 Safari만 해당)
		  'airplay',		// Airplay(현재 Safari만 해당)
		  //'download',		// 현재 소스 또는 옵션에서 지정한 사용자 지정 URL로 연결되는 다운로드 버튼 표시
		  'fullscreen',		// 전체 화면 토글
		],
		disableContextMenu: true,
		quality: true
	});

	//var vidiom_player = new Plyr('.vidiom_player', {captions: {active: true}});

	if( vidiom_player ){
		vidiom_player.forEach(( player, index ) =>
			player.on("play", () =>
				vidiom_player
				.filter((p, i) => i !== index)
				.forEach((p) => p.pause())
			)
		);
	}
});
</script>
