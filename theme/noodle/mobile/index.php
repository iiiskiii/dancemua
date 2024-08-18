<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_MOBILE_PATH.'/head.php');
?>


<!-- 메인배너 { -->
<section id="sbn_idx" class="sbn">
   <!-- <h2>메인 배너</h2> -->
   <ul class="bxslider">
       <li><img src="<?php echo G5_THEME_URL; ?>/img/bn_img.jpg" alt="" /></li>
       <li><img src="<?php echo G5_THEME_URL; ?>/img/bn_img2.jpg" alt="" /></li>
       <li><img src="<?php echo G5_THEME_URL; ?>/img/bn_img3.jpg" alt="" /></li>
       <li><img src="<?php echo G5_THEME_URL; ?>/img/bn_img4.jpg" alt="" /></li>
   </ul>
</section>
<script>
$('.bxslider').bxSlider({
    auto: true,
    autoControls: true
});
</script>
<!-- } 메인배너 -->

<section id="idx_ct">
  
    <div id="idx_m1" class="col-lg-6 col-md-12 col-sm-12">
        <div class="idx_m1_1 col-lg-6 col-md-6 col-sm-6">
            
            <!-- 공지사항 -->
            <div class="notice col-lg-12">
            <?php
            // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
            // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
            // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
            // echo latest('theme/basic', 'notice', 5, 25);
            echo latest('theme/basic', 'mua_notice', 10, 25);
            ?>
            </div>
            
            <!-- 매장안내 -->
            <div class="col-lg-12 food11">
				<p>
					<a href="<?php echo G5_BBS_URL; ?>/board.php?bo_table=dance_introduction&wr_id=1">
						<img src="<?php echo G5_THEME_URL; ?>/img/ash_2017.jpg" alt="안상화 MUA" / >
					</a>
				</p>
                <?php /*
                // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
                // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
                // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
                echo latest('theme/basic', 'notice', 5, 25);
				*/ ?> 
            </div> 
        </div>
        <!-- 회사소개 -->
        <div class="idx_m1_2 col-lg-6 col-md-6 col-sm-6">
            <p>
				<a href="<?php echo G5_BBS_URL; ?>/board.php?bo_table=company&wr_id=1">
					<img src="<?php echo G5_THEME_URL; ?>/img/company.png" alt="MUA소개" /><br />자세히보기 <i class="fa fa-angle-right fa-fw"></i>
				</a>
			</p>
        </div>
    </div>
    
    <div id="idx_m2" class="col-lg-6 col-md-12 col-sm-12">
        <!-- 이벤트 -->
        <div class="idx_m2_1 col-lg-12 col-md-12">
            <?php
            // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
            // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
            // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
            $options = array(
                'thumb_width'    => 700, // 썸네일 width
                'thumb_height'   => 300,  // 썸네일 height
                'content_length' => 0   // 간단내용 길이
            );
            //echo latest('theme/basic', 'QsGallery', 7, 25, 1, $options);
            echo latest('theme/pic_parallax_swiper', 'QsGallery', 5, 23);
            ?> 
        </div>
        <!-- 제품소개 -->
        <div class="idx_m2_2 col-lg-12">

            <div class="food food1 col-lg-6 col-md-6 col-sm-6 col-xs-12" style="width:100%;">
				<p>
					<a href="<?php echo G5_BBS_URL; ?>/board.php?bo_table=mua_notice&wr_id=27">
						<img src="<?php echo G5_THEME_URL; ?>/img/bottom3.png" alt="차한잔하실래요?" />
					</a>
				</p> 
				<!-- <p><a href="<?php echo G5_BBS_URL; ?>/board.php?bo_table=dance_introductio&wr_id=1"><img src="<?php echo G5_THEME_URL; ?>/img/bottom2.png" alt="서미교소개" /></a></p> -->
           </div>

<!--
           <div class="food food2 col-lg-6 col-md-6 col-sm-6 col-xs-12">
               <?php
                // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
                // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
                // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
                $options = array(
                    'thumb_width'    => 700, // 썸네일 width
                    'thumb_height'   => 333,  // 썸네일 height
                    'content_length' => 0   // 간단내용 길이
                );
                echo latest('theme/basic2', 'playmovies', 1, 25, 1, $options);
				?>  
           </div>
-->
        </div>
    </div>
</section>
<?php
include_once(G5_THEME_MOBILE_PATH.'/tail.php');
?>