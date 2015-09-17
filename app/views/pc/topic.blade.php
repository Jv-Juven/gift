@extends('layouts.pc-master')

@section('title')
    话题详情
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/pc/css/pages/topic.css">
@stop

@section('js')
    @parent
    <script type="text/javascript" src="/lib/js/plupload/plupload.full.min.js"></script>
    <script type="text/javascript" src="/lib/js/qiniu/qiniu.min.js"></script>
    <script type="text/javascript" src="/dist/pc/js/pages/topic.js"></script>
@stop

@section('body')
<div class="page-content">
    <div class="container clearfix">
        <div class="container-left">
            <div class="topic-wrap">
                <div class="topic">
                    <h2 class="title">{{{ $article['title'] }}}</h2>
                    <div class="info">
                        <span class="info-view">
                            <img src="/images/pc/common/icon-view.png" class="icon">
                            <span class="num" id="count-view">{{{ $article['scan_num'] }}}</span>
                        </span>
                        {{-- 话题参与数 --}}
                        <span class="info-comment">
                            <img src="/images/pc/common/icon-comment.png" class="icon">
                            <span class="num" id="count-comment">{{{ $article['join_num'] }}}</span>
                        </span>
                        <span class="info-like">
                            <img src="/images/pc/common/icon-like.png" class="icon">
                            <span class="num" id="count-like">{{{ $article['focus_num'] }}}</span>
                        </span>
                        <span class="date">2015-09-05</span>
                    </div>
                    <div class="topic-content">
                        @foreach ( $article_parts as $parts )
                            @if ( $parts['type'] == 'url' )
                                <img src="{{{ $parts['content'] }}}">
                            @elseif ( $parts['type'] == 'text' )
                                <p>{{{ $parts['content'] }}}</p>
                            @endif
                        @endforeach                    
                    </div>
                </div>
            </div>
            @include('pc.components.post_info', [
                'info' => [
                    'like'      => [
                        'post_url'  => '/article/article_collection',
                        'count'     => $article['scan_num'],
                        'ac'        => $type
                    ],
                    // 话题参与数 
                    'comment'   => [
                        'post_url'  => '',
                        'count'     => $article['join_num']
                    ],
                    'share'     => [
                        'post_url'  => '',
                        'count'     => $article['focus_num']
                    ]
                ]
            ])
            <button class="join-topic-btn">参与话题</button>
            <ul class="discuss-list">
                <div class="discuss-count">话题讨论( <span class="count">0</span> )</div>
            </ul>
            <button class="load-btn">加载更多</button>
        </div>
        @include('pc.components.ad')
        @include('pc.components.join_topic_editor')
        <input type="text" style="display:none;" id="article_id" value="{{{ $article['id'] }}}">
    </div>
    @include('pc.components.back_to_top')
</div>

<script type="template" id="discuss-item-template">
    <li class="discuss-item clearfix">
        <img src="<%- avatar %>" class="avatar">
        <div class="discuss-container">
            <div class="discuss-top clearfix">
                <span class="user-name"><%- username %></span>
                <span class="discuss-time"><%- created_at %></span>
            </div>
            <div class="discuss-content">
                <a target="_blank" href="/detail/join_detail?join_id=<%- id %>" class="content-link">
                    <% var text_arr = text.split( '\n' ).slice( 0, 3 ); %>
                    <% _.forEach( text_arr, function( text ){ %>
                        <%- text %>
                        <%= '<br>' %>
                    <% }); %>
                </a>
            </div>
            <div class="discuss-pic-wrap">
                <% if ( imgs.length ){ %>
                    <div class="pic-list clearfix">
                        <% _.forEach( imgs, function( img ){ %>
                            <img src="<%- img %>" class="discuss-pic">
                        <% }); %>
                    </div>
                    <div class="arrow-down-wrap">
                        <img src="/images/pc/common/6547.png" class="pic-arrow-down">
                    </div>
                    <div class="pic-natural-wrap">
                        <img src="" class="discuss-pic-natural">
                    </div>
                <% } %>
            </div>
        </div>
    </li>
</script>

@stop