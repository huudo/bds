<?php

namespace App\Facades\FormGroup;

use Form;

class FormGroup {

    public function addClass($args) {
        if (!empty($args) && array_key_exists('class', $args)) {
            $args['class'] .= ' form-control';
        } else {
            $args['class'] = 'form-control';
        }
        return $args;
    }

    public function groupText($label, $name, $value = null, $args = [], $col1 = 3, $col2 = 9) {
        ?>
        <div class="form-group row">
            <label class="col-sm-<?= $col1 ?>"><?php echo $label; ?></label>
            <div class="col-sm-<?= $col2 ?>">
                <?php echo Form::text($name, $value, $this->addClass($args)); ?>
            </div>
        </div>
        <?php
    }
    
    public function groupNumber($label, $name, $value = null, $args = [], $col1 = 3, $col2 = 9) {
        ?>
        <div class="form-group row">
            <label class="col-sm-<?= $col1 ?>"><?php echo $label; ?></label>
            <div class="col-sm-<?= $col2 ?>">
                <?php echo Form::number($name, $value, $this->addClass($args)); ?>
            </div>
        </div>
        <?php
    }

    public function groupPassword($label, $name, $args = [], $col1 = 3, $col2 = 9) {
        ?>
        <div class="form-group row">
            <label class="col-sm-<?= $col1 ?>"><?php echo $label; ?></label>
            <div class="col-sm-<?= $col2 ?>">
                <?php echo Form::password($name, $this->addClass($args)); ?>
            </div>
        </div>
        <?php
    }

    public function groupTextArea($label, $name, $value, $args = [], $col1 = 3, $col2 = 9) {
        ?>
        <div class="form-group row">
            <label class="col-sm-<?= $col1 ?>"><?php echo $label; ?></label>
            <div class="col-sm-<?= $col2 ?>">
                <?php echo Form::textarea($name, $value, $this->addClass($args)); ?>
            </div>
        </div>
        <?php
    }

    public function groupSelect($label, $name, $lists, $value, $args = [], $col1 = 3, $col2 = 9) {
        ?>
        <div class="form-group row">
            <label class="col-sm-<?= $col1 ?>"><?php echo $label; ?></label>
            <div class="col-sm-<?= $col2 ?>">
                <?php echo Form::select($name, $lists, $value, $this->addClass($args)); ?>
            </div>
        </div>
        <?php
    }

    public function groupSubmit($value, $args = [], $col1 = 3, $col2 = 9) {
        if (!empty($args) && array_key_exists('class', $args)) {
            $args['class'] .= ' btn';
        } else {
            $args['class'] = 'btn';
        }
        ?>
        <div class="form-group row">
            <div class="col-sm-<?= $col2 ?> col-sm-offset-<?= $col1 ?>">
                <?php echo Form::submit($value, $args); ?>
            </div>
        </div>
        <?php
    }

    public function boxImage($image = null, $col1 = 3, $col2 = 9) {
        $image = ($image) ? $image : old('image');
        ?>
        <div class="form-group row">
            <?php echo Form::label('thumbnail_id', 'Ảnh', ['class' => 'control-label col-sm-' . $col1]); ?>
            <div class="col-sm-<?= $col2 ?>">
                <?php echo Form::hidden('', csrf_token(), ['id' => 'post_token']); ?>
                <div class="media-choose">

                    <?php echo Form::hidden('image', $image, ['class' => 'media-url']); ?>
                    <img src="<?= $image ?>" class="media-image img-responsive" alt="Hình ảnh" />

                    <a type="button" href="#" data-href="<?php echo route('file.dialog', ['media-url', 'media-image']); ?>" class="media-select" data-toggle="modal" data-target="#popupModal">Thêm ảnh đại diện</a>
                </div>
            </div>
        </div>
        <?php
    }

    public function groupColor($label, $name, $value = null, $args = [], $col1 = 3, $col2 = 9) {
        ?>
        <div class="form-group row">
            <label class="col-sm-<?= $col1 ?>"><?php echo $label; ?></label>
            <div class="col-sm-<?= $col2 ?>">
                <?php echo Form::input('color', $name, $value, $this->addClass($args)); ?>
            </div>
        </div>
        <?php
    }

    public function groupGalleries($images = null) {
        ?>
        <div class=" box-gallery">
            <label class="control-label">Thư viện ảnh</label>
            <input type="hidden" id="temp_images" >
            <div class="box-galleries">
                <?php
                if ($images != null) {
                    foreach ($images as $image) {
                        ?>
                        <div class="image alert alert-dismissable fade in" role="alert">
                            <button class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
                            <img src="<?php echo $image; ?>" />
                            <input type="hidden" name="image_ids[]" value="<?php echo $image ?>" />
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <a href="javascript:void()" data-href="/plugin/filemanager/dialog.php?type=1&field_id=temp_images" class="media-select" data-toggle="modal" data-target="#popupModal">Thêm ảnh</a>      
        </div>
        <?php
    }

    public function groupCheckBox($name, $lists, $values = null, $col1 = 12, $col2 = 12) {
        if ($lists) {
            foreach ($lists as $item) {
                ?>
                <div><label><input type="checkbox" name="{{$name}}" value="{{$item->id}}" /> {{$item->name}}</label></div>
                <?php
            }
        }
    }

    public function groupUpload($image = null, $col1 = 3, $col2 = 9) {
        $image = ($image) ? $image : old('image');
        ?>
        <div class="form-group row">
            <?php echo Form::label('thumbnail_id', 'Hình ảnh', ['class' => ' col-sm-' . $col1]); ?>
            <div class="col-sm-<?= $col2 ?>">
                <div class="media-choose">
                    <?php echo Form::hidden('image', $image, ['id' => 'media-url']); ?>
                    <img src="<?= $image ?>" class="media-image img-responsive" alt=" " />
                    <a href="#" data-href="/plugin/filemanager/dialog.php?type=1&field_id=media-url" class="media-select" data-toggle="modal" data-target="#popupModal">Thêm ảnh đại diện</a>
                    <a href="#" class="media-delete pull-right" style="">Xóa</a>
                </div>
            </div>
        </div>
        <?php
    }

}
