@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Hóa đơn</div>
		<div class="card-body">
			
			<table class="table table-bordered table-sm">
				<thead>
					<tr>
						<th>STT</th>
						<th>Khách hàng</th>
						<th>Sản phẩm</th>
						<th>Trạng thái</th>
						<th>Xác nhận</th>
						<th>Xóa đơn</th>
					</tr>
				</thead>
				<tbody>
					@foreach($bill as $value)
						<tr>
							
								<td>{{ $loop->iteration }}</td>
								<td>
									<p>
										Tên: <b>{{$value->nguoiDung->name}}</b>
									</p>
									<p>
										Email: <b>{{$value->nguoiDung->email}}</b>
									</p>
								</td>
								<td>
									<table>
									<tr>
										<th>
											Tên sản phẩm
										</th>
										<th>
											Giá
										</th>
										
										
									</tr>
									@php $tong = 0; @endphp
									@foreach($value->bill as $item)
										@php $tong+= $item->thanhtien; @endphp
										<tr>
											<td>
												{{$item->sanPham->tensanpham}}
											</td>
											<td>
												{{number_format($item->price)}}
											</td>
									@endforeach
										</tr>
									<tr>
										<th>Địa chỉ - sđt</th>
										<td class="all-center">
												{{$item->diachi}} - {{$item->sdt}}
										</td>
									</tr>
									<tr>
										<th>Giảm giá</th>
										<th>
											{{$item->discount}} %
										</th>
									</tr>
									<tr>
										<th>Thành tiền</th>
										<th>
											{{number_format($item->thanhtien)}}
										</th>
									</tr>
								</table>
								</td>
								
								<td>
									@if($value->status == 0)
										đang giao
									@elseif($value->status == 1)
										Đã giao hàng
									@endif
								</td>
								
								<td>
									@if($value->status == 0 && auth()->user()->level == 1)
									<a href="{{route('duyet', ['id' => $value->id])}}">
										Xác nhận giao hàng
									</a>
									@endif
								</td>
								<td class="text-center">
								<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" ><i class="fas fa-file-import"></i>Xóa đơn hàng</a>

								<form action="{{route('delete-donhang', ['id' => $value->id])}}" method="post">
								@csrf
									<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog">
									<div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xóa đơn hàng của {{$value->nguoidung->name}} không?</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									  </div>
									  
									  <div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Hùy bỏ</button>
										<button type="submit" class="btn btn-primary">Xóa</button>
									  </div>
									</div>
								  </div>
								</div>
							</form>
							
							</a>
							</td>
							
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection