@extends('admin.layouts')

@section('content')
	<div class="card">
		<div class="card-header">Danh Mục</div>
		<div class="card-body">
			<p>
				<a href="{{ url('/admin/danhmuc/them') }}" class="btn btn-primary"><i class="bi bi-plus-circle-fill"></i> Thêm mới</a>
				
			</p>
			<table class="table table-striped table-hover">
				<thead class="bg bg-primary">
					<tr>
						<th class="text-table">STT</th>
						<th class="text-table">Tên danh mục</th>
						<th class="text-table">Ngày tạo</th>
						<th class="text-table">Ngày sửa</th>
						<th class="text-table">Sửa</th>
						<th class="text-table">Xóa</th>
					</tr>
				</thead>
				<tbody>
					@foreach($danhmuc as $value)
						<tr>
							<td class="text-column">{{ $loop->iteration }}</td>
							<td class="text-column">{{ $value->tendanhmuc}}</td>
							<td class="text-column">{{ $value->created_at }}</td>
							<td class="text-column">{{ $value->updated_at }}</td>
							
							<td class="text-center"><a href="{{ url('/admin/danhmuc/sua/' . $value->id) }}"><i class="bi bi-pencil-square"></i></a></td>
							<td class="text-center"><a href="{{ url('/admin/danhmuc/xoa/' . $value->id) }}"><i class="bi bi-trash-fill"></i></a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	
	<form action="{{ url('/admin/danhmuc/nhap') }}" method="post" enctype="multipart/form-data">
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