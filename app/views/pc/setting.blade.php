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
				<img class="avatar" src="{{$user->avatar}}">
				<div class="avatar-upload" id="avatar_upload">
					<input type="file" class="avatar-upload-input" id="avatar_upload_input" title="点击更换头像" />
				</div>
				<div class="avatar-upload avatar-waiting">
					<img src="/images/index/loading.gif">
				</div>
				<div class="user-name">
					<input type="text" value="{{$user->username}}" class="name" title="点击修改用户名" />
				</div>
				<div class="user-signature-container">
					<textarea class="user-signature" title="点击设置个性签名">{{$user->info}}</textarea>					
				</div>
			</div>
			<div class="setting-btn setting-back">
				<a href="/pc_mine">返回个人中心</a>
			</div>
			<div class="setting-btn sign-out">
				<a href="javascript:">退出登录</a>
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
								"value"=>"2",
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
	<script type="text/javascript" src="/lib/js/qiniu/qiniu.min.js"></script>
	<script type="text/javascript" src="/lib/js/plupload/plupload.full.min.js"></script>
	<script type="text/javascript" src="/dist/pc/js/pages/setting.js"></script>
@stop

