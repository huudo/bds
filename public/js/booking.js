BOOK = {};



BOOK.data = {
	/*getcontry: function(callback){
		jQuery.ajax({
           	type: 'GET',
           	url: '/getcountry',
           	dataType: 'json',
           	success: function(data){
                console.log( data );
            },
            error: function(){
                console.log( 'lỗi' );
            }
        });
		(callback)?callback():'';
	}*/
}

BOOK.act = { 
	init: function(){
		// BOOK.data.getcontry();
		BOOK.act.eventCity();
		BOOK.act.eventChangeCity(); 

	},
	eventCity: function(){
		jQuery(".listcity").click(function(){
			var city    = jQuery(this).attr("city");
			var country = jQuery(this).attr("country");
			jQuery.ajax({
	           	type: 'GET',
	           	url: '/getHotel/'+city+'#'+Math.random(),
	           	dataType: 'json',
	           	success: function(data){ 
	                var row = " "; 
	                jQuery.each(data, function( index, value ) {
	                	row += '<li class="list-group-item"><input type="checkbox" class=""  /> '+value.name+'</li>';
	                });
	                jQuery("ul#list_hotel"+country).html(row);
	                console.log(row);
	            },
	            error: function(){
	                console.log( 'lỗi' );
	            }
	        });
		});
	},
	eventchangeCitySelected: function(op){
		op.click(function(){
			var city    = jQuery(this).attr("city");
			var country = jQuery(this).attr("country");
			jQuery.ajax({
	           	type: 'GET',
	           	url: '/getHotel/'+city+'#'+Math.random(),
	           	dataType: 'json',
	           	success: function(data){ 
	                var row = " "; 
	                jQuery.each(data, function( index, value ) {
	                	row += '<li class="list-group-item"><input type="checkbox" class=""  /> '+value.name+'</li>';
	                });
	                jQuery("ul#list_hotel"+country).html(row);
	                console.log(row);
	            },
	            error: function(){
	                console.log( 'lỗi' );
	            }
	        });
		});
	},
	eventChangeCity: function(){
		jQuery(".listcity").find("input").click(function(){
			var country = jQuery(this).attr("country");
			var city    = jQuery(this).attr("city");
			var input   = jQuery(this).parent().text();
			if( !jQuery("#city_chon"+city).attr('id')  ){
				jQuery("#hotel_select"+country).append('<li class="list-group-item" city="'+city+'" country="'+country+'" id="city_chon'+city+'">'+input+'</li>');
				BOOK.act.eventselectrow( jQuery('#city_chon'+city) ); 
				BOOK.act.eventchangeCitySelected( jQuery('#city_chon'+city) ); 
			}else{
				jQuery("#city_chon"+city).remove();
			}
		});
	},
	eventselectrow: function( op ){ 
		op.click(function(){
			BOOK.act.resetcheckbox( jQuery(this) ); 
			jQuery(this).addClass("active"); 
		}); 
	},
	resetcheckbox: function( op ){
		op = op.parent();//.parent();
		op.find("li.active").removeClass("active");
	}

}

jQuery(document).ready(function(){
	BOOK.act.init();
})