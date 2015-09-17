###
    <script type="text/javascript">

    (function(){
        var p = {
            url:location.href, 获取URL，可加上来自分享到QQ标识，方便统计
            desc:'', 分享理由(风格应模拟用户对话),支持多分享语随机展现（使用|分隔）
            title:'', 分享标题(可选)
            summary:'', 分享摘要(可选)
            pics:'', 分享图片(可选)
            flash: '', 视频地址(可选)
            site:'', 分享来源(可选) 如：QQ分享
            style:'201',
            width:32,
            height:32
        };
        var s = [];

        for(var i in p){
            s.push(i + '=' + encodeURIComponent(p[i]||''));
        }
        document.write(['<a class="qcShareQQDiv" href="http://connect.qq.com/widget/shareqq/index.html?',s.join('&'),'" target="_blank">分享到QQ</a>'].join(''));
    })();

    </script>
    <script src="http://connect.qq.com/widget/loader/loader.js" widget="shareqq" charset="utf-8"></script>
###

__init_qq_share = ->
    p = 
        url: location.href 
        desc: 'QQ分享' 
        title: 'QQ分享'
        summary: 'Summary here'
        site: '礼乎'
        style: '201'
        width: 32
        height: 32

    query = []
    _.forEach p, (value, key) ->
        query.push( key + '=' + encodeURIComponent( value||'' ) )

    $('.share-qq').prop 'href', 'http://connect.qq.com/widget/shareqq/index.html?' + query.join('&')

module.exports = 

    init: ( data ) -> 

        # 收藏按钮
        $('.info').on 'click', '.info-like-btn', (event) ->
            event.preventDefault()
            _this = $ this
            _flag = parseInt _this.attr 'ac'

            $.ajax {
                url: _this.attr('post_url')
                method: 'POST'
                dataType: 'json'
                data : data
            }
            .done (result) -> 
                if !result.errCode
                    if _flag
                        _this.removeClass 'info-like-btn-a'
                        _this.attr 'ac', 0
                    else
                        _this.addClass 'info-like-btn-a'
                        _this.attr 'ac', 1

        __init_qq_share()