<div class="header">
	<div class="header-wrapper">
		<img class="header-logo" src="/images/pc/login/logo.png">
		<div class="header-menubar">
			<a href="/">
				<img src="/images/pc/components/heng-bar.png">
			</a>
		</div>
		<ul class="header-menu">
			@if(!Sentry::check())
			<li id="header_login" class="header-login">
				<a href="/">登录</a>
				<a href="/">注册</a>
			</li>
			@endif
			<li id="header_home" class="header-login" style="display: none;">
				<a href="/">返回首页</a>
			</li>
			@if(Sentry::check())
			<li id="header_user" class="header-avatar">
				<a class="a-block" href="/">
					<span class="avatar-img">
						<img src="{{Sentry::getUser()->avatar}}">
					</span>
<<<<<<< HEAD
					<span class="avatar-name">{{Sentry::getUser()->username}}</span>
=======
					<span class="avatar-name">{{ Sentry::getUser()->username }}</span>
>>>>>>> 951d66642520201ecc82ad9e0489e723b3a90283
				</a>
			</li>
			@endif
			<li class="header-li-download">
				<a class="a-block" href="/">
					<img class="header-li-icon" src="/images/pc/login/header_phone.png">
					<span class="header-li-text">下载礼拉客户端</span>
				</a>
			</li>
		</ul>
	</div>
	
</div>