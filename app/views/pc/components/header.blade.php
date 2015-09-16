<div class="header">
	<div class="header-wrapper">
		<a href="/pc_home/">
			<img class="header-logo" src="/images/pc/login/logo.png">
		</a>
		<div class="header-menubar">
			<a href="/pc_election/label/">
				<img src="/images/pc/components/heng-bar.png">
			</a>
		</div>
		<ul class="header-menu">
			@if(!Sentry::check())
			<li id="header_login" class="header-login">
				<a href="/pc/login/">登录</a>
				<a href="/pc/login/">注册</a>
			</li>
			@endif
			<li id="header_home" class="header-login" style="display: none;">
				<a href="/pc_home/">返回首页</a>
			</li>
			@if(Sentry::check())
			<li id="header_user" class="header-avatar">
				<a class="a-block" href="/">
					<span class="avatar-img">
						<img src="{{Sentry::getUser()->avatar}}">
					</span>
					<span class="avatar-name">{{Sentry::getUser()->username}}</span>
				</a>
			</li>
			@endif
			<li class="header-li-download">
				<a class="a-block" href="javascript:">
					<img class="header-li-icon" src="/images/pc/login/header_phone.png">
					<span class="header-li-text">下载礼拉客户端</span>
				</a>
			</li>
		</ul>
	</div>
	
</div>