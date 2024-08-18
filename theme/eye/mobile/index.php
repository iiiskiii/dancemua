<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_MOBILE_PATH.'/head.php');

include_once(G5_LIB_PATH.'/thumbnail.lib.php');
?>
<!-- #region Jssor Slider Begin -->
<!-- Generator: Jssor Slider Maker -->
<!-- This code works without jquery library. -->
<?
include_once(G5_THEME_MOBILE_PATH.'/main_slider.php');
include_once(G5_THEME_MOBILE_PATH.'/link_data.php');
?>


<div class="eye_con_2">

	<ul>
		<li>
		<span class="eye_con_2_title eye_title_bg">GROUP BY SERVICE</span>
		<p class="eye_title_line"></p>
		</li>
	</ul>
	<ul class="eye_con2_li">
		<li>
			<p style="height:20px;"></p>
			<p class="eye_fa_icon_95 eye_fa_ic_c_284058"><i class="fa fa-desktop"></i></p>
			<p style="height:10px;"></p>
			<p class="eye_font_size_20 eye_fa_ic_c_284058">PC/모바일/반응형웹</p>

			<p style="height:10px;"></p>
			<p class="eye_font_size_13 eye_fa_ic_c_284058" style="background:#fff;margin:10px;padding:10px;line-height:200%;height:105px;">
				PC/모바일/반응형<BR>
				다양한 디바이스에서<BR>
				동일한 화면 구성을 볼 수<BR>
				있도록 제작해드립니다.		
			</p>

		</li>
		<li>
			<p style="height:20px;"></p>
			<p class="eye_fa_icon_85 eye_fa_ic_c_3d648a"><i class="fa fa-paint-brush" aria-hidden="true"></i></p>
			<p style="height:20px;"></p>
			<p class="eye_font_size_20 eye_fa_ic_c_3d648a">디자인 / 웹표준 준수</p>

			<p style="height:10px;"></p>
			<p class="eye_font_size_13 eye_fa_ic_c_3d648a" style="background:#fff;margin:10px;padding:10px;line-height:17px;height:105px;">
				유럽스타일의 디자인 트랜드를<BR>
				우리나라 정서에 맞게 세련된<BR>
				디자인을 제공합니다. 웹표준을<BR>
				준수하여 운영체제, 웹브라우저에<BR>
				관계없이 모두 동일한<BR>
				웹사이트를 만들 수 있습니다.
			</p>
		</li>
		<li>
			<p style="height:20px;"></p>
			<p class="eye_fa_icon_95 eye_fa_ic_c_4e88c2"><i class="fa fa-facebook-square"></i></p>
			<p style="height:10px;"></p>
			<p class="eye_font_size_20 eye_fa_ic_c_4e88c2">소셜 SNS 연동</p>

			<p style="height:10px;"></p>
			<p class="eye_font_size_13 eye_fa_ic_c_4e88c2" style="background:#fff;margin:10px;padding:10px;line-height:21px;height:105px;">
				SNS 연동 트위터, Facebook<BR>
				Instagram등 소셜네트워크<BR>
				서비스에 연동이 되어 고객과의<BR>
				소통이 원활해지는 오픈웹<BR>
				구현이 가능해집니다.
			</p>
		</li>
		<li>
			<p style="height:20px;"></p>
			<p class="eye_fa_icon_95 eye_fa_ic_c_5395d7"><i class="fa fa-cogs"></i></p>
			<p style="height:10px;"></p>
			<p class="eye_font_size_20 eye_fa_ic_c_5395d7">유지보수</p>

			<p style="height:10px;"></p>
			<p class="eye_font_size_13 eye_fa_ic_c_5395d7" style="background:#fff;margin:10px;padding:10px;line-height:35px;height:105px;">
				빠른 피드백과 함께 홈페이지에<BR>
				대한 만족도를 높이고, 회사의<BR>
				브랜드 가치를 높일 수 있습니다
			</p>
		</li>
	</ul>
</div>


<table class="eye_con_3">
<tr>
	<td>
	<ul>
		<li>
		<span class="eye_con_3_title eye_title_bg3">홈페이지 포트폴리오</span>
		<p class="eye_title_line"></p>
		</li>
	</ul>
	<ul id="eye_port_view1">
	<?
	$bo_table= 'homepage';
	$board = sql_fetch(" select * from {$g5['board_table']} where bo_table = '$bo_table' ");
	$bo_table= 'homepage';
	$query_homepage = "select * from g5_write_".$board['bo_table']." where wr_is_comment='0' order by wr_id desc limit 8";
	$result_homepage = sql_query($query_homepage);
	while($row_homepage = sql_fetch_array($result_homepage)){

		$thumb = get_list_thumbnail($board['bo_table'], $row_homepage['wr_id'], $board['bo_mobile_gallery_width'], $board['bo_mobile_gallery_height']);

		if($thumb['src']) {
			$img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" width="'.$board['bo_mobile_gallery_width'].'" height="'.$board['bo_mobile_gallery_height'].'">';
		} else {
			$img_content = '<span style="width:'.$board['bo_mobile_gallery_width'].'px;height:'.$board['bo_mobile_gallery_height'].'px">no image</span>';
		}
		$row_homepage['href'] = G5_BBS_URL.'/board.php?bo_table='.$board['bo_table'].'&wr_id='.$row_homepage['wr_id'];

		//echo $img_content;

	?>
		<li class="hover_">
		<?php echo $img_content; ?>
		<div class='eye_scr_subject'>
			<span class="eye_scr_subject_title" style="display:none;"><?php echo $row_homepage['wr_subject']; ?></span>
			<a href="<?php echo $row_homepage['href'] ?>" class="eye_scr_subject_bt2" style="display:none;color:#fff;">자세히보기</i></a>
			<a href="http://<?php echo $row_homepage['wr_1'] ?>" target="_blank" class="eye_scr_subject_bt" style="display:none;color:#fff;">바로가기</i></a>
		</div>
		</li>
	<?}?>
	</ul>
	</td>
</tr>
<tr height="50">
	<td></td>
</tr>
</table>






<table class="eye_con_4">
<tr>
	<td>
	<ul>
		<li>
		<span class="eye_con_4_title eye_title_bg4">개발의뢰건</span>
		<p class="eye_title_line"></p>
		</li>
	</ul>
	<ul id="eye_port_view1">
		<?
		$bo_table= 'makelist';
		$board = sql_fetch(" select * from {$g5['board_table']} where bo_table = '$bo_table' ");
		$bo_table= 'homepage';
		$query_homepage = "select * from g5_write_".$board['bo_table']." where wr_is_comment='0' order by wr_id desc limit 8";
		$result_homepage = sql_query($query_homepage);
		while($row_homepage = sql_fetch_array($result_homepage)){

			$thumb = get_list_thumbnail($board['bo_table'], $row_homepage['wr_id'], $board['bo_mobile_gallery_width'], $board['bo_mobile_gallery_height']);

			if($thumb['src']) {
				$img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" width="'.$board['bo_mobile_gallery_width'].'" height="'.$board['bo_mobile_gallery_height'].'">';
			} else {
				$img_content = '<span style="width:'.$board['bo_mobile_gallery_width'].'px;height:'.$board['bo_mobile_gallery_height'].'px">no image</span>';
			}
			$row_homepage['href'] = G5_BBS_URL.'/board.php?bo_table='.$board['bo_table'].'&wr_id='.$row_homepage['wr_id'];

			//echo $img_content;

		?>
			<li class="hover_">
			<?php echo $img_content; ?>
			<div class='eye_scr_subject'>
				<span class="eye_scr_subject_title" style="display:none;"><?php echo $row_homepage['wr_subject']; ?></span>
				<span class="eye_scr_subject_title2" style="display:none;">제작가격 : <?php echo number_format($row_homepage['wr_2']);?>원</span>
				<a href="<?php echo $row_homepage['href'] ?>" class="eye_scr_subject_bt2" style="display:none;color:#fff;">자세히보기</i></a>
				<a href="http://<?php echo $row_homepage['wr_1'] ?>" target="_blank" class="eye_scr_subject_bt" style="display:none;color:#fff;">바로가기</i></a>
			</div>
			</li>
		<?}?>
	</ul>
	</td>
</tr>
<tr height="50">
	<td></td>
</tr>
</table>

<?php
include_once(G5_THEME_MOBILE_PATH.'/tail.php');
?>