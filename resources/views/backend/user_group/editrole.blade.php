@extends('layouts.backend')

@section('content')

{!! show_errors($errors) !!}

<div class="manage_user">
    {!! Form::model($item, ['method' => 'put', 'route'=>['admin.user_group.updaterole', $item->id], 'class'=>'form-horizontal']) !!}

    {!! fForm::groupText('Tên nhóm', 'name', null, ['required', 'disabled']) !!}
    <?php $permiss = unserialize($item->permission); ?>
    <div class="form-group row">
        <label class="col-sm-3">Danh sách quyền</label>
        <div class="col-sm-9">
            <div class="box-head">
                <div class="head-bar">
                    <label><input type="checkbox" class="item-all"> Chọn tất cả</label>
                </div>
            </div>
            <div class="role-box">
                <h3>Tài khoản</h3>
                <ul class="list-unstyled row">
                    <li class="col-sm-4"><label><input type="checkbox" class="item-role"  name="roles[]" value="list_users" <?php checkecho('list_users', $permiss) ?>> Xem Tài khoản</label></li>
                    <li class="col-sm-4"><label><input type="checkbox" class="item-role"  name="roles[]" value="create_users"  <?php checkecho('create_users', $permiss) ?>> Tạo Tài khoản</label></li>
                    <li class="col-sm-4"><label><input type="checkbox" class="item-role"  name="roles[]" value="edit_users"  <?php checkecho('edit_users', $permiss) ?>> Chỉnh sửa tài khoản</label></li>
                    <li class="col-sm-4"><label><input type="checkbox" class="item-role"  name="roles[]" value="edit_others_users"  <?php checkecho('edit_others_users', $permiss) ?>> Chỉnh sửa tài khoản khác</label></li>
                    <li class="col-sm-4"><label><input type="checkbox" class="item-role"  name="roles[]" value="delete_users"  <?php checkecho('delete_users', $permiss) ?>> Xóa tài khoản</label></li>
                    <li class="col-sm-4"><label><input type="checkbox" class="item-role"  name="roles[]" value="delete_others_users"  <?php checkecho('delete_others_users', $permiss) ?>> Xóa tài khoản khác</label></li>
                    <li class="col-sm-4"><label><input type="checkbox" class="item-role"  name="roles[]" value="edit_role_users"  <?php checkecho('edit_role_users', $permiss) ?>> Chỉnh sửa quyền tài khoản</label></li>
                </ul>
            </div>
            
            <div class="role-box">
                <h3>Quản lý chung</h3>
                <ul class="list-unstyled row">
                    <li class="col-sm-4"><label><input type="checkbox" class="item-role"  name="roles[]" value="manage_user_groups"  <?php checkecho('manage_user_groups', $permiss) ?>> Quản lý Nhóm tài khoản</label></li>
                    <li class="col-sm-4"><label><input type="checkbox" class="item-role"  name="roles[]" value="manage_admin_menus"  <?php checkecho('manage_admin_menus', $permiss) ?>> Quản lý Admin menu</label></li>
                    <li class="col-sm-4"><label><input type="checkbox" class="item-role"  name="roles[]" value="manage_languages"  <?php checkecho('manage_languages', $permiss) ?>> Quản lý Ngôn ngữ</label></li>
                    <li class="col-sm-4"><label><input type="checkbox" class="item-role"  name="roles[]" value="manage_menus"  <?php checkecho('manage_menus', $permiss) ?>> Quản lý Menu</label></li>
                    <li class="col-sm-4"><label><input type="checkbox" class="item-role"  name="roles[]" value="manage_sliders"  <?php checkecho('manage_sliders', $permiss) ?>> Quản lý Slider</label></li>
                    <li class="col-sm-4"><label><input type="checkbox" class="item-role"  name="roles[]" value="manage_banners"  <?php checkecho('manage_banners', $permiss) ?>> Quản lý Banner</label></li>
                    <li class="col-sm-4"><label><input type="checkbox" class="item-role"  name="roles[]" value="manage_customers"  <?php checkecho('manage_customers', $permiss) ?>> Quản lý Khách hàng</label></li>
                    <li class="col-sm-4"><label><input type="checkbox" class="item-role"  name="roles[]" value="manage_locations"  <?php checkecho('manage_locations', $permiss) ?>> Quản lý Địa điểm</label></li>
                </ul>
            </div>
            
            <div class="role-box">
                <h3>Danh mục</h3>
                <ul class="list-unstyled row">
                    <li class="col-sm-4"><label><input type="checkbox" class="item-role"  name="roles[]" value="list_cats"  <?php checkecho('list_cats', $permiss) ?>> Xem danh mục</label></li>
                    <li class="col-sm-4"><label><input type="checkbox" class="item-role"  name="roles[]" value="create_cats"  <?php checkecho('create_cats', $permiss) ?>> Tạo danh mục</label></li>
                    <li class="col-sm-4"><label><input type="checkbox" class="item-role"  name="roles[]" value="edit_cats"  <?php checkecho('edit_cats', $permiss) ?>> Chỉnh sửa danh mục</label></li>
                    <li class="col-sm-4"><label><input type="checkbox" class="item-role"  name="roles[]" value="delete_cats"  <?php checkecho('delete_cats', $permiss) ?>> Xóa danh mục</label></li>
                </ul>
            </div>
            <div class="role-box">
                <h3>Thẻ</h3>
                <ul class="list-unstyled row">
                    <li class="col-sm-4"><label><input type="checkbox" class="item-role"  name="roles[]" value="list_tags"  <?php checkecho('list_users', $permiss) ?>> Xem Thẻ</label></li>
                    <li class="col-sm-4"><label><input type="checkbox" class="item-role"  name="roles[]" value="create_tags"  <?php checkecho('list_users', $permiss) ?>> Tạo thẻ</label></li>
                    <li class="col-sm-4"><label><input type="checkbox" class="item-role"  name="roles[]" value="edit_tags"  <?php checkecho('list_users', $permiss) ?>> Chỉnh sửa thẻ</label></li>
                    <li class="col-sm-4"><label><input type="checkbox" class="item-role"  name="roles[]" value="delete_tags"  <?php checkecho('list_users', $permiss) ?>> Xóa thẻ</label></li>
                </ul>
            </div>
            <div class="role-box">
                <h3>Bài viết</h3>
                <ul class="list-unstyled row">
                    <li class="col-sm-4"><label><input type="checkbox" class="item-role"  name="roles[]" value="list_posts"  <?php checkecho('list_posts', $permiss) ?>> Xem bài viết</label></li>
                    <li class="col-sm-4"><label><input type="checkbox" class="item-role"  name="roles[]" value="create_posts"  <?php checkecho('create_posts', $permiss) ?>> Tạo bài viết</label></li>
                    <li class="col-sm-4"><label><input type="checkbox" class="item-role"  name="roles[]" value="edit_posts"  <?php checkecho('edit_posts', $permiss) ?>> Chỉnh sửa bài viết</label></li>
                    <li class="col-sm-4"><label><input type="checkbox" class="item-role"  name="roles[]" value="edit_others_posts"  <?php checkecho('edit_others_posts', $permiss) ?>> Chỉnh sửa bài viết khác</label></li>
                    <li class="col-sm-4"><label><input type="checkbox" class="item-role"  name="roles[]" value="delete_posts" <?php checkecho('delete_posts', $permiss) ?> > Xóa bài viết</label></li>
                    <li class="col-sm-4"><label><input type="checkbox" class="item-role"  name="roles[]" value="delete_others_posts"  <?php checkecho('delete_others_posts', $permiss) ?>> Xóa bài viết khác</label></li>
                </ul>
            </div>
            <div class="role-box">
                <h3>Trang</h3>
                <ul class="list-unstyled row">
                    <li class="col-sm-4"><label><input type="checkbox" class="item-role"  name="roles[]" value="list_pages" <?php checkecho('list_pages', $permiss) ?> > Xem trang</label></li>
                    <li class="col-sm-4"><label><input type="checkbox" class="item-role"  name="roles[]" value="create_pages"  <?php checkecho('create_pages', $permiss) ?>> Tạo trang</label></li>
                    <li class="col-sm-4"><label><input type="checkbox" class="item-role"  name="roles[]" value="edit_pages"  <?php checkecho('edit_pages', $permiss) ?>> Chỉnh sửa trang</label></li>
                    <li class="col-sm-4"><label><input type="checkbox" class="item-role"  name="roles[]" value="edit_others_pages" <?php checkecho('edit_others_pages', $permiss) ?> > Chỉnh sửa trang khác</label></li>
                    <li class="col-sm-4"><label><input type="checkbox" class="item-role"  name="roles[]" value="delete_pages"  <?php checkecho('delete_pages', $permiss) ?>> Xóa trang</label></li>
                    <li class="col-sm-4"><label><input type="checkbox" class="item-role"  name="roles[]" value="delete_others_pages" <?php checkecho('delete_others_pages', $permiss) ?> > Xóa trang khác</label></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-9 col-sm-offset-3">
            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Lưu lại</button>
            <a href="{{route('admin.user_group.index')}}" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Quay lại</a>
        </div>
    </div>

    {!! Form::close() !!}

    <script>
        (function ($) {
            $('.item-all').click(function () {
                if ($(this).is(':checked')) {
                    $('.item-role').prop('checked', true);
                } else {
                    $('.item-role').prop('checked', false);
                }
            });
            $('.checkitem').change(function () {
                if ($('.item-role:checked').size() === $('.item-role').size()) {
                    $('.item-all').prop('checked', true);
                } else {
                    $('.item-all').prop('checked', false);
                }
            });
        })(jQuery);
    </script>
</div>

@stop