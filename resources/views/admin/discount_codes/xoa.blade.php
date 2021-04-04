@extends('admin.layouts')

@section('content')
	<div class="card">
		<div class="card-header">Xóa lớp</div>
		<div class="card-body">
			<form action="{{ url('/admin/discount/xoa/' . $code->id) }}" method="post">
				@csrf
				<p>Bạn có muốn xóa sản phẩm {{ $code->name }} không?</p>
				<button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Xác nhận xóa</button>
			</form>
		</div>
	</div>
@endsection