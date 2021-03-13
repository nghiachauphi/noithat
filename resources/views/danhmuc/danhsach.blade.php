@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Danh Mục</div>
		<div class="card-body">
			<p>
				<a href="{{ url('/danhmuc/them') }}" class="btn btn-primary"><i class="fal fa-plus"></i> Thêm mới</a>
				
			</p>
			<table class="table table-bordered table-sm">
				<thead>
					<tr>
						<th>#</th>
						<th>Tên danh mục</th>
						<th>Ngày tạo</th>
						<th>Ngày sửa</th>
						<th>Sửa</th>
						<th>Xóa</th>
					</tr>
				</thead>
				<tbody>
					@foreach($danhmuc as $value)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $value->tendanhmuc}}</td>
							<td>{{ $value->created_at }}</td>
							<td>{{ $value->updated_at }}</td>
							
							<td class="text-center"><a href="{{ url('/danhmuc/sua/' . $value->id) }}"><i class="fal fa-edit"></i></a></td>
							<td class="text-center"><a href="{{ url('/danhmuc/xoa/' . $value->id) }}"><i class="fal fa-trash-alt text-danger"></i></a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	
	<form action="{{ url('/danhmuc/nhap') }}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="importModalLabel">Nhập từ Excel</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Chọn tập tin Excel</label>
							<input type="file" class="form-control-file" id="TapTinExcel" name="TapTinExcel" />
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
						<button type="submit" class="btn btn-primary">Nhập dữ liệu</button>
					</div>
				</div>
			</div>
		</div>
	</form>
@endsection