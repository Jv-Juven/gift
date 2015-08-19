
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
	)(document, window)

