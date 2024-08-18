<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);

$year_next = $_REQUEST['year_next'];
?>
<style>
#bo_w {padding-bottom:10px;}
.ctin-btnask {padding:5px;border:1px #d0d0d0 solid;}
.ctn_btn {margin-right: 4px;}
.ctn_btnn {margin-right: 6px;}

</style>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<section id="bo_w">
    <h2 id="container_title"><?php echo $g5['title'] ?></h2>

    <form name="fwrite" id="fwrite" action="<?php echo $action_url ?>" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off">
    <input type="hidden" name="w" value="<?php echo $w ?>" />
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>" />
    <input type="hidden" name="wr_id" value="<?php echo $wr_id ?>" />
    <input type="hidden" name="sca" value="<?php echo $sca ?>" />
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>" />
    <input type="hidden" name="stx" value="<?php echo $stx ?>" />
    <input type="hidden" name="spt" value="<?php echo $spt ?>" />
    <input type="hidden" name="sst" value="<?php echo $sst ?>" />
    <input type="hidden" name="sod" value="<?php echo $sod ?>" />
    <input type="hidden" name="page" value="<?php echo $page ?>" />
	<input type="hidden" name="wr_content" value="DANCEMUA" />
<?php if($year_next){ ?>
	<input type="hidden" name="wr_subject" value="<?php echo $subject; ?>" /><!-- 한글이름 -->
	<input type="hidden" name="wr_1" value="<?php echo $write['wr_1']; ?>" /><!-- 영문이름 -->
	<input type="hidden" name="wr_3" value="<?php echo $write['wr_3']; ?>" /><!-- 휴대폰번호 -->
	<input type="hidden" name="wr_4" value="<?php echo $write['wr_4']; ?>" /><!-- 이메일번호 -->
	<input type="hidden" name="wr_5" value="<?php echo $write['wr_5']; ?>" /><!-- 역할작성 -->
	<input type="hidden" name="wr_6" value="<?php echo $write['wr_6']; ?>" /><!-- 활동분야작성 -->
	<input type="hidden" name="wr_7" value="<?php echo $write['wr_7']; ?>" /><!-- 소속단체 작성 -->
	<input type="hidden" name="wr_2" value="<?php echo $write['wr_2']; ?>" /><!-- 학력 작성 -->
<?php }else{ ?>
	<input type="hidden" name="wr_8" value="<?php echo $write['wr_8']; ?>" /><!-- 개인공연/안무경력/출연경력 작성 -->
<?php } ?>
    <div class="tbl_frm01 tbl_wrap">
        <table style="width:98%;margin:0 auto;">
        <caption><?php echo $g5['title'] ?></caption>
        <tbody>

		<?php for ($i=0; $is_file && $i<$file_count; $i++) { ?>
        <tr>
            <th scope="row">파일 #<?php echo $i+1 ?></th>
            <td>
                <input type="file" name="bf_file[]" title="파일첨부 <?php echo $i+1 ?> :  용량 <?php echo $upload_max_filesize ?> 이하만 업로드 가능" class="frm_file frm_input">
                <?php if ($is_file_content) { ?>
                <input type="text" name="bf_content[]" value="<?php echo ($w == 'u') ? $file[$i]['bf_content'] : ''; ?>" title="파일 설명을 입력해주세요." class="frm_file frm_input">
                <?php } ?>
                <?php if($w == 'u' && $file[$i]['file']) { ?>
                <input type="checkbox" id="bf_file_del<?php echo $i ?>" name="bf_file_del[<?php echo $i; ?>]" value="1"> <label for="bf_file_del<?php echo $i ?>"><?php echo $file[$i]['source'].'('.$file[$i]['size'].')'; ?> 파일 삭제</label>
                <?php } ?>
            </td>
        </tr>
        <?php } ?>
<?php if(!$year_next){ ?>
        <tr>
            <th scope="row"><label for="wr_subject">이름(한글) 작성<strong class="sound_only">필수</strong></label></th>
            <td><input type="text" name="wr_subject" value="<?php echo $subject ?>" id="wr_subject" required class="frm_input required" maxlength="4"></td>
        </tr>
		<tr>
            <th scope="row"><label for="wr_1">이름(영문) 작성<strong class="sound_only">필수</strong></label></th>
            <td><input type="text" name="wr_1" value="<?php echo $write['wr_1']; ?>" id="wr_1" required class="frm_input required" style="width: 100%;" maxlength="30"></td>
        </tr>
		<tr>
            <th scope="row"><label for="wr_3">휴대폰번호 작성("-"하이픈 필수입력)<strong class="sound_only">필수</strong></label></th>
            <td><input type="text" name="wr_3" value="<?php echo $write['wr_3']; ?>" id="wr_3" required class="frm_input required" style="width: 100%;" maxlength="13"></td>
        </tr>
		<tr>
            <th scope="row"><label for="wr_4">이메일 작성<strong class="sound_only">필수</strong></label></th>
            <td><input type="text" name="wr_4" value="<?php echo $write['wr_4']; ?>" id="wr_4" required class="frm_input required" style="width: 100%;" maxlength="30"></td>
        </tr>
		<tr>
            <th scope="row"><label for="wr_5">역할 작성</label></th>
            <td><input type="text" name="wr_5" value="<?php echo $write['wr_5']; ?>" id="wr_5" class="frm_input" style="width: 100%;"></td>
        </tr>
		<tr>
            <th scope="row"><label for="wr_6">활동분야 작성</label></th>
            <td><input type="text" name="wr_6" value="<?php echo $write['wr_6']; ?>" id="wr_6" class="frm_input" style="width: 100%;"></td>
        </tr>
		<tr>
            <th scope="row"><label for="wr_7">소속단체 작성</label></th>
            <td><input type="text" name="wr_7" value="<?php echo $write['wr_7']; ?>" id="wr_7" class="frm_input" style="width: 100%;"></td>
        </tr>
		<tr>
            <th scope="row"><label for="wr_2">학력 작성<strong class="sound_only">필수</strong></label></th>
            <td class="wr_2_list">
			<?php $cdm_wr_2=explode("↕",$write['wr_2']); /* wr_2를 나누기 */ for($wa=0;$wa<count($cdm_wr_2);$wa++){ if($cdm_wr_2[$wa]){ ?>
			<div style="width:100%;padding:2px 0px;" class="wr_2_list_in">
				<a href="javascript:;" class='ctin-btnask wr_2_list_update'>+</a>
				<a href="javascript:;" class='ctin-btnask wr_2_list_delete'>-</a>
				<input type="text" name="wr_2A[]" value="<?php echo $cdm_wr_2[$wa]; ?>" required class="frm_input" style="width: 80%;" />
			</div>
			<?php } } ?>
			<div style="width:100%;padding:2px 0px;" class="wr_2_list_in">
				<a href="javascript:;" class='ctin-btnask wr_2_list_update'>+</a>
				<a href="javascript:alert('삭제가 불가능합니다.')" class='ctin-btnask'>-</a>
				<input type="text" name="wr_2A[]" value="" class="frm_input" style="width: 80%;" />
			</div>
			</td>
        </tr>
		<?php if(!$write['wr_8']){ ?>
		<tr>
            <th scope="row"><label for="wr_8">개인공연/안무경력/출연경력 작성<br/>년도에 상관없이 빈곳에 입력하시면 자동 정령됩니다.<br/><strong class="sound_only">필수</strong></label></th>
            <td class="wr_8_list">
				<div style="width:100%;padding:2px 0px;" class="wr_8_list_in">
					<a href="javascript:;" class='ctin-btnask wr_8_list_update'>+</a>
					<a href="javascript:alert('삭제가 불가능합니다.')" class='ctin-btnask'>-</a>
					<input type="text" name="wr_8A[]" value="" class="frm_input datepicker" style="width: 8%;margin-right:2px;" />
					<input type="text" name="wr_8B[]" value="" class="frm_input" style="width: 70%;" />
				</div>
			</td>
        </tr>
		<?php } ?>
<?php }else{ // $year_next 0000년도로 받음 ?>
		<tr>
            <th scope="row"><label for="wr_8">개인공연/안무경력/출연경력 작성<br/>년도에 상관없이 빈곳에 입력하시면 자동 정령됩니다.<br/><strong class="sound_only">필수</strong></label></th>
            <td class="wr_8_list">
			<?php 
			$cdm_wr_8=explode("↕",$write['wr_8']); /* wr_8를 나누기 */ 
				for($wb=0;$wb<count($cdm_wr_8);$wb++){ 
					if($cdm_wr_8[$wb]){ 
						$ABn = substr($cdm_wr_8[$wb], 0, 4); //년
						if($ABn == $year_next){
			?>
				<div style="width:100%;padding:2px 0px;" class="wr_8_list_in">
					<a href="javascript:;" class='ctin-btnask wr_8_list_update'>+</a>
					<a href="javascript:;" class='ctin-btnask wr_8_list_delete'>-</a>
					<input type="text" name="wr_8A[]" value="<?php echo substr($cdm_wr_8[$wb],0,10); ?>" required class="frm_input datepicker" style="width: 8%;margin-right:2px;" />
					<input type="text" name="wr_8B[]" value="<?php echo str_replace(substr($cdm_wr_8[$wb],0,10),"",$cdm_wr_8[$wb]); ?>" required class="frm_input" style="width: 70%;" />
				</div>
				<?php }else{ ?>
					<input type="hidden" name="wr_8A[]" value="<?php echo substr($cdm_wr_8[$wb],0,10); ?>" />
					<input type="hidden" name="wr_8B[]" value="<?php echo str_replace(substr($cdm_wr_8[$wb],0,10),"",$cdm_wr_8[$wb]); ?>" />
				<?php } } } ?>
				<div style="width:100%;padding:2px 0px;" class="wr_8_list_in">
					<a href="javascript:;" class='ctin-btnask wr_8_list_update'>+</a>
					<a href="javascript:alert('삭제가 불가능합니다.')" class='ctin-btnask'>-</a>
					<input type="text" name="wr_8A[]" value="" class="frm_input datepicker" style="width: 8%;margin-right:2px;" />
					<input type="text" name="wr_8B[]" value="" class="frm_input" style="width: 70%;" />
				</div>
			</td>
        </tr>
<?php } ?>
        <?php if ($is_guest) { //자동등록방지 ?>
        <tr>
            <th scope="row">자동등록방지</th>
            <td>
                <?php echo $captcha_html ?>
            </td>
        </tr>
        <?php } ?>

        </tbody>
        </table>
    </div>

    <div class="btn_confirm">
        <input type="submit" value="작성완료" id="btn_submit" class="btn_submit" accesskey="s">
        <a href="<?php echo G5_BBS_URL; ?>/board.php?bo_table=<?php echo $bo_table ?>" class="btn_cancel">취소</a>
    </div>
    </form>
</section>

<script>
<?php if($write_min || $write_max) { ?>
// 글자수 제한
var char_min = parseInt(<?php echo $write_min; ?>); // 최소
var char_max = parseInt(<?php echo $write_max; ?>); // 최대
check_byte("wr_content", "char_count");

$(function() {
    $("#wr_content").on("keyup", function() {
        check_byte("wr_content", "char_count");
    });
});

<?php } ?>
function html_auto_br(obj)
{
    if (obj.checked) {
        result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
        if (result)
            obj.value = "html2";
        else
            obj.value = "html1";
    }
    else
        obj.value = "";
}

function fwrite_submit(f)
{
    <?php echo $editor_js; // 에디터 사용시 자바스크립트에서 내용을 폼필드로 넣어주며 내용이 입력되었는지 검사함   ?>

    var subject = "";
    var content = "";
    $.ajax({
        url: g5_bbs_url+"/ajax.filter.php",
        type: "POST",
        data: {
            "subject": f.wr_subject.value,
            "content": f.wr_content.value
        },
        dataType: "json",
        async: false,
        cache: false,
        success: function(data, textStatus) {
            subject = data.subject;
            content = data.content;
        }
    });

    if (subject) {
        alert("제목에 금지단어('"+subject+"')가 포함되어있습니다");
        f.wr_subject.focus();
        return false;
    }

    if (content) {
        alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
        if (typeof(ed_wr_content) != "undefined")
            ed_wr_content.returnFalse();
        else
            f.wr_content.focus();
        return false;
    }

    if (document.getElementById("char_count")) {
        if (char_min > 0 || char_max > 0) {
            var cnt = parseInt(check_byte("wr_content", "char_count"));
            if (char_min > 0 && char_min > cnt) {
                alert("내용은 "+char_min+"글자 이상 쓰셔야 합니다.");
                return false;
            }
            else if (char_max > 0 && char_max < cnt) {
                alert("내용은 "+char_max+"글자 이하로 쓰셔야 합니다.");
                return false;
            }
        }
    }

     <?php echo $captcha_js; // 캡챠 사용시 자바스크립트에서 입력된 캡챠를 검사함  ?>

    document.getElementById("btn_submit").disabled = "disabled";

    return true;
}

jQuery(document).ready(function(){
	jQuery(document).on("click",".wr_2_list_delete",function(){ //추가한부분 삭제 처리하기
		var myIndex = jQuery(this).parent("div").index();
		jQuery(".wr_2_list div:eq("+myIndex+")").detach();
	});
	jQuery(document).on("click",".wr_2_list_update",function(){ //추가처리하기
		var myIndex = jQuery(this).parent("div").index();
		jQuery(".wr_2_list div:eq("+myIndex+")").before("<div style='width:100%;padding:2px 0px;' class='wr_2_list_in'><a href='javascript:;' class='ctin-btnask wr_2_list_update ctn_btn'>+</a><a href='javascript:;' class='ctin-btnask wr_2_list_delete ctn_btn'>-</a><input type='text' name='wr_2A[]' value='' class='frm_input' required style='width: 80%;' /></div>");
	});
	jQuery(document).on("click",".wr_8_list_delete",function(){ //추가한부분 삭제 처리하기
		var myIndex = jQuery(this).parent("div").index();
		jQuery(".wr_8_list div:eq("+myIndex+")").detach();
	});
	jQuery(document).on("click",".wr_8_list_update",function(){ //추가처리하기
		var myIndex = jQuery(this).parent("div").index();
		jQuery(".wr_8_list div:eq("+myIndex+")").before("<div style='width:100%;padding:2px 0px;' class='wr_8_list_in'><a href='javascript:;' class='ctin-btnask wr_8_list_update ctn_btn'>+</a><a href='javascript:;' class='ctin-btnask wr_8_list_delete ctn_btn'>-</a><input type='text' name='wr_8A[]' value='' class='frm_input datepicker ctn_btnn' required style='width: 8%;' /><input type='text' name='wr_8B[]' value='' class='frm_input' required style='width: 70%;' /></div>");
	});
	jQuery(document).on("click",".datepicker",function(){
		datep();
	});
});
function datep(){ //달력
	jQuery(".datepicker").datepicker({
		  showMonthAfterYear:true
		, monthNames:['년 1월','년 2월','년 3월','년 4월','년 5월','년 6월','년 7월','년 8월','년 9월','년 10월','년 11월','년 12월']
		, monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월']
		, dayNamesMin: ['일','월','화','수','목','금','토']
		, weekHeader: 'Wk'
		, dateFormat: 'yy-mm-dd'
		, changeMonth: true
		, changeYear: true
		, yearRange: '1990:<?php echo date(Y)+1; ?>'
		, beforeShowDay: noBeforeA
	});
	// 이전 날짜들은 선택막기 
	function noBeforeA(date){
		if (date > new Date()){
			return [false]; 
		}
		return [true];
	}
}

jQuery(function(){
	datep();
});
</script>
