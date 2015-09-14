$ ()->
	submitBtn = $(".user-form-submit")
	setName = $(".set-username")
	setSignature = $(".set-signature")

	#修改资料
	$(document).on "mouseenter", ".user-name .name", ()->
		setName.show()
	$(document).on "mouseleave", ".set-username,.user-name .name", ()->
		setName.hide()

	$(document).on "mouseenter", ".user-signature", ()->
		setSignature.show()
	$(document).on "mouseleave", ".set-signature", ()->
		setSignature.hide()