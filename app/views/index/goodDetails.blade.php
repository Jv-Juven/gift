@extends("layouts.master")


@section("title")

@stop

@section("css")
	@parent
	<link rel="stylesheet" type="text/css" href="/dist/css/pages/goodDetails.css">
@stop


@section("body")
	<div class="page-content">

		<section class="good-pics">
			<div class="swiper-container good-swipers">
				<div class="swiper-wrapper">

					<div class="swiper-slide">
						<a href="/">
							<img src="/images/index/pic03.png">
						</a>
					</div>

					<div class="swiper-slide">
						<a href="/">
							<img src="/images/index/pic03.png">
						</a>
					</div>

					<div class="swiper-slide">
						<a href="/">
							<img src="/images/index/pic03.png">
						</a>
					</div>

				</div>

				<!-- 如果需要分页器 -->
				<div class="swiper-pagination"></div>

			</div>
		</section>

		<section class="good-intro">
			<div class="intro-wrapper">
				<div class="intro-name">990纯银项链</div>
				<div class="intro-price">￥<span class="price">99.00</span></div>
				<div class="intro-details">#中国情人节快到了，送什么礼物给女朋友好呢？990纯银项链代表纯洁的爱，七夕节日，这是你送给她得爱！#</div>
			</div>
		</section>

		<section class="good-details">
			<div class="good-details-header">
				<div class="good-details-wrapper">
					<span class="good-pannel-btn">
						图文介绍
					</span>
				</div>

				<div class="good-details-wrapper active">
					<span class="good-pannel-btn">
						喜欢（<span>23</span>）
					</span>
				</div>
			</div>
			<div class="details-pannel intro-details-pannel" style="display: none;">
				<ul class="good-intro-wrapper">
					<li>
						<img src="/images/index/pic04.png">
					</li>
					<li>
						<img src="/images/index/pic05.png">
					</li>
					<li>
						<img src="/images/index/pic06.png">
					</li>
					<li>
						<img src="/images/index/pic07.png">
					</li>
				</ul>
			</div>

			<div class="details-pannel comment-details-pannel">
				<div class="good-praise">

					<span class="avatar">
						<a href="/">
							<img src="/images/good_details/avatar01.png">
						</a>
					</span>
					<span class="avatar">
						<a href="/">
							<img src="/images/good_details/avatar02.png">
						</a>
					</span>
					<span class="avatar">
						<a href="/">
							<img src="/images/good_details/avatar03.png">
						</a>
					</span>
					<span class="avatar">
						<a href="/">
							<img src="/images/good_details/avatar03.png">
						</a>
					</span>
					<span class="avatar">
						<a href="/">
							<img src="/images/good_details/avatar01.png">
						</a>
					</span>
					<span class="avatar">
						<a href="/">
							<img src="/images/good_details/avatar02.png">
						</a>
					</span>
					<span class="avatar">
						<a href="/">
							<img src="/images/good_details/avatar03.png">
						</a>
					</span>
					<span class="avatar">
						<a href="/">
							<img src="/images/good_details/avatar02.png">
						</a>
					</span>
					<span class="avatar">
						<a href="/">
							<img src="/images/good_details/avatar02.png">
						</a>
					</span>

					<span class="add">
						<div>
							24
						</div>
					</span>

					<div style="clear: both;"></div>
				</div>
				<div class="good-comment-title">
					猜你喜欢的
				</div>
				<div class="good-recommend">
					<div class="goods-recommend-item">
						<a href="/">
							<img src="/images/good_details/pics01.png">
						</a>
					</div>
					<div class="goods-recommend-item">
						<a href="/">
							<img src="/images/good_details/pics03.png">
						</a>
					</div>
					<div class="goods-recommend-item">
						<a href="/">
							<img src="/images/good_details/pics01.png">
						</a>
					</div>
					<div class="goods-recommend-item">
						<a href="/">
							<img src="/images/good_details/pics02.png">
						</a>
					</div>
					<div class="goods-recommend-item">
						<a href="/">
							<img src="/images/good_details/pics01.png">
						</a>
					</div>
					<div class="goods-recommend-item">
						<a href="/">
							<img src="/images/good_details/pics03.png">
						</a>
					</div>
					<div class="goods-recommend-item">
						<a href="/">
							<img src="/images/good_details/pics03.png">
						</a>
					</div>
					<div class="goods-recommend-item">
						<a href="/">
							<img src="/images/good_details/pics01.png">
						</a>
					</div>
					<div class="goods-recommend-item">
						<a href="/">
							<img src="/images/good_details/pics02.png">
						</a>
					</div>

					<div style="clear: both;"></div>
					<!-- <div class="recommend-pics-wrapper"></div> -->
				</div>

				<div class="good-details-footer">
					<span class="good-btns good-like">
						<!-- <span class="btns-pattern"></span> -->
						<span class="btns-pattern-like"></span>
						我喜欢
					</span>
					<span class="good-btns good-buy">
						<span class="btns-pattern"></span>
						去购买
					</span>
				</div>
			</div>
		</section>
	</div>
@stop


@section("js")
	@parent
	<script type="text/javascript" src="/dist/js/pages/goodDetails.js"></script>
@stop