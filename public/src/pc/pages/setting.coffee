
alert = require "./../components/warn-box.coffee"

Uploader = require("./../common/uploader/index.coffee")
 
$ ()->
	submitBtn = $(".user-form-submit .submit-btn")
	setName = $(".set-username")
	userSignature = $(".user-signature")
	userName = $(".user-name .name")
	signOutBtn = $(".sign-out a")
	avatar = $(".user-info-board .avatar")
	headerAvatar = $("#header_user .avatar-img img")
	headerName = $("#header_user .avatar-name")
	laoding = $(".avatar-waiting")


	#上传头像
	uploadAvatar = (data)->
		$.post "/pc_mine/set_avatar", data, (msg)->
			laoding.fadeOut(300)
			console.log "前端提交成功后的回调"
			if msg["errCode"] isnt 0
				console.log msg["message"]
			if msg["errCode"] is 10
				window.location = "/pc/login/"

	#绑定按钮的上传头像事件
	behindUploader = new Uploader {
		domain: "http://7xl6gj.com1.z0.glb.clouddn.com/",	# bucket 域名，下载资源时用到，**必需**
		browse_button: 'avatar_upload_input',       # 上传选择的点选按钮的id，**必需**
		container: 'avatar_upload',       # 上传选择的点选按钮父容器的id，**必需**
	}, {
		BeforeUpload: (up, file)->
			laoding.fadeIn(300)
		FileUploaded: (up, file, info)->
			info = $.parseJSON info
			domain = up.getOption('domain')

			url =  domain + info.key
			console.log url
			avatar.attr "src", url
			headerAvatar.attr "src", url
			uploadAvatar { avatar: url }
	}


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
				return
			if msg["errCode"] is 10
				window.location = "/pc/login/"
			headerName.text(name)


	#修改个性签名
	changSign = ()->
		sign = userSignature.val()
		if sign.length is 0 
			console.log "请输入用户名"
			return
		$.post "/pc_mine/set_sign", {
			sign: sign
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
				alert.warn "提交成功"
			else
				alert.warn msg["message"]

	#退出登录
	signOut = ()->
		$.post "/user/logout", {}, (msg)->
			if msg["errCode"] is 0
				alert.warn "退出成功", ()->
					window.location.href = "/pc_home/"
			else
				alert.warn msg["message"], ()->
					window.location.href = "/pc/login"



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

