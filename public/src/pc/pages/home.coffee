$ ()->

	homeMenuItems = $(".home-menu-item")
	homeWrappers =$(".home-wrappers")
	homeRecBox = $(".home-recommend-box")
	homeHotBox = $(".home-hot-board")
	likeBtn = $(".box-cover-like img")
	likeBtn = $(".box-cover-like img")
	# 设置幻灯片的高度 START
	winWidth = $(window).outerWidth(true)
	$(".home-swiper-container").css("height", winWidth * 0.4875)
	# 设置幻灯片的高度 END
	
	#点击“喜欢”
	tapLike = (gift_id, likeImg)->
		$.post "/home/collection", {
			gift_id: gift_id
		}, (msg)->
			console.log msg
			if msg["errCode"] isnt 0
				alert msg["message"]
				return
			likeImg.toggle()

	homeSwiper = new Swiper ".home-swiper-container", {
		loop: true,
		autoplay: 4000,
		paginationClickable: true,
		autoplayDisableOnInteraction: false,
		grabCursor: true,
		speed: 400
	}
	console.log $(".swiper-slide").outerHeight(true)
	homeSwiper.reInit()


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

	likeBtn.on "click", ()->
		_this = $(this)
		gift_id = _this.parent().parent().parent().parent().attr("data-id")
		tapLike(gift_id, _this.parent().find("img"))
		return false



