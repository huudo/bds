@extends('layouts.frontend')

@section('content')
<div class="site-content">
	<div class="big-title" style="background-image: url('../data/breadcrumb_bg.jpg')">
		<div class="container">
			<h1 class="entry-title">Contact</h1>							<div class="breadcrumb">
					<div class="container">
						<ul class="tm_bread_crumb">
	<li class="level-1 top"><a href="../index.html">Home</a></li>
	<li class="level-2 sub tail current">Contact</li>
</ul>
					</div>
				</div>
					</div>
	</div>
<div class="container">
	<div class="row">
											<div class="col-md-12">
			<div class="content">
									<div id="post-287">
						<div class="entry-content">
							<div class="vc_row wpb_row vc_row-fluid vc_custom_1438421533811"><div class="wpb_column vc_column_container vc_col-sm-8 vc_custom_1438421510815"><div class="wpb_wrapper"><div id="map-canvas" class="thememove-gmaps"	data-address="40.7590615,-73.969231"
	data-height="370"
	data-width="100%"
	data-zoom_enable=""
	data-zoom="16"
	data-map_type="roadmap"
	data-map_style="default"
	></div>
<script type="text/javascript">
	jQuery(document).ready(function ($) {

		var gmMapDiv = $("#map-canvas");

		(function ($) {

			if (gmMapDiv.length) {

				var gmMarkerAddress = gmMapDiv.attr("data-address");
				var gmHeight = gmMapDiv.attr("data-height");
				var gmWidth = gmMapDiv.attr("data-width");
				var gmZoomEnable = gmMapDiv.attr("data-zoom_enable");
				var gmZoom = gmMapDiv.attr("data-zoom");

				gmMapDiv.gmap3({
					action: "init",
					marker: {
						address: gmMarkerAddress,
						options: {
																												icon: "http://builder.zooka.io/wp-content/uploads/2015/08/map_marker.png"
																				},
												events: {
							click: function (marker, event) {
								var map = $(this).gmap3("get");
								infowindow = $(this).gmap3({get: {name: "infowindow"}});
								if (infowindow) {
									infowindow.open(map, marker);
									infowindow.setContent("&lt;/p&gt;\n&lt;p&gt;14 Tottenham Road, London, England.&lt;/p&gt;\n&lt;p&gt;");
								}
								else {
									$(this).gmap3({
										infowindow: {
											anchor: marker,
											options: {content: "&lt;/p&gt;\n&lt;p&gt;14 Tottenham Road, London, England.&lt;/p&gt;\n&lt;p&gt;"}
										}
									});
								}
							}
						}
											},
					map: {
						options: {
							zoom: parseInt(gmZoom),
							zoomControl: true,
							mapTypeId: google.maps.MapTypeId.ROADMAP,
							mapTypeControl: false,
							scaleControl: false,
							scrollwheel: gmZoomEnable == 'enable' ? true : false,
							streetViewControl: false,
							draggable: true,
													}
					}
				}).width(gmWidth).height(gmHeight);
			}
		})(jQuery);
	});
</script></div></div><div class="wpb_column vc_column_container vc_col-sm-4 vc_custom_1438421523390"><div class="wpb_wrapper"><div class="vc_custom_heading"><div style="font-size: 32px;color: #111111;text-align: left">We always looking for new collaborations, talents and partners</div></div>
	<div class="wpb_raw_code contact-info wpb_content_element wpb_raw_html">
		<div class="wpb_wrapper">
			<p><i class="fa fa-map-marker"></i>14 Tottenham Road, London, England.</p><p><i class="fa fa-phone"></i> (102) 6666 8888</p><p><i class="fa fa-envelope"></i> info@zooka.io</p><p><i class="fa fa-fax"></i> (102) 8888 9999</p><p><i class="fa fa-clock-o"></i> Mon – Sat: 9:00 – 18:00</p>
		</div> 
	</div> </div></div></div><div class="vc_row wpb_row vc_row-fluid vc_custom_1438422197296"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="wpb_wrapper"><div class="vc_custom_heading vc_custom_1438421768950"><div style="font-size: 26px;color: #000000;text-align: left">Send us a message</div></div><div role="form" class="wpcf7" id="wpcf7-f5-p287-o1" lang="en-US" dir="ltr">
<div class="screen-reader-response"></div>
<form action="http://builder.zooka.io/contact/#wpcf7-f5-p287-o1" method="post" class="wpcf7-form" novalidate="novalidate">
<div style="display: none;">
<input type="hidden" name="_wpcf7" value="5" />
<input type="hidden" name="_wpcf7_version" value="4.3" />
<input type="hidden" name="_wpcf7_locale" value="en_US" />
<input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f5-p287-o1" />
<input type="hidden" name="_wpnonce" value="fd3a66043f" />
</div>
<div class="row contact_form1">
<div class="col-md-4"><span class="wpcf7-form-control-wrap your-name"><input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Your name (required)" /></span></div>
<div class="col-md-4"><span class="wpcf7-form-control-wrap your-phone"><input type="tel" name="your-phone" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-tel" aria-invalid="false" placeholder="Your phone" /></span></div>
<div class="col-md-4"><span class="wpcf7-form-control-wrap your-email"><input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Your e-mail (required)" /></span></div>
</div>
<div class="row">
<div class="col-md-12">
<span class="wpcf7-form-control-wrap your-message"><textarea name="your-message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Your message (required)"></textarea></span><br />
<input type="submit" value="SUBMIT" class="wpcf7-form-control wpcf7-submit" />
</div>
</div>
<div class="wpcf7-response-output wpcf7-display-none"></div></form></div><div class="vc_custom_heading vc_custom_1438421895909"><div style="font-size: 22px;color: #111111;text-align: left">Builder Offices</div></div></div></div></div><div class="vc_row wpb_row vc_row-fluid vc_custom_1438422213509"><div class="wpb_column vc_column_container vc_col-sm-4"><div class="wpb_wrapper">
	<div class="wpb_text_column wpb_content_element  contact_block">
		<div class="wpb_wrapper">
			<p><img class="alignnone size-full wp-image-371" src="../wp-content/uploads/2015/08/contact_1.jpg" alt="contact_1" width="120" height="120" /><a href="#">Phoenix Office</a><br />
4686 E Van Buren, Ste. 100 Phoenix,<br />
AZ 85008<br />
(602) 840-8655<br />
info@zooka.io</p>

		</div> 
	</div> 
	<div class="wpb_text_column wpb_content_element  contact_block">
		<div class="wpb_wrapper">
			<p><img class="alignnone size-full wp-image-375" src="../wp-content/uploads/2015/08/contact_4.jpg" alt="contact_4" width="120" height="120" /><a href="#">Orlando Office</a><br />
4686 E Van Buren, Ste. 100 Phoenix,<br />
AZ 85008<br />
(602) 840-8655<br />
info@zooka.io</p>

		</div> 
	</div> </div></div><div class="wpb_column vc_column_container vc_col-sm-4"><div class="wpb_wrapper">
	<div class="wpb_text_column wpb_content_element  contact_block">
		<div class="wpb_wrapper">
			<p><img class="alignnone size-full wp-image-373" src="../wp-content/uploads/2015/08/contact_2.jpg" alt="contact_2" width="120" height="120" /><a href="#">Orlando Office</a><br />
4686 E Van Buren, Ste. 100 Phoenix,<br />
AZ 85008<br />
(602) 840-8655<br />
info@zooka.io</p>

		</div> 
	</div> 
	<div class="wpb_text_column wpb_content_element  contact_block">
		<div class="wpb_wrapper">
			<p><img class="alignnone size-full wp-image-376" src="../wp-content/uploads/2015/08/contact_5.jpg" alt="contact_5" width="120" height="120" /><a href="#">Orlando Office</a><br />
4686 E Van Buren, Ste. 100 Phoenix,<br />
AZ 85008<br />
(602) 840-8655<br />
info@zooka.io</p>

		</div> 
	</div> </div></div><div class="wpb_column vc_column_container vc_col-sm-4"><div class="wpb_wrapper">
	<div class="wpb_text_column wpb_content_element  contact_block">
		<div class="wpb_wrapper">
			<p><img class="alignnone size-full wp-image-374" src="../wp-content/uploads/2015/08/contact_3.jpg" alt="contact_3" width="120" height="120" /><a href="#">Orlando Office</a><br />
4686 E Van Buren, Ste. 100 Phoenix,<br />
AZ 85008<br />
(602) 840-8655<br />
info@zooka.io</p>

		</div> 
	</div> 
	<div class="wpb_text_column wpb_content_element  contact_block">
		<div class="wpb_wrapper">
			<p><img class="alignnone size-full wp-image-377" src="../wp-content/uploads/2015/08/contact_6.jpg" alt="contact_6" width="120" height="120" /><a href="#">Orlando Office</a><br />
4686 E Van Buren, Ste. 100 Phoenix,<br />
AZ 85008<br />
(602) 840-8655<br />
info@zooka.io</p>

		</div> 
	</div> </div></div></div>
													</div>
						<!-- .entry-content -->
					</div><!-- #post-## -->
												</div>
		</div>
			</div>
</div>

</div><!-- #content -->
	
@stop