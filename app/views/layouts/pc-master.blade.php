<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html,charset=UTF-8">
	<title>
		@yield("title", "礼拉")
	</title>
	<meta http-equiv="keywords" content="礼拉">
	<meta http-equiv="description" content="礼拉">
	<meta name="author" content="礼拉">
	@section("css")
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
<script type="text/javascript" src="/dist/lib/js/jQuery-2.1.4.min.js"></script>
<script type="text/javascript" src="/dist/lib/js/lodash.min.js"></script>
@show

</body>
</html>