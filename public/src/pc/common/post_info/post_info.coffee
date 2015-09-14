
module.exports = 

    init: ( data ) -> 

        $('.info').on 'click', '.info-like-btn', (event) ->
            event.preventDefault()
            _this = $ this

            if _this.attr 'ac'
                $.ajax url: _this.attr('action_url'), method: 'POST', dataType: 'json', data : data
                .done (result) -> 
                    if !result.errCode
                        _this.attr 'ac', true
                        _this.addClass 'info-like-btn-a'