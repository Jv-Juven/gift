<header class="header">

	<div class="left-icon">
		<img src="">
	</div>
	{{ $msg }}

	@if(defined($rightIcon))
		<div class="right-icon">
			{{ $rightIcon }}
		</div>
	@endif
</header>

<aside class="aside-container">
	<div class="aside-menu-wrapper">
		<ul class="aside-menu">
			<li class="aside-menu-header">
				<a href="#">
					<span class="avatar"></span>
					<span class="avatar-name">登录</span>
				</a>
				
			</li>
			<li class="aside-menu-items">
				<a href="/">
					<i class="aside-icon"></i>
					登录
				</a>
			</li>
			<li class="aside-menu-items">
				<a href="/">
					<i class="aside-icon"></i>
					选礼
				</a>
			</li>
			<li class="aside-menu-items">
				<a href="/">
					<i class="aside-icon"></i>
					圈子
				</a>
			</li>
			<li class="aside-menu-items">
				<a href="/">
					<i class="aside-icon"></i>
					收纳盒
				</a>
			</li>
			<li class="aside-menu-items">
				<a href="/">
					<i class="aside-icon"></i>
					通知
				</a>
			</li>
			<li class="aside-menu-items">
				<a href="/">
					<i class="aside-icon"></i>
					设置
				</a>
			</li>
		</ul>
	</div>
	
</aside>