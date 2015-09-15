@extends("layouts.pc-master")

@section("title")
个人资料设置
@stop


@section("css")
	@parent
	<link rel="stylesheet" type="text/css" href="/dist/pc/css/pages/userCenter.css">
@stop

@section("body")
	<div class="page-content">
		<div class="user-info">
			<img class="user-info-bg" src="{{$user->avatar}}"></img>
			<div class="user-info-board">
				<img class="avatar" src="/images/pc/userCenter/avatar.png">
				<div class="user-name">
					<input type="text" value="Lucy" class="name" />
				</div>
				<div class="user-signature-container">
					<textarea class="user-signature">{{$user->info}}</textarea>					
				</div>
			</div>
			<div class="setting-btn setting-back">
				<a href="/">返回个人中心</a>
			</div>
			<div class="setting-btn sign-out">
				<a href="/">退出登录</a>
			</div>
		</div>
		<div class="user-setting">
			<div class="user-form clearx">
				<div class="user-form-input">
					<span class="input-key input-gender">性别</span>
					<div class="input-value">
						@include("pc.components.dropdown-menu", array("id"=>"sex", "title" => "男", "items" => array(
							array(
								"value"=>"1",
								"text"=>"男"
							),
							array(
								"value"=>"0",
								"text"=>"女"
							)
						)))
					</div>
				</div>
				<div class="user-form-input">
					<span class="input-key input-birthday">生日</span>
					<div class="input-value">
						@include("pc.components.dropdown-menu", array("id"=>"month", "title" => "1月", "items" => array(
							array(
								"value"=>"01",
								"text"=>"1月"
							),
							array(
								"value"=>"02",
								"text"=>"2月"
							)
						)))
						@include("pc.components.dropdown-menu", array("id"=>"date", "title" => "1日", "items" => array(
							array(
								"value"=>"01",
								"text"=>"1日"
							),
							array(
								"value"=>"02",
								"text"=>"2日"
							),
							array(
								"value"=>"03",
								"text"=>"3日"
							),
							array(
								"value"=>"04",
								"text"=>"4日"
							)
						)))
					</div>
				</div>
				<div class="user-form-input">
					<span class="input-key input-constellation">星座</span>
					<div class="input-value">
						@include("pc.components.dropdown-menu", array("id"=>"constellation", "title" => "白羊座", "items" => array(
							array(
								"value"=>"1",
								"text"=>"双鱼座"
							),
							array(
								"value"=>"2",
								"text"=>"处女座"
							)
						)))
					</div>
				</div>
				<div class="user-form-input">
					<span class="input-key input-position">职业</span>
					<div class="input-value">
						@include("pc.components.dropdown-menu", array("id"=>"profession", "title" => "女大学生", "items" => array(
							array(
								"value"=>"1",
								"text"=>"男大学生"
							),
							array(
								"value"=>"2",
								"text"=>"职业装逼"
							)
						)))
					</div>
				</div>

				<div class="user-form-input user-form-submit">
					<span class="submit-btn">提交修改</span>
				</div>
			</div>
		</div>
	</div>
@stop


@section("js")
	@parent
	<script type="text/javascript" src="/dist/pc/js/pages/setting.js"></script>
@stop

