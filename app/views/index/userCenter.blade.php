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
			<div id="center-gifts-container" class="center-gifts-container clearx">
			<!-- 礼品区 START-->
				<!-- <div class="center-gift" style="display: none;">
					<a class="center-gift-link" href="/home/gift_detail?gift_id=">
						<img class="center-gift-img" src="">
						<div class="center-gift-title"></div>
						<div class="center-gift-details">
							<span class="center-gift-price">￥</span>
							<span class="center-gift-like">
								<img src="/images/index/center_like.png">
								<span></span>
							</span>
						</div>
					</a>
				</div> -->
				
				<!-- <a class="center-gift" href="/">
					<img class="center-gift-img" src="/images/index/gift01.png">
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
		<div class="full-screen">
			<img class="requesting" src="/images/index/loading.gif">
		</div>
		<script type="text/template" id="gift_template">
			<div class="center-gift" data-id="<%- id %>">
				<a class="center-gift-link" href="<%- url %>">
					<img class="center-gift-img" src="<%- img_url %>?imageView2/2/w/200/h">
					<div class="center-gift-title"><%- title %></div>
					<div class="center-gift-details">
						<span class="center-gift-price">￥<%- price %></span>
						<span class="center-gift-like">
							<img src="/images/index/center_like.png">
							<span><%- like %></span>
						</span>
					</div>
				</a>
			</div>
		</script>
	</div>
@stop

@section("js")
	@parent
	<script type="text/javascript" src="/dist/js/pages/userCenter.js"></script>
	
@stop







