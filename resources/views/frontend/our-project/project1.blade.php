@extends('layouts.frontend')

@section('content')

<div class="site-content">
	<header class="big-title--single"
	        style="background-image: url('../../data/breadcrumb_bg.jpg')">
		<div class="container">
			<h1 class="entry-title">Dự án 1 </h1>							<div class="breadcrumb">
					<div class="container">
						<ul class="tm_bread_crumb">
	<li class="level-1 top"><a href="../../index.html">Home</a></li>
	<li class="level-2 sub"><a href="../../projects/index.html">Dự án</a></li>
	<li class="level-3 sub"><a href="../../projects/building/index.html">Thiết kế nội thất</a></li>
	<li class="level-4 sub tail current">Dự án 1</li>
</ul>
					</div>
				</div>
					</div>
	</header>
	<div class="container">
		
			
							<div class="row gallery tm-gallery">
					<div class="tm-nav">
						<span class="tm-next"><i class="fa fa-angle-right"></i></span>
						<span class="tm-prev"><i class="fa fa-angle-left"></i></span>
					</div>
					<div class="col-md-12 project-slider">
						<img width="1900" height="1268" src="../../wp-content/uploads/2015/07/slide_1.jpg" class="attachment-full" alt="slide_1" /><img width="1900" height="1267" src="../../wp-content/uploads/2015/07/slide_2.jpg" class="attachment-full" alt="slide_2" /><img width="1900" height="1267" src="../../wp-content/uploads/2015/07/slide_3.jpg" class="attachment-full" alt="slide_3" /><img width="1900" height="1262" src="../../wp-content/uploads/2015/07/slide_4.jpg" class="attachment-full" alt="slide_4" />					</div>
				</div>
				<script>
					jQuery(document).ready(function () {
						owl = jQuery(".project-slider").owlCarousel({
							autoplay: true,
							autoplayTimeout: 3000,
							loop: true,
							items: 1,
							navigation: false,
							stopOnHover: true,
							paginationSpeed: 1000,
							goToFirstSpeed: 2000,
							singleItem: true,
							autoHeight: true,
							transitionStyle: "fade"
						});
						jQuery(".tm-prev").on('click', function () {
							owl.trigger('prev.owl.carousel');
						});

						jQuery(".tm-next").on('click', function () {
							owl.trigger('next.owl.carousel');
						});
					});
				</script>
						<div class="row">
				<div class="single-project-description col-md-8">
					<h3 class="heading-title">White House in London</h3>					<p>
					Với gam màu chủ đạo là gam màu trầm ấm nhẹ nhàng mang đến cho không gian sự nhẹ nhàng, ấm áp. 

Thiết kế nội thất chung cư nhà Trường - Royal City 01


Không gian phòng khách trầm ấm nhẹ nhàng mang phong cách hiện đại

Nội thất phòng khách hiện đại với bộ ghế sofa da cao cấp tông màu đen lịch lãm. Đi kèm là mẫu bàn trà nhập khẩu cùng tông màu đen tạo nên sự thống nhất cho không gian. 


Thiết kế nội thất chung cư nhà anh Trường ở Royal 06


Phòng khách sử dụng bộ sofa da hiện đại cao cấp làm cho không gian sang trọng hơn
 
Thiết kế nội thất chung cư nhà anh Trường ở Royal 02
 
 
Phòng khách được thiết kế lấy ánh sáng tự nhiên, không quá gay gắt, tạo sự dịu nhẹ cho không gian. 
 
 
Thiết kế nội thất chung cư nhà anh Trường ở Royal 04
Góc view nhìn không gian phòng khách và phòng bếp

Khác với bộ sản phẩm của phòng khách. Thiết kế nội thất nhà bếp hiện đại với tông màu trắng nổi bật, mẫu tủ bếp cao cấp làm bằng Acrylic trắng bóng tôn lên sự tinh tế cho không gian nội thất


Thiết kế nội thất chung cư nhà anh Trường ở Royal 05
 
Thiết kế nội thất chung cư nhà anh Trường ở Royal 08



Các đồ vật dung cho phòng khách được thiết kế hiện đại, thông minh đem lại sự tiện dụng cho người dùng. Khu quầy bar đặt giữa trung tâm bếp giúp cho không gian bếp đẳng cấp và sang trọng hơn


Thiết kế nội thất chung cư nhà anh Trường ở Royal 03


Phòng bếp thiết kế hiện đại nổi bật với gam màu trắng.
 
				</p>

				</div>
				<div class="project-meta col-md-4">
					<h3 class="heading-title">Mô tả dự án</h3>					<div class="project-meta__content">
						<div class="client"><span class="client__title meta-title">Khách hàng: </span><span class="client__name meta-value">Anh Đức, Hà Nội</span></div><div class="location"><span class="location__title meta-title">Địa điểm: </span><span class="location__name meta-value">Hoàn Kiếm, Hà Nội</span></div>
						<div class="surface-area"><span class="surface-area__title meta-title">Diện tích: </span><span class="surface-area__name meta-value">100 m2</span></div><div class="year-complete"><span class="year-complete__title meta-title">Năm hoàn thành: </span><span class="year-complete__name meta-value">2015</span></div><div class="architect"><span class="architect__title meta-title">Tổng giá trị: </span><span class="architect__name meta-value">200.000.000</span></div><div class="architect"><span class="architect__title meta-title">Thiết kế: </span><span class="architect__name meta-value">Mạnh Hùng</span></div>
						<div class="url"><span class="architect__title meta-title">Link: </span><span class="project-url"><a href="http://awscompany.com/">Visit project</a></span></div>					</div>
				</div>

				
			</div>

			<div class="row project-nav">
	<div class="col-md-5 left prev-project">
			</div>
	<div class="col-md-2 center">
		<a href="../../our-projects/index.html"><i class="fa fa-th-large"></i></a>
	</div>
	<div class="col-md-5 right next-project">
		<a href="../project-02/index.html" rel="next">Dự án 1</a>	</div>
</div>

			</div>

</div><!-- #content -->

@stop