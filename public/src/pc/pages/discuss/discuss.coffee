
_join_id                        = null
_next_page                      = 1
_per_page                       = 3
_comment_list_ele               = null
_comment_template_complied      = null

$ ->
    _join_id                    = $('#join_id').val()
    _avatar                     = $('.user-info .avatar').prop 'src'
    _user_name                  = $('.user-info .user-name').html()
    _load_btn                   = $ '.load-btn'
    _comment_list_ele           = $ '.comment-list'
    _reply_template_complied    = _.template $('#reply-template').html()
    _comment_template_complied  = _.template $('#comment-template').html()

    # 收藏按钮
    $('.info').on 'click', '.info-like-btn', (event) ->
        event.preventDefault()
        _this = $ this
        _flag = parseInt _this.attr 'ac'

        $.ajax {
            url: _this.attr('post_url')
            method: 'POST'
            dataType: 'json'
            data :
                join_id: _join_id
        }
        .done (result) -> 
            if !result.errCode
                if _flag
                    _this.removeClass 'info-like-btn-a'
                    _this.attr 'ac', 0
                else
                    _this.addClass 'info-like-btn-a'
                    _this.attr 'ac', 1

    # 点击回复按钮：显示回复评论输入框
    _comment_list_ele.on 'click', '.reply-btn', (event) ->
        event.preventDefault() 
        $(this).parent().siblings('.reply-wrap').toggle()

    # 点击取消按钮：隐藏回复评论输入框
    _comment_list_ele.on 'click', '.reply-cancel', (event) ->
        event.preventDefault()
        $(this).parents('.reply-wrap').toggle()

    # 点击确认按钮：回复评论
    _comment_list_ele.on 'click', '.reply-confirm', (event) ->
        event.preventDefault()
        _this               = $ this
        _reply_input        = _this.parent().siblings '.reply-input'
        _reply_container    = _this.parents('.reply-wrap').siblings '.reply-container'
        _content            = _reply_input.val()

        # 内容为空 不发送评论
        if _content.length == 0
            return

        $.ajax {
            url: '/article/reply'
            method: 'POST'
            dataType: 'json'
            data: 
                com_id: _this.parents('.comment-item').attr 'comment_id'
                content: _content
        }
        .done (result) ->
            if !result.errCode
                _reply_input.val( '' )
                _reply_container.append _reply_template_complied content: _content

    # 提交评论
    $('.comment-confirm-btn').on 'click', (event) ->
        event.preventDefault()
        _this               = $ this
        _comment_input      = _this.parent().siblings('.comment-input-area')
        _content            = _comment_input.val()

        if _content.length == 0
            return

        $.ajax {
            url: '/article/comment'
            method: 'POST'
            dataType: 'json'
            data:
                join_id: _join_id
                content: _content
        }
        .done (result) ->
            if !result.errCode
                alert '评论成功'
                location.reload()
            else
                alert '评论失败'
            ###
                直接添加评论到列表
                该功能预留
                _comment_list_ele.perpend _comment_template_complied {
                    id: result.id
                    avatar: _avatar
                    username: _user_name
                    content: _content
                    created_at: result.created_at
                    replys: []
                }
            ###

    # 加载更多
    _load_btn.on 'click', load

    # 进入页面即先加载评论第一页
    load()

load = ->
    $.ajax {
        url: '/detail/join_com'
        method: 'GET'
        dataType: 'json'
        data:
            join_id:    _join_id
            per_page:   _per_page
            page:       _next_page
    }
    .done (result) ->
        if !result.errCode and result.join_coms.length
            _next_page += 1
            console.log JSON.stringify result.join_coms
            _.forEach result.join_coms, ( comment ) ->
                _comment_list_ele.append _comment_template_complied comment
