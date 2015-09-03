$ ()->
	(($)->

		items = $(".center-gifts-container .center-gift")
		width = items.outerWidth(true)
		itemsWrapper01 = $("<div class='center-gift-wrapper'></div>").css("width", width).appendTo $(".center-gifts-container")
		itemsWrapper02 = $(itemsWrapper01).clone().appendTo $(".center-gifts-container")
		items.each (index, ele)->
			if index%%2 is 0
				$(ele).appendTo itemsWrapper01
			else
				$(ele).appendTo itemsWrapper02
		itemsWrapper02.css "margin-left", ".8rem"
		)(jQuery)