$ ()->

	homeMenuItems = $(".home-menu-item")
	homeWrappers =$(".home-wrappers")
	homeRecBox = $(".home-recommend-box")
	homeHotBox = $(".home-hot-board")

	# 设置幻灯片的高度 START
	winWidth = $(window).outerWidth(true)
	$(".home-swiper-container").css("height", winWidth * 0.4875)
	# 设置幻灯片的高度 END
	
	homeSwiper = new Swiper ".home-swiper-container", {
		loop: true,
		autoplay: 4000,
		speed: 400
	}
	console.log $(".swiper-slide").outerHeight(true)
	homeSwiper.reInit()

	# searchSwiper = new Swiper ".search-swiper-container", {}

	$(".home-prev").on "click", (e)->
		e.preventDefault()
		homeSwiper.swipePrev()

	$(".home-next").on "click", (e)->
		e.preventDefault()
		homeSwiper.swipeNext()

	homeMenuItems.on "click", ()->
		_this = $(this)
		if _this.hasClass "active"
			return
		_index = _this.index()
		homeMenuItems.removeClass "active"
		_this.addClass "active"
		homeWrappers.hide().eq(_index).fadeIn(200)


	homeRecBox.hover ()-> 
		$(this).find(".box-cover").show()
	, ()-> 
		$(this).find(".box-cover").hide()

	homeHotBox.hover ()->
		$(this).stop(true).animate({
			bottom: "0px"
		}, 300)
	, ()->
		$(this).stop(true).animate({
			bottom: "-21px"
		}, 300)
	



