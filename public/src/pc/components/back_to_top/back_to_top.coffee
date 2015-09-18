
$ ->
 
    back_ele = $ '#back_to_top'

    if back_ele

        fade_speed = 100
        win = $ window
        doc = $ document
        body = $ 'body'
        footer_height = $('.footer').height()
        offset_bottom = parseInt back_ele.css 'bottom'

        win.scroll ->
            
            max_scroll = doc.height() - win.height() - footer_height
            scroll_top = doc.scrollTop()

            if scroll_top > win.height()
                if scroll_top > max_scroll
                    back_ele.css 'bottom', offset_bottom + scroll_top - max_scroll + 'px'
                else
                    back_ele.css 'bottom', offset_bottom

                back_ele.fadeIn fade_speed
            else
                back_ele.fadeOut fade_speed

        back_ele.on 'click', ->
            body.animate scrollTop: '0px', 150