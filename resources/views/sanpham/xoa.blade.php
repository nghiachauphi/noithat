@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Xóa lớp</div>
		<div class="card-body">
			<form action="{{ url('/sanpham/xoa/' . $sanpham->id) }}" method="post">
				@csrf
				<p>Bạn có muốn xóa sản phẩm {{ $sanpham->tensanpham }} không?</p>
				<button type="submit" class="btn btn-danger"><i class="fal fa-save"></i> Xác nhận xóa</button>
			</form>
		</div>
	</div>
@endsection