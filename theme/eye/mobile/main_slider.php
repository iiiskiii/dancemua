<script src="<?php echo G5_THEME_URL; ?>/js/jssor.slider-21.1.6.mini.js" type="text/javascript"></script>
<script type="text/javascript">
	jssor_1_slider_init = function() {
		
		var jssor_1_SlideoTransitions = [
		  [{b:-1,d:1,o:-1},{b:0,d:1000,y:-139,o:1}],
		  [{b:-1,d:1,o:-1},{b:0,d:1000,y:-217},{b:1000,d:1000,y:-133,o:1}],
		  [{b:-1,d:1,o:-1},{b:0,d:1000,y:-139,o:1}],
		  [{b:-1,d:1,o:-1},{b:1000,d:1000,y:-147,o:1}],
		  [{b:-1,d:1,o:-1},{b:0,d:1000,y:-161,o:1}]
		];
		
		var jssor_1_options = {
		  $AutoPlay: true,
		  $SlideDuration: 800,
		  $SlideEasing: $Jease$.$OutQuint,
		  $CaptionSliderOptions: {
			$Class: $JssorCaptionSlideo$,
			$Transitions: jssor_1_SlideoTransitions
		  },
		  $ArrowNavigatorOptions: {
			$Class: $JssorArrowNavigator$
		  },
		  $BulletNavigatorOptions: {
			$Class: $JssorBulletNavigator$
		  }
		};
		
		var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
		
		//responsive code begin
		//you can remove responsive code if you don't want the slider scales while window resizing
		function ScaleSlider() {
			var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
			if (refSize) {
				refSize = Math.min(refSize, 1920);
				jssor_1_slider.$ScaleWidth(refSize);
			}
			else {
				window.setTimeout(ScaleSlider, 30);
			}
		}
		ScaleSlider();
		$Jssor$.$AddEvent(window, "load", ScaleSlider);
		$Jssor$.$AddEvent(window, "resize", ScaleSlider);
		$Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
		//responsive code end
	};
	
</script>
<style>
	/* jssor slider bullet navigator skin 05 css */
	/*
	.jssorb05 div           (normal)
	.jssorb05 div:hover     (normal mouseover)
	.jssorb05 .av           (active)
	.jssorb05 .av:hover     (active mouseover)
	.jssorb05 .dn           (mousedown)
	*/
	.jssorb05 {
		position: absolute;
	}
	.jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
		position: absolute;
		/* size of bullet elment */
		width: 16px;
		height: 16px;
		background: url('/theme/eye/img/b05.png') no-repeat;
		overflow: hidden;
		cursor: pointer;
	}
	.jssorb05 div { background-position: -7px -7px; }
	.jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
	.jssorb05 .av { background-position: -67px -7px; }
	.jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }
	
	/* jssor slider arrow navigator skin 22 css */
	/*
	.jssora22l                  (normal)
	.jssora22r                  (normal)
	.jssora22l:hover            (normal mouseover)
	.jssora22r:hover            (normal mouseover)
	.jssora22l.jssora22ldn      (mousedown)
	.jssora22r.jssora22rdn      (mousedown)
	*/
	.jssora22l, .jssora22r {
		display: block;
		position: absolute;
		/* size of arrow element */
		width: 40px;
		height: 58px;
		cursor: pointer;
		background: url('/theme/eye/img/a22.png') center center no-repeat;
		overflow: hidden;
	}
	.jssora22l { background-position: -10px -31px; }
	.jssora22r { background-position: -70px -31px; }
	.jssora22l:hover { background-position: -130px -31px; }
	.jssora22r:hover { background-position: -190px -31px; }
	.jssora22l.jssora22ldn { background-position: -250px -31px; }
	.jssora22r.jssora22rdn { background-position: -310px -31px; }
</style>
<div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden; visibility: hidden;">
	<!-- Loading Screen -->
	<div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
		<div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
		<div style="position:absolute;display:block;background:url('/theme/img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
	</div>
	<div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden;">
		<div data-p="225.00" style="display: none;">
			<img data-u="image" src="/img/banner1.jpg" />
			<div data-u="caption" data-t="0" style="position: absolute; top: 329px; left: 756px; width: 100px; height: 30px; font-size: 60px; color: #d01616; line-height: 30px; text-align: center;font-weight:bold;">EYE</div>
			<div data-u="caption" data-t="1" style="position: absolute; top: 627px; left: 49px; width: 1200px; height: 30px; font-size: 40px; color: #ffffff; line-height: 30px; text-align: center;font-weight:bold;">기업을 브랜딩하고 소통하며 특별함을 디자인합니다.</div>
			<div data-u="caption" data-t="2" style="position: absolute; top: 329px; left: 385px; width: 400px; height: 30px; font-size: 60px; color: #dcdcdc; line-height: 30px; text-align: center;font-weight:bold;">GROUP BY</div>
		</div>
		<div data-p="225.00" style="display: none;">
			<img data-u="image" src="/img/banner2.jpg" />
			<div data-u="caption" data-t="3" style="position: absolute; top: 429px; left: 51px; width: 1200px; height: 30px; font-size: 40px; color: #ffffff; line-height: 30px; text-align: center;font-weight:bold;">환경에 따라 알맞게 변하는 반응형 홈페이지</div>
			<div data-u="caption" data-t="4" style="position: absolute; top: 341px; left: 50px; width: 1200px; height: 30px; font-size: 60px; color: #dcdcdc; line-height: 30px; text-align: center;font-weight:bold;"><span style="color:#d01616">반응형</span> 홈페이지</div>
		</div>
	</div>
	<!-- Bullet Navigator -->
	<!-- <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
		<div data-u="prototype" style="width:16px;height:16px;"></div>
	</div> -->
	<!-- Arrow Navigator -->
	<span data-u="arrowleft" class="jssora22l" style="top:0px;left:12px;width:40px;height:58px;" data-autocenter="2"></span>
	<span data-u="arrowright" class="jssora22r" style="top:0px;right:12px;width:40px;height:58px;" data-autocenter="2"></span>
</div>
<script type="text/javascript">jssor_1_slider_init();</script>
<!-- #endregion Jssor Slider End -->
