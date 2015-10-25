(function($){

    $('.item-delete').click(function (e) {
        var conf = confirm('Bạn chắc chắn xóa?');
        if (conf) {
            return true;
        } else {
            return false;
        }
    });
    
    $('.btn-massdel').click(function(){
       var conf = confirm('Bạn chắc chắn xóa?');
       if(conf){
           $('.form-data').submit();
       }else{
           return false;
       }
    });

    $('.field-date').datepicker({
        dateFormat: 'dd/mm/yy',
        changeYear: true
    });

    $('.checkall').click(function () {
        if ($(this).is(':checked')) {
            $('.checkitem').prop('checked', true);
        } else {
            $('.checkitem').prop('checked', false);
        }
    });

    $('.checkitem').change(function () {
        if ($('.checkitem:checked').size() === $('.checkitem').size()) {
            $('.checkall').prop('checked', true);
        } else {
            $('.checkall').prop('checked', false);
        }
    });



//    $('.current-tags').select2();
//    $('.new-tags').select2({
//        tags: true
//    });
//
//    tinymce.init({
//        selector: '.editor',
//        plugins: [
//            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
//            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
//            "save table contextmenu directionality emoticons template paste textcolor responsivefilemanager"
//        ],
//        image_advtab: true,
//        relative_urls: false,
//        toolbar: "insertfile undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | forecolor backcolor | responsivefilemanager | code",
//        external_filemanager_path: "/plugin/filemanager/",
//        filemanager_title: "Quản lý file upload",
//        external_plugins: {"filemanager": "/plugin/filemanager/plugin.min.js"}
//    });   

})(jQuery);
