$ ()->

	###
	#商品详情页幻灯片
	###
	goodSwiper = new Swiper ".good-swipers",{
		direction: "horizontal",
		#autoplay: 5000,
		loop: "true",
		#如果需要分页器
		pagination: '.swiper-pagination'
	}

	###
	#点击介绍pannel按钮
	###
	$(".good-details-wrapper").tappable ()->
		curEle = $(this);
		index = curEle.index($(".good-details-wrapper"));
		if curEle.hasClass "active" 
			return;
		else
			curEle.addClass("active").siblings(".active").removeClass("active");
			$(".details-pannel").hide().eq(index).show();

	###
	#点击“我喜欢”按钮
	###
	$(".good-like").tappable ()->
		console.log "tap like!"

	# $(".page-content").append '<div class="mask" style="position:fixed;width:100%;height:100%;z-index:999;background: rgb(255,255,255)"></div>'

$(window).load ()->

	###
	#固定选项标题
	###
	$(".good-details-header").fixBar();