<?php
// 이 파일은 새로운 파일 생성시 반드시 포함되어야 함
if (!defined('_MKTBIZASK_')) exit; // 개별 페이지 접근 불가

$g5_debug['php']['begin_time'] = $begin_time = get_microtime();

if (!isset($g5['title'])) {
    $g5['title'] = $config['cf_title'];
    $g5_head_title = $g5['title'];
}
else {
    // 상태바에 표시될 제목
    $g5_head_title = implode(' | ', array_filter(array($g5['title'], $config['cf_title'])));
}

$g5['title'] = strip_tags($g5['title']);
$g5_head_title = strip_tags($g5_head_title);

// 현재 접속자
// 게시판 제목에 ' 포함되면 오류 발생
$g5['lo_location'] = addslashes($g5['title']);
if (!$g5['lo_location'])
    $g5['lo_location'] = addslashes(clean_xss_tags($_SERVER['REQUEST_URI']));
$g5['lo_url'] = addslashes(clean_xss_tags($_SERVER['REQUEST_URI']));
if (strstr($g5['lo_url'], '/'.G5_ADMIN_DIR.'/') || $is_admin == 'super') $g5['lo_url'] = '';

/*
// 만료된 페이지로 사용하시는 경우
header("Cache-Control: no-cache"); // HTTP/1.1
header("Expires: 0"); // rfc2616 - Section 14.21
header("Pragma: no-cache"); // HTTP/1.0
*/
?>
<!doctype html>
<html lang="ko">
<head>
<meta charset="utf-8">
<meta http-equiv="Expires" content="Mon, 06 Jan 1990 00:00:01 GMT">
<!-- # 위의 명시된 날짜 이후가 되면 페이지가 캐싱되지 않습니다. (따라서 위와 같은 날짜로 지정할 경우 페이지는 지속적으로 캐싱되지 않습니다.) -->
<meta http-equiv="Expires" content="-1"><!-- # 캐시된 페이지가 만료되어 삭제되는 시간을 정의합니다. 특별한 경우가 아니면 -1로 설정합니다. -->
<meta http-equiv="Pragma" content="no-cache"><!-- # 페이지 로드시마다 페이지를 캐싱하지 않습니다. (HTTP 1.0) -->
<meta http-equiv="Cache-Control" content="no-cache"><!-- # 페이지 로드시마다 페이지를 캐싱하지 않습니다. (HTTP 1.1) -->
<?php
if (G5_IS_MOBILE) {
    echo '<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=0,maximum-scale=10,user-scalable=yes">'.PHP_EOL;
    echo '<meta name="HandheldFriendly" content="true">'.PHP_EOL;
    echo '<meta name="format-detection" content="telephone=no">'.PHP_EOL;
} else {
    echo '<meta http-equiv="imagetoolbar" content="no">'.PHP_EOL;
    echo '<meta http-equiv="X-UA-Compatible" content="IE=edge">'.PHP_EOL;
}

if($config['cf_add_meta'])
    echo $config['cf_add_meta'].PHP_EOL;
?>

<?php echo (isset($gl_HeaderNaverMeta))?$gl_HeaderNaverMeta:'';?>

<!-- Facebook Meta Tags / 페이스북 오픈 그래프 -->
<!-- kakao Meta Tags / 카카오 -->
<meta property='og:title' content='<?php echo $gl_OgTitle?>' />
<meta property='og:image' content='<?php echo $gl_OgImage?>' />
<meta property="og:image:alt" content="<?php echo $gl_OgTitle?>" />
<meta property="og:image:width" content="800" />
<meta property="og:image:height" content="400" />
<meta property='og:url' content='<?php echo $gl_OgUrl?>' />
<meta property="og:site_name" content="<?php echo $gl_OgTitle?>"/>
<meta property='og:description' content='<?php echo $gl_OgDescription?>' />
<meta property="ia:markup_url" content="<?php echo $gl_OgUrl?>" />
<meta property="ia:rules_url" content="<?php echo $gl_OgUrl?>" />
<meta property="og:locale" content="ko_kr" />
<meta property='og:type' content='website' />

<!-- Twitter Meta Tags / 트위터 -->
<meta name="twitter:card" content="summary_large_image"/>
<meta name="twitter:title" content="<?php echo $gl_OgTitle?>"/>
<meta name="twitter:description" content="<?php echo $gl_OgDescription?>"/>
<meta name="twitter:image" content="<?php echo $gl_OgImage?>"/>

<!-- Google / Search Engine Tags / 구글 검색 엔진 -->
<meta itemprop="name" content="<?php echo $gl_OgTitle?>"/>
<meta itemprop="description" content="<?php echo $gl_OgDescription?>"/>
<meta itemprop="image" content="<?php echo $gl_OgImage?>"/>

<meta name='keywords' content='<?php echo $gl_OgKeywords?>' />
<meta name='description' content='<?php echo $gl_OgDescription?>' />
<meta name='auhor' content='<?php echo $gl_OgTitle?>'/>

<link rel='shortcut icon' href='<?php echo (isset($gl_faviconImg))?$gl_faviconImg:'';?>' type='image/x-icon'>
<title><?php echo $g5_head_title; ?></title>
<?php
$shop_css = '';
if (defined('_SHOP_')) $shop_css = '_shop';
echo '<link rel="stylesheet" href="'.run_replace('head_css_url', G5_THEME_CSS_URL.'/'.(G5_IS_MOBILE?'mobile':'default').$shop_css.'.css?ver='.G5_CSS_VER, G5_THEME_URL).'">'.PHP_EOL;
?>
<!--[if lte IE 8]>
<script src="<?php echo G5_JS_URL ?>/html5.js"></script>
<![endif]-->
<script>
// 자바스크립트에서 사용하는 전역변수 선언
var g5_url       = "<?php echo G5_URL ?>";
var g5_bbs_url   = "<?php echo G5_BBS_URL ?>";
var g5_is_member = "<?php echo isset($is_member)?$is_member:''; ?>";
var g5_is_admin  = "<?php echo isset($is_admin)?$is_admin:''; ?>";
var g5_is_mobile = "<?php echo G5_IS_MOBILE ?>";
var g5_bo_table  = "<?php echo isset($bo_table)?$bo_table:''; ?>";
var g5_sca       = "<?php echo isset($sca)?$sca:''; ?>";
var g5_editor    = "<?php echo ($config['cf_editor'] && $board['bo_use_dhtml_editor'])?$config['cf_editor']:''; ?>";
var g5_cookie_domain = "<?php echo G5_COOKIE_DOMAIN ?>";
<?php if (defined('G5_USE_SHOP') && G5_USE_SHOP) { ?>
var g5_theme_shop_url = "<?php echo G5_THEME_SHOP_URL; ?>";
var g5_shop_url = "<?php echo G5_SHOP_URL; ?>";
<?php } ?>
<?php if(defined('G5_IS_ADMIN')) { ?>
var g5_admin_url = "<?php echo G5_ADMIN_URL; ?>";
<?php } ?>
</script>
<?php
add_javascript('<script src="'.G5_JS_URL.'/jquery-1.12.4.min.js"></script>', 0);
add_javascript('<script src="'.G5_JS_URL.'/jquery-migrate-1.4.1.min.js"></script>', 0);
//add_javascript('<script src="'.G5_JS_URL.'/jquery-ui-1.12.1/jquery-ui.min.js"></script>', 0);
add_javascript('<script src="'.G5_JS_URL.'/jquery-ui-1.13.2.custom/jquery-ui.min.js"></script>', 0);
if (defined('_SHOP_')) {
    if(!G5_IS_MOBILE) {
        add_javascript('<script src="'.G5_JS_URL.'/jquery.shop.menu.js?ver='.G5_JS_VER.'"></script>', 0);
    }
} else {
    add_javascript('<script src="'.G5_JS_URL.'/jquery.menu.js?ver='.G5_JS_VER.'"></script>', 0);
}
add_javascript('<script src="'.G5_JS_URL.'/common.js?ver='.G5_JS_VER.'"></script>', 0);
add_javascript('<script src="'.G5_JS_URL.'/wrest.js?ver='.G5_JS_VER.'"></script>', 0);
add_javascript('<script src="'.G5_JS_URL.'/placeholders.min.js"></script>', 0);
add_stylesheet('<link rel="stylesheet" href="'.G5_JS_URL.'/font-awesome/css/font-awesome.min.css">', 0);

if(G5_IS_MOBILE) {
    add_javascript('<script src="'.G5_JS_URL.'/modernizr.custom.70111.js"></script>', 1); // overflow scroll 감지
}
if(!defined('G5_IS_ADMIN'))
    echo $config['cf_add_script'];
?>


<!-- google fonts -->
<link href="//fonts.googleapis.com/css?family=Nanum+Gothic:400,700,800|Noto+Sans+KR:100,300,400,500,700,900|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">

<!-------------------------- 구글아이콘 -------------------------->
<link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons">

<!-- Bootstrap core CSS -->
<link href="<?php echo G5_THEME_URL?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- fontawesome -->
<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<!-- owl Carousel -->
<link rel="stylesheet" href="<?php echo G5_THEME_URL?>/assets/owlcarousel/css/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo G5_THEME_URL?>/assets/owlcarousel/css/owl.theme.default.min.css">

<!-- countdown -->
<link href="<?php echo G5_THEME_URL?>/assets/countdown/css/demo.css" rel="stylesheet">
<!-- bootstrap-social icon -->
<link href="<?php echo G5_THEME_URL?>/assets/bootstrap-social/bootstrap-social.css" rel="stylesheet">
<link href="<?php echo G5_THEME_URL?>/css/animate.css" rel="stylesheet">
<link href="<?php echo G5_THEME_URL?>/css/bootstrap-dropdownhover.css" rel="stylesheet">
<!-- Custom & ety -->
<link href="<?php echo G5_THEME_URL?>/css/modern-business.css" rel="stylesheet">
<link href="<?php echo G5_THEME_URL?>/css/ety.css" rel="stylesheet">


</head>
<body<?php echo isset($g5['body_script']) ? $g5['body_script'] : ''; ?>>
<?php
if ($is_member) { // 회원이라면 로그인 중이라는 메세지를 출력해준다.
    $sr_admin_msg = '';
    if ($is_admin == 'super') $sr_admin_msg = "최고관리자 ";
    else if ($is_admin == 'group') $sr_admin_msg = "그룹관리자 ";
    else if ($is_admin == 'board') $sr_admin_msg = "게시판관리자 ";

    echo '<div id="hd_login_msg">'.$sr_admin_msg.get_text($member['mb_nick']).'님 로그인 중 ';
    echo '<a href="'.G5_BBS_URL.'/logout.php">로그아웃</a></div>';
}