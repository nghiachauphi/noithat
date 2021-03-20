@extends('admin.layouts')

@section('content')
	<div class="card">
		<div class="card-header h2 text-center">Xóa danh mục</div>
		<div class="card-body">
			<form action="{{ url('/admin/danhmuc/xoa/' . $danhmuc->id) }}" method="post">
				@csrf
				<p>Bạn có muốn xóa danh mục {{ $danhmuc->tendanhmuc}} không?</p>
				<button type="submit" class="btn btn-danger"><i class="fal fa-save"></i> Xác nhận xóa</button>
			</form>
		</div>
	</div>
@endsection