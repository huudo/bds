
var field_id;
var field_show;
var add_image = 0;

(function ($) {

    function fileSelected(field_id) {
        var file = document.getElementById(field_id).files[0];
        if (file) {
            var fileSize = 0;
            if (file.size > 1024 * 1024)
                fileSize = (Math.round(file.size * 100 / (1024 * 1024)) / 100).toString() + 'MB';
            else
                fileSize = (Math.round(file.size * 100 / 1024) / 100).toString() + 'KB';

            $('input[name="post_title"]').val(file.name);
            document.getElementById('fileName').innerHTML = '<strong>Name</strong>: ' + file.name;
            document.getElementById('fileSize').innerHTML = '<strong>Size</strong>: ' + fileSize;
            document.getElementById('fileType').innerHTML = '<strong>Type</strong>: ' + file.type;
        }
    }

    function loadFiles() {
        $.post(ajax_url, {'action': 'append_modal'}, function (data) {
//            $('#popupModal .modal-body #files-tab').html(data);
            $('body').find('#popupModal .modal-body #files-tab').html(data);
        });
    }



    $(document).ready(function () {

        var $pgbar = $('body').find('.upload-box .progress .progress-bar');

        $('body').on('click', '#form-upload #upload-field', function () {
            $pgbar.html('0' + '%').css('width', '0%');
        });
        $('body').on('change', '#form-upload #upload-field', function () {
            fileSelected('upload-field');

            var formupload = document.getElementById("form-upload");

            formData = new FormData(formupload);
            formData.append('_token', $('#ajax_csrf').val());
            formData.append('action', 'file_upload');

            $.ajax({
                xhr: function () {
                    var xhr = new XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function (evt) {
                        if (evt.lengthComputable) {
                            var perComp = parseInt(evt.loaded / evt.total * 100);
                            $pgbar.html(perComp + '%').css('width', perComp + '%');
                            if (perComp === 100) {
                                $pgbar.html('Complete!');
                            }
                        } else {
                            $pgbar.html('Unable!');
                        }
                    }, false);
                    xhr.addEventListener("error", function (evt) {
                        $pgbar.html("Upload Error!");
                    }, false);
                    xhr.addEventListener("abort", function (evt) {
                        $pgbar.html("Upload abort!");
                    }, false);
                    return xhr;
                },
                url: upload_file_url,
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function (data) {
                    if (data.stt === 'valid') {
                        $('.after-upload').html(data.value.fl_file);
                        $pgbar.html('Không đúng định dạng file');
                    } else if (data.stt === 'dsave') {
                        $('.after-upload').html(data.value);
                        $pgbar.html(data.value);
                    } else {
                        $('.after-upload').append('<div class="media post-file">' +
                                '<div class="post-image pull-left">' +
                                '<img width="50" src="' + data.value.src + '" alt=""/>' +
                                '</div>' +
                                '<div class="media-body">' +
                                '<h5 class="media-heading post-title">' + data.value.name + '</h5>' +
                                '</div>' +
                                '</div>');

                        $('.modal-body .nav-tabs li').removeClass('active');
                        $('.modal-body .nav-tabs a[href="#files-tab"]').closest('li').addClass('active');
                        $('.modal-body .tab-pane').removeClass('active');
                        $('.modal-body #files-tab').addClass('in active');
                        $('.availablefiles').append('<li><a field-id="'+field_id+'" field-show="'+field_show+'" data-id="' + data.value.id + '" data-name="' + data.value.name + '" href="' + data.value.srcfull + '"><img width="100" alt="Image" src="' + data.value.src + '"></a></li>');
                    }
                }
            });

        });

        $('.media-choose .media-select').click(function (e) {
            e.preventDefault();
            add_image = 0;
            var href = $(this).attr('data-href');
            popupLoad(href);

        });
        $('#add-image').click(function () {
            add_image = 1;
            var href = $(this).attr('data-href');
            popupLoad(href);
        });

        function popupLoad(href) {
            $('#popupModal #files-tab').load(href, function () {
                $(this).removeClass('text-center');
                field_id = $('ul.availablefiles').attr('field-id');
                field_show = $('ul.availablefiles').attr('field-show');
            });
        }

//    $('.media-container').html('<iframe style="width: 100%; min-height: 500px;" frameborder="0" src="'+url+'/plugin/filemanager/dialog.php?type=0"></iframe>');

        $('body').on('click', 'ul.availablefiles li a', function (e) {
            e.preventDefault();
            var url = $(this).attr('href');
            var atid = $(this).attr('data-id');
            if (add_image === 1) {
                var boximage = $('.box-galleries');
                boximage.append('<div class="image alert alert-dismissable fade in" role="alert">' +
                        '<button class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>' +
                        '<img src="' + url + '" />' +
                        '<input type="hidden" name="image_ids[]" value=' + url + ' />' +
                        '</div>');
            } else {
                $('.' + field_id).val(url);
                $('.' + field_show).attr('src', url);
            }
            $('#popupModal').modal('hide');
        });

    });

})(jQuery);

function pickFile(field_id, imgshow) {
    imageshow = imgshow;
    field_url = field_id;
}






