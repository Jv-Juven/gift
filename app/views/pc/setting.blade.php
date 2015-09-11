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
			<img class="user-info-bg" src="/images/pc/userCenter/user_bg.png"></img>
			<div class="user-info-board">
				<img class="avatar" src="/images/pc/userCenter/avatar.png">
				<div class="set-avatar">
					<span>更换图片</span>
				</div>
				<span class="user-name">Lucy</span>
				<div class="set-name">
					<img src="/images/pc/userCenter/change.png">
					<span>修改</span>
				</div>
				<div class="set-name set-signature">
					<img src="/images/pc/userCenter/change.png">
					<span>修改</span>
				</div>
				<span class="user-signature">
					这是我的个性签名，美好的一天天天都从早晨开始。我每天早上都早早起床，骑着自己的自行车奔跑在去上班的路上。
				</span>
			</div>
		</div>
		<div class="user-setting">
			<div class="user-form clearx">
				<div class="user-form-input">
					<span class="input-key">性别</span>
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
					<span class="input-key">生日</span>
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
					<span class="input-key">星座</span>
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
					<span class="input-key">职业</span>
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
					<span class="submit-btn">退出登录</span>
				</div>
			</div>
		</div>
	</div>
@stop


@section("js")
	@parent
@stop

