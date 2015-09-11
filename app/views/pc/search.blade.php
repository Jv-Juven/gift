@extends("layouts.pc-master")

@section("title")
	礼品搜索
@stop

@section("css")
	@parent
	<link rel="stylesheet" type="text/css" href="/dist/pc/css/pages/search.css">
@stop

@section("body")
	<div class="page-content">
		<div class="search-container">
			<div class="search-wrapper">
				<div class="search-box">
					<input type="text" class="search-input" placeholder="想找什么礼物">
					<div class="search-input-icon">
						<img src="/images/pc/search/search_icon.png">
					</div>
				</div>
			</div>

			<div class="search-items-container">
				<div class="search-items-tr clearx">
					<div class="search-items-key">
						<img class="key-dot" src="/images/pc/search/dot.png">
						<span>赠送对象:</span>
					</div>
					<div class="search-items-value">
						<ul class="items-wrapper clearx">
							<li class="item"><a class="" href="/">全部</a></li>
							<li class="item active"><a class="" href="/">爸爸</a></li>
							<li class="item"><a class="" href="/">妈妈</a></li>
							<li class="item"><a class="" href="/">哥哥</a></li>
							<li class="item"><a class="" href="/">姐姐</a></li>
							<li class="item"><a class="" href="/">男票</a></li>
							<li class="item"><a class="" href="/">女票</a></li>
							<li class="item"><a class="" href="/">情敌</a></li>
							<li class="item"><a class="" href="/">男基</a></li>
							<li class="item"><a class="" href="/">女啦</a></li>
						</ul>
					</div>
				</div>
				<div class="search-items-tr clearx">
					<div class="search-items-key">
						<img class="key-dot" src="/images/pc/search/dot.png">
						<span>赠送对象:</span>
					</div>
					<div class="search-items-value">
						<ul class="items-wrapper clearx">
							<li class="item active"><a class="" href="/">全部</a></li>
							<li class="item"><a class="" href="/">爸爸</a></li>
							<li class="item"><a class="" href="/">妈妈</a></li>
							<li class="item"><a class="" href="/">哥哥</a></li>
							<li class="item"><a class="" href="/">姐姐</a></li>
							<li class="item"><a class="" href="/">男票</a></li>
							<li class="item"><a class="" href="/">女票</a></li>
							<li class="item"><a class="" href="/">情敌</a></li>
							<li class="item"><a class="" href="/">男基</a></li>
							<li class="item"><a class="" href="/">女啦</a></li>
						</ul>
					</div>
				</div>
				<div class="search-items-tr clearx">
					<div class="search-items-key">
						<img class="key-dot" src="/images/pc/search/dot.png">
						<span>赠送对象:</span>
					</div>
					<div class="search-items-value">
						<ul class="items-wrapper clearx">
							<li class="item"><a class="" href="/">全部</a></li>
							<li class="item"><a class="" href="/">爸爸</a></li>
							<li class="item active"><a class="" href="/">妈妈</a></li>
							<li class="item"><a class="" href="/">哥哥</a></li>
							<li class="item"><a class="" href="/">姐姐</a></li>
							<li class="item"><a class="" href="/">男票</a></li>
							<li class="item"><a class="" href="/">女票</a></li>
							<li class="item"><a class="" href="/">情敌</a></li>
							<li class="item"><a class="" href="/">男基</a></li>
							<li class="item"><a class="" href="/">女啦</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="search-topics-container">
			<div class="search-wrappers search-recommend-wrapper">
				<ul class="search-recommend-content clearx">
					<li class="search-recommend-box">
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
					<li class="search-recommend-box">
						<a href="/">
							<img src="/images/pc/home/pic02.png">
						</a>
					</li>
					<li class="search-recommend-box">
						<a href="/">
							<img src="/images/pc/home/pic02.png">
						</a>
					</li>
					<li class="search-recommend-box">
						<a href="/">
							<img src="/images/pc/home/pic02.png">
						</a>
					</li>
					<li class="search-recommend-box">
						<a href="/">
							<img src="/images/pc/home/pic02.png">
						</a>
					</li>
					<li class="search-recommend-box">
						<a href="/">
							<img src="/images/pc/home/pic02.png">
						</a>
					</li>
					<li class="search-recommend-box">
						<a href="/">
							<img src="/images/pc/home/pic02.png">
						</a>
					</li>
					<li class="search-recommend-box">
						<a href="/">
							<img src="/images/pc/home/pic02.png">
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