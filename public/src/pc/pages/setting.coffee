$ ()->
	submitBtn = $(".user-form-submit .submit-btn")
	setName = $(".set-username")
	userSignature = $(".user-signature")
	userName = $(".user-name .name")
	signOutBtn = $(".sign-out a")

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
				window.location = "/pc/login/"


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
				window.location = "/pc/login/"

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
				alert "提交成功"
			else
				alert msg["message"]

	#退出登录
	signOut = ()->
		$.post "/user/logout", {}, (msg)->
			if msg["errCode"] is 0
				alert "退出成功"
				window.location.href = "/pc_home/"
			else
				alert "退出失败"



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

	#”退出登录“
	signOutBtn.on "click", signOut

