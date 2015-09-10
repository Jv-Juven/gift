@extends('layouts.pc-master')

@section('title')
    专题详情
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/pc/css/pages/subject.css">
@stop

@section('body')
<div class="page-content">
    <div class="container clearfix">
        <div class="subject-wrap">
            <div class="subject">
                <img src="/images/pc/topic/topic-pic.png" alt="专题" class="pic">
                <h2 class="title">拿什么添置你的衣橱</h2>
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
                </div>
                <p class="desc">
                    不知不觉已经立秋了，虽然夏天的热情还在，不过早晚渐凉的温差提醒着我们是时候
                    稍微调整下服装搭配了。初秋时节应该如何穿衣呢？跟欧美明星学学早秋服装搭配技巧吧！
                </p>
            </div>
            <ul class="product-list">
                <li class="product">
                    <h3 class="title">
                        <span class="index">1.</span>
                        清透防晒碎花裙
                    </h3>
                    <p class="desc">
                        穿着针织衫小外套，也可以用披肩或者大方巾一类的披肩，有民族风的，
                        也有可爱型的，稍微造下型很有味道。现在很流行中长或者长款薄外套，里面
                        穿T恤就很潮啊
                    </p>
                    <img src="/images/pc/topic/zhuantixianqing.png" class="pic">
                    <div class="pro-btm clearfix">
                        <div class="info">
                            <span class="price">89.00</span>
                            <span class="like">
                                <img src="/images/pc/common/icon-like.png" class="icon">
                                <span class="num">2222</span>
                            </span>
                            <img src="/images/pc/common/222.png" class="line">
                        </div>
                        <a href="" class="detail-link">查看详情</a>
                    </div>
                </li>
            </ul>
            @include('pc.components.post_info')
            @include('pc.components.comment')
        </div>
        @include('pc.components.ad')
    </div>
</div>
    
@stop