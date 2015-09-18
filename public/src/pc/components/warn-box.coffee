warn = (text, callback)->
	$(".warn-box .warn-box-words").text(text)
	$(".warn-box").fadeIn(200)

	# hideWarn = ()->
	# 	$(".warn-box").fadeOut(200, callback)


	$(".warn-box .warn-box-btn").off().on "click", ()->
		$(".warn-box").fadeOut(200, callback)
		

exports.warn = warn