$ ()->
	# (($)->
		
	# 	items = $(".center-gifts-container .center-gift")
	# 	width = items.outerWidth(true)
	# 	itemsWrapper01 = $("<div class='center-gift-wrapper'></div>").css("width", width).appendTo $(".center-gifts-container")
	# 	itemsWrapper02 = $(itemsWrapper01).clone().appendTo $(".center-gifts-container")
	# 	items.each (index, ele)->
	# 		if index%%2 is 0
	# 			$(ele).appendTo itemsWrapper01
	# 		else
	# 			$(ele).appendTo itemsWrapper02
	# 	itemsWrapper02.css "margin-left", ".8rem"
	# 	)(jQuery) 
	giftsContainer = $("#center-gifts-container")
	centerGift = $("#gift_template")
	item = $(".center-gift")
	page = 1
	lock = 0#请求锁，0为可请求 1为禁止请求
	itemsWrapper01 = ""
	itemsWrapper02 = ""

	#铺满视口
	$.fn.extend {
		fullScreen: ()->
			_this = $(this)
			winWidth = $(window).outerWidth()
			winHeight = $(window).outerHeight()
			_this.css {
				"width": winWidth,
				"height": winHeight
			}
	}

	#建立瀑布流列容器
	buildCol = ()->
		items = $(".center-gifts-container .center-gift")#获取需要“瀑布流”的项
		width = items.outerWidth(true)#设置容器的宽度
		itemsWrapper01 = $("<div class='center-gift-wrapper'></div>").css("width", "10.6rem").appendTo $(".center-gifts-container")
		itemsWrapper02 = $(itemsWrapper01).clone().appendTo($(".center-gifts-container")).css "margin-left", ".6rem"

	#为容器添加项，判断容器的高度，为高度最小的容器添加元素
	addItems = (items)->
		
		if items.length is 1
			appendeCol = if itemsWrapper01.outerHeight(true) > itemsWrapper02.outerHeight(true) then  itemsWrapper02 else itemsWrapper01
			appendeCol.append items
			console.log appendeCol.index()+":"+$(items).attr("data-id")+"\nheight:"+itemsWrapper01.outerHeight(true)+"\t"+itemsWrapper02.outerHeight(true)
		else
			$.each items,(index, ele)->
				appendeCol = if itemsWrapper01.outerHeight(true) > itemsWrapper02.outerHeight(true) then  itemsWrapper02 else itemsWrapper01
				appendeCol.append ele
				console.log appendeCol.index()+":"+$(ele).attr("data-id")+"\nheight:"+itemsWrapper01.outerHeight(true)+"\t"+itemsWrapper02.outerHeight(true)


	#将获取到得数据渲染成HTML项
	renderHtml = (data, items)->
		tpl = _.template centerGift.html()
		child = $(tpl {
			"url": data["taobao_url"],
			"img_url": data["url"]["url"],
			"title": data["title"],
			"price": data["price"],
			"like": data["focus_num"],
			"id": data["id"]
		})
		if page is 1 
			addItems child
		return child

	#异步获取数据
	loadData = (callback)->
		if lock is 1
			return
		lock = 1
		$(".full-screen").fadeIn(300)
		$.post "/like_ajax", {
			per_page: 8,
			page: page
		}, (d)->
			items = []
			msg = d["gifts"]
			$(".full-screen").fadeOut(300)
			if msg.length is 0
				return 
			for data in msg	
				item = renderHtml(data, items) 
				items.push item

			page = page + 1
			lock = 0
			if callback
				callback items

	$(window).scroll ()->

		if ($(window).scrollTop() + $(window).height()) is $(document).height()
			items = loadData (items)->
				addItems items
				# $.each items, (index, ele)->
				# 	addItems ele

	$(".full-screen").fullScreen()
	buildCol()
	loadData()








