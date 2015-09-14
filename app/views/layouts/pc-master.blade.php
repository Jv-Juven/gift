<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html,charset=UTF-8">
	<meta property="qc:admins" content="062327370646252171637570755" />
	<title>
		@yield("title", "礼拉")
	</title>
	<meta http-equiv="keywords" content="礼拉">
	<meta http-equiv="description" content="礼拉">
	<meta name="author" content="礼拉">
	@section("css")
	<link rel="stylesheet" type="text/css" href="/dist/lib/css/idangerous.swiper.css">
	<link rel="stylesheet" type="text/css" href="/dist/pc/css/common.css">
	<link rel="stylesheet" type="text/css" href="/dist/pc/css/components.css">
	@show
</head>
<body>
<div id="body_wrapper">
	@include("pc.components.header")
	@section("body")
	@show
	@include("pc.components.footer")
</div>

@section("js")
<script type="text/javascript" src="/dist/lib/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="/dist/lib/js/idangerous.swiper.min.js"></script>
<script type="text/javascript" src="/dist/lib/js/lodash.min.js"></script>
<script type="text/javascript" src="/dist/pc/js/common.js"></script>
<script type="text/javascript" src="/dist/pc/js/components.js"></script>
@show

</body>
</html>