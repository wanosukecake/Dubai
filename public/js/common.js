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
            beforeSend:function() {
            },
        })
        .done(function (response) {
            // 通信成功時のコールバック処理
            doneFunc(response)
        })
        .fail(function (response) { 
            // 通信失敗時のコールバック処理
            location.href = 'error/' + response.status;
        })
        .always(function(){
            // $(this).hideLoading();
        })
    };

    $.fn.showLoading = function () {
        // let loadingUrl = $("#loading").val();
        // $('body').append('<div id="loading_box"><i class="fas fa-spinner fa-5x fa-spin"></div>');
        $('.loading').css('display', 'block');
    };

    $.fn.hideLoading = function () {
        $('#loading_box').remove();
    }

    $.fn.describeGraph = function (id, datasetsLabel, type, backgroundColor, options={}, response) {
        if (document.getElementById(id)) {
            let ctx = document.getElementById(id).getContext('2d');
            let chart = new Chart(ctx, {
                type: type,
                data: {
                    labels: response.label,
                    datasets: [{
                        label: !datasetsLabel? "" :datasetsLabel,
                        backgroundColor: backgroundColor,
                        data: response.data
                    }]
                },
                options: options
            });
        }
    }
})( jQuery );