(function ($) {

    $(function () {
        const domain_id = $("[name='domain_id']");
        const time_interval = $("[name='time_interval']");
        const status = $("[name='status']");
        const convert_status = $("[name='convert_status']")
        const BtnConvertJob = $("button#convert_job")
        if (convert_status.val() != 2 && convert_status.val() != 3) {
            BtnConvertJob.attr('disabled', 'disabled');
        }
        convert_status.on('change', function () {
            if (convert_status.val() != 2 && convert_status.val() != 3) {
                BtnConvertJob.attr('disabled', 'disabled');
            } else {
                BtnConvertJob.removeAttr('disabled');
            }
        });
        BtnConvertJob.on('click', function () {
            let setConfig = $.ajax({
                url: '/domain-job-convert',
                method: 'post',
                data: {
                    domain_id: domain_id.val(),
                    time_interval: time_interval.val(),
                    status: status.val(),
                    convert_status: convert_status.val(),
                }
            });
            setConfig.done(function (data) {
                Swal.fire(
                    'Tiến trình convert job đã được khởi tạo thành công',
                    '',
                    'success'
                );
            });
            setConfig.fail(function (data) {
                Swal.fire(
                    'Tiến trình convert job đã được khởi tạo thất bại',
                    '',
                    'error'
                );
            });
        })
    })
})(window.jQuery);
