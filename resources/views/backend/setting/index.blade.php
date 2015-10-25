@extends('layouts.backend')

@section('title', 'Cài đặt')

@section('content')

<h2>Cài đặt</h2>

{!! show_errors($errors) !!}

{!! Form::open([
'route' => 'admin.setting.update',
'class' => 'form-horizontal',
'method' => 'POST'
]) !!}

<?php
$dfcode = default_lang();
?>


<div class="tabs">
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#general" data-toggle="tab">Tổng quan</a></li>
        <li role="presentation" class=""><a href="#sidebar" data-toggle="tab">Sidebar</a></li>
        <li role="presentation" class=""><a href="#footertab" data-toggle="tab">Footer</a></li>
        <li role="presentation" class=""><a href="#contact" data-toggle="tab">Thông tin liên hệ</a></li>
    </ul>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade active in" id="general">

            {!! lang_tabs() !!}
            <br />
            <div class="form-group media-choose">
                <label class="col-sm-2">Logo</label>
                <div class="image col-sm-2">
                    <img class="media-image img-responsive" id="logo-show" src="{{ get_setting('_logo') }}" alt="Logo" />
                </div>
                <div class="col-sm-5" style="padding-left: 15px;">
                    {!! Form::text($dfcode.'[_logo]', get_setting('_logo'), ['id' => 'logo-url', 'class'=>'form-control']) !!}
                </div>
                <div class="col-sm-2 col-sm-offset-1">
                    <a data-target="#popupModal" data-toggle="modal" class="media-select btn btn-info" data-href="/plugin/filemanager/dialog.php?type=1&amp;field_id=logo-url" href="#">Thêm ảnh đại diện</a>
                </div>
            </div>
            <div class="tab-content">
                <?php $i = 0; ?>
                @foreach(get_langs() as $lang)
                <?php
                $code = $lang->code;
                $i++;
                ?>
                <div class="tab-pane fade in <?php if ($i == 1) echo 'active'; ?>" id="lang-{{$code}}">

                    <div class="form-group">
                        <label class="col-sm-2">Tiêu đề trang</label>
                        <div class="col-sm-10">
                            {!! Form::text($code.'[_title]', get_setting('_title', $lang->id), ['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Mô tả</label>
                        <div class="col-sm-10">
                            {!! Form::text($code.'[_desc]', get_setting('_desc', $lang->id), ['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="form-group">
                    <label class="col-sm-2">Mặc định phân trang</label>
                    <div class="col-sm-10">
                        {!! Form::text($dfcode.'[_per_page]', get_setting('_per_page'), ['class' => 'form-control']) !!}
                    </div>
                </div>
                    <div class="form-group">
                        <label class="col-sm-2">Số kí tự dịch vụ</label>
                        <div class="col-sm-10">
                            {!! Form::text($dfcode.'[_services_length]', get_setting('_services_length'), ['class' => 'form-control']) !!}
                        </div>
                    </div>
            </div>
        </div>
        <!--End tab 1-->

        <div role="tabpanel" class="tab-pane fade in" id="sidebar">

            {!! lang_tabs('sidebar-lang') !!}
            <br />
            <div class="tab-content">
                <h3>Tin tức widget</h3>
                <?php $i = 0; ?>
                @foreach(get_langs() as $lang)
                <?php
                $code = $lang->code;
                $i++;
                ?>
                <div class="tab-pane fade in <?php if ($i == 1) echo 'active'; ?>" id="sidebar-lang-{{$code}}">
                    <div class="form-group">
                        <label class="col-sm-2">Tiêu đề</label>
                        <div class="col-sm-10" style="padding-left: 15px;">
                            {!! Form::text($code.'[news_widget_title]', get_setting('news_widget_title')?get_setting('news_widget_title'):'Tin tức', ['id' => 'news-widget-title', 'class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Chọn danh mục</label>
                        <div class="col-sm-10" style="padding-left: 15px;">
                            {!! Form::select($code.'[news_widget_cat]', $cat, get_setting('news_widget_cat'), ['id' => 'news-widget-cat', 'class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Số lượng bài viết</label>
                        <div class="col-sm-10" style="padding-left: 15px;">
                            {!! Form::input('number', $code.'[news_widget_number]', get_setting('news_widget_number')?get_setting('news_widget_number'):5, ['id' => 'news-widget-number', 'class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Sắp xếp theo</label>
                        <div class="col-sm-10" style="padding-left: 15px;">
                            {!! Form::select($code.'[news_widget_orderby]', ['created_at' => 'Ngày tháng', 'random' => 'Ngẫu nhiên', 'views' => 'Lượt xem'], get_setting('news_widget_orderby')?get_setting('news_widget_orderby'):'desc', ['id' => 'news-widget-orderby', 'class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Sắp xếp</label>
                        <div class="col-sm-10" style="padding-left: 15px;">
                            {!! Form::select($code.'[news_widget_order]', ['asc' => 'Tăng dần', 'desc' => 'Giảm dần'], get_setting('news_widget_order')?get_setting('news_widget_order'):'desc', ['id' => 'news-widget-order', 'class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Số ký tự</label>
                        <div class="col-sm-10" style="padding-left: 15px;">
                            {!! Form::input('number', $code.'[news_widget_length]', get_setting('news_widget_length')?get_setting('news_widget_length'):20, ['id' => 'news-widget-length', 'class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>
                @endforeach

                <h3>Quảng cáo Banner</h3>
                <?php $i = 0; ?>
                @foreach(get_langs() as $lang)
                <?php
                $code = $lang->code;
                $i++;
                ?>
                <div class="tab-pane fade in <?php if ($i == 1) echo 'active'; ?>" id="sidebar-lang-{{$code}}">
                    <div class="form-group">
                        <label class="col-sm-2">Tiêu đề</label>
                        <div class="col-sm-10" style="padding-left: 15px;">
                            {!! Form::text($code.'[banner_widget_title]', get_setting('banner_widget_title')?get_setting('banner_widget_title'):'Quảng cáo', ['id' => 'banner-widget-title', 'class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Chọn Nhóm Banner</label>
                        <div class="col-sm-10" style="padding-left: 15px;">
                            {!! Form::select($code.'[banner_widget_group]', $banner_group, get_setting('banner_widget_group'), ['id' => 'banner-widget-group', 'class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Số lượng ảnh</label>
                        <div class="col-sm-10" style="padding-left: 15px;">
                            {!! Form::input('number', $code.'[banner_widget_number]', get_setting('banner_widget_number')?get_setting('banner_widget_number'):5, ['id' => 'banner-widget-number', 'class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Sắp xếp theo</label>
                        <div class="col-sm-10" style="padding-left: 15px;">
                            {!! Form::select($code.'[banner_widget_orderby]', ['created_at' => 'Ngày tháng', 'random' => 'Ngẫu nhiên'], get_setting('banner_widget_orderby')?get_setting('banner_widget_orderby'):'desc', ['id' => 'banner-widget-orderby', 'class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Sắp xếp</label>
                        <div class="col-sm-10" style="padding-left: 15px;">
                            {!! Form::select($code.'[banner_widget_order]', ['asc' => 'Tăng dần', 'desc' => 'Giảm dần'], get_setting('banner_widget_order')?get_setting('banner_widget_order'):'desc', ['id' => 'banner-widget-order', 'class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!--End tab 2-->

        <div role="tabpanel" class="tab-pane fade in" id="footertab">
            {!! lang_tabs('footer-lang') !!}
            <br />
            <div class="tab-content">
                <h3>Đối tác</h3>
                <?php $i = 0; ?>
                @foreach(get_langs() as $lang)
                <?php
                $code = $lang->code;
                $i++;
                ?>
                <div class="tab-pane fade in <?php if ($i == 1) echo 'active'; ?>" id="footer-lang-{{$code}}">
                    <div class="form-group">
                        <label class="col-sm-2">Tiêu đề</label>
                        <div class="col-sm-10" style="padding-left: 15px;">
                            {!! Form::text($code.'[partner_widget_title]', get_setting('partner_widget_title')?get_setting('partner_widget_title'):'Đối tác', ['id' => 'partner-widget-title', 'class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Số lượng đối tác</label>
                        <div class="col-sm-10" style="padding-left: 15px;">
                            {!! Form::input('number', $code.'[partner_widget_number]', get_setting('partner_widget_number')?get_setting('partner_widget_number'):10, ['id' => 'partner-widget-number', 'class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Sắp xếp theo</label>
                        <div class="col-sm-10" style="padding-left: 15px;">
                            {!! Form::select($code.'[partner_widget_orderby]', ['created_at' => 'Ngày tháng', 'random' => 'Ngẫu nhiên', 'name' => 'Tên'], get_setting('partner_widget_orderby')?get_setting('partner_widget_orderby'):'desc', ['id' => 'partner-widget-orderby', 'class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Sắp xếp</label>
                        <div class="col-sm-10" style="padding-left: 15px;">
                            {!! Form::select($code.'[partner_widget_order]', ['asc' => 'Tăng dần', 'desc' => 'Giảm dần'], get_setting('partner_widget_order')?get_setting('partner_widget_order'):'desc', ['id' => 'partner-widget-order', 'class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Mở link</label>
                        <div class="col-sm-10" style="padding-left: 15px;">
                            {!! Form::select($code.'[partner_widget_target]', ['_blank' => 'Tab mới', '_self' => 'Tab hiện tại'], get_setting('partner_widget_order')?get_setting('partner_widget_order'):'desc', ['id' => 'partner-widget-order', 'class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>
                @endforeach
                <h3>Giới thiệu về công ty</h3>
                <?php $i = 0; ?>
                @foreach(get_langs() as $lang)
                <?php
                $code = $lang->code;
                $i++;
                ?>
                <div class="tab-pane fade in <?php if ($i == 1) echo 'active'; ?>" id="footer-lang-{{$code}}">
                    <div class="form-group">
                        <label class="col-sm-2">Tiêu đề</label>
                        <div class="col-sm-10" style="padding-left: 15px;">
                            {!! Form::text($code.'[about_footer_widget_title]', get_setting('about_footer_widget_title')?get_setting('about_footer_widget_title'):'Giới thiệu về công ty', ['id' => 'about-footer-widget-title', 'class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="form-group">
                    <label class="col-sm-2">Hiển thị Logo</label>
                    <div class="col-sm-10" style="padding-left: 15px;">
                        {!! Form::select($dfcode.'[about_footer_widget_logo]', ['1' => 'Hiển thị', '0' => 'Ẩn'], get_setting('about_footer_widget_logo'), ['id' => 'about-footer-widget-logo', 'class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2">Hiển thị Giới thiệu về công ty</label>
                    <div class="col-sm-10" style="padding-left: 15px;">
                        {!! Form::select($dfcode.'[about_footer_widget_about]', ['1' => 'Hiển thị', '0' => 'Ẩn'], get_setting('about_footer_widget_about'), ['id' => 'about-footer-widget-about', 'class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2">Hiển thị Hotline</label>
                    <div class="col-sm-10" style="padding-left: 15px;">
                        {!! Form::select($dfcode.'[about_footer_widget_hotline]', ['1' => 'Hiển thị', '0' => 'Ẩn'], get_setting('about_footer_widget_hotline'), ['id' => 'about-footer-widget-hotline', 'class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2">Hiển thị Mạng xã hội</label>
                    <div class="col-sm-10" style="padding-left: 15px;">
                        {!! Form::select($dfcode.'[about_footer_widget_social]', ['1' => 'Hiển thị', '0' => 'Ẩn'], get_setting('about_footer_widget_social'), ['id' => 'about-footer-widget-social', 'class'=>'form-control']) !!}
                    </div>
                </div>
                
                <h3>Link nhanh</h3>
                <?php $i = 0; ?>
                @foreach(get_langs() as $lang)
                <?php
                $code = $lang->code;
                $i++;
                ?>
                <div class="tab-pane fade in <?php if ($i == 1) echo 'active'; ?>" id="footer-lang-{{$code}}">
                    <div class="form-group">
                        <label class="col-sm-2">Tiêu đề</label>
                        <div class="col-sm-10" style="padding-left: 15px;">
                            {!! Form::text($code.'[link_footer_widget_title]', get_setting('link_footer_widget_title')?get_setting('link_footer_widget_title'):'Liên kết', ['id' => 'link-footer-widget-title', 'class'=>'form-control']) !!}
                        </div>
                    </div>
                    <?php
                    $link_num = get_setting('link_footer_widget_number');
                    if ($link_num && $link_num > 0) {
                        for ($i = 1; $i <= $link_num; $i++) {
                            ?>
                            <div class="form-group">
                                <label class="col-sm-2">Tiêu đề link {{$i}}</label>
                                <div class="col-sm-10" style="padding-left: 15px;">
                                    {!! Form::text($code.'[link_footer_widget_title'.$i.']', get_setting('link_footer_widget_title'.$i), ['id' => 'link-footer-widget-title'.$i, 'class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2">Link {{$i}}</label>
                                <div class="col-sm-10" style="padding-left: 15px;">
                                    {!! Form::text($code.'[link_footer_widget_link'.$i.']', get_setting('link_footer_widget_link'.$i), ['id' => 'link-footer-widget-link'.$i, 'class'=>'form-control']) !!}
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                @endforeach
                <div class="form-group">
                    <label class="col-sm-2">Số lượng link</label>
                    <div class="col-sm-10" style="padding-left: 15px;">
                        {!! Form::input('number', $dfcode.'[link_footer_widget_number]', get_setting('link_footer_widget_number')?get_setting('link_footer_widget_number'):4, ['id' => 'link-footer-widget-number', 'class'=>'form-control']) !!}
                    </div>
                </div>
                <h3>Fanpage</h3>
                <?php $i = 0; ?>
                @foreach(get_langs() as $lang)
                <?php
                $code = $lang->code;
                $i++;
                ?>
                <div class="tab-pane fade in <?php if ($i == 1) echo 'active'; ?>" id="footer-lang-{{$code}}">
                    <div class="form-group">
                        <label class="col-sm-2">Tiêu đề</label>
                        <div class="col-sm-10" style="padding-left: 15px;">
                            {!! Form::text($code.'[fanpage_footer_widget_title]', get_setting('fanpage_footer_widget_title')?get_setting('fanpage_footer_widget_title'):'Fanpage', ['id' => 'fanpage-widget-title', 'class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="form-group">
                    <label class="col-sm-2">Tên fanpage</label>
                    <div class="col-sm-10" style="padding-left: 15px;">
                        {!! Form::text($dfcode.'[fanpage_footer_widget_name]', get_setting('fanpage_footer_widget_name'), ['id' => 'fanpage-footer-widget-name', 'class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2">Link fanpage</label>
                    <div class="col-sm-10" style="padding-left: 15px;">
                        {!! Form::text($dfcode.'[fanpage_footer_widget_link]', get_setting('fanpage_footer_widget_link'), ['id' => 'fanpage-footer-widget-link', 'class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
        <!--End tab 3-->

        <div role="tabpanel" class="tab-pane fade in" id="contact">
            {!! lang_tabs('contact-lang') !!}
            <div class="tab-content">
                <?php $i = 0; ?>
                @foreach(get_langs() as $lang)
                <?php
                $code = $lang->code;
                $i++;
                ?>
                <div class="tab-pane fade in <?php if ($i == 1) echo 'active'; ?>" id="contact-lang-{{$code}}">
                    <div class="form-group">
                        <label class="col-sm-2">Tên công ty</label>
                        <div class="col-sm-10">
                            {!! Form::text($code.'[_compnany_name]', get_setting('_compnany_name', $lang->id), ['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Trụ sở chính</label>
                        <div class="col-sm-10">
                            {!! Form::text($code.'[_compnany_headquarter]', get_setting('_compnany_headquarter', $lang->id), ['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Văn phòng đại diện</label>
                        <div class="col-sm-10">
                            {!! Form::text($code.'[_compnany_office]', get_setting('_compnany_office', $lang->id), ['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Giới thiệu về công ty</label>
                        <div class="col-sm-10">
                            {!! Form::textarea($code.'[_about]', get_setting('_about', $lang->id), ['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Địa chỉ</label>
                        <div class="col-sm-10">
                            {!! Form::text($code.'[_address]', get_setting('_address', $lang->id), ['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="form-group">
                <label class="col-sm-2">Email</label>
                <div class="col-sm-10">
                    {!! Form::text($dfcode.'[_email]', get_setting('_email'), ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2">Website</label>
                <div class="col-sm-10">
                    {!! Form::text($dfcode.'[_website]', get_setting('_website'), ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2">Facebook</label>
                <div class="col-sm-10">
                    {!! Form::text($dfcode.'[_facebook]', get_setting('_facebook'), ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2">Twitter</label>
                <div class="col-sm-10">
                    {!! Form::text($dfcode.'[_twitter]', get_setting('_twitter'), ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2">Pinterest</label>
                <div class="col-sm-10">
                    {!! Form::text($dfcode.'[_pinterest]', get_setting('_pinterest'), ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2">LinkedIn</label>
                <div class="col-sm-10">
                    {!! Form::text($dfcode.'[_linkedin]', get_setting('_linkedin'), ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2">Fax</label>
                <div class="col-sm-10">
                    {!! Form::text($dfcode.'[_fax]', get_setting('_fax'), ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2">Điện thoại</label>
                <div class="col-sm-10">
                    {!! Form::text($dfcode.'[_phone]', get_setting('_phone'), ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2">Điện thoại T1</label>
                <div class="col-sm-10">
                    {!! Form::text($dfcode.'[_phone_t1]', get_setting('_phone_t1'), ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2">Điện thoại T2</label>
                <div class="col-sm-10">
                    {!! Form::text($dfcode.'[_phone_t2]', get_setting('_phone_t2'), ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2">Mã số thuế</label>
                <div class="col-sm-10">
                    {!! Form::text($dfcode.'[_tax_code]', get_setting('_tax_code'), ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2">Kinh độ</label>
                <div class="col-sm-10">
                    {!! Form::text($dfcode.'[_latitude]', get_setting('_latitude'), ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2">Vĩ độ</label>
                <div class="col-sm-10">
                    {!! Form::text($dfcode.'[_longtitide]', get_setting('_longtitide'), ['class'=>'form-control']) !!}
                </div>
            </div>
        </div>
        <!-- End tab 4 -->
    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
        {!! Form::submit('Cập nhật', ['class' => 'btn btn-success']) !!}
    </div>
</div>

{!! Form::close() !!}

@include('backend.includes.popup')
@endsection

@section('footer')
<script src="/plugin/tinymce/tinymce.min.js"></script>
<script src="/backend/js/tinymce_script.js"></script>
@stop

