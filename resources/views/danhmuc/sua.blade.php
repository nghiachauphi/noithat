@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Sửa sinh viên</div>
		<div class="card-body">
			<form action="{{ url('/danhmuc/sua/' . $danhmuc->id) }}" method="post">
				@csrf
				
				<div class="form-group">
					<label for="tendanhmuc">Tên danh mục</label>
					<input type="text" class="form-control @error('tendanhmuc') is-invalid @enderror" id="tendanhmuc" name="tendanhmuc" value="{{ $danhmuc->tendanhmuc }}" />
					@error('tendanhmuc')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				
				<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Cập nhật</button>
			</form>
		</div>
	</div>
@endsection