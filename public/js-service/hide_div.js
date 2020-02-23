(function($) {
        $("#check1").change(function() {
            if ($(this).checked) {
                $("#div_link").show();
            } else {
                $("#div_link").hide();
            }
    });
}(window.jQuery));
