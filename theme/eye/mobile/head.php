<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript">
<!--

function autoSize(){
	
	var w_width = $(window).width();
	//메뉴 반응형
	if(w_width < 750){
		$(".first_view").hide();
		$(".second_view").hide();
		$(".thirth_view").show();
		$(".b_list_ck").hide();
	}  else {
		$(".first_view").show();
		$(".second_view").hide();
		$(".thirth_view").hide();
		$(".b_list_ck").show();
	}


	if(w_width < 500){
		var login_input_resize = w_width-60;
		$("#mb_login").css('width','100%');
		$("#mb_login .frm_input").css('width',login_input_resize+'px');
	} else if(w_width > 500) { 
		$("#mb_login").css('width','500px');
		$("#mb_login").css('margin','auto');
		$("#mb_login .frm_input").css('width','440px');
	}

	if(w_width < 500){
		var pw_input_resize = w_width-50;
		var pw_confirm_resize = w_width-40;
		$("#pw_confirm").css('width',pw_confirm_resize+'px');
		$("#pw_confirm .frm_input").css('width',pw_input_resize+'px');
	} else if(w_width > 500) { 
		$("#pw_confirm").css('width','500px');
		$("#pw_confirm").css('margin','auto');
		$("#pw_confirm .frm_input").css('width','490px');
	}


	if(w_width < 800){
		var member_agree_resize = w_width-30;
		$("#member_agree").css('width',member_agree_resize+'px');
		
	} else if(w_width > 800) { 
		$("#member_agree").css('width','800px');
		$("#member_agree").css('margin','auto');
	}
	if(w_width < 800){
		var member_agree_resize = w_width-40;
		$("#regi_form").css('width',member_agree_resize+'px');
		$("#regi_form .frm_input").css('width',member_agree_resize-160+'px');
	} else if(w_width > 800) { 
		$("#regi_form").css('width','800px');
		$("#regi_form").css('margin','auto');
		$("#regi_form .frm_input").css('width','440px');
	}



	//company 소개
	if(w_width < 1100){
		$('#ctt_con').css('width','100%');
		$('#eye_board_g').css('width','100%');
		$('#eye_board_b').css('width','100%');
		$('.eye_con_title').css('width','100%');
		$("#eye_con_mobile").show();
		$("#eye_con_pc").hide();
	} else {
		$('#ctt_con').css('width','100%');
		$('#eye_board_g').css('width','100%');
		$('#eye_board_b').css('width','1100px');
		$('.eye_con_title').css('width','1100px');
		$("#eye_con_mobile").hide();
		$("#eye_con_pc").show();
	}
	//버튼 반응형
	if(w_width < 510){
		$(".eye_bt_nover").css("font-size","15px");
		$(".eye_bt_nover").css("padding","5px 15px 5px 15px");
		$(".eye_bt_nover").css("line-height","15px");

		$(".eye_bt_over").css("font-size","15px");
		$(".eye_bt_over").css("padding","5px 15px 5px 15px");
		$(".eye_bt_over").css("line-height","15px");
	} else {
		$(".eye_bt_nover").css("font-size","20px");
		$(".eye_bt_nover").css("padding","10px 30px 10px 30px");
		$(".eye_bt_nover").css("line-height","30px");

		$(".eye_bt_over").css("font-size","20px");
		$(".eye_bt_over").css("padding","10px 30px 10px 30px");
		$(".eye_bt_over").css("line-height","30px");
	}

	if(w_width > 420 && w_width < 750){
		$(".eye_con_2").css("height","760px");

		$(".eye_con_2 .eye_con2_li").css("width","100%");
		$(".eye_con2_li li").css("width","49%");
		$(".eye_con2_li li").css("margin-right","2%");
		$(".eye_con2_li li:nth-child(2)").css("margin-right","0px");
		$(".eye_con2_li li:last-child").css("margin-right","0px");
		$("#eye_port_view1 li").css("width","50%");
		$('.hover_').css("height",$(".hover_ img").height()+"px");
		$('.eye_font_size_13').css("font-size","13px");
		$(".eye_con2_li li:first-child .eye_font_size_13").css("line-height","200%");
	} else if(w_width < 420) {
		$(".eye_con_2").css("height","760px");
		$(".eye_con_2 .eye_con2_li").css("width","100%");
		$(".eye_con2_li li").css("width","49%");
		$(".eye_con2_li li").css("margin-right","2%");
		$(".eye_con2_li li:nth-child(2)").css("margin-right","0px");
		$(".eye_con2_li li:last-child").css("margin-right","0px");
		$("#eye_port_view1 li").css("width","100%");
		$('.hover_').css("height",$(".hover_ img").height()+"px");
		$('.eye_font_size_13').css("font-size","10px");
		$(".eye_con2_li li:first-child .eye_font_size_13").css("font-size","12px");
		$(".eye_con2_li li:first-child .eye_font_size_13").css("line-height","230%");

		
	} else {
		$(".eye_con_2").css("height","440px");
		$(".eye_con_2 .eye_con2_li").css("width","990px");
		$(".eye_con2_li li").css("width","240px");
		$(".eye_con2_li li").css("margin-right","10px");
		$(".eye_con2_li li:last-child").css("margin-right","0");

		$("#eye_port_view1 li").css("width","25%");
		$('.hover_').css("height",$(".hover_ img").height()+"px");

		$('.eye_font_size_13').css("font-size","13px");
		$(".eye_con2_li li:first-child .eye_font_size_13").css("line-height","200%");
	}

}

$(window).on('resize', function(){ 
	autoSize();
}); 


$(window).scroll(function(){
	var w_width = $(window).width();
	if(w_width > 750){
		if($(document).scrollTop() >= 100){
			$( ".second_view" ).fadeIn( 'fast', function() {
				$(".eye_scroll_menu").show();
			});
			
		} else {
			$( ".second_view" ).fadeOut( 'fast', function() {
				$(".eye_scroll_menu").hide();
			});
		}
	} else if(w_width < 750) {
		if($(document).scrollTop() > 50){
			$(".eye_scroll_menu2").css("position","fixed");
		} else {
			$(".eye_scroll_menu2").css("position","relative");
		}
	} else {
	}
});

$(window).load(function(){
	autoSize();
	
	$('.eye_bt_nover').hover(function(){
		$(this).stop().animate({backgroundColor: '#9b0005','color': '#fff'}, 'fast');
	}, function() {
		$(this).stop().animate({backgroundColor: '#fff','color': '#000'}, 'fast');
	});


	$('.eye_bt_over').hover(function(){
		$(this).stop().animate({backgroundColor: '#ffcc00','color': '#000'}, 'fast');
	}, function() {
		$(this).stop().animate({backgroundColor: '#9b0005','color': '#fff'}, 'fast');
	});
	 

	$('.hover_').css("height",$(".hover_ img").height()+"px");
	$('.hover_').hover(function(){
		$(this).find("div").stop().animate({'height':$(this).find("img").height()+"px",'width':'100%'}, 'fast');
		$(this).find("span").fadeIn( 'fast' );
		$(this).find("a").fadeIn( 'fast' );

	}, function() {
		$(this).find("div").stop().animate({'height':'0','width':'0'}, 'fast');
		$(this).find("span").fadeOut( 'fast' );
		$(this).find("a").fadeOut( 'fast' );
	});

	$('.eye_scr_subject_bt2').hover(function(){
		$(this).stop().animate({backgroundColor:"#fff",'color':'#000'}, 'fast');
	}, function() {
		$(this).stop().animate({backgroundColor:'transparent','color':'#fff'}, 'fast');
	});

	$('.eye_scr_subject_bt').hover(function(){
		$(this).stop().animate({backgroundColor:"#fff",'color':'#000'}, 'fast');
	}, function() {
		$(this).stop().animate({backgroundColor:'transparent','color':'#fff'}, 'fast');
	});


	$('.eye_meue_bar').toggle(function() {
		$(".eye_left_menu").stop().animate({'height':'170px'}, 'fast');

		$(".eye_left_menu li").fadeIn( 'fast', function() {
			$(".eye_left_menu li").show();
		});
		$("html").css({overflow:'hidden'}).bind('touchmove', function(e){e.preventDefault()});
	}, function() {
		$(".eye_left_menu").stop().animate({'height':'0px'}, 'fast');
		$(".eye_left_menu li").fadeOut( 'fast', function() {
			$(".eye_left_menu li").hide();
		});
		$("html").css({overflow:'scroll'});
		$("html").unbind('touchmove');

	});	
});

//-->
</script>

<header id="hd">
	<div class="eye_logo first_view">
		<a href="<?php echo G5_URL ?>"><img src="<?php echo G5_IMG_URL ?>/logo.png" alt="<?php echo $config['cf_title']; ?>"></a>
	</div>
	<div class="eye_menu first_view">
		<?php
		$sql = " select *
					from {$g5['menu_table']}
					where me_mobile_use = '1'
					  and length(me_code) = '2'
					order by me_order, me_id ";
		$result = sql_query($sql, false);

		$sql_menu = " select count(*) menu_total from {$g5['menu_table']} where me_mobile_use = '1' and length(me_code) = '2' order by me_order, me_id ";
		$result_menu = sql_query($sql_menu, false);
		$menu_count=sql_fetch_array($result_menu);

		$select_title_array = array("홈페이지 포트폴리오","개발의뢰건","제작의뢰"); // 효과주고 싶은 메뉴명
		for($i=0; $row=sql_fetch_array($result); $i++) {

			if(in_array($row['me_name'], $select_title_array)) 
				$select_eye_class = "eye_select_y"; // 효과 주는 class명
			else
				$select_eye_class = "";
		?>	
		
				<a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>"><span class="eye_title <?php echo $select_eye_class ?>"><?php echo $row['me_name'] ?></span></a>
				
				<?if($i != ($menu_count['menu_total']-1)){?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?}?>
		<?php
		}

		?>
	</div>
	<div class="eye_scroll_menu second_view">
		<table cellpadding="0" cellspacing="0" border="0" width="1100" align="center">
		<tr>
			<td align="left"><a href="<?php echo G5_URL ?>"><img src="<?php echo G5_IMG_URL ?>/logo.png" alt="<?php echo $config['cf_title']; ?>"></a></td>
			<td align="right">
				<?php
				$sql = " select *
							from {$g5['menu_table']}
							where me_mobile_use = '1'
							  and length(me_code) = '2'
							order by me_order, me_id ";
				$result = sql_query($sql, false);

				$sql_menu = " select count(*) menu_total from {$g5['menu_table']} where me_mobile_use = '1' and length(me_code) = '2' order by me_order, me_id ";
				$result_menu = sql_query($sql_menu, false);
				$menu_count=sql_fetch_array($result_menu);

				for($i=0; $row=sql_fetch_array($result); $i++) {

					if(in_array($row['me_name'], $select_title_array)) 
						$select_eye_class = "eye_select_y"; // 효과 주는 class명
					else
						$select_eye_class = "";
				?>	
				
						<a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>"><span class="eye_title <?php echo $select_eye_class ?>"><?php echo $row['me_name'] ?></span></a>
						
						<?if($i != ($menu_count['menu_total']-1)){?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?}?>
				<?php
				}

				?>			
			</td>
		</tr>
		</table>
	</div>


	<div class="eye_scroll_menu2 thirth_view">
		<table cellpadding="0" cellspacing="0" border="0" width="100%" align="center">
		<tr>
			<td align="left" style="padding-left:10px;"><a href="<?php echo G5_URL ?>"><img src="<?php echo G5_IMG_URL ?>/logo.png" alt="<?php echo $config['cf_title']; ?>"></a></td>
			<td align="right" style="padding-right:10px;"><span class="eye_meue_bar"><i class="fa fa-bars"></i></span></td>
		</tr>
		</table>
	</div>


	<div class="eye_left_menu forth_view">
		<ul>

			<?php
			$sql = " select *
						from {$g5['menu_table']}
						where me_mobile_use = '1'
						  and length(me_code) = '2'
						order by me_order, me_id ";
			$result = sql_query($sql, false);

			$sql_menu = " select count(*) menu_total from {$g5['menu_table']} where me_mobile_use = '1' and length(me_code) = '2' order by me_order, me_id ";
			$result_menu = sql_query($sql_menu, false);
			$menu_count=sql_fetch_array($result_menu);

			$select_title_array = array("홈페이지 포트폴리오","개발의뢰건","제작의뢰"); // 효과주고 싶은 메뉴명
			for($i=0; $row=sql_fetch_array($result); $i++) {

				if(in_array($row['me_name'], $select_title_array)) 
					$select_eye_class = "eye_select_y"; // 효과 주는 class명
				else
					$select_eye_class = "";
			?>	
					<li><a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>"><span class="eye_title <?php echo $select_eye_class ?>"><?php echo $row['me_name'] ?></span></a></li>
					
					
			<?php
			}

			?>

			
		</ul>
	</div>

</header>
	
<div id="wrapper">
    <div id="container">
