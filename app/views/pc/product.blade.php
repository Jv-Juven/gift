@extends('layouts.pc-master')

@section('title')
    专题详情
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/pc/css/pages/product.css">
@stop

@section('body')
<div class="page-content">
    <div class="container clearfix">
        <div class="container-left">
            <div class="product-wrap">
                <div class="product">
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
                                <img src="/images/pc/topic/icon-like.png" class="icon">
                                <span class="num">2222</span>
                            </span>
                            <img src="/images/pc/topic/222.png" class="line">
                        </div>
                        <a href="" class="detail-link">查看详情</a>
                    </div>
                </div>
            </div>
            <div class="post-wrap clearfix">
                <div class="info">
                    <span class="info-like info-item">
                        <img src="/images/pc/topic/icon-like-red.png" class="icon">
                        <span class="num">2222</span>
                    </span>
                    <span class="info-comment info-item">
                        <img src="/images/pc/topic/icon-comment-red.png" class="icon">
                        <span class="num">1213</span>
                    </span>
                    <span class="info-share info-item">
                        <img src="/images/pc/topic/icon-share-red.png" class="icon">
                        <span class="num">5151</span>
                    </span>
                </div>
                <div class="share">
                    <span>分享到:</span>
                    <span class="share-item">
                        <img src="/images/pc/topic/share-wechat.png" alt="分享给微信朋友" class="share-wechat icon">
                    </span>
                    <span class="share-item">
                        <img src="/images/pc/topic/share-wechat-friend.png" alt="分享到微信朋友圈" class="share-wechat-friend icon">
                    </span>
                    <span class="share-item">
                        <img src="/images/pc/topic/share-qq.png" alt="分享给QQ朋友" class="share-qq icon">
                    </span>
                    <span class="share-item">
                        <img src="/images/pc/topic/share-weibo.png" alt="分享到微博" class="share-weibo icon">
                    </span>
                </div>
            </div>
            <ul class="comment-list">
                <li class="comment-count">评论(15)</li>
                <li class="comment-item clearfix">
                    <img src="/images/pc/topic/avatar.png" class="avatar">
                    <div class="comment-container">
                        <div class="comment-top clearfix">
                            <span class="user-name">Lucy</span>
                            <span class="reply-btn">回复</span>
                            <span class="comment-time">2015-09-10</span>
                        </div>
                        <div class="comment-content">
                            穿着针织衫小外套，也可以用披肩或者大方巾一类的披肩，有民族风的，
                            也有可爱型的，稍微造下型很有味道。现在很流行中长或者长款薄外套，里面
                            穿T恤就很潮啊
                        </div>
                        <div class="reply-wrap">
                            <textarea class="reply-input" placeholder="回复内容" value=""></textarea>
                            <button class="commit-red-btn commit-reply">提交回复</button>
                        </div>
                    </div>
                </li>
                <li class="comment-item clearfix">
                    <img src="/images/pc/topic/avatar.png" class="avatar">
                    <div class="comment-container">
                        <div class="comment-top clearfix">
                            <span class="user-name">Lucy</span>
                            <span class="reply-btn">回复</span>
                            <span class="comment-time">2015-09-10</span>
                        </div>
                        <div class="comment-content">
                            穿着针织衫小外套，也可以用披肩或者大方巾一类的披肩，有民族风的，
                            也有可爱型的，稍微造下型很有味道。现在很流行中长或者长款薄外套，里面
                            穿T恤就很潮啊
                        </div>
                        <div class="reply-wrap">
                            <textarea class="reply-input" placeholder="回复内容" value=""></textarea>
                            <button class="commit-red-btn commit-reply">提交回复</button>
                        </div>
                    </div>
                </li>
                <li class="comment-item clearfix">
                    <img src="/images/pc/topic/avatar.png" class="avatar">
                    <div class="comment-container">
                        <div class="comment-top clearfix">
                            <span class="user-name">Lucy</span>
                            <span class="reply-btn">回复</span>
                            <span class="comment-time">2015-09-10</span>
                        </div>
                        <div class="comment-content">
                            穿着针织衫小外套，也可以用披肩或者大方巾一类的披肩，有民族风的，
                            也有可爱型的，稍微造下型很有味道。现在很流行中长或者长款薄外套，里面
                            穿T恤就很潮啊
                        </div>
                        <div class="reply-wrap">
                            <textarea class="reply-input" placeholder="回复内容" value=""></textarea>
                            <button class="commit-red-btn commit-reply">提交回复</button>
                        </div>
                    </div>
                </li>
                <li class="comment-item clearfix">
                    <img src="/images/pc/topic/avatar.png" class="avatar">
                    <div class="comment-container">
                        <div class="comment-top clearfix">
                            <span class="user-name">Lucy</span>
                            <span class="reply-btn">回复</span>
                            <span class="comment-time">2015-09-10</span>
                        </div>
                        <div class="comment-content">
                            穿着针织衫小外套，也可以用披肩或者大方巾一类的披肩，有民族风的，
                            也有可爱型的，稍微造下型很有味道。现在很流行中长或者长款薄外套，里面
                            穿T恤就很潮啊
                        </div>
                        <div class="comment-pic-wrap">
                            <div class="pic-list clearfix">
                                <img src="/images/pc/topic/comment-pic.png" class="comment-pic">
                                <img src="/images/pc/topic/comment-pic.png" class="comment-pic">
                                <img src="/images/pc/topic/2223-2.png" class="comment-pic">
                                <img src="/images/pc/topic/2223-2.png" class="comment-pic">
                            </div>
                            <img src="/images/pc/topic/6547.png" class="pic-arrow-down">
                            <div class="pic-natural-wrap">
                                <img src="/images/pc/topic/comment-pic.png" class="comment-pic-natural">
                            </div>
                        </div>
                        <div class="reply-wrap">
                            <textarea class="reply-input" placeholder="回复内容" value=""></textarea>
                            <button class="commit-red-btn commit-reply">提交回复</button>
                        </div>
                    </div>
                </li>
            </ul>
            <button class="load-btn">点击加载更多</button>
            <div class="comment-post-wrap">
                <h4 class="comment-top">我也要评论：</h4>
                <textarea class="comment-input"></textarea>
                <div class="commit-wrap clearfix">
                    <span class="commit-pic">+ 添加图片</span>
                    <button class="commit-red-btn commit-comment" id="commit-comment-btn">提交评论</button>
                </div>
            </div>
        </div>
        <div class="gift-ad-wrap">
            <img src="/images/pc/topic/ad.png">
            <img src="/images/pc/topic/ad.png">
        </div>
    </div>
</div>
    
@stop