@extends('layouts.app')

@section('content')


<div class="section pt-0">
	<div class="container">
		<div class="row">
			<h2>{{ $sanpham['tensanpham'] }}</h2>
			<div class="col-lg-6 all-center">

				<div class="form-group all-center">
					<img class="rounded" src="{{asset('/public/upload/'.$sanpham['hinhanh'])}}" height="400px">
				</div>
			</div>

			<div class="col-lg-6 pt-2 pt-lg-0 mt-4 mt-lg-0">
				<h2 class="text-center">MÔ TẢ SẢN PHẨM </h2>
				<table class="table table-bordered table-sm" >
					<thead>

					<tr>
						<td class="title-item">Chất liệu</td>
												<td>{{ $sanpham->chatlieu }}</td>
					</tr>
					<tr>
						<td class="title-item">Kích Thước</td>
												<td>{{ $sanpham->kichthuoc }}</td>
					</tr>
					<tr>
						<td class="title-item">Trọng lượng</td>
												<td>{{ $sanpham->trongluong }}</td>
					</tr>
					<tr>
						<td class="title-item">Số lượng</td>
												<td>{{ $sanpham->soluong }}</td>
					</tr>
					<tr>
					</thead>
				</table>
				<div class="form-group">
					<label>Mô tả:</label>
					<a>{{ $sanpham['mota'] }}</a>
				</div>

				<div class="all-center">
					<label>Giá:&nbsp;</label>
					<a class="price btn btn-warning font-weight-bold" style="font-size: 30px;">{{number_format($sanpham['giatien'])  }}VNĐ</a>
				</div>

				<div class="form-group">
					<form action="{{ route('add-products', $sanpham['id']) }}" class="aaa" method="post">
						<div class="form-group all-center">
							@csrf

							<input type="hidden" name="soluong" value="{{$sanpham->soluong}}">
							<input type="hidden" name="trongluong" value="{{$sanpham->trongluong}}">
							<input type="hidden" name="kichthuoc" value="{{$sanpham->kichthuoc}}">
							<input type="hidden" name="chatlieu" value="{{$sanpham->chatlieu}}">
							<input type="hidden" name="giatien" value="{{$sanpham->giatien}}">
							<label>Số lượng cần mua:</label>
							<input type="number" name="soluongmua">
							<hr />
							<button type="submit" class="btn btn-danger"> Chọn Mua</button>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection