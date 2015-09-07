<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>
		@yield("title","礼拉")
	</title>
	<meta http-equiv="keywords" content="礼拉">
	<meta http-equiv="description" content="礼拉">
	<meta name="author" content="礼拉">

	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
	<meta name="format-detection" content="telephone=no,email=no">
	<meta name="apple-mobile-web-app-capable" content="yes">

	@section("css")
	<link rel="stylesheet" type="text/css" href="/dist/lib/css/swiper3.1.0.min.css">
	<link rel="stylesheet" type="text/css" href="/dist/css/common.css">
	<link rel="stylesheet" type="text/css" href="/dist/css/components.css">
	@show

</head>
<body>

<article id="main_container">
	
	@section("body")
	<!-- @include("components.menu-bar",array("msg" => "Hello","rightIcon" => "")) -->
	<!-- @include("components.title-bar", array("title" => "登录", "rightIcon" => "")) -->

	@show

</article>



@section("js")
<script type="text/javascript" src="/dist/lib/js/jQuery-2.1.4.min.js"></script>
<script type="text/javascript" src="/dist/lib/js/lodash.min.js"></script>
<script type="text/javascript" src="/dist/lib/js/jQuery.tappable.js"></script>
<script type="text/javascript" src="/dist/lib/js/swiper3.1.0.jquery.min.js"></script>
<script type="text/javascript" src="/dist/js/common.js"></script>
@show
</body>
</html>