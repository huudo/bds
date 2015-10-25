@extends('layouts.frontend')

@section('content')
<div>
	{!! Form::open(['method' => 'post', 'route'=>'addvisa', 'class'=>'form-horizontal']) !!}
	<div class="container">
		<div class="col-md-12">	
			<h1>Thông tin chi tiết đơn đặng Tour</h1>
		</div>
		<div class="col-sm-8">
			<!-- list country -->
			<div class="panel-group" id="listcountry">
				<div class="panel panel-primary">
			      	<div class="panel-heading">
				        <h4 class="panel-title">
				          	<a data-toggle="collapse" data-parent="#listcountry" href="#vietnam">
				          		Viet Nam
				          	</a>
				        </h4>
			      	</div>
			      	<div id="vietnam" class="panel-collapse collapse in">
			        	<div class="panel-body">

				<!-- <div class="panel panel-primary">
				  	<div class="panel-heading">
				  		Viet Nam
				  	</div>
					  			<div class="panel-body"> -->
				    	<!-- Start Accordion -->
				    	<div class="panel-group" id="accordion">
						    <!-- Start ctity -->
						    <div class="panel panel-default">
						      <div class="panel-heading">
						        <h4 class="panel-title">
						          	<a data-toggle="collapse" data-parent="#accordion" href="#hanoi">
						          		<div class="row">
							          		<div class="col-sm-6">Hà nội</div>
							          		<div class="col-sm-6 text-right padding-right28">2,000,000</div>
						          		</div>
						          	</a>
						        </h4>
						      </div>
						      <div id="hanoi" class="panel-collapse collapse in">
						        <div class="panel-body">
									<div class="panel-group" id="hanoiaccordion">
						        	<div class="panel panel-info">
								      	<div class="panel-heading">
									        <h4 class="panel-title">
									          	<a data-toggle="collapse" data-parent="#hanoiaccordion" href="#Sakura1">
									          		<div class="row">
										          		<div class="col-sm-6">
										          			<span class="glyphicon glyphicon-home" aria-hidden="true"></span>	
										          			Sakura1 hotel
										          		</div>
										          		<div class="col-sm-6 text-right padding-right28">2,000,000</div>
									          		</div>
									          	</a>
									        </h4>
								      	</div>
								      	<div id="Sakura1" class="panel-collapse collapse in">
								        	<div class="panel-body">
								        		<div class="col-md-12">
								        			<div class="col-sm-3 text-center"><label>Ngày đi</label></div>
								        			<div class="col-sm-3">
								        				<input type="text"   class="form-control date"  /> 
								        			</div>
								        			<div class="col-sm-3 text-center"><label>Ngày đến</label></div>
								        			<div class="col-sm-3"><input type="text"   class="form-control date"   /></div>
								        		</div>
								        		<table>
													<thead>
														<tr>
															<th width="30%">Room type</th>
															<th width="10%">Number</th>
															<th width="30%" class="text-center">Extra bed</th>
															<th width="30%" class="text-center">Have Breakfast</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>
																<input type="text" value="VIP" class="form-control" readonly="" />	
															</td>
															<td>
																<input type="number"   min="0" class="form-control" />	
															</td>
															<td>
																<!-- <input type="number"  min="0" class="form-control" />	 -->
																<div class="input-group"> 
																  <input type="number"  min="0" class="form-control" placeholder="Số lượng" aria-describedby="basic-addon1">
																  <span class="input-group-addon" id="basic-addon1">
																		<span class="glyphicon glyphicon-user" aria-hidden="true"></span>	
																  	</span>
																</div>
															</td>
															<td> 
																<div class="input-group"> 
																  <input type="number"  min="0" class="form-control" placeholder="Số lượng" aria-describedby="basic-addon1">
																  <span class="input-group-addon" id="basic-addon1">
																		<span class="glyphicon glyphicon-user" aria-hidden="true"></span>	
																  	</span>
																</div>
															</td> 
														</tr>
														<tr>
															<td>
																<input type="text" value="TWIN" class="form-control" readonly="" />	
															</td>
															<td>
																<input type="number"   min="0" class="form-control" />	
															</td>
															<td>
																<!-- <input type="number"  min="0" class="form-control" />	 -->
																<div class="input-group"> 
																  	<input type="number"  min="0" class="form-control" placeholder="Số lượng" aria-describedby="basic-addon1">
																  	<span class="input-group-addon" id="basic-addon1">
																		<span class="glyphicon glyphicon-user" aria-hidden="true"></span>		
																  	</span>
																</div>
															</td>
															<td> 
																<div class="input-group"> 
																  	<input type="number"  min="0" class="form-control" placeholder="Số lượng" aria-describedby="basic-addon1">
																  	<span class="input-group-addon" id="basic-addon1">
																		<span class="glyphicon glyphicon-user" aria-hidden="true"></span>	
																  	</span>
																</div>
															</td>  
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<!-- end hotel -->
									

									<!-- start hotel -->
									<div class="panel panel-info">
								      	<div class="panel-heading">
									        <h4 class="panel-title">
									          	<a data-toggle="collapse" data-parent="#hanoiaccordion" href="#Sakura2">
									          		<div class="row">
										          		<div class="col-sm-6">
										          			<span class="glyphicon glyphicon-home" aria-hidden="true"></span>	
										          			Sakura2 hotel
										          		</div>
										          		<div class="col-sm-6 text-right padding-right28">2,000,000</div>
									          		</div>
									          	</a>
									        </h4>
								      	</div>
								      	<div id="Sakura2" class="panel-collapse collapse">
								        	<div class="panel-body">
								        		<div class="col-md-12">
								        			<div class="col-sm-3 text-center"><label>Ngày đi</label></div>
								        			<div class="col-sm-3">
								        				<input type="text"   class="form-control date"  /> 
								        			</div>
								        			<div class="col-sm-3 text-center"><label>Ngày đến</label></div>
								        			<div class="col-sm-3"><input type="text"   class="form-control date"   /></div>
								        		</div>
								        		<table>
													<thead>
														<tr>
															<th width="30%">Room type</th>
															<th width="10%">Number</th>
															<th width="30%" class="text-center">Extra bed</th>
															<th width="30%" class="text-center">Have Breakfast</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>
																<input type="text" value="VIP" class="form-control" readonly="" />	
															</td>
															<td>
																<input type="number"   min="0" class="form-control" />	
															</td>
															<td>
																<!-- <input type="number"  min="0" class="form-control" />	 -->
																<div class="input-group"> 
																  <input type="number"  min="0" class="form-control" placeholder="Số lượng" aria-describedby="basic-addon1">
																  <span class="input-group-addon" id="basic-addon1">
																		<span class="glyphicon glyphicon-user" aria-hidden="true"></span>	
																  	</span>
																</div>
															</td>
															<td> 
																<div class="input-group"> 
																  <input type="number"  min="0" class="form-control" placeholder="Số lượng" aria-describedby="basic-addon1">
																  <span class="input-group-addon" id="basic-addon1">
																		<span class="glyphicon glyphicon-user" aria-hidden="true"></span>	
																  	</span>
																</div>
															</td> 
														</tr>
														<tr>
															<td>
																<input type="text" value="TWIN" class="form-control" readonly="" />	
															</td>
															<td>
																<input type="number"   min="0" class="form-control" />	
															</td>
															<td>
																<!-- <input type="number"  min="0" class="form-control" />	 -->
																<div class="input-group"> 
																  	<input type="number"  min="0" class="form-control" placeholder="Số lượng" aria-describedby="basic-addon1">
																  	<span class="input-group-addon" id="basic-addon1">
																		<span class="glyphicon glyphicon-user" aria-hidden="true"></span>		
																  	</span>
																</div>
															</td>
															<td> 
																<div class="input-group"> 
																  	<input type="number"  min="0" class="form-control" placeholder="Số lượng" aria-describedby="basic-addon1">
																  	<span class="input-group-addon" id="basic-addon1">
																		<span class="glyphicon glyphicon-user" aria-hidden="true"></span>	
																  	</span>
																</div>
															</td>  
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<!-- end hotel -->
									</div>
									<div class="row">
										<div class="col-md-12">
											<label>Danh sách tour</label>
										</div>
									</div>	
									<div class="row">
										<div class="col-sm-6 col-md-4">
									        <div class="thumbnail">
									          <!-- <img data-src="holder.js/100%x200" alt="100%x200" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTRmZDY5ZWE0N2IgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMnB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNGZkNjllYTQ3YiI+PHJlY3Qgd2lkdGg9IjI0MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI4OS44NTkzNzUiIHk9IjEwNS4xIj4yNDJ4MjAwPC90ZXh0PjwvZz48L2c+PC9zdmc+" data-holder-rendered="true" style="height: 200px; width: 100%; display: block;"> -->
									            <span><input type="checkbox"  /> Tham quan lăng bác</span>
									            <p class="color-red">1,000,000</p> 
									        </div>
								      	</div>
								      	<div class="col-sm-6 col-md-4">
									        <div class="thumbnail">
									          <!-- <img data-src="holder.js/100%x200" alt="100%x200" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTRmZDY5ZWE0N2IgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMnB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNGZkNjllYTQ3YiI+PHJlY3Qgd2lkdGg9IjI0MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI4OS44NTkzNzUiIHk9IjEwNS4xIj4yNDJ4MjAwPC90ZXh0PjwvZz48L2c+PC9zdmc+" data-holder-rendered="true" style="height: 200px; width: 100%; display: block;"> -->
									            <span><input type="checkbox"  /> Tham quan lăng bác</span>
									            <p class="color-red">1,000,000</p> 
									        </div>
								      	</div>
										<div class="col-sm-6 col-md-4">
									        <div class="thumbnail">
									          <!-- <img data-src="holder.js/100%x200" alt="100%x200" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTRmZDY5ZWE0N2IgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMnB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNGZkNjllYTQ3YiI+PHJlY3Qgd2lkdGg9IjI0MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI4OS44NTkzNzUiIHk9IjEwNS4xIj4yNDJ4MjAwPC90ZXh0PjwvZz48L2c+PC9zdmc+" data-holder-rendered="true" style="height: 200px; width: 100%; display: block;"> -->
									            <span><input type="checkbox"  /> Tham quan lăng bác</span>
									            <p class="color-red">1,000,000</p> 
									        </div>
								      	</div>
									</div>
						        </div>
						      </div>
						    </div>
						    <!-- End ctity -->
							
							<!-- Start ctity -->
						    <div class="panel panel-default">
						      <div class="panel-heading">
						        <h4 class="panel-title">
						          	<a data-toggle="collapse" data-parent="#accordion" href="#danang">
						          		<div class="row">
							          		<div class="col-sm-6">Đà Nẵng</div>
							          		<div class="col-sm-6 text-right padding-right28">2,000,000</div>
						          		</div>
						          	</a>
						        </h4>
						      </div>
						      <div id="danang" class="panel-collapse collapse ">
						        <div class="panel-body">
									<div class="panel-group" id="danangccordion">
						        	<div class="panel panel-info">
								      	<div class="panel-heading">
									        <h4 class="panel-title">
									          	<a data-toggle="collapse" data-parent="#danangccordion" href="#eden1">
									          		<div class="row">
										          		<div class="col-sm-6">
										          			<span class="glyphicon glyphicon-home" aria-hidden="true"></span>	
										          			Eden hotel
										          		</div>
										          		<div class="col-sm-6 text-right padding-right28">2,000,000</div>
									          		</div>
									          	</a>
									        </h4>
								      	</div>
								      	<div id="eden1" class="panel-collapse collapse in">
								        	<div class="panel-body">
								        		<div class="col-md-12">
								        			<div class="col-sm-3 text-center"><label>Ngày đi</label></div>
								        			<div class="col-sm-3">
								        				<input type="text"   class="form-control date"  /> 
								        			</div>
								        			<div class="col-sm-3 text-center"><label>Ngày đến</label></div>
								        			<div class="col-sm-3"><input type="text"   class="form-control date"   /></div>
								        		</div>
								        		<table>
													<thead>
														<tr>
															<th width="30%">Room type</th>
															<th width="10%">Number</th>
															<th width="30%" class="text-center">Extra bed</th>
															<th width="30%" class="text-center">Have Breakfast</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>
																<input type="text" value="VIP" class="form-control" readonly="" />	
															</td>
															<td>
																<input type="number"   min="0" class="form-control" />	
															</td>
															<td>
																<!-- <input type="number"  min="0" class="form-control" />	 -->
																<div class="input-group"> 
																  <input type="number"  min="0" class="form-control" placeholder="Số lượng" aria-describedby="basic-addon1">
																  <span class="input-group-addon" id="basic-addon1">
																		<span class="glyphicon glyphicon-user" aria-hidden="true"></span>	
																  	</span>
																</div>
															</td>
															<td> 
																<div class="input-group"> 
																  <input type="number"  min="0" class="form-control" placeholder="Số lượng" aria-describedby="basic-addon1">
																  <span class="input-group-addon" id="basic-addon1">
																		<span class="glyphicon glyphicon-user" aria-hidden="true"></span>	
																  	</span>
																</div>
															</td> 
														</tr>
														<tr>
															<td>
																<input type="text" value="TWIN" class="form-control" readonly="" />	
															</td>
															<td>
																<input type="number"   min="0" class="form-control" />	
															</td>
															<td>
																<!-- <input type="number"  min="0" class="form-control" />	 -->
																<div class="input-group"> 
																  	<input type="number"  min="0" class="form-control" placeholder="Số lượng" aria-describedby="basic-addon1">
																  	<span class="input-group-addon" id="basic-addon1">
																		<span class="glyphicon glyphicon-user" aria-hidden="true"></span>		
																  	</span>
																</div>
															</td>
															<td> 
																<div class="input-group"> 
																  	<input type="number"  min="0" class="form-control" placeholder="Số lượng" aria-describedby="basic-addon1">
																  	<span class="input-group-addon" id="basic-addon1">
																		<span class="glyphicon glyphicon-user" aria-hidden="true"></span>	
																  	</span>
																</div>
															</td>  
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<!-- end hotel -->
									

									<!-- start hotel -->
									<div class="panel panel-info">
								      	<div class="panel-heading">
									        <h4 class="panel-title">
									          	<a data-toggle="collapse" data-parent="#danangccordion" href="#eden2">
									          		<div class="row">
										          		<div class="col-sm-6">
										          			<span class="glyphicon glyphicon-home" aria-hidden="true"></span>	
										          			Eden2 hotel
										          		</div>
										          		<div class="col-sm-6 text-right padding-right28">2,000,000</div>
									          		</div>
									          	</a>
									        </h4>
								      	</div>
								      	<div id="eden2" class="panel-collapse collapse">
								        	<div class="panel-body">
								        		<div class="col-md-12">
								        			<div class="col-sm-3 text-center"><label>Ngày đi</label></div>
								        			<div class="col-sm-3">
								        				<input type="text"   class="form-control date"  /> 
								        			</div>
								        			<div class="col-sm-3 text-center"><label>Ngày đến</label></div>
								        			<div class="col-sm-3"><input type="text"   class="form-control date"   /></div>
								        		</div>
								        		<table>
													<thead>
														<tr>
															<th width="30%">Room type</th>
															<th width="10%">Number</th>
															<th width="30%" class="text-center">Extra bed</th>
															<th width="30%" class="text-center">Have Breakfast</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>
																<input type="text" value="VIP" class="form-control" readonly="" />	
															</td>
															<td>
																<input type="number"   min="0" class="form-control" />	
															</td>
															<td>
																<!-- <input type="number"  min="0" class="form-control" />	 -->
																<div class="input-group"> 
																  <input type="number"  min="0" class="form-control" placeholder="Số lượng" aria-describedby="basic-addon1">
																  <span class="input-group-addon" id="basic-addon1">
																		<span class="glyphicon glyphicon-user" aria-hidden="true"></span>	
																  	</span>
																</div>
															</td>
															<td> 
																<div class="input-group"> 
																  <input type="number"  min="0" class="form-control" placeholder="Số lượng" aria-describedby="basic-addon1">
																  <span class="input-group-addon" id="basic-addon1">
																		<span class="glyphicon glyphicon-user" aria-hidden="true"></span>	
																  	</span>
																</div>
															</td> 
														</tr>
														<tr>
															<td>
																<input type="text" value="TWIN" class="form-control" readonly="" />	
															</td>
															<td>
																<input type="number"   min="0" class="form-control" />	
															</td>
															<td>
																<!-- <input type="number"  min="0" class="form-control" />	 -->
																<div class="input-group"> 
																  	<input type="number"  min="0" class="form-control" placeholder="Số lượng" aria-describedby="basic-addon1">
																  	<span class="input-group-addon" id="basic-addon1">
																		<span class="glyphicon glyphicon-user" aria-hidden="true"></span>		
																  	</span>
																</div>
															</td>
															<td> 
																<div class="input-group"> 
																  	<input type="number"  min="0" class="form-control" placeholder="Số lượng" aria-describedby="basic-addon1">
																  	<span class="input-group-addon" id="basic-addon1">
																		<span class="glyphicon glyphicon-user" aria-hidden="true"></span>	
																  	</span>
																</div>
															</td>  
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<!-- end hotel -->
									</div>

						        </div>
						      </div>
						    </div>
						    <!-- End ctity -->
	 						 
					  	</div> 
						<!-- end Accordion -->
				  	</div>
				  	<!-- <div class="panel-footer">Panel footer</div> -->
				</div>
			</div>
			<!-- end country -->
			

			<div class="panel panel-primary">
		      	<div class="panel-heading">
			        <h4 class="panel-title">
			          	<a data-toggle="collapse" data-parent="#listcountry" href="#singapore">
			          		Singapore
			          	</a>
			        </h4>
		      	</div>
		      	<div id="singapore" class="panel-collapse collapse">
		        	<div class="panel-body">

			<!-- <div class="panel panel-primary">
			  	<div class="panel-heading">
			  		Singapore
			  	</div>
				  			<div class="panel-body"> -->
			    	<!-- Start Accordion -->
			    	<div class="panel-group" id="singaporeaccordion">
					    <!-- Start ctity -->
					    <div class="panel panel-default">
					      <div class="panel-heading">
					        <h4 class="panel-title">
					          	<a data-toggle="collapse" data-parent="#singaporeaccordion" href="#collapse22">
					          		<div class="row">
						          		<div class="col-sm-6">Singapore - Sakura hotel</div>
						          		<div class="col-sm-6 text-right">2,000,000</div>
					          		</div>
					          	</a>
					        </h4>
					      </div>
					      <div id="collapse22" class="panel-collapse collapse in">
					        <div class="panel-body">
								<table>
									<thead>
										<tr>
											<th width="30%">Room type</th>
											<th width="10%">Number</th>
											<th width="30%" class="text-center">Extra bed</th>
											<th width="30%" class="text-center">Have Breakfast</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<input type="text" value="VIP" class="form-control" readonly="" />	
											</td>
											<td>
												<input type="number"   min="0" class="form-control" />	
											</td>
											<td>
												<input type="number"  min="0"  class="form-control checkbox" />	
											</td>
											<td>
												<input type="number"  min="0" class="form-control checkbox" />	
											</td> 
										</tr>
										<tr>
											<td>
												<input type="text" value="TWIN" class="form-control" readonly="" />	
											</td>
											<td>
												<input type="number"   min="0" class="form-control" />	
											</td>
											<td>
												<input type="number"  min="0"  class="form-control checkbox" />	
											</td>
											<td>
												<input type="number"  min="0" class="form-control checkbox" />	
											</td> 
										</tr>
									</tbody>
								</table>
								<div class="row">
									<div class="col-md-12">
										Danh sách tour
									</div>
								</div>	
								<div class="row">
									<div class="col-sm-6 col-md-4">
								        <div class="thumbnail">
								          <!-- <img data-src="holder.js/100%x200" alt="100%x200" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTRmZDY5ZWE0N2IgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMnB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNGZkNjllYTQ3YiI+PHJlY3Qgd2lkdGg9IjI0MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI4OS44NTkzNzUiIHk9IjEwNS4xIj4yNDJ4MjAwPC90ZXh0PjwvZz48L2c+PC9zdmc+" data-holder-rendered="true" style="height: 200px; width: 100%; display: block;"> -->
								            <span><input type="checkbox"  /> Tham quan lăng bác</span>
								            <p class="color-red">1,000,000</p> 
								        </div>
							      	</div>
							      	<div class="col-sm-6 col-md-4">
								        <div class="thumbnail">
								          <!-- <img data-src="holder.js/100%x200" alt="100%x200" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTRmZDY5ZWE0N2IgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMnB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNGZkNjllYTQ3YiI+PHJlY3Qgd2lkdGg9IjI0MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI4OS44NTkzNzUiIHk9IjEwNS4xIj4yNDJ4MjAwPC90ZXh0PjwvZz48L2c+PC9zdmc+" data-holder-rendered="true" style="height: 200px; width: 100%; display: block;"> -->
								            <span><input type="checkbox"  /> Tham quan lăng bác</span>
								            <p class="color-red">1,000,000</p> 
								        </div>
							      	</div>
									<div class="col-sm-6 col-md-4">
								        <div class="thumbnail">
								          <!-- <img data-src="holder.js/100%x200" alt="100%x200" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTRmZDY5ZWE0N2IgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMnB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNGZkNjllYTQ3YiI+PHJlY3Qgd2lkdGg9IjI0MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI4OS44NTkzNzUiIHk9IjEwNS4xIj4yNDJ4MjAwPC90ZXh0PjwvZz48L2c+PC9zdmc+" data-holder-rendered="true" style="height: 200px; width: 100%; display: block;"> -->
								            <span><input type="checkbox"  /> Tham quan lăng bác</span>
								            <p class="color-red">1,000,000</p> 
								        </div>
							      	</div>
								</div>
					        </div>
					      </div>
					    </div>
					    <!-- End ctity -->
						
						<!-- Start ctity -->
					    <div class="panel panel-default">
					      <div class="panel-heading">
					        <h4 class="panel-title">
					          	<a data-toggle="collapse" data-parent="#singaporeaccordion" href="#collapse33">
					          		<div class="row">
						          		<div class="col-sm-6">Singapore2 - Eden hotel</div>
						          		<div class="col-sm-6 text-right">2,000,000</div>
					          		</div>
					          	</a>
					        </h4>
					      </div>
					      <div id="collapse33" class="panel-collapse collapse ">
					        <div class="panel-body">
								<table>
									<thead>
										<tr>
											<th width="30%">Room type</th>
											<th width="10%">Number</th>
											<th width="30%" class="text-center">Extra bed</th>
											<th width="30%" class="text-center">Have Breakfast</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<input type="text" value="VIP" class="form-control" readonly="" />	
											</td>
											<td>
												<input type="number"  min="0"  class="form-control" />	
											</td>
											<td>
												<input type="number"  min="0"  class="form-control  " />	
											</td>
											<td>
												<input type="number"  min="0" class="form-control  " />	
											</td> 
										</tr>
										<tr>
											<td>
												<input type="text" value="TWIN" class="form-control" readonly="" />	
											</td>
											<td>
												<input type="number"   min="0" class="form-control" />	
											</td>
											<td>
												<input type="number"  min="0"  class="form-control  " />	
											</td>
											<td>
												<input type="number"  min="0" class="form-control  " />	
											</td> 
										</tr>
									</tbody>
								</table>
					        </div>
					      </div>
					    </div>
					    <!-- End ctity -->
 						 
				  	</div> 
					<!-- end Accordion -->
			  	</div>
			  	<!-- <div class="panel-footer">Panel footer</div> -->
			</div>
				<!-- List races -->
			</div>
			</div>


			<div class="row">
				<div class="col-md-12">
				<div class="panel panel-primary">
			  		<div class="panel-heading text-center">Lịch trình</div>
	  				<div class="panel-body">
	  					<div class="row">
	  						<div class="col-md-12">
		  						<table>
		  							<tbody>
		  								<tr>
		  									<td colspan="3"><label>Chọn phương tiện</label></td>
		  								</tr>
		  								<tr>
		  									<td width="25%"><input type="radio" name="phuongtien" /> Máy bay</td>
		  									<td width="25%"><input type="radio"  name="phuongtien" /> Xe oto</td>
		  									<td width="50%"><input type="checkbox" /> Hướng dẫn viên</td>
		  								</tr>
		  							</tbody>
		  						</table>
	  						</div>
	  					</div>
	  					<ul id="list_races">
						  <li  >Hà Nội [VN]</li>
						  <li  >Đà Nẵng [VN]</li>
						  <li  >Singapore [SIN]</li>
						  <li  >Singapore2 [SIN]</li>
						</ul>
	  				</div>
  				</div>
			</div>
			</div>

		
	
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
							<div class="col-md-12">
								<hr>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-5">
								<h3><label>Tổng</label> </h3>
							</div>
							<div class="col-sm-7 text-right">
								<h3>11,000,000</h3>
							</div>
						</div>

	  				</div>
	  			</div>
			</div>

			
		</div>
 
			<div class="col-xs-8">
				<button class="btn btn-primary with-100"><strong>Tiếp tục <span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span></strong> </button>
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
    $( ".date" ).datepicker( );  
  });
</script>
<style type="text/css">
	.panel-body{
		padding: 3px;/* padding-top: 6px; */
	}
</style>
@stop