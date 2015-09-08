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
	#建立瀑布流列容器
	buildCol = ()->
		items = $(".center-gifts-container .center-gift")#获取需要“瀑布流”的项
		width = items.outerWidth(true)#设置容器的宽度
		itemsWrapper01 = $("<div class='center-gift-wrapper'></div>").css("width", "10.6rem").appendTo $(".center-gifts-container")
		itemsWrapper02 = $(itemsWrapper01).clone().appendTo($(".center-gifts-container")).css "margin-left", ".6rem"

	#为容器添加项，判断容器的高度，为高度最小的容器添加元素
	addItems = (items)->
		if items.length is 1
			appendeCol = if $(".center-gift-wrapper").eq(0).outerHeight(true) > $(".center-gift-wrapper").eq(1).outerHeight(true) then  $(".center-gift-wrapper").eq(1) else $(".center-gift-wrapper").eq(0)
			appendeCol.append items
		else
			$.each items,(index, ele)->
				appendeCol = if $(".center-gift-wrapper").eq(0).outerHeight(true) > $(".center-gift-wrapper").eq(1).outerHeight(true) then  $(".center-gift-wrapper").eq(1) else $(".center-gift-wrapper").eq(0)
				appendeCol.append ele



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
		# child.find(".center-gift-link").attr "href", data["taobao_url"]
		# child.find(".center-gift-img").attr "src", data["url"]["url"]
		# child.find(".center-gift-title").text data["title"]
		# child.find(".center-gift-price").text $(this).text() + data["price"]
		# child.find(".center-gift-like span").text data["focues_num"]
		if page is 1 
			addItems child
		return child

	#异步获取数据
	loadData = (callback)->
		console.log "start"
		if lock is 1
			return
		lock = 1
		$.post "/like_ajax", {
			per_page: 6,
			page: page
		}, (d)->
			items = []
			msg = d["gifts"]
			console.log msg
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
				$.each items, (index, ele)->
					addItems ele
					console.log "end"

	buildCol()
	loadData()








