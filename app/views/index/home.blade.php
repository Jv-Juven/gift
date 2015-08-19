@extends("layouts.master")


@section("title")

@stop

@section("css")
	@parent
	<link rel="stylesheet" type="text/css" href="/dist/css/pages/home.css">
@stop


@section("body")
	<div class="page-content">
		<ul class="home-wrapper">
			<li class="home-recommond">
				<div class="swiper-container home-swipers">
					<div class="swiper-wrapper">

						<div class="swiper-slide">
							<a href="/home/gift_detail">
								<img src="/images/index/pic01.png">
							</a>
						</div>

						<div class="swiper-slide">
							<a href="/">
								<img src="/images/index/pic02.png">
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
			</li>
			<li>
				<div class="home-topics-title">
					专题一荐
				</div>
			</li>
			<li class="home-topics">
				<a href="/home/topic">
					<img src="/images/index/pic01.png">
				</a>
			</li>
			<li class="home-topics">
				<a href="/">
					<img src="/images/index/pic03.png">
				</a>
			</li>
			<li class="home-topics">
				<a href="/">
					<img src="/images/index/pic01.png">
				</a>
			</li>
			<li class="home-topics">
				<a href="/">
					<img src="/images/index/pic03.png">
				</a>
			</li>
			<li class="home-topics">
				<a href="/">
					<img src="/images/index/pic01.png">
				</a>
			</li>
			<li class="home-topics">
				<a href="/">
					<img src="/images/index/pic03.png">
				</a>
			</li>
		</ul>
	</div>
@stop


@section("js")
	@parent
	<script type="text/javascript" src="/dist/js/pages/home.js"></script>
@stop