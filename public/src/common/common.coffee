
$ ->
	#alert($(window).width());

	###
	#设置根元素的font-size值
	###
	((doc, win)->
		docEl = doc.documentElement;
		resizeEvt = if 'orientationchange' in window then 'orientationchange' else 'resize';
		recalc = ()->
			clientWidth = docEl.clientWidth;
			if not clientWidth
				return ;
			docEl.style.fontSize = 14 * (clientWidth / 320) + 'px';
		if not doc.addEventListener
			return;
		$(document).ready recalc ;
		$(window).resize recalc ;
		#win.addEventListener resizeEvt, recalc, false ;
		#doc.addEventListener 'onload', recalc, false ;
	)(document, window);


	###
	#自定义jQuery函数
	###
	$.fn.extend {
		###
		#设置固定导航栏  例：$(".fix-bar").fixBar();
		###
		fixBar: ()->
			_this = $(this);
			offTop = _this.offset().top;
			#console.log offTop ;
			fix = ()->
				scrollTop = $(document).scrollTop();
				# $(".mask").html "滚动：" + scrollTop;
				if scrollTop >= offTop
					_this.addClass "good-details-header-fix" ;
				else 
					if _this.hasClass "good-details-header-fix"
						_this.removeClass "good-details-header-fix" ;

			$(document).on "scroll load", fix

		###
		#自定义tap移动端点击函数
		###
		tap: (callbackfunc)->
			_this = $(this);
			x = y = 0;
			tag = false;
			_this.on "touchstart", (e)->
				#console.log e.originalEvent.targetTouches[0].pageX ;
				x = e.originalEvent.targetTouches[0].pageX;
				y = e.originalEvent.targetTouches[0].pageY;
			.on "touchmove", (e)->
				console.log e.orientationchange.targetTouches;
				if Math.abs (e.originalEvent.targetTouches[0].pageX - x) <= 5 and Math.abs (e.originalEvent.targetTouches[0].pageY - y) <= 5
					tag = true;
				else 
					tag = false;
			.on "touchend", (e)->
				console.log tag ;
				if tag is true
					callbackfunc();
				else 
					return;


	}

	

