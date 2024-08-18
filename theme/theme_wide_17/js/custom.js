/*

http://ety.kr

*/

/*

$(function() {

	// navbar
	const $dropdown = $(".dropdown");
	const $dropdownToggle = $(".dropdown-toggle");
	const $dropdownMenu = $(".dropdown-menu");
	const showClass = "show";

	$(window).on("load resize", function() {
	  if (this.matchMedia("(min-width: 768px)").matches) {
		$dropdown.hover(
		  function() {
			const $this = $(this);
			$this.addClass(showClass);
			$this.find($dropdownToggle).attr("aria-expanded", "true");
			$this.find($dropdownMenu).addClass(showClass);
		  },
		  function() {
			const $this = $(this);
			$this.removeClass(showClass);
			$this.find($dropdownToggle).attr("aria-expanded", "false");
			$this.find($dropdownMenu).removeClass(showClass);
		  }
		);
	  } else {
		$dropdown.off("mouseenter mouseleave");
	  }
	});

});
*/


$(".sendmail").click(function(){
	var surl = $("#send_url").val();
	var ety_name = $("input[name=ety_name]").val();
	var ety_phone = $("input[name=ety_phone]").val();
	var ety_email = $("input[name=ety_email]").val();
	var ety_content = $("#ety_content").val();

	if(ety_name == '')
	{
		alert('담당자를 입력해주세요.');
		return false;
	}
	if(ety_phone == '')
	{
		alert('연락처를 입력해주세요.');
		return false;
	}
	if(ety_email == '')
	{
		alert('이메일을 입력해주세요.');
		return false;
	}
	if(ety_content == '')
	{
		alert('문의내용을 입력해주세요.');
		return false;
	}


	if($("input:checkbox[name=agree]").is(":checked") != true) {
		alert('이용약관에 동의하셔야 합니다.');
		return false;
	}

	var url = surl + "/contact.php";
	var params = "ety_name=" + ety_name + "&ety_phone=" + ety_phone + "&ety_email=" + ety_email + "&ety_content=" + ety_content;

	$.ajax({      
		type:"POST",  
		url:url,
		data:params,
		success:function(data){	
			alert('문의가 등록되었습니다. 최대한 빠르게 연락드리겠습니다.')
			location.reload();
		}
	});

});

$(function(e){

	// 매인 매뉴 클릭 스크롤 이동
	$('.nav-item > a').click(function(){
		var _thisText = $(this).text(); // information clickMove
		var clickClass = '';
		switch(_thisText){
			case "마켓셀러란" : clickClass = "information"; break;
			case "기능소개"   : clickClass = "skillInfo"; break;
			case "서비스안내" : clickClass = "serviceInfoCon"; break;
			case "요금안내"   : clickClass = "priceListInfo"; break;
			case "공급사안내" : clickClass = "supplyComInfoCon"; break;
		}
		if(!clickClass) return;
		var hostUrl = window.location.pathname;
		var protocol = window.location.protocol;
		if(hostUrl.indexOf('bbs') != -1) {
			location.href = protocol + '//' + window.location.host + '?pageMove='+clickClass;
		}else{
			clickMenuMove(clickClass);
		}
	});

	// 실시간 글자수 체크
	$('.supplyInput').keyup(function(e){
		var className 	= $(this).siblings('span');
		var content 	= $(this).val();
		var maxLen  	= $(this).attr('maxlength');
		className.html("(" + content.length + "/ " + maxLen + "자)"); //실시간 글자수 카운팅
		if(content.length > maxLen){
			//Alert("최대 " + maxLen + "자까지 입력 가능합니다.");
			$(this).val(content.substring(0, maxLen));
			className.html("(" + maxLen + " / " + maxLen + "자)");
		}
    });

	// 숫자와 하이픈만 허용
	$(document).on(' keyup blur ', ' .supplyComPhoNum ', function(){
		//console.log('vv1');
		var _intPrice = $(this).val();
		//var intPrice = _intPrice.replace(/[^0-9-]/g,''); //숫자,하이픈만허용
		var intPrice = _intPrice.replace(new RegExp(/[^\d\-]/,'ig'), "");
		$(this).val( intPrice );
	});

	// 파트너메모
	$('.submitBtn').click(function(){
		var $obj		 = '';
		var _thisIs 	 = $(this);
		var _thisIsClass = _thisIs.closest('p.firText').siblings('p.smlPartBox');
		var $arrVal 	 = new Array();
		var alertLsit	 = '';
		
		try{

			$obj 		= _thisIsClass.find('.supplyComMemName');
			var maxLen  = $obj.attr('maxlength');
			if(!$obj.val()) 				throw "이름(실명)이 필수 입력 입니다! [MEMO430001]";
			if($obj.val().length>maxLen) 	throw "이름(실명)은 "+maxLen+"자 내로 입력부탁드립니다! [MEMO430011]";
			if($obj.val().length<2) 		throw "이름(실명)은 두자 이상 입력부탁드립니다! [MEMO430101]";
			if(!!Number($obj.val())==true) 	throw "이름(실명)은 문자 입력부탁드립니다! [MEMO430201]"; // 숫자이면 true
			$arrVal['SCQM_SUPPLY_COM_MEMBER_NAME'] = $obj.val(); //이름(실명)
			alertLsit += "이름(실명) : " + $obj.val() + "\n";

			$obj 		= _thisIsClass.find('.supplyComComName');
			var maxLen  = $obj.attr('maxlength');
			if(!$obj.val()) 				throw "회사명은 필수 입력 입니다! [MEMO430002]";
			if($obj.val().length>maxLen) 	throw "회사명은 "+maxLen+"자 내로 입력부탁드립니다! [MEMO430012]";
			if($obj.val().length<2) 		throw "회사명은 두자 이상 입력부탁드립니다! [MEMO430102]";
			if(!!Number($obj.val())==true) 	throw "회사명은 문자 입력부탁드립니다! [MEMO430202]"; // 숫자이면 true
			$arrVal['SCQM_SUPPLY_COM_COMPANY_NAME'] = $obj.val(); //회사명
			alertLsit += " 회사명 : " + $obj.val() + "\n";

			$obj 		= _thisIsClass.find('.supplyComComUrl');
			if($obj.val()){ // 두자 이상, 문자만, URL 허용
				if($obj.val().length<2) 	throw "회사홈페이지(URL)은 두자 이상 입력부탁드립니다! [MEMO430103]";
				var maxLen  = $obj.attr('maxlength');
				var expUrl = /^http[s]?\:\/\//i; // url 형식인지를 체크( http, https 를 포함하는 형식 ) 확인
				if(!expUrl.test($obj.val())){ $obj.val("http://" + $obj.val()); }
				var Url = /(http|https):\/\/((\w+)[.])+(asia|biz|cc|cn|com|de|eu|in|info|jobs|jp|kr|mobi|mx|name|net|nz|org|travel|tv|tw|uk|us)(\/(\w*))*$/i;
				var urlTest = Url.test($obj.val());
				if(!urlTest) 				throw "URL형식이 잘못되었습니다. [MEMO430013]";
				if($obj.val().length>maxLen)throw "회사홈페이지(URL)은 "+maxLen+"자 내로 입력부탁드립니다! [MEMO430014]";
				$arrVal['SCQM_SUPPLY_COM_COMPANY_URL'] = $obj.val(); //회사홈페이지(URL)
				alertLsit += " 회사홈페이지(URL) : " + $obj.val() + "\n";
			}

			$obj 		= _thisIsClass.find('.supplyComPhoNum');
			var maxLen  = $obj.attr('maxlength');
			var regExp = /^(01[016789]{1}|02|0[3-9]{1}[0-9]{1})-?[0-9]{3,4}-?[0-9]{4}$/;
			if(!$obj.val()) 				throw "연락받으실번호는 필수 입력 입니다! [MEMO430005]";
			if($obj.val().length>maxLen) 	throw "연락받으실번호는 "+maxLen+"자 내로 입력부탁드립니다! [MEMO430015]";
			if(!regExp.test($obj.val())) 	throw "연락받으실번호는 잘못된 형식 입니다! [MEMO430016]";
			$arrVal['SCQM_SUPPLY_COM_PHONE_NUM'] = $obj.val(); //연락받으실번호
			alertLsit += " 연락받으실번호 : " + $obj.val() + "\n";

			$obj 		= _thisIsClass.find('.supplyComEmail');
			var maxLen  = $obj.attr('maxlength');
			var regExp = /^[A-Za-z0-9_\.\-]+@[A-Za-z0-9\-]+\.[A-Za-z0-9\-]+/;
			if(!$obj.val()) 				throw "이메일은 필수 입력 입니다! [MEMO430007]";
			if($obj.val().length>maxLen) 	throw "이메일은 "+maxLen+"자 내로 입력부탁드립니다! [MEMO430017]";
			if(!regExp.test($obj.val())) 	throw "이메일은 잘못된 형식 입니다! [MEMO430018]";
			$arrVal['SCQM_SUPPLY_COM_EMAIL'] = $obj.val(); //이메일
			alertLsit += " 이메일 : " + $obj.val() + "\n";

			$obj 		= _thisIsClass.find('.supplyComCategory');
			var maxLen  = $obj.attr('maxlength');
			if(!$obj.val()) 				throw "취급상품군은 필수 입력 입니다! [MEMO430010]";
			if($obj.val().length>maxLen) 	throw "취급상품군은 "+maxLen+"자 내로 입력부탁드립니다! [MEMO430020]";
			if($obj.val().length<2) 		throw "취급상품군은 두자 이상 입력부탁드립니다! [MEMO430109]";
			$arrVal['SCQM_SUPPLY_COM_CATEGORY'] = $obj.val(); //취급상품군(50자까지)
			alertLsit += " 취급상품군 : " + $obj.val() + "\n";

			$obj 		= _thisIsClass.find('.supplyComMemo');
			var maxLen  = $obj.attr('maxlength');
			if(!$obj.val()) 				throw "간단내용은 필수 입력 입니다! [MEMO430009]";
			if($obj.val().length>maxLen) 	throw "간단내용은 "+maxLen+"자 내로 입력부탁드립니다! [MEMO430019]";
			if($obj.val().length<2) 		throw "간단내용은 최소 두자 이상 입력부탁드립니다! [MEMO430104]";
			$arrVal['SCQM_SUPPLY_COM_MEMO'] = $obj.val(); //간단내용작성(50자까지)
			alertLsit += " 간단내용 : " + $obj.val() + "\n";

			var check1 = $('#mktPrivacyPolicy').is(':checked');
			if (check1!==true) throw "마켓셀러 개인정보처리방침 동의 하셔야 전송 됩니다! [MEMO430201]";

			// 값이있을때 입력한다
			if($arrVal['SCQM_SUPPLY_COM_MEMBER_NAME']){
				var data = Object.assign({}, $arrVal); // 배열을 JSON변환
				$.ajax({
					url : '?siteMenu=incMain&mode=json&act=supplyComJoinMemo',
					data : data,
					type : 'post',
					dataType : 'json',
					success : function(result) {
						if(result.success==true){ 
							alert(alertLsit + "저장되었습니다.\n담당직원의 빠른 확인진행 하겠습니다.");
							location.reload();
						}else { 
							alert(result.msg); 
							return false; 
						}
					}
				});
			}else{
				$obj = '';
				throw "잘못된 입력 입니다! [MEMO439909]";
			}

		} catch(err) {
			alert(err); if($obj){ $obj.focus(); } return false;
		}
		
	});

});

// 페이지 메뉴클릭호출
function clickMenuMove(clickClass){
	var offset 			= $("."+clickClass+"_con").offset(); // 해당 위치 반환
	//var firMenu  		= $('#mainTable > .topArea').outerHeight(); // 매뉴높이
	var firMenu			= 130;
	var hasClassHeight 	= (offset.top - firMenu);
	$("html, body").animate({scrollTop: hasClassHeight},200); 
	// 선택한 위치로 이동. 두번째 인자는 0.2초를
}

// 공급사 마켓셀러 개인정보처리방침
function ppChkbox() {
    if (document.getElementById("mktPrivacyPolicy").checked) {
        document.getElementById("ppChkbox").className = "on";
    } else {
        document.getElementById("ppChkbox").className = "";
    }
}

// 요금표 넓이 구하기
function priceListWidth(){
	var windowWidth = parseInt($( window ).width()); // 화면 넓이
	if(windowWidth<1000){
		var spanLen = $('.smlPartBox > span.smlParts').length;
		if(spanLen>2){ $('.smlPartBox > span.smlParts').css({'width':(90/3)+'%'}); }
	}else{
		var spanLen = $('.smlPartBox > span.smlParts').length;
		if(spanLen>2){ $('.smlPartBox > span.smlParts').css({'width':(97/spanLen)+'%'}); }
	}
}

$(window).resize(function(){ 
	priceListWidth(); // 요금표 넓이 구하기
});

$(document).ready(function () {
	$('.supplyInput').keyup();
	priceListWidth(); // 요금표 넓이 구하기
});

