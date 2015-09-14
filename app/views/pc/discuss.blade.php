@extends('layouts.pc-master')

@section('title')
    专题详情
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/pc/css/pages/discuss.css">
@stop

@section('js')
    @parent
    <script src="/dist/pc/js/pages/discuss.js"></script>
@stop

@section('body')
<div class="page-content">
    <div class="container clearfix">
        <div class="container-left">
            <div class="discuss-wrap">
                <div class="discuss">
                    <h2 class="topic-title">处女座女友的生日礼物快到了，送什么好呢？求推荐有创意的小物品</h2>
                    <div class="user-info clearfix">
                        <img src="/images/pc/common/avatar.png" class="avatar">
                        <span class="user-name">Lucy</span>
                        <span class="discuss-time">2015-09-10 10:20</span>
                    </div>
                    <div class="discuss-content">
                        <p>不知不觉已经立秋了，虽然夏天的热情还在，不过早晚渐凉的温差提醒着我们是时候
                        稍微调整下服装搭配了。初秋时节应该如何穿衣呢？跟欧美明星学学早秋服装搭配技巧吧！
                        不知不觉已经立秋了，虽然夏天的热情还在，不过早晚渐凉的温差提醒着我们是时候
                        稍微调整下服装搭配了。初秋时节应该如何穿衣呢？跟欧美明星学学早秋服装搭配技巧吧！</p>
                        <img src="/images/pc/topic/desc-pic-1.png">
                        <p>不知不觉已经立秋了，虽然夏天的热情还在，不过早晚渐凉的温差提醒着我们是时候
                        稍微调整下服装搭配了。初秋时节应该如何穿衣呢？跟欧美明星学学早秋服装搭配技巧吧！
                        不知不觉已经立秋了，虽然夏天的热情还在，不过早晚渐凉的温差提醒着我们是时候
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
            <div class="post-wrap">
                <ul class="info clearfix">
                    <li class="info-views info-item">
                        <img src="/images/pc/common/icon-view.png" class="icon">
                        <span class="num">1213</span>
                    </li>
                    <li class="info-comments info-item">
                        <img src="/images/pc/common/icon-comment.png" class="icon">
                        <span class="num">5151</span>
                    </li>
                    <li class="info-likes info-item">
                        <img src="/images/pc/common/icon-like-red.png" class="icon">
                        <span class="num">2222</span>
                    </li>
                </ul>
            </div>
            <ul class="comment-list">
                <div class="comment-count">评论( 15 )</div>
                <li class="comment-item clearfix">
                    <div class="comment-user-info">
                        <img src="/images/pc/common/avatar.png" class="avatar">
                        <h4 class="user-name">lucy</h4>
                    </div>
                    <div class="comment-container">
                        <div class="comment-content">
                            穿着针织衫小外套，也可以用披肩或者大方巾一类的披肩，有民族风的，
                            也有可爱型的，稍微造下型很有味道。现在很流行中长或者长款薄外套，里面
                            穿T恤就很潮啊
                        </div>
                        <div class="comment-info clearfix">
                            <span class="comment-time">2015-09-10</span>
                            <a class="reply-btn">回复</a>
                        </div>
                        <div class="reply-wrap">
                            <textarea class="reply-input" placeholder="回复内容" value=""></textarea>
                            <div class="reply-btm clearfix">
                                <a class="confirm">确定</a>
                                <a class="cancel">取消</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="comment-item clearfix">
                    <div class="comment-user-info">
                        <img src="/images/pc/common/avatar.png" class="avatar">
                        <h4 class="user-name">lucy</h4>
                    </div>
                    <div class="comment-container">
                        <div class="comment-content">
                            穿着针织衫小外套，也可以用披肩或者大方巾一类的披肩，有民族风的，
                            也有可爱型的，稍微造下型很有味道。现在很流行中长或者长款薄外套，里面
                            穿T恤就很潮啊
                        </div>
                        <div class="comment-info clearfix">
                            <span class="comment-time">2015-09-10</span>
                            <a class="reply-btn">回复</a>
                        </div>
                        <div class="reply-wrap">
                            <textarea class="reply-input" placeholder="回复内容" value=""></textarea>
                            <div class="reply-btm clearfix">
                                <a class="confirm">确定</a>
                                <a class="cancel">取消</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="comment-item clearfix">
                    <div class="comment-user-info">
                        <img src="/images/pc/common/avatar.png" class="avatar">
                        <h4 class="user-name">lucy</h4>
                    </div>
                    <div class="comment-container">
                        <div class="comment-content">
                            穿着针织衫小外套，也可以用披肩或者大方巾一类的披肩，有民族风的，
                            也有可爱型的，稍微造下型很有味道。现在很流行中长或者长款薄外套，里面
                            穿T恤就很潮啊
                        </div>
                        <div class="comment-info clearfix">
                            <span class="comment-time">2015-09-10</span>
                            <a class="reply-btn">回复</a>
                        </div>
                        <div class="reply-wrap">
                            <textarea class="reply-input" placeholder="回复内容" value=""></textarea>
                            <div class="reply-btm clearfix">
                                <a class="confirm">确定</a>
                                <a class="cancel">取消</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <button class="load-btn">加载更多</button>
        </div>
        @include('pc.components.ad')
    </div>
    @include('pc.components.back_to_top')
</div>

@stop