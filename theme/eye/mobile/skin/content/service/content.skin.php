<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$content_skin_url.'/style.css">', 0);

?>
<?
include_once(G5_THEME_MOBILE_PATH.'/sub_slider.php');
?>

<p style="height:50px;"></p>
<div class="eye_con_title"><?php echo $g5['title']; ?></div>

<div class="eye_con_2">
	<ul class="eye_con2_li">
		<li>
			<p style="height:20px;"></p>

			<p class="eye_fa_icon_95 eye_fa_ic_c_284058"><i class="fa fa-desktop"></i></p>
			<p style="height:10px;"></p>
			<p class="eye_font_size_20 eye_fa_ic_c_284058">PC/모바일/반응형웹</p>

			<p style="height:10px;"></p>
			<p class="eye_font_size_13 eye_fa_ic_c_284058" style="background:#fff;margin:10px;padding:10px;line-height:200%;height:105px;">
				웹/모바일/반응형<BR>
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

<article id="ctt" class="ctt_<?php echo $co_id; ?>">
    <div id="ctt_con">
		<span id="eye_con_mobile" style="display:none;"><?php echo $str_mobile; ?></span>
		<span id="eye_con_pc"><?php echo $str_pc; ?></span>
    </div>
</article>


<?
include_once(G5_THEME_MOBILE_PATH.'/link_data.php');
?>
