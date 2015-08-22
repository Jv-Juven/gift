@extends("layouts.master")


@section("title")
礼拉
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
					@foreach($posters as $poster)
						<div class="swiper-slide">
							<a href="/home/gift_detail?gift_id={{$poster->info_url}}">
								<img src="{{ $poster->photo_url }}">
							</a>
						</div>
					@endforeach

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
			@foreach($topics as $topic)
			<li class="home-topics">
				<a href="/home/topic?topic_id={{ $topic->id }}">
					<img src="{{ $topic->topic_url }}">
				</a>
			</li>
			@endforeach

		</ul>
	</div>
@stop


@section("js")
	@parent
	<script type="text/javascript" src="/dist/js/pages/home.js"></script>
@stop