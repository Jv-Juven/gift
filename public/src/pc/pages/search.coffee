$ ()->

	searchRecBox = $(".search-recommend-box")

	searchRecBox.hover ()-> 
		$(this).find(".box-cover").show()
	, ()-> 
		$(this).find(".box-cover").hide()