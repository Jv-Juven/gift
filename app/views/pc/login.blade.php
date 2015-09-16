@extends("layouts.pc-master")

@section("title")
	登陆
@stop

@section("css")
@parent
<link rel="stylesheet" type="text/css" href="/dist/pc/css/pages/login.css">
@stop

@section("body")
	<script type="text/javascript">
		var login = document.getElementById('header_login'),
			// user = document.getElementById('header_user'),
			home = document.getElementById('header_home');
		login.style.display = "none";
		home.style.display = "block";
	</script>
	<div class="page-content">
		<img class="bg-img" src="/images/pc/login/login_bg.png">
		<!-- <div class="login-components-wrapper login-components-bg"></div> -->
		<div class="login-components-wrapper login-components-board">
			<ul class="login-board-menu">
				<li class="active"><a href="javascript:">注册</a></li>
				<li><a href="javascript:">登录</a></li>
				<li class="menu-item-last"><a href="javascript:">下载APP</a></li>
			</ul>
			<div id="register" class="login-board">
				<div class="login-btn QQ">
					<a class="a-block" href="/qq/web_code">
						<span class="login-btn-icon">
							<img src="/images/pc/login/QQ.png">
						</span>
						<span class="login-btn-text">
							<span>
								使用腾讯QQ注册
							</span>
						</span>
					</a>
				</div>
				<div class="login-btn WeChat">
					<a class="a-block" href="/weixin/web_code">
						<span class="login-btn-icon">
							<img src="/images/pc/login/wechat.png">
						</span>
						<span class="login-btn-text">
							<span>
								使用微信注册
							</span>
						</span>
					</a>
				</div>
			</div>
			<div id="login" class="login-board" style="display: none;">
				<div class="login-btn QQ">
					<a class="a-block" href="/qq/web_code">
						<span class="login-btn-icon">
							<img src="/images/pc/login/QQ.png">
						</span>
						<span class="login-btn-text">
							<span>
								使用腾讯QQ登录
							</span>
						</span>
					</a>
				</div>
				<div class="login-btn WeChat">
					<a class="a-block" href="/weixin/web_code">
						<span class="login-btn-icon">
							<img src="/images/pc/login/wechat.png">
						</span>
						<span class="login-btn-text">
							<span>
								使用微信登录
							</span>
						</span>
					</a>
				</div>
			</div>
			<div id="download" class="login-board" style="display: none;">
				<ul class="download-list clearx">
					<li>
						<span class="download-list-text">
							iPhone版
						</span>
						<a href="/">
							<img src="/images/pc/login/iphone_btn.png">
						</a>
					</li>
					<li>
						<span class="download-list-text">
							Android版
						</span>
						<a href="/">
							<img src="/images/pc/login/android_btn.png">
						</a>
					</li>
				</ul>
				<img class="code-img" src="/images/pc/login/code.png">
			</div>
		</div>
	</div>
@stop



@section("js")
	@parent
	<script type="text/javascript" src="/dist/pc/js/pages/login.js"></script>
@stop



