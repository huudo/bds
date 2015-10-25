<?php

define('ADMIN_PREFIX', 'admin');

//page

//Frontend
Route::get('tin_tuc',function(){
    return view('frontend.includes.news');
});

Route::get('contact',function(){
    return view('frontend.contact');
});
Route::get('trang_chu',function(){
    return view('frontend.index');
});
Route::get('dich_vu',function(){
    return view('frontend.our-services.index');
});
Route::get('thiet_ke_noi_that',function(){
    return view('frontend.our-project.index');
});

Route::get('bao_gia',function(){
    return view('frontend.our-services.bao_gia');
});
Route::get('project1',function(){
    return view('frontend.our-project.project1');
});
Route::get('/language/set-lang/{code}', ['as' => 'lang.setLang', 'uses' => 'LangController@setLang']);
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::post('/bookingtour', ['as' => 'bookingtour', 'uses' => 'BookingTourController@bookingtour']);
Route::post('/addvisa', ['as' => 'addvisa', 'uses' => 'BookingTourController@addvisa']);
Route::get('/getHotel/{city_id}', ['as' => 'getHotel', 'uses' => 'BookingTourController@getHotel']);
Route::post('/search-tour', ['as' => 'tours.search-tour', 'uses' => 'ToursController@search']);

Route::get('/{slug}/post-{id}', ['as' => 'post.show', 'uses' => 'PostController@show'])->where('id', '[0-9]+');
Route::get('/{slug}/services-{id}', ['as' => 'services.show', 'uses' => 'ServicesController@show'])->where('id', '[0-9]+');
Route::get('/{slug}/page-{id}', ['as' => 'page.show', 'uses' => 'PageController@show'])->where('id', '[0-9]+');
Route::get('/{slug}/cat-{id}', ['as' => 'cat.show', 'uses' => 'CatController@show'])->where('id', '[0-9]+');
Route::get('/{slug}/tag-{id}', ['as' => 'tag.show', 'uses' => 'TagController@show'])->where('id', '[0-9]+');
Route::get('/blogs', ['as' => 'post.all', 'uses' => 'PostController@index']);
Route::get('/tour/{id}/{slug}', ['as' => 'tours.show', 'uses' => 'Admin\ToursController@show'])->where('id', '[0-9]+');
Route::get('/booking-tour/{id}',['as' => 'tours.booking', 'uses' => 'Admin\ToursController@bookingTour'])->where('id', '[0-9]+');
Route::post('/booking-confirm/',['as' => 'tours.booking-confirm', 'uses' => 'Admin\ToursController@bookingConfirm']);

Route::get('/all-hotels', ['as' => 'hotel.all', 'uses' => 'HotelController@index']);
Route::get('/hotel-ft/{id}/{slug}', ['as' => 'hotel.show', 'uses' => 'HotelController@show'])->where('id', '[0-9]+');

Route::get(ADMIN_PREFIX . '/login', ['as' => 'admin.login', 'uses' => 'Admin\AdminController@getLogin']);
Route::post(ADMIN_PREFIX . '/postLogin', ['as' => 'admin.postLogin', 'uses' => 'Admin\AdminController@postLogin']);
Route::get(ADMIN_PREFIX . '/logout', ['as' => 'admin.getLogout', 'uses' => 'Admin\AdminController@getLogout']);
Route::get(ADMIN_PREFIX . '/lost-password', ['as' => 'admin.lostPassword', 'uses' => 'Admin\AdminController@lostPassword']);
Route::post(ADMIN_PREFIX . '/reset-password', ['as' => 'admin.resetPassword', 'uses' => 'Admin\AdminController@resetPassword']);

//Custom
Route::post('/contact', [
    'as' => 'contact.store',
    'uses' => 'ContactController@store'
]);

Route::group(['prefix' => ADMIN_PREFIX, 'namespace' => 'Admin', 'middleware' => 'login'], function() {


    //Setting Manage
    Route::post('setting/update', ['as' => 'admin.setting.update', 'uses' => 'SettingController@update']);
    Route::resource('setting', 'SettingController', ['except' => ['update']]);
//    Route::resource('setting', 'SettingController');

    Route::get('/', ['as' => 'admin', 'uses' => 'AdminController@index']);
    Route::get('/filemanager', ['as' => 'admin.filemanager', 'uses' => 'AdminController@filemanager']);

    //Language
    Route::get('/language/set-lang/{code}', ['as' => 'admin.lang.setLang', 'uses' => 'LangController@setLang']);
    Route::get('/language/{id}/delete', ['as' => 'admin.language.delete', 'uses' => 'LangController@destroy'])->where('id', '[0-9]+');
    Route::resource('language', 'LangController');
    Route::post('/language/massdel', ['as' => 'admin.language.massdel', 'uses' => 'LangController@massdel']);

    //Admin Menus
    Route::get('/admin_menu/{id}/delete', ['as' => 'admin.admin_menu.delete', 'uses' => 'AdminMenuController@destroy']);
    Route::resource('admin_menu', 'AdminMenuController');
    Route::post('/admin_menu/massdel', ['as' => 'admin.admin_menu.massdel', 'uses' => 'AdminMenuController@massdel']);
    Route::post('/admin_menu/updateOrder', ['as' => 'admin.admin_menu.updateOrder', 'uses' => 'AdminMenuController@updateOrder']);

    //Menu Group
    Route::get('/menu_group/{id}/delete', ['as' => 'admin.menu_group.delete', 'uses' => 'MenuGroupController@destroy'])->where('id', '[0-9]+');
    Route::resource('menu_group', 'MenuGroupController');
    Route::post('/menu_group/massdel', ['as' => 'admin.menu_group.massdel', 'uses' => 'MenuGroupController@massdel']);

    //Menu Item
    Route::group(['prefix' => 'menuitem'], function() {
        Route::get('/{group_id}/create', ['as' => 'admin.menu.create', 'uses' => 'MenuController@create'])->where('group_id', '[0-9]+');
        Route::post('/{group_id}/store', ['as' => 'admin.menu.store', 'uses' => 'MenuController@store'])->where('group_id', '[0-9]+');
        Route::get('/{id}/edit', ['as' => 'admin.menu.edit', 'uses' => 'MenuController@edit'])->where('id', '[0-9]+');
        Route::put('/{id}/update', ['as' => 'admin.menu.update', 'uses' => 'MenuController@update'])->where('id', '[0-9]+');
        Route::get('/{id}/delete', ['as' => 'admin.menu.delete', 'uses' => 'MenuController@destroy'])->where('id', '[0-9]+');
        Route::post('/massdel', ['as' => 'admin.menu.massdel', 'uses' => 'MenuController@massdel']);
        Route::post('/update-order', ['as' => 'admin.menu.updateOrder', 'uses' => 'MenuController@updateOrder']);
    });

    //User
    Route::get('/user/edit-profile', ['as' => 'admin.user.editProfile', 'uses' => 'UserController@editProfile']);
    Route::post('/user/update-profile', ['as' => 'admin.user.updateProfile', 'uses' => 'UserController@updateProfile']);
    Route::get('/user/{id}/delete', ['as' => 'admin.user.delete', 'uses' => 'UserController@destroy'])->where('id', '[0-9]+');
    Route::resource('user', 'UserController');
    Route::post('/user/massdel', ['as' => 'admin.user.massdel', 'uses' => 'UserController@massdel']);

    //UserGroup
    Route::get('/user_group/{id}/edit-role', ['as' => 'admin.user_group.editrole', 'uses' => 'GroupController@editRole'])->where('id', '[0-9]+');
    Route::put('/user_group/{id}/update-role', ['as' => 'admin.user_group.updaterole', 'uses' => 'GroupController@updateRole'])->where('id', '[0-9]+');
    Route::get('/user_group/{id}/delete', ['as' => 'admin.user_group.delete', 'uses' => 'GroupController@destroy'])->where('id', '[0-9]+');
    Route::resource('user_group', 'GroupController');
    Route::post('/user_group/massdel', ['as' => 'admin.user_group.massdel', 'uses' => 'GroupController@massdel']);

    //Post
    Route::get('/post/{id}/delete', ['as' => 'admin.post.delete', 'uses' => 'PostController@destroy'])->where('id', '[0-9]+');
    Route::resource('post', 'PostController');
    Route::post('/post/massdel', ['as' => 'admin.post.massdel', 'uses' => 'PostController@massdel']);

    //Page
    Route::get('page/{id}/delete', ['as' => 'admin.page.delete', 'uses' => 'PageController@destroy'])->where('id', '[0-9]+');
    Route::resource('page', 'PageController');
    Route::post('page/massdel', ['as' => 'admin.page.massdel', 'uses' => 'PageController@massdel']);

    //Services
    Route::get('/services/{id}/delete', ['as' => 'admin.services.delete', 'uses' => 'ServicesController@destroy'])->where('id', '[0-9]+');
    Route::resource('services', 'ServicesController');
    Route::post('/services/massdel', ['as' => 'admin.services.massdel', 'uses' => 'ServicesController@massdel']);

    //Category
    Route::get('/cat/{id}/delete', ['as' => 'admin.cat.delete', 'uses' => 'CatController@destroy'])->where('id', '[0-9]+');
    Route::resource('cat', 'CatController');
    Route::post('/cat/massdel', ['as' => 'admin.cat.massdel', 'uses' => 'CatController@massdel']);

    //Tag
    Route::get('/tag/{id}/delete', ['as' => 'admin.tag.delete', 'uses' => 'TagController@destroy'])->where('id', '[0-9]+');
    Route::resource('tag', 'TagController');
    Route::post('/tag/massdel', ['as' => 'admin.tag.massdel', 'uses' => 'TagController@massdel']);

    //Slider
    Route::get('/slider/{id}/delete', ['as' => 'admin.slider.delete', 'uses' => 'SliderController@destroy'])->where('id', '[0-9]+');
    Route::resource('slider', 'SliderController');
    Route::post('/slider/massdel', ['as' => 'admin.slider.massdel', 'uses' => 'SliderController@massdel']);

    //Slide Items
    Route::get('/slide/{id}/delete', ['as' => 'admin.slide.delete', 'uses' => 'SlideController@destroy'])->where('id', '[0-9]+');
    Route::resource('slide', 'SlideController');
    Route::post('/slide/massdel', ['as' => 'admin.slide.massdel', 'uses' => 'SlideController@massdel']);

    //Banner Group
    Route::get('/banner_group/{id}/delete', ['as' => 'admin.banner_group.delete', 'uses' => 'BannerGroupController@destroy'])->where('id', '[0-9]+');
    Route::resource('banner_group', 'BannerGroupController');
    Route::post('/banner_group/massdel', ['as' => 'admin.banner_group.massdel', 'uses' => 'BannerGroupController@massdel']);

    //Banner Items
    Route::get('/banner/{id}/delete', ['as' => 'admin.banner.delete', 'uses' => 'BannerController@destroy'])->where('id', '[0-9]+');
    Route::resource('banner', 'BannerController');
    Route::post('/banner/massdel', ['as' => 'admin.banner.massdel', 'uses' => 'BannerController@massdel']);

    //Options
    Route::get('/option/{id}/delete', ['as' => 'admin.option.delete', 'uses' => 'OptionController@destroy']);
    Route::post('/option/update-option', ['as' => 'admin.option.update', 'uses' => 'OptionController@update']);
    Route::resource('option', 'OptionController', ['except' => 'update']);
    Route::get('/option/massdel', ['as' => 'admin.option.massdel', 'uses' => 'OptionController@massdel']);

    //Subscribe
    Route::get('subscribe/{id}/delete', ['as' => 'admin.subs.delete', 'uses' => 'SubsController@destroy']);
    Route::resource('subs', 'SubsController');
    Route::post('subscribe/massdel', ['as' => 'admin.subs.massdel', 'uses' => 'SubsController@massdel']);

    //Status
    Route::get('status/{id}/delete', ['as' => 'admin.status.delete', 'uses' => 'StatusController@destroy'])->where('id', '[0-9]+');
    Route::resource('status', 'StatusController');
    Route::post('status/massdel', ['as' => 'admin.status.massdel', 'uses' => 'StatusController@massdel']);

    /*     * ************** ************** */
    //Tour Cat
    //Country
    Route::get('country/{id}/delete', ['as' => 'admin.country.delete', 'uses' => 'CountryController@destroy'])->where('id', '[0-9]+');
    Route::resource('country', 'CountryController');
    Route::post('country/massdel', ['as' => 'admin.country.massdel', 'uses' => 'CountryController@massdel']);

    //Province
    Route::get('/province/{id}/delete', ['as' => 'admin.province.delete', 'uses' => 'ProvinceController@destroy'])->where('id', '[0-9]+');
    Route::resource('province', 'ProvinceController');
    Route::post('/province/massdel', ['as' => 'admin.province.massdel', 'uses' => 'ProvinceController@massdel']);

    //Hotel
    Route::get('/hotel/{id}/delete', ['as' => 'admin.hotel.delete', 'uses' => 'HotelController@destroy'])->where('id', '[0-9]+');
    Route::resource('hotel', 'HotelController');
    Route::post('/hotel/massdel', ['as' => 'admin.hotel.massdel', 'uses' => 'HotelController@massdel']);

    //Roomtype
    Route::get('/roomtype/{id}/delete', ['as' => 'admin.roomtype.delete', 'uses' => 'RoomtypeController@destroy'])->where('id', '[0-9]+');
    Route::resource('roomtype', 'RoomtypeController');
    Route::post('/roomtype/massdel', ['as' => 'admin.roomtype.massdel', 'uses' => 'RoomtypeController@massdel']);

    //Roomtype
    Route::get('/room/{id}/delete', ['as' => 'admin.room.delete', 'uses' => 'RoomController@destroy'])->where('id', '[0-9]+');
    Route::resource('room', 'RoomController');
    Route::post('/room/massdel', ['as' => 'admin.room.massdel', 'uses' => 'RoomController@massdel']);

    //Tour cat
    Route::resource('tour-cat', 'TourcatController');
    Route::get('tour-cat/delete/{id}', ['as' => 'admin.tour-cat.delete', 'uses' => 'TourcatController@destroy']);
    Route::post('tour-cat/massdel', ['as' => 'admin.tour-cat.massdel', 'uses' => 'TourcatController@massdel']);

    //Tour
    Route::get('/listbooking_tour', 'ToursController@listBooking');
    Route::resource('tours', 'ToursController');
    Route::get('tours/delete/{id}', ['as' => 'admin.tours.delete', 'uses' => 'ToursController@destroy']);
    Route::post('tours/massdel', ['as' => 'admin.tours.massdel', 'uses' => 'ToursController@massdel']);

    //Hotel Convenient
    Route::get('/hotel-convenient/{id}/delete', ['as' => 'admin.hotelconv.delete', 'uses' => 'HotelConvController@destroy'])->where('id', '[0-9]+');
    Route::resource('hotelconv', 'HotelConvController');
    Route::post('/hotel-convenient/massdel', ['as' => 'admin.hotelconv.massdel', 'uses' => 'HotelConvController@massdel']);

    //Room Convenient
    Route::get('/room-convenient/{id}/delete', ['as' => 'admin.roomconv.delete', 'uses' => 'RoomConvController@destroy'])->where('id', '[0-9]+');
    Route::resource('roomconv', 'RoomConvController');
    Route::post('/room-convenient/massdel', ['as' => 'admin.roomconv.massdel', 'uses' => 'RoomConvController@massdel']);

    //Image Category
    Route::get('/imagecat/{id}/delete', ['as' => 'admin.imagecat.delete', 'uses' => 'ImageCatController@destroy'])->where('id', '[0-9]+');
    Route::resource('imagecat', 'ImageCatController');
    Route::post('/imagecat/massdel', ['as' => 'admin.imagecat.massdel', 'uses' => 'ImageCatController@massdel']);
    
    //Video Category
    Route::get('/videocat/{id}/delete', ['as' => 'admin.videocat.delete', 'uses' => 'VideoCatController@destroy'])->where('id', '[0-9]+');
    Route::resource('videocat', 'VideoCatController');
    Route::post('/videocat/massdel', ['as' => 'admin.videocat.massdel', 'uses' => 'VideoCatController@massdel']);
    
    //Custom
    //Contact
    Route::get('/contact/{id}/delete', ['as' => 'admin.contact.delete', 'uses' => 'ContactController@destroy'])->where('id', '[0-9]+');
    Route::resource('contact', 'ContactController');
    Route::post('/contact/massdel', ['as' => 'admin.contact.massdel', 'uses' => 'ContactController@massdel']);
    
    //Partner
    Route::get('/partner/{id}/delete', ['as' => 'admin.partner.delete', 'uses' => 'PartnerController@destroy'])->where('id', '[0-9]+');
    Route::resource('partner', 'PartnerController');
    Route::post('/partner/massdel', ['as' => 'admin.partner.massdel', 'uses' => 'PartnerController@massdel']);
});