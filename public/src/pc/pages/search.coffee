$ ()->

	searchRecBox = $(".search-recommend-box")
	searchBtn = $(".search-input-icon")
	searchRecContent = $(".search-recommend-content")
	charItems = $(".search-items-tr .char li")
	sceneItems = $(".search-items-tr .scene li")
	objectItems = $(".search-items-tr .object li")
	priceItems = $(".search-items-tr .price li")
	searchItem = $(".search-items-container .item")
	num = 1

	#搜索
	search = (page)->
		if !page
			page = 1
		_char = charItems.filter(".active").attr("data-id")
		scene = sceneItems.filter(".active").attr("data-id")
		object = objectItems.filter(".active").attr("data-id")
		price = priceItems.filter(".active").attr("data-id")

		$.post "/pc_election/selection_by_label", {
			per_page: 12,
			page: page,
			_char: _char,
			scene: scene,
			object: object,
			price: price
		}, (msg)->
			tpl = _.template $("#search_tpl").html()
			itemHtml = tpl {
				"array": msg["gifts"]
			}
			searchRecContent.append itemHtml

	searchItem.on "click", ()->
		_this = $(this)
		searchItem.removeClass "active"
		_this.addClass "active"
		search(num)

	#加载下一页





	#商品的浮层显现
	$(document).on "mouseenter", ".search-recommend-box", (e)->
		_this = e.currentTarget
		$(_this).find(".box-cover").show()
	$(document).on "mouseleave", ".search-recommend-box", (e)->
		_this = e.currentTarget
		$(_this).find(".box-cover").hide()




		