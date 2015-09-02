$ ()->

	###
	#首页幻灯片
	###
	homeSwiper = new Swiper ".home-swipers",{
		direction: "horizontal",
		autoplay: 5000,
		loop: "true",
		#如果需要分页器
		pagination: '.swiper-pagination'
	}
