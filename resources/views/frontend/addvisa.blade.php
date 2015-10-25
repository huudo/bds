@extends('layouts.frontend')

@section('content')
<div>
	{!! Form::open(['method' => 'get', 'route'=>'home', 'class'=>'form-horizontal']) !!}
	<div class="container">
		<div class="col-md-12">	
			<h1>Giấy mời đến Việt Nam</h1>
		</div>
		<div class="col-sm-8">
			  <table>
			  	<thead>
			  		<tr>
			  			<th width="5%" >Stt</th>
			  			<th width="15%" class="text-center">Họ và tên</th>
			  			<th width="15%" class="text-center">Ngày sinh</th>
			  			<th width="10%" class="text-center">Giới tính</th>
			  			<th width="15%" class="text-center">Hộ chiếu</th>
			  			<th width="15%" class="text-center">Ngày hết hạn</th>
			  			<th width="15%" class="text-center">Loai visa</th>
			  		</tr>
			  	</thead>
			  	<tbody>
			  		<tr>
			  			<td> 1 </td>
			  			<td><input type="text" class="form-control" /></td>
			  			<td><input type="text" class="form-control" /></td>
			  			<td> 
			  				<select class="form-control">
			  					<option>Nam</option>	
			  					<option>Nữ</option>	
			  				</select> 
			  			</td>
			  			<td><input type="text" class="form-control" /></td>
			  			<td><input type="text" class="form-control" /></td>
			  			<td>
							<select class="form-control">
								<option>Dùng 1 lần</option>
								<option>Dùng 2 lần</option>
							</select>
			  			</td>
			  		</tr>

			  		<tr>
			  			<td> 2 </td>
			  			<td><input type="text" class="form-control" /></td>
			  			<td><input type="text" class="form-control" /></td>
			  			<td> 
			  				<select class="form-control">
			  					<option>Nam</option>	
			  					<option>Nữ</option>	
			  				</select> 
			  			</td>
			  			<td><input type="text" class="form-control" /></td>
			  			<td><input type="text" class="form-control" /></td>
			  			<td>
							<select class="form-control">
								<option>Dùng 1 lần</option>
								<option>Dùng 2 lần</option>
							</select>
			  			</td>
			  		</tr>

			  		<tr>
			  			<td> 3 </td>
			  			<td><input type="text" class="form-control" /></td>
			  			<td><input type="text" class="form-control" /></td>
			  			<td> 
			  				<select class="form-control">
			  					<option>Nam</option>	
			  					<option>Nữ</option>	
			  				</select> 
			  			</td>
			  			<td><input type="text" class="form-control" /></td>
			  			<td><input type="text" class="form-control" /></td>
			  			<td>
							<select class="form-control">
								<option>Dùng 1 lần</option>
								<option>Dùng 2 lần</option>
							</select>
			  			</td>
			  		</tr>

			  		<tr>
			  			<td> 4 </td>
			  			<td><input type="text" class="form-control" /></td>
			  			<td><input type="text" class="form-control" /></td>
			  			<td> 
			  				<select class="form-control">
			  					<option>Nam</option>	
			  					<option>Nữ</option>	
			  				</select> 
			  			</td>
			  			<td><input type="text" class="form-control" /></td>
			  			<td><input type="text" class="form-control" /></td>
			  			<td>
							<select class="form-control">
								<option>Dùng 1 lần</option>
								<option>Dùng 2 lần</option>
							</select>
			  			</td>
			  		</tr>
			  	</tbody>
			  </table>
		</div>

		<div class="col-sm-4 ">
			<!-- Payment -->
			<div class="row">
				<div class="panel panel-primary">
			  		<div class="panel-heading text-center">Tổng tiền</div>
	  				<div class="panel-body">
						<div class="row"> 
							<div class="col-sm-7">
								<label>Trước thuế</label>
							</div>
							<div class="col-sm-5 text-right">
							 	10,000,000
						 	</div> 
						</div> 
						
						<div class="row"> 
							<div class="col-sm-7">
								<label>VAT</label>
							</div>
							<div class="col-sm-5 text-right">
							 	1,000,000
						 	</div> 
						</div> 

						<div class="row"> 
							<div class="col-sm-7">
								<label>VISA</label>
							</div>
							<div class="col-sm-5 text-right">
							 	1,000,000
						 	</div> 
						</div> 

						<div class="row">
							<div class="col-md-12">
								<hr>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-5">
								<h3><label>Tổng</label> </h3>
							</div>
							<div class="col-sm-7 text-right">
								<h3>12,000,000</h3>
							</div>
						</div>

	  				</div>
	  			</div>
			</div> 

		</div>
 
			<div class="col-xs-8">
				<button class="btn btn-primary with-100"><strong>Hoàn thành<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span></strong> </button>
			</div> 
	</div>
	{!! Form::close() !!}
</div>
@stop

@section('head')
<script type="text/javascript">
	 
	 $(function() {
    $( "#list_races" ).sortable({
      revert: true
    });
    $( "#list_races" ).draggable({
      connectToSortable: "#list_races",
      helper: "clone",
      revert: "invalid"
    });
    $( "ul, li" ).disableSelection();
  });
</script>
<style type="text/css">
	select{
		padding: 0px  6px 0px 0px!important;
	}
</style>
@stop