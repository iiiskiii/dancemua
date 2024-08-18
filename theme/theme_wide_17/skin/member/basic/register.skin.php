<?php
if (!defined('_MKTBIZASK_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>

<!-- 회원가입약관 동의 시작 { -->
<div class="container ety-mt margin-bottom-50 padding-top-50">

    <?php
    // 소셜로그인 사용시 소셜로그인 버튼
    @include_once(get_social_skin_path().'/social_register.skin.php');
    ?>

    <form  name="fregister" id="fregister" action="<?php echo $register_action_url ?>" onsubmit="return fregister_submit(this);" method="POST" autocomplete="off">

	<span class="register" style="font-size:16px;font-weight:bold;">회원가입약관</span>
    <section id="fregister_term">
        <textarea readonly><?php echo get_text($config['cf_stipulation']) ?></textarea>
    </section>
    <div class="agree cellChk">
		<label for="agree11" id="caChkbox" class=""><span>회원가입약관의 내용에 동의합니다.</span></label>
		<input type="checkbox" name="agree" value="1" id="agree11">
	</div>

	<span class="register" style="font-size:16px;font-weight:bold;">개인정보처리방침안내</span>
    <section id="fregister_private">
        <div>
            <table>
                <caption>개인정보처리방침안내</caption>
                <thead>
                <tr>
                    <th>목적</th>
                    <th>항목</th>
                    <th>보유기간</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>이용자 식별 및 본인여부 확인</td>
                    <td>아이디, 이름, 비밀번호</td>
                    <td>회원 탈퇴 시까지</td>
                </tr>
                <tr>
                    <td>고객서비스 이용에 관한 통지,<br>CS대응을 위한 이용자 식별</td>
                    <td>연락처 (이메일, 휴대전화번호)</td>
                    <td>회원 탈퇴 시까지</td>
                </tr>
                </tbody>
            </table>
        </div>
    </section>
    <div class="agree2 cellChk">
		<label for="agree21" id="ppChkbox" class=""><span>개인정보처리방침안내의 내용에 동의</span></label>
		<input type="checkbox" name="agree2" value="1" id="agree21">
	</div>

    <span class="register" style="font-size:16px;font-weight:bold;">가입회원구분</span>
    <div class="mainJoinPart">
        <ul class="JoinPartSeller">
            <li class="seller">
                <dd>셀러 회원가입</dd>
                <dd>여러오픈마켓에서 매출증진을 원하는 셀러!!</dd>
                <dd>상품군을 골라 매출과 수익이 기다립니다!!</dd>
                <!-- <dd><a href="f#" onclick="return false;" class="goJoinPart" data-name="seller" data-text="셀러 회원가입">셀러 회원가입</a></dd> -->
            </li>
        </ul>
        <ul class="JoinPartSupplyCom">
            <li class="supplyCom">
                <dd>공급사 회원가입</dd>
                <dd>파트너스 회원으로 상품공급만 집중!!</dd>
                <dd>매출극대화, 최고의 공급사로 만들어 드립니다!!</dd>
                <!-- <dd><a href="f#" onclick="return false;" class="goJoinPart" data-name="supplyCom" data-text="공급사 회원가입">공급사 회원가입</a></dd> -->
            </li>
        </ul>
        <ul class="JoinPartManager">
        </ul>
    </div>

    <div id="fregister_chkall" class="agree cellChk">
        <label for="chk_all" id="alChkbox" class=""><span>전체선택 / 회원가입약관 및 개인정보처리방침안내의 내용에 동의하셔야 회원가입 하실 수 있습니다.</span></label>
        <input type="checkbox" name="chk_all"  value="1"  id="chk_all">
    </div>

    <div class="btn_confirm">
        <input type="submit" class="btn_submit" value="회원가입">
    </div>

    </form>

    <script>
    var nowIp = "<?php echo $_SERVER['REMOTE_ADDR'];?>";
    </script>
    <script language='javascript' type='text/javascript' src='/js/shopMall/incLogin/mainLogin/memberJoinSel.js'></script>
    <script>
    function fregister_submit(f)
    {
        if (!f.agree.checked) {
            alert("회원가입약관의 내용에 동의하셔야 회원가입 하실 수 있습니다.");
            f.agree.focus();
            return false;
        }

        if (!f.agree2.checked) {
            alert("개인정보처리방침안내의 내용에 동의하셔야 회원가입 하실 수 있습니다.");
            f.agree2.focus();
            return false;
        }

        var newForm = $('form[name="fregister"]');
        var mktjoinPart = $('.mainJoinPart > ul.actv > li').attr('class');
        if(!mktjoinPart){
            alert("가입회원구분을 선택해 주세요!");
            return false;
        }
        newForm.append($('<input/>', {type: 'hidden', name: 'mktjoinPart', value:mktjoinPart }));

        return true;
    }
    
    jQuery(function($){
        // 모두선택
        $("input[name=chk_all]").click(function() {
            if ($(this).prop('checked')) {
                $("input[name^=agree]").prop('checked', true);
            } else {
                $("input[name^=agree]").prop("checked", false);
            }
        });
    });

    </script>
</div>
<!-- } 회원가입 약관 동의 끝 -->
