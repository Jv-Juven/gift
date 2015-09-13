$ ()->
	userHotBox = $(".user-hot-board")
	userCollectionli = $(".user-collection-li")
	userWrapper = $(".user-wrappers")

	#点击相应的选项卡
	userCollectionli.on "click", ()->
		_this = $(this)
		if _this.hasClass "active"
			return
		_index = _this.index()
		userCollectionli.removeClass "active"
		_this.addClass "active"
		userWrapper.hide().eq(_index).fadeIn(200)

	#商品的浮层显现
	$(document).on "mouseenter", ".user-recommend-box", (e)->
		_this = e.currentTarget
		$(_this).find(".box-cover").show()
	$(document).on "mouseleave", ".user-recommend-box", (e)->
		_this = e.currentTarget
		$(_this).find(".box-cover").hide()


	#话题的浮层显现
	userHotBox.hover ()->
		$(this).stop(true).animate({
			bottom: "0px"
		}, 300)
	, ()->
		$(this).stop(true).animate({
			bottom: "-21px"
		}, 300)