
post_info = require '../../common/post_info/post_info.coffee'

$ ->

    post_info.init( topic_id: $('#topic_id').val() )

    # 收藏礼品
    $('.product-list').on 'click', '.like-btn', (event)->
        event.preventDefault()
        _this = $ this
        _flag = parseInt _this.attr 'ac'

        $.ajax url: '/home/collection', method: 'POST', dataType: 'json', data : { gift_id: _this.attr('pid') }
        .done (result) -> 
            if !result.errCode
                if _flag
                    _this.removeClass 'like-btn-a'
                    _this.attr 'ac', 0
                else
                    _this.addClass 'like-btn-a'
                    _this.attr 'ac', 1
