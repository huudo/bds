 
<ul class="nav nav-tabs" id="myTab">
	<li><a href="#home">Tìm kiếm tour</a></li>
	<li  class="active"><a href="#profile">Đặt tour theo yêu cầu</a></li>
</ul>
 
<div class="tab-content tab-content-form-search">
	<div class="tab-pane box-book-content" id="home">
		{!! Form::open([
                            'method' => 'post',
                            'route' => 'tours.search-tour',
                            ]) !!}
			<div class="row">
				<div class="col-sm-12">
						<div class="col-sm-4 col-xs-6">
							<div class="form-group">
								<label for="start_place form-select">Nơi xuất phát</label>
								<select name="start_place" id="" class="form-control">
									<option selected="" value="3">Tp. Hồ Chí Minh</option>
									<option value="2">Hà Nội</option>
									<option value="9">Đà Nẵng</option>
									<option value="13">Huế</option>
								</select>
							</div>
						</div>
						<div class="col-sm-4 col-xs-6">
							<div class="form-group form-select">
								<label for="end_place">Điểm đến</label>
								<select name="end_place" id="" class="form-control">
									<option selected value="0">Chọn điểm đến</option>
									@foreach(place_out() as $place_o)
										<option value="{{ $place_o->id }}">{{ $place_o->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-sm-4 col-xs-6">
							<div class="form-group form-select">
								<label for="">Mức giá</label>
								<select name="price" id="" class="form-control">
									<option selected="" value="0">Tất cả</option>
									<option value="1">Dưới 3 triệu</option>
									<option value="2">3 - 7 triệu</option>
									<option value="3">7 - 12 triệu</option>
									<option value="4">12 - 15 triệu</option>
									<option value="5">15 - 20 triệu</option>
									<option value="6">20 - 30 triệu</option>
									<option value="7">Trên 30 triệu</option>
								</select>
							</div>
						</div>
						<div class="col-sm-4 col-xs-6">
							<div class="form-group form-text">
								<label for="">Ngày khởi hành từ</label>
								<input name="from-date" class="form-control datepicker " type="text" placeholder="Từ ngày">
							</div>
						</div>
						<div class="col-sm-4 col-xs-6">
							<div class="form-group form-text">
								<label for="">Đến ngày</label>
								<input name="to-date" class="form-control datepicker " type="text" placeholder="Đến ngày">
							</div>
						</div>
						<div class="col-sm-4 col-xs-6">
							<div class="form-group form-select">
								<label for="sale">Giảm giá</label>
								<select name="" id="" class="form-control">
									<option selected="" value="0">Tất cả</option>
									<option value="1">Có</option>
									<option value="1">Không</option>
								</select>
							</div>
						</div>
						<div class="col-sm-4 col-sm-offset-8">
							<button class="btn btn-at with-100">TÌM KIẾM</button>
						</div>
				</div>
			</div>
		{!! Form::close() !!}
	</div>
	<div class="tab-pane active box-book-content" id="profile">
		{!! Form::open(['method' => 'post', 'route'=>'bookingtour', 'class'=>'form-horizontal']) !!}
		<!-- <form action="/bookingtour"  method="post"> -->
			<div class="row">
				<div class="col-md-9">
					<ul class="row nav nav-tabs" id="tab_contries">
						<li class="active"><input type="checkbox" name="tour[vietnam][go]"/><a href="#vietnam" > VietNam</a></li>
						<li  ><input type="checkbox" name="tour[malay][go]"/><a href="#malay">Malaysia</a></li>
						<li  ><input type="checkbox" name="tour[phi][go]"/><a href="#phi">Philippin</a></li>
						<li  ><input type="checkbox"  name="tour[singapore][go]" /><a href="#singapore">Singapore</a></li>
					</ul>
					<div class="row tab-content tab-content-form-search">
						<div class="tab-pane active" id="vietnam">
							@include('frontend.data.4cottinh')
						</div>
						<div class="tab-pane" id="malay">
							@include('frontend.data.4cottinh2')
						</div>
						<div class="tab-pane" id="phi">
							@include('frontend.data.4cottinh3')
						</div>
						<div class="tab-pane" id="singapore">
							@include('frontend.data.4cottinh2')
						</div>
					</div>
				</div>
				<div class="col-md-3" id="info_pp">
					<label class="text-blue">Ngày đi</label>
					<input type="text" class="form-control date" />
					<label class="text-blue">Ngày về</label>
					<input type="text" class="form-control date" />
					<div class="form-inline">
						<div class="row">
							<div class="col-sm-6">
								<label class="text-blue">Người lớn</label>
							</div>
							<select class="form-control">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
								<option>6</option>
								<option>7</option>
							</select>
						</div>
					</div>
					<div class="form-inline">
						<div class="row">
							<div class="col-sm-6">
								<label class="text-blue">Trẻ em</label>
							</div>
							<select class="form-control">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
								<option>6</option>
								<option>7</option>
							</select>
						</div>
					</div>
					<div class="form-inline">
						<div class="row">
							<div class="col-sm-6">
								<label class="text-blue">Em bé</label>
							</div>
							<select class="form-control">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
								<option>6</option>
								<option>7</option>
							</select>
						</div>
					</div>
					<button style="margin-top: 10px" class="btn btn-at with-100">BOOK NOW</button>
				</div>
			</div>
		<!-- </form> -->
		{!! Form::close() !!}
	</div> 
</div> 