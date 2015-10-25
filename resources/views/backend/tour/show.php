@extends('website.layouts.tour')

@section('content'

<div class="main-content single-content">
    <div class="container">
        <section class="home-content left-sidebar row">
            <div class="col-md-8 col-sm-6 col-xs-12">
                <div class="advance-search">
                    <form action="">
                        <div class="form-inline">
                            <div class="form-group form-select">
                                <label for="">Khởi hành từ</label>
                                <select name="" id="" class="form-control">	
                                    <option selected value="0">Chọn điểm khởi hành</option>
                                    <option value="1">Value 1</option>
                                    <option value="1">Value 2</option>
                                    <option value="1">Value 3</option>
                                    <option value="1">Value 4</option>
                                    <option value="1">Value 5</option>
                                </select>
                            </div>
                            <div class="form-group form-select">
                                <label for="">Đích đến</label>
                                <select name="" id="" class="form-control">	
                                    <option selected value="0">Chọn đích đến</option>
                                    <option value="1">Value 1</option>
                                    <option value="1">Value 2</option>
                                    <option value="1">Value 3</option>
                                    <option value="1">Value 4</option>
                                    <option value="1">Value 5</option>
                                </select>
                            </div>
                            <div class="form-group form-text">
                                <label for="">Ngày khởi hành</label>
                                <input class="form-control" type="text" placeholder="Ngày" />
                                <input class="form-control" type="text" placeholder="Tháng" />
                            </div>
                        </div>
                        <div class="form-inline">
                            <div class="form-group form-select">
                                <label for="">Số ngày</label>
                                <select name="" id="" class="form-control">	
                                    <option selected value="0">Chọn</option>
                                    <option value="1">1</option>
                                    <option value="1">2</option>
                                    <option value="1">3</option>
                                    <option value="1">4</option>
                                    <option value="1">5</option>
                                </select>
                            </div>
                            <div class="form-group form-select">
                                <label for="">Ngày trong tuần</label>
                                <select name="" id="" class="form-control">	
                                    <option selected value="0">Tất cả</option>
                                    <option value="1">1</option>
                                    <option value="1">2</option>
                                    <option value="1">3</option>
                                    <option value="1">4</option>
                                    <option value="1">5</option>
                                </select>
                            </div>
                            <div class="form-group form-submit">
                                <input type="submit" value="Tìm Tour" class="btn btn-default" >
                            </div>
                        </div>
                    </form>
                </div><!--end advance-search-->
                <article class="single-item">
                    <header class="entry-header">
                        <h1>Du lịch Nha Trang Biển Gọi 3 ngày 2 đêm</h1>
                    </header>
                    <div class="meta-data">
                        <span class="post-on">11/03/2015</span>
                        <div class="meta-share"><img src="images/meta-share.png" alt=""></div>
                    </div><!--end meta-data-->
                    <div class="single-top-content row">
                        <div class="thumb-single col-md-7 col-sm-12">
                            <img src="images/single-thumb.jpg" alt="">
                        </div>
                        <div class="tour-info col-md-5 col-sm-12">
                            <div class="inner">
                                <p><strong>Tour ID</strong><span>1391</span></p>
                                <p><strong>Ngày khởi hành</strong><span>Khách đặt</span></p>
                                <p><strong>Thời gian</strong><span>3 ngày 2 đêm</span></p>
                                <p><strong>Đặt trước</strong><span>5 ngày</span></p>
                                <div class="tour-price">
                                    <span>2.500.000 ₫</span>
                                </div>
                                <div class="text-center">
                                    <input type="submit" class="btn btn-default" value="Đặt tour" />
                                </div>
                            </div>
                        </div>
                    </div><!--end single-top-content-->
                    <div class="entry-content">
                        <?php for ($i = 0; $i < 3; $i++) { ?>
                            <div class="date-item">
                                <div class="entry-title">
                                    <h3><span><img src="images/title-bg.jpg" alt="">Đón khách - Vinpearl Land</span></h3>
                                </div>
                                <div class="date-item-content  row">
                                    <div class="description col-md-6 col-sm-12">
                                        <p>Buổi sáng: Xe và Hướng dẫn viên đón Qúy khách tại sân bay Cam Ranh/Ga Nha Trang, đưa về khách sạn nhận phòng, nghỉ ngơi tự do.</p>
                                        <p>Buổi chiều 14:00: Xe đưa đòan khởi hành xuống Khu giải trí Vinperland – Hòn Ngọc Việt qua khu vui chơi giải trí (phí tự túc) bằng hệ thống cáp treo vượt biển dài nhất thế giới 3.320m. Tham gia các trò chơi cảm giác mạnh: phim ảo 3D – 4D, đu quay nhào lộn, tàu lượn siêu tốc, thú nhún, điện đụng…Khám phá thế giới Thủy Cung muôn màu, Công viên nước hoành tráng và thưởng thức chương trình Nhạc nước Laser kỳ ảo…Xe đưa đòan lại về thành phố biển. Ăn tối, tự do nghỉ ngơi.</p>
                                    </div>
                                    <div class="thumb-item col-md-6 col-sm-12">
                                        <img src="images/single-item.jpg" alt="">
                                    </div>
                                </div><!--end date-item-content-->
                            </div>
                        <?php } ?>

                    </div><!--end entry-content-->

                    <div class="tour-note clearfix">
                        <div class="col-md-6 col-sm-12 description">
                            <h3>GIÁ TOUR BAO GỒM</h3>
                            <p>Vận chuyển bằng xe máy lạnh, hiện đại</p>
                            <p>Khách sạn 2* tiện nghi tại trung tâm thành phố (lẻ nam, nữ ghép 3)</p>
                            <p>Tại Nha Trang:</p>
                            <p>KS 2 sao: Thiên Tân, Sea View, 101 Ngôi Sao…(hoặc tương đương). <br />
                                KS 3 sao: Angella, Hải Âu, Green…(hoặc tương đương).</p>
                            <p>Tại Đà Lạt:    <br />
                                KS 2 sao: Golf 1, Thắng Lợi 1…(hoặc tương đương).<br />
                                KS 3 sao: Mai Vàng, Cẩm Đô…(hoặc tương đương).</p>
                            <p>Ăn theo chương trình</p>
                            <p>Phí tham quan tại các điểm (vé vào cửa 1 lần)</p>
                            <p>HDV tiếng việt kinh nghiệm</p>
                            <p>Nước suối (01 chai 0,5l/khách/ngày).</p>
                            <p>Bảo hiểm du lịch.</p>
                        </div>
                        <div class="col-md-6 col-sm-12 description">
                            <h3>GIÁ TOUR BAO GỒM</h3>
                            Thuế VAT<br />
                            Xe đón tiễn sân bay Hà Nội <br />
                            Vé máy bay khứ hồi HAN – NHA - DLI - HAN<br />
                            Chi phí cá nhân<br />
                            Tiền bồi dưỡng cho Hướng dẫn viên và lái xe<br />
                            Hành lý quá cước...<br />
                            GHI CHÚ:<br />
                            Trẻ em 1 - 3 tuổi: miễn phí (ăn + ngủ chung giường với bố mẹ); phí phát sinh: ăn sáng ... bố mẹ thanh toán.<br />
                            Trẻ em 4 - 9 tuổi: tính 75% suất (ăn suất riêng và ngủ chung giường với bố mẹ).<br />
                            10 tuổi trở lên: tính như người lớn.<br />
                            Chương trình Nha Phu (ghép đoàn xe + tàu) vẫn áp dụng cho nhóm khách đi riêng.<br />
                        </div>
                    </div><!--end tour-note-->
                    <div class="booking-type clearfix">
                        <h3>Quý khách có thể đặt tour bằng các hình thức</h3>
                        <div class="colleft col-md-6 col-sm-12">
                            <p><span class="num">1</span><span class="text">Trực tiếp lên website, nhanh nhất - tiện nhất</span></p>
                            <p><span class="num">2</span><span class="text">Đến trực tiếp đến văn phòng tại Hà Nội và Sài Gòn</span></p>
                            <div class="map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d931.2212438715136!2d105.80998264269864!3d20.997247433222892!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1437467895887" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="colright col-md-6 col-sm-12">
                            <div class="ctgroup">
                                <p><span class="num">3</span><span class="text">Gọi điện thoại cho chúng tôi</span></p>
                                <div class="phone row">
                                    <div class="col-xs-4"><img class="icon" src="images/icon24.png" /></div>
                                    <div class="nopadding col-xs-4">
                                        <a href="telto:0987.654.321">0987.654.321</a>
                                        <a href="telto:0912.345.678">0912.345.678</a>
                                    </div>
                                    <div class="col-xs-4">
                                        <a href="telto:0987.654.321">0987.654.321</a>
                                        <a href="telto:0912.345.678">0912.345.678</a>
                                    </div>
                                </div>
                            </div>
                            <div class="ctgroup">
                                <p><span class="num">4</span><span class="text">Qua chat</span></p>
                                <div class="phone row">
                                    <div class="col-xs-4"><img class="icon" src="images/mess.png" /></div>
                                    <div class="nopadding col-xs-4">
                                        <a href="#">Ms. Đam</a>
                                        <a href="#">Mr. An</a>
                                    </div>
                                    <div class="col-xs-4">
                                        <a href="#">Ms. Huyen</a>
                                        <a href="#">Ms. Thuy</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!--end booking-type-->
                    <div class="more-toure text-center">
                        <a href="#" class="btn btn-info">Xem các Tour cùng loại</a>
                    </div>
                </article>
            </div>

            <div class="sidebar col-md-4 col-sm-6 col-xs-12">
                <div class="support-online">
                    <div class="entry-header">
                        <h3>hỗ trợ trực tuyến</h3>
                    </div>
                    <div class="box-support">
                        <h5>Tư vấn trong nước</h5>
                        <p><span class="name">Ms. An </span><i class="fa fa-skype"></i><span class="phone">0987.654.321</span></p>
                        <p><span class="name">Ms. Bình </span><i class="fa fa-skype"></i> <span class="phone">0987.654.321</span></p>
                    </div>
                    <div class="box-support">
                        <h5>Tư vấn nước ngoài</h5>
                        <p><span class="name">Ms. An </span><i class="fa fa-skype"></i> <span class="phone">0987.654.321</span></p>
                    </div>
                </div><!--end support-online-->
                <div class="top-view">
                    <div class="entry-header">
                        <h3>Được xem nhiều</h3>
                    </div>
                    <div class="top-view-list">
                        <?php for ($i = 0; $i < 4; $i++) { ?>
                            <article class="tour-item tour-rating clearfix">
                                <div class="thumb">
                                    <img src="images/tour-thumb4.jpg" alt="">
                                </div>
                                <div class="entry-content">
                                    <div class="entry-title">
                                        <h3><a href="#">Tour 3 ngày 4 đêm, <span>Hội An, Đà Nẵng</span></a></h3>
                                        <span class="star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half"></i>
                                            <i class="fa fa-star-o"></i>
                                        </span>
                                        <span class="view-count">( 1345 Lượt xem )</span>
                                    </div>
                                    <div class="description">
                                        Trải nghiệm điều thú vị tại mảnh đất hiền hòa này
                                    </div>
                                </div>
                            </article>
                        <?php } ?>

                    </div>
                </div><!--end top-view-->
                <div class="newletter">
                    <form action="">
                        <h3 class="title">đăng ký nhận email khuyến mãi</h3>
                        <p class="description">
                            Hàng ngàn ưu đãi và các tour hấp dẫn đang đợi bạn. Đăng ký ngay để không bỏ lỡ thông tin
                        </p>
                        <div class="form-group">
                            <input class="form-control" type="mail" placeholder="Email" />
                            <input class="btn btn-success" type="submit" value="Gửi" />
                        </div>
                    </form>
                </div>
                <div class="tour-event">
                    <div class="entry-header">
                        <h3>Được xem nhiều</h3>
                    </div>
                    <div class="tour-event-list">
                        <?php for ($i = 0; $i < 4; $i++) { ?>
                            <article class="tour-item tour-rating clearfix">
                                <div class="thumb">
                                    <img src="images/tour-thumb4.jpg" alt="">
                                </div>
                                <div class="entry-content">
                                    <div class="entry-title">
                                        <h3><a href="#">Tour 3 ngày 4 đêm, <span>Hội An, Đà Nẵng</span></a></h3>
                                        <span class="star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half"></i>
                                            <i class="fa fa-star-o"></i>
                                        </span>
                                        <span class="view-count">( 1345 Lượt xem )</span>
                                    </div>
                                    <div class="description">
                                        Trải nghiệm điều thú vị tại mảnh đất hiền hòa này
                                    </div>
                                </div>
                            </article>
                        <?php } ?>
                    </div>
                </div><!--end tour-event-->

                <div class="image-widget">
                    <a href="#">
                        <img src="images/img-sidebar.jpg" alt="">
                    </a>
                </div>
            </div>
        </section>


        <section class="new-tour">
            <div class="entry-header">
                <div class="row">
                    <div class="col-md-9 col-sm-6 col-xs-12">
                        <h3>Tour mới</h3>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 text-right">
                        <a href="#" class="read-more btn btn-default">Xem tất cả <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="tour-list clearfix">
                <?php for ($i = 0; $i < 4; $i++) { ?>
                    <article class="col-sm-6 col-xs-12 col-md-3  tour-item tour-new-item">
                        <div class="inner-tour">
                            <div class="entry-top">
                                <div class="thumb">
                                    <img src="images/tour-thumb1.jpg" alt="">
                                </div>
                                <div class="box-button">
                                    <a href="#" class="btn-trans">Chi tiết</a>
                                    <a href="#" class="btn-trans">Đặt tour</a>
                                </div>
                                <div class="tour-price" style="background: #ffd205">
                                    <span class="temp"></span>
                                    <div class="price"><span>3</span> Triệu</div>
                                </div>
                                <div class="tour-hotel">
                                    Khách sạn 4 sao
                                </div>
                            </div><!--end entry-top-->
                            <div class="content-tour">
                                <div class="entry-title">
                                    <h3><a href="#">Tour Đà Nẵng Cù Lao Chàm</a></h3>
                                    <div class="tour-date"> <span>3</span> Ngày <br> <span>3</span> Đêm</div>
                                </div><!--end try-title-->
                                <div class="entry-content">
                                    <p>Đà Nẵng, Việt Nam. Mang một vẻ đẹp hoang sơ và lôi cuốn du khách với bãi biển cát trắng trải dài...</p>
                                </div>
                            </div>
                        </div>
                    </article><!--end tour-item-->
                <?php } ?>

            </div>
        </section><!--end new-tour-->

    </div>
</div><!--end main-content-->

@stop
