(function ($) {

    var menubar = $('#menubar');
    var content = $('#content-body');
    var footer = $('#footer');

    $('#sbmenu-toggle').click(function (e) {
        e.preventDefault();
        if (menubar.hasClass('sbopen')) {
            menubar.removeClass('sbopen').addClass('sbclose');
            menubar.find('.menu-child').css('display', 'none');

            content.addClass('ctopen');
            footer.addClass('ctopen');
        } else {
            menubar.removeClass('sbclose').addClass('sbopen');

            content.removeClass('ctopen');
            footer.removeClass('ctopen');
        }
    });

    $('.sidebar-menu li.has-child > a').click(function (e) {
        e.preventDefault();

        var liparent = $(this).parent('li');
        var menu_child = $(this).parent('.has-child').find('.menu-child');

        $('.sidebar-menu > li').removeClass('active');
        $('.sidebar-menu ul.menu-child').slideUp(200);

        if (menu_child.css('display') === 'none') {
            liparent.addClass('active');
            menu_child.slideDown(200);
        } else {
            liparent.removeClass('active');
            menu_child.slideUp(200);
        }
    });
    
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
    
    $('.sidebar-menu .active').closest('.has-child').addClass('active');
    
    $('.datepicker').datepicker({
        dateFormat: 'dd/mm/yy'
    });

})(jQuery);
