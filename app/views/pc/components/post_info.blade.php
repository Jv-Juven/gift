<div class="post-wrap clearfix">
    <div class="info">
        <span class="info-item">
            <button
                post_url="{{{ $info['like']['post_url'] }}}" 

                ac={{{ $info['like']['ac'] }}}

                {{-- Fuck !!! --}}
                @if ( $info['like']['ac'] )
                    class="icon post-btn info-like-btn info-like-btn-a"
                @else
                    class="icon post-btn info-like-btn"
                @endif
            >
            </button>
            <span class="num">{{{ $info['like']['count'] }}}</span>
        </span>

        @if ( isset( $info['comment'] ) )
        <span class="info-item">
            <button post_url="{{{ $info['comment']['post_url'] }}}" class="icon post-btn info-comment-btn"></button>
            <span class="num">{{{ $info['comment']['count'] }}}</span>
        </span>
        @endif

        @if ( isset( $info['share'] ) )
        <span class="info-item">
            <button post_url="{{{ $info['share']['post_url'] }}}" class="icon post-btn info-share-btn"></button>
            <span class="num">{{{ $info['share']['count'] }}}</span>
        </span>
        @endif
    </div>
    <div class="share">
        <span>分享到:</span>
        <span class="share-item">
            <a class="share-wechat share-a" target="_blank">
                <img src="/images/pc/common/share-wechat.png" alt="分享给到微信朋友圈" class="icon">
            </a>
        </span>
        <!--
        <span class="share-item">
            <img src="/images/pc/common/share-wechat-friend.png" alt="分享到微信朋友圈" class="share-wechat-friend icon">
        </span>
        -->
        <span class="share-item">
            <a class="share-qq share-a" target="_blank">
                <img src="/images/pc/common/share-qq.png" alt="分享给QQ朋友" class="icon">
            </a>
        </span>
        <span class="share-item">
            <a class="share-weibo share-a" target="_blank">
                <img src="/images/pc/common/share-weibo.png" alt="分享到微博" class="icon">
            </a>
        </span>
    </div>
</div>

<script src="http://connect.qq.com/widget/loader/loader.js" widget="shareqq" charset="utf-8"></script>
