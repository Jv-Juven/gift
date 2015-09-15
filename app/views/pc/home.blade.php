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
					@if(isset($topics))
						@foreach( $topics as $topic)
					<li class="home-topics-box">
						<a href="/detail/topic?topic_id={{$topic->id}}">
							<img src="{{$topic->topic_url}}">
						</a>
					</li>
						@endforeach
					@endif
				</ul>
			</div>
			<div class="home-wrappers home-recommend-wrapper" style="display: none;">
				<ul class="home-recommend-content clearx">
					@if(isset($gifts))
						@foreach($gifts as $gift)
					<li class="home-recommend-box">
						<a href="{{$gift->taobao_url}}">
							<img src="{{$gift->photo_url}}">
							<span class="box-cover">
								<span class="box-cover-title">
									{{$gift->title}}
								</span>
								<span class="box-cover-price">
									<span>￥{{$gift->price}}</span>
								</span>

								<span class="box-cover-like" href="http://baidu.com">
									<img src="/images/pc/home/like.png">
								</span>
							</span>
						</a>
					</li>
						@endforeach
					@endif
				</ul>
			</div>
			<div class="home-wrappers home-hot-wrapper" style="display: none;">
				<ul class="home-hot-content clearx">
					@if(isset($articles))
						@foreach($articles as $article)
					<li class="home-hot-box">
						<a href="/detail/article?article_id={{$article->id}}">
							<img src="{{$article->url}}">
							<span class="home-hot-cover">
								<img class="bg-img" src="/images/pc/home/cover_gradual.png">
								<span class="home-hot-board">
									<span class="home-hot-title">{{$article->title}}</span>
									<span class="home-hot-info">
										<span class="home-scan">
											<img class="home-hot-scan" src="/images/pc/home/scaned.png">
											<span class="scan-count">{{$article->scan_num}}</span>
										</span>
										<span class="home-scan">
											<img class="home-hot-comments" src="/images/pc/home/comments.png">
											<span class="scan-count">{{$article->join_num}}</span>
										</span>
									</span>
								</span>
							</span>
						</a>
					</li>
						@endforeach
				@endif
				</ul>
			</div>
		</div>
	</div>
@stop

@section("js")
	@parent
	<script type="text/javascript" src="/dist/pc/js/pages/home.js"></script>
@stop
