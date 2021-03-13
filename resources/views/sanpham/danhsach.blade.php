@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Sản Phẩm</div>
		<div class="card-body">
			<p><a href="{{ url('/sanpham/them') }}" class="btn btn-primary"><i class="fal fa-plus"></i> Thêm mới</a></p>
			<table class="table table-bordered table-sm">
				<thead>
					<tr>
						<th class="w-5">STT</th>
						<th class="w-10">Danh mục</th>
						<th>Tên sản phẩm</th>
						<th class="w-15">Mô tả</th>
						<th class="w-15">Hình ảnh</th>
						<th class="w-5">Giá tiền</th>
						<th class="w-5">Sửa</th>
						<th class="w-5">Xóa</th>
					</tr>
				</thead>
				<tbody>
					@foreach($sanpham as $value)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $value->danhmuc_id }}</td>
							<td>{{ $value->tensanpham }}</td>
							<td>{{ $value->mota }}</td>
							<td>
								<div class="d-flex" style="width: 500; height: 320; align-items: center; justify-content: center;">
                                <img class="rounded" src="{{asset('public/upload/'.$value->hinhanh)}}" width="50;" height="50;">
                            </div>
							</td>
							<td>{{ $value->giatien }}</td>
							<td>{{ $value->created_at }}</td>
							<td>{{ $value->updated_at }}</td>
							<td class="text-center"><a href="{{ url('/sanpham/sua/' . $value->id) }}"><i class="fal fa-edit"></i></a></td>
							<td class="text-center"><a href="{{ url('/sanpham/xoa/' . $value->id) }}"><i class="fal fa-trash-alt text-danger"></i></a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection