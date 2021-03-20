@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Mã giảm giá</div>
		<div class="card-body">
			<p><a href="{{ route('discount-code-add') }}" class="btn btn-primary"><i class="fal fa-plus"></i> Thêm mới</a></p>
			<table class="table table-bordered table-sm">
				<thead>
					<tr>
						<th class="w-5">STT</th>
						<th class="w-10">Tên giảm giá</th>
						<th>Phần trăm giảm giá</th>
						<th class="w-15">Ngày tạo</th>
						<th class="w-15">Ngày hết hạn giảm giá</th>
						<th class="w-5">Xóa</th>
					</tr>
				</thead>
				<tbody>
					@foreach($code as $value)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $value->name }}</td>
							<td>{{ $value->discount }}</td>
							<td>{{ $value->expire }}</td>
							
							<td>{{ $value->created_at }}</td>
							<td class="text-center"><a href="{{ url('/discount/xoa/' . $value->id) }}"><i class="fal fa-trash-alt text-danger"></i></a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection