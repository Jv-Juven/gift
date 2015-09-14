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
			<!-- <div class="search-wrapper">
				<div class="search-box">
					<input type="text" class="search-input" placeholder="想找什么礼物">
					<div class="search-input-icon">
						<img src="/images/pc/search/search_icon.png">
					</div>
				</div>
			</div> -->

			<div class="search-items-container">
				<div class="search-items-tr clearx first">
					<div class="search-items-key">
						<img class="key-dot" src="/images/pc/search/dot.png">
						<span>赠送对象:</span>
					</div>
					<div class="search-items-value char">
						<ul class="items-wrapper clearx">
							@foreach($_char as $char)
							<li class="item" data-id="{{ $char->id }}"><a class="" href="javascript:">{{ $char->_class }}</a></li>
							@endforeach
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
							@foreach($scene as $s)
							<li class="item" data-id="{{ $s->id }}"><a class="" href="javascript:">{{ $s->_class }}</a></li>
							@endforeach
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
							@foreach($object as $o)
							<li class="item" data-id="{{ $o->id }}"><a class="" href="javascript:">{{ $o->_class }}</a></li>
							@endforeach
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
							@foreach($price as $p)
							<li class="item" data-id="{{ $p->id }}"><a class="" href="javascript:">{{ $p->_class }}</a></li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="search-topics-container">
			<div class="search-wrappers search-recommend-wrapper">
				<ul class="search-recommend-content clearx">

					<!-- <li class="search-recommend-box">
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
					</li> -->

				</ul>
				<div class="search-more">
					加载更多
				</div>
			</div>
		</div>
	</div>
	@include("pc.components.back_to_top")

	<script type="text/template" id="search_tpl">
		<% for(var i = 0; i < array.length; i ++){ 
			var likeUrl = "";
			if (array[i]['taobao_url'] == 0){
				likeUrl = "/images/pc/home/like.png"
			}
			else{
				likeUrl = "/images/pc/home/liked.png"
			}
			%>
			<li class="search-recommend-box">
				<a href="<%- array[i]['taobao_url'] %>">
					<img src="<%- array[i]['url'] %>">
					<span class="box-cover">
						<span class="box-cover-title">
							<%- array[i]['title'] %>
						</span>
						<span class="box-cover-price">
							<span>￥<%- array[i]['price'] %></span>
						</span>
						<span class="box-cover-like" href="http://baidu.com">
							<img src="<%- likeUrl %>">
						</span>
					</span>
				</a>
			</li>
		<% } %>
	</script>

@stop


@section("js")
	@parent
	<script type="text/javascript" src="/dist/pc/js/pages/search.js"></script>
@stop