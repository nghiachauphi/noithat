@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Sửa khách hàng</div>
		<div class="card-body">
			<form action="{{ url('/khachhang/sua/' . $khachhang->id) }}" method="post">
				@csrf
				<div class="form-group">
					<label for="domain_id">Domain</label>
					<select class="form-control @error('domain_id') is-invalid @enderror" id="domain_id" name="domain_id">
						<option value="">-- Chọn domain --</option>
						@foreach($domain as $value)
							@if($khachhang->domain_id == $value->id)
								<option value="{{ $value->id }}" selected>{{ $value->tendomain }}</option>
							@else
								<option value="{{ $value->id }}">{{ $value->tendomain }}</option>
							@endif
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
							@if($khachhang->hosting_id == $value->id)
								<option value="{{ $value->id }}" selected>{{ $value->diachiip }}</option>
							@else
								<option value="{{ $value->id }}">{{ $value->diachiip }}</option>
							@endif
						@endforeach
					</select>
					@error('hosting_id')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				
				<div class="form-group">
					<label for="id">Mã khách hàng</label>
					<input type="text" class="form-control @error('id') is-invalid @enderror" id="id" name="id" value="{{ $khachhang->id }}" disabled="true" />
					@error('id')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				
				<div class="form-group">
					<label for="hoten">Họ tên</label>
					<input type="text" class="form-control @error('hoten') is-invalid @enderror" id="hoten" name="hoten" value="{{ $khachhang->hoten }}" />
					@error('hoten')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				
				<div class="form-group">
					<label for="ngaysinh">Ngày sinh</label>
					<input type="text" class="form-control @error('ngaysinh') is-invalid @enderror" id="ngaysinh" name="ngaysinh" value="{{ $khachhang->ngaysinh }}" />
					@error('ngaysinh')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $khachhang->email }}" />
					@error('email')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				
				<div class="form-group">
					<label for="dienthoai">Điện thoại</label>
					<input type="text" class="form-control @error('dienthoai') is-invalid @enderror" id="dienthoai" name="dienthoai" value="{{ $khachhang->dienthoai }}" />
					@error('dienthoai')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				
				<div class="form-group">
					<label for="ghichu">Ghi chú</label>
					<input type="text" class="form-control @error('ghichu') is-invalid @enderror" id="ghichu" name="ghichu" value="{{ $khachhang->ghichu }}" />
					@error('ghichu')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				
				<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Cập nhật</button>
			</form>
		</div>
	</div>
@endsection