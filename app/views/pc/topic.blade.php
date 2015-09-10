@extends('layouts.pc-master')

@section('title')
    专题详情
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/pc/css/pages/topic.css">
@stop

@section('body')
<div class="page-content">
    <div class="container clearfix">
        <div class="container-left">
            <div class="topic-wrap">
                <div class="topic">
                    <h2 class="title">处女座女友的生日礼物快到了，送什么好呢？求推荐有创意的小物品</h2>
                    <div class="info">
                        <span class="info-view">
                            <img src="/images/pc/common/icon-view.png" alt="" class="icon">
                            <span class="num" id="count-view">15</span>
                        </span>
                        <span class="info-comment">
                            <img src="/images/pc/common/icon-comment.png" alt="" class="icon">
                            <span class="num" id="count-comment">20</span>
                        </span>
                        <span class="info-like">
                            <img src="/images/pc/common/icon-like.png" alt="" class="icon">
                            <span class="num" id="count-like">35</span>
                        </span>
                        <span class="date">2015-09-05</span>
                    </div>
                    <div class="topic-content">
                        <img src="/images/pc/topic/desc-pic-1.png">
                        <p>不知不觉已经立秋了，虽然夏天的热情还在，不过早晚渐凉的温差提醒着我们是时候
                        稍微调整下服装搭配了。初秋时节应该如何穿衣呢？跟欧美明星学学早秋服装搭配技巧吧！</p>
                        <img src="/images/pc/topic/desc-pic-2.png">
                        <p>穿着针织衫小外套，也可以用披肩或者大方巾一类的披肩，有民族风的，
                        也有可爱型的，稍微造下型很有味道。现在很流行中长或者长款薄外套，里面
                        穿T恤就很潮啊</p>
                        <p>穿着针织衫小外套，也可以用披肩或者大方巾一类的披肩，有民族风的，
                        也有可爱型的，稍微造下型很有味道。现在很流行中长或者长款薄外套，里面
                        穿T恤就很潮啊</p>
                    </div>
                </div>
            </div>
            @include('pc.components.post_info')
            @include('pc.components.comment')
        </div>
        @include('pc.components.ad')
    </div>
</div>

@stop