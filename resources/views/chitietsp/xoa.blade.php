@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Xóa chi tiết</div>
		<div class="card-body">
			<form action="{{ url('/chitietsp/xoa/' . $chitietsp->id) }}" method="post">
				@csrf
				<p>Bạn có muốn xóa thông tin sản phẩm không?</p>
				<button type="submit" class="btn btn-danger"><i class="fal fa-save"></i> Xác nhận xóa</button>
			</form>
		</div>
	</div>
@endsection