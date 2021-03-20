@extends('admin.layouts')

@section('content')
	<div class="card">
		<div class="card-header h2 text-center">Sản Phẩm</div>
		<div class="card-body">
			<p><a href="{{ url('/admin/sanpham/them') }}" class="btn btn-primary"><i class="bi bi-plus-circle-fill"></i> Thêm mới</a></p>
			<table class="table table-striped table-hover">
				<thead class="bg bg-primary">
					<tr>
						<th class="text-table">STT</th>
						<th class="text-table">Danh mục</th>
						<th class="text-table">Tên sản phẩm</th>
						<th class="text-table">Mô tả</th>
						<th class="text-table">Hình ảnh</th>
						<th class="text-table">Giá tiền</th>
						<th class="text-table">Ngày tạo</th>
						<th class="text-table">Ngày sửa</th>
						<th class="text-table">Sửa</th>
						<th class="text-table">Xóa</th>
					</tr>
				</thead>
				<tbody>
					@foreach($sanpham as $value)
						<tr>
							<td class="text-column">{{ $loop->iteration }}</td>
							<td class="text-column">{{ $value->danhmuc->tendanhmuc }}</td>
							<td class="text-column">{{ $value->tensanpham }}</td>
							<td class="text-column">{{ $value->mota }}</td>
							<td>
								<div class="d-flex" style="width: 500; height: 320; align-items: center; justify-content: center;">
                                <img class="rounded" src="{{asset('public/upload/'.$value->hinhanh)}}" width="50;" height="50;">
                            </div>
							</td>
							<td class="text-column">{{ $value->giatien }}</td>
							<td class="text-column">{{ $value->created_at }}</td>
							<td class="text-column">{{ $value->updated_at }}</td>
							<td class="text-center"><a href="{{ url('/admin/sanpham/sua/' . $value->id) }}"><i class="bi bi-pencil-square"></i></a></td>
							<td class="text-center"><a href="{{ url('/admin/sanpham/xoa/' . $value->id) }}"><i class="bi bi-trash-fill"></i></a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection