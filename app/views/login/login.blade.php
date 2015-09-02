@extends("layouts.master")

@section("title")
登录
@stop

@section("css")
	@parent
	<link rel="stylesheet" type="text/css" href="/dist/css/pages/login.css">
@stop

@section("body")
	@include("components.title-bar", array("title" => "登录", "rightIcon" => ""))
	<div class="page-content">
		<form method="post" action="/user/login" class="login-form">
			<fieldset>
				<div class="login-input-wrapper">
					<div class="login-input-container login-input-name">
						<input class="input" type="text" name="phone" placeholder="账号/手机号"/>
					</div>
				</div>
				<!-- @include("components.input") -->
				<div class="login-input-wrapper">
					<div class="login-input-container login-input-password">
						<input class="input" type="password" name="password" placeholder="密码"/>
					</div>
				</div>

				<button class="login-submit" type="submit">登录</button>

				<div class="login-tips-wrapper">
					<a href="/">
						<span class="login-tips-findpsd">
							忘记密码
						</span>
					</a>
					
					<a href="/">
						<span class="login-tips-reg">
							快速注册
						</span>
					</a>

					<!-- <div style="clear: both;"></div> -->
				</div>

			</fieldset>
		</form>

		<div class="login-title">
			<div class="login-title-line"></div>
			<div class="login-title-text">
				<span class="login-title-t">
					第三方账号直接登录
				</span>
			</div>
			<!-- <div class="login-title-line"></div> -->
			<!-- <div style="clear: both;"></div> -->
		</div>

	</div>
@stop

@section("js")
	@parent
@stop