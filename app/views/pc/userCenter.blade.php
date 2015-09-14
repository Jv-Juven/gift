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
				<img class="avatar" src="/images/pc/userCenter/avatar.png">
				<span class="user-name">Lucy</span>
				<span class="user-signature">
					这是我的个性签名，美好的一天天天都从早晨开始。我每天早上都早早起床，骑着自己的自行车奔跑在去上班的路上。
				</span>
			</div>
			<a class="set-name chang-data" href="/">
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
					<li class="user-recommend-box">
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
					<li class="user-recommend-box">
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
					<li class="user-recommend-box">
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
					<li class="user-recommend-box">
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
					<li class="user-recommend-box">
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
					<li class="user-recommend-box">
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
				</ul>
			</div>
			<div class="user-wrappers user-hot-wrapper" style="display: none;">
				<ul class="user-hot-content clearx">
					<li class="user-hot-box">
						<a href="/">
							<img src="/images/pc/home/pic01.png">
							<span class="user-hot-cover">
								<img class="bg-img" src="/images/pc/home/cover_gradual.png">
								<span class="user-hot-board">
									<span class="user-hot-title">处女座女生的生日快到了，送什么好呢？求推荐有创意的小物品</span>
									<span class="user-hot-info">
										<span class="user-scan">
											<img class="user-hot-scan" src="/images/pc/home/scaned.png">
											<span class="scan-count">119</span>
										</span>
										<span class="user-scan">
											<img class="user-hot-comments" src="/images/pc/home/comments.png">
											<span class="scan-count">119</span>
										</span>
									</span>
								</span>
							</span>
						</a>
					</li>
					<li class="user-hot-box">
						<a href="/">
							<img src="/images/pc/home/pic01.png">
							<span class="user-hot-cover">
								<img class="bg-img" src="/images/pc/home/cover_gradual.png">
								<span class="user-hot-board">
									<span class="user-hot-title">处女座女生的生日快到了，送什么好呢？求推荐有创意的小物品</span>
									<span class="user-hot-info">
										<span class="user-scan">
											<img class="user-hot-scan" src="/images/pc/home/scaned.png">
											<span class="scan-count">119</span>
										</span>
										<span class="user-scan">
											<img class="user-hot-comments" src="/images/pc/home/comments.png">
											<span class="scan-count">119</span>
										</span>
									</span>
								</span>
							</span>
						</a>
					</li>
					<li class="user-hot-box">
						<a href="/">
							<img src="/images/pc/home/pic01.png">
							<span class="user-hot-cover">
								<img class="bg-img" src="/images/pc/home/cover_gradual.png">
								<span class="user-hot-board">
									<span class="user-hot-title">处女座女生的生日快到了，送什么好呢？求推荐有创意的小物品</span>
									<span class="user-hot-info">
										<span class="user-scan">
											<img class="user-hot-scan" src="/images/pc/home/scaned.png">
											<span class="scan-count">119</span>
										</span>
										<span class="user-scan">
											<img class="user-hot-comments" src="/images/pc/home/comments.png">
											<span class="scan-count">119</span>
										</span>
									</span>
								</span>
							</span>
						</a>
					</li>
					<li class="user-hot-box">
						<a href="/">
							<img src="/images/pc/home/pic01.png">
							<span class="user-hot-cover">
								<img class="bg-img" src="/images/pc/home/cover_gradual.png">
								<span class="user-hot-board">
									<span class="user-hot-title">处女座女生的生日快到了，送什么好呢？求推荐有创意的小物品</span>
									<span class="user-hot-info">
										<span class="user-scan">
											<img class="user-hot-scan" src="/images/pc/home/scaned.png">
											<span class="scan-count">119</span>
										</span>
										<span class="user-scan">
											<img class="user-hot-comments" src="/images/pc/home/comments.png">
											<span class="scan-count">119</span>
										</span>
									</span>
								</span>
							</span>
						</a>
					</li>
					<li class="user-hot-box">
						<a href="/">
							<img src="/images/pc/home/pic01.png">
							<span class="user-hot-cover">
								<img class="bg-img" src="/images/pc/home/cover_gradual.png">
								<span class="user-hot-board">
									<span class="user-hot-title">处女座女生的生日快到了，送什么好呢？求推荐有创意的小物品</span>
									<span class="user-hot-info">
										<span class="user-scan">
											<img class="user-hot-scan" src="/images/pc/home/scaned.png">
											<span class="scan-count">119</span>
										</span>
										<span class="user-scan">
											<img class="user-hot-comments" src="/images/pc/home/comments.png">
											<span class="scan-count">119</span>
										</span>
									</span>
								</span>
							</span>
						</a>
					</li>
					<li class="user-hot-box">
						<a href="/">
							<img src="/images/pc/home/pic01.png">
							<span class="user-hot-cover">
								<img class="bg-img" src="/images/pc/home/cover_gradual.png">
								<span class="user-hot-board">
									<span class="user-hot-title">处女座女生的生日快到了，送什么好呢？求推荐有创意的小物品</span>
									<span class="user-hot-info">
										<span class="user-scan">
											<img class="user-hot-scan" src="/images/pc/home/scaned.png">
											<span class="scan-count">119</span>
										</span>
										<span class="user-scan">
											<img class="user-hot-comments" src="/images/pc/home/comments.png">
											<span class="scan-count">119</span>
										</span>
									</span>
								</span>
							</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
@stop


@section("js")
	@parent
	<script type="text/javascript" src="/dist/pc/js/pages/userCenter.js"></script>
@stop

