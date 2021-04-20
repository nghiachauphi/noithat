@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Xóa sinh viên</div>
		<div class="card-body">
			<form action="{{ url('/khachhang/xoa/' . $khachhang->id) }}" method="post">
				@csrf
				<p>Bạn có muốn xóa sinh viên {{ $khachhang->hoten }} không?</p>
				
				<button type="submit" class="btn btn-danger"><i class="fal fa-save"></i> Xác nhận xóa</button>
			</form>
		</div>
	</div>
@endsection