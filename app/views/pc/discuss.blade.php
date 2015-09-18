@extends('layouts.pc-master')

@section('title')
    话题讨论
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
                    <h2 class="topic-title">{{{ $article_join['article_title'] }}}</h2>
                    <div class="user-info clearfix">
                        <img src="{{{ $article_join['avatar'] }}}" class="avatar">
                        <span class="user-name">{{{ $article_join['username'] }}}</span>
                        <span class="discuss-time">{{{ $article_join['created_at'] }}}</span>
                    </div>
                    <div class="discuss-content">
                        @foreach ( $article_join_parts as $parts )
                            @if ( $parts['type'] == 'url' )
                                <img src="{{{ $parts['content'] }}}">
                            @elseif ( $parts['type'] == 'text' )
                                <p>{{{ $parts['content'] }}}</p>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="post-wrap">
                <ul class="info clearfix">
                    <li class="info-item">
                        <button src="/images/pc/common/icon-view.png" class="info-view-btn post-btn"></button>
                        <span class="num">{{{ $article_join['scan_num'] }}}</span>
                    </li>
                    <li class="info-item">
                        <button src="/images/pc/common/icon-comment.png" class="info-comment-btn post-btn"></button>
                        <span class="num">{{{ $article_join['com_num'] }}}</span>
                    </li>
                    <li class="info-item" id="info-like">
                        <button
                            ac={{{ $type }}} 
                            post_url="/article/join_collection" 
                            src="/images/pc/common/icon-like-red.png" 
                            @if ( $type == 1 )
                                class="icon info-like-btn info-like-btn-a post-btn"
                            @else
                                class="icon info-like-btn post-btn"
                            @endif
                        ></button>
                        <span class="num">{{{ $article_join['focus_num'] }}}</span>
                    </li>
                </ul>
            </div>
            <div class="comment-input-wrap">
                <div class="comment-input-top">我也要评论</div>
                <textarea class="comment-input-area" placeholder="评论内容"></textarea>
                <div class="comment-input-btm clearfix">
                    <button class="comment-confirm-btn">评论</button>
                </div>
            </div>
            <ul class="comment-list">
                <div class="comment-count">评论( <span>{{{ $article_join['com_num'] }}}</span> )</div>
            </ul>
            <button class="load-btn">加载更多</button>
        </div>
        @include('pc.components.ad')
        <input type="text" style="display:none;" id="join_id" value="{{{ $article_join['id'] }}}">
    </div>
    @include('pc.components.back_to_top')
</div>

<script type="text/template" id="reply-template">
    <div class="reply-item">
        <strong class="reply-user-name">{{{ $article_join['username'] }}}</strong>
        <%- content %>
    </div>
</script>

<script type="text/template" id="comment-template">
    <li comment_id="<%- id %>" class="comment-item clearfix">
        <div class="comment-user-info">
            <img src="<%- avatar %>" class="avatar">
            <h4 class="user-name"><%- username %></h4>
        </div>
        <div class="comment-container">
            <div class="comment-content">
                <%- content %>
            </div>
            <div class="comment-info clearfix">
                <span class="comment-time"><%- created_at %></span>
                <button class="reply-btn">回复</button>
            </div>
            <div class="reply-container">
                <% _.forEach( replies, function( reply ){ %>
                    <div class="reply-item">
                        <strong class="reply-user-name"><%- reply.reply_name %>：</strong>
                        <%- reply.content %>
                    </div>
                <% }); %>
            </div>
            <div class="reply-wrap">
                <textarea class="reply-input" placeholder="回复内容" value=""></textarea>
                <div class="reply-btm clearfix">
                    <button class="reply-confirm">确定</button>
                    <button class="reply-cancel">取消</button>
                </div>
            </div>
        </div>
    </li>
</script>

@stop