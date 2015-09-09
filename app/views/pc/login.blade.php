@extends("layouts.pc-master")

@section("title")
	登陆
@stop

@section("css")
@parent
<link rel="stylesheet" type="text/css" href="/dist/pc/css/pages/login.css">
@stop

@section("body")
	<div class="page-content">
		<img class="bg-img" src="/images/pc/login/login_bg.png">
		<div class="login-components-wrapper login-components-bg"></div>
		<div class="login-components-wrapper login-components-board">
			<ul class="login-board-menu">
				<li class="active"><a href="javascript:">注册</a></li>
				<li><a href="javascript:">登录</a></li>
				<li><a href="javascript:">下载APP</a></li>
			</ul>
			<div class="login-board"></div>
		</div>
	</div>
@stop