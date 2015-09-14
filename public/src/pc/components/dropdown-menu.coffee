$ ()->
	menuList = $(".menu-list")
	menuHeight = menuList.outerHeight(true)
	menuSelect = $(".menu-seleted")


	menuSelect.on "click", ()->
		_this = $(this)
		console.log _this.find(".menu-list").outerHeight(true)
