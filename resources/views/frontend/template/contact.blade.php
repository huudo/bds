{!! show_errors() !!}
<div class="page-title-wrapper">
    <div class="container">
        <h1 class="page-title">Liên hệ</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="content page-content">
                {!! Form::open(['route' => 'contact.store']) !!}
                {!! fForm::groupText('Họ tên', 'fullname', null, null, 12, 12) !!}
                {!! fForm::groupText('Email', 'email', null, null, 12, 12) !!}
                {!! fForm::groupText('Điện thoại', 'phone', null, null, 12, 12) !!}
                {!! fForm::groupText('Địa chỉ', 'address', null, null, 12, 12) !!}
                {!! fForm::groupText('Tiêu đề', 'address', null, null, 12, 12) !!}
                {!! fForm::groupTextArea('Nội dung', 'content', null, ['rows' => 3],12,12) !!}
                {!!Form::submit('Liên hệ', ['class' => 'btn btn-primary pull-right'])!!}
                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-md-8 col-sm-8 col-xs-12">

                <div style="width: 100%; height: 400px;" id="contact-ggmap" data-latitude="<?php echo get_setting('_latitude') ? get_setting('_latitude') : 21.017446; ?>" data-longtitude="<?php echo get_setting('_longtitude') ? get_setting('_longtitude') : 105.808357; ?>" data-name="<?php echo get_setting('_compnany_name'); ?>" data-address="<?php echo get_setting('_address'); ?>">
                </div>
            <div class="entry-header" style="margin-top: 35px;">
                <h4><b>{!! get_setting('_compnany_name') !!}</b></h4>
                <p class="info_company" style="line-height: 28px;font-size: 14px">
                    <b>Trụ sở chính :</b> {!! get_setting('_compnany_headquarter') !!}<br>
                    <b>Văn phòng GD :</b> {!! get_setting('_compnany_office') !!}<br>
                    <b>Điện thoại :</b> {!! get_setting('_phone') !!}<br>
                    <b>Email :</b> {!! get_setting('_email') !!}<br>
                    <b>Website :</b> <a href="http://<?php echo get_setting('_website'); ?>">{!! get_setting('_website') !!}</a>
                </p>
            </div>
        </div>
    </div>
    <script type="text/javascript"
    src="http://maps.googleapis.com/maps/api/js?sensor=false&language=vi"></script>
    <script type="text/javascript">
        var map;
        function initialize() {
            if (jQuery('#contact-ggmap').length > 0) {
                var latitude = jQuery('#contact-ggmap').data('latitude');
                var longtitude = jQuery('#contact-ggmap').data('longtitude');
                var name = jQuery('#contact-ggmap').data('name');
                var address = jQuery('#contact-ggmap').data('address');
                var myLatlng = new google.maps.LatLng(latitude, longtitude);
            }
            var myOptions = {
                zoom: 16,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            map = new google.maps.Map(document.getElementById("contact-ggmap"), myOptions);
            // Biến text chứa nội dung sẽ được hiển thị
            var text;
            text = "<b style='color:#197a0f' " +
                    "style='text-align:center'>" + name + "<br />" +
                    "<span>" + address + "</span>";
            var infowindow = new google.maps.InfoWindow(
                    {content: text,
                        size: new google.maps.Size(100, 50),
                        position: myLatlng
                    });
            infowindow.open(map);
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: "Công ty TNNN Dịch vụ và Du lịch Phố Việt"
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</div>