@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="container">
		<h2 class="text-center">Chi tiết mua hàng</h2>
		<div class="row">
			<div class="col all-center">

				<img class="rounded" src="{{asset('/public/upload/'.$sanpham['hinhanh'])}}" height="300px;">

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
					<tr>
						<td class="title-item">Trọng lượng</td>
						<td>{{ $sanpham['trongluong'] }}</td>
					</tr>
					<tr>
						<td class="title-item">Kích thước</td>
						<td>{{ $sanpham['kichthuoc'] }}</td>
					</tr>
					<tr>
						<td class="title-item">Số lượng</td>
						<td>{{ $sanpham['soluong'] }}</td>
					</tr>
					<tr>
						<td class="title-item">Chất liệu</td>
						<td>{{ $sanpham['chatlieu'] }}</td>
					</tr>
					</thead>
				</table>
				<form action="{{ route('add-products', $sanpham['id']) }}" class="aaa" method="post">
				@csrf

				<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Chọn Mua</button>
			</form>
		</div>	
	</div>
</div>
@endsection