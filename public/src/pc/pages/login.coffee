
loginMenuitems = $(".login-board-menu li")
loginMenuboards = $(".login-board")

$ ()->
	loginMenuitems.on "click", ()->
		_this = $(this)
		if _this.hasClass "active"
			return
		_index = _this.index()
		loginMenuitems.removeClass "active"
		_this.addClass "active"
		loginMenuboards.hide().eq(_index).fadeIn(200)