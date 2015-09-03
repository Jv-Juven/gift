@extends("layouts.master")

@section("title")
	个人中心
@stop

@section("css")
	@parent
	<link rel="stylesheet" type="text/css" href="/dist/css/pages/userCenter.css">
@stop

@section("body")
	<div class="page-content">
		<section class="center-header">
			<img class="bg-img" src="/images/index/head_bg.png"></img>
			<div class="center-header-content">
				<img class="bg-img" src="{{ $user->avatar }}">
				<!-- <img class="bg-img" src="/images/index/center_avatar.png"> -->
				<span class="center-avatar-name">
					{{ $user->username }}
				</span>
			</div>
		</section>
		<section class="center-body">
			<div class="center-title">
				<img class="center-title-icon" src="/images/index/center_gift.png"></img>
				<span class="center-title-text">我喜欢的礼品</span>
			</div>
			<div class="center-gifts-container clearx">
			<!-- 礼品区 START-->
				@foreach($gifts as $gift)
				<a class="center-gift" href="/home/gift_detail?gift_id={{$gift->id}}">
					<img class="center-gift-img" src="{{ $gift->url['url'] }}">
					<div class="center-gift-title">{{ $gift->title }}</div>
					<div class="center-gift-details">
						<span class="center-gift-price">￥{{ $gift->price }}</span>
						<span class="center-gift-like">
							<img src="/images/index/center_like.png">
							<span>{{ $gift->focus_num }}</span>
						</span>
					</div>
				</a>
				@endforeach
				<!-- <a class="center-gift" href="/">
					<img class="center-gift-img" src="/images/index/gift02.png">
					<div class="center-gift-title">990纯银定制戒指——求爱专用神器</div>
					<div class="center-gift-details">
						<span class="center-gift-price">￥7489.00</span>
						<span class="center-gift-like">
							<img src="/images/index/center_like.png">
							<span>3567</span>
						</span>
					</div>
				</a> -->
				
				<!-- 礼品区 END-->
			</div>
		</section>
	</div>
@stop

@section("js")
	@parent
	<script type="text/javascript" src="/dist/js/pages/userCenter.js"></script>
@stop