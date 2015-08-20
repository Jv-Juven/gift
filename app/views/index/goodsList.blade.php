@extends("layouts.master")


@section("title")

@stop

@section("css")
	@parent
	<link rel="stylesheet" type="text/css" href="/dist/css/pages/goodsList.css">
@stop


@section("body")
	<div class="page-content">
		<img class="topic-img" src="{{$topic->topic_url}}">
		@if(isset($topic))
		<h1 class="topic-title">{{$topic->title}}</h1>
		<p class="topic-content">{{$topic->content}}</p>
		@endif
	
	@if(isset($gifts))	
		@foreach($gifts as $gift)
		<div class="gift">
			<div class="gift-title">
				<span class="ititle-serial">{{$gift->number}}</span>
				<span class="ititle-title">{{$gift->title}}</span>
			</div>
			<p class="gift-content">{{$gift->content}}</p>
			<div ><img class="gift-img" src="{{$gift->img}}"></div>
			<div class="gift-info clearx">
					<span class="gift-price" style="font-family: arial;">￥{{$gift->price}}</span> 
				<a class="gift-info-link" href="{{$gift->taobao_url}}">
					<span class="span" >查看详情</span>
				</a>
			</div>
		</div>
		@endforeach
	@endif
		<div class="blank"></div>
	</div>
@stop


@section("js")
	@parent
@stop