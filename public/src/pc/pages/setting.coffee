$ ()->
	submitBtn = $(".user-form-submit")
	setName = $(".set-username")
	userSignature = $(".user-signature")
	userName = $(".user-name .name")

	#修改资料
	# $(document).on "mouseenter", ".user-name .name", ()->
	# 	setName.css("display", "block")
	# $(document).on "mouseleave", ".set-username", ()->
	# 	setName.css("display", "none")

	# $(document).on "mouseenter", ".user-signature", ()->
	# 	setSignature.css("display", "block")
	# $(document).on "mouseleave", ".user-signature", ()->
	# 	setSignature.css("display", "none")

	editStatus = (e)->
		_this = $(e.currentTarget)
		_this.css {
			"color": "rgb(56, 56, 56)",
			"background": "rgb(255, 255, 255)"

		}
	noeditStatus = (e)->
		_this = $(e.currentTarget)
		_this.css {
			"color": "rgb(255, 255, 255)",
			"background": "transparent"

		}

	userName.on "focus", (e)->
		editStatus(e)
	userName.on "blur", (e)->
		noeditStatus(e)
	userName.on "keydown", (e)->
		if e.keyCode is 13
			noeditStatus(e)
			$(this).blur()

	userSignature.on "focus", (e)->
		editStatus(e)
	userSignature.on "blur", (e)->
		noeditStatus(e)
	userSignature.on "keydown", (e)->
		if e.keyCode is 13
			noeditStatus(e)
			$(this).blur()

