<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
include_once($board_skin_path.'/skin.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/wookmark.css">', 0);
?>
<style>
/* 상국이 버튼 */
.askbtn {padding: 5px 10px;text-decoration: none !important;font-weight: bold;display: inline-block;margin: 10px 0px;vertical-align: middle;}

.askbtn_gry {border: 1px solid #3b3b3b;background-color: #3b3b3b;color: #ffffff;}
.askbtn_red {border: 1px solid #d81e1e;background-color: #d81e1e;color: #ffffff;}

ul {padding:0;margin:0;}
li,dl,dd {list-style:none;}

.rigth_profilemain {width:100%;display:block;}
.rigth_profilemain > ul {display: block;}
.Top_manuA {width:100%;overflow: hidden;margin: 10px 0px;}
.left_top {float:left;width:50%;text-align:left;font-size: 26px;font-weight: bold;color: #8e8e8e;}
.right_top {float:right;width:50%;text-align:right;}
.incul_main {width:100%;overflow: hidden;text-align:left;}
.Menu_File1 {width:100%;}
.left_graph01 {width:92%;}
.barA {width:98%;height:20px;}
.left_graph01 > ul {width:100%;background-color:#FFFFFF;border:#e8e3e3 1px solid;margin-top:7px;display:block;}
.left_graph01 > ul > li {background-color:#3b3b3b;display:block;}
.barB {float: right;padding-right: 4px;FONT-WEIGHT: bold;FONT-SIZE: 14px;COLOR: #3b3b3b;FONT-FAMILY: 'Dotum';margin-top: -20px;margin-right: -40px;text-align: right;}
.barC {padding-left: 4px;FONT-WEIGHT: bold;FONT-SIZE: 12px;COLOR: #FFFFFF;FONT-FAMILY: 'Dotum';line-height: 20px;text-align:left;}
.top_title_line {width: 100%;font-size: 30px;border-top: 1px solid #e2e2e2;font-weight: bold;color: #737373;}
.tbl_wrap {float:left;border: 4px solid #d2d2d2;margin: 2px;cursor:pointer;}
.tbl_wrap:hover {border: 4px solid #3b3b3b;}

#overlay { visibility:hidden; position:fixed; left:0px; top:0px; width:100%; height:100%; text-align:center; z-index: 99999; filter:alpha(opacity=70); -khtml-opacity:0.7; -moz-opacity:0.7; opacity:0.7; /* 모든버전 적용 opacity */ background-color:#000; }
#popup {width:1000px;height:600px;position:fixed; visibility:hidden;background-color:#fff; border:5px solid #3b3b3b; padding:15px; text-align:center; z-index : 999999; top:50%; left : 50%;} 
.XBtnCloxsXz {position:absolute;width:51px;height:51px;top:50%;left:50%;z-index:10;}

@media screen and (max-width: 1200px){ /*넓이 1200*/
	#popup{width:900px !important;height:500px !important;} 
} 
@media screen and (max-width: 992px) { /*넓이 992*/
	#popup{width:700px !important;height:300px !important;} 
} 
@media screen and (max-width: 768px) { /*넓이 992*/
	#popup{width:100% !important;height:100% !important;} 
	.tbl_wrap {float:none !important;}
	.incul_main {text-align:center !important;}
} 
#wookmark1 {border-top: 1px solid #e0e0e0;border-bottom: 1px solid #e0e0e0;margin-bottom: 10px;}
</style>
<h2 id="container_title"><?php echo $board['bo_subject'] ?><span class="sound_only"> 목록</span></h2>
<div class="fz_header" style="width:100%;overflow: hidden;">
	<div class="left_top">
		<?php echo $board['bo_subject']; ?>
	</div>
	<div class="right_top">
		<?php if ($list_href) { ?><a href="<?php echo $list_href ?>" class="askbtn btn_list">목록</a><?php } ?>
		<?php if ($admin_href) { ?><a href="<?php echo $admin_href ?>" class="askbtn askbtn_gry">관리자</a><?php } ?>
		<?php if ($write_href) { ?><a class="askbtn askbtn_red" href="<?=$write_href?>" title="글쓰기">글쓰기</a><?php } ?>
	</div>
</div>
<!-- 게시판 목록 시작 { -->
<div id="bo_gall" style="width:<?php echo $width; ?>">

    <form name="fboardlist"  id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">

    <?php if ($is_checkbox) { ?>
    <div id="gall_allchk">
        <label for="chkall">현재 페이지 게시물 전체</label>
        <input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
    </div>
    <?php } ?>

<!-- loading image -->
<div id="loadingImage">
	<img src="<?php echo $board_skin_url;?>/img/loading.gif"/>
</div>
<!-- loading image -->

<div role="main" style="margin-left:5px">
    <ul class="gall_ul tiles-wrap animated" id="wookmark1">
        <?php for ($i=0; $i<count($list); $i++) {
            if($i>0 && ($i % $bo_gallery_cols == 0))
                $style = 'clear:both;';
            else
                $style = '';
            if ($i == 0) $k = 0;
            $k += 1;
            if ($k % $bo_gallery_cols == 0) $style .= "margin:0 !important;";
         ?>
	<li data-link="<?php echo $list[$i]['href']?>">
            <?php if ($is_checkbox) { ?>
            <label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject'] ?></label>
            <input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
            <?php } ?>
                    <a href="<?php echo $list[$i]['href'] ?>">
                    <?php
                    if ($list[$i]['is_notice']) { // 공지사항  ?>
                        <strong style="width:<?php echo $board['bo_gallery_width'] ?>px;height:<?php echo $board['bo_gallery_height'] ?>px">공지</strong>
                    <?php } else {
                        $thumb = get_list_thumbnail2($board['bo_table'], $list[$i]['wr_id'], $board['bo_gallery_width'], '0');

                        if($thumb['src']) {
				$board['bo_gallery_height'] = $thumb['thumb_height'];
                            $img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" width="'.$board['bo_gallery_width'].'" height="'.$board['bo_gallery_height'].'">';
                        } else {
                            $img_content = '<span style="width:'.$board['bo_gallery_width'].'px;height:'.$board['bo_gallery_height'].'px;line-height:'.$board['bo_gallery_height'].'px;">no image</span>';
                        }

                        echo $img_content;
                    }
                     ?>
                    </a>
                    <a href="<?php echo $list[$i]['href'] ?>" class="title" style="width:<?=$board['bo_gallery_width'];?>px">
                        <?php echo $list[$i]['subject'] ?>
                        <?php if ($list[$i]['comment_cnt']) { ?><span class="sound_only">댓글</span><?php echo $list[$i]['comment_cnt']; ?><span class="sound_only">개</span><?php } ?>
                    </a>
                    <?php
                    // echo $list[$i]['icon_reply']; 갤러리는 reply 를 사용 안 할 것 같습니다. - 지운아빠 2013-03-04
                    if ($is_category && $list[$i]['ca_name']) {
                     ?>
                    <a href="<?php echo $list[$i]['ca_name_href'] ?>" class="bo_cate_link"><?php echo $list[$i]['ca_name'] ?></a>
                    <?php } ?>
			<!-- <a href="<?php echo $list[$i]['href']?>" style="width:<?php echo $board['bo_gallery_width'];?>px" class="content">
				<?php echo nl2br(mb_strimwidth($list[$i]['wr_content'],0,60,'...','utf-8'));?>
			</a> -->
			<div style="width:<?php echo $board['bo_gallery_width'];?>px" class="info">
				<?
				if(file_exists(G5_DATA_PATH.'/member/'.substr($list[$i]['mb_id'],0,2).'/'.$list[$i]['mb_id'].'.gif')) { $mb_icon_url  = G5_DATA_URL.'/member/'.substr($list[$i]['mb_id'],0,2).'/'.$list[$i]['mb_id'].'.gif'; }else {
				$mb_icon_url = $board_skin_url."/img/userIcon.png"; }
				?>
				<div class="icon-wrapper">
					<img class="userIcon" src="<?=$mb_icon_url;?>" />
				</div>
				<div class="title"><?php echo $list[$i]['name'];?></div>
				<div><?php echo $list[$i]['datetime'];?></div>
			</div>
                    <?php
                    // if ($list[$i]['link']['count']) { echo '['.$list[$i]['link']['count']}.']'; }
                    // if ($list[$i]['file']['count']) { echo '<'.$list[$i]['file']['count'].'>'; }

                   // if (isset($list[$i]['icon_new'])) echo $list[$i]['icon_new'];
                   // if (isset($list[$i]['icon_hot'])) echo $list[$i]['icon_hot'];
                    //if (isset($list[$i]['icon_file'])) echo $list[$i]['icon_file'];
                    //if (isset($list[$i]['icon_link'])) echo $list[$i]['icon_link'];
                    //if (isset($list[$i]['icon_secret'])) echo $list[$i]['icon_secret'];
                     ?>
                <!-- <li><span class="gall_subject">작성자 </span><?php echo $list[$i]['name'] ?></li> -->
                <!-- <li><span class="gall_subject">작성일 </span><?php echo $list[$i]['datetime2'] ?></li> -->
            <!--    <li><span class="gall_subject">조회 </span><?php echo $list[$i]['wr_hit'] ?></li> -->
                <?php if ($is_good) { ?><a class="good"><span class="gall_subject">추천 </span><strong><?php echo $list[$i]['wr_good'] ?></strong></a><?php } ?>
                <?php if ($is_nogood) { ?><a class="nogood"><span class="gall_subject">비추천 </span><strong><?php echo $list[$i]['wr_nogood'] ?></strong></a><?php } ?>
        </li>
        <?php } ?>
        <?php if (count($list) == 0) { echo "<li class=\"empty_list\">게시물이 없습니다.</li>"; } ?>
    </ul>
</div>
    <?php if ($list_href || $is_checkbox || $write_href || $page !=1) { ?>
    <div class="bo_fx">
        <?php if ($is_checkbox) { ?>
        <ul class="btn_bo_adm">
            <li><input type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value"></li>
            <li><input type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value"></li>
            <li><input type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value"></li>
        </ul>
        <?php } ?>

        <?php if ($list_href || $write_href || $page !=1) { ?>
        <ul class="btn_bo_user" style="float:right;">
            <?php if ($list_href) { ?><li><a href="<?php echo $list_href ?>" class="btn_b01">View All List</a></li><?php } ?>
            <?php if ($page !=1 && !$list_href) { ?><li><a href="<?php echo G5_BBS_URL.'/board.php?bo_table='.$board['bo_table'];?>" class="btn_b01">View All List</a></li><?php } ?>
			<li style="text-align:right;">
				<?php if ($admin_href) { ?><a href="<?php echo $admin_href ?>" class="askbtn askbtn_gry">관리자</a><?php } ?>
				<?php if ($write_href) { ?><a class="askbtn askbtn_red" href="<?=$write_href?>" title="글쓰기">글쓰기</a><?php } ?>
			</li>
        </ul>
        <?php } ?>
    </div>
    <?php } ?>
    </form>
</div>
<script src="<?=$board_skin_url?>/wookmark.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		//사이드뷰 관련 함수
		var qs_hide = false;
    		$('#wookmark1').on("click",".sv_member , .sv_guest",function() {
			$(".sv").removeClass("qs_on");
        		$(this).closest(".sv_wrap").find(".sv").addClass("qs_on");
    		});
		$('#wookmark1').on("mouseenter",".sv, .title",function(){
			qs_hide = false;
		});
		$('#wookmark1').on("mouseleave", ".sv, .title",function(){
			qs_hide = true;
		});
		
		
		$("#wookmark1").on("focusin",".sv a",function() {
		    qs_hide = false;
		});
		
		$("#wookmark1").on("focusout",".sv a",function() {
		    qs_hide = true;
		});
		$(document).click(function(){
			if(qs_hide) {$(".sv").removeClass("qs_on");}
		});
		

		$.fn.hasScrollBar = function() {
		    return (this.prop("scrollHeight") == 0 && this.prop("clientHeight") == 0)
		            || (this.prop("scrollHeight") > this.prop("clientHeight"));
		};

		var uri = '<?=G5_BBS_URL.'/board.php?bo_table='.$bo_table.$qstr.'&amp;page=';?>';
		var url = uri.replace(/&amp;/g,"&");
		var page = <?=$page;?>;
		var nextPage = page+1;
		var totalPage = <?=$total_page;?>;
		var wookmark1 = new Wookmark('#wookmark1' , {
			outerOffset:0,
			itemWidth:parseInt(<?=$board['bo_gallery_width'];?>)+10
		});
		//$('#wookmark1 li:not(.empty_list)').click(function(){
		//	var page = $(this).data('link');
		//	location.href =page;
		//});

		/* 다음페이지 불러오기 */
		function callContents(page) {
			if(nextPage > totalPage) {
                                return page;
                        }else {
                                var npage=page;
				page=page+1;
                                $.ajax({
                                        url:url+npage,
                                        success:function(data) {
                                                var result =$(data).find('#wookmark1').html();
                                                $('#wookmark1').append(result);
						$('.tiles-wrap').removeClass('wookmark-initialised');
                                                var wookmark1 = new Wookmark('#wookmark1' , {
                                                outerOffset:0,
                                                itemWidth:parseInt(<?=$board['bo_gallery_width'];?>)+10
                                                });
						$('.tiles-wrap').addClass('wookmark-initialised');

                                        },
					beforeSend:function() {
						$("#loadingImage").css("display","block");
					},
					complete:function() {
						$("#loadingImage").css("display","none");
					},
					error:function(e) {
						alert("통신 실패");
						console.log(e);
					}
                                });
				return page;
                        }
		}

		/* init */
		function addGallery() {
		//	console.log("next : "+nextPage +", total : "+totalPage+", scroll : "+$('html').hasScrollBar());
			if( (nextPage > totalPage) || $('html').hasScrollBar() ) {
				clearInterval(galleryInit);
				$("#loadingImage").css("display","none");
			}else {
				nextPage=callContents(nextPage);
				$("#loadingImage").css("display","block");
			}
		}

		/* scrolling 후 다음페이지 불러오기 */
		$(window).scroll(function() {
			if($(window).scrollTop() == $(document).height() - $(window).height()){
				nextPage=callContents(nextPage);
			}
		});

		$("#loadingImage").css("display","block");
		var galleryInit = setInterval(addGallery, 1000);
	});
</script>


<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>

<!-- 페이지 -->
<!-- <?php echo $write_pages;  ?> -->

<?php if ($is_checkbox) { ?>
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

    if (sw == 'copy')
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
