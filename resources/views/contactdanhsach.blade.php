@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header text-center"><h2>Danh sách liên hệ</h2></div>
		<div class="card-body">
			<table class="table table-bordered table-sm">
				<thead class="bg bg-primary">
					<tr>
						<th>STT</th>
						<th>Mã liên hệ</th>
						<th>Tên người liên hệ</th>
						<th>Email người liên hệ</th>
						<th>Điện thoại người liên hệ</th>
						<th>Tiêu đề</th>
						<th>Nội dung liên hệ</th>
					</tr>
				</thead>
				<tbody>
					@foreach($contacts as $value)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $value->id }}</td>
							<td>{{ $value->name }}</td>
							<td>{{ $value->email }}</td>
							<td>{{ $value->phone }}</td>
							<td>{{ $value->subject }}</td>
							<td>{{ $value->message }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection