$ ()->
	userHotBox = $(".user-hot-board")
	userCollectionli = $(".user-collection-li")
	userWrapper = $(".user-wrappers")
	num01 = 1
	num02 = 2

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

	#加载数据
	loadGifts = (page)->
		if !page
			page = 1

		$.post "", {
			per_page: 16,
			page: page
		}, (msg)->
			tpl = _.template $("#search_tpl").html()#改为用参数设置
			itemHtml = tpl {
				"array": msg["gifts"]
			}
			wrapper.append itemHtml
