
<div class="modal fade place-form-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            {!! Form::open([ 'method'=>'POST', 'class'=>'form-horizontal', 'id'=>'place-form']) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">Đặt phòng</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Thông Khách sạn / Phòng</h4>
                        {!! fForm::groupText('Tên khách sạn (*)', 'hotel_name', null, ['disabled'], 12, 12) !!}
                        {!! fForm::groupText('Tên Phòng (*)', 'room_name', null, ['disabled'], 12, 12) !!}
                        <div class="row time_place">
                            <div class="col-sm-4">
                                {!! fForm::groupText('Thời gian đến', 'timein', date('d/m/Y'), ['class'=>'pickDateIn'], 12, 12) !!}
                            </div>
                            <div class="col-sm-4">
                                {!! fForm::groupText('Thời gian đi', 'timeout', (date('d')+1).'/'.date('m/Y'), ['class'=>'pickDateOut'], 12, 12) !!}
                            </div>
                            <div class="col-sm-4">
                                {!! fForm::groupText('Số đêm', 'numnights', 1, ['class' => 'numnights', 'readonly'=>'readonly'], 12, 12) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                {!! fForm::groupSelect('Số phòng (*)', 'numrooms', [1=>1, 2=>2, 3=>3], null, [], 12, 12) !!}
                            </div>
                            <div class="col-sm-4">
                                {!! fForm::groupSelect('Người lớn', 'numadults', [1=>1, 2=>2, 3=>3, 4=>4, 5=>5, 6=>6], null, [], 12, 12) !!}
                            </div>
                            <div class="col-sm-4">
                                {!! fForm::groupSelect('Trẻ em', 'numchilds', [0=>0,1=>1, 2=>2, 3=>3, 4=>4, 5=>5, 6=>6], null, [], 12, 12) !!}
                            </div>
                        </div>
                        {!! fForm::groupText('Giá Phòng', 'price_item', null, ['disabled'=>''], 12, 12) !!}
                        <div class="form-group">
                            <label class="col-sm-4">
                                <h4>Tổng tiền: </h4>
                            </label>
                            <div class="col-sm-8 total_room_price text-center">
                                <span>0</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <h4>Thông tin người đặt phòng</h4>
                        {!! fForm::groupText('Họ Tên (*)', 'fullname', null, ['required'], 12, 12) !!}
                        {!! fForm::groupText('Email (*)', 'email', null, ['required'], 12, 12) !!}
                        {!! fForm::groupText('Số điện thoại (*)', 'phone', null, ['required'], 12, 12) !!}
                        {!! fForm::groupText('Công ty', 'company', null, [], 12, 12) !!}
                        <div class="form-group row text-right">
                            <label class="col-sm-12">Xác nhận</label>
                            <div class="col-sm-12 text-right">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle-o"></i> {{'Đặt phòng'}}</button>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::hidden('hotel_id', null) !!}
                {!! Form::hidden('room_id', null) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<script>
    (function ($) {

        $('.pickDateIn').datepicker({
            dateFormat: 'dd/mm/yy',
            onSelect: function (date) {
                var timeout = $('body').find('.pickDateOut').val();
            }
        });
        $('.pickDateOut').datepicker({
            dateFormat: 'dd/mm/yy',
            onSelect: function (date) {
                var timein = $('body').find('.pickDateIn').val();
                var dayout = $.datepicker.parseDate('dd/mm/yy', date);
                var dayin = $.datepicker.parseDate('dd/mm/yy', timein);
                if(dayout>dayin){
                    $('.numnights').val(parseInt((dayout - dayin)/86400000));
                }else{
                    $('.numnights').val(0);
                    $(this).val(timein);
                }
            }
        });


    })(jQuery);
</script>