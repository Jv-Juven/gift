$ ()->

	homeMenuitems = $(".home-menu-item")
	homeWrappers =$(".home-wrappers")

	homeSwiper = new Swiper ".home-swiper-container", {}

	searchSwiper = new Swiper ".search-swiper-container", {}

	$(".home-prev").on "click", (e)->
		e.preventDefault()
		homeSwiper.swipePrev()

	$(".home-next").on "click", (e)->
		e.preventDefault()
		homeSwiper.swipeNext()

	homeMenuitems.on "click", ()->
		_this = $(this)
		if _this.hasClass "active"
			return
		_index = _this.index()
		homeMenuitems.removeClass "active"
		_this.addClass "active"
		homeWrappers.hide().eq(_index).fadeIn(200)

