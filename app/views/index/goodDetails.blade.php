@extends("layouts.master")


@section("title")
礼拉
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
				@if(isset($gift_posters))
					@foreach($gift_posters as $poster)
					<div class="swiper-slide">
						<a href="#">
							<img src="{{$poster->url}}">
						</a>
					</div>
					@endforeach
				@endif
				</div>

				<!-- 如果需要分页器 -->
				<!-- <div class="swiper-pagination"></div> -->

			</div>
		</section>
		@if(isset($gift))
		<section class="good-intro" id="good_intro" data-id="{{ $gift->id }}">
			<div class="intro-wrapper">
				<div class="intro-name">{{$gift->title}}</div>
				<div class="intro-price">￥<span class="price">{{$gift->price}}</span></div>
				<div class="intro-details">{{$gift->content}}</div>
			</div>
		</section>

		<section class="good-details">
			<div class="good-details-header clearx">
				<div class="good-details-wrapper active">
					<span class="good-pannel-btn">
						图文介绍
					</span>
				</div>

				<div class="good-details-wrapper">
					<span class="good-pannel-btn">
						喜欢（<span>{{$gift->focus_num}}</span>）
					</span>
				</div>
			</div>
		@endif

			<div class="details-pannel intro-details-pannel">
				
				<ul class="good-intro-wrapper">
				@if(isset($gift_photo_intros))
					@foreach($gift_photo_intros as $gift_photo_intro)
					<li>
						<img src="{{$gift_photo_intro->url}}">
					</li>
					@endforeach
				@endif
				</ul>
			</div>
			<div class="details-pannel comment-details-pannel" style="display: none;">
				<div class="good-praise">
				@if(isset($focus_users))
					@foreach($focus_users as $user)
					<span class="avatar">
						<a href="/">
							<img src="{{$user->avatar}}">
						</a>
					</span>
					@endforeach
				@endif 
					

					<span class="add">
					@if(isset($focus_users))	
						<div>
							{{count($focus_users)}}
						</div>
					@endif
					</span>

					<div style="clear: both;"></div>
				</div>
				<div class="good-comment-title">
					猜你喜欢的
				</div>
				<div class="good-recommend clearx">
					@if(isset($gifts_like))
						@if(isset($gifts_like))
							@foreach($gifts_like as $gifts)
					<div class="goods-recommend-item">
						<a href="/">
							<img src="{{$gifts->url}}">
						</a>
					</div>
							@endforeach
						@endif
					@endif
					
					<!-- <div class="recommend-pics-wrapper"></div> -->
				</div>

			</div>
			<div class="good-details-footer">
				<span class="good-btns good-like">
					<a href="javascript:">
						<span class="btns-pattern" style="display: {{{ $type == 0 ? 'block' : 'none' }}}"></span>
						<span class="btns-pattern-like" style="display: {{{ $type == 0 ? 'none' : 'block' }}}"></span>
						我喜欢
					</a>
				</span>
				<span class="good-btns good-buy">
					<a href="{{$gift->taobao_url}}">
						<span class="btns-pattern"></span>
						去购买
					</a>
				</span>
			</div>
		</section>
	</div>
@stop


@section("js")
	@parent
	<script type="text/javascript" src="/dist/js/pages/goodDetails.js"></script>
@stop