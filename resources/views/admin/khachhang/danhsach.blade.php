@extends('admin.layouts')

@section('content')


	<div class="">
		<div class="card-header text-center"><h2>Khách hàng</h2></div>
		<div>
			<table class="table">
				<thead class="bg bg-primary table-striped">
				<tr>
					<th scope="col" class="text-table">STT</th>
					<th scope="col" class="text-table">Trạng thái</th>
				</tr>
				</thead>
				<tbody>
				@foreach( $nguoidung as $value)
					@php
					$order = App\Order::where('nguoidung_id','=', $value->id)->get();

					@endphp

					<tr>
						<td>Khách hàng thứ {{ $loop->iteration }}</td>

						<td>

							<table class="table table-hover">
								<thead>
								<div class="bg-khachhang">
									<tr>
										<td class="text-table">
												Tên khách hàng:
										</td>
										<td>
											<b>{{$value->name}}</b>
										</td>
										<td class="text-table">
											Username:
										</td>
										<td>
											<b>{{$value->username}}</b>
										</td>
									</tr>

									<tr>
										<td class="text-table">
											Email:
										</td>
										<td>
											<b>{{$value->email}}</b>
										</td>
										<td class="text-table">
											Điện thoại:
										</td>
										<td>
											<b>{{$value->phone}}</b>
										</td>
									</tr>

									<tr>
										<td class="text-table">
											Địa chỉ:
										</td>
										<td>
											<b>{{$value->address}}</b>
										</td>
									</tr>
								</div>
									<tr>
										<th class="text-table">Thông tin giao hàng</th>
										<th class="text-table">Thông tin đơn hàng</th>
										<th class="text-table">Trạng thái</th>
										<th class="text-table">Xóa đơn</th>
									</tr>
								</thead>
								<tbody>
								@foreach( $order as $value)
									<tr>
										<td>
											<p>
												Tên người nhận: <b>{{$value->hovaten}}</b>
											</p>
											<p>
												Địa chỉ: <b>{{$value->diachi}}</b>
											</p>
											<p>
												Email: <b>{{$value->email}}</b>
											</p>
											<p>
												Điện thoại: <b>{{$value->dienthoai}}</b>
											</p>
											<p>
												Ghi chú giao hàng: <b>{{$value->ghichu}}</b>
											</p>
											<p>
												Tổng tiền: <b>{{number_format($value->tongtien)}} VND</b>
											</p>
										</td>
										<td>
											<table class="table table-striped table-hover">
												<thead style="background-color: #67E7F8">
												<tr>
													<th>Tên sản phẩm</th>
													<th>Hình ảnh</th>
													<th>Giá</th>
													<th>Số lượng</th>
													<th>trọng lượng</th>
													<th>kích thước</th>
													<th>chất liệu</th>
												</tr>
												</thead>
												<tbody>
												@foreach($value->bill as $item)
													<tr>

														<td>
															{{$item->sanpham->tensanpham}}
														</td>
														<td>
															<img class="rounded" src="{{asset('/public/upload/'.$item->sanpham->hinhanh)}}"  width="50;" height="50;"/>

														</td>
														<td>
															{{number_format($item->price)}}
														</td>
														<td>
															{{$item->soluong}}
														</td>
														<td>
															{{$item->trongluong}}
														</td>
														<td>
															{{$item->kichthuoc}}
														</td>
														<td>
															{{$item->chatlieu}}
														</td>
													</tr>
												@endforeach
												</tbody>
											</table>
										</td>

										<td>
											<div class="form-group">
												<a style="color: black">@if( $value->status==0)
														Đợi xác nhận
													@elseif( $value->status==1)
														Đang giao hàng
													@elseif( $value->status==2)
														Đã Giao
													@endif</a>
													</select>
													@error('status')
														<span class="invalid-feedback" role="alert">{{ $message }}</span>
													@enderror
												</div>
												
												<hr>
											
											<form action="{{ url('/admin/khachhang/trangthai/'.$value->id) }}" method="post">

												@csrf
												<div class="form-group">
													<select class="form-control" id="status" name="status">
															<option value="{{0}}">Đợi xác nhận</option>
															<option value="{{1}}">Đang giao hàng</option>
															<option value="{{2}}">Đã Giao</option>
													</select>
													<input type="submit" class="btn btn-dark" value="Thay đổi trạng thái">
												</div>
												
											</form>
											
										</td>

										<td class="all-center">
											<form action="{{URL('info/'. $value->id)}}" method="post">
												@csrf
												<input type="hidden" name="cancel" value="Xóa đơn" class="btn btn-danger">
												<input type="submit" value="Xóa đơn" class="btn btn-danger">
											</form>
										</td>

									</tr>

								@endforeach
								</tbody>
							</table>

						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<form action="{{url('/khachhang/nhap')}}" method="post" enctype="multipart/form-data">
	@csrf
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Nhập từ excel</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			
			  <div class="form-group">
				<label for="recipient-name" class="col-form-label">Chọn tập tin excel</label>
				<input type="file" class="form-control-file" id="TapTinExcel" name="TapTinExcel">
			  </div>
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Hùy bỏ</button>
			<button type="submit" class="btn btn-primary">Nhập</button>
		  </div>
		</div>
	  </div>
	</div>
</form>
	<style>
		.bg-khachhang{
			background-color: #4f1915!important;
		}
	</style>
@endsection