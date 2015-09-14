
$ -> 
    _edit_wrap_ele = $('.edit-wrap')
    _fade_speed = 100

    $('.join-topic-btn').on 'click', (event) ->
        event.preventDefault()

        _edit_wrap_ele.fadeIn( _fade_speed )

    _edit_wrap_ele.on 'click', '.edit-mask', (event)->

        _edit_wrap_ele.fadeOut( _fade_speed )