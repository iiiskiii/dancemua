<?php
if (!defined('_MKTBIZASK_')) exit; // 개별 페이지 접근 불가

## 로그인전 로그아웃으로 세션초기화
$_SESSION = array();
$member = array();

$gl_member_login		        = '';
$gl_member_id			        = '';
$gl_member_mail			        = '';
$gl_member_name			        = '';
$gl_member_part			        = '';
$gl_member_part_name	        = '';
$gl_member_part_sub             = '';
$gl_member_master_id	        = '';
$gl_member_no			        = '';
$gl_member_com_name             = '';
$gl_member_ip			        = '';

$is_guest                       = '';
$is_member                      = '';
$is_admin                       = '';

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="/css/layout_lib.css" rel="stylesheet">
<link href="/css/layout_incLogin.css" rel="stylesheet">
<link href="<?php echo G5_THEME_URL?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="/js/common.lib.js"></script>
<script src="/js/commonList/commonList.js"></script>

<form name="flogin" class="form-signin" action="<?php echo $login_action_url ?>" onsubmit="return flogin_submit(this);" method="post" enctype="multipart/form-data">
<input type="hidden" name="url" value="<?php echo $login_url ?>">
<div class="container">
	
<div id="loginTable">
    <div class="logoZone">
        <a href="/"><img src="/upload/mktLogo/maketseller400300LogoAll.png" class="logoImg"/></a>
    </div>
    <div class="mainLogin">
        <ul class="topJoinBar">
            <li>
                <dd class="memberJoin_top topBar" data-name="seller" data-tag="셀러">셀러 로그인</dd>
            </li>
            <li>
                <dd class="supplyComJoin_top topBar" data-name="supplyCom" data-tag="공급사">공급사 로그인</dd>
            </li>
            <li>
                <dd class="managerJoin_top topBar" data-name="manager" data-tag="매니저">매니저 로그인</dd>
            </li>
        </ul>
        <ul class="memberJoin joinBar">
            <li class="joinCon">
                <dd>&nbsp;&nbsp;셀러 아이디</dd>
                <dd><input type="text" class="sjoinId" maxlength="15" placeholder="셀러 아이디"/></dd>
            </li>
            <li class="joinCon">
                <dd>&nbsp;&nbsp;셀러 비밀번호</dd>
                <dd><input type="password" class="sjoinPassWord" maxlength="15" placeholder="셀러 비밀번호"/><i class="fa fa-eye-slash fa-lg eyesFa"></i></dd>
            </li>
            <li class="toolLogin">
                <span class="cellChk">
                    <input type="checkbox" id="sjIdsave" name="sjIdsave" class="inp_check" onchange="chkSave()">
                    <label for="sjIdsave" id="chkbox" class="">아이디저장</label>
                </span>
                <a href="./" class="link_g link_pwFind" data-name="seller">비밀번호 찾기</a>
            </li>
        </ul>
        <ul class="supplyComJoin joinBar">
            <li class="joinCon">
                <dd>&nbsp;&nbsp;공급사 사업자번호<span>(하이픈'-'제외)</span></dd>
                <dd><input type="text" class="cjoinCorRegiNum" maxlength="12" placeholder="공급사 사업자번호(하이픈'-'제외)"/></dd>
            </li>
            <li class="joinCon">
                <dd>&nbsp;&nbsp;공급사 아이디</dd>
                <dd><input type="text" class="cjoinId" maxlength="15" placeholder="공급사 아이디"/></dd>
            </li>
            <li class="joinCon">
                <dd>&nbsp;&nbsp;공급사 비밀번호</dd>
                <dd><input type="password" class="cjoinPassWord" maxlength="15" placeholder="공급사 비밀번호"/><i class="fa fa-eye-slash fa-lg eyesFa"></i></dd>
            </li>
            <li class="toolLogin">
                <span class="cellChk">
                    <input type="checkbox" id="cjIdsave" name="cjIdsave" class="inp_check" onchange="chkSave()">
                    <label for="cjIdsave" id="chkbox" class="">아이디저장</label>
                </span>
                <a href="./" class="link_g link_pwFind" data-name="supplyCom">비밀번호 찾기</a>
            </li>
        </ul>
        <ul class="managerJoin joinBar">
            <li class="joinCon">
                <dd>&nbsp;&nbsp;매니저 마스터코드</dd>
                <dd><input type="text" class="mJoinCode" maxlength="7" placeholder="매니저 마스터코드"/></dd>
            </li>
            <li class="joinCon">
                <dd>&nbsp;&nbsp;매니저 아이디</dd>
                <dd><input type="text" class="mjoinId" maxlength="15" placeholder="매니저 아이디"/></dd>
            </li>
            <li class="joinCon">
                <dd>&nbsp;&nbsp;매니저 비밀번호</dd>
                <dd><input type="password" class="mjoinPassWord" maxlength="15" placeholder="매니저 비밀번호"/><i class="fa fa-eye-slash fa-lg eyesFa"></i></dd>
            </li>
            <li class="toolLogin">
                <span class="cellChk">
                    <input type="checkbox" id="mjIdsave" name="mjIdsave" class="inp_check" onchange="chkSave()">
                    <label for="mjIdsave" id="chkbox" class="">아이디저장</label>
                </span>
                <a href="./" class="link_g link_pwFind" data-name="manager">비밀번호 찾기</a>
            </li>
        </ul>
        <ul class="firText">
            <li class="smlTextBox">
                <a href="f#" onclick="return false;" class="submitBtn" data-text="로그인">로그인</a>
            </li>
            <li class="smlJoinMemberBox"></li>
            <li class="smlCancel">
                <a href="f#" onclick="return false;" class="cancelBtn" data-text="취소">취소</a>
            </li>
        </ul>
    <div>
<script>
var nowIp = "<?php echo $_SERVER['REMOTE_ADDR'];?>";
</script>
<script language='javascript' type='text/javascript' src='/js/shopMall/incLogin/mainLogin/memberLogin.js'></script>
	
</div><!-- /container -->
</form>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="<?php echo G5_THEME_URL?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
$(function(){
    //$("#login_auto_login").click(function(){
	$("#sjIdsave, #cjIdsave, #mjIdsave").click(function(){
        if (this.checked) {
            this.checked = confirm("자동로그인을 사용하시면 다음부터 회원아이디와 비밀번호를 입력하실 필요가 없습니다.\n\n공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?");
        }
    });
});

function flogin_submit(f)
{
    return true;
}
</script>
<!-- } 로그인 끝 -->


