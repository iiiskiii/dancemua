<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>
<style>
.checkbox input[type=checkbox] {vertical-align: middle; margin-left:0px !important;position:inherit !important;}
/* 상국이 버튼 */
.askbtn {padding: 5px 10px;text-decoration: none !important;font-weight: bold;display: inline-block;margin: 10px 0px;vertical-align: middle;}

.askbtn_gry {border: 1px solid #3b3b3b;background-color: #3b3b3b;color: #ffffff !important;}
.askbtn_red {border: 1px solid #d81e1e;background-color: #d81e1e;color: #ffffff !important;}
#bo_list {padding:10px 0px;}
</style>
<!-- 게시판 목록 시작 { -->
	<!-- 게시판 페이지 정보 및 버튼 시작 { -->
	<div style="width:98%;margin:0 auto;">
		<h2 id="container_title"><?php echo $board['bo_subject'] ?><span class="sound_only"> 목록</span></h2>
	</div>
<?php if ($is_admin) { ?>
    <div class="bo_fx checkbox" style="width:98%;margin:0 auto;">
        <div id="bo_list_total">
            <label for="chkall" class="askbtn askbtn_red">현재 페이지 게시물 전체</label>
			<input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);" > 
        </div>

        <?php if ($rss_href || $write_href) { ?>
        <ul class="btn_bo_user">
			<?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="askbtn askbtn_gry">글쓰기</a></li><?php } ?>
            <?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="askbtn askbtn_red">관리자</a></li><?php } ?>
        </ul>
        <?php } ?>
    </div>
    <!-- } 게시판 페이지 정보 및 버튼 끝 -->
<?php } ?>
 <form name="fboardlist" id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">
<style>
.list_content > p {margin: 0px !important;}
</style>
<div id="bo_list" style="width:98%;margin:0 auto;">
	<!-- <div style="width: 90%;display: inline-block;font-size: 30px;font-weight: bold;color: #8e8e8e;"><?php echo $board['bo_subject']; ?></div> -->
	<?php
	$sql = "select * from ".$write_table."  where wr_is_comment = '0' group by wr_subject  order by wr_subject desc";
	$result = sql_query($sql);
	for ($i=0; $history_y=sql_fetch_array($result); $i++) {
	?>
		<div class="list_year">
			<div style="width: 90%;display: inline-block;"><?php echo $history_y['wr_subject']?><span style="color:#4b7ab2;padding-left:1px;font-size:14px;">년|&nbsp;</span></div>
			<?php
			$sql2 = "select * from ".$write_table."  where wr_is_comment = '0'  and wr_subject = '{$history_y['wr_subject']}' order by wr_1 desc, wr_datetime desc";
			$result2 = sql_query($sql2);
			for ($i=0; $history_m=sql_fetch_array($result2); $i++) {
			?>
			<div class="mc_con">
				<div  class="list_month"><?php echo $history_m['wr_1']?>월</div>
				<div class="list_content">
					<?php echo nl2br($history_m['wr_content']);?> 
					 <?php if ($is_admin) { ?>
						<a href="<?php echo G5_BBS_URL?>/write.php?w=u&bo_table=<?php echo $bo_table?>&wr_id=<?php echo $history_m['wr_id']?>" class="m_btn">수정하기</a>
						<label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $history_m['wr_subject'] ?></label>
						<input type="checkbox" name="chk_wr_id[]" value="<?php echo $history_m['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
					<?php } ?>	
				</div>
			</div>
			<?php } ?>
		</div>
		
	<?php } ?>
</div>

<?php if ($list_href || $is_checkbox || $write_href) { ?>
    <div class="bo_fx" style="width:98%;margin:0 auto;">
        <?php if ($is_checkbox) { ?>
        <ul class="btn_bo_adm">
            <li><input type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value" class="askbtn askbtn_red" /></li>
        </ul>
        <?php } ?>

        <?php if ($list_href || $write_href) { ?>
        <ul class="btn_bo_user">
            <?php if ($list_href) { ?><li><a href="<?php echo $list_href ?>" class="askbtn askbtn_red">목록</a></li><?php } ?>
            <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="askbtn askbtn_gry">글쓰기</a></li><?php } ?>
        </ul>
        <?php } ?>
    </div>
    <?php } ?>
</form>
<?php if ($is_admin) { ?>
<script>
function all_checked(sw) {
    var f = document.fboardlist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]")
            f.elements[i].checked = sw;
    }
}

function fboardlist_submit(f) {
    var chk_count = 0;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
            chk_count++;
    }

    if (!chk_count) {
        alert(document.pressed + "할 게시물을 하나 이상 선택하세요.");
        return false;
    }

    if(document.pressed == "선택복사") {
        select_copy("copy");
        return;
    }

    if(document.pressed == "선택이동") {
        select_copy("move");
        return;
    }

    if(document.pressed == "선택삭제") {
        if (!confirm("선택한 게시물을 정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다\n\n답변글이 있는 게시글을 선택하신 경우\n답변글도 선택하셔야 게시글이 삭제됩니다."))
            return false;

        f.removeAttribute("target");
        f.action = "./board_list_update.php";
    }

    return true;
}

// 선택한 게시물 복사 및 이동
function select_copy(sw) {
    var f = document.fboardlist;

    if (sw == "copy")
        str = "복사";
    else
        str = "이동";

    var sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = "./move.php";
    f.submit();
}
</script>
<?php } ?>
<!-- } 게시판 목록 끝 -->
