@extends('layouts.pc-master')

@section('title')
    专题详情
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/pc/css/pages/subject.css">
@stop

@section('js')
    @parent
    <script src="/dist/pc/js/pages/subject.js"></script>
@stop

@section('body')
<div class="page-content">
    <div class="container clearfix">
        <div class="container-left">
            <div class="subject">
                <img src="{{{ $topic['topic_url'] }}}" alt="{{{ $topic['title'] }}}" class="pic">
                <h2 class="title">{{{ $topic['title'] }}}</h2>
                <div class="info">
                    <span class="info-view">
                        <img src="/images/pc/common/icon-view.png" alt="" class="icon">
                        <span class="num" id="count-view">{{{ $topic['scan_num'] }}}</span>
                    </span>
                    <span class="info-like">
                        <img src="/images/pc/common/icon-like.png" alt="" class="icon">
                        <span class="num" id="count-like">{{{ $topic['focus_num'] }}}</span>
                    </span>
                </div>
                <p class="desc">
                    {{{ $topic['content'] }}}
                </p>
            </div>
            <ul class="product-list">
                @for ( $i = 0; $i < count( $gifts ); ++$i )
                <li class="product">
                    <h3 class="title">
                        <span class="index">{{{ $i + 1 }}}.</span>
                        {{{ $gifts[$i]['title'] }}}
                    </h3>
                    <p class="desc">
                        {{{ $gifts[$i]['content'] }}}
                    </p>
                    <img src="{{{ $gifts[$i]['img'] }}}" class="pic">
                    <div class="pro-btm clearfix">
                        <div class="info">
                            <span class="price">{{{ $gifts[$i]['price'] }}}</span>
                            <span class="like">
                                <button ac={{{ $gifts[$i]['type'] }}} pid="{{{ $gifts[$i]['id'] }}}" 
                                @if ( $gifts[$i]['type'] )
                                    class="like-btn like-btn-a"
                                @else
                                    class="like-btn"
                                @endif
                                ></button>
                                <span class="num">{{{ $gifts[$i]['focus_num'] }}}</span>
                            </span>
                            <img src="/images/pc/common/222.png" class="line">
                        </div>
                        <a target="_blank" href="{{{ $gifts[$i]['taobao_url'] }}}" class="detail-link">查看详情</a>
                    </div>
                </li>
                @endfor
            </ul>
            @include('pc.components.post_info', [
                'info' => [
                    'like'      => [
                        'post_url'  => '/home/topicCollection',
                        'count'     => $topic['scan_num'],
                        'ac'        => $type
                    ],
                    'share'     => [
                        'post_url'  => '',
                        'count'     => $topic['focus_num']
                    ]
                ]
            ])
        </div>
        @include('pc.components.ad')
        <input type="text" style="display:none;" id="topic_id" value="{{{ $topic['id'] }}}">
    </div>
    @include('pc.components.back_to_top')
</div>

@stop