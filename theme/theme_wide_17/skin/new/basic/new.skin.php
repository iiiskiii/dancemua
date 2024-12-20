<?php
if (!defined("_MKTBIZASK_")) exit; // 개별 페이지 접근 불가

// 선택삭제으로 인해 셀합치기가 가변적으로 변함
$colspan = 5;

if ($is_admin) $colspan++;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$new_skin_url.'/style.css">', 0);
?>

<style>
#gr_id, #view, #mb_id{height:35px;}
</style>


<!-------------------------- 상단배경 수정 -------------------------->
<?php
$background_images = G5_URL.'/pages/img/1.jpg';
?>
<style>
/* mobile */
@media (min-width: 1px) and (max-width: 1089px) {
		.about-bg{background-image:url('<?php echo $background_images?>');width:100%;-webkit-background-size:100% auto;-moz-background-size:100% auto;-o-background-size:100% auto;background-position:center; background-size: cover; background-repeat:no-repeat;color:#fff;height:100%;padding-top: 70px;}.ml-auto,.mx-auto{padding-top:10px;padding-bottom:10px}.lead{font-size:12px;font-weight:300}.display-4{ font-size:1.5rem;font-weight:300;}.btn,a.btn{line-height:20px!important;height:20px!important;padding:0 5px;text-align:center;font-weight:700;border:0;-webkit-transition:background-color .3s ease-out;-moz-transition:background-color .3s ease-out;-o-transition:background-color .3s ease-out;transition:background-color .3s ease-out}.btn-outline-secondary{font-size:11px;padding:0 5px}
}
/* desktop */
@media (min-width: 1090px) {
	.about-bg{background-image:url('<?php echo $background_images?>');background-position:center center;background-repeat:no-repeat;color:#fff;height:300px}.lead{font-size:1.25rem;font-weight:300}.display-4{font-size:2.5rem;font-weight:300;line-height:1.2}
}
</style>


<div class="position-relative overflow-hidden p-md-5 text-center bg-dark bg-sub-1 ety-mt-main about-bg">

  <div class="col-md-5 p-lg-5 mx-auto my-5">
	<h1 class="display-4 font-weight-normal"><?php echo $title?></h1>
	<p class="lead font-weight-normal ko1">
		<?php echo $title_sub?>
	</p>
  </div>
  <div class="product-device shadow-sm d-none d-md-block"></div>
  <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
</div>
<!-------------------------- ./상단배경 수정 -------------------------->


<!-- 전체게시물 검색 시작 { -->
<div class="container ety-mt-qa margin-top-80 margin-bottom-80">
<div class="margin-bottom-30">
    <form name="fnew" method="get">
    <?php echo $group_select ?>
    <label for="view" class="sound_only">검색대상</label>
    <select name="view" id="view">
        <option value="">전체게시물
        <option value="w">원글만
        <option value="c">코멘트만
    </select>
    <label for="mb_id" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
    <input type="text" name="mb_id" value="<?php echo $mb_id ?>" id="mb_id" required class="">
    <button type="submit" class="btn btn_submit"><i class="fa fa-search" aria-hidden="true"></i> 검색</button>


    </form>
    <script>
    /* 셀렉트 박스에서 자동 이동 해제
    function select_change()
    {
        document.fnew.submit();
    }
    */
    document.getElementById("gr_id").value = "<?php echo $gr_id ?>";
    document.getElementById("view").value = "<?php echo $view ?>";
    </script>
</div>
<!-- } 전체게시물 검색 끝 -->

<!-- 전체게시물 목록 시작 { -->
<form name="fnewlist" id="fnewlist" method="post" action="#" onsubmit="return fnew_submit(this);">
<input type="hidden" name="sw"       value="move">
<input type="hidden" name="view"     value="<?php echo $view; ?>">
<input type="hidden" name="sfl"      value="<?php echo $sfl; ?>">
<input type="hidden" name="stx"      value="<?php echo $stx; ?>">
<input type="hidden" name="bo_table" value="<?php echo $bo_table; ?>">
<input type="hidden" name="page"     value="<?php echo $page; ?>">
<input type="hidden" name="pressed"  value="">

	<div class="spage">
	<table class="table table-bordered table-striped">
	  <thead>
		<tr>
			<?php if ($is_admin) { ?>
			<th>
			<label for="all_chk" class="sound_only">목록 전체</label>
			<input type="checkbox" id="all_chk">
			</th>
			<?php } ?>
			<th>그룹</th>
			<th>게시판</th>
			<th>제목</th>
			<th>이름</th>
			<th>일시</th>
		</tr>
	  </thead>
	  <tbody>
		 <?php
		for ($i=0; $i<count($list); $i++)
		{
			$num = $total_count - ($page - 1) * $config['cf_page_rows'] - $i;
			$gr_subject = cut_str($list[$i]['gr_subject'], 20);
			$bo_subject = cut_str($list[$i]['bo_subject'], 20);
			$wr_subject = get_text(cut_str($list[$i]['wr_subject'], 80));
		?>
		<tr>
			<?php if ($is_admin) { ?>
			<td class="td_chk">
				<label for="chk_bn_id_<?php echo $i; ?>" class="sound_only"><?php echo $num?>번</label>
				<input type="checkbox" name="chk_bn_id[]" value="<?php echo $i; ?>" id="chk_bn_id_<?php echo $i; ?>">
				<input type="hidden" name="bo_table[<?php echo $i; ?>]" value="<?php echo $list[$i]['bo_table']; ?>">
				<input type="hidden" name="wr_id[<?php echo $i; ?>]" value="<?php echo $list[$i]['wr_id']; ?>">
			</td>
			<?php } ?>
			<td><a href="./new.php?gr_id=<?php echo $list[$i]['gr_id'] ?>"><?php echo $gr_subject ?></a></td>
			<td><a href="./board.php?bo_table=<?php echo $list[$i]['bo_table'] ?>"><?php echo $bo_subject ?></a></td>
			<td><a href="<?php echo $list[$i]['href'] ?>" class="new_tit"><?php echo $list[$i]['comment'] ?><?php echo $wr_subject ?></a></td>
			<td><?php echo $list[$i]['name'] ?></td>
			<td><?php echo $list[$i]['datetime2'] ?></td>
		</tr>
		<?php }  ?>
		<?php if ($i == 0)
		echo '<tr><td colspan="'.$colspan.'" class="empty_table">게시물이 없습니다.</td></tr>';
		?>
		
	  </tbody>
	</table>
	<?php if ($is_admin) { ?>
	<div class="sir_bw02 sir_bw">
		<button type="submit" onclick="document.pressed=this.title" title="선택삭제" class="btn_b01 btn">선택삭제</button>
	</div>
	<?php } ?>
	</form>
	</div>
</div><!-- container -->

<div class="margin-bottom-50"></div>

<?php if ($is_admin) { ?>
<script>
$(function(){
    $('#all_chk').click(function(){
        $('[name="chk_bn_id[]"]').attr('checked', this.checked);
    });
});

function fnew_submit(f)
{
    f.pressed.value = document.pressed;

    var cnt = 0;
    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_bn_id[]" && f.elements[i].checked)
            cnt++;
    }

    if (!cnt) {
        alert(document.pressed+"할 게시물을 하나 이상 선택하세요.");
        return false;
    }

    if (!confirm("선택한 게시물을 정말 "+document.pressed+" 하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다")) {
        return false;
    }

    f.action = "./new_delete.php";

    return true;
}
</script>
<?php } ?>

<?php echo $write_pages ?>
<!-- } 전체게시물 목록 끝 -->