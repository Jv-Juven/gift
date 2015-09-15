$ ()->
	userHotBox = $(".user-hot-board")
	userCollectionli = $(".user-collection-li")
	userWrapper = $(".user-wrappers")
	giftsWrapper = $(".user-recommend-content")
	topicsWrapper = $(".user-hot-content")
	loadTip = $(".load-tip")
	num01 = 1#请求的页码
	num02 = 1
	lock01 = 1#数据锁，数据请求为空时，lock为0加锁，不能请求信息
	lock02 = 1
	load_lock01 = 1#加载锁，加载过程中不允许再次请求
	load_lock02 = 1#加载锁，加载过程中不允许再次请求

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
	$(document).on "mouseenter", ".user-hot-board", (e)->
		_this = e.currentTarget
		$(_this).stop(true).animate({
			bottom: "0px"
		}, 300)
	$(document).on "mouseleave", ".user-hot-board", (e)->
		_this = e.currentTarget
		$(_this).stop(true).animate({
			bottom: "-21px"
		}, 300)

	#加载数据
	loadGifts = (page)->
		if !page
			page = 1
		if lock01 is 0
			return
		if load_lock01 is 0
			return
		load_lock01 = 0

		#请求开始
		loadTip.find("img").attr("src","/images/pc/search/loading.gif").end().hide().fadeIn()
		$.get "/pc_mine/like_gift", {
			per_page: 16,
			page: page
		}, (msg)->

			#请求结束
			loadTip.fadeOut()
			load_lock01 = 1

			if msg["errCode"] isnt 0
				alert msg["message"]
				return
			if msg["gifts"].length is 0
				loadTip.find("img").attr("src","/images/pc/search/loaded.gif")
				loadTip.fadeOut(2000)
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
		if load_lock02 is 0
			return
		load_lock02 = 0

		#请求开始
		loadTip.find("img").attr("src","/images/pc/search/loading.gif").end().hide().fadeIn()
		$.get "/pc_mine/join_article", {
			per_page: 16,
			page: page
		}, (msg)->

			#请求结束
			loadTip.fadeOut()
			load_lock02 = 1

			if msg["errCode"] isnt 0
				# alert msg["message"]
				return
			if msg["articles"].length is 0
				loadTip.find("img").attr("src","/images/pc/search/loaded.gif")
				loadTip.fadeOut(2000)
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






