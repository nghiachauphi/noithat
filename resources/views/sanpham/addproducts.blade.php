@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="container">
		<h2>Chi tiết mua hàng</h2>
		<div class="row">
			<div class="col">
				<div class="all-center">
					<td ><img class="rounded" src="{{asset('/public/upload/'.$sanpham['hinhanh'])}}" height="300px;"></td>
				</div>
			</div>
			<div class="col">
				<table class="table table-bordered table-sm">
					<thead>
					<tr>
						<td class="title-item">Tên sản phẩm</td>
						<td>{{ $sanpham['tensanpham'] }}</td>
					</tr>
					<tr>
						<td class="title-item">Giá sản phẩm</td>
						<td>{{ $sanpham['giatien'] }}</td>
					</tr>
					</thead>
				</table>
				<form action="{{ route('add-products', $sanpham['id']) }}" class="aaa" method="post">
				@csrf

				

				<div class="form-group">
					<label for="soluong">Số lượng</label>
					<input type="number" class="form-control @error('soluong') is-invalid @enderror" id="soluong" name="soluong" />
					@error('soluong')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>

				<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Chọn Mua</button>
			</form>
		</div>	
	</div>
</div>
@endsection