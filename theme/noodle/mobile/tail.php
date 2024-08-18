<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
    </div>
</div>

<hr>

<?php echo poll('theme/basic'); // 설문조사 ?>

<hr>

<div id="ft">
    <div id="ft_info">
        <div id="ft_company" class="col-xs-6 col-sm-6 col-md-3 ft_div">
            <h2>MANCEMUA정보</h2>
            <!-- <p class="ft_info">TEL. 00-000-0000 <br>FAX. 00-000-0000 <br>서울 강남구 강남대로 1 <br>
            대표:홍길동 <br>사업자등록번호:000-00-00000 <br> 개인정보관리책임자:홍길동</p> -->
			<!--
			<p class="ft_info">공연문의 : 아트디렉터 서미교<br/>
				TEL.<a href="tel:<?=$default['de_admin_company_tel']? $default['de_admin_company_tel'] : '010-4105-0087'?>">010-4105-0087  <i class="fa fa-angle-right"></i></a><br/>
			-->
				<a href="http://www.dancemua.com" target="_blank">www.dancemua.com  <i class="fa fa-angle-right"></i></a><br/>
				<!-- <a href="http://www.dancemua.co.kr" target="_blank">www.dancemua.co.kr  <i class="fa fa-angle-right"></i></a><br/> -->
				<!-- <a href="http://www.dancemua.net" target="_blank">www.dancemua.net  <i class="fa fa-angle-right"></i></a></p> -->
        </div>
        <div id="ft_link" class="col-xs-6 col-sm-6 col-md-3 ft_div">
            <h2>링크 바로가기</h2>
            <ul>
				<?php
					$sql = " select *
                            from {$g5['menu_table']}
                            where me_mobile_use = '1'
                              and length(me_code) = '2'
                            order by me_order, me_id ";
					$result = sql_query($sql, false);
					for($i=0; $row=sql_fetch_array($result); $i++) {
				?>
						<li><a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>"><?php echo $row['me_name'] ?>  <i class="fa fa-angle-right"></i></a></li>
				<?php } ?>

                <!-- <li><a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=privacy">개인정보취급방침  <i class="fa fa-angle-right"></i></a></li>
                <li><a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=provision">서비스이용약관  <i class="fa fa-angle-right"></i></a></li>
                <li><a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=contact">찾아오시는 길 <i class="fa fa-angle-right"></i></a></li> -->
            </ul>  
        </div>
        <div id="ft_search" class="col-xs-6 col-sm-6 col-md-3 ft_div">
            <h2>사이트 내 전체검색</h2>
            <form name="fsearchbox" action="<?php echo G5_BBS_URL ?>/search.php" onsubmit="return fsearchbox_submit(this);" method="get">
            <input type="hidden" name="sfl" value="wr_subject||wr_content">
            <input type="hidden" name="sop" value="and">
            <input type="text" name="stx" id="sch_stx" placeholder="검색어(필수)" required class="required" maxlength="20">
            <input type="submit" value="검색" id="sch_submit">
            </form>

            <script>
            function fsearchbox_submit(f)
            {
                if (f.stx.value.length < 2) {
                    alert("검색어는 두글자 이상 입력하십시오.");
                    f.stx.select();
                    f.stx.focus();
                    return false;
                }

                // 검색에 많은 부하가 걸리는 경우 이 주석을 제거하세요.
                var cnt = 0;
                for (var i=0; i<f.stx.value.length; i++) {
                    if (f.stx.value.charAt(i) == ' ')
                        cnt++;
                }

                if (cnt > 1) {
                    alert("빠른 검색을 위하여 검색어에 공백은 한개만 입력할 수 있습니다.");
                    f.stx.select();
                    f.stx.focus();
                    return false;
                }

                return true;
            }
            </script>
			<br/>
			<?php if ($is_member) {  ?>
				<?php if ($is_admin) {  ?>
				<li><a href="<?php echo G5_ADMIN_URL ?>"><b>관리자</b>  <i class="fa fa-angle-right"></i></a></li>
				<?php }  ?>
				<li><a href="<?php echo G5_BBS_URL ?>/logout.php">로그아웃  <i class="fa fa-angle-right"></i></a></li>
			<?php } else {  ?>
				<li style="color:#aea18c;"><a href="<?php echo G5_BBS_URL ?>/login.php"><b style="color:#aea18c;">로그인</b>  <i class="fa fa-angle-right"></i></a></li>
			<?php }  ?>
        </div>  
        <div id="ft_customer" class="col-xs-6 col-sm-6 col-md-3 ft_div">
            <h2>연결사이트</h2>
            <!--<span>1234-1234</span><br>
            <span>월~금 10:00 ~ 18:00 (토/일/공휴일휴무)</span> -->
            <ul class="ft_sns">
                <li><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-2x fa-facebook-square"></i></a></li>
                <li><a href="https://twitter.com/" target="_blank"><i class="fa fa-2x fa-twitter-square"></i></a></li>
                <li><a href="https://www.google.co.kr/?gws_rd=ssl" target="_blank"><i class="fa fa-2x fa-google-plus-square"></i></a></li>
                <li><a href="http://instagram.com/" target="_blank"><i class="fa fa-2x fa-instagram"></i></a></li><br/><br/>
				<li><a href="https://www.facebook.com/sanghwa.an.1" target="_blank">facebook   <i class="fa fa-angle-right"></i></a></li><br/>
				<!-- <li><a href="https://www.facebook.com/widance" target="_blank">서미교 facebook   <i class="fa fa-angle-right"></i></a></li><br/> -->
				<li><a href="https://www.instagram.com/dancemua" target="_blank">instagram   <i class="fa fa-angle-right"></i></a></li><br/>
				<!-- <li><a href="https://www.instagram.com/yeonjoo_seo" target="_blank">서미교 instagram   <i class="fa fa-angle-right"></i></a></li><br/> -->
				<li><a href="http://blog.naver.com/annedance" target="_blank">블러그  <i class="fa fa-angle-right"></i></a></li><br/>
				<!-- <li><a href="http://blog.naver.com/widance" target="_blank">서미교 블러그  <i class="fa fa-angle-right"></i></a></li><br/> -->
				<hr/>
				<li><a href="http://blog.naver.com/backjj1919" target="_blank">청바라지 2nd <i class="fa fa-angle-right"></i></a></li><br/>
				<!-- <li><a href="http://cafe.naver.com/sbdance" target="_blank">서연주 무용연구소  <i class="fa fa-angle-right"></i></a></li><br/> -->
				<!-- <li><a href="http://www.wizdance.com" target="_blank">위즈무용학원  <i class="fa fa-angle-right"></i></a></li> -->
				<!-- <li><a href="https://blog.naver.com/wotn654/220404032910" target="_blank">과거를 지나 현재를 품다 3rd  <i class="fa fa-angle-right"></i></a></li><br/> -->
            </ul>
        </div>
        
    </div>
    <div id="ft_copy" class="col-lg-12 text-center">
        Copyright &copy; <b>DANCEMUA</b> All rights reserved.<button id="top_btn"><span class="sound_only">상단으로</span><i class="fa fa-arrow-up"></i></button>
    </div>
</div>

<script>
$(function() {
    $("#top_btn").on("click", function() {
        $("html, body").animate({scrollTop:0}, '500');
        return false;
    });
});
</script>


<?php
if(G5_DEVICE_BUTTON_DISPLAY && G5_IS_MOBILE) { ?>
<a href="<?php echo get_device_change_url(); ?>" id="device_change">PC 버전으로 보기</a>
<?php
}

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>

<?php
include_once(G5_THEME_PATH."/tail.sub.php");
?>