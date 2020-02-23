(function ($) {
    $(function () {
        const $btnSubmmit            = $('#btn-add-new-url');
        const $url                   = $('#url');
        const $div                   = $('#div');
        // const $type                 = $("[name*='type']:checked");
        const $notificaitonError     = $('.notificaiton');
        const $notificaitonErrorFormatUrl     = $('.notificaitonUrl');
        const $loadingDom            = '<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>';
        const $addNewLink            = $('#addNewLink');
        const locationHref           = $(location).attr('href');
        const statusConfigCrawlerJob = $("input[name*='status_crawler']");
        const $formatUrl            = $('#format_url');
        // console.log(statusConfigCrawlerJob.prop('checked'));
        var validURL = function (str) {
            var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
                '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
                '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
                '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
                '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
                '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
            return !!pattern.test(str);
        };
        $btnSubmmit.on('click', function () {
            $notificaitonErrorFormatUrl.html('');
            $notificaitonError.html('');
            let format_url = $formatUrl.val();
            let url = $url.val();
            let div = $div.val();
            if (!validURL(url)) {
                $notificaitonError.html('URL không đúng định dạng ');
                // $notificaitonErrorFormatUrl.html('URL không đúng định ');
                return;
            }
            if (!format_url) {
                $notificaitonErrorFormatUrl.html('Format url không được để trống ');
                return;
            }

            // if (!validURL(format_url)) {
            //     $notificaitonErrorFormatUrl.html('URL không đúng định ');
            //     return;
            // }

            let type = $("[name*='type']:checked").val();
            // console.log(type);
            // return;
            var parts = locationHref.split("/");
            var last_part = parts[parts.length-1];

            let rawdataPost = {
                'url'           : url,
                'div'           : div,
                'type'          : type,
                'domain_id'     :last_part,
                'format_url'    : format_url,
            };

            let addUrlLinkBlockPosting = $.post('/add-url', rawdataPost);

            $btnSubmmit.html($loadingDom);
            $btnSubmmit.attr("disabled", true);
            addUrlLinkBlockPosting.then(function (data) {
                $btnSubmmit.attr("disabled", false);
                let createLinkSuccess = 4;

                if (data.code !== createLinkSuccess) {
                    $notificaitonError.html(data.message);
                }

                if (data.code === createLinkSuccess) {
                    $addNewLink.modal('hide');
                    setTimeout(function () {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 2000
                        };
                        toastr.success('Thêm mới URL thành công');
                    }, 1300);

                    setTimeout(function () {
                        window.location.href = locationHref;
                    }, 3000);

                }
                $btnSubmmit.html('<i class="fa fa-plus"></i> Save');
                $btnSubmmit.attr("disabled", false);

            });
        });
        $(document).on('change', statusConfigCrawlerJob, function () {
            console.log(statusConfigCrawlerJob);
            let parts = locationHref.split("/");
            let last_part = parts[parts.length - 1];
            let setConfig = $.ajax({
                url: '/config-crawler-job/' + last_part,
                method: 'post',
                data: {
                    status: statusConfigCrawlerJob.prop('checked')
                }
            });
            setConfig.done(function (data) {
                statusConfigCrawlerJob.html($loadingDom);
                console.log(data);

            });
            setConfig.fail(function (data) {
                statusConfigCrawlerJob.html($loadingDom);
                console.log(data);
            });
        })
    });
})(window.jQuery);
