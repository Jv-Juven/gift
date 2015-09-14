@extends("layouts.pc-master")


@section("css")
	@parent
	<link rel="stylesheet" type="text/css" href="/dist/pc/css/pages/home.css">
@stop

@section("body")
	<div class="page-content">
		<!-- 幻灯片 START	 -->
		<div class="home-swiper-container">
			<div class="swiper-wrapper">
			    <div class="swiper-slide">
			    	<a class="link-wrapper" href="javascript:">
			    		<img src="/images/pc/home/slide-img01.jpg">
			    	</a>
			    </div>
			    <div class="swiper-slide">
			    	<a class="link-wrapper" href="javascript:">
			    		<img src="/images/pc/home/slide-img02.jpg">
			    	</a>
		    	</div>
			    <div class="swiper-slide">
			    	<a class="link-wrapper" href="javascript:">
			    		<img src="/images/pc/home/slide-img03.jpg">
			    	</a>
		    	</div>
			    <div class="swiper-slide">
			    	<a class="link-wrapper" href="javascript:">
			    		<img src="/images/pc/home/slide-img04.jpg">
			    	</a>
		    	</div>
			</div>
			<div class="home-swiper-arrow">
				<div class="home-prev">
					<img src="/images/pc/home/arrow_left.png">
				</div>
				<div class="home-next">
					<img src="/images/pc/home/arrow_right.png">
				</div>
			</div>
		</div>
		<!-- 幻灯片 END	 -->

		<!-- 搜索 START -->
		<!-- <div class="home-seach">
			<div class="search-wrapper">
				<div class="search-box">
					<input type="text" class="search-input" placeholder="想找什么礼物">
					<div class="search-input-icon">
						<img src="/images/pc/search/search_icon.png">
					</div>
				</div>
			</div>
			<div class="search-swiper-container">
				<div class="swiper-wrapper">
					<div class="swiper-slide" style="background:rgba(223, 46, 240, 0)"></div>
					<div class="swiper-slide" style="background:rgba(23, 246, 240, 0)"></div>
					<div class="swiper-slide" style="background:rgba(148, 246, 190, 0)"></div>
				</div>
			</div>
		</div> -->
		<!-- 搜索 END -->
		<div class="home-topics-container">
			<ul class="home-menu-wrapper clearx">
				<li class="home-menu-item first active">
					<a class="home-a-text" href="javascript:">专题精选</a>
					<img class="under-line" src="/images/pc/home/underline.png">
				</li>
				<li class="home-menu-item">
					<a class="home-a-text" href="javascript:">甄选推荐</a>
					<img class="under-line" src="/images/pc/home/underline.png">
				</li>
				<li class="home-menu-item">
					<a class="home-a-text" href="javascript:">热门话题</a>
					<img class="under-line" src="/images/pc/home/underline.png">
				</li>
			</ul>
			<div class="home-wrappers home-topics-wrapper">
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
					
				</ul>
			</div>
			<div class="home-wrappers home-hot-wrapper" style="display: none;">
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
				</ul>
			</div>
		</div>
	</div>
@stop

@section("js")
	@parent
	<script type="text/javascript" src="/dist/pc/js/pages/home.js"></script>
@stop
