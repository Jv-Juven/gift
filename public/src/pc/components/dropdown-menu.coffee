$ ()->
	menuList = $(".menu-list")
	menuHeight = menuList.outerHeight(true)
	menuSelect = $(".menu-seleted")
	menuListItem = $(".menu-list .item")

	menuSelect.on "click", ()->
		_this = $(this)
		h = _this.outerHeight(true)

		if _this.find(".menu-list").css("display") == "block"
			_this.find(".menu-list").hide()
			return

		menuList.hide()
		height = _this.find(".menu-list").outerHeight(true)
		width = _this.find(".menu-list").outerWidth(true)
		_this.find(".menu-list").css({
			"top": -(height * 2)/3,# + h/2
			"right": -width
		}).slideDown(200)


	#下拉框选择
	menuListItem.on "click", ()->
		_this = $(this)
		_this.parent().parent().find(".menu-selectd-text").text(_this.text())
		return

