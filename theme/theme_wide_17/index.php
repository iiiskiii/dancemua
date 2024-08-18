<?php
if (!defined('_INDEX_')) define('_INDEX_', true);
if (!defined('_MKTBIZASK_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

if(G5_COMMUNITY_USE === false) {
    include_once(G5_THEME_SHOP_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head.php');

$strPageMove = isset($_POST['pageMove']) ? $_POST['pageMove'] : ( isset($_REQUEST['pageMove']) ? $_REQUEST['pageMove'] : '' );
?>




<?php 
/**************************************************************************

GNUBOARD 5.4

테마메뉴얼주소 입니다. 아래 주소에 설치 및 셋팅법이 포함되어 있습니다.
http://ety.kr/board/free_theme_manual

오류내용은 질문게시판을 이용해주세요 (오픈카톡이나 유선상 문의를 받지 않습니다.)
http://ety.kr/board/qa

팁영상 요청 주소 : softzonecokr@naver.com 
팁영상 요청을 해주시면 중복되지 않는 선에서 팁영상을 제작해드고 있습니다.

[라이선스]
자주 하는 질문이 있어서 문서내 포함시켰습니다.
해당 내용은 읽어 보시고 삭제하셔도 됩니다.

1. 배포, 재배포는 에티테마만 가능하므로 사용만 하시고 다른쪽에 배포나 재배포 하지 말아주세요.
(라이선스 위반을 하시게 되면 그에 따른 책임이 따르게 됩니다.)

2. 돈을 받고 유상으로 작업하셔도 되지만 그에 대한 책임은 돈을 받는 제작자에게 있으며 에티테마와는 무관합니다.


**************************************************************************/ 
?>







<!-------------------------- 슬라이드 -------------------------->
<header>
  <div id="carouselExampleIndicators" class="carousel slide carousel-fade information_con" data-ride="carousel" data-interval="5000">
	<ol class="carousel-indicators">
	  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
	  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
	  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner" role="listbox">
	  <!-- Slide One - Set the background image for this slide in the line below 2560x550 -->
	  <div class="carousel-item active" style="background-image: url('/upload/images/mkt001.gif')">
		<div class="carousel-caption d-md-block">
		  <h3 class="ks4" style="color:#6a3691;">마켓셀러는 쇼핑몰창업을 도와드립니다.</h3>
		  <p class="ks4 f20" style="color:#dd5d9e;">쉽고, 빠르게 이커머스 판매자의 길로 안내합니다!</p>
		</div>
	  </div>
	  <!-- Slide Two - Set the background image for this slide in the line below 2560x550 -->
	  <div class="carousel-item" style="background-image: url('/upload/images/mkt002.gif')">
		<div class="carousel-caption d-md-block">
		  <h3 class="ks4" style="color:#6a3691;">마켓셀러는 이커머스 셀러와 판매자를 위한 플랫폼입니다.</h3>
		  <p class="ks4 f20" style="color:#dd5d9e;">창업에 고민이 있으신가요? 상품은 있는데 판매가 힘드신가요?</p>
		</div>
	  </div>
	  <!-- Slide Three - Set the background image for this slide in the line below 2560x550 -->
	  <div class="carousel-item" style="background-image: url('/upload/images/mkt003.gif')">
		<div class="carousel-caption d-md-block">
		  <h3 class="ks4" style="color:#6a3691;">쇼핑몰관리 마켓셀러로 간편하게 해결하세요!</h3>
		  <p class="ks4 f20" style="color:#dd5d9e;">마켓셀러는 이커머스 셀러에게 꼭 필요한 사이트입니다!</p>
		</div>
	  </div>
	</div>
	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
	  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	  <span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
	  <span class="carousel-control-next-icon" aria-hidden="true"></span>
	  <span class="sr-only">Next</span>
	</a>
  </div>
</header>
<!-------------------------- ./슬라이드 -------------------------->






<?php
/*

https://fonts.google.com/icons?selected=Material+Icons
위 주소에서 아이콘을 변경할 수 있습니다.


*/

?>




<!-------------------------- 아이콘박스 -------------------------->
<div class="container margin-top-60 skillInfo_con">
	<div class="center-heading ks4">
		<h2>마켓셀러는 상품을 <strong>선택/등록/주문/클래임/배송</strong> </h2>
		<span class="center-line"></span>
		<p class="sub-text margin-bottom-80 ks5 f19">
		모두 한번에 해결해 드립니다!
		</p>
	</div>

	<div class="row padding-top-20">
		<div class="col-lg-3 col-md-3 col-sm-12 col-12">
			<div class="box">							
				<div class="icon">
					<div class="info-pink-3">
						<span class="material-icons">search</span>
						<p class="ks4 f14 h75">
							공급사의 상품을 다양하게 선택/검색 할 수 있는 기능으로 빠르고 효과적인 상품을 판매 가능합니다!
						</p>
						<!-- <div class="margin-top-20 margin-bottom-20">
							<button type="button" class="btn btn-secondary btn-sm ks4" onclick="location.href='#'">바로가기</button>
						</div> -->
					</div>
				</div>
				<div class="space"></div>
			</div> 
		</div><!-- ./col -->
		<div class="col-lg-3 col-md-3 col-sm-12 col-12">
			<div class="box">							
				<div class="icon">
					<div class="info-pink">
						<span class="material-icons">logout</span>
						<p class="ks4 f14 h75">
							선택의 자유로움, 다양한 상품을 판매 할 수 있는 강력한 기능으로 오픈마켓 다량등록으로 더 많은 판매가 가능합니다!
						</p>
						<!-- <div class="margin-top-20 margin-bottom-20">
							<button type="button" class="btn btn-secondary btn-sm ks4" onclick="location.href='#'">바로가기</button>
						</div> -->
					</div>
				</div>
				<div class="space"></div>
			</div> 
		</div><!-- ./col -->
		<div class="col-lg-3 col-md-3 col-sm-12 col-12">
			<div class="box">							
				<div class="icon">
					<div class="info-pink-2">
						<span class="material-icons">schedule</span>
						<p class="ks4 f14 h75">
							언제, 어디서나, 시간과 장소에 상관없이 여러분이 원하시는곳이 사무실이며, 판매할동을 할 수 있는곳으로 만들어 드립니다!
						</p>
						<!-- <div class="margin-top-20 margin-bottom-20">
							<button type="button" class="btn btn-secondary btn-sm ks4" onclick="location.href='#'">바로가기</button>
						</div> -->
					</div>
				</div>
				<div class="space"></div>
			</div> 
		</div><!-- ./col -->
		<div class="col-lg-3 col-md-3 col-sm-12 col-12">
			<div class="box">							
				<div class="icon">
					
					<div class="info">
						<span class="material-icons">help_outline</span>
						<p class="ks4 f14 h75">
							문의사항은 1대1게시판, 각 해당 게시판을 통해 글 남겨주시면, 궁금을 해결해 드리겠습니다.
						</p>
						<!-- <div class="margin-top-20 margin-bottom-20">
							<button type="button" class="btn btn-secondary btn-sm ks4" onclick="location.href='#'">바로가기</button>
						</div> -->
					</div>
				</div>
				<div class="space"></div>
			</div> 
		</div><!-- ./col -->
	</div><!-- /row -->

	<div class="d-none d-sm-block margin-top-30"></div><!-- pc 만 적용 -->

	<!-------------------------- 두번째줄 -------------------------->
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-12 col-12">
			<div class="box">							
				<div class="icon">
					<div class="info">
						<span class="material-icons">shopping_cart</span>
						<p class="ks4 f14 h75">
							카트기능을 활용하세요! 자동예약, 수동으로 편리한 오픈마켓 상품등록으로 시간을 효율적,빠른 활용이 가능하게 지원해 드립니다!
						</p>
						<!-- <div class="margin-top-20 margin-bottom-20">
							<button type="button" class="btn btn-secondary btn-sm ks4" onclick="location.href='#'">바로가기</button>
						</div> -->
					</div>
				</div>
				<div class="space"></div>
			</div> 
		</div><!-- /col -->
		<div class="col-lg-3 col-md-3 col-sm-12 col-12">
			<div class="box">							
				<div class="icon">
					<div class="info">
						<span class="material-icons">alarm</span>
						<p class="ks4 f14 h75">
							다양한 오픈마켓 주문을 한번에 자동예약, 수동으로 한번에 주문수집으로 편리하고,빠른 효울적인 시간 활용을 지원해 드립니다!
						</p>
						<!-- <div class="margin-top-20 margin-bottom-20">
							<button type="button" class="btn btn-secondary btn-sm ks4" onclick="location.href='#'">바로가기</button>
						</div> -->
					</div>
				</div>
				<div class="space"></div>
			</div> 
		</div><!-- /col -->

		<div class="col-lg-3 col-md-3 col-sm-12 col-12">
			<div class="box">							
				<div class="icon">
					<div class="info">
						<span class="material-icons">sticky_note_2</span>
						<p class="ks4 f14 h75">
							다양한 오픈마켓의 클레임수집을 한번에 빠른수집으로 강력하고 빠른 대응을 할 수 있게 지원해 드립니다!
						</p>
						<!-- <div class="margin-top-20 margin-bottom-20">
							<button type="button" class="btn btn-secondary btn-sm ks4" onclick="location.href='#'">바로가기</button>
						</div> -->
					</div>
				</div>
				<div class="space"></div>
			</div> 
		</div><!-- /col -->

		<div class="col-lg-3 col-md-3 col-sm-12 col-12">
			<div class="box">							
				<div class="icon">
					
					<div class="info">
						<span class="material-icons">local_shipping</span>
						<p class="ks4 f14 h75">
							빠른배송으로 셀러분들은 배달고민을 하지마세요! 마켓셀러에서는 셀러분의 배달문제를 한번더 해결해 드립니다!
						</p>
						<!-- <div class="margin-top-20 margin-bottom-20">
							<button type="button" class="btn btn-secondary btn-sm ks4" onclick="location.href='#'">바로가기</button>
						</div> -->
					</div>
				</div>
				<div class="space"></div>
			</div> 
		</div><!-- /col -->
	</div><!-- /row -->
	<div class="margin-bottom-40"></div>
</div><!-- /container -->










<!-------------------------- pallax box -------------------------->
<style>
.para-box{
    height: 350px; display: grid; align-items: center;
}
</style>
<div class="parallax-window serviceInfoCon_con" data-parallax="scroll" data-image-src="/upload/images/mkt002.gif"><!-- 이미지 주소 -->
	<div class="container">
		<div class="row">
			<div class="col-md-12 para-box text-center">
				
				<div class="">
					<h2 class='text-light ks5'>마켓셀러는 무점포/무재고/소자본으로 시작 할 수 있습니다!</h2>
					<br />
					<!-- <button type="button" class="btn btn-outline-light ks4" onclick='window.open("about:blank").location.href="http://ety.kr/board/theme_update"'>바로가기</button>  -->
					<!-- <button type="button" class="btn btn-outline-light ks4" onclick='window.open("about:blank").location.href="http://ety.kr/shop/item/1623421493"'>7페이지</button> -->
				</div>
			</div>

		</div>
	</div>
</div><!-- /parallax -->


<!-------------------------- 테마소개 + 유튜브영상 -------------------------->
<?php
/*
<div class="padding-top-60 padding-bottom-60" style="background:#f2f2f2;">
	<div class="container">
	<div class="center-heading">
		<h2 class="en1">USE A <strong>LIBRARY</strong> </h2>
		<span class="center-line"></span>
	</div>
	  <div class="row">
		<div class="col-lg-6">
		  <iframe width="100%" height="315" src="https://www.youtube.com/embed/PF0BcfP9pkc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
		<div class="col-lg-6">
		  <h2 class="en1">SERVICE</h2>
		  <p class="ks4"><strong>새롭게 7개의 페이지가 업로드 되었습니다.</strong></p>
		  <p class="ks4"><a href="http://ety.kr/shop/item/1623421493" target="_blank">http://ety.kr/shop/item/1623421493</a></p>
		  <p class="ks4">배포는 소프트존만 가능하며 배포처는 에티테마,SIR 만 제한하고 있습니다.</p>
		  <p class="ks4">설치방법안내 <strong><a href="http://ety.kr/board/ety_theme_free_movie" target="_blank">http://ety.kr/board/ety_theme_free_movie</a></strong> 에서 진행하고 있으므로 궁금점이나 문의사항이 있으시면 해당 게시판을 이용해주세요.</p>
		</div>
	  </div>
	</div>
</div>
*/
?>



<!-------------------------- 제품안내 갤러리 -------------------------->
<div class="container margin-top-60 margin-bottom-60">
	<div class="center-heading margin-top-40">
		<h2 class="ks4">마켓셀러는 다양한 오픈마켓을 지원해 드리고 있습니다!</h2>
		<span class="center-line"></span>
		<p class="sub-text margin-bottom-80 ks5 f19">
		지속적인 오픈마켓 API 업데이트로 더 많은 지원에 노력하고 있습니다!
		</p>
	</div>
	<div class="serviceInfo_con">
	<!-- LATEST : pic_basic_company -->
	<?php //echo latest('theme/pic_basic_company', 'gallery', 6, 24); ?>
	<?php
## 오픈마켓 데이터
$amlList = $db->getList(" SELECT AML_NAME, AML_IMG_URL FROM MKT_ALL_MARKET_LIST WHERE 1 AND AML_USE_YN = 'Y' ORDER BY AML_SORT ASC ", MYSQLI_ASSOC);
if(!$amlList) $amlList = [];
foreach($amlList AS $listEach){
    $listEach_amlImgUrl = $listEach['AML_IMG_URL'];
    $listEach_amlName   = $listEach['AML_NAME'];
?>
		<span class="smlPart">
			<span><img src="<?php echo $listEach_amlImgUrl;?>" title="<?php echo $listEach_amlName;?>"/></span>
		</span>
<?php
}
?>
	</div>
</div>




<!-------------------------- USE A LIBRARY -------------------------->
<div class="padding-top-60 padding-bottom-60 priceListInfo_con" style="background:#f2f2f2;">
	<div class="container">
		<div class="center-heading">
			<h2 class="en1">마켓셀러 <strong>요금안내</strong> </h2>
			<span class="center-line"></span>
		</div>
	  <div class="row f16 priceListInfo_con">

	  <ul class="smlPartUl">
        <p class="smlPartBox">
            <span class="smlParts">
                <span>구분</span>
                <span>사용료</span>
                <span>마켓연동</span>
                <span>공급사DB</span>
                <span>대행서비스</br>(포장/배송/반품)</span>
                <span>상품등록</span>
                <span>주문수집</span>
                <span>연동아이디</span>
            </span>
<?php
## 요금표 데이터
$musrList = $db->getList(" SELECT * FROM MKT_USE_SYSTEM_RATE WHERE 1 AND MUSR_USE_YN = 'Y' ORDER BY MUSR_SORT ASC ", MYSQLI_ASSOC);
if(!$musrList) $amlList = [];
foreach($musrList AS $listEach){
    $listEach_MUSR_CODE                 = $listEach['MUSR_CODE']; ## 명칭코드(유일함)
    $listEach_MUSR_NAME                 = $listEach['MUSR_NAME']; ## 한글명칭
    $listEach_MUSR_MON_PRICE            = $listEach['MUSR_MON_PRICE']; ## 월 사용료
    $listEach_MUSR_PART                 = $listEach['MUSR_PART']; ## 결제구분(MAIN 필수 결제)
    $listEach_MUSR_SORT                 = $listEach['MUSR_SORT']; ## 보이는 순서(적은수가 1순위)
    $listEach_MUSR_SUPPLY_DB_YN         = $listEach['MUSR_SUPPLY_DB_YN']; ## 공급사 전체 상품DB 제공 내용 YN
    $listEach_MUSR_AGENCY_SERVICE_YN    = $listEach['MUSR_AGENCY_SERVICE_YN']; ## 포장/배송/반품 서비스 YN
    $listEach_MUSR_PROD_UPLOAD_YN       = $listEach['MUSR_PROD_UPLOAD_YN']; ## 상품등록 무제한 내용 YN
    $listEach_MUSR_ORDER_COLLECTION_CNT = $listEach['MUSR_ORDER_COLLECTION_CNT']; ## 주문수집 건수
    $listEach_MUSR_MARKET_ID_CNT        = $listEach['MUSR_MARKET_ID_CNT']; ## 연동아이디 수
?>
            <span class="smlParts" data-code="<?php echo $listEach_MUSR_CODE; ?>" data-sort="<?php echo $listEach_MUSR_SORT; ?>" data-part="<?php echo $listEach_MUSR_PART; ?>">
                <span><?php echo $listEach_MUSR_NAME; ?></span><!-- 구분 -->
                <span><?php echo NUMBER_FORMAT($listEach_MUSR_MON_PRICE); ?>원/월</span><!-- 월사용료 -->
                <span>모든마켓</span><!-- 마켓연동 -->
                <span><?php if($listEach_MUSR_SUPPLY_DB_YN=='Y'){ echo "전체 DB제공"; }else{ echo "일부 DB제공"; }?></span><!-- 공급사DB -->
                <span><?php if($listEach_MUSR_AGENCY_SERVICE_YN=='Y'){ echo "O"; }else{ echo "X"; }?></span><!-- 대행서비스 -->
                <span><?php if($listEach_MUSR_PROD_UPLOAD_YN=='Y'){ echo "무제한"; }else{ echo "일부제한"; }?></span><!-- 상품등록 -->
                <span><?php if($listEach_MUSR_ORDER_COLLECTION_CNT>0){ echo NUMBER_FORMAT($listEach_MUSR_ORDER_COLLECTION_CNT)."건/월"; }else{ echo "일부제한"; }?></span><!-- 주문수집 -->
                <span><?php if($listEach_MUSR_MARKET_ID_CNT>0){ echo NUMBER_FORMAT($listEach_MUSR_MARKET_ID_CNT)."건/월"; }else{ echo "일부제한"; }?></span><!-- 연동아이디 -->
            </span>
<?php
}
?>
        </p>
    </ul>

	  </div>
	  <!-- /.row -->
	</div>
</div>




<!-------------------------- USE A LIBRARY -------------------------->
<?php
/*
<div class="padding-top-60 padding-bottom-60">
	<div class="container">
		<div class="center-heading">
			<h2 class="en1">USE A <strong>LIBRARY</strong> </h2>
			<span class="center-line"></span>
		</div>
		  <div class="row f16">

			<div class="col-lg-6">
			  <h2 class="en1">JavaScript Library</h2>
			  <p class="ks4 f20">테마폴더내 라이선스 문서 확인</p>
			  <ul class="en2">
				<li><strong>GNUboard5</strong></li>
				<li><strong>Bootstrap4</strong></li>
				<li>jQuery</li>
				<li>Font Awesome5</li>
				<li>Working contact form with validation</li>
				<li>Unstyled page elements for easy customization</li>
				<li>Parallax</li>
				<li>Owl</li>
			  </ul>
			  <p class="ks5">
			  현제 제작되는 모든 테마는 에티테마 에서 제작되고 있으며 무료 테마 및 템플릿의 경우에는 이미지가 포함 되어 있지 않습니다. 또한 에티테마로 오시면 추가적인 업데이트된 파일을 다운로드 하실 수 있습니다.</p>
			</div>

			<div class="col-lg-6 text-right">
				<img class="img-fluid rounded" src="<?php echo G5_THEME_URL?>/img/s-3.png" alt="">
			</div>

		  </div>
	  <!-- /.row -->
	</div>
</div>
*/
?>



<!-------------------------- parallax 박스 및 countdown -------------------------->
<div class="parallax-window" data-parallax="scroll" data-image-src="/upload/images/mkt001.gif">
	<div class="container">
		<div class="center-heading" style="margin-bottom: 0px;padding-top: 40px;">
			<h2 class='text-light ks5'>마켓셀러는 경쟁력 있는 기술들을 지원해 드립니다!</h2>
			<span class="center-line"></span>
		</div>
		<div class="row padding-top-60 padding-bottom-60">
			<div class="col-md-3 col-6 margin-top-20 margin-bottom-20">
				<a href="#none">
					<div class="cbox text-center">
						<span class="material-icons">trending_down</span>
						<!-- <span class="material-icons">alarm</span> -->
						<p class="ks4 f14 h75">판매부진의 남은 재고부담이 없음, 재고문제가 가장큰많큼 마켓셀러에서는 재고부담을 줄여 드립니다!</p>
						<!-- <p class="text-center ks4">바로가기</p> -->
					</div><!-- /cbox -->
				</a>
			</div><!-- /col -->
			<div class="col-md-3 col-6 margin-top-20 margin-bottom-20">
				<a href="#none">
					<div class="cbox text-center">
						<span class="material-icons">monetization_on</span>
						<!-- <span class="material-icons">hourglass_empty</span> -->
						<p class="ks4 f14 h75">소자본으로 운영이 가능, 운영문제가 부담이 많이 되어 운영문제/초기자본등 마켓셀러에서 마음고생을 줄여드립니다!</p>
						<!-- <p class="text-center ks4">바로가기</p> -->
					</div><!-- /cbox -->
				</a>
			</div><!-- /col -->
			<div class="col-md-3 col-6 margin-top-20 margin-bottom-20">
				<a href="#none">
					<div class="cbox text-center">
						<span class="material-icons">list_alt</span>
						<!-- <span class="material-icons">trending_down</span> -->
						<p class="ks4 f14 h75">여러가지의 다양한 상품군 판매 가능, 다양한 상품을 판매하고자 하는 셀러분들! 여기 마켓셀러가 있습니다!</p>
						<!-- <p class="text-center ks4">바로가기</p> -->
					</div><!-- /cbox -->
				</a>
			</div><!-- /col -->
			<div class="col-md-3 col-6 margin-top-20 margin-bottom-20">
				<a href="#none">
					<div class="cbox text-center">
						<span class="material-icons">edit_calendar</span>
						<!-- <span class="material-icons">system_update_alt</span> -->
						<p class="ks4 f14 h75">회원가입후 1개월 무료, 마켓셀러를 가입후 1개월간 여러기능을 사용해 보시길 바랍니다!</p>
						<!-- <p class="text-center ks4">바로가기</p> -->
					</div><!-- /cbox -->
				</a>
			</div><!-- /col -->
		</div><!-- /row -->
	</div><!-- /container -->
</div><!-- /parallax -->





<!-------------------------- 게시판 -------------------------->
<div class="padding-top-60">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
				<?php echo latest('theme/basic_main_one', 'notice', 5, 40);?>
			</div>
			<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
				<?php echo latest('theme/basic_main_one', 'free', 5, 40);?>
			</div>
		</div>
	</div>
</div>





<!-------------------------- GALLERY -------------------------->
<!-- 

테마폴더/tail.php : 43 번째줄에서 수정하시면 됩니다.
owlcarousel 시간조정, 개수조정, 오토플레이 조정


-->
<?php
/*
<div class="container margin-bottom-60">
	<?php echo latest('theme/pic_basic_owl', 'gallery', 9, 24); ?>
</div>
*/
?>






<!-------------------------- 

지도 : 구글지도로 주소를 검색하신 다음에 공유버튼을 클릭하여 iframe 형식으로 가져오시면 됩니다.

-------------------------->
<?php
/*
<div class="container-fluid">
	<input type="hidden" value="<?php echo G5_THEME_URL?>" id="send_url">
	<div class="row">
		<div class="col-md-6" style="padding:0px;">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3173.8712817288642!2d127.6344159516823!3d37.298184379750005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x35635d8af4a6c211%3A0x9b0b7257a5a5a5cc!2z7Jes7KO87Iuc7LKt!5e0!3m2!1sko!2skr!4v1654254206256!5m2!1sko!2skr" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>	
		</div>
		<div class="col-md-6 text-left" style="padding:30px; background:#f5f5f5;">
			<!-- 타이틀 -->
			<div class="margin-bottom-40">
				<h2 class="en1">Contact US</h2>
			</div>
			<div class="row">
				<div class="col-md-12 margin-bottom-20">
					<input class="form-control" type="text" name="ety_name" value="" placeholder="담당자">
				</div><!-- /col -->
				<div class="col-md-12 margin-bottom-20">
					<input class="form-control" type="text" name="ety_phone" value="" placeholder="연락처">
				</div><!-- /col -->
				<div class="col-md-12 margin-bottom-20">
					<input class="form-control" type="text" name="ety_email" value="" placeholder="이메일">
				</div><!-- /col -->
			</div><!-- /row -->
			<div class="row">
				<div class="col-md-12">
					  <div class="form-group">
						<textarea class="form-control" name="ety_content" value="" id="ety_content" rows="3"></textarea>
					  </div>
				</div>
				<div class="col-md-12 margin-bottom-20">
					  <div class="form-check">
						<input type="checkbox" name="agree" class="form-check-input" id="exampleCheck1">
						<label class="form-check-label" for="exampleCheck1">약관동의</label>
					  </div>
				</div>
				<div class="col-md-12">
					<button type="submit" class="btn btn-dark ks4 sendmail">문의하기</button>
				</div>
			</div><!-- /row -->					
		</div>
	</div>
</div>
*/
?>
<div class="padding-top-60 padding-bottom-60 supplyComInfoCon_con" style="background: #f2f2f2;">
	<div class="container">
		<div class="center-heading">
			<h2 class="en1">마켓셀러는 <strong>공급사 파트너 여러분</strong>들을 기다리고 있습니다!</h2>
			<span class="center-line"></span>
		</div>

		<div class="supplyComInfo_con mainMenu">
			<ul>
				<p class="smlPartBox">
					<span class="smlPart">
						<span>이름(실명) [필수] </span>
						<span>
							<span>0 / 0자</span>
							<input type="text" class="supplyComMemName supplyInput" maxlength="10" placeholder="이름(실명)"/>
						</span>
					</span>
					<span class="smlPart">
						<span>회사명 [필수] </span>
						<span>
							<span>0 / 0자</span>    
							<input type="text" class="supplyComComName supplyInput" maxlength="20" placeholder="회사명"/>
						</span>
					</span>
					<span class="smlPart">
						<span>회사홈페이지(URL) [선택] </span>
						<span>
							<span>0 / 0자</span>
							<input type="text" class="supplyComComUrl supplyInput" maxlength="100" placeholder="회사홈페이지(URL)"/>
						</span>
					</span>
					<span class="smlPart">
						<span>연락받을 번호 [필수] </span>
						<span>
							<span>0 / 0자</span>
							<input type="text" class="supplyComPhoNum supplyInput" maxlength="13" placeholder="연락받을 번호"/>
						</span>
					</span>
					<span class="smlPart">
						<span>이메일 [필수] </span>
						<span>
							<span>0 / 0자</span>
							<input type="text" class="supplyComEmail supplyInput" maxlength="50" placeholder="이메일"/>
						</span>
					</span>
					<span class="smlPart">
						<span>취급상품군 [필수] </span>
						<span>
							<span>0 / 0자</span>
							<input type="text" class="supplyComCategory supplyInput" maxlength="50" placeholder="취급상품군"/>
						</span>
					</span>
					<span class="smlPart">
						<span>간단내용작성(50자) [필수] </span>
						<span>
							<span>0 / 0자</span>
							<input type="text" class="supplyComMemo supplyInput" maxlength="50" placeholder="간단내용작성(50자까지)"/>
						</span>
					</span>
				</p>
				<p class="firText">
					<span class="cellChk">
						<input type="checkbox" id="mktPrivacyPolicy" name="mktPrivacyPolicy" class="inp_check" onchange="ppChkbox()">
						<label for="mktPrivacyPolicy" id="ppChkbox" class="">[필수] 개인정보처리방침 동의 (이름,회사명,연락처,이메일,판매유형,연간거래액,문의내용/자동수집항목:신청일시/수집된 개인정보에 대해서 2년 간 보유하며, 이후 모든 정보는 파기합니다.)</label>
					</span>
					<span class="smlTextBox">
						<a href="f#" onclick="return false;" class="submitBtn" data-text="전송">전송</a>
					</span>
				</p>
			</ul>
		</div>

	</div>
</div>

<script>
var strPageMove = '';
<?php if($strPageMove){ ?>
strPageMove = '<?php echo $strPageMove;?>'; // 다른페이지에서 오면 이동
<?php } ?>
</script>
<script language='javascript' type='text/javascript' src='/js/shopMall/include/mainJs.js'></script>




<?php
include_once(G5_THEME_PATH.'/tail.php');