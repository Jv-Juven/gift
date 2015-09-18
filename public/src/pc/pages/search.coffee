
alert = require "./../components/warn-box.coffee"

$ ()->

	searchRecBox = $(".search-recommend-box")
	searchBtn = $(".search-input-icon")
	searchRecContent = $(".search-recommend-content")
	charItems = $(".search-items-tr .char li")
	sceneItems = $(".search-items-tr .scene li")
	objectItems = $(".search-items-tr .object li")
	priceItems = $(".search-items-tr .price li")
	searchItem = $(".search-items-container .item")
	searchMore = $(".search-more")
	num = 1#请求的页码
	lock = 1#数据锁，数据请求为空时，lock为0加锁，不能请求信息
	load_lock = 1#加载锁，加载过程中不允许再次请求
	timeout = new Object()
	likeBtn = $(".box-cover-like img")
	#修改头部图片
	headerBar = $(".header-menubar a img").attr("src", "/images/pc/components/shu-bar.png").parent().attr "href", "javascript:"
	headerBar.on "click", ()->
		history.back(-1)

	#默认选取“全部”
	# charItems.eq(0).addClass "active"
	# sceneItems.eq(0).addClass "active"
	# objectItems.eq(0).addClass "active"
	# priceItems.eq(0).addClass "active"

	#点击“喜欢”
	tapLike = (gift_id, likeImg)->
		$.post "/home/collection", {
			gift_id: gift_id
		}, (msg)->
			console.log msg
			if msg["errCode"] isnt 0
				alert.warn msg["message"]
				return
			likeImg.toggle()

	#搜索
	search = ()->

		if lock is 0 
			searchMore.html('<img style="width: 140px" src="/images/pc/search/loaded.png">').show()
			clearTimeout(timeout)
			timeout = setTimeout ()->
				searchMore.fadeOut(1400)
			,2000
			return

		if load_lock is 0
			return

		_char = charItems.filter(".active").attr("data-id")
		scene = sceneItems.filter(".active").attr("data-id")
		object = objectItems.filter(".active").attr("data-id")
		price = priceItems.filter(".active").attr("data-id")
	
		# if (_char is undefined) or (scene is undefined) or (object is undefined) or (price is undefined)
		# 	return 

		#开始请求，加锁
		load_lock = 0
		searchMore.hide().fadeIn()
		$.post "/pc_election/selection_by_label", {
			per_page: 12,
			page: num,
			_char: _char,
			scene: scene,
			object: object,
			price: price
		}, (msg)->
			#请求完毕，解锁
			load_lock = 1
			if msg["gifts"].length is 0
				searchMore.html('<img style="width: 140px" src="/images/pc/search/loaded.png">')
				clearTimeout(timeout)
				timeout = setTimeout ()->
					searchMore.fadeOut(1400)
				,2000
				lock = 0
				return

			searchMore.fadeOut()

			tpl = _.template $("#search_tpl").html()
			itemHtml = tpl {
				"array": msg["gifts"]
			}
			searchRecContent.append itemHtml
			++ num

	searchItem.on "click", ()->
		_this = $(this)
		if _this.hasClass "active"
			return
		_this.parent().find(".item").removeClass "active"
		_this.addClass "active"
		#参数初始化 START
		searchRecContent.html("")
		num = 1
		lock = 1
		searchMore.html('<img src="/images/pc/search/loading.gif">')
		#参数初始化 END
		search()

	#加载下一页
	$(window).scroll ()->
		if ($(window).scrollTop() + $(window).height()) is $(document).height()
			# console.log num
			search()



	search()

	$(document).on "click", ".box-cover-like img", (e)->
		_this = $(e.currentTarget)
		gift_id = _this.parent().parent().parent().parent().attr("data-id")
		tapLike(gift_id, _this.parent().find("img"))
		return false

	#商品的浮层显现
	$(document).on "mouseenter", ".search-recommend-box", (e)->
		_this = e.currentTarget
		$(_this).find(".box-cover").show()
	$(document).on "mouseleave", ".search-recommend-box", (e)->
		_this = e.currentTarget
		$(_this).find(".box-cover").hide()




