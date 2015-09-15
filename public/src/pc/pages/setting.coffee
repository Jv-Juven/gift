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

	#修改用户名
	changName = ()->
		name = userName.val()
		if name.length is 0 
			console.log "请输入用户名"
			return
		$.post "/pc_mine/set_name", {
			username: name
		}, (msg)->
			if msg["errCode"] isnt 0
				console.log msg["message"]
			if msg["errCode"] is 10
				location.reload()


	#修改个性签名
	changSign = ()->
		sign = userSignature.val()
		if sign.length is 0 
			console.log "请输入用户名"
			return
		$.post "/pc_mine/set_sign", {
			usersign: sign
		}, (msg)->
			if msg["errCode"] isnt 0
				console.log msg["message"]
			if msg["errCode"] is 10
				location.reload()

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
		$.post "/pc_mine/set_info", {
			gender: gender,
			birthday: birthday,
			constellation: constellation,
			position: position
		}, (msg)->
			if msg["errCode"] is 0
				alert ("提交成功")
			else
				alert (msg["message"])

	#退出登录
	signOut = ()->


	userName.on "focus", (e)->
		editStatus(e)
	userName.on "blur", (e)->
		noeditStatus(e)
		changName()
	userName.on "keydown", (e)->
		if e.keyCode is 13
			noeditStatus(e)
			$(this).blur()
			changName()

	userSignature.on "focus", (e)->
		editStatus(e)
	userSignature.on "blur", (e)->
		noeditStatus(e)
		changSign()
	userSignature.on "keydown", (e)->
		if e.keyCode is 13
			noeditStatus(e)
			$(this).blur()
			changSign()


	#“提交修改”的按钮
	submitBtn.on "click", submit


