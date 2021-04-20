@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Thêm khách hàng</div>
		<div class="card-body">
			<form action="{{ url('/khachhang/them') }}" method="post">
				@csrf
				<div class="form-group">
					<label for="domain_id">Tên Miền</label>
					<select class="form-control @error('domain_id') is-invalid @enderror" id="domain_id" name="domain_id">
						<option value="">-- Chọn domain --</option>
						@foreach($domain as $value)
							<option value="{{ $value->id }}">{{ $value->tendomain }}</option>
						@endforeach
					</select>
					@error('domain_id')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				
				<div class="form-group">
					<label for="hosting_id">Hosting</label>
					<select class="form-control @error('hosting_id') is-invalid @enderror" id="hosting_id" name="hosting_id">
						<option value="">-- Chọn Hosting --</option>
						@foreach($hosting as $value)
							<option value="{{ $value->id }}">{{ $value->diachiip }}</option>
						@endforeach
					</select>
					@error('hosting_id')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				
				<div class="form-group">
					<label for="id">Mã khách hàng</label>
					<input type="text" class="form-control @error('id') is-invalid @enderror" id="id" name="id" />
					@error('id')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				
				<div class="form-group">
					<label for="hoten">Họ tên</label>
					<input type="text" class="form-control @error('hoten') is-invalid @enderror" id="hoten" name="hoten" />
					@error('hoten')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				
				<div class="form-group">
					<label for="ngaysinh">Ngày sinh</label>
					<input type="text" class="form-control @error('ngaysinh') is-invalid @enderror" id="ngaysinh" name="ngaysinh" />
					@error('ngaysinh')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" />
					@error('email')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				
				<div class="form-group">
					<label for="dienthoai">Điện thoại</label>
					<input type="text" class="form-control @error('dienthoai') is-invalid @enderror" id="dienthoai" name="dienthoai" />
					@error('dienthoai')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				
				<div class="form-group">
					<label for="ghichu">Ghi chú</label>
					<input type="text" class="form-control @error('ghichu') is-invalid @enderror" id="ghichu" name="ghichu" />
					@error('ghichu')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				
				<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Thêm vào CSDL</button>
			</form>
		</div>
	</div>
@endsection