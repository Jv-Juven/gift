@extends("layouts.pc-master")

@section("title")
个人中心
@stop


@section("css")
	@parent
	<link rel="stylesheet" type="text/css" href="/dist/pc/css/pages/userCenter.css">
@stop

@section("body")
	<div class="page-content">
		<div class="user-info">
			<img class="user-info-bg" src="/images/pc/userCenter/user_bg.png"></img>
			<div class="user-info-board">
				<img class="avatar" src="{{$user->avatar}}">
				<span class="user-name">{{$user->username}}</span>
				<span class="user-signature">
					{{$user->info}}
				</span>
			</div>
			<a class="set-name chang-data" href="/pc_mine/mine">
				<img src="/images/pc/userCenter/setting.png">
				<span>个人资料</span>
			</a>
		</div>
		<div class="user-collection">
			<div class="user-collection-menu clearx">
				<ul class="user-collection-items">
					<li class="user-collection-li active">
						<a class="item" href="javascript:">我收藏过的商品</a>
						<img class="selected" src="/images/pc/userCenter/selected.png">
					</li>
					<li class="user-collection-li">
						<a class="item" href="javascript:">我参与过的话题</a>
						<img class="selected" src="/images/pc/userCenter/selected.png">
					</li>
				</ul>
			</div>
			<div class="user-wrappers user-recommend-wrapper">
				<ul class="user-recommend-content clearx">
				@if(isset($gifts))
					@foreach($gifts as $gift)	
					<li class="user-recommend-box">
						<a href="{{$gift->taobao_url}}">
							<img src="{{$gift->img}}">
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
				<div class="load-tip">
					<img src="/images/pc/search/loading.gif">
				</div>
			</div>
			<div class="user-wrappers user-hot-wrapper" style="display: none;">
				<ul class="user-hot-content clearx">
					@if(isset($articles))
						@foreach($articles as $article)
					<li class="user-hot-box">
						<a href="/">
							<img src="{{$article->img}}">
							<span class="user-hot-cover">
								<img class="bg-img" src="/images/pc/home/cover_gradual.png">
								<span class="user-hot-board">
									<span class="user-hot-title">{{$article->title}}</span>
									<span class="user-hot-info">
										<span class="user-scan">
											<img class="user-hot-scan" src="/images/pc/home/scaned.png">
											<span class="scan-count">{{$article->scan_num}}</span>
										</span>
										<span class="user-scan">
											<img class="user-hot-comments" src="/images/pc/home/comments.png">
											<span class="scan-count">{{$article->focus_num}}</span>
										</span>
									</span>
								</span>
							</span>
						</a>
					</li>
						@endforeach
					@endif

				</ul>
				<div class="load-tip">
					<img src="/images/pc/search/loading.gif">
				</div>
			</div>
		</div>
	</div>
	@include("pc.components.back_to_top")

	<script type="text/template" id="gifts_tpl">
		<% for(var i = 0; i < array.length; i ++){ 
			var likeUrl = "";
			if (array[i]['taobao_url'] == 0){
				likeUrl = "/images/pc/home/like.png"
			}
			else{
				likeUrl = "/images/pc/home/liked.png"
			}
			%>
			<li class="user-recommend-box" data-id="<%- array[i]['id']%>">
				<a href="<%- array[i]['taobao_url'] %>">
					<img src="<%- array[i]['img'] %>">
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
	<script type="text/template" id="topics_tpl">
	<% for(var i = 0; i < array.length; i ++){ %>
		<li class="user-hot-box" data-id="<%- array[i]['id']%>">
			<a href="/detail/join_detail?join_id=<%- array[i]['id'] %>">
				<img src="<%- array[i]['img']['content']%>">
				<span class="user-hot-cover">
					<img class="bg-img" src="/images/pc/home/cover_gradual.png">
					<span class="user-hot-board">
						<span class="user-hot-title"><%- array[i]["title"] %></span>
						<span class="user-hot-info">
							<span class="user-scan">
								<img class="user-hot-scan" src="/images/pc/home/scaned.png">
								<span class="scan-count"><%- array[i]["scan_num"] %></span>
							</span>
							<span class="user-scan">
								<img class="user-hot-comments" src="/images/pc/home/comments.png">
								<span class="scan-count"><%- array[i]["join_num"] %></span>
							</span>
						</span>
					</span>
				</span>
			</a>
		</li>
		<% } %>
	</script>
@stop


@section("js")
	@parent
	<script type="text/javascript" src="/dist/pc/js/pages/userCenter.js"></script>
@stop

