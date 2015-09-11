
module.exports =

    init: ->
        win = $ window
        doc = $ document
        body = $ 'body'
        back_ele = $ '#back_to_top'

        if back_ele

            win.scroll ->
                fade_speed = 100

                if doc.scrollTop() > win.height()
                    back_ele.fadeIn( fade_speed )
                else
                    back_ele.fadeOut( fade_speed )

            back_ele.on 'click', ->
                body.animate scrollTop: '0px', 150