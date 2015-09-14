$ ()->
	submitBtn = $(".user-form-submit .submit-btn")
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

	#修改状态
	editStatus = (e)->
		_this = $(e.currentTarget)
		_this.css {
			"color": "rgb(56, 56, 56)",
			"background": "rgb(255, 255, 255)"

		}
	#无修改状态
	noeditStatus = (e)->
		_this = $(e.currentTarget)
		_this.css {
			"color": "rgb(255, 255, 255)",
			"background": "transparent"

		}
	#“提交修改”
	submit = ()->
		gender = $(".input-gender").text()
		birthday = $(".input-birthday").text()
		constellation = $(".input-constellation").text()
		position = $(".input-position").text()
		$.post "/", {
			gender: gender,
			birthday: birthday,
			constellation: constellation,
			position: position
		}, (msg)->
			if msg["errCode"] is 0
				alert("提交成功")
			else
				alert("提交失败")
	


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


	#“提交修改”的按钮
	submitBtn.on "click", submit


