(function ($) {
    const btnLoadNotification = $('.btn-load-notification');
    var isRunningRequest = 0;

    let Notification = (function ($, window, document) {
        let dataRequest = {};
        dataRequest.page = 1;
        dataRequest.total = $('#notification_total');
        dataRequest.menuDataNotification = $('.dropdown-alerts');

        dataRequest.getDataNotification = function (page) {
            dataRequest.menuDataNotification.append('<li class="text-center loading-notification"> <img src="/img/loading.gif" alt=""></li>');
            isRunningRequest = 1;
            let listNotification = $.get('/notification?page=' + page);

            listNotification.done(function (data) {
                isRunningRequest = 0;
                console.log(data);
                let htmlNotification = '';
                let dataNotification = data.data;
                let total = dataNotification.length;
                if(total === 0){
                    let isDataResponeNull = 2;
                    isRunningRequest = isDataResponeNull;
                    dataRequest.menuDataNotification.find('.loading-notification').remove();
                    dataRequest.menuDataNotification.append('<b>Hết dữ liệu</b>');
                    return;
                }
                $('.loading-notification').remove();
                for ($i = 0; $i < total; $i++ ) {
                    console.log(dataNotification[$i].name);
                    htmlNotification = htmlNotification +
                        '<li>' +
                        ' <a href="#"> ' +
                        '<div> ';
                    if (dataNotification[$i].type==1) {
                        htmlNotification = htmlNotification + '<i class="fa fa fa-cogs"></i> ';
                    }
                    if (dataNotification[$i].type==2) {
                        htmlNotification = htmlNotification + '<i class="fa fa-paste"></i> ';
                    }
                    if (dataNotification[$i].type==3) {
                        htmlNotification = htmlNotification + '<i class="fa fa-paper-plane-o"></i> ';
                    }
                    htmlNotification = htmlNotification + dataNotification[$i].name +
                        '<br><span class="text-muted small">'+ dataNotification[$i].description +'</span> ' +
                        '<br><span class="text-muted small">Update: '+ dataNotification[$i].updated_at +'</span> ' +
                        '</div> ' +
                        '</a> ' +
                        '</li>';
                }
                dataRequest.menuDataNotification.append(htmlNotification);
            // <img src="{{asset('/img/loading.gif')}}" alt="">
                Notification.total.html(data.total);
                Notification.page += 1;


            });
            listNotification.fail(function (data) {

            })
        };

        return dataRequest;
    }(window.jQuery, window, document));
    Notification.getDataNotification(Notification.page);

    $('.dropdown-alerts').on('scroll', function () {
        let div = $(this).get(0);
        if (div.scrollTop + div.clientHeight >= div.scrollHeight) {
            // do the lazy loading here
            if( ! isRunningRequest){
                let isDataResponeNull = 2;
                if(isRunningRequest === isDataResponeNull){
                    return;
                }
                Notification.getDataNotification(Notification.page);

            }
        }
    });
})(window.jQuery);
