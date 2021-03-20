@extends('admin.layouts')

@section('content')
	<div class="card">
		<div class="card-header text-center text-table h2">Danh sách liên hệ</div>
		<div class="card-body">
			<table class="table table-striped table-hover">
				<thead class="bg bg-primary">
					<tr>
						<th class="text-table">STT</th>
						<th class="text-table">Mã liên hệ</th>
						<th class="text-table">Tên người liên hệ</th>
						<th class="text-table">Email người liên hệ</th>
						<th class="text-table">Điện thoại người liên hệ</th>
						<th class="text-table">Tiêu đề</th>
						<th class="text-table">Nội dung liên hệ</th>
					</tr>
				</thead>
				<tbody>
					@foreach($contacts as $value)
						<tr>
							<td class="text-column">{{ $loop->iteration }}</td>
							<td class="text-column">{{ $value->id }}</td>
							<td class="text-column">{{ $value->name }}</td>
							<td class="text-column">{{ $value->email }}</td>
							<td class="text-column">{{ $value->phone }}</td>
							<td class="text-column">{{ $value->subject }}</td>
							<td class="text-column">{{ $value->message }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection