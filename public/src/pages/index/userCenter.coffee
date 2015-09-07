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
	
	buildCol = ()->
		items = $(".center-gifts-container .center-gift")
		width = items.outerWidth(true)
		itemsWrapper01 = $("<div class='center-gift-wrapper'></div>").css("width", "10.6rem").appendTo $(".center-gifts-container")
		itemsWrapper02 = $(itemsWrapper01).clone().appendTo($(".center-gifts-container")).css "margin-left", ".6rem"

	addItems = (items)->
		if items.length is 1
			appendeCol = if $(".center-gift-wrapper").eq(0).outerHeight(true) > $(".center-gift-wrapper").eq(1).outerHeight(true) then  $(".center-gift-wrapper").eq(1) else $(".center-gift-wrapper").eq(0)
			appendeCol.prepend items
		else
			$.each items,(index, ele)->
				appendeCol = if $(".center-gift-wrapper").eq(0).outerHeight(true) > $(".center-gift-wrapper").eq(1).outerHeight(true) then  $(".center-gift-wrapper").eq(1) else $(".center-gift-wrapper").eq(0)
				appendeCol.prepend ele



	renderHtml = (data, items)->
		tpl = _.template centerGift.html()
		child = $(tpl {
			"url": data["taobao_url"],
			"img_url": data["url"]["url"],
			"title": data["title"],
			"price": data["price"],
			"like": data["focues_num"],
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

	loadData = (callback)->
		console.log "start"
		$.post "/like_ajax", {
			per_page: 6,
			page: page
		}, (d)->
			if d.length is 0
				return false 
			items = []
			msg = d["gifts"]
			for data in msg	
				item = renderHtml(data, items) 
				items.push item

			page = page + 1

			if callback
				callback items

	$(window).scroll ()->

		if ($(window).scrollTop() + $(window).height()) is $(document).height()
			items = loadData (items)->
				console.log items
				$.each items, (index, ele)->
					addItems ele
					console.log "end"


	buildCol()
	loadData()








