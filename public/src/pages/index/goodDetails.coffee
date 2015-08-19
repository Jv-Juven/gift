$ ()->

	###
	#商品详情页幻灯片
	###
	goodSwiper = new Swiper ".good-swipers",{
		direction: "horizontal",
		autoplay: 5000,
		loop: "true",
		#如果需要分页器
		pagination: '.swiper-pagination'
	}