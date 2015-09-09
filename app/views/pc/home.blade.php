@extends("layouts.pc-master")


@section("css")
	@parent
	<link rel="stylesheet" type="text/css" href="/dist/pc/css/pages/home.css">
@stop

@section("body")
	<div class="page-content">
		<div class="home-swiper-container">
			<img style="width: 100%; height: 100%;" src="/images/pc/home/homepic1.png">
		</div>
		<div class="home-seach"></div>
		<div class="home-topics-container">
			<ul class="home-menu-wrapper clearx">
				<li class="home-menu-item"><a class="home-a-text" href="javascript:">专题精选</a></li>
				<li class="home-menu-item"><a class="home-a-text" href="javascript:">甄选推荐</a></li>
				<li class="home-menu-item active"><a class="home-a-text" href="javascript:">热门话题</a></li>
			</ul>
			<div class="home-wrappers home-topics-wrapper" style="display: none;">
				<ul class="home-topics-content clearx">
					<li class="home-topics-box">
						<a href="/">
							<img src="/images/pc/home/pic01.png">
						</a>
					</li>
					<li class="home-topics-box">
						<a href="/">
							<img src="/images/pc/home/pic01.png">
						</a>
					</li>
					<li class="home-topics-box">
						<a href="/">
							<img src="/images/pc/home/pic01.png">
						</a>
					</li>
					<li class="home-topics-box">
						<a href="/">
							<img src="/images/pc/home/pic01.png">
						</a>
					</li>
					<li class="home-topics-box">
						<a href="/">
							<img src="/images/pc/home/pic01.png">
						</a>
					</li>
					<li class="home-topics-box">
						<a href="/">
							<img src="/images/pc/home/pic01.png">
						</a>
					</li>
					<li class="home-topics-box">
						<a href="/">
							<img src="/images/pc/home/pic01.png">
						</a>
					</li>
					<li class="home-topics-box">
						<a href="/">
							<img src="/images/pc/home/pic01.png">
						</a>
					</li>
					<li class="home-topics-box">
						<a href="/">
							<img src="/images/pc/home/pic01.png">
						</a>
					</li>
					<li class="home-topics-box">
						<a href="/">
							<img src="/images/pc/home/pic01.png">
						</a>
					</li>
					<li class="home-topics-box">
						<a href="/">
							<img src="/images/pc/home/pic01.png">
						</a>
					</li>
				</ul>
			</div>
			<div class="home-wrappers home-recommend-wrapper" style="display: none;">
				<ul class="home-recommend-content clearx">
					<li class="home-recommend-box">
						<a href="/">
							<img src="/images/pc/home/pic02.png">
							<span class="box-cover">
								<span class="box-cover-title">
									24K纯银定制戒指
								</span>
								<span class="box-cover-price">
									<span>￥89</span>
								</span>

								<span class="box-cover-like" href="http://baidu.com">
									<img src="/images/pc/home/like.png">
								</span>
							</span>
						</a>
					</li>
					<li class="home-recommend-box">
						<a href="/">
							<img src="/images/pc/home/pic02.png">
						</a>
					</li>
					<li class="home-recommend-box">
						<a href="/">
							<img src="/images/pc/home/pic02.png">
						</a>
					</li>
					<li class="home-recommend-box">
						<a href="/">
							<img src="/images/pc/home/pic02.png">
						</a>
					</li>
					<li class="home-recommend-box">
						<a href="/">
							<img src="/images/pc/home/pic02.png">
						</a>
					</li>
					<li class="home-recommend-box">
						<a href="/">
							<img src="/images/pc/home/pic02.png">
						</a>
					</li>
					<li class="home-recommend-box">
						<a href="/">
							<img src="/images/pc/home/pic02.png">
						</a>
					</li>
					<li class="home-recommend-box">
						<a href="/">
							<img src="/images/pc/home/pic02.png">
						</a>
					</li>
					<li class="home-recommend-box">
						<a href="/">
							<img src="/images/pc/home/pic02.png">
						</a>
					</li>
					<li class="home-recommend-box">
						<a href="/">
							<img src="/images/pc/home/pic02.png">
						</a>
					</li>
					<li class="home-recommend-box">
						<a href="/">
							<img src="/images/pc/home/pic02.png">
						</a>
					</li>
					<li class="home-recommend-box">
						<a href="/">
							<img src="/images/pc/home/pic02.png">
						</a>
					</li>
					<li class="home-recommend-box">
						<a href="/">
							<img src="/images/pc/home/pic02.png">
						</a>
					</li>
					<li class="home-recommend-box">
						<a href="/">
							<img src="/images/pc/home/pic02.png">
						</a>
					</li>
					<li class="home-recommend-box">
						<a href="/">
							<img src="/images/pc/home/pic02.png">
						</a>
					</li>
					<li class="home-recommend-box">
						<a href="/">
							<img src="/images/pc/home/pic02.png">
						</a>
					</li>
				</ul>
			</div>
			<div class="home-wrappers home-hot-wrapper">
				<ul class="home-hot-content clearx">
					<li class="home-hot-box">
						<a href="/">
							<img src="/images/pc/home/pic01.png">
							<span class="home-hot-cover">
								<img class="bg-img" src="/images/pc/home/cover_gradual.png">
								<span class="home-hot-board">
									<span class="home-hot-title">处女座女生的生日快到了，送什么好呢？求推荐有创意的小物品</span>
									<span class="home-hot-info">
										<span class="home-scan">
											<img class="home-hot-scan" src="/images/pc/home/scaned.png">
											<span class="scan-count">119</span>
										</span>
										<span class="home-scan">
											<img class="home-hot-comments" src="/images/pc/home/comments.png">
											<span class="scan-count">119</span>
										</span>
									</span>
								</span>
							</span>
						</a>
					</li>
					<li class="home-hot-box">
						<a href="/">
							<img src="/images/pc/home/pic01.png">
						</a>
					</li>
					<li class="home-hot-box">
						<a href="/">
							<img src="/images/pc/home/pic01.png">
						</a>
					</li>
					<li class="home-hot-box">
						<a href="/">
							<img src="/images/pc/home/pic01.png">
						</a>
					</li>
					<li class="home-hot-box">
						<a href="/">
							<img src="/images/pc/home/pic01.png">
						</a>
					</li>
					<li class="home-hot-box">
						<a href="/">
							<img src="/images/pc/home/pic01.png">
						</a>
					</li>
					<li class="home-hot-box">
						<a href="/">
							<img src="/images/pc/home/pic01.png">
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
@stop

@section("js")
	@parent
@stop
