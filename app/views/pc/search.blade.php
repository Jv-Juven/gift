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
						<span>个性:</span>
					</div>
					<div class="search-items-value char">
						<ul class="items-wrapper clearx">
							<li class="item active"><a class="" href="javascript:">全部<span class="item-line"></span></a></li>
						@if(isset($_char))
							@foreach($_char as $char)
							<li class="item" data-id="{{ $char->id }}"><a class="" href="javascript:">{{ $char->_class }}<span class="item-line"></a></li>
							@endforeach
						@endif
						</ul>
					</div>
				</div>
				<div class="search-items-tr clearx">
					<div class="search-items-key">
						<img class="key-dot" src="/images/pc/search/dot.png">
						<span>场景:</span>
					</div>
					<div class="search-items-value scene">
						<ul class="items-wrapper clearx">
						<li class="item active"><a class="" href="javascript:">全部<span class="item-line"></a></li>
						@if(isset($scene))
							@foreach($scene as $s)
							<li class="item" data-id="{{ $s->id }}"><a class="" href="javascript:">{{ $s->_class }}<span class="item-line"></a></li>
							@endforeach
						@endif
						</ul>
					</div>
				</div>
				<div class="search-items-tr clearx">
					<div class="search-items-key">
						<img class="key-dot" src="/images/pc/search/dot.png">
						<span>对象:</span>
					</div>
					<div class="search-items-value object">
						<ul class="items-wrapper clearx">
						<li class="item active"><a class="" href="javascript:">全部<span class="item-line"></a></li>
						@if(isset($object))
							@foreach($object as $o)
							<li class="item" data-id="{{ $o->id }}"><a class="" href="javascript:">{{ $o->_class }}<span class="item-line"></a></li>
							@endforeach
						@endif
						</ul>
					</div>
				</div>
				<div class="search-items-tr clearx">
					<div class="search-items-key">
						<img class="key-dot" src="/images/pc/search/dot.png">
						<span>价格:</span>
					</div>
					<div class="search-items-value price">
						<ul class="items-wrapper clearx">
						<li class="item active"><a class="" href="javascript:">全部<span class="item-line"></a></li>
						@if(isset($price))
							@foreach($price as $p)
							<li class="item" data-id="{{ $p->id }}"><a class="" href="javascript:">{{ $p->low_price }}~{{ $p->high_price }}<span class="item-line"></a></li>
							@endforeach
						@endif
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
					<img src="/images/pc/search/loading.gif">
				</div>
			</div>
		</div>
	</div>
	@include("pc.components.back_to_top")

	<script type="text/template" id="search_tpl">
		<% for(var i = 0; i < array.length; i ++){ 
			var like = "",liked = "";
			if (array[i]['type'] == 0){
				like = "block";
				liked = "none";
			}
			else{
				like = "none";
				liked = "block";
			}
			%>
			<li class="search-recommend-box" data-id="<%- array[i]['id'] %>">
				<a href="<%- array[i]['taobao_url'] %>">
					<img src="<%- array[i]['url'] %>">
					<span class="box-cover">
						<span class="box-cover-title">
							<%- array[i]['title'] %>
						</span>
						<span class="box-cover-price">
							<span>￥<%- array[i]['price'] %></span>
						</span>
						<span class="box-cover-like">
							<img style="display: <%- like %>" src="/images/pc/home/like.png" />
							<img style="display: <%- liked %>" src="/images/pc/home/liked.png" />
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