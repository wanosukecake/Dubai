(function( $ ) {
    // ajaxリクエスト関数
    $.fn.ajaxRequest = function (doneFunc, data, url, type) {
        // event.preventDefault();
        // event.stopPropagation();

        $(this).showLoading();
        if(typeof url == 'undefined') {
            url = $(this).attr('action');
        }
 
        $.ajax({
            url: url,
            type: type,
            data: data,
            dataType:"json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            beforeSend:function() {
            },
        })
        .done(function (response) {
            // 通信成功時のコールバック処理
            doneFunc(response)
        })
        .fail(function (response) { 
            // 通信失敗時のコールバック処理
            alert(response.responseJSON.message);
            // location.href = 'error/' + response.status;
        })
        .always(function(){
            $(this).hideLoading();
        })
    };

    $.fn.showLoading = function () {
        $('.loading').css('display', 'block');
    };

    $.fn.hideLoading = function () {
        $('.loading').css('display', 'none');   
    }
})( jQuery );

function formatDateYyyyMmDd(dt) {
  var y = dt.getFullYear();
  var m = ('00' + (dt.getMonth()+1)).slice(-2);
  var d = ('00' + dt.getDate()).slice(-2);
  return (y + '-' + m + '-' + d);
}