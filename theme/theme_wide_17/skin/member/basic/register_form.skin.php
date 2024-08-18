<?php
if (!defined('_MKTBIZASK_')) exit; // 개별 페이지 접근 불가

## 변수
$rf_memberPart  = $_POST['mktjoinPart']; ## > 회원구분 seller/supplyCom/manager
$rf_agree       = $_POST['agree']; ## > 회원가입약관동의 1 > true / 0 > false
$rf_agree2      = $_POST['agree2']; ## > 개인정보처리방침안내동의 1 > true / 0 > false
$rf_chk_all     = $_POST['chk_all']; ## > 모두선택 1 > true / 0 > false

if(!$rf_memberPart) alert('잘못된 회원가입입니다! 다시 가입진행 부탁드립니다!');
switch($rf_memberPart){
    case "seller"    : $rf_memberPartN = "셀러"; break; // 셀러
    case "supplyCom" : $rf_memberPartN = "공급사"; break; // 공급사
    case "manager"   : $rf_memberPartN = "관리자"; break; // 관리자
}

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>

<link rel="stylesheet" href="/css/layout_incLogin.css?v=<?php echo date('ymdHis')?>">

<!-- 회원정보 입력/수정 시작 { -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<script src="<?php echo G5_JS_URL ?>/jquery.register_form.js"></script>
<?php if($config['cf_cert_use'] && ($config['cf_cert_ipin'] || $config['cf_cert_hp'])) { ?>
<script src="<?php echo G5_JS_URL ?>/certify.js?v=<?php echo G5_JS_VER; ?>"></script>
<?php } ?>

<div class="container ety-mt margin-bottom-50">

<form id="fregisterform" name="fregisterform" action="<?php echo $register_action_url ?>" onsubmit="return fregisterform_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off">
<input type="hidden" name="mbmPart" value="<?php echo $rf_memberPart ?>" />
<input type="hidden" name="w" value="<?php echo $w ?>"/>
<input type="hidden" name="url" value="<?php echo $urlencode ?>"/>
<input type="hidden" name="agree" value="<?php echo $agree ?>"/>
<input type="hidden" name="agree2" value="<?php echo $agree2 ?>"/>
<input type="hidden" name="cert_type" value="<?php echo $member['mb_certify']; ?>"/>
<input type="hidden" name="cert_no" value=""/>
<?php if (isset($member['mb_sex'])) {  ?><input type="hidden" name="mb_sex" value="<?php echo $member['mb_sex'] ?>"/><?php }  ?>
<?php if (isset($member['mb_nick_date']) && $member['mb_nick_date'] > date("Y-m-d", G5_SERVER_TIME - ($config['cf_nick_modify'] * 86400))) { // 닉네임수정일이 지나지 않았다면  ?>
<input type="hidden" name="mb_nick_default" value="<?php echo get_text($member['mb_nick']) ?>"/>
<input type="hidden" name="mb_nick" value="<?php echo get_text($member['mb_nick']) ?>"/>
<?php }  ?>
<div id="register_form"  class="form_01">
    
    <div style="margin-bottom:5px;">
        <li><strong><?php echo $rf_memberPartN;?> 회원가입</strong></li>
        <li>※ 전체입력을 해주세요!</li>
        <li>※ 가입후 관리자 승인(2~3일 쇼요)일부터 무료(1개월) 체험 할 수 있습니다.</li>
    </div>
    
    <?php include_once(SHOP_HOME . '/incLogin/mainLogin/incJoin/memberJoin_'.$rf_memberPart.'.inc.php'); ?>
    <ul>
        <li class="cellChk">
            <label for="reg_mb_mailling" class="frm_label" id="reg_mb_maillingLable" style="width:auto;">메일링서비스(정보 메일을 받겠습니다.)</label>
            <input type="checkbox" value="1" id="reg_mb_mailling" <?php echo ($w=='' || $member['mb_mailling'])?'checked':''; ?>/>
        </li>
        <li class="cellChk">
            <label for="reg_mb_sms" class="frm_label" id="reg_mb_smsLable" style="width:auto;">SMS 수신여부(휴대폰 문자메세지를 받겠습니다.)</label>
            <input type="checkbox" value="1" id="reg_mb_sms" <?php echo ($w=='' || $member['mb_sms'])?'checked':''; ?>/>
        </li>

        <input type="hidden" name="mb_open_default" value="<?php echo $member['mb_open'] ?>" style="display:none;"/>
        <input type="checkbox" name="mb_open" value="1" checked style="display:none;"/>

<?php
/*
        <?php if (isset($member['mb_open_date']) && $member['mb_open_date'] <= date("Y-m-d", G5_SERVER_TIME - ($config['cf_open_modify'] * 86400)) || empty($member['mb_open_date'])) { // 정보공개 수정일이 지났다면 수정가능  ?>
        <li>
            <label for="reg_mb_open" class="frm_label">정보공개</label>
            <input type="hidden" name="mb_open_default" value="<?php echo $member['mb_open'] ?>"/>
            <input type="checkbox" name="mb_open" value="1" <?php echo ($w=='' || $member['mb_open'])?'checked':''; ?> id="reg_mb_open"/>
            다른분들이 나의 정보를 볼 수 있도록 합니다.
            <span class="frm_info">
                정보공개를 바꾸시면 앞으로 <?php echo (int)$config['cf_open_modify'] ?>일 이내에는 변경이 안됩니다.
            </span>                
        </li>
        <?php } else {  ?>
        <li>
            정보공개
            <input type="hidden" name="mb_open" value="<?php echo $member['mb_open'] ?>"/>
            <span class="frm_info">
                정보공개는 수정후 <?php echo (int)$config['cf_open_modify'] ?>일 이내, <?php echo date("Y년 m월 j일", isset($member['mb_open_date']) ? strtotime("{$member['mb_open_date']} 00:00:00")+$config['cf_open_modify']*86400:G5_SERVER_TIME+$config['cf_open_modify']*86400); ?> 까지는 변경이 안됩니다.<br>
                이렇게 하는 이유는 잦은 정보공개 수정으로 인하여 쪽지를 보낸 후 받지 않는 경우를 막기 위해서 입니다.
            </span>
            
        </li>
        <?php }  ?>
*/
?>
        <?php
        //회원정보 수정인 경우 소셜 계정 출력
        if( $w == 'u' && function_exists('social_member_provider_manage') ){
            social_member_provider_manage();
        }
        ?>

        <?php if ($w == "" && $config['cf_use_recommend']) {  ?>
        <li>
            <label for="reg_mb_recommend" class="sound_only">추천인아이디</label>
            <input type="text" name="mb_recommend" id="reg_mb_recommend" class="frm_input" placeholder="추천인아이디"/>
        </li>
        <?php }  ?>

        <li class="is_captcha_use">
            자동등록방지
            <?php echo captcha_html(); ?>
        </li>
    </ul>
    
</div>
<div class="btn_confirm">
    <a href="<?php echo G5_URL ?>" class="btn_cancel">취소</a>
    <input type="button" value="<?php echo $w==''?'회원가입':'정보수정'; ?>" id="btn_submit" class="btn_submit" accesskey="s"/>
</div>
</form>


</div>

    <script>
    var mktPrivacyPolicy = '<?php echo $rf_agree?>';
    var mktClauseAgr     = '<?php echo $rf_agree2?>';
    var mktjoinPart      = '<?php echo $rf_memberPart?>';
    </script>
    <script language='javascript' type='text/javascript' src='/js/shopMall/incLogin/mainLogin/memberJoin_<?php echo $rf_memberPart;?>.js'></script>
    <script>
    $(function() {
        $("#reg_zip_find").css("display", "inline-block");

        <?php if($config['cf_cert_use'] && $config['cf_cert_ipin']) { ?>
        // 아이핀인증
        $("#win_ipin_cert").click(function() {
            if(!cert_confirm())
                return false;

            var url = "<?php echo G5_OKNAME_URL; ?>/ipin1.php";
            certify_win_open('kcb-ipin', url);
            return;
        });

        <?php } ?>
        <?php if($config['cf_cert_use'] && $config['cf_cert_hp']) { ?>
        // 휴대폰인증
        $("#win_hp_cert").click(function() {
            if(!cert_confirm())
                return false;

            <?php
            switch($config['cf_cert_hp']) {
                case 'kcb':
                    $cert_url = G5_OKNAME_URL.'/hpcert1.php';
                    $cert_type = 'kcb-hp';
                    break;
                case 'kcp':
                    $cert_url = G5_KCPCERT_URL.'/kcpcert_form.php';
                    $cert_type = 'kcp-hp';
                    break;
                case 'lg':
                    $cert_url = G5_LGXPAY_URL.'/AuthOnlyReq.php';
                    $cert_type = 'lg-hp';
                    break;
                default:
                    echo 'alert("기본환경설정에서 휴대폰 본인확인 설정을 해주십시오");';
                    echo 'return false;';
                    break;
            }
            ?>

            certify_win_open("<?php echo $cert_type; ?>", "<?php echo $cert_url; ?>");
            return;
        });
        <?php } ?>
    });

    // submit 최종 폼체크
    function fregisterform_submit(f)
    {
        // 회원아이디 검사
        if (f.w.value == "") {
            var msg = reg_mb_id_check();
            if (msg) {
                alert(msg);
                f.mb_id.select();
                $('.inputPa').remove();
                return false;
            }
        }

        if (f.w.value == "") {
            if (f.mb_password.value.length < 3) {
                alert("비밀번호를 3글자 이상 입력하십시오.");
                f.mb_password.focus();
                $('.inputPa').remove();
                return false;
            }
        }

        if (f.mb_password.value != f.mb_password_re.value) {
            alert("비밀번호가 같지 않습니다.");
            f.mb_password_re.focus();
            $('.inputPa').remove();
            return false;
        }

        if (f.mb_password.value.length > 0) {
            if (f.mb_password_re.value.length < 3) {
                alert("비밀번호를 3글자 이상 입력하십시오.");
                f.mb_password_re.focus();
                $('.inputPa').remove();
                return false;
            }
        }

        // 이름 검사
        if (f.w.value=="") {
            if (f.mb_name.value.length < 1) {
                alert("이름을 입력하십시오.");
                f.mb_name.focus();
                $('.inputPa').remove();
                return false;
            }

            var pattern = /([^가-힣\x20])/i;
            if (pattern.test(f.mb_name.value)) {
                alert("이름은 한글로 입력하십시오.");
                f.mb_name.select();
                $('.inputPa').remove();
                return false;
            }
        }

        <?php if($w == '' && $config['cf_cert_use'] && $config['cf_cert_req']) { ?>
        // 본인확인 체크
        if(f.cert_no.value=="") {
            alert("회원가입을 위해서는 본인확인을 해주셔야 합니다.");
            $('.inputPa').remove();
            return false;
        }
        <?php } ?>

        // 닉네임 검사
        if ((f.w.value == "") || (f.w.value == "u" && f.mb_nick.defaultValue != f.mb_nick.value)) {
            var msg = reg_mb_nick_check();
            if (msg) {
                alert(msg);
                f.reg_mb_nick.select();
                $('.inputPa').remove();
                return false;
            }
        }

        // E-mail 검사
        if ((f.w.value == "") || (f.w.value == "u" && f.mb_email.defaultValue != f.mb_email.value)) {
            var msg = reg_mb_email_check();
            if (msg) {
                alert(msg);
                f.reg_mb_email.select();
                return false;
            }
        }

        <?php if (($config['cf_use_hp'] || $config['cf_cert_hp']) && $config['cf_req_hp']) {  ?>
        // 휴대폰번호 체크
        var msg = reg_mb_hp_check();
        if (msg) {
            alert(msg);
            f.reg_mb_hp.select();
            return false;
        }
        <?php } ?>

        if (typeof(f.mb_recommend) != "undefined" && f.mb_recommend.value) {
            if (f.mb_id.value == f.mb_recommend.value) {
                alert("본인을 추천할 수 없습니다.");
                f.mb_recommend.focus();
                $('.inputPa').remove();
                return false;
            }

            var msg = reg_mb_recommend_check();
            if (msg) {
                alert(msg);
                f.mb_recommend.select();
                $('.inputPa').remove();
                return false;
            }
        }

        <?php echo chk_captcha_js();  ?>

        document.getElementById("btn_submit").disabled = "disabled";

        return true;
    }
    </script>

<!-- } 회원정보 입력/수정 끝 -->