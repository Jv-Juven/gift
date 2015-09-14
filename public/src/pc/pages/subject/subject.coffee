
post_info = require('../../common/post_info/post_info.coffee')

$ ->

    post_info.init( topic_id: $('#topic_id').val() )

    # 收藏
    $('.product-list').on 'click', 'like-btn', (event)->
        event.preventDefault()
        _this = $ this

        if _this.attr 'ac'
            $.ajax url: '/home/collection', method: 'POST', dataType: 'json', data : { gift_id: _this.attr('pid') }
            .done (result) -> 
                if !result.errCode
                    _this.attr 'ac', true
                    _this.addClass 'like-btn-a' 

    $('.load-btn').on 'click', (event)->
        event.preventDefault()