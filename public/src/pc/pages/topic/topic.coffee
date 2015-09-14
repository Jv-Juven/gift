
post_info = require('../../common/post_info/post_info.coffee')
join_editor = require('./join_editor.coffee');

$ ->
    post_info.init article_id: $('#article_id').val()
    
    _discuss_list_ele = $ '.discuss-list'

    _discuss_list_ele.on 'click', '.discuss-pic', (event) ->
        _this = $ this
        _this_pos = _this.position()
        _this_parent = _this.parent()
        _margin_left = - parseInt _this_parent.css('margin-left')
        _arrow_down = _this_parent.siblings '.pic-arrow-down'
        _pic_natural = _this_parent.siblings('.pic-natural-wrap').children '.discuss-pic-natural'
        
        _arrow_down.css 'left', _this_pos.left + _margin_left + 'px'
        _pic_natural.prop 'src', _this.prop('src')