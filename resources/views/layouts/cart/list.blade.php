@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header h2 text-center">Giỏ hàng</div>
		<div class="card-body">
			<form action="{{route('send-cart')}}" method="post">
				@csrf
			<table class="table table-bordered table-sm">
				<thead>
					<tr>
						<th class="w-5">STT</th>
						<th class="w-10">Tên sản phẩm</th>
						<th>Hình ảnh</th>
						<th>Số lượng</th>
						<th>Trọng lượng</th>
						<th>Kích thước</th>
						<th>Chất liệu</th>
						<th class="w-5">Giá tiền</th>
					</tr>
				</thead>
				<tbody>
					@foreach($carts as $value)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>
								{{ $value->sanpham->tensanpham }}
							</td>
							<td><img src="{{asset('public/upload/'.$value->sanpham->hinhanh)}}" width="50;" height="50;"></td>
							<td>{{ $value->soluong }}</td>
							<td>{{ $value->trongluong }}</td>
							<td>{{ $value->kichthuoc }}</td>
							<td>{{ $value->chatlieu }}</td>
							<td>{{ number_format($value->price) }}</td>
						</tr>
					@endforeach
						<tr>
                            <td class="font-weight-bold" colspan="3">Mã giảm giá (nếu có)</td>
                            <td>
                                @foreach($discountCodes as $code)
                                    <label for="">
                                        <input name="code" onclick="pick({{$code->discount}})" type="radio" value="{{$code->discount}}">
                                        {{$code->name}}
                                    </label>
                                    <br>
                                @endforeach
                            </td>
                        </tr>
						<tr>
							<td class="font-weight-bold" colspan="3">
							<label>Tổng tiền</label>
	                        </td>
	                        <td class="font-weight-bold" id="last-price">
	                        	{{number_format($total)}}
	                        </td>
						</tr>
						<tr>
                            <td>
                                <label class="font-weight-bold">Địa chỉ nhận hàng</label>
                            </td>
                            <td colspan="3">
                                <div class="form-group">
                                    <input type="text" required class="form-control @error('diachi') is-invalid @enderror" id="diachi" name="diachi"/>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="font-weight-bold">Số điện thoại liên hệ</label>
                            </td>
                            <td colspan="3">
                                <div class="form-group">
                                    <input type="text" required class="form-control @error('sdt') is-invalid @enderror" id="sdt" name="sdt"/>
                                </div>
                            </td>
                        </tr>
				</tbody>
			</table>
				<center>
					<button type="submit" class="btn btn-primary">Gửi đơn hàng</button>
				</center>
			</form>
		</div>
	</div>
	<script>
    function pick(discount)
    {
        total = "{{$total}}";
        lastPrice =  total - total * discount/100;
        $('#last-price').html(lastPrice);
        //alert(discount);

    }
	@if(session('success'))
		Swal.fire({
			title: "{{session('success')}}",
			icon: "success",
			confirmButtonText: 'OK'
		});
	@endif
</script>
@endsection