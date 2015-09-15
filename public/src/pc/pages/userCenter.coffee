$ ()->
	userHotBox = $(".user-hot-board")
	userCollectionli = $(".user-collection-li")
	userWrapper = $(".user-wrappers")
	giftsWrapper = $(".user-recommend-content")
	topicsWrapper = $(".user-hot-wrapper")
	num01 = 1
	num02 = 2
	lock01 = 1
	lock02 = 1

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
		if lock01 is 0
			return

		$.get "/pc_mime/like_gift", {
			per_page: 16,
			page: page
		}, (msg)->
			if msg.length is 0
				lock01 = 0
				return
			tpl = _.template $("#gifts_tpl").html()#改为用参数设置
			itemHtml = tpl {
				"array": msg["gifts"]
			}
			giftsWrapper.append itemHtml


	loadTopics = (page)->
		if !page
			page = 1
		if lock02 is 0
			return

		$.get "/pc_mime/join_article", {
			per_page: 16,
			page: page
		}, (msg)->
			if msg.length is 0
				lock02 = 0
				return
			tpl = _.template $("#topics_tpl").html()#改为用参数设置
			itemHtml = tpl {
				"array": msg["articles"]
			}
			topicsWrapper.append itemHtml


	loadGifts(num01)
	loadTopics(num02)


	$(window).scroll ()->
		if ($(window).scrollTop() + $(window).height()) is $(document).height()
			if $(".user-recommend-wrapper").css("display") is "block"
				++ num01
				loadGifts(num01)
			else
				++ num02
				loadTopics(num02)






