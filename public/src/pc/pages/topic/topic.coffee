
post_info = require '../../common/post_info/post_info.coffee'
join_editor = require './join_editor.coffee'

_discuss_next_page = 1
_discuss_per_page = 3
_discuss_template_compiled = null
_discuss_list_ele = null
_discuss_count_ele = null
_load_btn = null
_article_id = null

$ ->
    _discuss_template_compiled = _.template $( '#discuss-item-template' ).html()
    _discuss_list_ele = $ '.discuss-list'
    _discuss_count_ele = $ '.discuss-count .count'
    _load_btn = $ '.load-btn'
    _article_id = $('#article_id').val()
    
    _load_btn.on 'click', load
    _discuss_list_ele.on 'click', '.discuss-pic', pic_show
    _discuss_list_ele.on 'click', '.pic-natural-wrap', () ->
        $(this).hide().siblings( '.arrow-down-wrap' ).hide()

    # 初始化信息组件
    post_info.init article_id: _article_id

    # 加载话题讨论第一页
    load()

# 图片展示
pic_show = (event) ->
    _this               = $ this
    _this_pos           = _this.position()
    _this_parent        = _this.parent()
    _margin_left        = - parseInt _this_parent.css 'margin-left'
    _arrow_wrap         = _this_parent.siblings '.arrow-down-wrap'
    _pic_natural_wrap   = _this_parent.siblings '.pic-natural-wrap'
    _pic_natural        = _pic_natural_wrap.children '.discuss-pic-natural'

    _arrow_wrap.css 'left', _this_pos.left + _margin_left + 'px'
    _pic_natural.prop 'src', _this.prop('src')

    _arrow_wrap.show()
    _pic_natural_wrap.show()

# 加载话题讨论
load = () ->
    data = 
        article_id: _article_id
        page: _discuss_next_page
        per_page: _discuss_per_page

    $.ajax {
        url: '/detail/bre_join',
        method: 'GET',
        dataType: 'json',
        data: data
    }
    .done ( result ) ->
        if !result.errCode and result.article_joins.length
            _discuss_next_page += 1 
            _discuss_count_ele.html result.total
            _.forEach result.article_joins, ( discussion ) ->
                _discuss_list_ele.append _discuss_template_compiled discussion
