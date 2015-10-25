(function ($) {
    $(document).ready(function () {
        $('.box-select .link_type input[type="radio"]').change(function () {
            if ($(this).is(':checked')) {
                var type = $(this).val();
                $.ajax({
                    url: ajax_url,
                    type: 'POST',
                    data: {
                        action: 'menu_link',
                        _token: $('.ajax_token').val(),
                        type: type
                    },
                    success: function (data) {
                        $('.box-select .link_select').html(data);
                    }
                });
            }
        });

        $('.box-select').each(function () {
            var type = $(this).find('input[type="radio"]:checked').val();
            var menu_id = $(this).find('#menu_id').val();
            var item_id = $(this).find('#item_id').val();
            var link = $(this).find('#menu_link').val();

            $.ajax({
                url: ajax_url,
                type: 'POST',
                data: {
                    action: 'menu_link',
                    _token: $('.ajax_token').val(),
                    type: type,
                    item_id: item_id,
                    link: link
                },
                success: function (data) {
                    $('.box-select .link_select').html(data);
                }
            });
        });

        $('.btn-tools .tool-del').click(function (e) {
            var conf = confirm('Bạn chắc chắn xóa?');
            if (conf) {
                $('form.form-data').submit();
            } else {
                return false;
            }
        });
    });
})(jQuery);

