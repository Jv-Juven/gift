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

	#修改头部图片
	hearBar = $(".header-menubar a img").attr("src", "/images/pc/components/shu-bar.png")

	#默认选取“全部”
	searchItem.eq(0).addClass "active"

	#搜索
	search = (page)->

		if !page
			page = 1

		if lock is 0 
			searchMore.html("没有数据了~").show()
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
		console.log( 
			_char + "\n"
			scene + "\n"
			object + "\n"
			price + "\n"
		 )

		if (_char is undefined) or (scene is undefined) or (object is undefined) or (price is undefined)
			return 

		#开始请求，加锁
		load_lock = 0
		searchMore.hide().fadeIn()
		$.post "/pc_election/selection_by_label", {
			per_page: 12,
			page: page,
			_char: _char,
			scene: scene,
			object: object,
			price: price
		}, (msg)->
			#请求完毕，解锁
			load_lock = 1
			if msg["gifts"].length is 0
				searchMore.hide().html("没有数据了~")
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
		searchMore.html("加载中......")
		#参数初始化 END
		search(num)

	#加载下一页
	$(window).scroll ()->
		if ($(window).scrollTop() + $(window).height()) is $(document).height()
			console.log num
			++num
			search(num)





	#商品的浮层显现
	$(document).on "mouseenter", ".search-recommend-box", (e)->
		_this = e.currentTarget
		$(_this).find(".box-cover").show()
	$(document).on "mouseleave", ".search-recommend-box", (e)->
		_this = e.currentTarget
		$(_this).find(".box-cover").hide()




