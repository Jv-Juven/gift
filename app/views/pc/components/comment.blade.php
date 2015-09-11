<div class="comment-post-wrap">
    <h4 class="comment-top">我也要评论：</h4>
    <textarea class="comment-input"></textarea>
    <div class="commit-wrap clearfix">
        <span class="commit-pic">+ 添加图片</span>
        <button class="commit-red-btn commit-comment" id="commit-comment-btn">提交评论</button>
    </div>
</div>
<ul class="comment-list">
    <div class="comment-count">评论(15)</div>
    <li class="comment-item clearfix">
        <img src="/images/pc/common/avatar.png" class="avatar">
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
        <img src="/images/pc/common/avatar.png" class="avatar">
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
        <img src="/images/pc/common/avatar.png" class="avatar">
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
        <img src="/images/pc/common/avatar.png" class="avatar">
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
                <img src="/images/pc/common/6547.png" class="pic-arrow-down">
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

<script type="text/template">
    <li class="comment-item clearfix">
        <img src="<%- avatar %>" class="avatar">
        <div class="comment-container">
            <div class="comment-top clearfix">
                <span class="user-name"><%- user_name %></span>
                <span class="reply-btn">回复</span>
                <span class="comment-time"><% date %></span>
            </div>
            <div class="comment-content">
                <%- comment %>
            </div>
            <div class="comment-pic-wrap">
                <div class="pic-list clearfix">
                    <img src="" class="comment-pic">
                    <img src="" class="comment-pic">
                    <img src="" class="comment-pic">
                    <img src="" class="comment-pic">
                </div>
                <img src="/images/pc/topic/6547.png" class="pic-arrow-down">
                <div class="pic-natural-wrap">
                    <img src="" class="comment-pic-natural">
                </div>
            </div>
            <div class="reply-wrap">
                <textarea class="reply-input" placeholder="回复内容" value=""></textarea>
                <button class="commit-red-btn commit-reply">提交回复</button>
            </div>
        </div>
    </li>
</script>