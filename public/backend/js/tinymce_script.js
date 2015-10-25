(function ($) {
        tinymce.init({
            selector: '.editor',
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor responsivefilemanager"
            ],
            image_advtab: true,
            relative_urls: false,
            toolbar: "insertfile undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | forecolor backcolor | responsivefilemanager | code",
            external_filemanager_path: "/plugin/filemanager/",
            filemanager_title: "Quản lý file upload",
            external_plugins: {"filemanager": "/plugin/filemanager/plugin.min.js"}
        });

        $('.media-select').click(function () {
            var src = $(this).attr('data-href');
            $('#popupModal .file-frame').attr('src', src);
        });

        $('.media-choose .media-delete').click(function (e) {
            e.preventDefault();
            $(this).closest('.media-choose').find('.media-image').attr('src', '');
            $(this).closest('.media-choose').find('#media-url').val('');
        });

})(jQuery);

function responsive_filemanager_callback(field_id) {
    var url = $('#' + field_id).val();
    if (field_id === 'temp_images') {
        var src = $('<a>', {href: url})[0];
        var path = src.pathname;
        $('body').find('.box-galleries').append('<div class="image alert alert-dismissable fade in" role="alert">' +
                '<button class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>' +
                '<img src="' + path + '" />' +
                '<input type="hidden" name="image_ids[]" value=' + path + ' />' +
                '</div>');
    } else {
        var mediabox = $('#' + field_id).closest('.media-choose');
        var image = mediabox.find('.media-image');
        if (image.length > 0) {
            image.attr('src', url);
        }
        var mediadel = mediabox.find('.media-delete');
        mediadel.show();
    }
    return false;
}


