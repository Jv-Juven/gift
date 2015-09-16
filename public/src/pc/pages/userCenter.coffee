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
	loadGifts = ()->
		if lock01 is 0
			loadTip.find("img").attr("src","/images/pc/search/loaded.png").css("width", "140px").end().show().fadeOut(2000)
			return
		if load_lock01 is 0
			return
		load_lock01 = 0

		#请求开始
		loadTip.find("img").attr("src","/images/pc/search/loading.gif").end().hide().fadeIn()
		$.get "/pc_mine/like_gift", {
			per_page: 16,
			page: num01
		}, (msg)->

			#请求结束
			loadTip.fadeOut()
			load_lock01 = 1

			if msg["errCode"] isnt 0
				alert msg["message"]
				return
			if msg["gifts"].length is 0
				loadTip.find("img").attr("src","/images/pc/search/loaded.png").css("width", "140px")
				loadTip.fadeOut(2000)
				lock01 = 0
				return
			
			tpl = _.template $("#gifts_tpl").html()#改为用参数设置
			itemHtml = tpl {
				"array": msg["gifts"]
			}
			giftsWrapper.append itemHtml
			++ num01


	loadTopics = ()->
		if lock02 is 0
			loadTip.find("img").attr("src","/images/pc/search/loaded.png").css("width", "140px").end().show().fadeOut(2000)
			return
		if load_lock02 is 0
			return
		load_lock02 = 0

		#请求开始
		loadTip.find("img").attr("src","/images/pc/search/loading.gif").end().hide().fadeIn()
		$.get "/pc_mine/join_article", {
			per_page: 6,
			page: num02
		}, (msg)->
			#请求结束
			loadTip.fadeOut()
			load_lock02 = 1

			if msg["errCode"] isnt 0
				# alert msg["message"]
				return
			if msg["articles"].length is 0
				loadTip.find("img").attr("src","/images/pc/search/loaded.png").css("width", "140px")
				loadTip.fadeOut(2000)
				lock02 = 0
				return
			
			tpl = _.template $("#topics_tpl").html()#改为用参数设置
			itemHtml = tpl {
				"array": msg["articles"]
			}
			topicsWrapper.append itemHtml
			++ num02

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
			# likeImg.parents(".user-recommend-box").fadeOut()#隐藏该礼品
			window.location.reload()



	loadGifts()
	loadTopics()


	$(document).on "click", ".box-cover-like img", (e)->
		_this = $(e.currentTarget)
		gift_id = _this.parent().parent().parent().parent().attr("data-id")
		tapLike(gift_id, _this.parent().find("img"))
		return false


	$(window).scroll ()->
		if ($(window).scrollTop() + $(window).height()) is $(document).height()
			if $(".user-recommend-wrapper").css("display") is "block"
				loadGifts()
			else
				loadTopics()






