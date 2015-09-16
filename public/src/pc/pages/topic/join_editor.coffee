Uploader = require '../../common/uploader/index.coffee'

$ ->
    _fade_speed                 = 100
    _domain                     = 'http://7xl6gj.com1.z0.glb.clouddn.com'
    _edit_wrap_ele              = $ '.edit-wrap'
    _edit_mask                  = $ '.edit-mask'
    _edit_content_ele           = $ '.edit-content-input'
    _confirm_btn                = $ '.edit-confirm-btn'
    _cancel_btn                 = $ '.edit-cancel-btn'
    _upload_btn                 = $ '#upload-btn'
    _article_id                 = $('#article_id').val()
    _pic_all_keys               = []

    # 文件上传组件
    pic_file_uploader = new Uploader {
        domain: _domain,
        browse_button: 'upload-btn',
        container: 'upload-btn-wrap'
    }, {
        FileUploaded: (up, file, info) ->
            info = $.parseJSON info
            domain = up.getOption 'domain'
            url = domain + '/' + info.key

            _edit_content_ele.append '<img ' + 'key=' + info.key + ' src="' + url + '">'
            _pic_all_keys.push info.key
    }

    # 点击参与话题按钮，显示编辑浮层
    $('.join-topic-btn').on 'click', (event) ->
        event.preventDefault()
        _edit_wrap_ele.fadeIn _fade_speed

    # 点击阴影部分隐藏编辑器
    _edit_wrap_ele.on 'click', '.edit-mask', (event) ->
        _edit_wrap_ele.fadeOut _fade_speed

    # 监听输入
    _edit_content_ele.on 'change', (event) ->
        _this = $ this

        # 超过四张图片则禁止上传
        _upload_btn.prop 'disabled', _this.children('img').length > 4

    # 点击发表
    _confirm_btn.on 'click', (event) ->
        _data = []
        _text = ''
        _pic_keys_added = []
        _contents = _edit_content_ele.contents()

        if _contents.length == 0
            return

        # 格式化输入数据
        $.each _contents, (index, _dom_content) ->
            
            # 处理文本节点
            if _dom_content.nodeType is 3
                if _text isnt ''
                    _text += '\n'
                _text += _dom_content.data
            # 图片节点
            else if _dom_content.tagName is 'IMG'
                # 碰到图片节点将之前文本全部存为一段
                if _text isnt ''
                    _data.push 'text': _text
                    _text = ''
                _data.push 'url': _dom_content.getAttribute('src')
                _pic_keys_added.push _dom_content.getAttribute('key')
            # 其他节点
            else
                if _text isnt ''
                    _text += '\n'
                _text += if _dom_content.innerHTML is '<br>' then '' else _dom_content.innerHTML

        # 添加剩余文本，如果有的话
        if _text isnt ''
            _data.push 'text': _text

        console.log JSON.stringify {
            article_id: _article_id,
            content: _data
        }

        # 发送请求
        $.ajax {
            url: '/article/issue',
            method: 'POST',
            dataType: 'json',
            data: {
                data: JSON.stringify {
                    article_id: _article_id,
                    content: _data
                }
            }
        }
        .done (result) ->
            # 删除不需要的图片
            _pic_keys_to_del = _.difference _pic_all_keys, _pic_keys_added
            if _pic_keys_to_del.length
                delete_picture _pic_keys_to_del

            if result.errCode
                alert '发布失败'
            else
                alert '发布成功'
                location.reload()
            # alert if result.errCode then '发布失败' else '发布成功'

    # 点击取消
    _cancel_btn.on 'click', (event) ->
        _edit_mask.click()
        _edit_content_ele.empty()
        # 删除所有图片
        if _pic_all_keys.length
            delete_picture _pic_all_keys

    # 窗口关闭删除图片
    $(window).unload ->
        if _pic_all_keys.length
            delete_picture _pic_all_keys

# 删除图片
delete_picture = ( _pic_keys )->

    $.ajax {
        url: '/qiniu/delete',
        method: 'POST',
        dataType: 'json',
        data: {
            keys: _pic_keys
        }
    }
    .done (result) ->